<?php
$lang = \Core\Language::current() ?: 'az';
if (!in_array($lang, ['az', 'en', 'ru'])) {
    $lang = 'az';
}

$cookieData = [
    'az' => [
        'badge' => 'HÜQUQİ SƏNƏDLƏR • THRIVE EDUCATION CENTER',
        'title' => 'Kuki (Cookie) Siyasəti və <span style="color: var(--aqua-teal);">İzləmə Texnologiyaları</span>',
        'date' => 'Qüvvəyə minmə tarixi: 1 Avqust 2026 • Versiya 2.4',
        'sections' => [
            [
                'title' => '1. Kuki (Cookie) Texnologiyası Nədir?',
                'content' => 'Kukilər, Thrive Education Center veb-saytını ziyarət etdiyiniz zaman brauzeriniz vasitəsilə kompüter, smartfon və ya digər mobil cihazınıza yüklənən kiçik həcmli mətn fayllarıdır. Bu fayllar saytımızın düzgün və sürətli işləməsini, təhlükəsizlik protokollarının qorunmasını, dil seçimlərinizin yadda saxlanmasını və tədris xidmətlərimiz üzrə keyfiyyətin davamlı artırılmasını təmin edir.'
            ],
            [
                'title' => '2. İstifadə Etdiyimiz Kuki Kateqoriyaları',
                'content' => 'Biz saytımızda aşağıdakı 4 əsas kateqoriyada kuki fayllarından istifadə edirik:<br><br>
                <strong>• Zəruri (Texniki) Kukilər:</strong> Saytın əsas funksionallığı, naviqasiya və təhlükəsizlik sessiyalarının (CSRF qoruması, sessiya autentifikasiyası) idarə olunması üçün mütləqdir. Bu kukilər olmadan sayt düzgün fəaliyyət göstərə bilməz.<br>
                <strong>• Funksional Kukilər:</strong> Dil seçimi (AZ/EN/RU), valyuta və ya istifadəçi interfeysi parametrlərinizi xatırlamağa kömək edir.<br>
                <strong>• Analitik (Statistik) Kukilər:</strong> Ziyarətçilərin saytımızdan necə istifadə etdiyini, ən çox oxunan blog və proqram səhifələrini (məs. Google Analytics 4 vasitəsilə) anonim formada təhlil etmək üçündür.<br>
                <strong>• Marketing və Hədəfləmə Kukiləri:</strong> İstifadəçinin təhsil maraqlarına uyğun (SAT, IELTS, Avropada Təhsil) uyğun bildirişlərin və təqaüd imkanlarının göstərilməsinə xidmət edir.'
            ],
            [
                'title' => '3. Kukilərin Saxlanma Müddəti',
                'content' => 'Kukilərin saxlanma müddəti onların növündən asılıdır:<br>
                <strong>• Sessiya kukiləri:</strong> Brauzerinizi bağladığınız anda avtomatik olaraq cihazınızdan silinir.<br>
                <strong>• Daimi kukilər:</strong> Müəyyən olunmuş müddət ərzində (adətən 30 gündən 1 ilə qədər) və ya siz onları əllə silənə qədər cihazınızda qalır.'
            ],
            [
                'title' => '4. Üçüncü Tərəf İzləmə Xidmətləri',
                'content' => 'Saytımızda trafikin təhlili və təhlükəsizliyin təmin edilməsi məqsədilə etibarlı üçüncü tərəf xidmətləri (Google Analytics, Cloudflare, Supabase Authentication) tərəfindən idarə olunan kukilərdən istifadə oluna bilər. Həmin xidmətlər öz məxfilik siyasətlərinə uyğun fəaliyyət göstərir.'
            ],
            [
                'title' => '5. Kukilərin İdarə Olunması və Deaktiv Edilməsi',
                'content' => 'İstifadəçi olaraq siz kukiləri qəbul etmək və ya bloklamaq hüququna maliksiniz. Brauzerinizin parametrlər (Settings -> Privacy & Security -> Cookies) bölməsindən kukiləri istənilən vaxt silə, məhdudlaşdıra və ya tam bloklaya bilərsiniz. Zəruri kukilərin bloklanması saytın bəzi funksiyalarının işləməməsinə səbəb ola bilər.'
            ]
        ]
    ],
    'en' => [
        'badge' => 'LEGAL DOCUMENTATION • THRIVE EDUCATION CENTER',
        'title' => 'Cookie Policy & <span style="color: var(--aqua-teal);">Tracking Technologies</span>',
        'date' => 'Effective Date: August 1, 2026 • Version 2.4',
        'sections' => [
            [
                'title' => '1. What are Cookies & Tracking Technologies?',
                'content' => 'Cookies are small text files placed on your computer, tablet, or mobile device by your web browser when you visit the Thrive Education Center website. These technologies allow us to ensure secure session handling, remember your language preferences, analyze traffic trends, and optimize our international education platform.'
            ],
            [
                'title' => '2. Categories of Cookies We Use',
                'content' => 'We deploy four primary categories of cookies across our platform:<br><br>
                <strong>• Strictly Necessary (Technical) Cookies:</strong> Essential for core website operations, security protocols (CSRF tokens, session authentication), and page navigation.<br>
                <strong>• Functional Cookies:</strong> Remember user preferences such as your language choice (AZ/EN/RU) and customized accessibility settings.<br>
                <strong>• Analytical (Performance) Cookies:</strong> Gather aggregated, anonymous data (via Google Analytics 4) regarding visitor interaction, page load speeds, and popular program pathways.<br>
                <strong>• Marketing & Targeting Cookies:</strong> Help deliver relevant updates regarding scholarship deadlines and admissions opportunities based on your academic interests.'
            ],
            [
                'title' => '3. Cookie Retention Periods',
                'content' => 'Cookies are retained on your device for varying durations depending on their operational classification:<br>
                <strong>• Session Cookies:</strong> Temporary files that are deleted automatically when you close your browser.<br>
                <strong>• Persistent Cookies:</strong> Remain stored on your device for a predetermined period (ranging from 30 days to 1 year) or until you manually clear them.'
            ],
            [
                'title' => '4. Third-Party Analytics & Security Services',
                'content' => 'Our website may embed trusted third-party services (such as Google Analytics, Cloudflare, and Supabase Authentication) that utilize their own tracking cookies for security monitoring and statistical analysis in compliance with their independent privacy terms.'
            ],
            [
                'title' => '5. Managing & Disabling Cookies',
                'content' => 'You retain full control over your cookie settings. You can manage, refuse, or delete cookies at any time via your browser settings (Settings -> Privacy & Security -> Cookies). Please note that disabling strictly necessary cookies may impair key functionalities of our website.'
            ]
        ]
    ],
    'ru' => [
        'badge' => 'ЮРИДИЧЕСКИЕ ДОКУМЕНТЫ • THRIVE EDUCATION CENTER',
        'title' => 'Политика использования cookie и <span style="color: var(--aqua-teal);">Технологий отслеживания</span>',
        'date' => 'Дата вступления в силу: 1 августа 2026 г. • Версия 2.4',
        'sections' => [
            [
                'title' => '1. Что такое файлы cookie и технологии отслеживания?',
                'content' => 'Файлы cookie — это небольшие текстовые файлы, которые загружаются в память вашего устройства (компьютера, смартфона или планшета) при посещении сайта Thrive Education Center. Они необходимы для стабильной работы сайта, обеспечения безопасности, сохранения языковых настроек и улучшения качества наших образовательных услуг.'
            ],
            [
                'title' => '2. Категории используемых файлов cookie',
                'content' => 'На нашем сайте используются четыре основные категории cookie:<br><br>
                <strong>• Строго необходимые (Технические) cookie:</strong> Обеспечивают базовую функциональность сайта, навигацию и безопасность сессий (защиту CSRF, аутентификацию). Без них работа сайта невозможна.<br>
                <strong>• Функциональные cookie:</strong> Сохраняют ваши настройки интерфейса, включая выбранный язык (AZ/EN/RU) и предпочтения отображения.<br>
                <strong>• Аналитические cookie:</strong> Собирают анонимную статистику (например, через Google Analytics 4) о посещаемости страниц программ и скорости загрузки.<br>
                <strong>• Маркетинговые cookie:</strong> Позволяют показывать вам актуальную информацию о стипендиях и сроках подачи заявок в зарубежные вузы.'
            ],
            [
                'title' => '3. Срок хранения файлов cookie',
                'content' => 'Время хранения файлов cookie на вашем устройстве зависит от их типа:<br>
                <strong>• Сессионные cookie:</strong> Автоматически удаляются сразу после закрытия браузера.<br>
                <strong>• Постоянные cookie:</strong> Хранятся в течение установленного срока (от 30 дней до 1 года) либо до момента их удаления пользователем.'
            ],
            [
                'title' => '4. Сторонние аналитические и защитные сервисы',
                'content' => 'На сайте могут применяться файлы cookie надежных сторонних сервисов (Google Analytics, Cloudflare, Supabase), используемых для аналитики трафика и защиты от спама в соответствии с их собственными политиками конфиденциальности.'
            ],
            [
                'title' => '5. Управление и отключение cookie',
                'content' => 'Вы можете в любое время ограничить или заблокировать файлы cookie в настройках вашего браузера (Настройки -> Конфиденциальность и безопасность -> Файлы cookie). Обратите внимание, что блокировка технических cookie может нарушить работу некоторых функций сайта.'
            ]
        ]
    ]
];

