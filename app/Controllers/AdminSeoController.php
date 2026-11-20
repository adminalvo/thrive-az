<?php
namespace App\Controllers;
use Core\Controller;
use Core\Database;
use Core\Auth;

class AdminSeoController extends Controller {
    public function __construct() {
        Auth::requireAdmin();
    }

    public function index() {
        $db = Database::getInstance();
        $stmt = $db->query("SELECT * FROM seo_settings ORDER BY id ASC");
        $seo_pages = $stmt->fetchAll();

        $this->view('admin/layout', [
            'title' => 'SEO İdarəetmə',
            'contentView' => 'admin/seo/index',
            'seo_pages' => $seo_pages
        ]);
    }

    public function save() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $db = Database::getInstance();
            $id = $_POST['id'] ?? null;
            
            $data = [
                'title_az' => $_POST['title_az'] ?? '',
                'title_en' => $_POST['title_en'] ?? '',
                'title_ru' => $_POST['title_ru'] ?? '',
                'desc_az' => $_POST['description_az'] ?? '',
                'desc_en' => $_POST['description_en'] ?? '',
                'desc_ru' => $_POST['description_ru'] ?? '',
                'kw_az' => $_POST['keywords_az'] ?? '',
                'kw_en' => $_POST['keywords_en'] ?? '',
                'kw_ru' => $_POST['keywords_ru'] ?? '',
                'id' => $id
            ];

            if ($id) {
                $stmt = $db->prepare("UPDATE seo_settings SET 
                    title_az = :title_az, title_en = :title_en, title_ru = :title_ru, 
                    description_az = :desc_az, description_en = :desc_en, description_ru = :desc_ru, 
                    keywords_az = :kw_az, keywords_en = :kw_en, keywords_ru = :kw_ru 
                    WHERE id = :id");
                $stmt->execute($data);
                $_SESSION['success'] = "SEO məlumatları uğurla yadda saxlanıldı.";
            }
        }
        $this->redirect('/admin/seo');
    }
}
