<?php
namespace App\Controllers;

use Core\Controller;
use Core\Database;
use Core\Auth;

class PageBuilderController extends Controller {

    public function __construct() {
        Auth::requireAdmin();
    }

    public function index() {
        $db = Database::getInstance();
        $stmt = $db->query("SELECT * FROM pages ORDER BY created_at DESC");
        $pages = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        $this->view('admin/layout', [
            'title' => 'Səhifə Yaradıcı',
            'contentView' => 'admin/pages/index', 
            'pages' => $pages
        ]);
    }

    public function create() {
        $this->view('admin/layout', [
            'title' => 'Yeni Səhifə Yarat',
            'contentView' => 'admin/pages/create'
        ]);
    }

    public function store() {
        $title = $_POST['title'] ?? 'Yeni Səhifə';
        $slug = $_POST['slug'] ?? 'yeni-sehife-' . time();
        $meta_title = $_POST['meta_title'] ?? '';
        $meta_desc = $_POST['meta_desc'] ?? '';
        $status = $_POST['status'] ?? 1;

        // Reserved slugs validation
        $reservedSlugs = ['admin', 'login', 'register', 'profile', 'logout', 'api', 'assets'];
        if (in_array(strtolower(trim($slug)), $reservedSlugs)) {
            $slug .= '-' . time(); // Append time to make it unique and safe
        }

        $db = Database::getInstance();
        $stmt = $db->prepare("INSERT INTO pages (slug, title, meta_title, meta_desc, status) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$slug, $title, $meta_title, $meta_desc, $status]);
        
        $id = $db->lastInsertId();
        header("Location: " . APP_URL . "/admin/pages/edit/" . $id);
        exit;
    }

    public function edit($id) {
        $db = Database::getInstance();
        $stmt = $db->prepare("SELECT * FROM pages WHERE id = ?");
        $stmt->execute([$id]);
        $page = $stmt->fetch(\PDO::FETCH_ASSOC);

        if (!$page) {
            header("Location: " . APP_URL . "/admin/pages");
            exit;
        }

        // Fetch Blocks
        $stmt = $db->prepare("SELECT * FROM page_blocks WHERE page_id = ? ORDER BY order_index ASC");
        $stmt->execute([$id]);
        $blocks = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        $this->view('admin/layout', [
            'title' => 'Səhifəni Dizayn Et',
            'contentView' => 'admin/pages/edit', 
            'page' => $page, 
            'blocks' => $blocks
        ]);
    }

    public function update($id) {
        $title = $_POST['title'] ?? 'Səhifə';
        $slug = $_POST['slug'] ?? 'sehife-' . time();
        $meta_title = $_POST['meta_title'] ?? '';
        $meta_desc = $_POST['meta_desc'] ?? '';
        $status = $_POST['status'] ?? 1;

        // Reserved slugs validation
        $reservedSlugs = ['admin', 'login', 'register', 'profile', 'logout', 'api', 'assets'];
        if (in_array(strtolower(trim($slug)), $reservedSlugs)) {
            $slug .= '-' . time();
        }

        $db = Database::getInstance();
        $stmt = $db->prepare("UPDATE pages SET slug = ?, title = ?, meta_title = ?, meta_desc = ?, status = ? WHERE id = ?");
        $stmt->execute([$slug, $title, $meta_title, $meta_desc, $status, $id]);
        
        header("Location: " . APP_URL . "/admin/pages/edit/" . $id . "?success=1");
        exit;
    }

    public function saveBlocks($id) {
        $data = json_decode(file_get_contents('php://input'), true);
        if (!$data || !isset($data['blocks'])) {
            echo json_encode(['success' => false, 'error' => 'Invalid data']);
            exit;
        }

        $db = Database::getInstance();
        
        // Clear existing blocks
        $stmt = $db->prepare("DELETE FROM page_blocks WHERE page_id = ?");
        $stmt->execute([$id]);

        // Insert new blocks
        $stmt = $db->prepare("INSERT INTO page_blocks (page_id, type, order_index, content_json) VALUES (?, ?, ?, ?)");
        foreach ($data['blocks'] as $index => $block) {
            $stmt->execute([
                $id,
                $block['type'],
                $index,
                json_encode($block['content'], JSON_UNESCAPED_UNICODE)
            ]);
        }

        echo json_encode(['success' => true]);
        exit;
    }

    public function delete($id) {
        $db = Database::getInstance();
        $stmt = $db->prepare("DELETE FROM pages WHERE id = ?");
        $stmt->execute([$id]);
        header("Location: " . APP_URL . "/admin/pages");
        exit;
    }
}