$c = $cookieData[$lang];
?>

<!-- Premium Dark Legal Hero -->
<section class="legal-hero">
    <div class="legal-glow"></div>
    <div class="container" style="max-width: 900px; position: relative; z-index: 2; text-align: center;">
        <div class="legal-badge" data-aos="fade-up"><?= htmlspecialchars($c['badge']) ?></div>
        <h1 class="legal-title" data-aos="fade-up" data-aos-delay="100"><?= $c['title'] ?></h1>
        <p class="legal-date" data-aos="fade-up" data-aos-delay="200"><?= htmlspecialchars($c['date']) ?></p>
    </div>
</section>

<!-- High Contrast Detailed Legal Content -->
<section class="legal-content-section">
    <div class="container" style="max-width: 920px;">
        <div class="legal-glass-box" data-aos="fade-up">
            <?php foreach ($c['sections'] as $idx => $sec): ?>
            <div class="legal-section-block">
                <h2 class="legal-section-title"><?= htmlspecialchars($sec['title']) ?></h2>
                <div class="legal-section-text"><?= $sec['content'] ?></div>
            </div>
            <?php if ($idx < count($c['sections']) - 1): ?>
                <hr class="legal-divider">
            <?php endif; ?>
            <?php endforeach; ?>

            <div class="legal-footer-contact">
                <i class="fa-solid fa-cookie-bite" style="color: var(--aqua-teal); font-size: 1.8rem;"></i>
                <div>
                    <strong style="color: #0f172a;"><?= $lang === 'ru' ? 'Отдел технической поддержки и данных' : ($lang === 'en' ? 'Data & Technical Support' : 'Texniki və Məlumat Dəstəyi Şöbəsi') ?></strong><br>
                    <a href="mailto:info@thrive.az" style="color: var(--aqua-teal); text-decoration: none;">info@thrive.az</a> • <?= \Core\Language::get('physical_address') ?>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
