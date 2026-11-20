<?php
namespace Core;

class SEO {
    /**
     * Get SEO data for a specific page and language.
     * 
     * @param string $page The page identifier (e.g., 'home', 'about', 'contact', 'thrive-prep')
     * @param string|null $lang The language code ('az', 'en', 'ru'). Defaults to current language.
     * @return array Returns an array with title, meta_desc, meta_keywords, og_image.
     */
    public static function getForPage($page, $lang = null) {
        if (!$lang) {
            $lang = Language::current() ?: 'az';
        }
        
        $pageClean = str_replace('_', '-', strtolower(trim($page)));
        $pageAlt = str_replace('-', '_', strtolower(trim($page)));

        try {
            $db = Database::getInstance();
            $stmt = $db->prepare("SELECT * FROM seo_settings WHERE page = ? OR page = ? LIMIT 1");
            $stmt->execute([$pageClean, $pageAlt]);
            $row = $stmt->fetch(\PDO::FETCH_ASSOC);

            if ($row) {
                $title = !empty($row["title_{$lang}"]) ? $row["title_{$lang}"] : (!empty($row['title_az']) ? $row['title_az'] : '');
                $desc = !empty($row["description_{$lang}"]) ? $row["description_{$lang}"] : (!empty($row['description_az']) ? $row['description_az'] : '');
                $keywords = !empty($row["keywords_{$lang}"]) ? $row["keywords_{$lang}"] : (!empty($row['keywords_az']) ? $row['keywords_az'] : '');
                $ogImage = !empty($row['og_image']) ? $row['og_image'] : '';

                if ($title && $desc) {
                    return [
                        'title' => $title,
                        'meta_desc' => $desc,
                        'meta_keywords' => $keywords,
                        'og_image' => $ogImage
                    ];
                }
            }
        } catch (\Exception $e) {}

        return self::autoGenerate($pageClean, $lang);
    }

