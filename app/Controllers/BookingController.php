<?php
namespace App\Controllers;

use Core\Controller;
use Core\Database;
use Core\Language;

class BookingController extends Controller {
    public function index() {
        $db = Database::getInstance();
        $seo = \Core\SEO::getForPage('booking');
        
        $courses = $db->query("SELECT * FROM courses ORDER BY title ASC")->fetchAll(\PDO::FETCH_ASSOC);
        $countries = $db->query("SELECT * FROM countries ORDER BY name ASC")->fetchAll(\PDO::FETCH_ASSOC);
        
        $this->view('layout', [
            'title' => $seo['title'],
            'meta_desc' => $seo['meta_desc'],
            'meta_keywords' => $seo['meta_keywords'],
            'contentView' => 'pages/booking',
            'darkHeader' => true,
            'db_courses' => $courses,
            'db_countries' => $countries
        ]);
    }

    public function submit() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $db = Database::getInstance();
            
            // Collect data from the 7-step form
            $direction = $_POST['direction'] ?? '';
            $service = $_POST['service'] ?? '';
            $format = $_POST['format'] ?? '';
            $language = $_POST['language'] ?? '';
            $date = $_POST['date'] ?? '';
            $time = $_POST['time'] ?? '';
            
            $student_name = $_POST['student_name'] ?? '';
            $phone = $_POST['phone'] ?? '';
            $whatsapp = $_POST['whatsapp'] ?? '';
            $email = $_POST['email'] ?? '';
            $age_or_class = $_POST['age_or_class'] ?? '';
            $school = $_POST['school'] ?? '';
            $target_program = $_POST['target_program'] ?? '';
            
            // User ID if logged in
            $user_id = $_SESSION['user_id'] ?? null;
            if (!$user_id) {
                // Ideally, we'd create a user or link via email, but for now we just store as 0 or create dummy user.
                // Since user_id is NOT NULL in schema usually, let's check schema. bookings: `user_id` INTEGER NOT NULL
                // To bypass this for public bookings, we can insert user_id = 0 for guests.
                $user_id = 0; 
            }

            // Handle array for format (since it's max 2 choices now)
            if (is_array($format)) {
                $format = implode(', ', $format);
            }

            try {
                // Ensure table exists
                $db->exec("CREATE TABLE IF NOT EXISTS bookings (
                    id INTEGER PRIMARY KEY AUTOINCREMENT,
                    user_id INTEGER NOT NULL DEFAULT 0,
                    service_type TEXT,
                    date TEXT,
                    time TEXT,
                    direction TEXT,
                    format TEXT,
                    language TEXT,
                    student_name TEXT,
                    age_or_class TEXT,
                    school TEXT,
                    target_program TEXT,
                    phone TEXT,
                    whatsapp TEXT,
                    email TEXT,
                    status TEXT DEFAULT 'pending',
                    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
                )");

                $stmt = $db->prepare("INSERT INTO bookings (
                    user_id, service_type, date, time, 
                    direction, format, language, student_name, 
                    age_or_class, school, target_program, phone, whatsapp, email
                ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                
                $stmt->execute([
                    $user_id, $service, $date, $time,
                    $direction, $format, $language, $student_name,
                    $age_or_class, $school, $target_program, $phone, $whatsapp, $email
                ]);

                // Return JSON for AJAX success
                echo json_encode(['success' => true, 'message' => 'Rezervasiya uğurla tamamlandı!']);
            } catch (\Exception $e) {
                echo json_encode(['success' => false, 'message' => 'Xəta baş verdi: ' . $e->getMessage()]);
            }
            exit;
        }
    }
}
