<?php

namespace App\Controllers;

use Core\Database;

class SitemapController {
    public function index() {
        $db = Database::getInstance();
        $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || ($_SERVER['SERVER_PORT'] ?? 80) == 443) ? "https://" : "http://";
        $host = $_SERVER['HTTP_HOST'] ?? 'thrive.az';
        $appUrl = rtrim($protocol . $host, '/');

        // Static routes with priorities
        $staticRoutes = [
            '/' => ['priority' => '1.0', 'changefreq' => 'daily'],
            '/thrive-prep' => ['priority' => '0.95', 'changefreq' => 'weekly'],
            '/thrive-mobile' => ['priority' => '0.90', 'changefreq' => 'weekly'],
            '/thrive-portal' => ['priority' => '0.90', 'changefreq' => 'weekly'],
            '/graduates' => ['priority' => '0.95', 'changefreq' => 'weekly'],
            '/education' => ['priority' => '0.90', 'changefreq' => 'weekly'],
            '/study-abroad' => ['priority' => '0.95', 'changefreq' => 'weekly'],
            '/creation-lab' => ['priority' => '0.85', 'changefreq' => 'weekly'],
            '/about' => ['priority' => '0.85', 'changefreq' => 'monthly'],
            '/blog' => ['priority' => '0.90', 'changefreq' => 'daily'],
            '/booking' => ['priority' => '0.90', 'changefreq' => 'weekly'],
            '/contact' => ['priority' => '0.85', 'changefreq' => 'monthly'],
            '/privacy-policy' => ['priority' => '0.3', 'changefreq' => 'yearly'],
            '/terms-of-service' => ['priority' => '0.3', 'changefreq' => 'yearly'],
            '/cookie-policy' => ['priority' => '0.3', 'changefreq' => 'yearly'],
        ];

        $dynamicUrls = [];

        // Fetch Study Abroad Countries / Universities
        try {
            $stmt = $db->query("SELECT slug, updated_at FROM study_abroad WHERE status = 'active' ORDER BY updated_at DESC");
            while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
                $dynamicUrls[] = [
                    'loc' => '/study-abroad/' . $row['slug'],
                    'lastmod' => !empty($row['updated_at']) ? date('Y-m-d', strtotime($row['updated_at'])) : date('Y-m-d'),
                    'priority' => '0.85',
                    'changefreq' => 'weekly'
                ];
            }
        } catch (\Exception $e) {}

        // Fetch Blogs
        try {
            $stmt = $db->query("SELECT slug, updated_at FROM blog_posts WHERE status = 'published' ORDER BY updated_at DESC");
            while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
                $dynamicUrls[] = [
                    'loc' => '/blog/' . $row['slug'],
                    'lastmod' => !empty($row['updated_at']) ? date('Y-m-d', strtotime($row['updated_at'])) : date('Y-m-d'),
                    'priority' => '0.80',
                    'changefreq' => 'monthly'
                ];
            }
        } catch (\Exception $e) {}

        header('Content-Type: application/xml; charset=utf-8');
        echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xhtml="http://www.w3.org/1999/xhtml">' . "\n";

        $today = date('Y-m-d');

        foreach ($staticRoutes as $route => $meta) {
            $loc = $appUrl . $route;
            echo "    <url>\n";
            echo "        <loc>" . htmlspecialchars($loc) . "</loc>\n";
            echo "        <xhtml:link rel=\"alternate\" hreflang=\"az\" href=\"" . htmlspecialchars($loc . ($route === '/' ? '?lang=az' : '?lang=az')) . "\" />\n";
            echo "        <xhtml:link rel=\"alternate\" hreflang=\"en\" href=\"" . htmlspecialchars($loc . ($route === '/' ? '?lang=en' : '?lang=en')) . "\" />\n";
            echo "        <xhtml:link rel=\"alternate\" hreflang=\"ru\" href=\"" . htmlspecialchars($loc . ($route === '/' ? '?lang=ru' : '?lang=ru')) . "\" />\n";
            echo "        <xhtml:link rel=\"alternate\" hreflang=\"x-default\" href=\"" . htmlspecialchars($loc) . "\" />\n";
            echo "        <lastmod>" . $today . "</lastmod>\n";
            echo "        <changefreq>" . $meta['changefreq'] . "</changefreq>\n";
            echo "        <priority>" . $meta['priority'] . "</priority>\n";
            echo "    </url>\n";
        }

        foreach ($dynamicUrls as $d) {
            $loc = $appUrl . $d['loc'];
            echo "    <url>\n";
            echo "        <loc>" . htmlspecialchars($loc) . "</loc>\n";
            echo "        <xhtml:link rel=\"alternate\" hreflang=\"az\" href=\"" . htmlspecialchars($loc . '?lang=az') . "\" />\n";
            echo "        <xhtml:link rel=\"alternate\" hreflang=\"en\" href=\"" . htmlspecialchars($loc . '?lang=en') . "\" />\n";
            echo "        <xhtml:link rel=\"alternate\" hreflang=\"ru\" href=\"" . htmlspecialchars($loc . '?lang=ru') . "\" />\n";
            echo "        <xhtml:link rel=\"alternate\" hreflang=\"x-default\" href=\"" . htmlspecialchars($loc) . "\" />\n";
            echo "        <lastmod>" . $d['lastmod'] . "</lastmod>\n";
            echo "        <changefreq>" . $d['changefreq'] . "</changefreq>\n";
            echo "        <priority>" . $d['priority'] . "</priority>\n";
            echo "    </url>\n";
        }

        echo '</urlset>';
        exit;
    }
}