<?php
namespace App\Controllers;

use Core\Controller;
use Core\Auth;
use App\Models\SelfStudy;

class SelfStudyAdminController extends Controller {
    
    public function __construct() {
        Auth::requirePermission('self_study');
        
        $role = $_SESSION['user_role'] ?? '';
        if (in_array($role, ['admin', 'owner']) && empty($_SESSION['admin_pin_verified'])) {
            header("Location: " . APP_URL . "/admin/verify");
            exit;
        }
    }

    public function index() {
        $model = new SelfStudy();
        $records = $model->all();
        $this->view('admin/layout', [
            'title' => 'Self Study (Materiallar)',
            'contentView' => 'admin/self_study/index',
            'records' => $records
        ]);
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $model = new SelfStudy();
            $data = [
                'title' => $_POST['title'] ?? '',
                'description' => $_POST['description'] ?? '',
                'file_url' => $_POST['file_url'] ?? ''
            ];
            $model->create($data);
            $this->redirect('/admin/self-study');
        }
        $this->view('admin/layout', [
            'title' => 'Yeni Material',
            'contentView' => 'admin/self_study/create'
        ]);
    }

    public function delete($id) {
        $model = new SelfStudy();
        $model->delete($id);
        $this->redirect('/admin/self-study');
    }
}
