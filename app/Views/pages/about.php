<?php
$lang = \Core\Language::current() ?: 'az';
if (!in_array($lang, ['az', 'en', 'ru'])) {
    $lang = 'az';
}

$aboutData = [
    'az' => [
        'badge' => 'BEYNƏLXALQ TƏHSİL PLATFORMASI • BAKU, AZERBAIJAN',
        'title' => 'Gələcəyin Liderlərini <span style="color: var(--aqua-teal);">Dünya Səhnəsinə</span> Daşıyırıq',
        'subtitle' => 'Thrive Education Center sadəcə bir imtahan mərkəzi deyil; Azərbaycan gənclərinə Harvard, Bocconi, KAIST və Avropanın ən prestijli universitetlərində 100% təqaüd qazandıran innovativ karyera və qəbul ekosistemidir.',
        
        'stats' => [
            ['value' => '$2.4M+', 'label' => 'Qazanılmış Tam Təqaüd', 'desc' => 'Tələbələrimizin ABŞ və Avropa universitetlərində əldə etdiyi ümumi qrant dəyəri'],
            ['value' => '100%', 'label' => 'Qəbul & Təqaüd Zəmanəti', 'desc' => 'Strateji qəbul proqramımıza qoşulan hər bir tələbə üçün hədəflənmiş nəticə'],
            ['value' => '1510+', 'label' => 'SAT Rekord Nəticələri', 'desc' => 'Ölkə üzrə ən yüksək SAT və IELTS (8.0+) bal ortalaması'],
            ['value' => '17+', 'label' => 'Top Universitet Məzunları', 'desc' => 'Dünyanın İlk 100-lük reytinqində təhsil alan Thrive tələbələri']
        ],

        'story_title' => 'Bizim Hekayəmiz və <span style="color: var(--aqua-teal);">Təsisçi Baxışı</span>',
        'story_p1' => 'Thrive Education Center, ənənəvi "kurs" anlayışını qıraraq, Azərbaycan gənclərinin dünya təhsil standartlarına çıxışını təmin etmək məqsədilə qurulmuşdur. Platformamızın əsas təməli, təsisçimiz <strong>Tamerlan Mammadov</strong> tərəfindən irəli sürülən "Hər bir potensiallı gənc, maddi imkanından asılı olmayaraq, dünyanın ən yaxşı universitetlərində təqaüdlə oxumaq hüququna malikdir" fəlsəfəsinə əsaslanır.',
        'story_p2' => 'Tamerlan Mammadovun rəhbərliyi ilə hazırlanan analitik qəbul modeli sayəsində biz tələbələri sadəcə SAT və ya IELTS imtahanlarına əzbərçi üsulla deyil, akademik tənqidi düşüncəyə, güclü portfolio quruculuğuna və fərdi hekayə (Personal Statement) yaratmağa yönəldirik. Bu yanaşma qısa müddətdə Bocconi, KAIST, Polimi, KU Leuven, TUM və digər dünya nəhənglərində 100% tam təqaüd rekordları ilə nəticələndi.',
        'story_quote' => '«Bizim məqsədimiz sadəcə universitetə qəbul almaq deyil, Azərbaycanı dünya miqyasında təmsil edəcək qlobal düşüncəli, savadlı və özgüvənli gənclər nəsli yetişdirməkdir.»',
        'founder_name' => 'Tamerlan Mammadov',
        'founder_role' => 'Təsisçi & Baş Strateji Rəhbər',

        'pillars_title' => 'Bizi Fərqləndirən <span style="color: var(--aqua-teal);">3 Əsas Sütun</span>',
        'pillars' => [
            [
                'icon' => 'fa-solid fa-compass-drafting',
                'title' => 'Holistik Qəbul Strategiyası',
                'desc' => 'ABŞ və Avropa universitetlərinin qəbul komissiyalarının axtardığı liderlik, sosial layihələr və akademik dərinliyi özündə birləşdirən fərdi yol xəritəsi.'
            ],
            [
                'icon' => 'fa-solid fa-chart-line',
                'title' => 'Data-Əsaslı İmtahan Hazırlığı',
                'desc' => 'SAT, IELTS, TOEFL və DET üzrə rəsmi imtahan alqoritmlərinə əsaslanan, zəif nöqtələri süni intellekt və analitik sınaqlarla aradan qaldıran sistem.'
            ],
            [
                'icon' => 'fa-solid fa-handshake-angle',
                'title' => 'Ömürlük Məzun Dəstəyi',
                'desc' => 'Tələbələrimiz qəbul olduqdan sonra belə viza, yataqxana, xaricdə adaptasiya və beynəlxalq karyera planlamasında dəstəyimizi davam etdiririk.'
            ]
        ],

        'cta_title' => 'Xəyallarınızdakı Universitetə İlk Addımı Atın',
        'cta_desc' => 'Peşəkar qəbul ekspertlərimizlə ödənişsiz fərdi konsultasiya təyin edin və təqaüd şansınızı dərhal öyrənin.',
        'cta_btn' => 'Konsultasiya Sifariş Et'
    ],
    'en' => [
        'badge' => 'PREMIER INTERNATIONAL EDUCATION PLATFORM • BAKU, AZERBAIJAN',
        'title' => 'Empowering Future Leaders for the <span style="color: var(--aqua-teal);">Global Stage</span>',
        'subtitle' => 'Thrive Education Center is more than a test prep institute—it is an elite admissions ecosystem that equips youth in Azerbaijan to earn 100% full-ride merit scholarships to world-renowned universities.',
        
        'stats' => [
            ['value' => '$2.4M+', 'label' => 'Merit Scholarships Won', 'desc' => 'Total scholarship funding secured by our students at top US and European institutions'],
            ['value' => '100%', 'label' => 'Admissions & Grant Focus', 'desc' => 'Dedicated full-ride scholarship guidance for every student in our strategic track'],
            ['value' => '1510+', 'label' => 'Top SAT Score Average', 'desc' => 'Leading standard in Baku for SAT and IELTS (8.0+) standardized excellence'],
            ['value' => '17+', 'label' => 'Global Top-100 Alumni', 'desc' => 'Students thriving at Bocconi, KAIST, Polimi, KU Leuven, and Ivy-tier universities']
        ],

        'story_title' => 'Our Story & <span style="color: var(--aqua-teal);">Founder\'s Vision</span>',
        'story_p1' => 'Thrive Education Center was established to revolutionize international education in Azerbaijan by dismantling outdated tutoring methods. At the heart of our mission lies the core philosophy of our founder, <strong>Tamerlan Mammadov</strong>: "Every talented student, regardless of financial background, deserves access to a world-class education with full scholarship support."',
        'story_p2' => 'Under Tamerlan Mammadov\'s leadership, Thrive developed a holistic admissions methodology that goes far beyond rote memorization for the SAT or IELTS. We mentor students to cultivate analytical critical thinking, develop high-impact extracurricular portfolios, and craft compelling personal narratives. This vision has resulted in unprecedented 100% full-scholarship acceptance records at global giants like Bocconi, KAIST, TUM, and Polimi.',
        'story_quote' => '«Our ultimate goal is not just securing university admission—it is shaping a generation of globally-minded, articulate, and confident leaders who will represent Azerbaijan on the world stage.»',
        'founder_name' => 'Tamerlan Mammadov',
        'founder_role' => 'Founder & Chief Admissions Strategist',

        'pillars_title' => 'Our <span style="color: var(--aqua-teal);">3 Core Pillars</span> of Excellence',
        'pillars' => [
            [
                'icon' => 'fa-solid fa-compass-drafting',
                'title' => 'Holistic Admissions Roadmap',
                'desc' => 'We align academic excellence, leadership impact, and extracurricular depth with the exact criteria demanded by elite US and European admissions committees.'
            ],
            [
                'icon' => 'fa-solid fa-chart-line',
                'title' => 'Data-Driven Test Preparation',
                'desc' => 'Our SAT, IELTS, TOEFL, and DET training leverages official testing patterns and diagnostic analytics to guarantee rapid score improvements.'
            ],
            [
                'icon' => 'fa-solid fa-handshake-angle',
                'title' => 'Lifelong Mentorship & Support',
                'desc' => 'From visa navigation and dormitory acquisition to international career networking, our commitment continues long after the acceptance letter arrives.'
            ]
        ],

        'cta_title' => 'Take the First Step Toward Your Dream University',
        'cta_desc' => 'Schedule a complimentary strategic consultation with our admissions directors today.',
        'cta_btn' => 'Book Your Consultation'
    ],
    'ru' => [
        'badge' => 'МЕЖДУНАРОДНАЯ ОБРАЗОВАТЕЛЬНАЯ ПЛАТФОРМА • БАКУ, АЗЕРБАЙДЖАН',
        'title' => 'Выводим лидеров будущего на <span style="color: var(--aqua-teal);">Мировую Арену</span>',
        'subtitle' => 'Thrive Education Center — это не просто курсы подготовки к экзаменам, а инновационная экосистема поступления, помогающая студентам из Азербайджана получать 100% гранты и стипендии в ведущих вузах мира.',
        
        'stats' => [
            ['value' => '$2.4M+', 'label' => 'Выигранных стипендий', 'desc' => 'Общая сумма грантов, полученных нашими студентами в США и Европе'],
            ['value' => '100%', 'label' => 'Гарантия и фокус на гранты', 'desc' => 'Целевое сопровождение для получения полного финансирования обучения'],
            ['value' => '1510+', 'label' => 'Рекорды баллов SAT', 'desc' => 'Высочайший средний балл по SAT и IELTS (8.0+) среди студентов в Баку'],
            ['value' => '17+', 'label' => 'Выпускники ТОП-100 вузов', 'desc' => 'Наши студенты в Bocconi, KAIST, Polimi, KU Leuven и вузах Лиги Плюща']
        ],

        'story_title' => 'Наша история и <span style="color: var(--aqua-teal);">Видение Основателя</span>',
        'story_p1' => 'Thrive Education Center был создан с целью трансформировать сферу образования за рубежом в Азербайджане и открыть амбициозной молодежи доступ к лучшим университетам мира. В основе нашей работы лежит убеждение нашего основателя, <strong>Тамерлана Мамедова</strong>: «Каждый талантливый студент, независимо от финансовых возможностей, имеет право на качественное образование в лучших вузах мира с полным грантом».',
        'story_p2' => 'Под руководством Тамерлана Мамедова была создана аналитическая модель подготовки, которая выходит далеко за рамки стандартного заучивания тестов SAT или IELTS. Мы помогаем студентам развивать критическое мышление, создавать сильное портфолио и писать выдающиеся мотивационные эссе (Personal Statement), что обеспечивает поступление в Bocconi, KAIST, Polimi, TUM со 100% стипендией.',
        'story_quote' => '«Наша цель — не просто поступление в вуз, а воспитание уверенного в себе, образованного и глобально мыслящего нового поколения лидеров Азербайджана.»',
        'founder_name' => 'Тамерлан Мамедов',
        'founder_role' => 'Основатель и главный стратег по поступлению',

        'pillars_title' => 'Наши <span style="color: var(--aqua-teal);">3 главных преимущества</span>',
        'pillars' => [
            [
                'icon' => 'fa-solid fa-compass-drafting',
                'title' => 'Комплексная стратегия поступления',
                'desc' => 'Индивидуальный план, объединяющий академические достижения, лидерские качества и социальные проекты для приемных комиссий топ-вузов.'
            ],
            [
                'icon' => 'fa-solid fa-chart-line',
                'title' => 'Аналитическая подготовка к тестам',
                'desc' => 'Система обучения SAT, IELTS, TOEFL и DET на основе реальных алгоритмов экзаменов и точной диагностики слабых сторон.'
            ],
            [
                'icon' => 'fa-solid fa-handshake-angle',
                'title' => 'Поддержка выпускников',
                'desc' => 'Мы сопровождаем студентов на этапах получения визы, заселения в кампус и адаптации за рубежом на протяжении всей учебы.'
            ]
        ],

        'cta_title' => 'Сделайте первый шаг к поступлению в вуз мечты',
        'cta_desc' => 'Запишитесь на бесплатную консультацию с нашими экспертами и оцените свои шансы на полную стипендию.',
        'cta_btn' => 'Записаться на консультацию'
    ]
];