    /**
     * Automatic background SEO generator for any page or route.
     */
    public static function autoGenerate($page, $lang = 'az') {
        $dict = [
            'home' => [
                'az' => [
                    'title' => 'Thrive Education Center | Xaricdə Təhsil, SAT, IELTS & CSCA Hazırlığı',
                    'desc' => 'Thrive Education Center — ABŞ, Avropa və Asiya universitetlərinə 100% tam təqaüdlə qəbul, Digital SAT (1550+ rekordlar), IELTS və CSCA üzrə lider təhsil mərkəzidir.',
                    'keywords' => 'thrive, thrive education center, xaricde tehsil baki, sat hazirligi baki, ielts kursu baki, csca imtahani, tam teqaudlu qebul, amerika universitetleri, avropada pulsuz tehsil, bocconi qebul'
                ],
                'en' => [
                    'title' => 'Thrive Education Center | Study Abroad Consulting, SAT & IELTS Prep Baku',
                    'desc' => 'Thrive Education Center is Baku\'s premier international education hub, securing 100% full-ride merit scholarships to top US, UK, and European universities with proven 1550+ SAT scores.',
                    'keywords' => 'thrive, thrive education center, thrive baku, study abroad azerbaijan, sat preparation baku, ielts course baku, csca exam prep, full merit scholarship, ivy league consulting, study in usa'
                ],
                'ru' => [
                    'title' => 'Thrive Education Center | Обучение за рубежом, подготовка к SAT и IELTS в Баку',
                    'desc' => 'Thrive Education Center — ведущий образовательный центр в Баку. 100% полные гранты и стипендии в вузы США, Европы и Азии, подготовка к Digital SAT (рекорды 1550+), IELTS и CSCA.',
                    'keywords' => 'thrive, thrive education center, thrive баку, обучение за рубежом баку, курсы sat баку, подготовка ielts баку, гранты в сша, бесплатное обучение в европе, поступление в bocconi'
                ]
            ],
            'thrive-prep' => [
                'az' => [
                    'title' => 'ThrivePrep | Ağıllı Self-Study, Sual Bazası & Adaptiv Test Sistemi — Thrive',
                    'desc' => 'ThrivePrep — SAT, IELTS, CSCA və DİM imtahanlarına fərdi hazırlaşmaq üçün 15,000+ sual bazası, AI əsaslı səhv analizi və adaptiv sınaq imtahanları təqdim edən Self-Study platformasıdır.',
                    'keywords' => 'thriveprep, thrive prep, self study baki, sat sual bazasi, ielts online test, csca testleri, dim sinaq imtahani, adaptiv test sistemi, onlayn imtahan hazirligi'
                ],
                'en' => [
                    'title' => 'ThrivePrep | Smart Self-Study Platform & Adaptive Question Bank — Thrive',
                    'desc' => 'ThrivePrep is an advanced adaptive self-study platform featuring 15,000+ exam questions, full-length Bluebook-style SAT mocks, and AI-powered weakness diagnostics.',
                    'keywords' => 'thriveprep, thrive prep, self study platform, sat question bank, digital sat practice test, ielts mock online, csca question bank, adaptive exam software, ai test prep'
                ],
                'ru' => [
                    'title' => 'ThrivePrep | Умная платформа самообучения и банк вопросов — Thrive',
                    'desc' => 'ThrivePrep — интерактивная система самостоятельной подготовки к SAT, IELTS, CSCA и DIM с базой более 15 000 вопросов, видеоразборами и ИИ-аналитикой результатов.',
                    'keywords' => 'thriveprep, thrive prep, самообучение, банк вопросов sat, пробные тесты sat онлайн, тесты ielts онлайн, подготовка к csca, адаптивная система тестирования'
                ]
            ],
            'thrive-mobile' => [
                'az' => [
                    'title' => 'Thrive Mobile | Dərs Cədvəli, Sınaq Nəticələri & Tələbə Tətbiqi — Thrive',
                    'desc' => 'Thrive Mobile — dərs cədvəlinizi, sınaq imtahanı nəticələrinizi, müəllim rəylərini və anlıq bildirişləri bir toxunuşla cibinizə gətirən rəsmi mobil tətbiq.',
                    'keywords' => 'thrive mobile, thrive app, telebe tetbiqi, ders cedveli tetbiqi, sinaq neticeleri izleme, thrive ios android'
                ],
                'en' => [
                    'title' => 'Thrive Mobile | Class Schedules, Exam Analytics & Student App — Thrive',
                    'desc' => 'Thrive Mobile is the official student app providing real-time class timetables, diagnostic mock exam tracking, and automated reminders on iOS & Android.',
                    'keywords' => 'thrive mobile, thrive student app, education app baku, class schedule app, test score tracker, student portal app'
                ],
                'ru' => [
                    'title' => 'Thrive Mobile | Расписание уроков, оценки и мобильное приложение — Thrive',
                    'desc' => 'Thrive Mobile — официальное мобильное приложение для студентов и родителей: расписание уроков, баллы за тесты, пуш-уведомления и связь с преподавателями.',
                    'keywords' => 'thrive mobile, приложение thrive, мобильное приложение для студентов, расписание занятий, аналитика оценок'
                ]
            ],
            'thrive-portal' => [
                'az' => [
                    'title' => 'Thrive Portal (portal.thrive.az) | Tələbə & Valideyn İdarəetmə Mühiti — Thrive',
                    'desc' => 'Thrive Portal (portal.thrive.az) — tələbələrin akademik inkişafını, davamiyyətini, ev tapşırıqlarını və qəbul sənədləşməsini 24/7 izləmək üçün rəsmi tədris portalı.',
                    'keywords' => 'thrive portal, portal thrive az, telebe portali, valideyn kabineti, davamiyyet izleme, lms baki'
                ],
                'en' => [
                    'title' => 'Thrive Portal (portal.thrive.az) | Student & Parent Academic Management — Thrive',
                    'desc' => 'Access the official Thrive Portal (portal.thrive.az) for 24/7 centralized tracking of student academic progress, attendance records, and university application dossiers.',
                    'keywords' => 'thrive portal, portal thrive az, student portal, parent dashboard, attendance management, academic lms'
                ],
                'ru' => [
                    'title' => 'Thrive Portal (portal.thrive.az) | Академический портал для студентов и родителей — Thrive',
                    'desc' => 'Официальный портал Thrive Portal (portal.thrive.az) для мониторинга успеваемости студентов, контроля посещаемости и управления документами для поступления.',
                    'keywords' => 'thrive portal, portal thrive az, студенческий портал, личный кабинет родителя, посещаемость, lms система баку'
                ]
            ],
            'graduates' => [
                'az' => [
                    'title' => 'Məzunlarımız & Nəticələrimiz | SAT 1550+, Harvard & 100% Tam Təqaüdlər — Thrive',
                    'desc' => 'Thrive Education Center məzunlarının rekord nəticələri: SAT 1550+, CSCA 92.5%, Harvard, Bocconi, KAIST və Avropa universitetlərinə 100% tam təqaüdlü qəbullar.',
                    'keywords' => 'thrive mezunlari, sat rekordlari baki, 1550 sat neticesi, bocconi teqaudlu telebeler, kaist telebeleri, xaricde tehsil ugur hekayeleri'
                ],
                'en' => [
                    'title' => 'Our Graduates & Success Stories | SAT 1550+, Top University Grants — Thrive',
                    'desc' => 'Explore the verified success records of Thrive Education graduates: 1550+ SAT scores, 92.5% CSCA records, and full-ride scholarships to Bocconi, KAIST, and Oxford.',
                    'keywords' => 'thrive graduates, sat top scorers baku, 1550 sat score, full scholarship students, bocconi alumni azerbaijan'
                ],
                'ru' => [
                    'title' => 'Наши Выпускники и Истории Успеха | Рекорды SAT 1550+ и 100% Гранты — Thrive',
                    'desc' => 'Рекордные результаты выпускников Thrive Education: баллы SAT 1550+, CSCA 92.5%, поступления со 100% стипендиями в Bocconi, KAIST, MIT, Oxford.',
                    'keywords' => 'выпускники thrive, рекорды sat баку, баллы sat 1550, студенты bocconi со стипендией, гранты на учебу за рубежом'
                ]
            ]
        ];

        $pageKey = strtolower(trim($page));
        $langData = $dict[$pageKey][$lang] ?? ($dict[$pageKey]['az'] ?? null);

        if ($langData) {
            return [
                'title' => $langData['title'],
                'meta_desc' => $langData['desc'],
                'meta_keywords' => $langData['keywords'],
                'og_image' => APP_URL . Settings::get('logo_url', '/assets/images/logo.png')
            ];
        }

        $formattedTitle = ucwords(str_replace(['-', '_'], ' ', $pageKey));
        return [
            'title' => "{$formattedTitle} | Thrive Education Center",
            'meta_desc' => "Thrive Education Center — {$formattedTitle} üzrə premium beynəlxalq təhsil, imtahan hazırlığı və 100% təqaüdlü qəbul konsaltinqi.",
            'meta_keywords' => "{$pageKey}, thrive, thrive education, xaricde tehsil, sat, ielts, azerbaycan",
            'og_image' => APP_URL . Settings::get('logo_url', '/assets/images/logo.png')
        ];
    }

