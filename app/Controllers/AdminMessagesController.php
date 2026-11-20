<?php
namespace App\Controllers;
use Core\Controller;
use Core\Auth;
use Core\Database;

class AdminMessagesController extends Controller {

    public function __construct() {
        Auth::requirePermission('messages');
        $role = $_SESSION['user_role'] ?? '';
        if (in_array($role, ['admin', 'owner']) && empty($_SESSION['admin_pin_verified'])) {
            header("Location: " . APP_URL . "/admin/verify");
            exit;
        }
    }

    public function index() {
        $db = Database::getInstance();
        $stmt = $db->query("SELECT * FROM contacts ORDER BY created_at DESC");
        $messages = $stmt->fetchAll();

        $this->view('admin/layout', [
            'title' => 'Mesajlar',
            'contentView' => 'admin/messages',
            'messages' => $messages
        ]);
    }

    public function markAsRead($id) {
        $db = Database::getInstance();
        $stmt = $db->prepare("UPDATE contacts SET status = 1 WHERE id = ?");
        $stmt->execute([$id]);
        
        $this->redirect('/admin/messages');
    }

    public function delete($id) {
        $db = Database::getInstance();
        $stmt = $db->prepare("DELETE FROM contacts WHERE id = ?");
        $stmt->execute([$id]);
        
        $this->redirect('/admin/messages');
    }
}
