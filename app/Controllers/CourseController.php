<?php
namespace App\Controllers;
use Core\Controller;
use Core\Language;

class CourseController extends Controller {
    public function show($slug) {
        $model = new \App\Models\Course();
        $db = \Core\Database::getInstance();
        $stmt = $db->prepare("SELECT * FROM courses WHERE slug = :slug LIMIT 1");
        $stmt->execute(['slug' => $slug]);
        $course = $stmt->fetch();

        if (!$course) {
            $this->redirect('/error/404');
        }

        $lang = Language::current();
        
        $titleField = 'title_' . $lang;
        if (!isset($course[$titleField]) || empty($course[$titleField])) {
            $titleField = 'title'; // fallback
        }

        $descField = 'short_desc_' . $lang;
        if (!isset($course[$descField]) || empty($course[$descField])) {
            $descField = 'short_desc'; // fallback
        }

        $title = $course[$titleField];
        $desc = $course[$descField];

        // Schema.org Structured Data
        $schemaData = [
            "@context" => "https://schema.org",
            "@type" => "Course",
            "name" => $title,
            "description" => $desc,
            "provider" => [
                "@type" => "Organization",
                "name" => "Thrive Education Center",
                "sameAs" => APP_URL
            ]
        ];

        $this->view('layout', [
            'title' => $title . ' | ' . APP_NAME,
            'meta_desc' => $desc,
            'contentView' => 'pages/course_detail',
            'course' => $course,
            'lang' => $lang,
            'schemaData' => $schemaData
        ]);
    }
}
