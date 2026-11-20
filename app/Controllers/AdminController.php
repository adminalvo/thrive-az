<?php
namespace App\Controllers;

use Core\Controller;
use Core\Auth;
use Core\Database;

class AdminController extends Controller {
    public function __construct() {
        Auth::requirePanelAccess();
        
        // Enforce PIN Verification only for admin and owner
        $role = $_SESSION['user_role'] ?? '';
        if (in_array($role, ['admin', 'owner'])) {
            if (empty($_SESSION['admin_pin_verified'])) {
                $uri = $_SERVER['REQUEST_URI'];
                if (strpos($uri, '/admin/verify') === false && strpos($uri, '/admin/login') === false && strpos($uri, '/admin/logout') === false && strpos($uri, '/logout') === false) {
                    header("Location: " . APP_URL . "/admin/verify");
                    exit;
                }
            }
        }
    }

    public function verifyPin() {
        // If already verified, go to dashboard
        if (!empty($_SESSION['admin_pin_verified'])) {
            header("Location: " . APP_URL . "/admin/dashboard");
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $pin = $_POST['pin'] ?? '';
            if (strtoupper(trim($pin)) === '9FA874') {
                $_SESSION['admin_pin_verified'] = true;
                $_SESSION['admin_welcome'] = true; // Trigger welcome animation
                header("Location: " . APP_URL . "/admin/dashboard");
                exit;
            } else {
                $error = "Təhlükəsizlik kodu yanlışdır. İcazə rədd edildi.";
            }
        }

        // We use a standalone view without layout, similar to login
        $this->view('admin/verify', ['error' => $error ?? null]);
    }

    public function dashboard() {
        $db = Database::getInstance();
        
        $stats = [
            'courses' => $db->query("SELECT COUNT(*) FROM courses")->fetchColumn(),
            'blogs' => $db->query("SELECT COUNT(*) FROM blog_posts")->fetchColumn(),
            'graduates' => $db->query("SELECT COUNT(*) FROM graduates")->fetchColumn(),
            'messages' => $db->query("SELECT COUNT(*) FROM contacts")->fetchColumn(),
            'bookings' => 0, // Fallback
            'visits_today' => 0,
            'visits_month' => 0
        ];
        
        $topPages = [];
        try {
            $stats['bookings'] = $db->query("SELECT COUNT(*) FROM bookings WHERE status = 'pending'")->fetchColumn();
            
            $today = date('Y-m-d');
            $month = date('Y-m');
            $stats['visits_today'] = $db->query("SELECT COUNT(*) FROM site_visits WHERE date(visited_at) = '$today'")->fetchColumn();
            $stats['visits_month'] = $db->query("SELECT COUNT(*) FROM site_visits WHERE strftime('%Y-%m', visited_at) = '$month'")->fetchColumn();
            
            $stmt = $db->query("SELECT page_url, COUNT(*) as views FROM site_visits GROUP BY page_url ORDER BY views DESC LIMIT 5");
            $topPages = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\Exception $e) {}

        $data = [
            'title' => 'Admin Dashboard',
            'contentView' => 'admin/dashboard',
            'stats' => $stats,
            'topPages' => $topPages
        ];
        $this->view('admin/layout', $data);
    }

    public function liveChat() {
        Auth::requireAdmin();
        $data = [
            'title' => 'Canlı Dəstək (Live Chat)',
            'contentView' => 'admin/live-chat'
        ];
        $this->view('admin/layout', $data);
    }

    public function security() {
        Auth::requireAdmin();
        $data = [
            'title' => 'Təhlükəsizlik Paneli',
            'contentView' => 'admin/security'
        ];
        $this->view('admin/layout', $data);
    }

    public function systemLogs() {
        Auth::requirePanelAccess(); // Allow anyone who has access to the panel, layout will filter it further if needed.
        $role = $_SESSION['user_role'] ?? '';
        if (!in_array($role, ['admin', 'owner', 'content_creator'])) {
            header("Location: " . APP_URL . "/admin/dashboard");
            exit;
        }

        $db = Database::getInstance();
        $stmt = $db->query("SELECT * FROM site_visits ORDER BY visited_at DESC LIMIT 500");
        $logs = $stmt->fetchAll();

        $data = [
            'title' => 'Ziyarətçi Loqları',
            'contentView' => 'admin/logs',
            'logs' => $logs
        ];
        $this->view('admin/layout', $data);
    }

    public function uploadImage() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['upload'])) {
            $ext = pathinfo($_FILES['upload']['name'], PATHINFO_EXTENSION);
            $filename = 'ck_' . uniqid() . '.' . $ext;
            $uploadDir = UPLOAD_PATH . '/';
            if (!is_dir($uploadDir)) mkdir($uploadDir, 0777, true);
            
            if (move_uploaded_file($_FILES['upload']['tmp_name'], $uploadDir . $filename)) {
                echo json_encode([
                    'uploaded' => 1,
                    'fileName' => $filename,
                    'url' => APP_URL . '/uploads/' . $filename
                ]);
            } else {
                echo json_encode(['uploaded' => 0, 'error' => ['message' => 'Yüklənmə xətası']]);
            }
        }
        exit;
    }
}
