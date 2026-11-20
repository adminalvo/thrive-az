<?php
namespace App\Controllers;

use Core\Controller;
use Core\Database;
use Core\Language;

class StudyAbroadController extends Controller {

    public function index() {
        $db = Database::getInstance();
        
        $country_id = $_GET['country'] ?? '';
        $major = $_GET['major'] ?? '';
        
        $lang = \Core\Language::current();
        $country_name_col = ($lang == 'ru') ? 'name_ru' : 'name';

        $sql = "SELECT u.*, c.$country_name_col as country_name 
                FROM universities u 
                LEFT JOIN countries c ON u.country_id = c.id 
                WHERE 1=1";
        $params = [];
        
        if (!empty($country_id)) {
            $sql .= " AND u.country_id = ?";
            $params[] = $country_id;
        }
        
        if (!empty($major)) {
            $sql .= " AND u.majors LIKE ?";
            $params[] = "%" . $major . "%";
        }
        
        $sql .= " ORDER BY u.order_index ASC, u.id DESC";
        
        $stmt = $db->prepare($sql);
        $stmt->execute($params);
        $universities = $stmt->fetchAll();

        $cStmt = $db->query("SELECT id, $country_name_col as name FROM countries ORDER BY $country_name_col ASC");
        $countries = $cStmt->fetchAll();

        $seo = \Core\SEO::getForPage('study-abroad');

        $this->view('layout', [
            'title' => $seo['title'],
            'meta_desc' => $seo['meta_desc'],
            'meta_keywords' => $seo['meta_keywords'],
            'contentView' => 'pages/study_abroad/index',
            'universities' => $universities,
            'countries' => $countries,
            'filters' => [
                'country' => $country_id,
                'major' => $major
            ]
        ]);
    }

    public function show($id) {
        $db = Database::getInstance();
        $lang = \Core\Language::current();
        $country_name_col = ($lang == 'ru') ? 'name_ru' : 'name';
        $stmt = $db->prepare("SELECT u.*, c.$country_name_col as country_name FROM universities u LEFT JOIN countries c ON u.country_id = c.id WHERE u.id = ?");
        $stmt->execute([$id]);
        $university = $stmt->fetch();

        if (!$university) {
            header("Location: " . APP_URL . "/study-abroad");
            exit;
        }

        $this->view('layout', [
            'title' => $university['name'] . ' | ' . APP_NAME,
            'meta_desc' => mb_substr(strip_tags($university['description'] ?? ''), 0, 150) . '...',
            'og_image' => APP_URL . ($university['image_url'] ?? '/assets/images/default-uni.jpg'),
            'contentView' => 'pages/study_abroad/show',
            'university' => $university
        ]);
    }
}