$c = $aboutData[$lang];
?>

<!-- Premium Dark Hero Section -->
<section class="about-hero-section">
    <div class="about-hero-bg-glow"></div>
    <div class="container" style="max-width: 960px; position: relative; z-index: 2;">
        <div class="about-badge" data-aos="fade-up"><?= htmlspecialchars($c['badge']) ?></div>
        <h1 class="about-title" data-aos="fade-up" data-aos-delay="100">
            <?= $c['title'] ?>
        </h1>
        <p class="about-subtitle" data-aos="fade-up" data-aos-delay="200">
            <?= htmlspecialchars($c['subtitle']) ?>
        </p>
    </div>
</section>

<!-- Stats Grid (High Contrast Clean Bento Style) -->
<section class="about-stats-section">
    <div class="container" style="max-width: 1100px;">
        <div class="about-stats-grid">
            <?php foreach ($c['stats'] as $idx => $stat): ?>
            <div class="about-stat-card" data-aos="fade-up" data-aos-delay="<?= 100 * ($idx + 1) ?>">
                <div class="stat-value"><?= htmlspecialchars($stat['value']) ?></div>
                <div class="stat-label"><?= htmlspecialchars($stat['label']) ?></div>
                <div class="stat-desc"><?= htmlspecialchars($stat['desc']) ?></div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Founder Story & Narrative Section -->
