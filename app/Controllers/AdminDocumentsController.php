<?php
namespace App\Controllers;
use Core\Controller;
use Core\Auth;
use Core\Database;

class AdminDocumentsController extends Controller {
    public function __construct() {
        Auth::requireAdmin();
    }

    public function index() {
        $db = Database::getInstance();
        $stmt = $db->query("
            SELECT d.*, u.name, u.surname, u.email 
            FROM user_documents d
            JOIN users u ON d.user_id = u.id
            ORDER BY d.created_at DESC
        ");
        $documents = $stmt->fetchAll();

        $this->view('admin/layout', [
            'title' => 'Sənədlərin İdarəedilməsi',
            'contentView' => 'admin/documents/index',
            'documents' => $documents
        ]);
    }

    public function updateStatus($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $status = $_POST['status'] ?? 'Gözləmədə';
            $comment = $_POST['admin_comment'] ?? '';

            $db = Database::getInstance();
            $stmt = $db->prepare("UPDATE user_documents SET status = ?, admin_comment = ? WHERE id = ?");
            $stmt->execute([$status, $comment, $id]);

            $this->redirect('/admin/documents');
        }
    }
}
