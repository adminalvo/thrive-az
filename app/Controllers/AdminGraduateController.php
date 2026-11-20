<?php
namespace App\Controllers;

use Core\Controller;
use Core\Database;
use Core\Auth;

class AdminGraduateController extends Controller {
    public function __construct() {
        Auth::requirePermission('graduates');
        
        $role = $_SESSION['user_role'] ?? '';
        if (in_array($role, ['admin', 'owner']) && empty($_SESSION['admin_pin_verified'])) {
            header("Location: " . APP_URL . "/admin/verify");
            exit;
        }
    }

    public function index() {
        $db = Database::getInstance();
        
        $migrations = [
            "ALTER TABLE graduates ADD COLUMN order_index INTEGER DEFAULT 0",
            "ALTER TABLE graduates ADD COLUMN category_id INTEGER DEFAULT 0",
            "ALTER TABLE graduates ADD COLUMN score TEXT",
            "ALTER TABLE graduates ADD COLUMN max_score REAL DEFAULT 0",
            "ALTER TABLE graduates ADD COLUMN detail TEXT",
            "ALTER TABLE graduates ADD COLUMN detail_en TEXT",
            "ALTER TABLE graduates ADD COLUMN detail_ru TEXT",
            "ALTER TABLE graduates ADD COLUMN name_en TEXT",
            "ALTER TABLE graduates ADD COLUMN name_ru TEXT",
            "ALTER TABLE graduates ADD COLUMN admission_status INTEGER DEFAULT 0",
            "ALTER TABLE graduates ADD COLUMN admission_target TEXT",
            "ALTER TABLE graduates ADD COLUMN admission_target_en TEXT",
            "ALTER TABLE graduates ADD COLUMN admission_target_ru TEXT"
        ];
        foreach ($migrations as $sql) {
            try { $db->exec($sql); } catch (\Exception $e) {}
        }

        $stmt = $db->query("SELECT * FROM graduates ORDER BY order_index ASC, id DESC");
        $graduates = $stmt->fetchAll();

        $data = [
            'title' => 'Məzunlar (Nailiyyətlər)',
            'contentView' => 'admin/graduates',
            'graduates' => $graduates
        ];
        $this->view('admin/layout', $data);
    }

    public function save() {
        $db = Database::getInstance();
        
        $id = $_POST['id'] ?? null;
        $category_id = (int)($_POST['category_id'] ?? 0);
        
        $name = trim($_POST['name'] ?? '');
        $name_en = trim($_POST['name_en'] ?? '');
        $name_ru = trim($_POST['name_ru'] ?? '');
        
        $score = trim($_POST['score'] ?? '');
        $max_score = (float)($_POST['max_score'] ?? 0);
        
        $detail = trim($_POST['detail'] ?? '');
        $detail_en = trim($_POST['detail_en'] ?? '');
        $detail_ru = trim($_POST['detail_ru'] ?? '');

        if (!empty($id)) {
            $stmt = $db->prepare("UPDATE graduates SET category_id=?, name=?, name_en=?, name_ru=?, score=?, max_score=?, detail=?, detail_en=?, detail_ru=? WHERE id=?");
            $stmt->execute([
                $category_id, $name, $name_en, $name_ru, $score, $max_score, $detail, $detail_en, $detail_ru, $id
            ]);
            $_SESSION['success'] = "Nəticə uğurla yeniləndi.";
        } else {
            $stmt = $db->prepare("INSERT INTO graduates (category_id, name, name_en, name_ru, score, max_score, detail, detail_en, detail_ru) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->execute([
                $category_id, $name, $name_en, $name_ru, $score, $max_score, $detail, $detail_en, $detail_ru
            ]);
            $_SESSION['success'] = "Nəticə uğurla əlavə edildi.";
        }

        header("Location: " . APP_URL . "/admin/graduates");
        exit;
    }

    public function delete($id) {
        $db = Database::getInstance();
        $stmt = $db->prepare("DELETE FROM graduates WHERE id = ?");
        $stmt->execute([$id]);
        $_SESSION['success'] = "Məzun uğurla silindi.";
        header("Location: " . APP_URL . "/admin/graduates");
        exit;
    }

    public function reorder() {
        header('Content-Type: application/json');
        $input = json_decode(file_get_contents('php://input'), true);
        if (isset($input['order']) && is_array($input['order'])) {
            $db = Database::getInstance();
            try {
                $db->beginTransaction();
                $stmt = $db->prepare("UPDATE graduates SET order_index = ? WHERE id = ?");
                foreach ($input['order'] as $index => $id) {
                    $stmt->execute([$index, $id]);
                }
                $db->commit();
                echo json_encode(['success' => true]);
            } catch (\Exception $e) {
                $db->rollBack();
                echo json_encode(['success' => false, 'error' => $e->getMessage()]);
            }
        } else {
            echo json_encode(['success' => false, 'error' => 'Invalid input']);
        }
        exit;
    }
}
