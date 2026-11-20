<?php
$lang = \Core\Language::current() ?: 'az';
if (!in_array($lang, ['az', 'en', 'ru'])) {
    $lang = 'az';
}

$termsData = [
    'az' => [
        'badge' => 'HÜQUQİ SƏNƏDLƏR • THRIVE EDUCATION CENTER',
        'title' => 'İstifadə Şərtləri və <span style="color: var(--aqua-teal);">Xidmət Qaydaları</span>',
        'date' => 'Qüvvəyə minmə tarixi: 1 Avqust 2026 • Versiya 2.4',
        'sections' => [
            [
                'title' => '1. Müqavilənin Predmeti və Şərtlərin Qəbulu',
                'content' => 'Bu İstifadə Şərtləri ("Şərtlər") Thrive Education Center (bundan sonra "Mərkəz") tərəfindən göstərilən xaricdə təhsil konsultasiyası, beynəlxalq imtahanlara hazırlıq (SAT, IELTS, TOEFL, DET) və təqaüd proqramlarına qəbul dəstəyi xidmətlərini tənzimləyir. Mərkəzimizin saytına daxil olmaqla, xidmətlərimizə yazılmaqla və ya müraciət etməklə siz bu şərtlərlə tam razılaşmış olursunuz.'
            ],
            [
                'title' => '2. Tələbə və Mərkəzin Qarşılıqlı Öhdəlikləri',
                'content' => '<strong>2.1. Mərkəzin öhdəlikləri:</strong><br>
                • Tələbəyə onun akademik və maliyyə profilinə uyğun ən optimal universitet və təqaüd strategiyasının hazırlanması;<br>
                • İmtahanlara yüksək səviyyəli metodiki hazırlıq və sınaq imtahanlarının təşkili;<br>
                • Universitet qəbul və viza sənədlərinin hazırlanmasında peşəkar mentorluğun göstərilməsi.<br><br>
                <strong>2.2. Tələbənin öhdəlikləri:</strong><br>
                • Tələb olunan sənədlərin (transkript, pasport, sertifikatlar) vaxtında və dəqiq təqdim edilməsi;<br>
                • Dərs davamiyyəti, ev tapşırıqları və sınaq imtahanlarının intizamlı şəkildə yerinə yetirilməsi;<br>
                • Xarici universitetlərin qəbul və təqaüd son müraciət tarixlərinə (deadlines) ciddi riayət olunması.'
            ],
            [
                'title' => '3. Qəbul və Təqaüd Nəticələrinə Dair Məsuliyyət',
                'content' => 'Mərkəzimiz tələbələrə 100% tam təqaüd (full-ride / full-tuition merit scholarships) qazandırmaq üçün təsdiqlənmiş və uğurlu metodologiyadan istifadə edir. Lakin yekun qəbul, təqaüd və viza qərarları müvafiq ölkələrin universitet qəbul komissiyaları, təhsil nazirlikləri və səfirlik konsulluqları tərəfindən müstəqil şəkildə verilir. Tələbə tərəfindən saxta sənəd təqdim edildikdə və ya akademik davamiyyət pozulduqda, Mərkəz nəticəyə məsuliyyət daşımır.'
            ],
            [
                'title' => '4. Ödəniş, Ləğv etmə və Geri Qaytarma Qaydaları',
                'content' => 'Xidmət haqqı seçilmiş konsultasiya və ya hazırlıq paketindən asılı olaraq təyin olunur. Dərslər başladıqdan sonra ilk 7 təqvim günü ərzində ləğv müraciəti edildikdə ödəniş istifadə olunmuş dərslər çıxılmaqla geri qaytarılır. 7 gündən sonra və ya xarici universitetə rəsmi qəbul prosesi başladıqdan sonra xidmət haqqı geri qaytarılmır.'
            ],
            [
                'title' => '5. Əqli Mülkiyyət və Müəllif Hüquqları',
                'content' => 'Thrive Education Center tərəfindən tələbələrə təqdim olunan bütün tədris materialları, analiz jurnalları, sınaq testləri, essay şablonları və veb-saytın vizual kontenti Mərkəzin müstəsna əqli mülkiyyətidir. Bu materialların üçüncü şəxslərə yayılması, kopyalanması və ya kommersiya məqsədilə istifadəsi qadağandır.'
            ]
        ]
    ],
    'en' => [
        'badge' => 'LEGAL DOCUMENTATION • THRIVE EDUCATION CENTER',
        'title' => 'Terms of Service & <span style="color: var(--aqua-teal);">Service Agreement</span>',
        'date' => 'Effective Date: August 1, 2026 • Version 2.4',
        'sections' => [
            [
                'title' => '1. Scope of Agreement & Acceptance',
                'content' => 'These Terms of Service ("Terms") govern all international study abroad advisory, standardized test preparation (SAT, IELTS, TOEFL, DET), and scholarship guidance services provided by Thrive Education Center ("Center"). By accessing our website, booking a consultation, or enrolling in our academic tracks, you agree to be legally bound by these Terms.'
            ],
            [
                'title' => '2. Mutual Responsibilities & Obligations',
                'content' => '<strong>2.1. Center\'s Commitments:</strong><br>
                • Crafting personalized university admissions and full-ride scholarship strategies tailored to the student\'s profile;<br>
                • Delivering structured test preparation with recurring analytical diagnostic simulations;<br>
                • Providing professional mentorship throughout the application, essay writing, and visa processes.<br><br>
                <strong>2.2. Student\'s Commitments:</strong><br>
                • Prompt and accurate submission of all academic transcripts, identification, and supporting documents;<br>
                • Consistent attendance, task completion, and adherence to academic integrity guidelines;<br>
                • Strict compliance with university application deadlines and official fee requirements.'
            ],
            [
                'title' => '3. Admissions & Scholarship Disclaimer',
                'content' => 'Thrive Education Center utilizes a proven admissions framework designed to secure 100% full-tuition and full-ride merit scholarships. However, final admission, grant allocation, and visa decisions remain the sole discretion of respective university admissions committees, scholarship boards, and embassy consular sections. The Center holds no liability if a student submits falsified documentation or fails to maintain required academic standards.'
            ],
            [
                'title' => '4. Tuition, Cancellations & Refund Policy',
                'content' => 'Service fees are determined by the selected consultation or test preparation tier. Notice of cancellation within the first 7 calendar days of course commencement entitles the student to a refund, less the cost of completed sessions. After 7 days or once official university applications have been submitted, service fees are non-refundable.'
            ],
            [
                'title' => '5. Intellectual Property Rights',
                'content' => 'All proprietary study materials, analytical test banks, essay templates, admissions workbooks, and website graphics provided by Thrive Education Center are protected intellectual property. Unauthorized copying, redistribution, or commercial use of these materials is strictly prohibited under copyright law.'
            ]
        ]
    ],
    'ru' => [
        'badge' => 'ЮРИДИЧЕСКИЕ ДОКУМЕНТЫ • THRIVE EDUCATION CENTER',
        'title' => 'Условия использования и <span style="color: var(--aqua-teal);">Правила оказания услуг</span>',
        'date' => 'Дата вступления в силу: 1 августа 2026 г. • Версия 2.4',
        'sections' => [
            [
                'title' => '1. Предмет соглашения и принятие условий',
                'content' => 'Настоящие Условия использования («Условия») регулируют предоставление услуг по поступлению в зарубежные вузы, подготовке к международным экзаменам (SAT, IELTS, TOEFL, DET) и сопровождению грантов компанией Thrive Education Center («Центр»). Использование нашего сайта или запись на программы означает ваше полное согласие с настоящими Условиями.'
            ],
            [
                'title' => '2. Взаимные обязательства Сторон',
                'content' => '<strong>2.1. Обязательства Центра:</strong><br>
                • Разработка оптимальной стратегии поступления и получения стипендий на основе профиля студента;<br>
                • Качественная подготовка к экзаменам и проведение регулярных диагностических тестов;<br>
                • Профессиональное сопровождение при оформлении документов, эссе и студенческой визы.<br><br>
                <strong>2.2. Обязательства Студента:</strong><br>
                • Своевременное предоставление достоверных документов (табели, паспорта, сертификаты);<br>
                • Соблюдение учебной дисциплины, посещение занятий и выполнение заданий;<br>
                • Строгое соблюдение сроков подачи заявок (deadlines) в университеты.'
            ],
            [
                'title' => '3. Ответственность за решения приемных комиссий',
                'content' => 'Thrive Education Center применяет эффективную методологию, ориентированную на получение 100% грантов и стипендий. Однако окончательное решение о зачислении, выделении финансирования и выдаче визы принимается исключительно приемными комиссиями вузов и консульскими отделами посольств. Центр не несет ответственности в случае предоставления студентом недостоверных данных или нарушения дисциплины.'
            ],
            [
                'title' => '4. Оплата, отмена и возврат средств',
                'content' => 'Стоимость услуг зависит от выбранной программы. При подаче заявления об отказе в течение первых 7 календарных дней после начала курса производится возврат средств за вычетом проведенных занятий. По истечении 7 дней или после начала официального процесса подачи документов в вуз оплата не возвращается.'
            ],
            [
                'title' => '5. Авторские права и интеллектуальная собственность',
                'content' => 'Все учебные пособия, тестовые материалы, шаблоны эссе и методические руководства, предоставляемые студентам, являются исключительной собственностью Thrive Education Center. Любое копирование, распространение или коммерческое использование материалов третьими лицами запрещено.'
            ]
        ]
    ]
];

$c = $termsData[$lang];
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
                <i class="fa-solid fa-file-contract" style="color: var(--aqua-teal); font-size: 1.8rem;"></i>
                <div>
                    <strong style="color: #0f172a;"><?= $lang === 'ru' ? 'Юридический отдел' : ($lang === 'en' ? 'Legal & Compliance Office' : 'Hüquq və Qaydalar Şöbəsi') ?></strong><br>
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
