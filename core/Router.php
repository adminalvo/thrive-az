<?php
namespace Core;

class Router {
    private $routes = [];

    public function get($uri, $controllerAction) {
        $this->addRoute('GET', $uri, $controllerAction);
    }

    public function post($uri, $controllerAction) {
        $this->addRoute('POST', $uri, $controllerAction);
    }

    private function addRoute($method, $uri, $controllerAction) {
        // Parametrləri (məs. {id}) regex formatına çeviririk
        $routePattern = preg_replace('/\{([a-zA-Z0-9_]+)\}/', '(?P<\1>[a-zA-Z0-9_-]+)', $uri);
        $routePattern = '#^' . $routePattern . '$#';
        
        $this->routes[] = [
            'method' => $method,
            'pattern' => $routePattern,
            'controllerAction' => $controllerAction
        ];
    }

    public function dispatch($requestUri, $requestMethod) {
        $uri = strtok($requestUri, '?');
        
        $basePath = parse_url(APP_URL, PHP_URL_PATH) ?? '';
        if ($basePath !== '' && strpos($uri, $basePath) === 0) {
            $uri = substr($uri, strlen($basePath));
        }
        if ($uri == '') $uri = '/';

        foreach ($this->routes as $route) {
            if ($route['method'] === $requestMethod && preg_match($route['pattern'], $uri, $matches)) {
                $params = array_filter($matches, 'is_string', ARRAY_FILTER_USE_KEY);
                
                list($controllerClass, $action) = explode('@', $route['controllerAction']);
                $controllerClass = "App\\Controllers\\" . $controllerClass;
                
                if (class_exists($controllerClass)) {
                    $controller = new $controllerClass();
                    if (method_exists($controller, $action)) {
                        call_user_func_array([$controller, $action], $params);
                        return;
                    }
                }
            }
        }

        $errorController = new \App\Controllers\ErrorController();
        $errorController->notFound();
    }
}
