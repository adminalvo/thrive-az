<?php
namespace App\Controllers;

use Core\Controller;
use Core\Auth;
use Core\Database;

class AdminBookingController extends Controller {
    public function __construct() {
        Auth::requirePanelAccess();
        // Check if bookings table exists to prevent crash on fresh install
        $db = Database::getInstance();
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
    }

    public function index() {
        $db = Database::getInstance();
        $stmt = $db->query("SELECT * FROM bookings ORDER BY created_at DESC");
        $bookings = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        $this->view('admin/layout', [
            'title' => 'Konsultasiyalar',
            'contentView' => 'admin/bookings',
            'bookings' => $bookings
        ]);
    }

    public function approve($id) {
        $db = Database::getInstance();
        $stmt = $db->prepare("UPDATE bookings SET status = 'approved' WHERE id = ?");
        $stmt->execute([$id]);
        header("Location: " . APP_URL . "/admin/bookings");
        exit;
    }

    public function delete($id) {
        $db = Database::getInstance();
        $stmt = $db->prepare("DELETE FROM bookings WHERE id = ?");
        $stmt->execute([$id]);
        header("Location: " . APP_URL . "/admin/bookings");
        exit;
    }
}
