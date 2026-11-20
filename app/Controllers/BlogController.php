<?php
namespace App\Controllers;
use Core\Controller;
use Core\Language;
use App\Models\Blog;

class BlogController extends Controller {
    public function index() {
        $model = new Blog();
        
        $searchQuery = $_GET['q'] ?? '';
        if (!empty($searchQuery)) {
            $blogs = $model->search($searchQuery);
        } else {
            $blogs = $model->all();
        }

        $seo = \Core\SEO::getForPage('blog');
        $this->view('layout', [
            'title' => $seo['title'],
            'meta_desc' => $seo['meta_desc'],
            'meta_keywords' => $seo['meta_keywords'],
            'contentView' => 'pages/blog',
            'blogs' => $blogs,
            'searchQuery' => $searchQuery
        ]);
    }

    public function show($slug) {
        $model = new Blog();
        $blog = $model->findBySlug($slug);

        if (!$blog) {
            header("HTTP/1.0 404 Not Found");
            echo "404 Not Found";
            exit;
        }

        // View sayını artırmaq
        $model->incrementViews($blog['id']);

        $lang = $_SESSION['lang'] ?? 'az';
        $title = $lang == 'az' ? $blog['title'] : ($blog['title_'.$lang] ?: $blog['title']);
        $desc = mb_substr(strip_tags($blog['content'] ?? ''), 0, 150) . '...';

        $schemaData = [
            "@context" => "https://schema.org",
            "@type" => "Article",
            "headline" => $title,
            "description" => $desc,
            "image" => APP_URL . '/uploads/blog/' . ($blog['image'] ?? 'default.jpg'),
            "author" => [
                "@type" => "Organization",
                "name" => "Thrive Education Center"
            ],
            "publisher" => [
                "@type" => "Organization",
                "name" => "Thrive Education Center",
                "logo" => [
                    "@type" => "ImageObject",
                    "url" => APP_URL . "/assets/images/logo.png"
                ]
            ],
            "datePublished" => date('c', strtotime($blog['created_at']))
        ];

        $this->view('layout', [
            'title' => $title . ' | ' . APP_NAME,
            'meta_desc' => $desc,
            'og_image' => APP_URL . '/uploads/blog/' . ($blog['image'] ?? 'default.jpg'),
            'contentView' => 'pages/blog_single',
            'blog' => $blog,
            'schemaData' => $schemaData,
            'darkHeader' => true
        ]);
    }
}
