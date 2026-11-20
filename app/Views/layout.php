<!DOCTYPE html>
<html lang="<?= \Core\Language::current() ?>">
<head>
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-TDL72WKB');</script>
    <!-- End Google Tag Manager -->
    <?php
    $request_uri = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH);
    $route_parts = explode('/', trim($request_uri ?? '', '/'));
    $current_page = $route_parts[0] ?: 'home';

    echo \Core\SEO::renderMetaTags($current_page, [
        'title' => $title ?? null,
        'meta_desc' => $meta_desc ?? null,
        'meta_keywords' => $meta_keywords ?? null,
        'og_image' => $og_image ?? null,
        'schema' => $schemaData ?? null
    ]);
    ?>
    
    <!-- Favicon & PWA Icons -->
    <link rel="icon" type="image/png" sizes="32x32" href="<?= APP_URL ?>/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?= APP_URL ?>/assets/images/icons/icon-96x96.png">
    <link rel="icon" type="image/png" href="<?= APP_URL ?>/favicon.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= APP_URL ?>/assets/images/icons/icon-192x192.png">
    <link rel="apple-touch-icon" sizes="192x192" href="<?= APP_URL ?>/assets/images/icons/icon-192x192.png">
    <link rel="apple-touch-icon" sizes="512x512" href="<?= APP_URL ?>/assets/images/icons/icon-512x512.png">
    
    <!-- PWA (Progressive Web App) Support -->
    <link rel="manifest" href="<?= APP_URL ?>/manifest.json">
    <meta name="theme-color" content="#000b21">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="apple-mobile-web-app-title" content="Thrive">
    <meta name="application-name" content="Thrive Education">
    
    <link rel="stylesheet" href="<?= APP_URL ?>/assets/css/style.css">
    
    <!-- Dynamic Global Theme Settings -->
    <style>
        :root {
            --deep-navy: <?= \Core\Settings::get('primary_color', '#000b21') ?> !important;
            --ocean-blue: <?= \Core\Settings::get('ocean_blue', '#003f82') ?> !important;
            --aqua-teal: <?= \Core\Settings::get('secondary_color', '#4ca2b5') ?> !important;
            --gray-light: <?= \Core\Settings::get('body_bg_color', '#f4f7f6') ?> !important;
            --font-body: '<?= \Core\Settings::get('font_family', 'Poppins') ?>', sans-serif !important;
            --gradient-primary: linear-gradient(<?= \Core\Settings::get('gradient_angle', '135deg') ?>, var(--deep-navy) 0%, var(--ocean-blue) 50%, var(--aqua-teal) 100%) !important;
        }
        body { background-color: var(--gray-light) !important; }
        .solid-header { background: <?= \Core\Settings::get('header_bg_color', '#000b21') ?> !important; }
        .premium-hero { border-top: none !important; }
        header { border-bottom: none !important; }
    </style>
    
    <!-- AOS Animation Library CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        /* Force onWebChat live chat widget to be always on top without overriding its internal display toggles */
        #onwebchat-widget, #onwebchat_widget, #onwebchat-chat-box {
            z-index: 2147483647 !important;
        }
    </style>

    <!-- onWebChat Live AI Chat Script -->
    <script type='text/javascript'>
    var onWebChat={ar:[], set: function(a,b){if (typeof onWebChat_==='undefined'){this.ar.
    push([a,b]);}else{onWebChat_.set(a,b);}},get:function(a){return(onWebChat_.get(a));},
    w:(function(){ var ga=document.createElement('script'); ga.type = 'text/javascript';
    ga.async=1;ga.src=('https:'==document.location.protocol?'https:':'http:') + 
    '//www.onwebchat.com/clientchat/a632e507545f197a10421f7c6078c2f0';var s=
    document.getElementsByTagName('script')[0];s.parentNode.insertBefore(ga,s);})()}
    </script>
