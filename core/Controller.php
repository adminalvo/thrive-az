<?php
namespace Core;

class Controller {
    protected function view($viewName, $data = []) {
        extract($data);
        $viewFile = VIEW_PATH . '/' . $viewName . '.php';
        
        if (file_exists($viewFile)) {
            require $viewFile;
        } else {
            die("Görünüş faylı tapılmadı: " . $viewName);
        }
    }

    protected function redirect($url) {
        header("Location: " . APP_URL . $url);
        exit();
    }
}
