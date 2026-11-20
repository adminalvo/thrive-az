<?php
session_start();
header('Content-Type: text/html; charset=UTF-8');
mb_internal_encoding('UTF-8');
if (function_exists('mb_http_output')) {
    mb_http_output('UTF-8');
}

if (php_sapi_name() == 'cli-server') {
    $path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
    if (is_file(__DIR__ . $path)) {
        return false;
    }
}

// ====== Fast IP Geolocation & VPN Blocker ======
if (!isset($_SESSION['ip_checked'])) {
    $host = $_SERVER['HTTP_HOST'] ?? '';
    $isLocal = strpos($host, 'localhost') !== false || strpos($host, '127.0.0.1') !== false || php_sapi_name() === 'cli-server';
    
    if (!$isLocal) {
        $clientIp = $_SERVER['HTTP_X_FORWARDED_FOR'] ?? $_SERVER['REMOTE_ADDR'] ?? '';
        if (strpos($clientIp, ',') !== false) {
            $clientIp = explode(',', $clientIp)[0];
        }
        $clientIp = trim($clientIp);

        if (!in_array($clientIp, ['127.0.0.1', '::1', 'localhost']) && filter_var($clientIp, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE)) {
            $url = "http://ip-api.com/json/{$clientIp}?fields=status,countryCode,proxy,hosting";
            $ctx = stream_context_create(['http' => ['timeout' => 1]]);
            $response = @file_get_contents($url, false, $ctx);
            if ($response) {
                $data = json_decode($response, true);
                if (isset($data['status']) && $data['status'] === 'success') {
                    $allowedCountries = ['AZ', 'TR', 'RU'];
                    if (!in_array($data['countryCode'], $allowedCountries)) {
                        die("<div style='font-family:sans-serif; text-align:center; padding:100px; color:#333;'><h1 style='color:#ef4444;'>Access Denied</h1><p>Sorry, Thrive Education Center is only available in Azerbaijan, Turkey, and Russia.</p></div>");
                    }
                    if (!empty($data['proxy'])) {
                        die("<div style='font-family:sans-serif; text-align:center; padding:100px; color:#333;'><h1 style='color:#ef4444;'>VPN Detected</h1><p>Please disable your VPN or Proxy to access this site.</p></div>");
                    }
                    if (!empty($data['hosting'])) {
                        die("<div style='font-family:sans-serif; text-align:center; padding:100px; color:#333;'><h1 style='color:#ef4444;'>Access Denied</h1><p>Connections from hosting centers are not allowed.</p></div>");
                    }
                }
            }
        }
    }
    $_SESSION['ip_checked'] = true;
}
// ==========================================

require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../core/Language.php';

if (isset($_GET['lang'])) {
    \Core\Language::setLang($_GET['lang']);
    $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $query = $_GET;
    unset($query['lang']);
    $qs = http_build_query($query);
    $redirect = $uri . ($qs ? '?' . $qs : '');
    header("Location: $redirect");
    exit;
}
\Core\Language::load();


// Sadə Autoloader (Namespace-ləri fayl yollarına çevirir)
spl_autoload_register(function ($class) {
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);
    // Core\Router üçün core/Router.php və ya App\Controllers\ üçün app/Controllers/
    $folder = explode(DIRECTORY_SEPARATOR, $class)[0];
    if($folder === 'Core' || $folder === 'App') {
        $class = lcfirst($class);
    }
    $file = __DIR__ . '/../' . $class . '.php';
    if (file_exists($file)) {
        require_once $file;
    }
});

use Core\Router;

// ====== Visitor Tracking ======
$trackUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) ?? '/';
// Ignore admin and common static files
if (strpos($trackUri, '/admin') !== 0 && !preg_match('/\.(jpg|jpeg|png|gif|ico|css|js|xml)$/i', $trackUri)) {
    try {
        $db = \Core\Database::getInstance();
        // Create table if not exists (SQLite auto-increment is INTEGER PRIMARY KEY AUTOINCREMENT)
        $db->exec("CREATE TABLE IF NOT EXISTS site_visits (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            ip_address VARCHAR(45) NOT NULL,
            page_url VARCHAR(255) NOT NULL,
            visited_at DATETIME DEFAULT CURRENT_TIMESTAMP
        )");
        try {
            $db->exec("ALTER TABLE site_visits ADD COLUMN user_agent TEXT");
        } catch (\Exception $e) {}
        
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'] ?? $_SERVER['REMOTE_ADDR'] ?? '';
        if (strpos($ip, ',') !== false) {
            $ip = explode(',', $ip)[0];
        }
        $ip = trim($ip);
        $userAgent = $_SERVER['HTTP_USER_AGENT'] ?? '';
        
        $stmt = $db->prepare("INSERT INTO site_visits (ip_address, page_url, user_agent) VALUES (?, ?, ?)");
        $stmt->execute([$ip, $trackUri, $userAgent]);
    } catch (\Exception $e) {
        // Silently ignore tracking errors so they don't break the site
    }
}
// ==============================

$router = new Router();

// Marşrutları (Routes) yükləyirik
require_once __DIR__ . '/../routes/web.php';
require_once __DIR__ . '/../routes/admin.php';

// Sitemap route
$router->get('/sitemap.xml', 'SitemapController@index');

// Dynamic Page route (Must be last to not catch /admin or other valid routes)
$router->get('/{slug}', 'DynamicPageController@show');

// Request-i dispetçerləşdiririk
$router->dispatch($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
