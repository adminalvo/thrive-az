<?php
$lang = \Core\Language::current() ?: ($_SESSION['lang'] ?? 'az');

$texts = [
    'az' => [
        'title' => 'Səhifə Tapılmadı',
        'desc' => 'Axtardığınız səhifə silinmiş, yeri dəyişdirilmiş və ya heç vaxt mövcud olmamışdır. Yönünüzü dəyişmək üçün aşağıdakı düymədən istifadə edin.',
        'home' => 'Ana Səhifəyə Qayıt',
        'contact' => 'Dəstək & Əlaqə',
        'code_label' => 'XƏTA KODU: 404_NOT_FOUND'
    ],
    'en' => [
        'title' => 'Page Not Found',
        'desc' => 'The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.',
        'home' => 'Back to Home',
        'contact' => 'Contact Support',
        'code_label' => 'ERROR CODE: 404_NOT_FOUND'
    ],
    'ru' => [
        'title' => 'Страница Не Найдена',
        'desc' => 'Запрашиваемая вами страница была удалена, переименована или временно недоступна. Пожалуйста, вернитесь на главную.',
        'home' => 'Вернуться на Главную',
        'contact' => 'Связаться с Поддержкой',
        'code_label' => 'КОД ОШИБКИ: 404_NOT_FOUND'
    ]
];

$t = $texts[$lang] ?? $texts['az'];
?>

<section class="minimal-404-wrapper">
    <!-- Subtle Minimal Glowing Gradient BG -->
    <div class="minimal-404-bg-glow"></div>

    <div class="container minimal-404-container">
        <!-- Error Code Label -->
        <div class="err-badge">
            <span class="pulse-dot"></span>
            <?= htmlspecialchars($t['code_label']) ?>
        </div>

        <!-- Glitch 404 Title -->
        <div class="glitch-wrapper">
            <h1 class="glitch-text" data-text="404">404</h1>
        </div>

        <!-- Translated Subtitle & Desc -->
        <h2 class="minimal-404-title"><?= htmlspecialchars($t['title']) ?></h2>
        <p class="minimal-404-desc"><?= htmlspecialchars($t['desc']) ?></p>

        <!-- Minimal Buttons -->
        <div class="minimal-404-actions">
            <a href="<?= APP_URL ?>/" class="btn-404-primary">
                <i class="fa-solid fa-house"></i>
                <?= htmlspecialchars($t['home']) ?>
            </a>
            <a href="<?= APP_URL ?>/contact" class="btn-404-secondary">
                <i class="fa-solid fa-headset"></i>
                <?= htmlspecialchars($t['contact']) ?>
            </a>
        </div>
    </div>
</section>

<style>
/* Minimalist Dark Glitch 404 Styling */
.minimal-404-wrapper {
    position: relative;
    width: 100%;
    min-height: 100vh;
    background: #030712;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
    padding: 120px 20px;
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
    color: #ffffff;
}

.minimal-404-bg-glow {
    position: absolute;
    width: 600px;
    height: 600px;
    background: radial-gradient(circle, rgba(76, 162, 181, 0.08) 0%, rgba(124, 58, 237, 0.05) 50%, transparent 70%);
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    pointer-events: none;
    z-index: 1;
}

.minimal-404-container {
    position: relative;
    z-index: 10;
    text-align: center;
    max-width: 620px;
    margin: 0 auto;
}

/* Badge */
.err-badge {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 6px 14px;
    background: rgba(255, 255, 255, 0.03);
    border: 1px solid rgba(255, 255, 255, 0.08);
    border-radius: 99px;
    font-size: 0.78rem;
    font-weight: 600;
    letter-spacing: 2px;
    color: #94a3b8;
    margin-bottom: 25px;
}

.pulse-dot {
    width: 7px;
    height: 7px;
    background: #f43f5e;
    border-radius: 50%;
    box-shadow: 0 0 8px #f43f5e;
    animation: errPulse 2s infinite;
}

@keyframes errPulse {
    0%, 100% { opacity: 1; transform: scale(1); }
    50% { opacity: 0.4; transform: scale(1.15); }
}

