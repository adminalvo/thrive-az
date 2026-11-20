<?php
namespace App\Controllers;

use Core\Controller;
use Core\Database;
use Core\Settings;
use Core\Auth;

class ThemeAdminController extends Controller {
    public function __construct() {
        Auth::requireAdmin();
    }

    public function index() {
        $db = Database::getInstance();
        $stmt = $db->query("SELECT setting_key, setting_value FROM settings");
        $rows = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        $settings = [];
        foreach ($rows as $row) {
            $settings[$row['setting_key']] = $row['setting_value'];
        }

        $this->view('admin/layout', [
            'title' => 'Qlobal Dizayn',
            'contentView' => 'admin/theme/index', 
            'settings' => $settings
        ]);
    }

    public function save() {
        $db = Database::getInstance();
        
        // Handle logo upload
        if (isset($_FILES['logo_file']) && $_FILES['logo_file']['error'] == UPLOAD_ERR_OK) {
            $allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp', 'image/svg+xml'];
            $maxSize = 2 * 1024 * 1024; // 2MB

            $fileType = mime_content_type($_FILES['logo_file']['tmp_name']);
            $fileSize = $_FILES['logo_file']['size'];

            if (in_array($fileType, $allowedTypes) && $fileSize <= $maxSize) {
                $uploadDir = __DIR__ . '/../../public/assets/images/';
                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0777, true);
                }
                $fileName = 'logo_' . time() . '_' . preg_replace('/[^a-zA-Z0-9.\-_]/', '', basename($_FILES['logo_file']['name']));
                $targetFile = $uploadDir . $fileName;
                
                if (move_uploaded_file($_FILES['logo_file']['tmp_name'], $targetFile)) {
                    $_POST['logo_url'] = '/assets/images/' . $fileName;
                }
            } else {
                // Return error if needed, but for now we skip uploading silently if invalid
                header("Location: " . APP_URL . "/admin/theme?error=invalid_file");
                exit;
            }
        }

        // Allowed keys
        $allowed = ['primary_color', 'ocean_blue', 'secondary_color', 'gradient_angle', 'body_bg_color', 'header_bg_color', 'logo_url', 'font_family'];

        foreach ($_POST as $key => $value) {
            if (in_array($key, $allowed)) {
                $chk = $db->prepare("SELECT COUNT(*) FROM settings WHERE setting_key = ?");
                $chk->execute([$key]);
                if ($chk->fetchColumn() > 0) {
                    $upd = $db->prepare("UPDATE settings SET setting_value = ? WHERE setting_key = ?");
                    $upd->execute([$value, $key]);
                } else {
                    $ins = $db->prepare("INSERT INTO settings (setting_key, setting_value) VALUES (?, ?)");
                    $ins->execute([$key, $value]);
                }
            }
        }

        header("Location: " . APP_URL . "/admin/theme?success=1");
        exit;
    }
}
