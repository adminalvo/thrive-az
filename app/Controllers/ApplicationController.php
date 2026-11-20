<?php
namespace App\Controllers;
use Core\Controller;
use Core\Auth;
use Core\Database;

class ApplicationController extends Controller {

    public function apply() {
        if (!Auth::check()) {
            $_SESSION['error'] = "Zəhmət olmasa müraciət etmək üçün hesabınıza daxil olun.";
            $this->redirect('/login');
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $program = $_POST['program_type'] ?? '';
            $userId = $_SESSION['user_id'];

            if (!empty($program)) {
                $db = Database::getInstance();
                
                // Check if already applied and pending
                $checkStmt = $db->prepare("SELECT COUNT(*) FROM user_applications WHERE user_id = ? AND program_type = ? AND status = 'Gözləmədə'");
                $checkStmt->execute([$userId, $program]);
                
                if ($checkStmt->fetchColumn() > 0) {
                    $_SESSION['error'] = "Sizin bu proqrama artıq gözləmədə olan müraciətiniz var.";
                } else {
                    $stmt = $db->prepare("INSERT INTO user_applications (user_id, program_type) VALUES (?, ?)");
                    $stmt->execute([$userId, $program]);
                    $_SESSION['success'] = "Müraciətiniz uğurla qeydə alındı!";
                }
            }
            
            // Go back
            header("Location: " . $_SERVER['HTTP_REFERER']);
            exit;
        }
    }
}
