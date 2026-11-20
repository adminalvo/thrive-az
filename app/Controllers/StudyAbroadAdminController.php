<?php
namespace App\Controllers;
use Core\Controller;
use Core\Auth;
use App\Models\StudyAbroad;

class StudyAbroadAdminController extends Controller {
    public function __construct() {
        Auth::requireAdmin();
        $role = $_SESSION['user_role'] ?? '';
        if (in_array($role, ['admin', 'owner']) && empty($_SESSION['admin_pin_verified'])) {
            header("Location: " . APP_URL . "/admin/verify");
            exit;
        }
    }

    public function index() {
        $model = new StudyAbroad();
        $records = $model->all();
        $this->view('admin/layout', [
            'title' => 'Xaricdə Təhsil',
            'contentView' => 'admin/study_abroad/index',
            'records' => $records
        ]);
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'country' => $_POST['country_az'] ?? '',
                'slug' => strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $_POST['country_az'] ?? ''))),
                'universities' => $_POST['universities_az'] ?? '',
                'admission_process' => $_POST['admission_process_az'] ?? '',
                'required_docs' => $_POST['required_docs_az'] ?? '',
                'visa_process' => $_POST['visa_process_az'] ?? '',
                'faq' => $_POST['faq_az'] ?? '',
                
                'country_en' => $_POST['country_en'] ?? '',
                'universities_en' => $_POST['universities_en'] ?? '',
                'admission_process_en' => $_POST['admission_process_en'] ?? '',
                'required_docs_en' => $_POST['required_docs_en'] ?? '',
                'visa_process_en' => $_POST['visa_process_en'] ?? '',
                'faq_en' => $_POST['faq_en'] ?? '',

                'country_ru' => $_POST['country_ru'] ?? '',
                'universities_ru' => $_POST['universities_ru'] ?? '',
                'admission_process_ru' => $_POST['admission_process_ru'] ?? '',
                'required_docs_ru' => $_POST['required_docs_ru'] ?? '',
                'visa_process_ru' => $_POST['visa_process_ru'] ?? '',
                'faq_ru' => $_POST['faq_ru'] ?? '',

                'meta_title' => $_POST['meta_title'] ?? '',
                'meta_desc' => $_POST['meta_desc'] ?? ''
            ];

            $model = new StudyAbroad();
            $model->create($data);
            $this->redirect('/admin/study-abroad');
        }
        
        $this->view('admin/layout', [
            'title' => 'Yeni Ölkə',
            'contentView' => 'admin/study_abroad/create'
        ]);
    }

    public function edit($id) {
        $model = new StudyAbroad();
        $record = $model->find($id);

        if (!$record) {
            $this->redirect('/admin/study-abroad');
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'country' => $_POST['country_az'] ?? '',
                'slug' => strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $_POST['country_az'] ?? ''))),
                'universities' => $_POST['universities_az'] ?? '',
                'admission_process' => $_POST['admission_process_az'] ?? '',
                'required_docs' => $_POST['required_docs_az'] ?? '',
                'visa_process' => $_POST['visa_process_az'] ?? '',
                'faq' => $_POST['faq_az'] ?? '',
                
                'country_en' => $_POST['country_en'] ?? '',
                'universities_en' => $_POST['universities_en'] ?? '',
                'admission_process_en' => $_POST['admission_process_en'] ?? '',
                'required_docs_en' => $_POST['required_docs_en'] ?? '',
                'visa_process_en' => $_POST['visa_process_en'] ?? '',
                'faq_en' => $_POST['faq_en'] ?? '',

                'country_ru' => $_POST['country_ru'] ?? '',
                'universities_ru' => $_POST['universities_ru'] ?? '',
                'admission_process_ru' => $_POST['admission_process_ru'] ?? '',
                'required_docs_ru' => $_POST['required_docs_ru'] ?? '',
                'visa_process_ru' => $_POST['visa_process_ru'] ?? '',
                'faq_ru' => $_POST['faq_ru'] ?? '',

                'meta_title' => $_POST['meta_title'] ?? '',
                'meta_desc' => $_POST['meta_desc'] ?? ''
            ];
            $model->update($id, $data);
            $this->redirect('/admin/study-abroad');
        }

        $this->view('admin/layout', [
            'title' => 'Ölkəni Yenilə',
            'contentView' => 'admin/study_abroad/edit',
            'record' => $record
        ]);
    }

    public function delete($id) {
        $model = new StudyAbroad();
        $model->delete($id);
        $this->redirect('/admin/study-abroad');
    }
}
