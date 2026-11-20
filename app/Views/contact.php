<?php
$lang = \Core\Language::current() ?: 'az';
if (!in_array($lang, ['az', 'en', 'ru'])) {
    $lang = 'az';
}

$contactData = [
    'az' => [
        'hero_badge' => 'BİZİMLƏ ƏLAQƏ • BAKU, AZERBAIJAN',
        'hero_title' => 'Sualınız Var? <span style="color: var(--aqua-teal);">Əlaqə Saxlayın</span>',
        'hero_desc' => 'Xaricdə təhsil, imtahanlar və ya təqaüd imkanları haqqında suallarınızı bizə göndərin. Ekspertlərimiz 24 saat ərzində cavablandıracaq.',
        'map_title' => 'Bizim Ofisimiz',
        'call_btn' => 'Zəng Et',
        'mail_btn' => 'E-poçt Göndər',
        'maps_btn' => 'Xəritədə Aç',
        'form_title' => 'Mesaj Göndərin',
        'name' => 'Adınız',
        'surname' => 'Soyadınız',
        'email' => 'E-poçt ünvanınız',
        'phone' => 'Əlaqə nömrəniz (Könüllü)',
        'subject' => 'Mövzu',
        'message' => 'Mesajınız',
        'submit' => 'Mesajı Göndər',
        'success' => 'Mesajınız uğurla göndərildi! Qısa zamanda sizinlə əlaqə saxlayacağıq.',
        'error' => 'Xəta baş verdi. Xahiş edirik bütün vacib xanaları doldurasınız.'
    ],
    'en' => [
        'hero_badge' => 'GET IN TOUCH • BAKU, AZERBAIJAN',
        'hero_title' => 'Have a Question? <span style="color: var(--aqua-teal);">Contact Us</span>',
        'hero_desc' => 'Reach out regarding international admissions, test preparation, or scholarship guidance. Our advisors will respond within 24 hours.',
        'map_title' => 'Our Baku Headquarters',
        'call_btn' => 'Call Us',
        'mail_btn' => 'Send Email',
        'maps_btn' => 'Open Map',
        'form_title' => 'Send a Message',
        'name' => 'First Name',
        'surname' => 'Last Name',
        'email' => 'Email Address',
        'phone' => 'Phone Number (Optional)',
        'subject' => 'Subject',
        'message' => 'Your Message',
        'submit' => 'Send Message',
        'success' => 'Your message has been sent successfully! We will get back to you shortly.',
        'error' => 'An error occurred. Please ensure all required fields are filled.'
    ],
    'ru' => [
        'hero_badge' => 'СВЯЖИТЕСЬ С НАМИ • БАКУ, АЗЕРБАЙДЖАН',
        'hero_title' => 'Остались вопросы? <span style="color: var(--aqua-teal);">Напишите нам</span>',
        'hero_desc' => 'Задайте любые вопросы об учебе за рубежом, экзаменах или стипендиях. Наши консультанты ответят вам в течение 24 часов.',
        'map_title' => 'Наш Главный Офис',
        'call_btn' => 'Позвонить',
        'mail_btn' => 'Написать Email',
        'maps_btn' => 'Открыть Карту',
        'form_title' => 'Отправить Сообщение',
        'name' => 'Имя',
        'surname' => 'Фамилия',
        'email' => 'Эл. почта',
        'phone' => 'Телефон (Необязательно)',
        'subject' => 'Тема',
        'message' => 'Ваше сообщение',
        'submit' => 'Отправить сообщение',
        'success' => 'Ваше сообщение успешно отправлено! Мы свяжемся с вами в ближайшее время.',
        'error' => 'Произошла ошибка. Пожалуйста, заполните все обязательные поля.'
    ]
];

$c = $contactData[$lang];
?>

<!-- Premium Dark Hero -->
<section class="contact-hero-section">
    <div class="contact-hero-glow"></div>
    <div class="container" style="max-width: 900px; position: relative; z-index: 2;">
        <div class="contact-badge" data-aos="fade-up"><?= htmlspecialchars($c['hero_badge']) ?></div>
        <h1 class="contact-hero-title" data-aos="fade-up" data-aos-delay="100"><?= $c['hero_title'] ?></h1>
        <p class="contact-hero-desc" data-aos="fade-up" data-aos-delay="200"><?= htmlspecialchars($c['hero_desc']) ?></p>
    </div>
</section>

