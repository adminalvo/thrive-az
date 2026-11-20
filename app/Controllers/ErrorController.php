<?php
namespace App\Controllers;
use Core\Controller;

class ErrorController extends Controller {
    public function notFound() {
        http_response_code(404);
        $this->view('layout', [
            'title' => '404 - Səhifə Tapılmadı | ' . APP_NAME,
            'contentView' => 'pages/404'
        ]);
    }
}
