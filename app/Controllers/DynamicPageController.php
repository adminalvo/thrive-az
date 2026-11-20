<?php
namespace App\Controllers;

use Core\Controller;
use Core\Database;

class DynamicPageController extends Controller {

    public function show($slug) {
        $db = Database::getInstance();
        $errorController = new \App\Controllers\ErrorController();
        try {
            // Find the page
            $stmt = $db->prepare("SELECT * FROM pages WHERE slug = ? AND status = 1");
            $stmt->execute([$slug]);
            $page = $stmt->fetch(\PDO::FETCH_ASSOC);

            if (!$page) {
                $errorController->notFound();
                exit;
            }

            // Find blocks
            $stmt = $db->prepare("SELECT * FROM page_blocks WHERE page_id = ? ORDER BY order_index ASC");
            $stmt->execute([$page['id']]);
            $blocks = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            $errorController->notFound();
            exit;
        }

        // Decode JSON
        foreach ($blocks as &$block) {
            $block['content'] = json_decode($block['content_json'], true);
        }

        $this->view('layout', ['contentView' => 'pages/dynamic',
            'title' => $page['title'],
            'meta_title' => $page['meta_title'],
            'meta_desc' => $page['meta_desc'],
            'page' => $page,
            'blocks' => $blocks
        ]);
    }
}
