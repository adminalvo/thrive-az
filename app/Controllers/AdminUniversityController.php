<?php
namespace App\Controllers;

use Core\Controller;
use Core\Database;
use Core\Auth;

class AdminUniversityController extends Controller {
    public function __construct() {
        Auth::requirePermission('universities');
        
        $role = $_SESSION['user_role'] ?? '';
        if (in_array($role, ['admin', 'owner']) && empty($_SESSION['admin_pin_verified'])) {
            header("Location: " . APP_URL . "/admin/verify");
            exit;
        }
    }

    public function index() {
        $db = Database::getInstance();
        
        // Ensure order_index column exists
        try {
            $db->exec("ALTER TABLE universities ADD COLUMN order_index INTEGER DEFAULT 0");
        } catch (\Exception $e) {}

        $stmt = $db->query("SELECT u.*, c.name as country_name FROM universities u LEFT JOIN countries c ON u.country_id = c.id ORDER BY u.order_index ASC, u.id DESC");
        $universities = $stmt->fetchAll();

        $cStmt = $db->query("SELECT id, name FROM countries ORDER BY name ASC");
        $countries = $cStmt->fetchAll();

        $data = [
            'title' => 'Universitetlər',
            'contentView' => 'admin/universities',
            'universities' => $universities,
            'countries' => $countries
        ];
        $this->view('admin/layout', $data);
    }

    public function save() {
        $db = Database::getInstance();
        
        $token = $_POST['csrf_token'] ?? '';
        if (!\Core\Security::verifyCsrfToken($token)) {
            $_SESSION['error'] = 'Təhlükəsizlik xətası (CSRF).';
            header("Location: " . APP_URL . "/admin/universities");
            exit;
        }
        
        $id = $_POST['id'] ?? null;
        $country_id = $_POST['country_id'] ?? 0;
        $name = $_POST['name'] ?? '';
        $description = $_POST['description'] ?? '';
        $description_en = $_POST['description_en'] ?? '';
        $description_ru = $_POST['description_ru'] ?? '';
        $image_url = $_POST['current_image'] ?? '';

        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $ext = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
            $allowedExts = ['jpg', 'jpeg', 'png', 'webp', 'svg'];
            
            if (in_array($ext, $allowedExts)) {
                $uploadDir = __DIR__ . '/../../public/uploads/universities/';
                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0777, true);
                }
                $fileName = time() . '_' . preg_replace('/[^a-zA-Z0-9.\-_]/', '', basename($_FILES['image']['name']));
                $targetFilePath = $uploadDir . $fileName;
                
                if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFilePath)) {
                    if (!empty($id)) {
                        $stmt = $db->prepare("SELECT image_url FROM universities WHERE id = ?");
                        $stmt->execute([$id]);
                        $old_img = $stmt->fetchColumn();
                        if ($old_img && strpos($old_img, '/uploads/') === 0) {
                            $old_path = __DIR__ . '/../../public' . $old_img;
                            if (file_exists($old_path)) unlink($old_path);
                        }
                    }
                    $image_url = '/uploads/universities/' . $fileName;
                }
            } else {
                $_SESSION['error'] = "Yalnız şəkil formatlarına (JPG, PNG, WEBP, SVG) icazə verilir!";
                header("Location: " . APP_URL . "/admin/universities");
                exit;
            }
        }
        $avg_tuition_fee = $_POST['avg_tuition_fee'] ?? '';
        
        // Handle majors as JSON
        $majorsInput = $_POST['majors'] ?? '';
        $majorsArray = array_map('trim', explode(',', $majorsInput));
        $majors = json_encode(array_filter($majorsArray), JSON_UNESCAPED_UNICODE);
        
        $ranking = $_POST['ranking'] ?? '';
        $is_featured = isset($_POST['is_featured']) ? 1 : 0;

        if (!empty($id)) {
            // Update
            $stmt = $db->prepare("UPDATE universities SET country_id=?, name=?, description=?, description_en=?, description_ru=?, image_url=?, avg_tuition_fee=?, majors=?, ranking=?, is_featured=? WHERE id=?");
            $stmt->execute([$country_id, $name, $description, $description_en, $description_ru, $image_url, $avg_tuition_fee, $majors, $ranking, $is_featured, $id]);
            $_SESSION['success'] = "Universitet uğurla yeniləndi.";
        } else {
            // Insert
            $stmt = $db->prepare("INSERT INTO universities (country_id, name, description, description_en, description_ru, image_url, avg_tuition_fee, majors, ranking, is_featured) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->execute([$country_id, $name, $description, $description_en, $description_ru, $image_url, $avg_tuition_fee, $majors, $ranking, $is_featured]);
            $_SESSION['success'] = "Universitet uğurla əlavə edildi.";
        }

        header("Location: " . APP_URL . "/admin/universities");
        exit;
    }

    public function delete($id) {
        $db = Database::getInstance();
        $token = $_GET['token'] ?? '';
        if (!\Core\Security::verifyCsrfToken($token)) {
            $_SESSION['error'] = 'Təhlükəsizlik xətası (CSRF).';
            header("Location: " . APP_URL . "/admin/universities");
            exit;
        }
        
        $stmt = $db->prepare("SELECT image_url FROM universities WHERE id = ?");
        $stmt->execute([$id]);
        $old_img = $stmt->fetchColumn();
        if ($old_img && strpos($old_img, '/uploads/') === 0) {
            $old_path = __DIR__ . '/../../public' . $old_img;
            if (file_exists($old_path)) unlink($old_path);
        }
        
        $stmt = $db->prepare("DELETE FROM universities WHERE id = ?");
        $stmt->execute([$id]);
        $_SESSION['success'] = "Universitet uğurla silindi.";
        header("Location: " . APP_URL . "/admin/universities");
        exit;
    }

    public function reorder() {
        header('Content-Type: application/json');
        $input = json_decode(file_get_contents('php://input'), true);
        if (isset($input['order']) && is_array($input['order'])) {
            $db = Database::getInstance();
            try {
                $db->beginTransaction();
                $stmt = $db->prepare("UPDATE universities SET order_index = ? WHERE id = ?");
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