<!-- Main Contact Section (High Contrast 2-Column Grid) -->
<section class="contact-main-section">
    <div class="container" style="max-width: 1150px;">
        <div class="contact-grid">
            
            <!-- LEFT COLUMN: Google Maps Embed & Quick Action Icons -->
            <div class="contact-left-col" data-aos="fade-up">
                <div class="map-container">
                    <iframe 
                        src="https://www.google.com/maps?q=17C+Said+Rustamov+St,+Baku,+Azerbaijan&output=embed" 
                        width="100%" 
                        height="340" 
                        style="border:0; border-radius: 18px;" 
                        allowfullscreen="" 
                        loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade"
                        title="Thrive Education Center Google Map">
                    </iframe>
                    <div style="padding: 16px 12px 6px; display: flex; align-items: center; gap: 12px; color: #0f172a; font-weight: 600; font-size: 0.95rem;">
                        <i class="fa-solid fa-location-dot" style="color: var(--aqua-teal); font-size: 1.2rem;"></i>
                        <span><?= \Core\Language::get('physical_address') ?></span>
                    </div>
                </div>

                <!-- Sleek Interactive Icon Actions (No Emojis, Direct Redirects) -->
                <div class="contact-actions-row">
                    <a href="tel:+994994466000" class="contact-action-btn phone-action" title="<?= htmlspecialchars($c['call_btn']) ?>">
                        <div class="action-icon"><i class="fa-solid fa-phone"></i></div>
                        <span><?= htmlspecialchars($c['call_btn']) ?></span>
                    </a>
                    <a href="https://www.google.com/maps/search/?api=1&query=17C+Said+Rustamov+St,+Baku,+Azerbaijan" target="_blank" rel="noopener" class="contact-action-btn map-action" title="<?= htmlspecialchars($c['maps_btn']) ?>">
                        <div class="action-icon"><i class="fa-solid fa-location-dot"></i></div>
                        <span><?= htmlspecialchars($c['maps_btn']) ?></span>
                    </a>
                    <a href="mailto:info@thrive.az" class="contact-action-btn mail-action" title="<?= htmlspecialchars($c['mail_btn']) ?>">
                        <div class="action-icon"><i class="fa-solid fa-envelope"></i></div>
                        <span><?= htmlspecialchars($c['mail_btn']) ?></span>
                    </a>
                </div>
            </div>

            <!-- RIGHT COLUMN: Minimalist & Clean Responsive Form -->
            <div class="contact-right-col" data-aos="fade-up" data-aos-delay="150">
                <div class="minimal-form-card">
                    <h2 class="form-card-title"><?= htmlspecialchars($c['form_title']) ?></h2>

                    <?php if(!empty($success)): ?>
                        <div class="alert alert-success">
                            <i class="fa-solid fa-circle-check"></i>
                            <span><?= htmlspecialchars($success) ?></span>
                        </div>
                    <?php endif; ?>

                    <?php if(!empty($error)): ?>
                        <div class="alert alert-error">
                            <i class="fa-solid fa-circle-exclamation"></i>
                            <span><?= htmlspecialchars($error) ?></span>
                        </div>
                    <?php endif; ?>

                    <form action="<?= APP_URL ?>/contact" method="POST" class="minimal-contact-form">
                        <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($csrf_token ?? '') ?>">
                        
                        <div class="form-row-2">
                            <div class="form-group">
                                <label><?= htmlspecialchars($c['name']) ?> *</label>
                                <input type="text" name="name" required placeholder="<?= htmlspecialchars($c['name']) ?>">
                            </div>
                            <div class="form-group">
                                <label><?= htmlspecialchars($c['surname']) ?> *</label>
                                <input type="text" name="surname" required placeholder="<?= htmlspecialchars($c['surname']) ?>">
                            </div>
                        </div>

                        <div class="form-row-2">
                            <div class="form-group">
                                <label><?= htmlspecialchars($c['email']) ?> *</label>
                                <input type="email" name="email" required placeholder="example@email.com">
                            </div>
                            <div class="form-group">
                                <label><?= htmlspecialchars($c['phone']) ?></label>
                                <input type="text" name="phone" placeholder="+994 (XX) XXX-XX-XX">
                            </div>
                        </div>

                        <div class="form-group">
                            <label><?= htmlspecialchars($c['subject']) ?></label>
                            <input type="text" name="subject" placeholder="<?= htmlspecialchars($c['subject']) ?>">
                        </div>

                        <div class="form-group">
                            <label><?= htmlspecialchars($c['message']) ?> *</label>
                            <textarea name="message" required rows="5" placeholder="<?= htmlspecialchars($c['message']) ?>"></textarea>
                        </div>

                        <button type="submit" class="minimal-submit-btn">
                            <span><?= htmlspecialchars($c['submit']) ?></span>
                            <i class="fa-solid fa-paper-plane"></i>
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>

<style>
/* ========================================================
   HIGH CONTRAST & PREMIUM CONTACT PAGE STYLES (NO EMOJIS)
   ======================================================== */