<section class="about-story-section">
    <div class="container" style="max-width: 1000px;">
        <div class="about-story-card" data-aos="fade-up">
            <div class="story-content-left">
                <h2 class="story-heading"><?= $c['story_title'] ?></h2>
                <p class="story-p"><?= $c['story_p1'] ?></p>
                <p class="story-p"><?= $c['story_p2'] ?></p>
                
                <blockquote class="story-quote">
                    <?= $c['story_quote'] ?>
                </blockquote>

                <div class="founder-info-row">
                    <div class="founder-avatar">
                        <i class="fa-solid fa-user-graduate"></i>
                    </div>
                    <div>
                        <div class="founder-name"><?= htmlspecialchars($c['founder_name']) ?></div>
                        <div class="founder-role"><?= htmlspecialchars($c['founder_role']) ?></div>
                    </div>
                    <a href="https://www.linkedin.com/in/tamerlan-mammadov-548976240/" target="_blank" rel="noopener" class="founder-linkedin-btn" title="LinkedIn">
                        <i class="fa-brands fa-linkedin-in"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Core Pillars Section -->
<section class="about-pillars-section">
    <div class="container" style="max-width: 1100px;">
        <h2 class="pillars-heading" data-aos="fade-up"><?= $c['pillars_title'] ?></h2>
        
        <div class="pillars-grid">
            <?php foreach ($c['pillars'] as $idx => $pillar): ?>
            <div class="pillar-card" data-aos="fade-up" data-aos-delay="<?= 100 * ($idx + 1) ?>">
                <div class="pillar-icon">
                    <i class="<?= htmlspecialchars($pillar['icon']) ?>"></i>
                </div>
                <h3 class="pillar-title"><?= htmlspecialchars($pillar['title']) ?></h3>
                <p class="pillar-desc"><?= htmlspecialchars($pillar['desc']) ?></p>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Call To Action Section -->
