<?php
namespace App\Controllers;

use Core\Controller;
use Core\Database;
use Core\Auth;

class AdminCountryController extends Controller {
    public function __construct() {
        Auth::requirePermission('countries');
        
        $role = $_SESSION['user_role'] ?? '';
        if (in_array($role, ['admin', 'owner']) && empty($_SESSION['admin_pin_verified'])) {
            header("Location: " . APP_URL . "/admin/verify");
            exit;
        }
    }

    public function index() {
        $db = Database::getInstance();
        $stmt = $db->query("SELECT * FROM countries ORDER BY id DESC");
        $countries = $stmt->fetchAll();

        $data = [
            'title' => 'Ölkələr (Study Abroad)',
            'contentView' => 'admin/countries',
            'countries' => $countries
        ];
        $this->view('admin/layout', $data);
    }

    public function save() {
        $db = Database::getInstance();
        
        $id = $_POST['id'] ?? null;
        $name = $_POST['name'] ?? '';
        $name_en = $_POST['name_en'] ?? '';
        $name_ru = $_POST['name_ru'] ?? '';

        if (!empty($id)) {
            // Update
            $stmt = $db->prepare("UPDATE countries SET name = ?, name_en = ?, name_ru = ? WHERE id = ?");
            $stmt->execute([$name, $name_en, $name_ru, $id]);
            $_SESSION['success'] = "Ölkə uğurla yeniləndi.";
        } else {
            // Insert
            $stmt = $db->prepare("INSERT INTO countries (name, name_en, name_ru) VALUES (?, ?, ?)");
            $stmt->execute([$name, $name_en, $name_ru]);
            $_SESSION['success'] = "Yeni ölkə uğurla əlavə edildi.";
        }

        header("Location: " . APP_URL . "/admin/countries");
        exit;
    }

    public function delete($id) {
        $db = Database::getInstance();
        $stmt = $db->prepare("DELETE FROM countries WHERE id = ?");
        $stmt->execute([$id]);
        $_SESSION['success'] = "Ölkə uğurla silindi.";
        header("Location: " . APP_URL . "/admin/countries");
        exit;
    }
}
