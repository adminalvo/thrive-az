<?php
namespace App\Controllers;

use Core\Controller;

use Core\SEO;

class HomeController extends Controller {
    public function index() {
        $seo = SEO::getForPage('home');
        
        $db = \Core\Database::getInstance();
        // Fetch featured universities for the slider
        $stmt = $db->query("SELECT * FROM universities WHERE is_featured = 1 ORDER BY order_index ASC, id DESC");
        $universities = $stmt->fetchAll();
        
        $data = [
            'title' => $seo['title'],
            'meta_desc' => $seo['meta_desc'],
            'meta_keywords' => $seo['meta_keywords'],
            'universities' => $universities,
            'contentView' => 'home'
        ];
        $this->view('layout', $data);
    }
}