</head>
<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TDL72WKB"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <!-- Preloader (Breathing Logo Only) -->
    <div id="preloader" style="position: fixed; inset: 0; background: var(--deep-navy); z-index: 999999; display: flex; align-items: center; justify-content: center;">
        <div class="preloader-content" style="text-align: center;">
            <img src="<?= APP_URL . \Core\Settings::get('logo_url', '/assets/images/logo.png') ?>" alt="Thrive" class="preloader-breathing-logo">
        </div>
    </div>
    <style>
    .preloader-breathing-logo {
        max-height: 150px;
        width: auto;
        animation: logoBreathe 1.8s ease-in-out infinite;
    }
    @keyframes logoBreathe {
        0%, 100% {
            transform: scale(0.95);
            opacity: 0.82;
            filter: drop-shadow(0 0 15px rgba(76,162,181,0.25));
        }
        50% {
            transform: scale(1.08);
            opacity: 1;
            filter: drop-shadow(0 0 45px rgba(76,162,181,0.75));
        }
    }
    </style>

    <!-- Header -->
    <header class="<?= isset($darkHeader) && $darkHeader ? 'solid-header' : '' ?>">
        <div class="container nav-wrapper" style="display: flex; justify-content: space-between; align-items: center; position: relative;">
            <div class="logo-container" style="flex: 1; display: flex; justify-content: flex-start;">
                <a href="<?= APP_URL ?>" class="logo" style="display:flex; align-items:center;">
                    <img src="<?= APP_URL . \Core\Settings::get('logo_url', '/assets/images/logo.png') ?>" alt="Thrive Logo" class="header-logo">
                </a>
            </div>
            
            <nav style="flex: 2; display: flex; justify-content: center;">
                <ul class="nav-links" style="width: auto; justify-content: center;">
                    <li><a href="<?= APP_URL ?>/education"><?= \Core\Language::get('education') ?></a></li>
                    <li><a href="<?= APP_URL ?>/study-abroad"><?= \Core\Language::get('study_abroad') ?></a></li>
                    <li><a href="<?= APP_URL ?>/graduates"><?= \Core\Language::get('graduates') ?></a></li>
                    <li><a href="<?= APP_URL ?>/about"><?= \Core\Language::get('about') ?></a></li>
                    <li><a href="<?= APP_URL ?>/blog"><?= \Core\Language::get('blog') ?></a></li>
                    
                    <!-- Mobile actions (hidden on desktop) -->
                    <li class="nav-actions-mobile" style="margin: 20px 0; display: flex; flex-direction: column; gap: 20px; align-items: center;">
                        <div style="display: flex; gap: 15px; align-items: center;">
                            <a href="https://portal.thrive.az" target="_blank" rel="noopener" title="Thrive Portal - Tələbə Portalı" style="display: flex; align-items: center; justify-content: center; width: 44px; height: 44px; border-radius: 50%; background: linear-gradient(135deg, var(--ocean-blue), var(--aqua-teal)); color: #fff; box-shadow: 0 4px 15px rgba(76, 162, 181, 0.4); transition: transform 0.3s; text-decoration: none; border: 1px solid rgba(255,255,255,0.2);">
                                <i class="fa-solid fa-graduation-cap" style="font-size: 18px;"></i>
                            </a>
                            <a href="<?= APP_URL ?>/contact" class="btn" style="padding: 8px 15px; color: #fff;"><?= \Core\Language::get('contact') ?></a>
                        </div>
                        <div class="lang-switcher-top lang-dropdown">
                            <?php $cLang = \Core\Language::current(); ?>
                            <button class="lang-dropbtn"><?= strtoupper($cLang) ?> <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 9l6 6 6-6"/></svg></button>
                            <div class="lang-dropdown-content">
                                <?php
                                    $qs_az = $_GET; $qs_az['lang'] = 'az';
                                    $qs_en = $_GET; $qs_en['lang'] = 'en';
                                    $qs_ru = $_GET; $qs_ru['lang'] = 'ru';
                                ?>
                                <a href="?<?= http_build_query($qs_az) ?>" class="<?= $cLang == 'az' ? 'active' : '' ?>">AZ</a> 
                                <a href="?<?= http_build_query($qs_en) ?>" class="<?= $cLang == 'en' ? 'active' : '' ?>">EN</a> 
                                <a href="?<?= http_build_query($qs_ru) ?>" class="<?= $cLang == 'ru' ? 'active' : '' ?>">RU</a>
                            </div>
                        </div>
                    </li>
                </ul>
            </nav>

            <div style="flex: 1; display: flex; justify-content: flex-end; align-items: center; gap: 20px;">
                <!-- Desktop actions -->
                <div class="nav-actions-desktop" style="display: flex; gap: 20px; align-items: center;">
                    <a href="https://portal.thrive.az" target="_blank" rel="noopener" title="Thrive Portal (Tələbə Portalı - portal.thrive.az)" class="portal-nav-btn" style="display: flex; align-items: center; justify-content: center; width: 42px; height: 42px; border-radius: 50%; background: linear-gradient(135deg, var(--ocean-blue), var(--aqua-teal)); color: #fff; box-shadow: 0 4px 15px rgba(76, 162, 181, 0.4); transition: all 0.3s ease; text-decoration: none; border: 1px solid rgba(255,255,255,0.25);">
                        <i class="fa-solid fa-graduation-cap" style="font-size: 18px;"></i>
                    </a>
                    <a href="<?= APP_URL ?>/contact" class="btn" style="padding: 8px 15px; color: #fff;"><?= \Core\Language::get('contact') ?></a>
                    <div class="lang-switcher-top lang-dropdown">
                        <button class="lang-dropbtn"><?= strtoupper($cLang) ?> <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 9l6 6 6-6"/></svg></button>
                        <div class="lang-dropdown-content">
                            <a href="?<?= http_build_query($qs_az) ?>" class="<?= $cLang == 'az' ? 'active' : '' ?>">AZ</a> 
                            <a href="?<?= http_build_query($qs_en) ?>" class="<?= $cLang == 'en' ? 'active' : '' ?>">EN</a> 
                            <a href="?<?= http_build_query($qs_ru) ?>" class="<?= $cLang == 'ru' ? 'active' : '' ?>">RU</a>
                        </div>
                    </div>

                </div>
                
                <div class="hamburger">
                    <span></span><span></span><span></span>
                </div>
            </div>
            
            <style>
                @media (min-width: 1101px) {
                    .nav-actions-mobile { display: none !important; }
                }
                @media (max-width: 1100px) {
                    .nav-actions-desktop { display: none !important; }
                    .logo-container { position: absolute; left: 50%; transform: translateX(-50%); z-index: 10; }
                }
            </style>
        </div>
    </header>

    <main>
        <?php require VIEW_PATH . '/' . $contentView . '.php'; ?>
    </main>

    <!-- Compact Instagram Video Preview Section (Directly Above Footer) -->
    <section class="insta-compact-section" style="padding: 35px 0 30px; background: linear-gradient(180deg, var(--bg-secondary) 0%, #000717 100%); border-top: 1px solid var(--border-color); position: relative; overflow: hidden;">
        <div class="container" style="max-width: 1080px;">
            <!-- Header -->
            <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 15px; margin-bottom: 20px;">
                <div style="display: flex; align-items: center; gap: 10px;">
                    <i class="fa-brands fa-instagram" style="font-size: 1.4rem; color: #e1306c;"></i>
                    <h3 style="font-size: 1.25rem; color: var(--heading-color); font-family: var(--font-heading); margin: 0; font-weight: 700;">
                        <?= \Core\Language::get('insta_section_title') ?>
                    </h3>
                </div>
                <a href="https://www.instagram.com/thrive.education.center/" target="_blank" rel="noopener" class="insta-profile-badge">
                    <span>@thrive.education.center</span>
                    <i class="fa-solid fa-arrow-up-right-from-square" style="font-size: 0.7rem;"></i>
                </a>
            </div>

            <?php
            $instaPosts = [
                ['code' => 'Db6YMq8gXXB', 'title' => 'SAT & Təhsil Taktikaları', 'views' => '28K'],
                ['code' => 'DcG-J1lADZc', 'title' => 'Tələbə Nəticələri & Qəbullar', 'views' => '35K'],
                ['code' => 'DbnkAnugIpU', 'title' => 'Thrive Dərs Prosesi', 'views' => '42K'],
                ['code' => 'DbFuOiqg_BN', 'title' => 'Xaricdə Təhsil Sirrləri', 'views' => '31K'],
                ['code' => 'Davrft3gy1o', 'title' => 'İmtahan Hazırlığı', 'views' => '25K'],
            ];
            ?>

            <!-- Compact 5-Video Row with Autoplay Live Video Preview -->
            <div class="insta-compact-grid">
                <?php foreach($instaPosts as $p): ?>
                <a href="https://www.instagram.com/p/<?= $p['code'] ?>/" target="_blank" rel="noopener" class="insta-compact-card">
                    <div class="insta-compact-video-box">
                        <!-- Real Autoplaying HTML5 Video Preview -->
                        <video class="insta-preview-vid" src="/assets/videos/instagram/<?= $p['code'] ?>.mp4" poster="/assets/images/instagram/<?= $p['code'] ?>.jpg" autoplay muted loop playsinline preload="auto"></video>

                        <!-- Gradient Overlay -->
                        <div class="insta-compact-grad"></div>

                        <!-- Top Reels Badge -->
                        <div class="insta-compact-top">
                            <span class="insta-mini-pill"><i class="fa-brands fa-instagram"></i> <?= \Core\Language::get('insta_reels_tag') ?></span>
                            <span class="insta-mini-views"><i class="fa-solid fa-eye"></i> <?= $p['views'] ?></span>
                        </div>

                        <!-- Bottom Info -->
                        <div class="insta-compact-bottom">
                            <div class="insta-compact-title"><?= htmlspecialchars($p['title']) ?></div>
                        </div>
                    </div>
                </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <style>
    .insta-profile-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        background: linear-gradient(135deg, rgba(131,58,180,0.15), rgba(225,48,108,0.15));
        border: 1px solid rgba(225,48,108,0.4);
        color: #fff !important;
        padding: 6px 14px;
        border-radius: 20px;
        font-size: 0.78rem;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.25s ease;
    }
    .insta-profile-badge:hover {
        background: linear-gradient(135deg, #833ab4, #fd1d1d, #fcb045);
        border-color: transparent;
        transform: translateY(-1px);
    }
    .insta-compact-grid {
        display: grid;
        grid-template-columns: repeat(5, 1fr);
        gap: 14px;
    }
    @media (max-width: 992px) {
        .insta-compact-grid {
            display: flex;
            overflow-x: auto;
            padding-bottom: 8px;
            scrollbar-width: thin;
        }
        .insta-compact-card {
            width: 170px;
            flex-shrink: 0;
        }
    }
    .insta-compact-card {
        text-decoration: none;
        display: block;
        border-radius: 14px;
        overflow: hidden;
        background: #000c24;
        border: 1px solid rgba(255,255,255,0.1);
        box-shadow: 0 4px 15px rgba(0,0,0,0.3);
        transition: all 0.35s cubic-bezier(0.16, 1, 0.3, 1);
        position: relative;
    }
    .insta-compact-card:hover {
        transform: translateY(-5px);
        border-color: #e1306c;
        box-shadow: 0 10px 25px rgba(225,48,108,0.3);
    }
    .insta-compact-video-box {
        position: relative;
        width: 100%;
        height: 240px;
        overflow: hidden;
        background: #000;
    }
    .insta-preview-vid {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
        transition: transform 0.5s ease;
    }
    .insta-compact-card:hover .insta-preview-vid {
        transform: scale(1.06);
    }
    .insta-compact-grad {
        position: absolute;
        inset: 0;
        background: linear-gradient(180deg, rgba(0,0,0,0.35) 0%, rgba(0,0,0,0) 40%, rgba(0,11,33,0.9) 100%);
        pointer-events: none;
    }
    .insta-compact-top {
        position: absolute;
        top: 8px;
        left: 8px;
        right: 8px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        z-index: 2;
    }
    .insta-mini-pill {
        background: rgba(0,0,0,0.6);
        backdrop-filter: blur(6px);
        color: #fff;
        padding: 2px 7px;
        border-radius: 12px;
        font-size: 0.62rem;
        font-weight: 600;
        border: 1px solid rgba(255,255,255,0.15);
        display: inline-flex;
        align-items: center;
        gap: 3px;
    }
    .insta-mini-views {
        background: rgba(0,0,0,0.6);
        backdrop-filter: blur(6px);
        color: rgba(255,255,255,0.9);
        padding: 2px 7px;
        border-radius: 12px;
        font-size: 0.6rem;
        font-weight: 500;
        border: 1px solid rgba(255,255,255,0.1);
        display: inline-flex;
        align-items: center;
        gap: 3px;
    }
    .insta-compact-bottom {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        padding: 10px 8px;
        z-index: 2;
    }
    .insta-compact-title {
        color: #fff;
        font-size: 0.76rem;
        font-weight: 600;
        line-height: 1.25;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    </style>

    <!-- Minimalist Modern Footer -->
    <footer class="minimal-footer" style="background: #000717; color: #fff; padding: 45px 0 25px; border-top: 1px solid rgba(255,255,255,0.08); position: relative;">
        <div class="container" style="max-width: 1100px;">
            <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 25px; padding-bottom: 28px; border-bottom: 1px solid rgba(255,255,255,0.06);">
                <!-- Brand Text (No logo image) -->
                <div>
                    <a href="<?= APP_URL ?>" class="footer-brand-text" style="font-family: var(--font-heading); font-size: 1.9rem; font-weight: 800; color: #fff; text-decoration: none; letter-spacing: -0.5px;">Thrive<span style="color: var(--aqua-teal);">.</span></a>
                </div>

                <!-- Minimal Navigation Links -->
                <nav class="minimal-footer-nav" style="display: flex; gap: 22px; flex-wrap: wrap; align-items: center;">
                    <a href="<?= APP_URL ?>/education"><?= \Core\Language::get('education') ?></a>
                    <a href="<?= APP_URL ?>/study-abroad"><?= \Core\Language::get('study_abroad') ?></a>
                    <a href="<?= APP_URL ?>/graduates"><?= \Core\Language::get('graduates') ?></a>
                    <a href="<?= APP_URL ?>/thrive-prep">ThrivePrep</a>
                    <a href="<?= APP_URL ?>/thrive-portal">Thrive Portal</a>
                    <a href="<?= APP_URL ?>/about"><?= \Core\Language::get('about') ?></a>
                    <a href="<?= APP_URL ?>/blog"><?= \Core\Language::get('blog') ?></a>
                    <a href="<?= APP_URL ?>/contact"><?= \Core\Language::get('contact') ?></a>
                </nav>
            </div>

            <!-- Bottom Row: Copyright & Legal -->
            <div class="minimal-footer-bottom" style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 15px; padding-top: 22px; font-size: 0.85rem; color: #94a3b8;">
                <div>
                    <?= \Core\Language::get('footer_copyright') ?> &bull; 
                    <span style="color: var(--aqua-teal); font-weight: 600;">Made by CrazyAgency</span>
                </div>

                <div style="display: flex; gap: 18px; flex-wrap: wrap; align-items: center;">
                    <a href="<?= APP_URL ?>/privacy-policy" style="color: #94a3b8; text-decoration: none; transition: color 0.2s;" onmouseover="this.style.color='#fff'" onmouseout="this.style.color='#94a3b8'"><?= \Core\Language::get('privacy_policy') ?></a>
                    <span>&bull;</span>
                    <a href="<?= APP_URL ?>/terms-of-service" style="color: #94a3b8; text-decoration: none; transition: color 0.2s;" onmouseover="this.style.color='#fff'" onmouseout="this.style.color='#94a3b8'"><?= \Core\Language::get('terms_of_service') ?></a>
                    <span>&bull;</span>
                    <a href="<?= APP_URL ?>/cookie-policy" style="color: #94a3b8; text-decoration: none; transition: color 0.2s;" onmouseover="this.style.color='#fff'" onmouseout="this.style.color='#94a3b8'"><?= \Core\Language::get('cookie_policy') ?></a>
                </div>
            </div>
        </div>
        <style>
            .minimal-footer-nav a {
                color: rgba(255, 255, 255, 0.75);
                font-size: 0.92rem;
                font-weight: 500;
                text-decoration: none;
                transition: color 0.25s ease;
            }
            .minimal-footer-nav a:hover {
                color: var(--aqua-teal);
            }
            @media (max-width: 768px) {
                .minimal-footer .container > div {
                    flex-direction: column;
                    text-align: center;
                    justify-content: center;
                }
                .minimal-footer-nav {
                    justify-content: center;
                    gap: 14px;
                }
            }
        </style>
    </footer>

    <!-- Scroll to Top Bottom-Center Arrow Icon -->
    <button id="scrollTopBtn" class="scroll-top-btn" title="Yuxarı" aria-label="Yuxarı qayıt">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M18 15l-6-6-6 6"/></svg>
    </button>

    <!-- Desktop Bottom-Left Floating Contact Speed Dial -->
    <div class="desktop-contact-widget" id="desktopContactWidget">
        <div class="social-popup-menu" id="contactPopupMenu">
            <a href="tel:+994994466000" class="social-item phone-btn" title="Telefon">
                <i class="fa-solid fa-phone"></i>
                <span class="social-tooltip"><?= \Core\Language::current() === 'ru' ? 'Телефон' : (\Core\Language::current() === 'en' ? 'Call Us' : 'Telefon') ?></span>
            </a>
            <a href="https://www.google.com/maps/search/?api=1&query=17C+Said+Rustamov+St,+Baku,+Azerbaijan" target="_blank" rel="noopener" class="social-item location-btn" title="Ünvan">
                <i class="fa-solid fa-location-dot"></i>
                <span class="social-tooltip"><?= \Core\Language::current() === 'ru' ? 'Локация (Google Maps)' : (\Core\Language::current() === 'en' ? 'Location (Google Maps)' : 'Ünvan (Xəritədə aç)') ?></span>
            </a>
            <a href="mailto:info@thrive.az" class="social-item mail-btn" title="E-poçt">
                <i class="fa-solid fa-envelope"></i>
                <span class="social-tooltip"><?= \Core\Language::current() === 'ru' ? 'Эл. почта' : (\Core\Language::current() === 'en' ? 'Email Us' : 'E-poçt') ?></span>
            </a>
        </div>
        <button class="social-main-btn contact-main-btn-style" id="contactMainBtn" title="Əlaqə" aria-label="Əlaqə" type="button">
            <i class="fa-solid fa-address-book social-icon-default"></i>
            <i class="fa-solid fa-xmark social-icon-close"></i>
        </button>
    </div>

    <!-- Desktop Bottom-Left Floating Social Media Speed Dial -->
    <div class="desktop-social-widget" id="desktopSocialWidget">
        <div class="social-popup-menu" id="socialPopupMenu">
            <a href="https://www.tiktok.com/@thrive.edu" target="_blank" rel="noopener" class="social-item tiktok-btn" title="TikTok">
                <i class="fa-brands fa-tiktok"></i>
                <span class="social-tooltip">TikTok</span>
            </a>
            <a href="https://www.instagram.com/thrive.education.center/" target="_blank" rel="noopener" class="social-item insta-btn" title="Instagram">
                <i class="fa-brands fa-instagram"></i>
                <span class="social-tooltip">Instagram</span>
            </a>
            <a href="https://wa.me/994994466000" target="_blank" rel="noopener" class="social-item wp-btn" title="WhatsApp">
                <i class="fa-brands fa-whatsapp"></i>
                <span class="social-tooltip">WhatsApp</span>
            </a>
        </div>
        <button class="social-main-btn" id="socialMainBtn" title="Sosial Şəbəkələr" aria-label="Sosial Şəbəkələr" type="button">
            <i class="fa-solid fa-share-nodes social-icon-default"></i>
            <i class="fa-solid fa-xmark social-icon-close"></i>
        </button>
    </div>

    <style>
    /* Floating Speed Dials (Horizontal Slide Out - No Vertical Overlap) */
    .desktop-social-widget {
        position: fixed;
        bottom: 25px;
        left: 25px;
        z-index: 10001;
        display: flex;
        flex-direction: row-reverse;
        align-items: center;
        gap: 12px;
        pointer-events: none;
    }
    .desktop-contact-widget {
        position: fixed;
        bottom: 85px;
        left: 25px;
        z-index: 10002;
        display: flex;
        flex-direction: row-reverse;
        align-items: center;
        gap: 12px;
        pointer-events: none;
    }
    .desktop-social-widget > *,
    .desktop-contact-widget > * {
        pointer-events: auto;
    }
    .social-main-btn {
        width: 48px;
        height: 48px;
        border-radius: 50%;
        background: rgba(0, 11, 33, 0.92);
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.25);
        color: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 19px;
        cursor: pointer;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.45);
        transition: all 0.35s cubic-bezier(0.16, 1, 0.3, 1);
        position: relative;
        z-index: 5;
        flex-shrink: 0;
    }
    .social-main-btn:hover {
        background: var(--aqua-teal);
        border-color: rgba(255, 255, 255, 0.6);
        transform: scale(1.08);
        box-shadow: 0 14px 35px rgba(76, 162, 181, 0.5);
    }
    .contact-main-btn-style:hover {
        background: #10b981 !important;
        box-shadow: 0 14px 35px rgba(16, 185, 129, 0.5) !important;
    }
    .social-icon-close {
        display: none;
        font-size: 20px;
    }
    .desktop-social-widget.open .social-main-btn,
    .desktop-contact-widget.open .social-main-btn {
        background: var(--ocean-blue);
        transform: rotate(90deg);
    }
    .desktop-social-widget.open .social-icon-default,
    .desktop-contact-widget.open .social-icon-default {
        display: none;
    }
    .desktop-social-widget.open .social-icon-close,
    .desktop-contact-widget.open .social-icon-close {
        display: block;
    }
    .social-popup-menu {
        display: flex;
        flex-direction: row;
        gap: 12px;
        margin: 0;
        opacity: 0;
        visibility: hidden;
        transform: translateX(-15px) scale(0.85);
        transition: all 0.35s cubic-bezier(0.16, 1, 0.3, 1);
        pointer-events: none;
    }
    .desktop-social-widget.open .social-popup-menu,
    .desktop-contact-widget.open .social-popup-menu {
        opacity: 1;
        visibility: visible;
        transform: translateX(0) scale(1);
        pointer-events: auto;
    }
    .social-item {
        width: 44px;
        height: 44px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        font-size: 18px;
        text-decoration: none;
        transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
        position: relative;
        box-shadow: 0 8px 20px rgba(0,0,0,0.35);
        flex-shrink: 0;
    }
    .social-item:hover {
        transform: scale(1.15) translateY(-3px);
        color: #fff;
    }
    .wp-btn { background: #25D366; }
    .wp-btn:hover { box-shadow: 0 10px 25px rgba(37, 211, 102, 0.6); }
    .insta-btn { background: linear-gradient(45deg, #f09433 0%, #e6683c 25%, #dc2743 50%, #cc2366 75%, #bc1888 100%); }
    .insta-btn:hover { box-shadow: 0 10px 25px rgba(225, 48, 108, 0.6); }
    .tiktok-btn { background: #010101; border: 1px solid rgba(255,255,255,0.25); }
    .tiktok-btn:hover { box-shadow: 0 10px 25px rgba(0, 242, 254, 0.5); }
    .phone-btn { background: #10b981; }
    .phone-btn:hover { box-shadow: 0 10px 25px rgba(16, 185, 129, 0.6); }
    .location-btn { background: #ef4444; }
    .location-btn:hover { box-shadow: 0 10px 25px rgba(239, 68, 68, 0.6); }
    .mail-btn { background: #6366f1; }
    .mail-btn:hover { box-shadow: 0 10px 25px rgba(99, 102, 241, 0.6); }
    .social-tooltip {
        position: absolute;
        bottom: 54px;
        left: 50%;
        transform: translateX(-50%);
        background: rgba(0, 11, 33, 0.94);
        color: #fff;
        padding: 5px 12px;
        border-radius: 6px;
        font-size: 12px;
        font-weight: 600;
        white-space: nowrap;
        opacity: 0;
        pointer-events: none;
        transition: all 0.25s ease;
        border: 1px solid rgba(255,255,255,0.18);
        box-shadow: 0 6px 16px rgba(0,0,0,0.3);
    }
    .social-item:hover .social-tooltip {
        opacity: 1;
        bottom: 50px;
    }
    @media (max-width: 768px) {
        .desktop-social-widget {
            bottom: 20px;
            left: 15px;
        }
        .desktop-contact-widget {
            bottom: 75px;
            left: 15px;
        }
        .social-main-btn {
            width: 44px;
            height: 44px;
            font-size: 17px;
        }
        .social-item {
            width: 40px;
            height: 40px;
            font-size: 16px;
        }
    }
    </style>
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        const socialWidget = document.getElementById('desktopSocialWidget');
        const socialBtn = document.getElementById('socialMainBtn');
        const contactWidget = document.getElementById('desktopContactWidget');
        const contactBtn = document.getElementById('contactMainBtn');

        if(socialBtn && socialWidget) {
            socialBtn.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                if(contactWidget) contactWidget.classList.remove('open');
                socialWidget.classList.toggle('open');
            });
        }
        if(contactBtn && contactWidget) {
            contactBtn.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                if(socialWidget) socialWidget.classList.remove('open');
                contactWidget.classList.toggle('open');
            });
        }
        document.addEventListener('click', function(e) {
            if(socialWidget && !socialWidget.contains(e.target)) {
                socialWidget.classList.remove('open');
            }
            if(contactWidget && !contactWidget.contains(e.target)) {
                contactWidget.classList.remove('open');
            }
        });
    });
    </script>

    <style>
    @media (max-width: 768px) {
        footer .container > div {
            text-align: center;
        }
        footer .container > div:first-child {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        footer .container > div > div {
            justify-content: center;
        }
        footer .container ul {
            align-items: center;
        }
        footer .container .footer-bottom-bar {
            flex-direction: column;
            text-align: center;
            gap: 15px;
        }
    }
    </style>

    

    <!-- Cookie Consent Floating Pill -->
    <div id="cookieConsentBar" style="position:fixed; bottom:-100px; left:50%; transform:translateX(-50%); width:90%; max-width:700px; background:rgba(255,255,255,0.95); backdrop-filter:blur(10px); -webkit-backdrop-filter:blur(10px); border:1px solid rgba(0,0,0,0.05); border-radius:50px; padding:12px 25px; z-index:9998; box-shadow: 0 10px 30px rgba(0,0,0,0.1); transition:bottom 0.6s cubic-bezier(0.2, 0.8, 0.2, 1), opacity 0.6s ease; opacity:0; display:flex; align-items:center; justify-content:space-between; gap:20px;">
        <div style="display:flex; align-items:center; gap:15px; flex:1;">
            <div style="font-size:24px; animation: bounce 2s infinite;">🍪</div>
            <div style="font-size:0.95rem; color:#334155; line-height:1.4;">
                <strong style="color:#0f172a; font-family:var(--font-heading);"><?= \Core\Language::get('layout_cookie_title') ?></strong> — 
                <?= \Core\Language::get('cookie_bar_text') ?> 
                <a href="<?= APP_URL ?>/cookie-policy" style="color:var(--aqua-teal); text-decoration:none; font-weight:600; margin-left:5px; border-bottom:1px solid var(--aqua-teal);"><?= \Core\Language::get('layout_cookie_more') ?></a>
            </div>
        </div>
        <button id="acceptCookiesBtn" style="background:var(--deep-navy); color:#fff; border:none; padding:10px 25px; border-radius:30px; font-weight:600; cursor:pointer; font-size:0.9rem; white-space:nowrap; transition:all 0.3s; box-shadow:0 4px 10px rgba(0,11,33,0.2);" onmouseover="this.style.background='var(--ocean-blue)'; this.style.transform='translateY(-2px)';" onmouseout="this.style.background='var(--deep-navy)'; this.style.transform='translateY(0)';">
            <?= \Core\Language::get('cookie_bar_accept') ?? 'Qəbul Edirəm' ?>
        </button>
    </div>
    <style>
        @media (max-width: 600px) {
            #cookieConsentBar { flex-direction: column; border-radius: 20px; text-align: center; padding: 20px; }
            #cookieConsentBar > div { flex-direction: column; gap: 10px; }
            #cookieConsentBar button { width: 100%; }
        }
        @keyframes bounce { 0%, 100% { transform: translateY(0); } 50% { transform: translateY(-5px); } }
    </style>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const cookieBar = document.getElementById('cookieConsentBar');
            if (!localStorage.getItem('cookie_accepted')) {
                setTimeout(() => {
                    cookieBar.style.bottom = window.innerWidth <= 768 ? '20px' : '30px';
                    if (window.innerWidth <= 768) {
                        cookieBar.style.left = '5%';
                        cookieBar.style.width = '90%';
                        cookieBar.style.maxWidth = 'none';
                    }
                    cookieBar.style.opacity = '1';
                }, 1500);
            }
            document.getElementById('acceptCookiesBtn').addEventListener('click', function() {
                localStorage.setItem('cookie_accepted', 'true');
                cookieBar.style.bottom = '-200px';
                cookieBar.style.opacity = '0';
            });
        });
    </script>

    <!-- Consultation Success Popup -->
    <?php if (isset($_SESSION['consultation_success'])): ?>
    <div id="consultationPopupOverlay" style="position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,15,30,0.85); backdrop-filter:blur(10px); z-index:10000; display:flex; align-items:center; justify-content:center; transition:all 0.6s ease;">
        <div id="consultationPopupBox" style="background: var(--card-bg); width:90%; max-width:550px; border-radius:12px; text-align:center; box-shadow: 0 15px 40px var(--shadow-heavy); transform:scale(1) translateY(0); transition:all 0.6s cubic-bezier(0.2, 0.8, 0.2, 1); position:relative; overflow:hidden;">
            <div style="background: linear-gradient(135deg, var(--deep-navy) 0%, var(--ocean-blue) 100%); padding: 40px 20px; position:relative;">
                <button id="closeConsultationBtn" style="position:absolute; top:15px; right:15px; background:rgba(255,255,255,0.1); border:none; width:32px; height:32px; border-radius:50%; font-size:1.2rem; color:#fff; cursor:pointer; transition:background 0.3s; display:flex; align-items:center; justify-content:center; line-height:0;">&times;</button>
                <div style="width: 60px; height: 60px; background: rgba(255,255,255,0.2); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 15px; color: #fff; font-size: 2rem;">✓</div>
                <h2 style="color:#fff; margin:0; font-size:1.5rem; font-weight:600;">Təşəkkürlər!</h2>
            </div>
            <div style="padding: 40px 30px;">
                <p style="color:var(--text-color); font-size:1.1rem; line-height:1.7; margin-bottom:35px;"><?= htmlspecialchars($_SESSION['consultation_success']) ?></p>
                <button id="okConsultationBtn" style="background:transparent; color: var(--heading-color); border:2px solid var(--deep-navy); padding:12px 35px; border-radius:4px; font-weight:600; cursor:pointer; font-size:0.95rem; letter-spacing:1px; text-transform:uppercase; transition:all 0.3s; outline:none;">Bağla</button>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            function closeConsultPopup() {
                const overlay = document.getElementById('consultationPopupOverlay');
                const box = document.getElementById('consultationPopupBox');
                if(overlay && box) {
                    overlay.style.opacity = '0';
                    overlay.style.visibility = 'hidden';
                    box.style.transform = 'scale(0.8) translateY(20px)';
                    setTimeout(() => overlay.remove(), 600);
                }
            }
            const closeBtn = document.getElementById('closeConsultationBtn');
            const okBtn = document.getElementById('okConsultationBtn');
            if(closeBtn) closeBtn.addEventListener('click', closeConsultPopup);
            if(okBtn) okBtn.addEventListener('click', closeConsultPopup);
        });
    </script>
    <?php unset($_SESSION['consultation_success']); ?>
    <?php endif; ?>


    
    <!-- Scripts -->
    <script src="<?= APP_URL ?>/assets/js/main.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({ once: true, duration: 800 });
    </script>
</body>
</html>