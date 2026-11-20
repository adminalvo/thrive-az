<?php
namespace App\Controllers;
use Core\Controller;
use Core\Language;

class PageController extends Controller {
    public function about() {
        $seo = \Core\SEO::getForPage('about');
        $this->view('layout', [
            'title' => $seo['title'],
            'meta_desc' => $seo['meta_desc'],
            'meta_keywords' => $seo['meta_keywords'],
            'contentView' => 'pages/about',
            'darkHeader' => true
        ]);
    }
    
    public function education() {
        $model = new \App\Models\Course();
        $courses = $model->all();
        $seo = \Core\SEO::getForPage('education');
        $this->view('layout', [
            'title' => $seo['title'],
            'meta_desc' => $seo['meta_desc'],
            'meta_keywords' => $seo['meta_keywords'],
            'contentView' => 'pages/education',
            'courses' => $courses
        ]);
    }

    public function studyAbroad() {
        $model = new \App\Models\StudyAbroad();
        $records = $model->all();
        $seo = \Core\SEO::getForPage('study-abroad');
        $this->view('layout', [
            'title' => $seo['title'],
            'meta_desc' => $seo['meta_desc'],
            'meta_keywords' => $seo['meta_keywords'],
            'contentView' => 'pages/study_abroad',
            'records' => $records
        ]);
    }

    public function creationLab() {
        $model = new \App\Models\CreationLab();
        $records = $model->all();
        $seo = \Core\SEO::getForPage('creation_lab');
        $this->view('layout', [
            'title' => $seo['title'],
            'meta_desc' => $seo['meta_desc'],
            'meta_keywords' => $seo['meta_keywords'],
            'contentView' => 'pages/creation_lab',
            'records' => $records
        ]);
    }

    public function parents() {
        $seo = \Core\SEO::getForPage('thrive-portal');
        $this->view('layout', [
            'title' => $seo['title'],
            'meta_desc' => $seo['meta_desc'],
            'meta_keywords' => $seo['meta_keywords'],
            'contentView' => 'pages/parents'
        ]);
    }

    public function selfStudy() {
        $model = new \App\Models\SelfStudy();
        $records = $model->all();
        $seo = \Core\SEO::getForPage('thrive-prep');
        $this->view('layout', [
            'title' => $seo['title'],
            'meta_desc' => $seo['meta_desc'],
            'meta_keywords' => $seo['meta_keywords'],
            'contentView' => 'pages/self_study',
            'records' => $records
        ]);
    }

    public function selfStudyDetail($id) {
        $model = new \App\Models\SelfStudy();
        $record = $model->find($id);
        
        if (!$record) {
            $this->redirect('/error/404');
        }

        $lang = Language::current();
        $titleField = ($lang !== 'az' && !empty($record['title_'.$lang])) ? 'title_'.$lang : 'title';
        $descField = ($lang !== 'az' && !empty($record['description_'.$lang])) ? 'description_'.$lang : 'description';

        $title = ($record[$titleField] ?? $record['title']) . ' | Thrive Education';
        $desc = ($record[$descField] ?? $record['description']);

        $this->view('layout', [
            'title' => $title,
            'meta_desc' => $desc,
            'meta_keywords' => 'thrive self study, ' . ($record[$titleField] ?? $record['title']),
            'contentView' => 'pages/self_study_detail',
            'record' => $record,
            'titleField' => $titleField,
            'descField' => $descField
        ]);
    }

    public function graduates() {
        $db = \Core\Database::getInstance();
        $stmt = $db->query("SELECT * FROM graduates ORDER BY order_index ASC, id DESC");
        $graduates = $stmt->fetchAll();

        $seo = \Core\SEO::getForPage('graduates');
        $this->view('layout', [
            'title' => $seo['title'],
            'meta_desc' => $seo['meta_desc'],
            'meta_keywords' => $seo['meta_keywords'],
            'contentView' => 'pages/graduates',
            'graduates' => $graduates
        ]);
    }

    public function thriveMobile() {
        $seo = \Core\SEO::getForPage('thrive-mobile');
        $this->view('layout', [
            'title' => $seo['title'],
            'meta_desc' => $seo['meta_desc'],
            'meta_keywords' => $seo['meta_keywords'],
            'contentView' => 'pages/thrive_mobile'
        ]);
    }

    public function thrivePortal() {
        $seo = \Core\SEO::getForPage('thrive-portal');
        $this->view('layout', [
            'title' => $seo['title'],
            'meta_desc' => $seo['meta_desc'],
            'meta_keywords' => $seo['meta_keywords'],
            'contentView' => 'pages/thrive_portal'
        ]);
    }

    public function thrivePrep() {
        $seo = \Core\SEO::getForPage('thrive-prep');
        $this->view('layout', [
            'title' => $seo['title'],
            'meta_desc' => $seo['meta_desc'],
            'meta_keywords' => $seo['meta_keywords'],
            'contentView' => 'pages/thrive_prep'
        ]);
    }

    public function privacy() {
        $this->view('layout', [
            'title' => Language::get('privacy_policy') . ' | ' . APP_NAME,
            'meta_desc' => 'Thrive Education Center Məxfilik Siyasəti və Təhlükəsizlik Qaydaları.',
            'contentView' => 'pages/privacy'
        ]);
    }

    public function terms() {
        $this->view('layout', [
            'title' => Language::get('terms_of_service') . ' | ' . APP_NAME,
            'meta_desc' => 'Thrive Education Center İstifadəçi Qaydaları və Xidmət Şərtləri.',
            'contentView' => 'pages/terms'
        ]);
    }

    public function cookie() {
        $this->view('layout', [
            'title' => Language::get('cookie_policy') . ' | ' . APP_NAME,
            'meta_desc' => 'Thrive Education Center Cookie Fayllarından İstifadə Siyasəti.',
            'contentView' => 'pages/cookie'
        ]);
    }
}