/* Glitch 404 */
.glitch-wrapper {
    position: relative;
    display: inline-block;
    margin: 10px 0 20px;
}

.glitch-text {
    font-size: clamp(6.5rem, 15vw, 11rem);
    font-weight: 900;
    line-height: 1;
    color: #ffffff;
    position: relative;
    letter-spacing: -3px;
    margin: 0;
    font-family: 'Outfit', 'Inter', sans-serif;
}

.glitch-text::before,
.glitch-text::after {
    content: attr(data-text);
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
}

/* Cyan layer */
.glitch-text::before {
    left: 3px;
    text-shadow: -2px 0 #06b6d4;
    clip: rect(24px, 550px, 90px, 0);
    animation: glitch-anim-2 3s infinite linear alternate-reverse;
}

/* Magenta / Red layer */
.glitch-text::after {
    left: -3px;
    text-shadow: -2px 0 #f43f5e;
    clip: rect(85px, 550px, 140px, 0);
    animation: glitch-anim 2.5s infinite linear alternate-reverse;
}

@keyframes glitch-anim {
    0% { clip: rect(12px, 9999px, 44px, 0); transform: skew(0.3deg); }
    15% { clip: rect(85px, 9999px, 112px, 0); transform: skew(-0.5deg); }
    30% { clip: rect(33px, 9999px, 76px, 0); transform: skew(0.2deg); }
    45% { clip: rect(95px, 9999px, 130px, 0); transform: translate(2px, -1px); }
    60% { clip: rect(21px, 9999px, 60px, 0); transform: skew(0.1deg); }
    75% { clip: rect(70px, 9999px, 90px, 0); transform: translate(-2px, 1px); }
    100% { clip: rect(40px, 9999px, 105px, 0); transform: skew(0deg); }
}

@keyframes glitch-anim-2 {
    0% { clip: rect(65px, 9999px, 119px, 0); transform: translate(-2px, 0); }
    20% { clip: rect(10px, 9999px, 45px, 0); transform: translate(2px, 0); }
    40% { clip: rect(78px, 9999px, 92px, 0); transform: skew(0.4deg); }
    60% { clip: rect(15px, 9999px, 68px, 0); transform: translate(-1px, 2px); }
    80% { clip: rect(90px, 9999px, 135px, 0); transform: skew(-0.3deg); }
    100% { clip: rect(35px, 9999px, 80px, 0); transform: translate(1px, -1px); }
}

/* Titles and Descs */
.minimal-404-title {
    font-size: clamp(1.6rem, 4vw, 2.3rem);
    font-weight: 700;
    color: #f8fafc;
    margin-bottom: 15px;
    letter-spacing: -0.5px;
}

.minimal-404-desc {
    font-size: 1.05rem;
    line-height: 1.65;
    color: #94a3b8;
    max-width: 500px;
    margin: 0 auto 38px auto;
}

/* Buttons */
.minimal-404-actions {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 16px;
    flex-wrap: wrap;
}

.btn-404-primary {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    padding: 13px 28px;
    background: #ffffff;
    color: #030712;
    font-weight: 600;
    font-size: 0.95rem;
    border-radius: 12px;
    text-decoration: none;
    transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
    box-shadow: 0 10px 25px rgba(255, 255, 255, 0.1);
}

.btn-404-primary:hover {
    transform: translateY(-2px);
    background: #f1f5f9;
    box-shadow: 0 15px 30px rgba(255, 255, 255, 0.18);
    color: #000;
}

.btn-404-secondary {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    padding: 13px 26px;
    background: rgba(255, 255, 255, 0.04);
    border: 1px solid rgba(255, 255, 255, 0.12);
    color: #cbd5e1;
    font-weight: 600;
    font-size: 0.95rem;
    border-radius: 12px;
    text-decoration: none;
    transition: all 0.25s ease;
}

.btn-404-secondary:hover {
    background: rgba(255, 255, 255, 0.08);
    border-color: rgba(255, 255, 255, 0.25);
    color: #ffffff;
    transform: translateY(-2px);
}
</style>