<section class="about-cta-section">
    <div class="container" style="max-width: 800px; text-align: center;">
        <div class="about-cta-box" data-aos="zoom-in">
            <h2 class="cta-heading"><?= htmlspecialchars($c['cta_title']) ?></h2>
            <p class="cta-desc"><?= htmlspecialchars($c['cta_desc']) ?></p>
            <a href="<?= APP_URL ?>/contact" class="cta-btn">
                <span><?= htmlspecialchars($c['cta_btn']) ?></span>
                <i class="fa-solid fa-arrow-right"></i>
            </a>
        </div>
    </div>
</section>

<style>
/* ========================================================
   ABOUT US PAGE — HIGH CONTRAST & READABLE STYLES
   ======================================================== */
.about-hero-section {
    padding: 160px 0 80px;
    position: relative;
    text-align: center;
    background: linear-gradient(135deg, var(--deep-navy) 0%, #001e40 100%);
    color: #fff;
    overflow: hidden;
}
.about-hero-bg-glow {
    position: absolute;
    top: 20%;
    left: 50%;
    transform: translateX(-50%);
    width: 650px;
    height: 350px;
    background: radial-gradient(circle, rgba(76, 162, 181, 0.22) 0%, rgba(0,0,0,0) 70%);
    pointer-events: none;
    z-index: 1;
    filter: blur(50px);
}
.about-badge {
    display: inline-block;
    padding: 8px 20px;
    border-radius: 99px;
    background: rgba(76, 162, 181, 0.15);
    border: 1px solid rgba(76, 162, 181, 0.4);
    color: var(--aqua-teal);
    font-size: 0.82rem;
    font-weight: 700;
    letter-spacing: 2px;
    margin-bottom: 24px;
}
.about-title {
    font-size: clamp(2.4rem, 5vw, 3.8rem);
    font-weight: 800;
    line-height: 1.18;
    color: #ffffff;
    margin-bottom: 24px;
    letter-spacing: -0.5px;
    font-family: var(--font-heading);
}
.about-subtitle {
    font-size: clamp(1.1rem, 2.2vw, 1.3rem);
    color: rgba(255, 255, 255, 0.88);
    line-height: 1.7;
    max-width: 800px;
    margin: 0 auto;
    font-weight: 400;
}

/* Stats Bento Grid */
.about-stats-section {
    padding: 60px 0;
    background: #ffffff;
    border-bottom: 1px solid #e2e8f0;
}
.about-stats-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(230px, 1fr));
    gap: 25px;
}
.about-stat-card {
    background: #f8fafc;
    border: 1px solid #e2e8f0;
    border-radius: 20px;
    padding: 32px 26px;
    text-align: left;
    transition: all 0.35s cubic-bezier(0.16, 1, 0.3, 1);
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.03);
}
.about-stat-card:hover {
    transform: translateY(-5px);
    background: #ffffff;
    border-color: var(--aqua-teal);
    box-shadow: 0 16px 35px rgba(76, 162, 181, 0.12);
}
.stat-value {
    font-size: clamp(2.2rem, 4vw, 3rem);
    font-weight: 800;
    color: var(--aqua-teal);
    font-family: var(--font-heading);
    margin-bottom: 6px;
    line-height: 1;
}
.stat-label {
    font-size: 1.15rem;
    font-weight: 700;
    color: #0f172a;
    margin-bottom: 8px;
}
.stat-desc {
    font-size: 0.95rem;
    color: #475569;
    line-height: 1.6;
}

