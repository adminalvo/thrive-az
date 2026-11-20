<?php
namespace App\Controllers;
use Core\Controller;
use Core\Auth;
use Core\Database;

class AdminApplicationController extends Controller {

    public function __construct() {
        Auth::requirePermission('applications');
        $role = $_SESSION['user_role'] ?? '';
        if (in_array($role, ['admin', 'owner']) && empty($_SESSION['admin_pin_verified'])) {
            header("Location: " . APP_URL . "/admin/verify");
            exit;
        }
    }

    public function index() {
        $db = Database::getInstance();
        $stmt = $db->query("
            SELECT ua.*, u.name, u.surname, u.email, u.phone 
            FROM user_applications ua
            JOIN users u ON ua.user_id = u.id
            ORDER BY ua.created_at DESC
        ");
        $applications = $stmt->fetchAll();

        $this->view('admin/layout', [
            'title' => 'Müraciətlər',
            'contentView' => 'admin/applications',
            'applications' => $applications
        ]);
    }

    public function updateStatus($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $status = $_POST['status'] ?? 'Gözləmədə';
            $db = Database::getInstance();
            $stmt = $db->prepare("UPDATE user_applications SET status = ? WHERE id = ?");
            $stmt->execute([$status, $id]);
        }
        $this->redirect('/admin/applications');
    }
}
