<?php
namespace App\Controllers;

use Core\Controller;
use Core\Security;
use App\Models\Contact;

class ContactController extends Controller {
    public function index() {
        $seo = \Core\SEO::getForPage('contact');
        $data = [
            'title' => $seo['title'],
            'meta_desc' => $seo['meta_desc'],
            'meta_keywords' => $seo['meta_keywords'],
            'contentView' => 'contact',
            'csrf_token' => Security::generateCsrfToken()
        ];
        
        // Sessiya üzərindən flash mesajları oxuyuruq
        if (isset($_SESSION['contact_success'])) {
            $data['success'] = $_SESSION['contact_success'];
            unset($_SESSION['contact_success']);
        }
        if (isset($_SESSION['contact_error'])) {
            $data['error'] = $_SESSION['contact_error'];
            unset($_SESSION['contact_error']);
        }

        $this->view('layout', $data);
    }

    public function submit() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // CSRF Yoxlanışı
            $token = $_POST['csrf_token'] ?? '';
            if (!Security::verifyCsrfToken($token)) {
                $_SESSION['contact_error'] = 'Təhlükəsizlik xətası (CSRF). Zəhmət olmasa yenidən cəhd edin.';
                $this->redirect('/contact');
            }

            // Məlumatların təmizlənməsi (XSS qorunması)
            $name = Security::sanitize($_POST['name'] ?? '');
            $surname = Security::sanitize($_POST['surname'] ?? '');
            $email = Security::sanitize($_POST['email'] ?? '');
            $phone = Security::sanitize($_POST['phone'] ?? '');
            
            $subject = Security::sanitize($_POST['subject'] ?? '');
            $direction = Security::sanitize($_POST['direction'] ?? '');
            if(empty($subject) && !empty($direction)) {
                $subject = $direction;
            }
            
            $message = Security::sanitize($_POST['message'] ?? '');
            $format = Security::sanitize($_POST['format'] ?? '');
            
            if(!empty($format)) {
                $message = "Tədris forması: " . $format . "\n\nMesaj:\n" . $message;
            }

            // Ev səhifəsindəki formda surname və email olmaya bilər, əgər yoxdursa "Bilinmir" qoyaq
            if (empty($surname)) $surname = '-';
            if (empty($email)) $email = 'no-email@thrive.az';

            if (empty($name) || empty($message)) {
                $_SESSION['contact_error'] = 'Zəhmət olmasa vacib xanaları doldurun.';
                $this->redirect('/contact');
            }

            $contactModel = new Contact();
            $success = $contactModel->create([
                'name' => $name,
                'surname' => $surname,
                'email' => $email,
                'phone' => $phone,
                'subject' => $subject,
                'message' => $message
            ]);

            if ($success) {
                if (strpos($subject, 'Konsultasiya') !== false) {
                    $_SESSION['consultation_success'] = 'Konsultasiya müraciətiniz qeydə alındı. Qeyd etmək lazımdır ki, konsultasiya xidmətimiz ödənişlidir.';
                } else {
                    $_SESSION['contact_success'] = 'Mesajınız uğurla göndərildi. Tezliklə sizinlə əlaqə saxlayacağıq.';
                }
            } else {
                $_SESSION['contact_error'] = 'Xəta baş verdi. Zəhmət olmasa yenidən cəhd edin.';
            }

            $referer = $_SERVER['HTTP_REFERER'] ?? '/contact';
            header("Location: $referer");
            exit;
        }
    }
}