/* Founder & Story Narrative Card */
.about-story-section {
    padding: 80px 0;
    background: var(--gray-light);
}
.about-story-card {
    background: #ffffff;
    border: 1px solid #e2e8f0;
    border-radius: 24px;
    padding: 55px 50px;
    box-shadow: 0 15px 45px rgba(0, 0, 0, 0.05);
    position: relative;
}
.story-heading {
    font-size: clamp(1.8rem, 3.5vw, 2.6rem);
    font-weight: 700;
    color: #0f172a;
    margin-bottom: 25px;
    font-family: var(--font-heading);
}
.story-p {
    font-size: 1.12rem;
    color: #334155;
    line-height: 1.85;
    margin-bottom: 20px;
}
.story-quote {
    margin: 35px 0;
    padding: 24px 30px;
    background: #f0fdf4;
    border-left: 4px solid var(--aqua-teal);
    border-radius: 0 16px 16px 0;
    font-size: 1.18rem;
    font-style: italic;
    color: #0f172a;
    line-height: 1.7;
}
.founder-info-row {
    display: flex;
    align-items: center;
    gap: 18px;
    margin-top: 35px;
    padding-top: 30px;
    border-top: 1px solid #e2e8f0;
}
.founder-avatar {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    background: linear-gradient(135deg, var(--ocean-blue) 0%, var(--aqua-teal) 100%);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.6rem;
    color: #ffffff;
    box-shadow: 0 8px 20px rgba(76, 162, 181, 0.25);
    flex-shrink: 0;
}
.founder-name {
    font-size: 1.25rem;
    font-weight: 700;
    color: #0f172a;
}
.founder-role {
    font-size: 0.95rem;
    color: var(--aqua-teal);
    font-weight: 600;
}
.founder-linkedin-btn {
    margin-left: auto;
    width: 44px;
    height: 44px;
    border-radius: 50%;
    background: #f1f5f9;
    border: 1px solid #cbd5e1;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #0f172a;
    font-size: 1.1rem;
    text-decoration: none;
    transition: all 0.3s ease;
}
.founder-linkedin-btn:hover {
    background: #0a66c2;
    border-color: #0a66c2;
    color: #ffffff;
    transform: scale(1.1);
}

