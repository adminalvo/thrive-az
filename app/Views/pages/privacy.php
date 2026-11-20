<?php
$lang = \Core\Language::current() ?: 'az';
if (!in_array($lang, ['az', 'en', 'ru'])) {
    $lang = 'az';
}

$privacyData = [
    'az' => [
        'badge' => 'HÜQUQİ SƏNƏDLƏR • THRIVE EDUCATION CENTER',
        'title' => 'Məxfilik Siyasəti və <span style="color: var(--aqua-teal);">Fərdi Məlumatların Qorunması</span>',
        'date' => 'Qüvvəyə minmə tarixi: 1 Avqust 2026 • Versiya 2.4',
        'sections' => [
            [
                'title' => '1. Ümumi Müddəalar və Hüquqi Əsaslar',
                'content' => 'Thrive Education Center ("Biz", "Mərkəz" və ya "Thrive") istifadəçilərin, tələbələrin və valideynlərin fərdi məlumatlarının toxunulmazlığına və təhlükəsizliyinə maksimum zəmanət verir. Bu Məxfilik Siyasəti Azərbaycan Respublikasının "Fərdi məlumatlar haqqında" Qanununa və Avropa İttifaqının Ümumi Məlumatların Qorunması Əsasnaməsinə (GDPR) tam uyğun olaraq hazırlanmışdır. Saytımızdan istifadə etdikdə, konsultasiya üçün qeydiyyatdan keçdikdə və ya xidmətlərimizə müraciət etdikdə bu siyasəti qəbul etmiş hesab olunursunuz.'
            ],
            [
                'title' => '2. Topladığımız Məlumatların Kateqoriyaları',
                'content' => 'Biz aşağıdakı fərdi və texniki məlumatları toplayırıq:<br><br>
                <strong>• İdentifikasiya məlumatları:</strong> Ad, soyad, ata adı, doğum tarixi, vətəndaşlıq.<br>
                <strong>• Əlaqə məlumatları:</strong> Mobil telefon nömrəsi, e-poçt ünvanı, yaşayış ünvanı.<br>
                <strong>• Akademik məlumatlar:</strong> Orta məktəb və ya universitet qiymət cədvəli (GPA), SAT/IELTS/TOEFL/DET imtahan nəticələri, sertifikatlar, CV və motivasiya məktubları.<br>
                <strong>• Rəqəmsal və Texniki məlumatlar:</strong> IP ünvanı, brauzer növü, cihaz informasiyası və sayt-daxili hərəkət tarixçəsi.'
            ],
            [
                'title' => '3. Məlumatların İstifadə Məqsədləri',
                'content' => 'Toplanılan fərdi məlumatlar yalnız aşağıdakı məqsədlər üçün istifadə olunur:<br><br>
                1. Xaricdə təhsil üzrə fərdi qəbul strategiyasının və təqaüd yol xəritəsinin hazırlanması;<br>
                2. ABŞ, Böyük Britaniya, Avropa və Asiya universitetlərinə rəsmi qəbul müraciətlərinin təşkili;<br>
                3. SAT, IELTS və digər hazırlıq imtahanlarının qeydiyyatı və analitik nəticələrin takibi;<br>
                4. Tələbə və valideynlərlə operativ əlaqənin saxlanılması və vacib bildirişlərin göndərilməsi.'
            ],
            [
                'title' => '4. Məlumatların Üçüncü Tərəflərlə Paylaşılması',
                'content' => 'Thrive Education Center heç bir halda fərdi məlumatları reklam və ya kommersiya məqsədilə üçüncü tərəflərə satmır. Məlumatlar yalnız tələbənin yazılı və ya rəqəmsal razılığı ilə müraciət olunan xarici universitetlərin qəbul komissiyaları, rəsmi imtahan mərkəzləri (College Board, British Council, IDP) və viza dəstəyi üçün səfirliklərə təqdim oluna bilər.'
            ],
            [
                'title' => '5. Məlumatların Təhlükəsizliyi və Saxlanma Müddəti',
                'content' => 'Məlumatlarınız 256-bit SSL şifrələmə protokolları ilə qorunan bulud serverlərində (Supabase / AWS Secure Infrastructure) saxlanılır. Fərdi məlumatlar təhsil xidmətləri bitdikdən sonra qanunvericiliklə müəyyən olunmuş arxiv müddəti ərzində saxlanılır və müddət bitdikdən sonra təhlükəsiz şəkildə silinir.'
            ],
            [
                'title' => '6. İstifadəçi Hüquqları (GDPR Uyğunluğu)',
                'content' => 'Hər bir istifadəçi öz fərdi məlumatlarına çıxış tələb etmək, yanlış məlumatların düzəldilməsini istəmək, məlumatların silinməsini ("unudulmaq hüququ") və ya emalının məhdudlaşdırılmasını tələb etmək hüququna malikdir. Bu hüquqlardan istifadə etmək üçün <strong>info@thrive.az</strong> e-poçt ünvanına yazılı müraciət edə bilərsiniz.'
            ]
        ]
    ],
    'en' => [
        'badge' => 'LEGAL DOCUMENTATION • THRIVE EDUCATION CENTER',
        'title' => 'Privacy Policy & <span style="color: var(--aqua-teal);">Personal Data Protection</span>',
        'date' => 'Effective Date: August 1, 2026 • Version 2.4',
        'sections' => [
            [
                'title' => '1. General Provisions & Legal Framework',
                'content' => 'Thrive Education Center ("We", "Center", or "Thrive") is dedicated to protecting the confidentiality and security of personal data belonging to our students, parents, and website visitors. This Privacy Policy is drafted in full compliance with the Law of the Republic of Azerbaijan on Personal Data and the EU General Data Protection Regulation (GDPR). By accessing our website or registering for our services, you consent to the data practices described herein.'
            ],
            [
                'title' => '2. Categories of Data We Collect',
                'content' => 'We collect the following personal and educational data:<br><br>
                <strong>• Identification Data:</strong> Full name, date of birth, nationality.<br>
                <strong>• Contact Information:</strong> Mobile phone number, email address, physical residential address.<br>
                <strong>• Academic Records:</strong> High school or university transcripts (GPA), SAT/IELTS/TOEFL/DET test scores, certificates, CVs, and personal statements.<br>
                <strong>• Digital & Technical Data:</strong> IP address, browser type, device identifiers, and website navigation analytics.'
            ],
            [
                'title' => '3. Purposes of Data Processing',
                'content' => 'Collected data is processed exclusively for the following academic and administrative purposes:<br><br>
                1. Developing customized admissions roadmaps and merit scholarship strategies;<br>
                2. Submitting official university applications to institutions across the US, UK, Europe, and Asia;<br>
                3. Registering students for standardized testing and monitoring diagnostic progress;<br>
                4. Maintaining direct communication with students and parents regarding deadlines and updates.'
            ],
            [
                'title' => '4. Disclosure to Third Parties',
                'content' => 'Thrive Education Center never sells or rents personal data to commercial advertisers. Information is disclosed solely with the explicit consent of the applicant to target university admissions offices, official examination boards (College Board, British Council, IDP), and embassy consular sections for visa facilitation.'
            ],
            [
                'title' => '5. Data Storage, Security & Retention',
                'content' => 'All personal data is encrypted using industry-standard 256-bit SSL protocols and hosted on secure cloud infrastructure (Supabase / AWS Secure Infrastructure). Records are retained for the duration required by educational compliance laws and are securely erased upon expiration of the statutory retention period.'
            ],
            [
                'title' => '6. Your Rights Under GDPR',
                'content' => 'You have the right to access your personal data, request the correction of inaccurate records, demand erasure ("right to be forgotten"), or restrict processing. To exercise any of these rights, please submit a formal inquiry to <strong>info@thrive.az</strong>.'
            ]
        ]
    ],
    'ru' => [
        'badge' => 'ЮРИДИЧЕСКИЕ ДОКУМЕНТЫ • THRIVE EDUCATION CENTER',
        'title' => 'Политика конфиденциальности и <span style="color: var(--aqua-teal);">Защита персональных данных</span>',
        'date' => 'Дата вступления в силу: 1 августа 2026 г. • Версия 2.4',
        'sections' => [
            [
                'title' => '1. Общие положения и правовая основа',
                'content' => 'Thrive Education Center («Мы», «Центр» или «Thrive») гарантирует полную конфиденциальность и безопасность персональных данных студентов, родителей и посетителей сайта. Настоящая Политика разработана в соответствии с Законом Азербайджанской Республики «О персональных данных» и Европейским регламентом по защите данных (GDPR). Использование нашего сайта означает ваше полное согласие с данными условиями.'
            ],
            [
                'title' => '2. Категории собираемых данных',
                'content' => 'Мы собираем следующие персональные и академические данные:<br><br>
                <strong>• Идентификационные данные:</strong> Имя, фамилия, отчество, дата рождения, гражданство.<br>
                <strong>• Контактная информация:</strong> Номер мобильного телефона, адрес электронной почты, адрес проживания.<br>
                <strong>• Академические сведения:</strong> Оценки (GPA), результаты экзаменов SAT/IELTS/TOEFL/DET, сертификаты, резюме и мотивационные письма.<br>
                <strong>• Цифровые и технические данные:</strong> IP-адрес, тип браузера, данные устройства и статистика посещений.'
            ],
            [
                'title' => '3. Цели обработки информации',
                'content' => 'Собранные данные используются исключительно для следующих целей:<br><br>
                1. Разработка индивидуальной стратегии поступления и получения грантов;<br>
                2. Подача официальных заявок в университеты США, Великобритании, Европы и Азии;<br>
                3. Регистрация на международные экзамены и мониторинг прогресса;<br>
                4. Оперативная связь со студентами и родителями по организационным вопросам.'
            ],
            [
                'title' => '4. Передача данных третьим лицам',
                'content' => 'Thrive Education Center никогда не продает персональные данные третьим лицам. Передача данных осуществляется только с согласия студента приемным комиссиям зарубежных вузов, экзаменационным центрам (College Board, British Council) и посольствам для оформления визы.'
            ],
            [
                'title' => '5. Безопасность и хранение данных',
                'content' => 'Ваши данные хранятся на защищенных облачных серверах (Supabase / AWS) с использованием 256-битного SSL-шифрования. Данные хранятся в течение срока, установленного законодательством для образовательных архивов, после чего безвозвратно удаляются.'
            ],
            [
                'title' => '6. Права пользователей (GDPR)',
                'content' => 'Каждый пользователь имеет право на доступ к своим данным, исправление неточностей, удаление данных («право быть забытым») или ограничение их обработки. Для реализации своих прав обратитесь по адресу <strong>info@thrive.az</strong>.'
            ]
        ]
    ]
];

$c = $privacyData[$lang];
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
                <i class="fa-solid fa-shield-halved" style="color: var(--aqua-teal); font-size: 1.8rem;"></i>
                <div>
                    <strong style="color: #0f172a;"><?= $lang === 'ru' ? 'Служба защиты информации' : ($lang === 'en' ? 'Data Protection Officer' : 'Məlumatların Qorunması Xidməti') ?></strong><br>
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
