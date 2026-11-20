<?php
namespace App\Controllers;

use Core\Controller;
use Core\Database;

class SeoController extends Controller {
    /**
     * Generate dynamic XML Sitemap containing static pages and all dynamic routes
     * (universities, blog posts, courses) with multi-lingual hreflang links.
     */
    public function sitemap() {
        header("Content-Type: application/xml; charset=utf-8");
        
        echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"' . "\n";
        echo '        xmlns:xhtml="http://www.w3.org/1999/xhtml">' . "\n";
        
        $baseUrl = rtrim(APP_URL, '/');

        // Complete Static Routes
        $staticPages = [
            '/' => ['freq' => 'daily', 'priority' => '1.0'],
            '/education' => ['freq' => 'weekly', 'priority' => '0.9'],
            '/study-abroad' => ['freq' => 'weekly', 'priority' => '0.9'],
            '/graduates' => ['freq' => 'weekly', 'priority' => '0.8'],
            '/creation-lab' => ['freq' => 'monthly', 'priority' => '0.8'],
            '/self-study' => ['freq' => 'monthly', 'priority' => '0.8'],
            '/about' => ['freq' => 'monthly', 'priority' => '0.7'],
            '/blog' => ['freq' => 'weekly', 'priority' => '0.8'],
            '/contact' => ['freq' => 'monthly', 'priority' => '0.7'],
            '/parents' => ['freq' => 'monthly', 'priority' => '0.6'],
            '/thrive-mobile' => ['freq' => 'monthly', 'priority' => '0.6'],
            '/privacy-policy' => ['freq' => 'yearly', 'priority' => '0.3'],
            '/terms-of-service' => ['freq' => 'yearly', 'priority' => '0.3'],
            '/cookie-policy' => ['freq' => 'yearly', 'priority' => '0.3']
        ];
        
        foreach ($staticPages as $path => $meta) {
            $url = $baseUrl . $path;
            $this->renderUrlEntry($url, $meta['freq'], $meta['priority'], [
                'az' => $url . '?lang=az',
                'en' => $url . '?lang=en',
                'ru' => $url . '?lang=ru',
                'x-default' => $url
            ]);
        }
        
        // Dynamic Universities
        try {
            $db = Database::getInstance();
            $stmt = $db->query("SELECT id FROM study_abroad_universities");
            while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
                $url = $baseUrl . '/study-abroad/university/' . $row['id'];
                $this->renderUrlEntry($url, 'weekly', '0.8', [
                    'az' => $url . '?lang=az',
                    'en' => $url . '?lang=en',
                    'ru' => $url . '?lang=ru',
                    'x-default' => $url
                ]);
            }
        } catch (\Exception $e) {
            // Ignore if table not present
        }

        // Dynamic Blogs
        try {
            $db = Database::getInstance();
            $stmt = $db->query("SELECT slug, created_at FROM blogs");
            while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
                $url = $baseUrl . '/blog/' . $row['slug'];
                $date = !empty($row['created_at']) ? date('Y-m-d', strtotime($row['created_at'])) : date('Y-m-d');
                $this->renderUrlEntry($url, 'monthly', '0.7', [
                    'az' => $url . '?lang=az',
                    'en' => $url . '?lang=en',
                    'ru' => $url . '?lang=ru',
                    'x-default' => $url
                ], $date);
            }
        } catch (\Exception $e) {
            // Ignore if table not present
        }

        echo '</urlset>';
    }

    private function renderUrlEntry($loc, $freq, $priority, $hreflangs = [], $lastmod = null) {
        echo "  <url>\n";
        echo "    <loc>" . htmlspecialchars($loc) . "</loc>\n";
        if ($lastmod) {
            echo "    <lastmod>" . $lastmod . "</lastmod>\n";
        }
        echo "    <changefreq>" . $freq . "</changefreq>\n";
        echo "    <priority>" . $priority . "</priority>\n";
        foreach ($hreflangs as $lang => $href) {
            echo "    <xhtml:link rel=\"alternate\" hreflang=\"" . $lang . "\" href=\"" . htmlspecialchars($href) . "\" />\n";
        }
        echo "  </url>\n";
    }

    public function robots() {
        header("Content-Type: text/plain; charset=utf-8");
        echo "User-agent: *\n";
        echo "Allow: /\n";
        echo "Disallow: /admin/\n";
        echo "Disallow: /storage/\n";
        echo "Disallow: /core/\n";
        echo "\nSitemap: " . APP_URL . "/sitemap.xml\n";
    }
}