/* Pillars Section */
.about-pillars-section {
    padding: 40px 0 80px;
    background: var(--gray-light);
}
.pillars-heading {
    font-size: clamp(1.8rem, 3.5vw, 2.6rem);
    font-weight: 700;
    color: #0f172a;
    text-align: center;
    margin-bottom: 50px;
    font-family: var(--font-heading);
}
.pillars-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 30px;
}
.pillar-card {
    background: #ffffff;
    border: 1px solid #e2e8f0;
    border-radius: 20px;
    padding: 40px 32px;
    text-align: left;
    transition: all 0.35s cubic-bezier(0.16, 1, 0.3, 1);
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.04);
}
.pillar-card:hover {
    transform: translateY(-6px);
    border-color: var(--aqua-teal);
    box-shadow: 0 16px 35px rgba(76, 162, 181, 0.12);
}
.pillar-icon {
    width: 64px;
    height: 64px;
    border-radius: 16px;
    background: rgba(76, 162, 181, 0.12);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.7rem;
    color: var(--aqua-teal);
    margin-bottom: 24px;
}
.pillar-title {
    font-size: 1.35rem;
    font-weight: 700;
    color: #0f172a;
    margin-bottom: 14px;
}
.pillar-desc {
    font-size: 1rem;
    color: #475569;
    line-height: 1.75;
}

/* CTA Box */
.about-cta-section {
    padding: 20px 0 100px;
    background: var(--gray-light);
}
.about-cta-box {
    background: linear-gradient(135deg, var(--deep-navy) 0%, #002855 100%);
    border: 1px solid rgba(255, 255, 255, 0.15);
    border-radius: 28px;
    padding: 60px 40px;
    color: #ffffff;
    box-shadow: 0 20px 50px rgba(0, 11, 33, 0.25);
}
.cta-heading {
    font-size: clamp(1.8rem, 3.5vw, 2.5rem);
    font-weight: 700;
    color: #ffffff;
    margin-bottom: 16px;
    font-family: var(--font-heading);
}
.cta-desc {
    font-size: 1.15rem;
    color: rgba(255, 255, 255, 0.88);
    margin-bottom: 35px;
    line-height: 1.6;
}
.cta-btn {
    display: inline-flex;
    align-items: center;
    gap: 12px;
    padding: 16px 36px;
    background: #ffffff;
    color: #000b21 !important;
    font-weight: 700;
    font-size: 1.05rem;
    border-radius: 99px;
    text-decoration: none;
    transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
}
.cta-btn:hover {
    transform: translateY(-2px);
    background: var(--aqua-teal);
    color: #ffffff !important;
    box-shadow: 0 14px 35px rgba(76, 162, 181, 0.4);
}

@media (max-width: 768px) {
    .about-story-card {
        padding: 35px 25px;
    }
    .story-quote {
        padding: 18px 20px;
        font-size: 1.05rem;
    }
    .founder-info-row {
        flex-wrap: wrap;
    }
    .founder-linkedin-btn {
        margin-left: 0;
    }
    .about-cta-box {
        padding: 40px 24px;
    }
}
</style>
