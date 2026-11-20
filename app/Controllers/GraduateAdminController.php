<?php
namespace App\Controllers;
use Core\Controller;
use Core\Auth;
use App\Models\Graduate;

class GraduateAdminController extends Controller {
    public function __construct() {
        Auth::requirePermission('graduates');
        $role = $_SESSION['user_role'] ?? '';
        if (in_array($role, ['admin', 'owner']) && empty($_SESSION['admin_pin_verified'])) {
            header("Location: " . APP_URL . "/admin/verify");
            exit;
        }
    }

    public function index() {
        $model = new Graduate();
        $graduates = $model->all();
        $this->view('admin/layout', [
            'title' => 'Məzunlar İdarəedilməsi',
            'contentView' => 'admin/graduates/index',
            'graduates' => $graduates
        ]);
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $token = $_POST['csrf_token'] ?? '';
            if (!\Core\Security::verifyCsrfToken($token)) {
                $_SESSION['error'] = 'Təhlükəsizlik xətası (CSRF).';
                $this->redirect('/admin/graduates');
                exit;
            }

            $data = [
                'name' => $_POST['name'] ?? '',
                'name_en' => $_POST['name_en'] ?? '',
                'name_ru' => $_POST['name_ru'] ?? '',
                'university' => $_POST['university'] ?? '',
                'university_en' => $_POST['university_en'] ?? '',
                'university_ru' => $_POST['university_ru'] ?? '',
                'country' => $_POST['country'] ?? '',
                'country_en' => $_POST['country_en'] ?? '',
                'country_ru' => $_POST['country_ru'] ?? '',
                'scholarship' => $_POST['scholarship'] ?? '',
                'scholarship_en' => $_POST['scholarship_en'] ?? '',
                'scholarship_ru' => $_POST['scholarship_ru'] ?? '',
                'story' => $_POST['story'] ?? '',
                'story_en' => $_POST['story_en'] ?? '',
                'story_ru' => $_POST['story_ru'] ?? '',
                'image' => ''
            ];

            $allowedExts = ['jpg', 'jpeg', 'png', 'webp'];

            if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
                $ext = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
                if (in_array($ext, $allowedExts)) {
                    $filename = 'grad_' . uniqid() . '.' . $ext;
                    $uploadDir = UPLOAD_PATH . '/';
                    if (!is_dir($uploadDir)) mkdir($uploadDir, 0777, true);
                    if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadDir . $filename)) {
                        $data['image'] = $filename;
                    }
                }
            }

            $model = new Graduate();
            $model->create($data);
            $this->redirect('/admin/graduates');
        }

        $this->view('admin/layout', [
            'title' => 'Yeni Məzun Əlavə Et',
            'contentView' => 'admin/graduates/create'
        ]);
    }

    public function delete($id) {
        $token = $_GET['token'] ?? '';
        if (!\Core\Security::verifyCsrfToken($token)) {
            $_SESSION['error'] = 'Təhlükəsizlik xətası (CSRF).';
            $this->redirect('/admin/graduates');
            exit;
        }

        $model = new Graduate();
        $oldGrad = $model->find($id);
        if ($oldGrad) {
            $uploadDir = UPLOAD_PATH . '/';
            if ($oldGrad['image'] && file_exists($uploadDir . $oldGrad['image'])) {
                unlink($uploadDir . $oldGrad['image']);
            }
        }
        $model->delete($id);
        $this->redirect('/admin/graduates');
    }
}