    /**
     * Renders a complete, bulletproof SEO HTML head block including OpenGraph, Twitter Cards,
     * Hreflang, Canonical URL, Robots meta, and multi-tier Schema.org JSON-LD (Knowledge Graph).
     *
     * @param string $page Current page identifier
     * @param array $customData Optional custom SEO overrides
     * @return string HTML output
     */
    public static function renderMetaTags($page = 'home', $customData = []) {
        $lang = Language::current() ?: 'az';
        $seo = self::getForPage($page, $lang);

        $title = !empty($customData['title']) ? $customData['title'] : $seo['title'];
        $desc = !empty($customData['meta_desc']) ? $customData['meta_desc'] : $seo['meta_desc'];
        $keywords = !empty($customData['meta_keywords']) ? $customData['meta_keywords'] : $seo['meta_keywords'];
        $image = !empty($customData['og_image']) ? $customData['og_image'] : ($seo['og_image'] ?: (APP_URL . Settings::get('logo_url', '/assets/images/logo.png')));

        // Canonical URL
        $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || ($_SERVER['SERVER_PORT'] ?? 80) == 443) ? "https://" : "http://";
        $host = $_SERVER['HTTP_HOST'] ?? 'thrive.az';
        $path = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH);
        $canonicalUrl = rtrim($protocol . $host, '/') . $path;
        $baseUrl = rtrim($protocol . $host, '/');

        // Locale mapping
        $localeMap = [
            'az' => 'az_AZ',
            'en' => 'en_US',
            'ru' => 'ru_RU'
        ];
        $ogLocale = $localeMap[$lang] ?? 'az_AZ';

        // 1. Google Knowledge Graph & EducationalOrganization Schema
        $orgSchema = [
            "@context" => "https://schema.org",
            "@type" => "EducationalOrganization",
            "@id" => $baseUrl . "#organization",
            "name" => "Thrive Education Center",
            "alternateName" => [
                "Thrive",
                "Thrive Azerbaijan",
                "Thrive Baku",
                "ThrivePrep",
                "Thrive Portal",
                "Thrive Mobile",
                "Thrive Creation Lab",
                "Thrive Study Abroad",
                "Thrive İmtahan Mərkəzi"
            ],
            "url" => $baseUrl,
            "logo" => [
                "@type" => "ImageObject",
                "url" => $baseUrl . Settings::get('logo_url', '/assets/images/logo.png'),
                "width" => "300",
                "height" => "100"
            ],
            "image" => $baseUrl . Settings::get('logo_url', '/assets/images/logo.png'),
            "description" => $desc,
            "slogan" => "Empowering Future Leaders for the Global Stage & 100% Merit Scholarship Admissions",
            "founder" => [
                "@type" => "Person",
                "name" => "Tamerlan Mammadov",
                "jobTitle" => "Founder & Chief Admissions Strategist",
                "url" => $baseUrl . "/about"
            ],
            "address" => [
                "@type" => "PostalAddress",
                "streetAddress" => "17C Said Rustamov St, Sabayil district",
                "addressLocality" => "Baku",
                "addressRegion" => "Sabayil",
                "postalCode" => "AZ1000",
                "addressCountry" => "AZ"
            ],
            "geo" => [
                "@type" => "GeoCoordinates",
                "latitude" => 40.3694,
                "longitude" => 49.8329
            ],
            "contactPoint" => [
                "@type" => "ContactPoint",
                "telephone" => "+994994466000",
                "contactType" => "admissions",
                "email" => "info@thrive.az",
                "areaServed" => ["AZ", "TR", "US", "EU"],
                "availableLanguage" => ["Azerbaijani", "English", "Russian"]
            ],
            "openingHoursSpecification" => [
                "@type" => "OpeningHoursSpecification",
                "dayOfWeek" => ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
                "opens" => "09:00",
                "closes" => "20:00"
            ],
            "sameAs" => [
                "https://www.instagram.com/thrive.education.center/",
                "https://portal.thrive.az",
                "https://wa.me/994994466000"
            ]
        ];

        // 2. Google Sitelinks SearchBox Schema for Website
        $websiteSchema = [
            "@context" => "https://schema.org",
            "@type" => "WebSite",
            "@id" => $baseUrl . "#website",
            "name" => "Thrive Education Center",
            "url" => $baseUrl,
            "publisher" => [
                "@id" => $baseUrl . "#organization"
            ],
            "potentialAction" => [
                "@type" => "SearchAction",
                "target" => $baseUrl . "/blog?search={search_term_string}",
                "query-input" => "required name=search_term_string"
            ]
        ];

        // 3. BreadcrumbList Schema for Google Search Results
        $breadcrumbSchema = [
            "@context" => "https://schema.org",
            "@type" => "BreadcrumbList",
            "itemListElement" => [
                [
                    "@type" => "ListItem",
                    "position" => 1,
                    "name" => "Home",
                    "item" => $baseUrl
                ]
            ]
        ];

        if ($page !== 'home') {
            $breadcrumbSchema['itemListElement'][] = [
                "@type" => "ListItem",
                "position" => 2,
                "name" => $title,
                "item" => $canonicalUrl
            ];
        }

        // 4. Software Application Schema for ThrivePrep & Thrive Mobile
        $appSchema = null;
        if (in_array($page, ['thrive-prep', 'thrive_prep'])) {
            $appSchema = [
                "@context" => "https://schema.org",
                "@type" => "SoftwareApplication",
                "name" => "ThrivePrep",
                "operatingSystem" => "Web, iOS, Android",
                "applicationCategory" => "EducationalApplication",
                "offers" => [
                    "@type" => "Offer",
                    "price" => "0",
                    "priceCurrency" => "AZN"
                ],
                "description" => "Smart adaptive Self-Study platform featuring 15,000+ questions for SAT, CSCA, IELTS, and DIM."
            ];
        }

        $html  = "    <!-- High-Impact Primary SEO Meta Tags -->\n";
        $html .= "    <meta charset=\"UTF-8\">\n";
        $html .= "    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0, maximum-scale=5.0\">\n";
        $html .= "    <title>" . htmlspecialchars($title) . "</title>\n";
        $html .= "    <meta name=\"description\" content=\"" . htmlspecialchars($desc) . "\">\n";
        $html .= "    <meta name=\"keywords\" content=\"" . htmlspecialchars($keywords) . "\">\n";
        $html .= "    <meta name=\"author\" content=\"Thrive Education Center\">\n";
        $html .= "    <meta name=\"publisher\" content=\"Thrive Education Center\">\n";
        $html .= "    <meta name=\"robots\" content=\"index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1\">\n";
        $html .= "    <meta name=\"googlebot\" content=\"index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1\">\n";
        $html .= "    <meta name=\"bingbot\" content=\"index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1\">\n";
        $html .= "    <link rel=\"canonical\" href=\"" . htmlspecialchars($canonicalUrl) . "\">\n\n";

        $html .= "    <!-- Geo & Local SEO Tags (Baku, Azerbaijan) -->\n";
        $html .= "    <meta name=\"geo.region\" content=\"AZ-BA\">\n";
        $html .= "    <meta name=\"geo.placename\" content=\"Baku, Azerbaijan\">\n";
        $html .= "    <meta name=\"geo.position\" content=\"40.3694;49.8329\">\n";
        $html .= "    <meta name=\"ICBM\" content=\"40.3694, 49.8329\">\n";
        $html .= "    <meta name=\"rating\" content=\"General\">\n";
        $html .= "    <meta name=\"revisit-after\" content=\"2 days\">\n\n";

        $html .= "    <!-- Trilingual Hreflang Tags -->\n";
        $html .= "    <link rel=\"alternate\" hreflang=\"az\" href=\"" . htmlspecialchars($canonicalUrl . '?lang=az') . "\" />\n";
        $html .= "    <link rel=\"alternate\" hreflang=\"en\" href=\"" . htmlspecialchars($canonicalUrl . '?lang=en') . "\" />\n";
        $html .= "    <link rel=\"alternate\" hreflang=\"ru\" href=\"" . htmlspecialchars($canonicalUrl . '?lang=ru') . "\" />\n";
        $html .= "    <link rel=\"alternate\" hreflang=\"x-default\" href=\"" . htmlspecialchars($canonicalUrl) . "\" />\n\n";

        $html .= "    <!-- OpenGraph / Facebook / WhatsApp Meta Tags -->\n";
        $html .= "    <meta property=\"og:title\" content=\"" . htmlspecialchars($title) . "\">\n";
        $html .= "    <meta property=\"og:description\" content=\"" . htmlspecialchars($desc) . "\">\n";
        $html .= "    <meta property=\"og:type\" content=\"website\">\n";
        $html .= "    <meta property=\"og:url\" content=\"" . htmlspecialchars($canonicalUrl) . "\">\n";
        $html .= "    <meta property=\"og:image\" content=\"" . htmlspecialchars($image) . "\">\n";
        $html .= "    <meta property=\"og:image:alt\" content=\"Thrive Education Center\">\n";
        $html .= "    <meta property=\"og:site_name\" content=\"Thrive Education Center\">\n";
        $html .= "    <meta property=\"og:locale\" content=\"" . htmlspecialchars($ogLocale) . "\">\n";
        $html .= "    <meta property=\"og:locale:alternate\" content=\"az_AZ\">\n";
        $html .= "    <meta property=\"og:locale:alternate\" content=\"en_US\">\n";
        $html .= "    <meta property=\"og:locale:alternate\" content=\"ru_RU\">\n\n";

        $html .= "    <!-- Twitter Card Meta Tags -->\n";
        $html .= "    <meta name=\"twitter:card\" content=\"summary_large_image\">\n";
        $html .= "    <meta name=\"twitter:title\" content=\"" . htmlspecialchars($title) . "\">\n";
        $html .= "    <meta name=\"twitter:description\" content=\"" . htmlspecialchars($desc) . "\">\n";
        $html .= "    <meta name=\"twitter:image\" content=\"" . htmlspecialchars($image) . "\">\n";
        $html .= "    <meta name=\"twitter:site\" content=\"@thrive_edu\">\n\n";

        $html .= "    <!-- Schema.org Knowledge Graph JSON-LD -->\n";
        $html .= "    <script type=\"application/ld+json\">\n";
        $html .= "    " . json_encode($orgSchema, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) . "\n";
        $html .= "    </script>\n";

        $html .= "    <script type=\"application/ld+json\">\n";
        $html .= "    " . json_encode($websiteSchema, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) . "\n";
        $html .= "    </script>\n";

        $html .= "    <script type=\"application/ld+json\">\n";
        $html .= "    " . json_encode($breadcrumbSchema, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) . "\n";
        $html .= "    </script>\n";

        if ($appSchema) {
            $html .= "    <script type=\"application/ld+json\">\n";
            $html .= "    " . json_encode($appSchema, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) . "\n";
            $html .= "    </script>\n";
        }

        if (!empty($customData['schema'])) {
            $html .= "    <script type=\"application/ld+json\">\n";
            $html .= "    " . json_encode($customData['schema'], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) . "\n";
            $html .= "    </script>\n";
        }

        return $html;
    }
}