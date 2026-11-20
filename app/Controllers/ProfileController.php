<?php
namespace App\Controllers;
use Core\Controller;
use Core\Auth;
use Core\Database;
use Core\Language;

class ProfileController extends Controller {
    public function __construct() {
        if (!Auth::check()) {
            $this->redirect('/login');
        }
    }

    public function index() {
        $db = Database::getInstance();
        $userId = $_SESSION['user_id'];
        
        $stmt = $db->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute([$userId]);
        $user = $stmt->fetch();

        $success = $_GET['success'] ?? null;
        $error = $_GET['error'] ?? null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_profile'])) {
            $name = $_POST['name'] ?? '';
            $surname = $_POST['surname'] ?? '';
            $email = $_POST['email'] ?? '';
            $phone = $_POST['phone'] ?? '';
            $password = $_POST['password'] ?? '';

            // Update user details
            $updateStmt = $db->prepare("UPDATE users SET name=?, surname=?, email=?, phone=? WHERE id=?");
            $updateStmt->execute([$name, $surname, $email, $phone, $userId]);

            // Update password if provided
            if (!empty($password)) {
                $hashed = password_hash($password, PASSWORD_BCRYPT);
                $pwStmt = $db->prepare("UPDATE users SET password=? WHERE id=?");
                $pwStmt->execute([$hashed, $userId]);
            }

            // Refresh user session name
            $_SESSION['user_name'] = $name;

            $this->redirect('/profile?success=1');
        }

        // Fetch user documents
        $docStmt = $db->prepare("SELECT * FROM user_documents WHERE user_id = ? ORDER BY created_at DESC");
        $docStmt->execute([$userId]);
        $documents = $docStmt->fetchAll();

        // Fetch user applications
        $appStmt = $db->prepare("SELECT * FROM user_applications WHERE user_id = ? ORDER BY created_at DESC");
        $appStmt->execute([$userId]);
        $applications = $appStmt->fetchAll();

        // Role based data
        $attendances = [];
        $homeworks = [];
        $children = [];
        $bookings = [];
        $examResults = [];
        $teacherClasses = [];

        if ($user['role'] == 'student') {
            $attStmt = $db->prepare("SELECT a.*, c.title as course_title FROM student_attendance a LEFT JOIN courses c ON a.course_id = c.id WHERE a.student_id = ? ORDER BY a.date DESC");
            $attStmt->execute([$userId]);
            $attendances = $attStmt->fetchAll();

            $hwStmt = $db->prepare("SELECT h.*, c.title as course_title FROM student_homeworks h LEFT JOIN courses c ON h.course_id = c.id WHERE h.student_id = ? ORDER BY h.created_at DESC");
            $hwStmt->execute([$userId]);
            $homeworks = $hwStmt->fetchAll();

            $examStmt = $db->prepare("SELECT * FROM exam_results WHERE student_id = ? ORDER BY exam_date ASC");
            $examStmt->execute([$userId]);
            $examResults = $examStmt->fetchAll();
        }

        if ($user['role'] == 'parent') {
            $chStmt = $db->prepare("SELECT u.* FROM users u JOIN students_parents ps ON u.id = ps.student_id WHERE ps.parent_id = ?");
            $chStmt->execute([$userId]);
            $children = $chStmt->fetchAll();
        }

        if ($user['role'] == 'teacher') {
            $tcStmt = $db->prepare("SELECT cs.*, u.name as student_name, u.surname as student_surname FROM class_schedules cs LEFT JOIN users u ON cs.student_id = u.id WHERE cs.teacher_id = ? ORDER BY cs.start_time ASC");
            $tcStmt->execute([$userId]);
            $teacherClasses = $tcStmt->fetchAll();
        }
        $bookStmt = $db->prepare("SELECT * FROM bookings WHERE user_id = ? ORDER BY created_at DESC");
        $bookStmt->execute([$userId]);
        $bookings = $bookStmt->fetchAll();

        $this->view('layout', [
            'title' => Language::get('profile') . ' | ' . APP_NAME,
            'contentView' => 'pages/profile',
            'darkHeader' => true,
            'user' => $user,
            'documents' => $documents,
            'applications' => $applications,
            'attendances' => $attendances,
            'homeworks' => $homeworks,
            'examResults' => $examResults,
            'teacherClasses' => $teacherClasses,
            'children' => $children,
            'bookings' => $bookings,
            'success' => $success ? (Language::get('save_changes') ?? "Əməliyyat uğurludur!") : null,
            'error' => $error ? "Xəta baş verdi. Zəhmət olmasa yenidən yoxlayın." : null
        ]);
    }

    public function uploadDocument() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userId = $_SESSION['user_id'];
            $docType = $_POST['document_type'] ?? 'Digər';
            
            if (isset($_FILES['document_file']) && $_FILES['document_file']['error'] == UPLOAD_ERR_OK) {
                $maxSize = 5 * 1024 * 1024; // 5MB
                $fileSize = $_FILES['document_file']['size'];
                $ext = strtolower(pathinfo($_FILES['document_file']['name'], PATHINFO_EXTENSION));
                $allowedExts = ['pdf', 'jpg', 'jpeg', 'png'];

                if (in_array($ext, $allowedExts) && $fileSize <= $maxSize) {
                    $uploadDir = __DIR__ . '/../../public/uploads/documents/';
                    if (!is_dir($uploadDir)) {
                        mkdir($uploadDir, 0777, true);
                    }

                    $fileName = 'doc_' . $userId . '_' . time() . '.' . $ext;
                    $targetFile = $uploadDir . $fileName;
                    
                    if (move_uploaded_file($_FILES['document_file']['tmp_name'], $targetFile)) {
                        $filePath = '/uploads/documents/' . $fileName;
                        $db = Database::getInstance();
                        $stmt = $db->prepare("INSERT INTO user_documents (user_id, document_type, file_path) VALUES (?, ?, ?)");
                        $stmt->execute([$userId, $docType, $filePath]);
                        $this->redirect('/profile?success=1');
                        return;
                    }
                }
            }
            $this->redirect('/profile?error=1');
        }
    }

    public function deleteDocument($id) {
        $userId = $_SESSION['user_id'];
        $db = Database::getInstance();
        
        $stmt = $db->prepare("SELECT file_path FROM user_documents WHERE id = ? AND user_id = ?");
        $stmt->execute([$id, $userId]);
        $doc = $stmt->fetch();

        if ($doc) {
            $filePath = __DIR__ . '/../../public' . $doc['file_path'];
            if (file_exists($filePath)) {
                unlink($filePath);
            }
            
            $delStmt = $db->prepare("DELETE FROM user_documents WHERE id = ? AND user_id = ?");
            $delStmt->execute([$id, $userId]);
            $this->redirect('/profile?success=1');
        } else {
            $this->redirect('/profile?error=1');
        }
    }

    public function bookConsultation() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userId = $_SESSION['user_id'];
            $serviceType = $_POST['service_type'] ?? '';
            $date = $_POST['date'] ?? '';
            $time = $_POST['time'] ?? '';
            $notes = $_POST['notes'] ?? '';

            if ($serviceType && $date && $time) {
                $db = Database::getInstance();
                $stmt = $db->prepare("INSERT INTO bookings (user_id, service_type, date, time, notes) VALUES (?, ?, ?, ?, ?)");
                $stmt->execute([$userId, $serviceType, $date, $time, $notes]);
                $this->redirect('/profile?success=1');
                return;
            }
            $this->redirect('/profile?error=1');
        }
    }
}