/* ========================================================
   HIGH CONTRAST & READABLE LEGAL UI (PRIVACY, TERMS, COOKIE)
   ======================================================== */
.legal-hero {
    padding: 150px 0 60px;
    position: relative;
    background: linear-gradient(135deg, var(--deep-navy) 0%, #001e40 100%);
    color: #ffffff;
    overflow: hidden;
}
.legal-glow {
    position: absolute;
    top: 20%;
    left: 50%;
    transform: translateX(-50%);
    width: 600px;
    height: 300px;
    background: radial-gradient(circle, rgba(76, 162, 181, 0.22) 0%, rgba(0,0,0,0) 70%);
    pointer-events: none;
    z-index: 1;
    filter: blur(50px);
}
.legal-badge {
    display: inline-block;
    padding: 8px 20px;
    border-radius: 99px;
    background: rgba(76, 162, 181, 0.15);
    border: 1px solid rgba(76, 162, 181, 0.4);
    color: var(--aqua-teal);
    font-size: 0.82rem;
    font-weight: 700;
    letter-spacing: 2px;
    margin-bottom: 20px;
}
.legal-title {
    font-size: clamp(2.2rem, 4.5vw, 3.4rem);
    font-weight: 800;
    color: #ffffff;
    margin-bottom: 14px;
    line-height: 1.2;
    font-family: var(--font-heading);
}
.legal-date {
    font-size: 0.95rem;
    color: rgba(255, 255, 255, 0.75);
    letter-spacing: 0.5px;
}
.legal-content-section {
    padding: 60px 0 90px;
    background: var(--gray-light);
}
.legal-glass-box {
    background: #ffffff;
    border: 1px solid #e2e8f0;
    border-radius: 24px;
    padding: 50px 48px;
    box-shadow: 0 15px 45px rgba(0, 0, 0, 0.05);
}
.legal-section-block {
    margin: 25px 0;
}
.legal-section-title {
    font-size: 1.4rem;
    font-weight: 700;
    color: #0f172a;
    margin-bottom: 15px;
    font-family: var(--font-heading);
}
.legal-section-text {
    font-size: 1.05rem;
    color: #334155;
    line-height: 1.85;
}
.legal-divider {
    border: none;
    border-top: 1px solid #e2e8f0;
    margin: 35px 0;
}
.legal-footer-contact {
    margin-top: 45px;
    padding-top: 30px;
    border-top: 1px solid #e2e8f0;
    display: flex;
    align-items: center;
    gap: 18px;
    color: #475569;
    font-size: 0.98rem;
}
@media (max-width: 768px) {
    .legal-glass-box {
        padding: 35px 24px;
    }
}
</style>
