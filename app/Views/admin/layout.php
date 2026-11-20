<!DOCTYPE html>
<html lang="<?= \Core\Language::current() ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($title ?? 'Admin Panel') ?></title>
    <link rel="stylesheet" href="<?= APP_URL ?>/assets/css/admin.css">
    <!-- FontAwesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script>
        const savedTheme = localStorage.getItem('thrive_admin_theme') || 'light';
        if(savedTheme === 'dark') {
            document.documentElement.setAttribute('data-theme', 'dark');
        }
    </script>
</head>
<body>
    <?php if(isset($_SESSION['admin_welcome']) && $_SESSION['admin_welcome'] === true): ?>
    <div id="welcome-screen" style="position:fixed; top:0; left:0; width:100%; height:100%; background: var(--input-bg); z-index:9999; display:flex; flex-direction:column; align-items:center; justify-content:center; transition:opacity 0.8s ease, visibility 0.8s ease;">
        <div style="width:80px; height:80px; border-radius:50%; background:rgba(76,162,181,0.1); display:flex; align-items:center; justify-content:center; margin-bottom:20px; animation: scaleIn 0.5s ease-out;">
            <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="#4ca2b5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
        </div>
        <h1 style="font-size:2rem; color:#003f82; font-weight:700; opacity:0; animation: fadeInUp 0.5s ease-out 0.2s forwards; margin:0;"><?= \Core\Language::get('admin_welcome') ?? 'Xoş gəldiniz' ?>, <?= htmlspecialchars($_SESSION['user_name'] ?? 'Admin') ?>!</h1>
        <p style="color: var(--text-secondary); font-size:1.1rem; margin-top:10px; opacity:0; animation: fadeInUp 0.5s ease-out 0.4s forwards;"><?= \Core\Language::get('admin_loading') ?? 'Sistem hazırlanır...' ?></p>
    </div>
    <style>
        @keyframes scaleIn { 0% { transform: scale(0); opacity: 0; } 100% { transform: scale(1); opacity: 1; } }
        @keyframes fadeInUp { 0% { transform: translateY(20px); opacity: 0; } 100% { transform: translateY(0); opacity: 1; } }
    </style>
    <script>
        setTimeout(() => {
            const screen = document.getElementById('welcome-screen');
            screen.style.opacity = '0';
            screen.style.visibility = 'hidden';
            setTimeout(() => screen.remove(), 800);
        }, 2000);
    </script>
    <?php unset($_SESSION['admin_welcome']); ?>
    <?php endif; ?>

    <!-- Sidebar -->
    <aside class="sidebar" id="sidebar">
        <div class="sidebar-header" style="display:flex; align-items:center; gap:10px; padding: 25px 20px;">
            <div style="background: linear-gradient(135deg, #4ca2b5, #003f82); width:35px; height:35px; border-radius:8px; display:flex; align-items:center; justify-content:center; box-shadow: 0 4px 10px rgba(76,162,181,0.3);">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2L2 7l10 5 10-5-10-5z"/><path d="M2 17l10 5 10-5"/><path d="M2 12l10 5 10-5"/></svg>
            </div>
            <h2 style="font-size: 1.4rem; font-weight: 800; margin: 0; background: linear-gradient(90deg, #003f82, #4ca2b5); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Thrive Admin</h2>
        </div>
        <?php
        $role = $_SESSION['user_role'] ?? '';
        $isOwner = ($role === 'owner');
        $isAdmin = ($role === 'admin' || $isOwner);
        $isBlog = ($role === 'blog_writer' || $isAdmin);
        $isContent = ($role === 'content_creator' || $isAdmin);
        ?>
        <ul class="sidebar-menu">
            <li><a href="<?= APP_URL ?>/admin/dashboard"><i class="fas fa-home" style="margin-right: 10px; width: 20px; text-align: center;"></i> <?= \Core\Language::get('admin_dashboard') ?? 'Dashboard' ?></a></li>
            <li><a href="<?= APP_URL ?>/admin/guide" class="<?= strpos($_SERVER['REQUEST_URI'], '/admin/guide') !== false ? 'active' : '' ?>"><i class="fas fa-book" style="margin-right: 10px; width: 20px; text-align: center;"></i> <?= \Core\Language::get('admin_guide') ?? 'Rəhbər (Guide)' ?></a></li>

            <?php if (\Core\Auth::hasPermission('users')): ?>
                <li><a href="<?= APP_URL ?>/admin/users" class="<?= strpos($_SERVER['REQUEST_URI'], '/admin/users') !== false ? 'active' : '' ?>"><i class="fas fa-users" style="margin-right: 10px; width: 20px; text-align: center;"></i> <?= \Core\Language::get('admin_users') ?? 'İstifadəçilər' ?></a></li>
            <?php endif; ?>

            <?php if (\Core\Auth::hasPermission('applications')): ?>
                <?php
                $pendingBookings = 0;
                try {
                    $db = \Core\Database::getInstance();
                    $db->exec("CREATE TABLE IF NOT EXISTS bookings (id INTEGER PRIMARY KEY, status TEXT)");
                    $pendingBookings = $db->query("SELECT COUNT(*) FROM bookings WHERE status = 'pending'")->fetchColumn();
                } catch (\Exception $e) {}
                ?>
                <li><a href="<?= APP_URL ?>/admin/applications" class="<?= strpos($_SERVER['REQUEST_URI'], '/admin/applications') !== false ? 'active' : '' ?>"><i class="fas fa-paper-plane" style="margin-right: 10px; width: 20px; text-align: center;"></i> <?= \Core\Language::get('admin_applications') ?? 'Müraciətlər' ?></a></li>
                <li>
                    <a href="<?= APP_URL ?>/admin/bookings" class="<?= strpos($_SERVER['REQUEST_URI'], '/admin/bookings') !== false ? 'active' : '' ?>" style="display:flex; justify-content:space-between; align-items:center;">
                        <div><i class="fas fa-calendar-check" style="margin-right: 10px; width: 20px; text-align: center;"></i> Konsultasiyalar</div>
                        <?php if($pendingBookings > 0): ?>
                            <span style="background: #ef4444; color: #fff; font-size: 0.75rem; padding: 2px 8px; border-radius: 20px; font-weight: bold;"><?= $pendingBookings ?></span>
                        <?php endif; ?>
                    </a>
                </li>
            <?php endif; ?>

            <?php if (\Core\Auth::hasPermission('courses')): ?>
                <li><a href="<?= APP_URL ?>/admin/courses" class="<?= strpos($_SERVER['REQUEST_URI'], '/admin/courses') !== false ? 'active' : '' ?>"><i class="fas fa-graduation-cap" style="margin-right: 10px; width: 20px; text-align: center;"></i> <?= \Core\Language::get('admin_courses') ?? 'Kurslar' ?></a></li>
            <?php endif; ?>

            <?php if (\Core\Auth::hasPermission('countries')): ?>
                <li><a href="<?= APP_URL ?>/admin/countries" class="<?= strpos($_SERVER['REQUEST_URI'], '/admin/countries') !== false ? 'active' : '' ?>"><i class="fas fa-globe" style="margin-right: 10px; width: 20px; text-align: center;"></i> <?= \Core\Language::get('admin_countries') ?? 'Ölkələr' ?></a></li>
            <?php endif; ?>

            <?php if (\Core\Auth::hasPermission('universities')): ?>
                <li><a href="<?= APP_URL ?>/admin/universities" class="<?= strpos($_SERVER['REQUEST_URI'], '/admin/universities') !== false ? 'active' : '' ?>"><i class="fas fa-university" style="margin-right: 10px; width: 20px; text-align: center;"></i> <?= \Core\Language::get('admin_universities') ?? 'Universitetlər' ?></a></li>
            <?php endif; ?>

            <?php if (\Core\Auth::hasPermission('self_study')): ?>
                <li><a href="<?= APP_URL ?>/admin/self-study" class="<?= strpos($_SERVER['REQUEST_URI'], '/admin/self-study') !== false ? 'active' : '' ?>"><i class="fas fa-book-reader" style="margin-right: 10px; width: 20px; text-align: center;"></i> <?= \Core\Language::get('admin_self_study') ?? 'Self Study' ?></a></li>
            <?php endif; ?>

            <?php if (\Core\Auth::hasPermission('graduates')): ?>
                <li><a href="<?= APP_URL ?>/admin/graduates" class="<?= strpos($_SERVER['REQUEST_URI'], '/admin/graduates') !== false ? 'active' : '' ?>"><i class="fas fa-user-graduate" style="margin-right: 10px; width: 20px; text-align: center;"></i> <?= \Core\Language::get('admin_graduates') ?? 'Məzunlar' ?></a></li>
            <?php endif; ?>

            <?php if (\Core\Auth::hasPermission('documents')): ?>
                <li><a href="<?= APP_URL ?>/admin/documents" class="<?= strpos($_SERVER['REQUEST_URI'], '/admin/documents') !== false ? 'active' : '' ?>"><i class="fas fa-file-alt" style="margin-right: 10px; width: 20px; text-align: center;"></i> <?= \Core\Language::get('admin_documents') ?? 'Sənədlər' ?></a></li>
            <?php endif; ?>

            <?php if (\Core\Auth::hasPermission('blog')): ?>
                <li><a href="<?= APP_URL ?>/admin/blog" class="<?= strpos($_SERVER['REQUEST_URI'], '/admin/blog') !== false ? 'active' : '' ?>"><i class="fas fa-blog" style="margin-right: 10px; width: 20px; text-align: center;"></i> <?= \Core\Language::get('admin_blog') ?? 'Bloq' ?></a></li>
            <?php endif; ?>

            <?php if (\Core\Auth::hasPermission('messages')): ?>
                <li><a href="<?= APP_URL ?>/admin/messages" class="<?= strpos($_SERVER['REQUEST_URI'], '/admin/messages') !== false ? 'active' : '' ?>"><i class="fas fa-envelope" style="margin-right: 10px; width: 20px; text-align: center;"></i> <?= \Core\Language::get('admin_messages') ?? 'Mesajlar' ?></a></li>
            <?php endif; ?>

            <?php if (\Core\Auth::hasPermission('live_chat')): ?>
                <li><a href="<?= APP_URL ?>/admin/live-chat" class="<?= strpos($_SERVER['REQUEST_URI'], '/admin/live-chat') !== false ? 'active' : '' ?>"><i class="fas fa-comments" style="margin-right: 10px; width: 20px; text-align: center;"></i> <?= \Core\Language::get('admin_live_chat') ?? 'Canlı Dəstək' ?></a></li>
            <?php endif; ?>
                
            <?php if (\Core\Auth::hasPermission('security') || \Core\Auth::hasPermission('seo') || \Core\Auth::hasPermission('logs')): ?>
                <li class="sidebar-divider" style="margin: 15px 0; border-bottom: 1px solid rgba(255,255,255,0.1);"></li>
            <?php endif; ?>
                
            <?php if (\Core\Auth::hasPermission('security')): ?>
                <li><a href="<?= APP_URL ?>/admin/security" class="<?= strpos($_SERVER['REQUEST_URI'], '/admin/security') !== false ? 'active' : '' ?>">
                    <span style="color:#ef4444; margin-right:8px;">●</span> <?= \Core\Language::get('admin_security') ?? 'Təhlükəsizlik Paneli' ?>
                </a></li>
            <?php endif; ?>

            <?php if (\Core\Auth::hasPermission('seo')): ?>
                <li><a href="<?= APP_URL ?>/admin/seo" class="<?= strpos($_SERVER['REQUEST_URI'], '/admin/seo') !== false ? 'active' : '' ?>">
                    <span style="color:#f59e0b; margin-right:8px;">●</span> SEO İdarəetmə
                </a></li>
            <?php endif; ?>

            <?php if (\Core\Auth::hasPermission('logs') || $isContent): ?>
                <li><a href="<?= APP_URL ?>/admin/logs" class="<?= strpos($_SERVER['REQUEST_URI'], '/admin/logs') !== false ? 'active' : '' ?>">
                    <span style="color:#10b981; margin-right:8px;">●</span> Ziyarətçi Loqları
                </a></li>
            <?php endif; ?>
        </ul>
    </aside>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Header -->
        <header class="admin-header">
            <div style="display:flex; align-items:center; gap: 20px;">
                <button class="menu-toggle" id="menuToggle" style="background:transparent; border:none; color:var(--text-main); cursor:pointer; padding:5px; display:flex; align-items:center; justify-content:center; transition: transform 0.3s;">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
                </button>
                <h3 style="margin:0; font-weight:600; font-size:1.2rem; color:var(--text-main);"><?= htmlspecialchars($title ?? 'Dashboard') ?></h3>
            </div>
            
                <div style="display:flex; align-items:center; gap: 10px;">
                    <a href="?lang=az" style="text-decoration:none; color: var(--text-main); font-weight: <?= \Core\Language::current() == 'az' ? 'bold' : 'normal' ?>;">AZ</a> | 
                    <a href="?lang=ru" style="text-decoration:none; color: var(--text-main); font-weight: <?= \Core\Language::current() == 'ru' ? 'bold' : 'normal' ?>;">RU</a>
                </div>
                <div style="display:flex; align-items:center; gap: 20px;">
                <button id="themeToggleBtn" class="btn-sm" title="Toggle Theme">
                    <!-- Default to moon, will swap via JS -->
                    <svg id="moon-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path></svg>
                    <svg id="sun-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="display:none;"><circle cx="12" cy="12" r="5"></circle><line x1="12" y1="1" x2="12" y2="3"></line><line x1="12" y1="21" x2="12" y2="23"></line><line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line><line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line><line x1="1" y1="12" x2="3" y2="12"></line><line x1="21" y1="12" x2="23" y2="12"></line><line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line><line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line></svg>
                </button>
                <span style="color: var(--text-muted); font-size: 0.9rem;"><?= \Core\Language::get('admin_welcome') ?? 'Xoş gəldiniz' ?>, <?= htmlspecialchars($_SESSION['user_name'] ?? 'Admin') ?></span>
                <a href="<?= APP_URL ?>/admin/logout" class="btn-sm btn-danger"><?= \Core\Language::get('admin_logout') ?? 'Çıxış' ?></a>
            </div>
        </header>

        <!-- Page Content -->
        <main style="padding: 40px;">
            <?php require VIEW_PATH . '/' . $contentView . '.php'; ?>
        </main>
    </div>

    <script>
        document.getElementById('menuToggle').addEventListener('click', function() {
            document.getElementById('sidebar').classList.toggle('collapsed');
            document.querySelector('.main-content').classList.toggle('expanded');
        });
        
        // Theme Toggle Logic
        const themeBtn = document.getElementById('themeToggleBtn');
        const moonIcon = document.getElementById('moon-icon');
        const sunIcon = document.getElementById('sun-icon');

        function updateThemeIcons() {
            if(document.documentElement.getAttribute('data-theme') === 'dark') {
                moonIcon.style.display = 'none';
                sunIcon.style.display = 'block';
            } else {
                moonIcon.style.display = 'block';
                sunIcon.style.display = 'none';
            }
        }
        updateThemeIcons();

        themeBtn.addEventListener('click', () => {
            if(document.documentElement.getAttribute('data-theme') === 'dark') {
                document.documentElement.removeAttribute('data-theme');
                localStorage.setItem('thrive_admin_theme', 'light');
            } else {
                document.documentElement.setAttribute('data-theme', 'dark');
                localStorage.setItem('thrive_admin_theme', 'dark');
            }
            updateThemeIcons();
        });

        // Robust Language Tab switcher for forms with localStorage persistence
        const tabs = document.querySelectorAll('.lang-tab');
        if(tabs.length > 0) {
            function activateFormLang(lang) {
                if(!lang) return;
                const targetTab = document.querySelector('.lang-tab[data-lang="' + lang + '"]');
                const targetContent = document.getElementById('lang-' + lang);
                if(targetTab && targetContent) {
                    document.querySelectorAll('.lang-tab').forEach(t => t.classList.remove('active'));
                    document.querySelectorAll('.lang-content').forEach(c => {
                        c.classList.remove('active');
                        c.style.display = 'none';
                    });
                    targetTab.classList.add('active');
                    targetContent.classList.add('active');
                    targetContent.style.display = 'block';

                    if (window.CKEDITOR && CKEDITOR.instances) {
                        setTimeout(() => {
                            for (var k in CKEDITOR.instances) {
                                try { CKEDITOR.instances[k].resize(); } catch(e){}
                            }
                        }, 50);
                    }
                }
            }

            // Restore saved language tab on reload
            const savedFormLang = localStorage.getItem('thrive_admin_form_lang');
            if(savedFormLang) {
                activateFormLang(savedFormLang);
            } else {
                activateFormLang('az');
            }

            tabs.forEach(tab => {
                tab.addEventListener('click', () => {
                    const lang = tab.getAttribute('data-lang');
                    if(lang) {
                        localStorage.setItem('thrive_admin_form_lang', lang);
                        activateFormLang(lang);
                    }
                });
            });
        }
    </script>
    <script src="https://cdn.ckeditor.com/4.22.1/full-all/ckeditor.js"></script>
    <script>
        CKEDITOR.config.versionCheck = false;
        CKEDITOR.config.allowedContent = true;
        CKEDITOR.config.extraPlugins = 'liststyle,justify,colorbutton,font,format';

        var customRichToolbar = [
            { name: 'document', items: [ 'Source' ] },
            { name: 'clipboard', items: [ 'Undo', 'Redo' ] },
            { name: 'styles', items: [ 'Format', 'Font', 'FontSize' ] },
            { name: 'basicstyles', items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'RemoveFormat' ] },
            { name: 'colors', items: [ 'TextColor', 'BGColor' ] },
            { name: 'paragraph', items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock' ] },
            { name: 'links', items: [ 'Link', 'Unlink' ] },
            { name: 'insert', items: [ 'Image', 'Table', 'HorizontalRule', 'SpecialChar' ] },
            { name: 'tools', items: [ 'Maximize' ] }
        ];

        document.querySelectorAll('.rich-text').forEach(el => {
            if(!el.id) {
                el.id = 'ck_' + Math.random().toString(36).substr(2, 9);
            }
            CKEDITOR.replace(el.id, {
                filebrowserUploadUrl: '<?= APP_URL ?>/admin/upload-image',
                filebrowserUploadMethod: 'xhr',
                height: 320,
                toolbar: customRichToolbar,
                allowedContent: true,
                autoParagraph: true
            });
        });
    </script>
</body>
</html>
