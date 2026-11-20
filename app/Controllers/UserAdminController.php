<?php
namespace App\Controllers;
use Core\Controller;
use Core\Database;

class UserAdminController extends Controller {
    public function __construct() {
        \Core\Auth::requirePermission('users');
    }

    public function index() {
        $db = Database::getInstance();
        $stmt = $db->query("SELECT * FROM users ORDER BY created_at DESC");
        $users = $stmt->fetchAll();

        $this->view('admin/layout', [
            'title' => 'İstifadəçilər',
            'contentView' => 'admin/users/index',
            'users' => $users
        ]);
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'] ?? '';
            $surname = $_POST['surname'] ?? '';
            $email = $_POST['email'] ?? '';
            $phone = $_POST['phone'] ?? '';
            $password = $_POST['password'] ?? '';
            $role = $_POST['role'] ?? 'user';
            
            $permissions = isset($_POST['permissions']) && is_array($_POST['permissions']) ? $_POST['permissions'] : [];
            $permissionsJson = json_encode($permissions);

            $hashed = password_hash($password, PASSWORD_BCRYPT);

            $db = Database::getInstance();
            $stmt = $db->prepare("INSERT INTO users (name, surname, email, phone, role, password, permissions) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $stmt->execute([$name, $surname, $email, $phone, $role, $hashed, $permissionsJson]);

            $this->redirect('/admin/users');
        }

        $this->view('admin/layout', [
            'title' => 'İstifadəçi Yarat',
            'contentView' => 'admin/users/create'
        ]);
    }

    public function edit($id) {
        $db = Database::getInstance();
        $stmt = $db->prepare("SELECT * FROM users WHERE id = :id");
        $stmt->execute(['id' => $id]);
        $user = $stmt->fetch();

        if (!$user) $this->redirect('/admin/users');

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'] ?? '';
            $surname = $_POST['surname'] ?? '';
            $email = $_POST['email'] ?? '';
            $phone = $_POST['phone'] ?? '';
            $role = $_POST['role'] ?? 'user';

            $permissions = isset($_POST['permissions']) && is_array($_POST['permissions']) ? $_POST['permissions'] : [];
            $permissionsJson = json_encode($permissions);

            $updateStmt = $db->prepare("UPDATE users SET name=?, surname=?, email=?, phone=?, role=?, permissions=? WHERE id=?");
            $updateStmt->execute([$name, $surname, $email, $phone, $role, $permissionsJson, $id]);

            if (!empty($_POST['password'])) {
                $hashed = password_hash($_POST['password'], PASSWORD_BCRYPT);
                $pwStmt = $db->prepare("UPDATE users SET password=? WHERE id=?");
                $pwStmt->execute([$hashed, $id]);
            }

            $this->redirect('/admin/users');
        }

        $this->view('admin/layout', [
            'title' => 'İstifadəçini Redaktə Et',
            'contentView' => 'admin/users/edit',
            'user' => $user
        ]);
    }

    public function delete($id) {
        $db = Database::getInstance();
        // Prevent deleting all admins accidentally. If we want we can let them delete admins but let's be safe.
        // For now, allow deleting if not id=1
        $stmt = $db->prepare("DELETE FROM users WHERE id = :id AND id != 1");
        $stmt->execute(['id' => $id]);
        $this->redirect('/admin/users');
    }
}
