<?php
namespace App\Controllers;
use Core\Controller;
use Core\Auth;

class AdminGuideController extends Controller {

    public function __construct() {
        Auth::requireLogin();
        
        $role = $_SESSION['user_role'] ?? '';
        if (in_array($role, ['admin', 'owner', 'blog_writer', 'content_creator']) && empty($_SESSION['admin_pin_verified'])) {
            header("Location: " . APP_URL . "/admin/verify");
            exit;
        }
    }

    public function index() {
        $this->view('admin/layout', [
            'title' => \Core\Language::get('admin_guide') ?? 'Guide',
            'contentView' => 'admin/guide'
        ]);
    }
}