.contact-hero-section {
    padding: 150px 0 70px;
    position: relative;
    text-align: center;
    background: linear-gradient(135deg, var(--deep-navy) 0%, #001e40 100%);
    color: #ffffff;
    overflow: hidden;
}
.contact-hero-glow {
    position: absolute;
    top: 20%;
    left: 50%;
    transform: translateX(-50%);
    width: 600px;
    height: 320px;
    background: radial-gradient(circle, rgba(76, 162, 181, 0.22) 0%, rgba(0,0,0,0) 70%);
    pointer-events: none;
    z-index: 1;
    filter: blur(50px);
}
.contact-badge {
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
.contact-hero-title {
    font-size: clamp(2.4rem, 5vw, 3.8rem);
    font-weight: 800;
    color: #ffffff;
    margin-bottom: 20px;
    line-height: 1.15;
    font-family: var(--font-heading);
}
.contact-hero-desc {
    font-size: clamp(1.05rem, 2vw, 1.25rem);
    color: rgba(255, 255, 255, 0.88);
    max-width: 700px;
    margin: 0 auto;
    line-height: 1.7;
}

/* 2-Column Responsive Grid */
.contact-main-section {
    padding: 60px 0 90px;
    background: var(--gray-light);
}
.contact-grid {
    display: grid;
    grid-template-columns: 1fr 1.15fr;
    gap: 40px;
    align-items: start;
}

/* Left Column: Google Maps & Action Buttons */
.contact-left-col {
    display: flex;
    flex-direction: column;
    gap: 24px;
}
.map-container {
    background: #ffffff;
    border: 1px solid #e2e8f0;
    border-radius: 20px;
    padding: 10px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
}
.contact-actions-row {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 15px;
}
.contact-action-btn {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: 10px;
    padding: 20px 12px;
    border-radius: 16px;
    background: #ffffff;
    border: 1px solid #e2e8f0;
    text-decoration: none;
    color: #0f172a;
    font-weight: 700;
    font-size: 0.95rem;
    transition: all 0.35s cubic-bezier(0.16, 1, 0.3, 1);
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.03);
}
.contact-action-btn:hover {
    transform: translateY(-4px);
    background: #ffffff;
    border-color: var(--aqua-teal);
    color: var(--aqua-teal);
    box-shadow: 0 14px 30px rgba(76, 162, 181, 0.15);
}
.action-icon {
    width: 48px;
    height: 48px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.25rem;
    color: #ffffff;
    transition: transform 0.3s ease;
}
.phone-action .action-icon { background: #10b981; box-shadow: 0 6px 18px rgba(16, 185, 129, 0.3); }
.map-action .action-icon { background: #ef4444; box-shadow: 0 6px 18px rgba(239, 68, 68, 0.3); }
.mail-action .action-icon { background: #6366f1; box-shadow: 0 6px 18px rgba(99, 102, 241, 0.3); }
.contact-action-btn:hover .action-icon {
    transform: scale(1.15);
}

/* Right Column: Minimalist Form Card */
.minimal-form-card {
    background: #ffffff;
    border: 1px solid #e2e8f0;
    border-radius: 24px;
    padding: 45px 40px;
    box-shadow: 0 15px 45px rgba(0, 0, 0, 0.05);
}
.form-card-title {
    font-size: 1.8rem;
    font-weight: 700;
    color: #0f172a;
    margin-bottom: 28px;
    font-family: var(--font-heading);
}
.minimal-contact-form {
    display: flex;
    flex-direction: column;
    gap: 20px;
}
.form-row-2 {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 18px;
}
.form-group {
    display: flex;
    flex-direction: column;
    gap: 8px;
}
.form-group label {
    font-size: 0.92rem;
    font-weight: 700;
    color: #334155;
    letter-spacing: 0.3px;
}
.form-group input,
.form-group textarea {
    width: 100%;
    box-sizing: border-box;
    padding: 14px 16px;
    border-radius: 12px;
    background: #f8fafc;
    border: 1px solid #cbd5e1;
    color: #0f172a;
    font-size: 0.98rem;
    font-family: inherit;
    outline: none;
    transition: all 0.3s ease;
}
.form-group input::placeholder,
.form-group textarea::placeholder {
    color: #94a3b8;
}
.form-group input:focus,
.form-group textarea:focus {
    border-color: var(--aqua-teal);
    background: #ffffff;
    box-shadow: 0 0 10px rgba(76, 162, 181, 0.15);
}
.minimal-submit-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 12px;
    width: 100%;
    padding: 16px;
    border-radius: 99px;
    background: var(--deep-navy);
    color: #ffffff;
    font-size: 1.05rem;
    font-weight: 700;
    border: none;
    cursor: pointer;
    transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
    box-shadow: 0 10px 25px rgba(0, 11, 33, 0.2);
    margin-top: 8px;
}
.minimal-submit-btn:hover {
    background: var(--aqua-teal);
    color: #ffffff;
    transform: translateY(-2px);
    box-shadow: 0 14px 35px rgba(76, 162, 181, 0.4);
}
.alert {
    padding: 14px 18px;
    border-radius: 12px;
    font-size: 0.95rem;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 20px;
}
.alert-success {
    background: #dcfce7;
    border: 1px solid #86efac;
    color: #166534;
}
.alert-error {
    background: #fee2e2;
    border: 1px solid #fca5a5;
    color: #991b1b;
}

@media (max-width: 900px) {
    .contact-grid {
        grid-template-columns: 1fr;
        gap: 35px;
    }
    .contact-actions-row {
        grid-template-columns: repeat(3, 1fr);
    }
}
@media (max-width: 600px) {
    .form-row-2 {
        grid-template-columns: 1fr;
    }
    .minimal-form-card {
        padding: 30px 22px;
    }
    .contact-actions-row {
        gap: 10px;
    }
    .contact-action-btn {
        padding: 15px 8px;
        font-size: 0.85rem;
    }
}
</style>
