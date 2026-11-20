<!-- Hero Section -->
<section class="premium-hero center" style="min-height: 100vh; display: flex; align-items: center; justify-content: center; position: relative; overflow: hidden;">
    <div class="premium-hero-bg premium-hero-bg-abstract"></div>
    <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); font-size: 18vw; font-weight: 900; color: #ffffff; opacity: 0.03; white-space: nowrap; pointer-events: none; z-index: 5; font-family: var(--font-heading); letter-spacing: -5px;">
        THRIVE
    </div>
    <div class="container" style="position: relative; z-index: 10;">
        <div style="max-width: 900px; margin: 0 auto;">
            <div style="height: 30px; margin-bottom: 15px;"></div>
            
            <!-- Minimalist SEO-Optimized H1 Tag -->
            <h1 data-aos="fade-up" data-aos-duration="800" style="font-size: clamp(1.15rem, 2.5vw, 1.45rem); font-weight: 500; letter-spacing: 1.5px; color: rgba(255, 255, 255, 0.92); margin-bottom: 12px; font-family: var(--font-body); display: block; text-shadow: 0 4px 15px rgba(0,0,0,0.4);">
                <?= \Core\Language::current() === 'ru' ? 'Добро пожаловать в Thrive' : 'Welcome to Thrive' ?>
            </h1>

            <h2 data-aos="fade-up" data-aos-duration="1000" data-aos-delay="100" style="font-size: clamp(2.8rem, 6vw, 4.5rem); line-height: 1.1; margin-bottom: 25px; text-transform:uppercase; font-family: var(--font-heading); color: #fff; text-shadow: 0 10px 30px rgba(0,0,0,0.5); font-weight: 800;">
                <span class="typewriter-text"></span><span class="cursor">|</span>
            </h2>
            
            <p data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200" class="hero-desc" style="font-size: 1.3rem; max-width: 700px; margin: 0 auto 30px; color: rgba(255,255,255,0.85); line-height: 1.6;">
                <?= \Core\Language::get('hero_desc') ?>
            </p>
            
            <!-- Ultra Minimalist Ecosystem Banner Buttons -->
            <div data-aos="fade-up" data-aos-duration="1000" data-aos-delay="250" style="margin-bottom: 35px;">
                <div class="hero-minimal-ecosystem-bar">
                    <a href="<?= APP_URL ?>/thrive-mobile" class="hero-eco-btn">
                        <i class="fa-solid fa-mobile-screen"></i>
                        <span>Thrive Mobile</span>
                    </a>
                    <span class="hero-eco-divider"></span>
                    <a href="<?= APP_URL ?>/thrive-portal" class="hero-eco-btn">
                        <i class="fa-solid fa-graduation-cap"></i>
                        <span>Thrive Portal</span>
                    </a>
                    <span class="hero-eco-divider"></span>
                    <a href="<?= APP_URL ?>/thrive-prep" class="hero-eco-btn hero-eco-btn-prep">
                        <i class="fa-solid fa-bolt"></i>
                        <span>ThrivePrep</span>
                    </a>
                </div>
            </div>
            
            <div data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300" style="display: flex; gap: 16px; flex-wrap: wrap; justify-content: center; align-items: center;">
                <a href="<?= APP_URL ?>/book" class="btn-minimal-primary">
                    <?= \Core\Language::get('book_consultation') ?? 'Konsultasiya Sifariş Et' ?>
                </a>
                <a href="#categories" class="btn-minimal-secondary">
                    <?= \Core\Language::get('explore_programs') ?? 'Proqramlara Bax' ?>
                </a>
            </div>
        </div>
    </div>
</section>
<style>
.hero-minimal-ecosystem-bar {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    background: rgba(255, 255, 255, 0.08);
    backdrop-filter: blur(20px);
    -webkit-backdrop-filter: blur(20px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    padding: 6px 14px;
    border-radius: 99px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.25);
    transition: all 0.3s ease;
}
.hero-minimal-ecosystem-bar:hover {
    border-color: rgba(255, 255, 255, 0.4);
    background: rgba(255, 255, 255, 0.12);
}
.hero-eco-btn {
    display: inline-flex;
    align-items: center;
    gap: 7px;
    color: rgba(255, 255, 255, 0.88);
    text-decoration: none;
    font-size: 0.88rem;
    font-weight: 500;
    padding: 6px 14px;
    border-radius: 99px;
    transition: all 0.25s cubic-bezier(0.16, 1, 0.3, 1);
    letter-spacing: 0.3px;
}
.hero-eco-btn i {
    font-size: 0.82rem;
    color: var(--aqua-teal);
    transition: transform 0.25s ease;
}
.hero-eco-btn:hover {
    background: rgba(255, 255, 255, 0.16);
    color: #ffffff !important;
    transform: translateY(-1px);
}
.hero-eco-btn:hover i {
    transform: scale(1.15);
}
.hero-eco-btn-prep:hover {
    background: linear-gradient(135deg, rgba(76,162,181,0.3), rgba(0,63,130,0.4));
}
.hero-eco-divider {
    width: 1px;
    height: 14px;
    background: rgba(255, 255, 255, 0.22);
}
@media (max-width: 600px) {
    .hero-minimal-ecosystem-bar {
        border-radius: 20px;
        padding: 6px 8px;
        flex-wrap: wrap;
        justify-content: center;
        gap: 4px;
    }
    .hero-eco-divider { display: none; }
    .hero-eco-btn { font-size: 0.78rem; padding: 5px 8px; }
}

.btn-minimal-primary {
    background: #ffffff;
    color: #000b21 !important;
    padding: 13px 32px;
    font-size: 15px;
    font-weight: 600;
    border-radius: 99px;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
    box-shadow: 0 8px 25px rgba(255, 255, 255, 0.15);
    border: 1px solid rgba(255, 255, 255, 0.8);
    text-decoration: none;
}
.btn-minimal-primary:hover {
    transform: translateY(-2px);
    background: #f0f4f8;
    box-shadow: 0 12px 35px rgba(255, 255, 255, 0.25);
    color: #003f82 !important;
}
.btn-minimal-secondary {
    background: rgba(255, 255, 255, 0.08);
    color: #ffffff !important;
    padding: 13px 32px;
    font-size: 15px;
    font-weight: 500;
    border-radius: 99px;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
    border: 1px solid rgba(255, 255, 255, 0.25);
    backdrop-filter: blur(10px);
    text-decoration: none;
}
.btn-minimal-secondary:hover {
    transform: translateY(-2px);
    background: rgba(255, 255, 255, 0.16);
    border-color: rgba(255, 255, 255, 0.5);
    color: #ffffff !important;
}
</style>

<style>
.cursor { animation: blink 1s step-end infinite; }
@keyframes blink { 50% { opacity: 0; } }
</style>
<script>
document.addEventListener("DOMContentLoaded", () => {
    const text = "<?= \Core\Language::get('hero_title') ?? 'Thrive With Us' ?>";
    let i = 0;
    let isDeleting = false;
    let speed = 150;
    const el = document.querySelector(".typewriter-text");
    function type() {
        if(!el) return;
        if(!isDeleting && i <= text.length) {
            el.innerHTML = text.substring(0, i);
            i++;
            speed = 130;
            if(i === text.length + 1) { 
                isDeleting = true; 
                speed = 2200; 
            }
        } else if(isDeleting) {
            i--;
            el.innerHTML = text.substring(0, i);
            speed = 45;
            if(i === 0) { 
                isDeleting = false; 
                speed = 800; 
            }
        }
        setTimeout(type, speed);
    }
    setTimeout(type, 1000);
});
</script>

<!-- 3 Main Categories Section -->
<section id="categories" style="padding: 100px 0; background: var(--bg-primary); position: relative; z-index: 20;">
    <div class="container">
        <div style="text-align: center; margin-bottom: 60px;" data-aos="fade-up">
            <h2 style="font-size: 2.8rem; color: var(--heading-color); margin-bottom: 15px; font-family: var(--font-heading);">
                <?= \Core\Language::get('our_directions') ?? 'Bizim Əsas İstiqamətlərimiz' ?>
            </h2>
            <p style="color: var(--text-secondary); font-size: 1.1rem; max-width: 600px; margin: 0 auto;">
                <?= \Core\Language::get('our_directions_desc') ?? 'Thrive olaraq sizə 3 əsas kateqoriya üzrə ən yüksək keyfiyyətli xidmətləri təqdim edirik.' ?>
            </p>
        </div>
        
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 30px;">
            <!-- Category 1 -->
            <a href="<?= APP_URL ?>/creation-lab" class="category-card" data-aos="fade-up" data-aos-delay="100" style="background: #42234c; color: #ffffff; border-color: #42234c;">
                <div class="cc-icon" style="color: #ffffff; background: rgba(255,255,255,0.1);">
                    <i class="fa-solid fa-atom" style="font-size:36px;"></i>
                </div>
                <h3 style="color: #ffffff;">THRIVE Creation Lab</h3>
                <p style="color: rgba(255,255,255,0.85);"><?= \Core\Language::get('creation_lab_desc') ?? 'İnnovativ ideyaların reallaşdığı, startapların və yaradıcı layihələrin inkişaf etdirildiyi texnologiya laboratoriyası.' ?></p>
                <span class="cc-link" style="color: #ffffff;"><?= \Core\Language::get('read_more') ?? 'Daha ətraflı' ?> &rarr;</span>
            </a>
            
            <!-- Category 2 -->
            <a href="<?= APP_URL ?>/study-abroad" class="category-card" data-aos="fade-up" data-aos-delay="200" style="background: #033721; color: #ffffff; border-color: #033721;">
                <div class="cc-icon" style="color: #ffffff; background: rgba(255,255,255,0.1);">
                    <i class="fa-solid fa-plane" style="font-size:36px;"></i>
                </div>
                <h3 style="color: #ffffff;">THRIVE Study Abroad</h3>
                <p style="color: rgba(255,255,255,0.85);"><?= \Core\Language::get('study_abroad_desc') ?? 'Xaricdə təhsil almaq istəyənlər üçün dünyanın aparıcı universitetlərinə tam qəbul və təqaüd dəstəyi.' ?></p>
                <span class="cc-link" style="color: #ffffff;"><?= \Core\Language::get('read_more') ?? 'Daha ətraflı' ?> &rarr;</span>
            </a>
            
            <!-- Category 3 -->
            <a href="<?= APP_URL ?>/education" class="category-card" data-aos="fade-up" data-aos-delay="300" style="background: #003b77; color: #ffffff; border-color: #003b77;">
                <div class="cc-icon" style="color: #ffffff; background: rgba(255,255,255,0.1);">
                    <i class="fa-solid fa-book" style="font-size:36px;"></i>
                </div>
                <h3 style="color: #ffffff;">THRIVE Education Center</h3>
                <p style="color: rgba(255,255,255,0.85);"><?= \Core\Language::get('education_desc') ?? 'Müasir metodikalarla dil kursları, proqramlaşdırma və peşəkar inkişaf təlimləri təklif edən təhsil mərkəzi.' ?></p>
                <span class="cc-link" style="color: #ffffff;"><?= \Core\Language::get('read_more') ?? 'Daha ətraflı' ?> &rarr;</span>
            </a>
        </div>
    </div>
</section>

<style>
.category-card {
    background: var(--card-bg);
    border-radius: 16px;
    padding: 40px 30px;
    text-decoration: none;
    box-shadow: 0 10px 30px var(--shadow-light);
    transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    border: 1px solid var(--border-color);
    display: flex;
    flex-direction: column;
    height: 100%;
    position: relative;
    overflow: hidden;
}
.category-card::before {
    content: '';
    position: absolute;
    top: 0; left: 0; width: 100%; height: 4px;
    background: var(--aqua-teal);
    transform: scaleX(0);
    transform-origin: left;
    transition: transform 0.4s ease;
}
.category-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px var(--shadow-heavy);
    border-color: rgba(76,162,181,0.2);
}
.category-card:hover::before {
    transform: scaleX(1);
}
.cc-icon {
    width: 70px; height: 70px;
    background: rgba(76, 162, 181, 0.1);
    color: var(--aqua-teal);
    border-radius: 20px;
    display: flex; align-items: center; justify-content: center;
    margin-bottom: 25px;
    transition: all 0.4s ease;
}
.category-card:hover .cc-icon {
    background: var(--aqua-teal);
    color: #fff;
    transform: scale(1.1) rotate(5deg);
}
.category-card h3 {
    color: var(--heading-color);
    font-size: 1.5rem;
    margin-bottom: 15px;
    font-family: var(--font-heading);
}
.category-card p {
    color: var(--text-secondary);
    line-height: 1.7;
    margin-bottom: 25px;
    flex-grow: 1;
}
.cc-link {
    color: var(--aqua-teal);
    font-weight: 600;
    font-size: 1rem;
    display: inline-flex;
    align-items: center;
    transition: color 0.3s ease;
}
.category-card:hover .cc-link {
    color: var(--ocean-blue);
}
</style>

<!-- Teaching Formats / Core Directions & Exams Section -->
<section id="teaching-formats" style="padding: 85px 0 90px; background: var(--bg-primary); position: relative; z-index: 20;">
    <div class="container">
        <div style="text-align: center; margin-bottom: 50px;" data-aos="fade-up">
            <span style="display: inline-flex; align-items: center; gap: 8px; padding: 7px 18px; background: rgba(76,162,181,0.12); border: 1px solid var(--aqua-teal); border-radius: 30px; color: var(--aqua-teal); font-size: 0.82rem; font-weight: 700; letter-spacing: 1.5px; text-transform: uppercase; margin-bottom: 15px;">
                <i class="fa-solid fa-graduation-cap"></i> <?= \Core\Language::get('our_directions') ?? 'Əsas İstiqamətlərimiz & İmtahanlar' ?>
            </span>
            <h2 style="font-size: clamp(2rem, 4vw, 2.8rem); color: var(--heading-color); margin-bottom: 15px; font-family: var(--font-heading); font-weight: 800;">
                <?= \Core\Language::get('our_directions') ?? 'Əsas İstiqamətlərimiz & İmtahanlar' ?>
            </h2>
            <p style="color: var(--text-secondary); font-size: 1.05rem; max-width: 680px; margin: 0 auto; line-height: 1.6;">
                <?= \Core\Language::get('our_directions_desc') ?? 'Beynəlxalq və yerli imtahanlara ən müasir metodika, fərdi diaqnostika və zəmanətli nəticə ilə hazırlıq proqramları.' ?>
            </p>
        </div>

        <div class="exams-interactive-grid">
            <!-- 1. SAT -->
            <div class="exam-rich-card" onclick="openExamModal('sat')" data-aos="fade-up" data-aos-delay="100" style="--accent-color: #7c3aed; --accent-glow: rgba(124, 58, 237, 0.25);">
                <div class="erc-header">
                    <div class="erc-icon" style="background: rgba(124, 58, 237, 0.12); color: #7c3aed;">
                        <i class="fa-solid fa-graduation-cap"></i>
                    </div>
                    <span class="erc-tag" style="background: rgba(124, 58, 237, 0.1); color: #7c3aed;">Top ABŞ & Avropa</span>
                </div>
                <div class="erc-body">
                    <div class="erc-acronym">SAT</div>
                    <h3 class="erc-title"><?= \Core\Language::get('course_sat') ?? 'Digital SAT Hazırlığı' ?></h3>
                    <p class="erc-desc">Riyaziyyat və Oxu/Yazı modulları üzrə Desmos taktikaları, adaptiv testlər və tam simulyasiyalar.</p>
                    
                    <div class="erc-stat-pill">
                        <i class="fa-solid fa-trophy" style="color: #f59e0b;"></i>
                        <span>1550+ Rekord Nəticələr</span>
                    </div>

                    <div class="erc-chips">
                        <span>#Math</span>
                        <span>#Reading</span>
                        <span>#1500+Target</span>
                    </div>
                </div>
                <div class="erc-footer">
                    <span class="erc-link">Ətraflı Məlumat <i class="fa-solid fa-arrow-right"></i></span>
                </div>
            </div>

            <!-- 2. CSCA -->
            <div class="exam-rich-card" onclick="openExamModal('csca')" data-aos="fade-up" data-aos-delay="200" style="--accent-color: #0ea5e9; --accent-glow: rgba(14, 165, 233, 0.25);">
                <div class="erc-header">
                    <div class="erc-icon" style="background: rgba(14, 165, 233, 0.12); color: #0ea5e9;">
                        <i class="fa-solid fa-atom"></i>
                    </div>
                    <span class="erc-tag" style="background: rgba(14, 165, 233, 0.1); color: #0ea5e9;">Çin Dövlət Qrantı</span>
                </div>
                <div class="erc-body">
                    <div class="erc-acronym">CSCA</div>
                    <h3 class="erc-title"><?= \Core\Language::get('course_csca') ?? 'CSCA STEM İmtahanı' ?></h3>
                    <p class="erc-desc">Çinin top universitetlərinə (Tsinghua, Peking) 100% tam təqaüdlə qəbul üçün Fizika və Riyaziyyat hazırlığı.</p>
                    
                    <div class="erc-stat-pill">
                        <i class="fa-solid fa-award" style="color: #0ea5e9;"></i>
                        <span>92.5% Respublika Rekordu</span>
                    </div>

                    <div class="erc-chips">
                        <span>#STEM</span>
                        <span>#Physics</span>
                        <span>#FullScholarship</span>
                    </div>
                </div>
                <div class="erc-footer">
                    <span class="erc-link">Ətraflı Məlumat <i class="fa-solid fa-arrow-right"></i></span>
                </div>
            </div>

            <!-- 3. DİM -->
            <div class="exam-rich-card" onclick="openExamModal('dim')" data-aos="fade-up" data-aos-delay="300" style="--accent-color: #10b981; --accent-glow: rgba(16, 185, 129, 0.25);">
                <div class="erc-header">
                    <div class="erc-icon" style="background: rgba(16, 185, 129, 0.12); color: #10b981;">
                        <i class="fa-solid fa-building-columns"></i>
                    </div>
                    <span class="erc-tag" style="background: rgba(16, 185, 129, 0.1); color: #10b981;">Respublika Qəbulu</span>
                </div>
                <div class="erc-body">
                    <div class="erc-acronym">DİM</div>
                    <h3 class="erc-title"><?= \Core\Language::get('course_dim') ?? 'DİM Qəbul & Buraxılış' ?></h3>
                    <p class="erc-desc">I, II, III və IV ixtisas qrupları üzrə ən yüksək nəticələrlə BANM, ADA və Tibb Universitetlərinə hazırlıq.</p>
                    
                    <div class="erc-stat-pill">
                        <i class="fa-solid fa-medal" style="color: #10b981;"></i>
                        <span>685 Bal • Respublika Birinciləri</span>
                    </div>

                    <div class="erc-chips">
                        <span>#BANM</span>
                        <span>#ADA</span>
                        <span>#PrezidentTəqaüdü</span>
                    </div>
                </div>
                <div class="erc-footer">
                    <span class="erc-link">Ətraflı Məlumat <i class="fa-solid fa-arrow-right"></i></span>
                </div>
            </div>

            <!-- 4. IELTS -->
            <div class="exam-rich-card" onclick="openExamModal('ielts')" data-aos="fade-up" data-aos-delay="400" style="--accent-color: #f59e0b; --accent-glow: rgba(245, 158, 11, 0.25);">
                <div class="erc-header">
                    <div class="erc-icon" style="background: rgba(245, 158, 11, 0.12); color: #f59e0b;">
                        <i class="fa-solid fa-language"></i>
                    </div>
                    <span class="erc-tag" style="background: rgba(245, 158, 11, 0.1); color: #f59e0b;">Beynəlxalq Dil</span>
                </div>
                <div class="erc-body">
                    <div class="erc-acronym">IELTS</div>
                    <h3 class="erc-title"><?= \Core\Language::get('course_ielts') ?? 'IELTS Academic & General' ?></h3>
                    <p class="erc-desc">Listening, Reading, Writing və Speaking bacarıqlarının fərdi ekspert rəyləri ilə sürətli inkişafı.</p>
                    
                    <div class="erc-stat-pill">
                        <i class="fa-solid fa-star" style="color: #f59e0b;"></i>
                        <span>8.5 Band • Oxford & Cambridge</span>
                    </div>

                    <div class="erc-chips">
                        <span>#Band85</span>
                        <span>#Speaking</span>
                        <span>#Academic</span>
                    </div>
                </div>
                <div class="erc-footer">
                    <span class="erc-link">Ətraflı Məlumat <i class="fa-solid fa-arrow-right"></i></span>
                </div>
            </div>

            <!-- 5. DET -->
            <div class="exam-rich-card" onclick="openExamModal('det')" data-aos="fade-up" data-aos-delay="500" style="--accent-color: #059669; --accent-glow: rgba(5, 150, 105, 0.25);">
                <div class="erc-header">
                    <div class="erc-icon" style="background: rgba(5, 150, 105, 0.12); color: #059669;">
                        <i class="fa-solid fa-bolt"></i>
                    </div>
                    <span class="erc-tag" style="background: rgba(5, 150, 105, 0.1); color: #059669;">Online & Sürətli</span>
                </div>
                <div class="erc-body">
                    <div class="erc-acronym">DET</div>
                    <h3 class="erc-title"><?= \Core\Language::get('course_duolingo') ?? 'Duolingo English Test' ?></h3>
                    <p class="erc-desc">48 saat ərzində nəticə verən, 4000+ universitet tərəfindən qəbul edilən adaptiv onlayn ingilis dili testi.</p>
                    
                    <div class="erc-stat-pill">
                        <i class="fa-solid fa-bolt" style="color: #059669;"></i>
                        <span>145 / 160 Bal Nəticələr</span>
                    </div>

                    <div class="erc-chips">
                        <span>#OnlineExam</span>
                        <span>#Adaptive</span>
                        <span>#FastResult</span>
                    </div>
                </div>
                <div class="erc-footer">
                    <span class="erc-link">Ətraflı Məlumat <i class="fa-solid fa-arrow-right"></i></span>
                </div>
            </div>

            <!-- 6. ADA -->
            <div class="exam-rich-card" onclick="openExamModal('ada')" data-aos="fade-up" data-aos-delay="600" style="--accent-color: #6366f1; --accent-glow: rgba(99, 102, 241, 0.25);">
                <div class="erc-header">
                    <div class="erc-icon" style="background: rgba(99, 102, 241, 0.12); color: #6366f1;">
                        <i class="fa-solid fa-landmark"></i>
                    </div>
                    <span class="erc-tag" style="background: rgba(99, 102, 241, 0.1); color: #6366f1;">Daxili Qəbul</span>
                </div>
                <div class="erc-body">
                    <div class="erc-acronym">ADA</div>
                    <h3 class="erc-title"><?= \Core\Language::get('course_ada') ?? 'ADA Universiteti Fənləri' ?></h3>
                    <p class="erc-desc">ADA Universitetinin daxili Riyaziyyat və İngilis dili qəbul standartlarına tam uyğunlaşdırılmış təlimlər.</p>
                    
                    <div class="erc-stat-pill">
                        <i class="fa-solid fa-check-double" style="color: #6366f1;"></i>
                        <span>100% Qəbul & Təqaüd Hədəfi</span>
                    </div>

                    <div class="erc-chips">
                        <span>#ADAMath</span>
                        <span>#EnglishPrep</span>
                        <span>#HighSuccess</span>
                    </div>
                </div>
                <div class="erc-footer">
                    <span class="erc-link">Ətraflı Məlumat <i class="fa-solid fa-arrow-right"></i></span>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
.exams-interactive-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 24px;
}
@media (max-width: 992px) {
    .exams-interactive-grid { grid-template-columns: repeat(2, 1fr); }
}
@media (max-width: 600px) {
    .exams-interactive-grid { grid-template-columns: 1fr; }
}

.exam-rich-card {
    background: var(--card-bg);
    border: 1px solid var(--border-color);
    border-radius: 20px;
    padding: 28px 24px 22px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    cursor: pointer;
    position: relative;
    overflow: hidden;
    box-shadow: 0 4px 20px rgba(0,0,0,0.03);
    transition: all 0.35s cubic-bezier(0.16, 1, 0.3, 1);
}
.exam-rich-card::before {
    content: '';
    position: absolute;
    top: 0; left: 0; right: 0;
    height: 3px;
    background: var(--accent-color);
    opacity: 0;
    transition: opacity 0.3s ease;
}
.exam-rich-card:hover {
    transform: translateY(-8px);
    border-color: var(--accent-color);
    box-shadow: 0 16px 35px var(--accent-glow);
}
.exam-rich-card:hover::before {
    opacity: 1;
}
.erc-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 18px;
}
.erc-icon {
    width: 48px;
    height: 48px;
    border-radius: 14px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.35rem;
    transition: transform 0.3s ease;
}
.exam-rich-card:hover .erc-icon {
    transform: scale(1.1) rotate(5deg);
}
.erc-tag {
    font-size: 0.72rem;
    font-weight: 700;
    padding: 4px 10px;
    border-radius: 20px;
    letter-spacing: 0.3px;
    text-transform: uppercase;
}
.erc-acronym {
    font-size: 1.9rem;
    font-weight: 800;
    font-family: var(--font-heading);
    color: var(--accent-color);
    letter-spacing: -0.5px;
    line-height: 1;
    margin-bottom: 6px;
}
.erc-title {
    font-size: 1.15rem;
    font-weight: 700;
    color: var(--heading-color);
    margin: 0 0 10px;
}
.erc-desc {
    font-size: 0.88rem;
    color: var(--text-secondary);
    line-height: 1.55;
    margin-bottom: 16px;
}
.erc-stat-pill {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: rgba(0,0,0,0.03);
    border: 1px solid var(--border-color);
    padding: 6px 12px;
    border-radius: 10px;
    font-size: 0.78rem;
    font-weight: 600;
    color: var(--heading-color);
    margin-bottom: 14px;
    width: 100%;
}
.erc-chips {
    display: flex;
    flex-wrap: wrap;
    gap: 6px;
    margin-bottom: 16px;
}
.erc-chips span {
    font-size: 0.72rem;
    color: var(--text-secondary);
    background: rgba(0,0,0,0.02);
    border: 1px solid var(--border-color);
    padding: 3px 8px;
    border-radius: 6px;
    font-weight: 500;
}
.erc-footer {
    border-top: 1px solid var(--border-color);
    padding-top: 14px;
    display: flex;
    align-items: center;
    justify-content: space-between;
}
.erc-link {
    font-size: 0.85rem;
    font-weight: 600;
    color: var(--accent-color);
    display: inline-flex;
    align-items: center;
    gap: 6px;
    transition: gap 0.25s ease;
}
.exam-rich-card:hover .erc-link {
    gap: 10px;
}
</style>

<!-- Responsive Interactive Exam Modal -->
<div id="examInfoModal" class="exam-modal-overlay" onclick="closeExamModalOnBackdrop(event)">
    <div class="exam-modal-box">
        <button class="exam-modal-close" onclick="closeExamModal()" aria-label="Bağla">&times;</button>
        <div class="exam-modal-header">
            <div id="examModalBadge" class="exam-modal-badge"><i class="fa-solid fa-graduation-cap"></i></div>
            <div class="exam-modal-title-wrap">
                <span id="examModalTag" class="exam-modal-tag">BEYNƏLXALQ QƏBUL İMTAHANI</span>
                <h3 id="examModalTitle" class="exam-modal-title">SAT Hazırlığı</h3>
            </div>
        </div>
        <div id="examModalBody" class="exam-modal-body">
            <!-- Dynamic Exam Details Rendered Here -->
        </div>
        <div class="exam-modal-footer">
            <a href="<?= APP_URL ?>/study-abroad" class="btn-primary" style="padding: 11px 24px; font-size: 0.92rem; border-radius: 12px; display:inline-flex; align-items:center; gap:8px;">
                <i class="fa-solid fa-paper-plane"></i> Konsultasiyaya Yazıl
            </a>
            <button type="button" class="btn-secondary" onclick="closeExamModal()" style="padding: 11px 22px; font-size: 0.92rem; border-radius: 12px; background: rgba(0,0,0,0.05); border: 1px solid var(--border-color); cursor:pointer;">
                Bağla
            </button>
        </div>
    </div>
</div>

<script>
const activeLang = "<?= \Core\Language::current() ?: ($_SESSION['lang'] ?? 'az') ?>";

const examDetailsData = {
    sat: {
        az: {
            title: "SAT (Scholastic Assessment Test)",
            tag: "BEYNƏLXALQ QƏBUL STANDARTI",
            icon: "fa-solid fa-globe",
            color: "#7c3aed",
            html: `
                <div class="em-section">
                    <h4><i class="fa-solid fa-bullseye"></i> İmtahan Haqqında & Əhəmiyyəti</h4>
                    <p><strong>SAT (Scholastic Assessment Test)</strong> — ABŞ, İtaliya (Bocconi, Politecnico di Milano), Cənubi Koreya (KAIST), Türkiyə və Avropanın 100-dən çox ölkəsinin ən nüfuzlu universitetlərinə bakalavr qəbulu üçün əsas standartlaşdırılmış beynəlxalq imtahandır. SAT həm daxili qəbul üçün, həm də <strong>100% Tam Təqaüd (Full Ride / Merit Scholarship)</strong> qazanmaq üçün ən vacib meyardır.</p>
                </div>
                <div class="em-section">
                    <h4><i class="fa-solid fa-cubes"></i> İmtahanın Strukturu & Şkalası</h4>
                    <p>2024-cü ildən etibarən imtahan tamamilə <strong>Digital SAT</strong> formatında (təxm. 2 saat 14 dəqiqə) keçirilir və 2 əsas bölmədən ibarətdir:</p>
                    <ul>
                        <li><strong>Reading and Writing (Oxu və Yazı):</strong> Mətn analizləri, ingilis dili qrammatikası və analitik düşüncə (800 bal).</li>
                        <li><strong>Math (Riyaziyyat):</strong> Cəbr, həndəsə, funksiyalar və analitik statistika (800 bal).</li>
                        <li><strong>Ümumi şkala:</strong> 400 – 1600 bal. Top universitetlər üçün 1400+ bal hədəflənir.</li>
                    </ul>
                </div>
                <div class="em-section em-highlight">
                    <h4><i class="fa-solid fa-award"></i> Thrive ilə Hazırlıq & Rekordlarımız</h4>
                    <p>Thrive Education Center olaraq tələbələrimizə intensiv tədris proqramı tətbiq edirik. Məzunlarımız arasında <strong>1510 bal (Bocconi University, $120,000+ Tam Təqaüd)</strong>, <strong>1490 bal (KAIST & Polimi)</strong> və <strong>1480 bal (KU Leuven)</strong> kimi respublika səviyyəli rekordçular yer alır.</p>
                </div>
            `
        },
        en: {
            title: "SAT (Scholastic Assessment Test)",
            tag: "INTERNATIONAL ADMISSIONS STANDARD",
            icon: "fa-solid fa-globe",
            color: "#7c3aed",
            html: `
                <div class="em-section">
                    <h4><i class="fa-solid fa-bullseye"></i> About & Global Significance</h4>
                    <p><strong>SAT (Scholastic Assessment Test)</strong> is the primary standardized test required for undergraduate admission to top universities in the US, Italy (Bocconi, Politecnico di Milano), South Korea (KAIST), Turkey, and 100+ countries worldwide. It is the key criterion for earning <strong>100% Full Merit Scholarships</strong>.</p>
                </div>
                <div class="em-section">
                    <h4><i class="fa-solid fa-cubes"></i> Test Structure & Scoring</h4>
                    <p>Administered entirely as the <strong>Digital SAT</strong> (~2 hours 14 minutes), the test comprises two core sections:</p>
                    <ul>
                        <li><strong>Reading and Writing:</strong> Textual evidence analysis, grammar, and analytical reasoning (800 points).</li>
                        <li><strong>Math:</strong> Algebra, geometry, trigonometry, and advanced data analysis (800 points).</li>
                        <li><strong>Score Range:</strong> 400 – 1600 points. Top-tier institutions typically target 1400+ scores.</li>
                    </ul>
                </div>
                <div class="em-section em-highlight">
                    <h4><i class="fa-solid fa-award"></i> Thrive Preparation & Record Holders</h4>
                    <p>At Thrive Education Center, we offer an intensive preparation program. Our alumni include top national scorers with <strong>1510 (Bocconi University, $120,000+ Full Ride)</strong>, <strong>1490 (KAIST & Polimi)</strong>, and <strong>1480 (KU Leuven)</strong>.</p>
                </div>
            `
        },
        ru: {
            title: "SAT (Scholastic Assessment Test)",
            tag: "МЕЖДУНАРОДНЫЙ СТАНДАРТ ПОСТУПЛЕНИЯ",
            icon: "fa-solid fa-globe",
            color: "#7c3aed",
            html: `
                <div class="em-section">
                    <h4><i class="fa-solid fa-bullseye"></i> О тесте и его значении</h4>
                    <p><strong>SAT (Scholastic Assessment Test)</strong> — главный международный экзамен для поступления на бакалавриат в ведущие университеты США, Италии (Bocconi, Polimi), Южной Кореи (KAIST), Турции и 100+ стран мира. Высокий балл SAT является решающим фактором для получения <strong>100% стипендии (Full Ride)</strong>.</p>
                </div>
                <div class="em-section">
                    <h4><i class="fa-solid fa-cubes"></i> Структура и шкала оценивания</h4>
                    <p>Экзамен проводится в современном формате <strong>Digital SAT</strong> (около 2 часов 14 минут) и состоит из двух модулей:</p>
                    <ul>
                        <li><strong>Reading and Writing:</strong> Анализ текстов, грамматика и логика (800 баллов).</li>
                        <li><strong>Math:</strong> Алгебра, геометрия, статистика и анализ данных (800 баллов).</li>
                        <li><strong>Общая шкала:</strong> 400 – 1600 баллов. Для топ-вузов необходим балл 1400+.</li>
                    </ul>
                </div>
                <div class="em-section em-highlight">
                    <h4><i class="fa-solid fa-award"></i> Подготовка с Thrive и наши рекорды</h4>
                    <p>Мы предоставляем интенсивную программу подготовки. Среди наших выпускников — рекордсмены республики с результатами <strong>1510 (Университет Боккони, $120,000+ грант)</strong>, <strong>1490 (KAIST & Polimi)</strong> и <strong>1480 (KU Leuven)</strong>.</p>
                </div>
            `
        }
    },
    csca: {
        az: {
            title: "CSCA (College-Specific Competency Assessment)",
            tag: "BEYNƏLXALQ OLİMPİADA & STEM",
            icon: "fa-solid fa-atom",
            color: "#0ea5e9",
            html: `
                <div class="em-section">
                    <h4><i class="fa-solid fa-bullseye"></i> İmtahan Haqqında & Əhəmiyyəti</h4>
                    <p><strong>CSCA (College-Specific Competency Assessment)</strong> — Avropa, Asiya və Azərbaycanın qabaqcıl texniki universitetləri tərəfindən tətbiq edilən STEM (Fizika, Riyaziyyat, Kimya, İnformatika) üzrə olimpiada səviyyəli qəbul və qrant qiymətləndirmə standartıdır.</p>
                </div>
                <div class="em-section">
                    <h4><i class="fa-solid fa-cubes"></i> İmtahanın Strukturu & Şkalası</h4>
                    <ul>
                        <li><strong>Riyazi Məntiq & İspan:</strong> Ali cəbr, trikonometriya və kombinatorika analizi.</li>
                        <li><strong>Fizika & Tətbiqi Elmlər:</strong> Mexanika, termodinamika və elektromaqnetizm üzrə problem həlləri.</li>
                        <li><strong>Qiymətləndirmə:</strong> 0–100% şkalası üzrə faizlə hesablanır. 80%+ nəticə yüksək təqaüd zəmanəti verir.</li>
                    </ul>
                </div>
                <div class="em-section em-highlight">
                    <h4><i class="fa-solid fa-award"></i> Thrive ilə Hazırlıq & Rekordlarımız</h4>
                    <p>Məzunumuz <strong>Tağızadə Samila 92.5%</strong> ilə riyaziyyat üzrə respublika rekordu qırmış, tələbələrimiz 87.5% və 82.5% kimi yüksək olimpiada göstəriciləri ilə STEM proqramlarına qəbul olmuşdur.</p>
                </div>
            `
        },
        en: {
            title: "CSCA (College-Specific Competency Assessment)",
            tag: "INTERNATIONAL OLYMPIAD & STEM",
            icon: "fa-solid fa-atom",
            color: "#0ea5e9",
            html: `
                <div class="em-section">
                    <h4><i class="fa-solid fa-bullseye"></i> About & Significance</h4>
                    <p><strong>CSCA (College-Specific Competency Assessment)</strong> is an advanced STEM olympiad-level assessment utilized by elite technical universities across Europe, Asia, and Azerbaijan for admissions and research grants.</p>
                </div>
                <div class="em-section">
                    <h4><i class="fa-solid fa-cubes"></i> Structure & Metrics</h4>
                    <ul>
                        <li><strong>Mathematical Reasoning:</strong> Higher algebra, trigonometry, and combinatorial analysis.</li>
                        <li><strong>Physics & Applied Sciences:</strong> Classical mechanics, thermodynamics, and electromagnetism.</li>
                        <li><strong>Scoring:</strong> Evaluated on a 0–100% percentage scale. Scores above 80% unlock prestigious STEM merit awards.</li>
                    </ul>
                </div>
                <div class="em-section em-highlight">
                    <h4><i class="fa-solid fa-award"></i> Thrive Records</h4>
                    <p>Our alumna <strong>Samila Taghizada achieved 92.5%</strong> in Mathematics, setting a national record, while our cohort regularly scores 87.5% and 82.5% in STEM competitions.</p>
                </div>
            `
        },
        ru: {
            title: "CSCA (College-Specific Competency Assessment)",
            tag: "МЕЖДУНАРОДНЫЕ ОЛИМПИАДЫ И STEM",
            icon: "fa-solid fa-atom",
            color: "#0ea5e9",
            html: `
                <div class="em-section">
                    <h4><i class="fa-solid fa-bullseye"></i> О тесте и значении</h4>
                    <p><strong>CSCA</strong> — это олимпиадный стандарт оценки компетенций по STEM-дисциплинам (математика, физика, химия, информатика), применяемый ведущими техническими университетами Европы, Азии и Азербайджана.</p>
                </div>
                <div class="em-section">
                    <h4><i class="fa-solid fa-cubes"></i> Структура экзамена</h4>
                    <ul>
                        <li><strong>Математический анализ:</strong> Высшая алгебра, тригонометрия и комбинаторика.</li>
                        <li><strong>Физика и науки:</strong> Решение сложных задач по механике, термодинамике и электромагнетизму.</li>
                        <li><strong>Шкала:</strong> 0–100%. Результат выше 80% гарантирует академический грант.</li>
                    </ul>
                </div>
                <div class="em-section em-highlight">
                    <h4><i class="fa-solid fa-award"></i> Наши достижения</h4>
                    <p>Наша выпускница <strong>Самила Тагизаде набрала 92.5%</strong> по математике, установив республиканский рекорд, а ученики регулярно достигают результатов 87.5% и 82.5%.</p>
                </div>
            `
        }
    },
    dim: {
        az: {
            title: "DİM (Dövlət İmtahan Mərkəzi) İmtahanları",
            tag: "MİLLİ QƏBUL & BURAXILIŞ",
            icon: "fa-solid fa-flag",
            color: "#10b981",
            html: `
                <div class="em-section">
                    <h4><i class="fa-solid fa-bullseye"></i> İmtahan Haqqında & Əhəmiyyəti</h4>
                    <p><strong>DİM (Dövlət İmtahan Mərkəzi)</strong> — Azərbaycan Respublikasının ali təhsil müəssisələrinə (I, II, III, IV, V ixtisas qrupları) dövlət sifarişli (pulsuz) və ödənişli əsaslarla bakalavr qəbulu imtahanıdır.</p>
                </div>
                <div class="em-section">
                    <h4><i class="fa-solid fa-cubes"></i> İmtahanın Strukturu & Şkalası</h4>
                    <ul>
                        <li><strong>I Mərhələ (Buraxılış):</strong> Azərbaycan dili, Riyaziyyat, Xarici dil (Maksimum 300 bal).</li>
                        <li><strong>II Mərhələ (Blok İmtahanı):</strong> İxtisas qrupu üzrə 3 fənn (Maksimum 400 bal).</li>
                        <li><strong>Ümumi Şkala:</strong> 0 – 700 bal. ADA, BANM, UNEC kimi lider universitetlərdə 600+ bal əsas hədəfdir.</li>
                    </ul>
                </div>
                <div class="em-section em-highlight">
                    <h4><i class="fa-solid fa-award"></i> Thrive ilə Hazırlıq & Rekordlarımız</h4>
                    <p>Məzunlarımız arasında <strong>685 bal (I Qrup Respublika Lideri)</strong>, <strong>670 bal (II Qrup)</strong> və <strong>660 bal (III Qrup)</strong> toplayan tələbələrimiz respublika birinciləri sırasında yer almışdır.</p>
                </div>
            `
        },
        en: {
            title: "SEC (State Examination Center) Exams",
            tag: "NATIONAL UNIVERSITY ADMISSIONS",
            icon: "fa-solid fa-flag",
            color: "#10b981",
            html: `
                <div class="em-section">
                    <h4><i class="fa-solid fa-bullseye"></i> About & Importance</h4>
                    <p><strong>SEC (State Examination Center - DİM)</strong> is the national university admission exam in Azerbaijan for undergraduate study across specialty groups I, II, III, IV, and V, offering government-funded tuition waivers.</p>
                </div>
                <div class="em-section">
                    <h4><i class="fa-solid fa-cubes"></i> Exam Structure & Scoring</h4>
                    <ul>
                        <li><strong>Stage I (Graduation):</strong> Azerbaijani Language, Mathematics, Foreign Language (Max 300 points).</li>
                        <li><strong>Stage II (Specialty Block):</strong> 3 core specialty subjects (Max 400 points).</li>
                        <li><strong>Total Scale:</strong> 0 – 700 points. 600+ is targeted for ADA, BHOS, and UNEC.</li>
                    </ul>
                </div>
                <div class="em-section em-highlight">
                    <h4><i class="fa-solid fa-award"></i> Thrive Preparation & Leaders</h4>
                    <p>Our students rank among the national top scorers, achieving <strong>685 points (Group I Top Scorer)</strong>, <strong>670 points (Group II)</strong>, and <strong>660 points (Group III)</strong>.</p>
                </div>
            `
        },
        ru: {
            title: "Экзамены ГЭЦ (Государственный Экзаменационный Центр)",
            tag: "НАЦИОНАЛЬНОЕ ПОСТУПЛЕНИЕ В ВУЗЫ",
            icon: "fa-solid fa-flag",
            color: "#10b981",
            html: `
                <div class="em-section">
                    <h4><i class="fa-solid fa-bullseye"></i> Об экзамене ГЭЦ (DİM)</h4>
                    <p><strong>ГЭЦ (DİM)</strong> — вступительный экзамен в высшие учебные заведения Азербайджана (I, II, III, IV, V группы специальностей) на бюджетной и платной основе.</p>
                </div>
                <div class="em-section">
                    <h4><i class="fa-solid fa-cubes"></i> Структура и баллы</h4>
                    <ul>
                        <li><strong>I этап (Выпускной):</strong> Родной язык, математика, иностранный язык (максимум 300 баллов).</li>
                        <li><strong>II этап (Блок):</strong> 3 профильных предмета (максимум 400 баллов).</li>
                        <li><strong>Итоговая шкала:</strong> 0 – 700 баллов. Для поступления в ADA и БВШН необходим балл 600+.</li>
                    </ul>
                </div>
                <div class="em-section em-highlight">
                    <h4><i class="fa-solid fa-award"></i> Подготовка с Thrive</h4>
                    <p>Наши выпускники входят в число лидеров страны, набирая <strong>685 баллов (I группа, лидер республики)</strong>, <strong>670 баллов (II группа)</strong> и <strong>660 баллов (III группа)</strong>.</p>
                </div>
            `
        }
    },
    det: {
        az: {
            title: "DET (Duolingo English Test)",
            tag: "RƏQƏMSAL İNGİLİS DİLİ STANDARTI",
            icon: "fa-solid fa-desktop",
            color: "#f59e0b",
            html: `
                <div class="em-section">
                    <h4><i class="fa-solid fa-bullseye"></i> İmtahan Haqqında & Əhəmiyyəti</h4>
                    <p><strong>Duolingo English Test (DET)</strong> — Dünyanın 4000-dən çox top universiteti (o cümlədən ABŞ, Kanada, Böyük Britaniya və Avropa) tərəfindən IELTS və TOEFL imtahanlarına tam alternativ kimi tanınan onlayn və adaptiv ingilis dili səviyyə imtahanıdır.</p>
                </div>
                <div class="em-section">
                    <h4><i class="fa-solid fa-cubes"></i> İmtahanın Strukturu & Şkalası</h4>
                    <ul>
                        <li><strong>Format:</strong> 1 saatlıq onlayn adaptiv test (evdən və ya mərkəzdən verilir, nəticələr 48 saata çıxır).</li>
                        <li><strong>4 Əsas Metrika:</strong> Literacy (Oxu/Yazı), Comprehension (Dinləmə/Oxu), Conversation (Danışıq/Dinləmə), Production (Yazı/Danışıq).</li>
                        <li><strong>Şkala:</strong> 10 – 160 bal. 125+ bal IELTS 7.0-a, 135+ bal isə IELTS 7.5–8.0 bandına bərabərdir.</li>
                    </ul>
                </div>
                <div class="em-section em-highlight">
                    <h4><i class="fa-solid fa-award"></i> Thrive ilə Hazırlıq & Rekordlarımız</h4>
                    <p>Xüsusi sual tipləri taktikası və süni intellekt əsaslı nitq məşqlərimizlə tələbələrimizə qısa müddətdə <strong>130 – 145+ bal</strong> qazanmağı təmin edirik.</p>
                </div>
            `
        },
        en: {
            title: "DET (Duolingo English Test)",
            tag: "DIGITAL ENGLISH STANDARD",
            icon: "fa-solid fa-desktop",
            color: "#f59e0b",
            html: `
                <div class="em-section">
                    <h4><i class="fa-solid fa-bullseye"></i> About & Global Recognition</h4>
                    <p><strong>Duolingo English Test (DET)</strong> is a fast, 1-hour online adaptive English test accepted by 4,000+ top universities in the US, Canada, UK, and Europe as a full alternative to IELTS and TOEFL.</p>
                </div>
                <div class="em-section">
                    <h4><i class="fa-solid fa-cubes"></i> Test Format & Scoring</h4>
                    <ul>
                        <li><strong>Format:</strong> Convenient 1-hour adaptive test with verified results in 48 hours.</li>
                        <li><strong>Core Metrics:</strong> Literacy, Comprehension, Conversation, and Production.</li>
                        <li><strong>Score Scale:</strong> 10 – 160 points. A score of 125+ corresponds to IELTS 7.0; 135+ corresponds to IELTS 7.5–8.0.</li>
                    </ul>
                </div>
                <div class="em-section em-highlight">
                    <h4><i class="fa-solid fa-award"></i> Thrive Score Guarantee</h4>
                    <p>With our specialized question-type tactics and AI-assisted speaking practice, our students consistently achieve <strong>130 – 145+ points</strong>.</p>
                </div>
            `
        },
        ru: {
            title: "DET (Duolingo English Test)",
            tag: "ЦИФРОВОЙ СТАНДАРТ АНГЛИЙСКОГО",
            icon: "fa-solid fa-desktop",
            color: "#f59e0b",
            html: `
                <div class="em-section">
                    <h4><i class="fa-solid fa-bullseye"></i> Об экзамене и признании</h4>
                    <p><strong>Duolingo English Test (DET)</strong> — современный адаптивный онлайн-экзамен по английскому языку, признаваемый более 4000 университетов в США, Канаде и Европе как полная альтернатива IELTS и TOEFL.</p>
                </div>
                <div class="em-section">
                    <h4><i class="fa-solid fa-cubes"></i> Формат и шкала баллов</h4>
                    <ul>
                        <li><strong>Формат:</strong> 1-часовой онлайн-тест из дома с официальными результатами за 48 часов.</li>
                        <li><strong>Навыки:</strong> Literacy (Чтение/Письмо), Comprehension, Conversation, Production.</li>
                        <li><strong>Шкала:</strong> 10 – 160 баллов. Балл 125+ равен IELTS 7.0; балл 135+ равен IELTS 7.5–8.0.</li>
                    </ul>
                </div>
                <div class="em-section em-highlight">
                    <h4><i class="fa-solid fa-award"></i> Подготовка с Thrive</h4>
                    <p>Благодаря специальной методике и AI-тренажерам наши студенты уверенно получают <strong>130 – 145+ баллов</strong> для поступления в зарубежные вузы.</p>
                </div>
            `
        }
    },
    ielts: {
        az: {
            title: "IELTS & TOEFL iBT",
            tag: "BEYNƏLXALQ DİL SERTİFİKATI",
            icon: "fa-solid fa-language",
            color: "#3b82f6",
            html: `
                <div class="em-section">
                    <h4><i class="fa-solid fa-bullseye"></i> İmtahan Haqqında & Əhəmiyyəti</h4>
                    <p><strong>IELTS (International English Language Testing System)</strong> və <strong>TOEFL iBT</strong> — dünyada ən yüksək səviyyədə tanınan rəsmi akademik ingilis dili sertifikatlarıdır. Xaricdə təhsil, viza, miqrasiya və beynəlxalq karyera üçün tələb olunur.</p>
                </div>
                <div class="em-section">
                    <h4><i class="fa-solid fa-cubes"></i> İmtahanın Strukturu & Şkalası</h4>
                    <ul>
                        <li><strong>4 Əsas Modul:</strong> Listening (Dinləmə), Reading (Oxu), Writing (Yazı) və Speaking (Danışıq).</li>
                        <li><strong>IELTS Şkalası:</strong> 0 – 9.0 Band. Dünya top universitetləri üçün adətən 6.5 – 7.5 band tələb olunur.</li>
                        <li><strong>TOEFL Şkalası:</strong> 0 – 120 bal (hər bölmə 30 bal).</li>
                    </ul>
                </div>
                <div class="em-section em-highlight">
                    <h4><i class="fa-solid fa-award"></i> Thrive ilə Hazırlıq & Rekordlarımız</h4>
                    <p>Məzunumuz <strong>Ləman Hüseynova IELTS Academic 8.5 band</strong>, Elvin Quliyev isə <strong>8.0 band</strong> toplayaraq dünyanın ən prestijli universitetlərinə birbaşa qəbul haqqı qazanmışdır.</p>
                </div>
            `
        },
        en: {
            title: "IELTS & TOEFL iBT",
            tag: "INTERNATIONAL LANGUAGE CERTIFICATE",
            icon: "fa-solid fa-language",
            color: "#3b82f6",
            html: `
                <div class="em-section">
                    <h4><i class="fa-solid fa-bullseye"></i> About & Global Standing</h4>
                    <p><strong>IELTS (International English Language Testing System)</strong> and <strong>TOEFL iBT</strong> are the world's most widely recognized English language tests for academic study, international employment, and visa applications.</p>
                </div>
                <div class="em-section">
                    <h4><i class="fa-solid fa-cubes"></i> Structure & Scale</h4>
                    <ul>
                        <li><strong>4 Key Skills:</strong> Listening, Reading, Writing, and Speaking.</li>
                        <li><strong>IELTS Band Scale:</strong> 0 – 9.0 Band. Leading global universities require Band 6.5 – 7.5.</li>
                        <li><strong>TOEFL iBT Scale:</strong> 0 – 120 points (30 points per section).</li>
                    </ul>
                </div>
                <div class="em-section em-highlight">
                    <h4><i class="fa-solid fa-award"></i> Thrive Preparation & Record Holders</h4>
                    <p>Our alumna <strong>Laman Huseynova achieved an IELTS Band 8.5</strong>, and Elvin Guliyev scored <strong>Band 8.0</strong>, securing direct admission to top universities in the UK and USA.</p>
                </div>
            `
        },
        ru: {
            title: "IELTS & TOEFL iBT",
            tag: "МЕЖДУНАРОДНЫЙ ЯЗЫКОВОЙ СЕРТИФИКАТ",
            icon: "fa-solid fa-language",
            color: "#3b82f6",
            html: `
                <div class="em-section">
                    <h4><i class="fa-solid fa-bullseye"></i> Об экзаменах и статусе</h4>
                    <p><strong>IELTS</strong> и <strong>TOEFL iBT</strong> — самые авторитетные международные сертификаты по академическому английскому языку, необходимые для учебы за рубежом, виз и миграции.</p>
                </div>
                <div class="em-section">
                    <h4><i class="fa-solid fa-cubes"></i> Структура и шкала</h4>
                    <ul>
                        <li><strong>4 модуля:</strong> Listening (Аудирование), Reading (Чтение), Writing (Письмо) и Speaking (Говорение).</li>
                        <li><strong>Шкала IELTS:</strong> 0 – 9.0 баллов. Для лучших вузов требуется 6.5 – 7.5.</li>
                        <li><strong>Шкала TOEFL:</strong> 0 – 120 баллов.</li>
                    </ul>
                </div>
                <div class="em-section em-highlight">
                    <h4><i class="fa-solid fa-award"></i> Подготовка с Thrive и рекорды</h4>
                    <p>Наша выпускница <strong>Ляман Гусейнова набрала IELTS 8.5</strong>, а Эльвин Гулиев — <strong>8.0 баллов</strong>, открыв двери в лучшие университеты Великобритании и США.</p>
                </div>
            `
        }
    },
    ada: {
        az: {
            title: "ADA Universitetinə Qəbul & Daxili İmtahanlar",
            tag: "YERLİ TOP UNİVERSİTET QƏBULU",
            icon: "fa-solid fa-building-columns",
            color: "#14b8a6",
            html: `
                <div class="em-section">
                    <h4><i class="fa-solid fa-bullseye"></i> İmtahan Haqqında & Əhəmiyyəti</h4>
                    <p><strong>ADA Universiteti</strong> — Azərbaycanda beynəlxalq standartlara cavab verən ən prestijli ali təhsil müəssisəsidir. ADA-ya qəbul həm DİM imtahanı, həm də birbaşa <strong>SAT (1200+ bal ilə 100% təqaüd və ya güzəştli qəbul)</strong> vasitəsilə həyata keçirilir.</p>
                </div>
                <div class="em-section">
                    <h4><i class="fa-solid fa-cubes"></i> ADA Qəbul Mərhələləri & Tələbləri</h4>
                    <ul>
                        <li><strong>SAT / DİM Nəticəsi:</strong> Yüksək SAT balı ilə DİM ixtisas imtahanından azad olmaq və təqaüd almaq imkanı.</li>
                        <li><strong>İngilis Dili Tələbi:</strong> IELTS Academic (min 6.0–6.5) və ya TOEFL iBT / Duolingo sertifikatı.</li>
                        <li><strong>Daxili Müsahibə & Esse:</strong> Xüsusi fərqlənmə və təqaüd proqramları üçün akademik müsahibə mərhələsi.</li>
                    </ul>
                </div>
                <div class="em-section em-highlight">
                    <h4><i class="fa-solid fa-award"></i> Thrive ilə Hazırlıq & Rekordlarımız</h4>
                    <p>Thrive Education olaraq ADA Universitetinə müraciət edən tələbələrimizdə <strong>100% qəbul göstəricisinə</strong> malikik. Müsahibə simulyasiyaları və SAT+IELTS kompleks hazırlığı ilə xəyallarınızdakı fakültəyə zəmanət veririk.</p>
                </div>
            `
        },
        en: {
            title: "ADA University Admissions & Preparation",
            tag: "PREMIER NATIONAL UNIVERSITY",
            icon: "fa-solid fa-building-columns",
            color: "#14b8a6",
            html: `
                <div class="em-section">
                    <h4><i class="fa-solid fa-bullseye"></i> About ADA University</h4>
                    <p><strong>ADA University</strong> is Azerbaijan's premier English-medium university operating at international academic standards. Admission is achieved via SEC exams or directly through <strong>SAT (1200+ scores provide SEC exemptions and 100% tuition waivers)</strong>.</p>
                </div>
                <div class="em-section">
                    <h4><i class="fa-solid fa-cubes"></i> Admission Stages & Criteria</h4>
                    <ul>
                        <li><strong>SAT / SEC Exemption:</strong> High SAT scores bypass subject block exams and unlock presidential scholarship discounts.</li>
                        <li><strong>English Requirement:</strong> IELTS Academic (min 6.0–6.5) or TOEFL/DET equivalents.</li>
                        <li><strong>Interview & Essay:</strong> Internal interview stages for honor programs and merit scholarships.</li>
                    </ul>
                </div>
                <div class="em-section em-highlight">
                    <h4><i class="fa-solid fa-award"></i> Thrive 100% Admission Rate</h4>
                    <p>Our students maintain a <strong>100% admission success rate</strong> to ADA University through our combined SAT+IELTS training and realistic interview simulations.</p>
                </div>
            `
        },
        ru: {
            title: "Поступление в Университет ADA и Внутренние Экзамены",
            tag: "ВЕДУЩИЙ УНИВЕРСИТЕТ АЗЕРБАЙДЖАНА",
            icon: "fa-solid fa-building-columns",
            color: "#14b8a6",
            html: `
                <div class="em-section">
                    <h4><i class="fa-solid fa-bullseye"></i> Об Университете ADA</h4>
                    <p><strong>Университет ADA</strong> — самый престижный вуз Азербайджана с преподаванием на английском языке. Поступление осуществляется через ГЭЦ или напрямую по <strong>SAT (балл 1200+ освобождает от экзаменов и дает 100% скидку)</strong>.</p>
                </div>
                <div class="em-section">
                    <h4><i class="fa-solid fa-cubes"></i> Этапы поступления и требования</h4>
                    <ul>
                        <li><strong>SAT / ГЭЦ:</strong> Высокий балл SAT позволяет поступить без профильного экзамена ГЭЦ со стипендией.</li>
                        <li><strong>Английский язык:</strong> Сертификат IELTS Academic (6.0–6.5) или TOEFL/DET.</li>
                        <li><strong>Интервью и Эссе:</strong> Внутреннее собеседование для получения грантов и стипендий.</li>
                    </ul>
                </div>
                <div class="em-section em-highlight">
                    <h4><i class="fa-solid fa-award"></i> 100% поступаемость с Thrive</h4>
                    <p>Наши абитуриенты показывают <strong>100% результат поступления</strong> в Университет ADA благодаря комплексной подготовке SAT+IELTS и симуляциям собеседований.</p>
                </div>
            `
        }
    }
};

function openExamModal(examKey) {
    const examObj = examDetailsData[examKey];
    if (!examObj) return;

    const data = examObj[activeLang] || examObj['az'];

    const modal = document.getElementById('examInfoModal');
    const badge = document.getElementById('examModalBadge');
    const tag = document.getElementById('examModalTag');
    const title = document.getElementById('examModalTitle');
    const body = document.getElementById('examModalBody');

    badge.innerHTML = `<i class="${data.icon}"></i>`;
    badge.style.background = `${data.color}20`;
    badge.style.color = data.color;
    badge.style.borderColor = `${data.color}40`;

    tag.textContent = data.tag;
    tag.style.color = data.color;

    title.textContent = data.title;
    body.innerHTML = data.html;

    modal.classList.add('active');
    document.body.style.overflow = 'hidden';
}

function closeExamModal() {
    const modal = document.getElementById('examInfoModal');
    if (modal) {
        modal.classList.remove('active');
        document.body.style.overflow = '';
    }
}

function closeExamModalOnBackdrop(e) {
    if (e.target && e.target.id === 'examInfoModal') {
        closeExamModal();
    }
}

// Close on Escape key
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeExamModal();
    }
});
</script>

<style>
/* Exam Minimal Cards Enhanced */
.exam-minimal-grid {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 22px;
    margin-top: 10px;
}
.exam-minimal-card {
    background: var(--card-bg);
    border: 1px solid var(--border-color);
    border-radius: 20px;
    padding: 38px 25px 28px 25px;
    text-align: center;
    min-width: 200px;
    flex: 1;
    max-width: 235px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: 10px;
    transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.03);
    cursor: pointer;
    position: relative;
    overflow: hidden;
}
.exam-minimal-card::after {
    content: '';
    position: absolute;
    bottom: 0; left: 0; width: 100%; height: 3px;
    background: linear-gradient(90deg, var(--ocean-blue), var(--aqua-teal));
    opacity: 0;
    transition: opacity 0.3s ease;
}
.exam-minimal-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 16px 35px rgba(0, 63, 130, 0.12);
    border-color: var(--aqua-teal);
}
.exam-minimal-card:hover::after {
    opacity: 1;
}
.exam-acronym {
    font-family: var(--font-heading);
    font-size: 2.7rem;
    font-weight: 800;
    letter-spacing: -1px;
    background: linear-gradient(135deg, var(--deep-navy) 0%, var(--aqua-teal) 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    line-height: 1.2;
    padding-top: 0.1em;
}
[data-theme="dark"] .exam-acronym {
    background: linear-gradient(135deg, #ffffff 0%, var(--aqua-teal) 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}
.exam-label {
    font-size: 0.95rem;
    font-weight: 600;
    color: var(--text-secondary);
    letter-spacing: 0.5px;
}
.exam-card-more {
    font-size: 0.78rem;
    font-weight: 600;
    color: var(--aqua-teal);
    opacity: 0.85;
    margin-top: 6px;
    display: inline-flex;
    align-items: center;
    gap: 5px;
    transition: transform 0.25s ease, opacity 0.25s ease;
}
.exam-minimal-card:hover .exam-card-more {
    opacity: 1;
    transform: translateX(3px);
}

/* Exam Modal Popup Styles */
.exam-modal-overlay {
    position: fixed;
    top: 0; left: 0;
    width: 100%; height: 100%;
    background: rgba(3, 7, 18, 0.75);
    backdrop-filter: blur(10px);
    -webkit-backdrop-filter: blur(10px);
    z-index: 999999;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 20px;
    opacity: 0;
    visibility: hidden;
    transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
}
.exam-modal-overlay.active {
    opacity: 1;
    visibility: visible;
}
.exam-modal-box {
    background: var(--card-bg, #ffffff);
    border: 1px solid var(--border-color, #e2e8f0);
    border-radius: 24px;
    width: 100%;
    max-width: 650px;
    max-height: 88vh;
    overflow-y: auto;
    position: relative;
    box-shadow: 0 25px 60px rgba(0, 0, 0, 0.35);
    transform: scale(0.92) translateY(20px);
    transition: all 0.35s cubic-bezier(0.16, 1, 0.3, 1);
    color: var(--text-main, #1e293b);
}
.exam-modal-overlay.active .exam-modal-box {
    transform: scale(1) translateY(0);
}
.exam-modal-close {
    position: absolute;
    top: 20px;
    right: 20px;
    width: 38px;
    height: 38px;
    border-radius: 50%;
    background: rgba(0,0,0,0.05);
    border: 1px solid var(--border-color);
    font-size: 1.4rem;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    color: var(--text-secondary);
    transition: all 0.25s ease;
    z-index: 10;
}
.exam-modal-close:hover {
    background: #f43f5e;
    color: #fff;
    border-color: #f43f5e;
    transform: rotate(90deg);
}
.exam-modal-header {
    padding: 28px 30px 20px 30px;
    border-bottom: 1px solid var(--border-color);
    display: flex;
    align-items: center;
    gap: 16px;
}
.exam-modal-badge {
    width: 52px;
    height: 52px;
    border-radius: 14px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
    border: 1px solid;
    flex-shrink: 0;
}
.exam-modal-title-wrap {
    display: flex;
    flex-direction: column;
    gap: 4px;
}
.exam-modal-tag {
    font-size: 0.72rem;
    font-weight: 700;
    letter-spacing: 1.5px;
    text-transform: uppercase;
}
.exam-modal-title {
    font-size: 1.5rem;
    font-weight: 800;
    margin: 0;
    line-height: 1.25;
    color: var(--heading-color, #0f172a);
}
.exam-modal-body {
    padding: 26px 30px;
    display: flex;
    flex-direction: column;
    gap: 22px;
    font-size: 0.96rem;
    line-height: 1.65;
    color: var(--text-secondary, #475569);
}
.em-section h4 {
    font-size: 1.05rem;
    font-weight: 700;
    color: var(--heading-color, #0f172a);
    margin-bottom: 8px;
    display: flex;
    align-items: center;
    gap: 8px;
}
.em-section ul {
    margin: 8px 0 0 18px;
    padding: 0;
    display: flex;
    flex-direction: column;
    gap: 6px;
}
.em-section.em-highlight {
    background: rgba(76, 162, 181, 0.08);
    border-left: 4px solid var(--aqua-teal, #4ca2b5);
    padding: 16px 20px;
    border-radius: 12px;
}
.exam-modal-footer {
    padding: 18px 30px 24px 30px;
    border-top: 1px solid var(--border-color);
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 15px;
    flex-wrap: wrap;
}
@media (max-width: 640px) {
    .exam-modal-header { padding: 22px 20px 16px 20px; }
    .exam-modal-body { padding: 20px; }
    .exam-modal-footer { padding: 16px 20px; flex-direction: column-reverse; align-items: stretch; }
    .exam-modal-footer .btn-primary, .exam-modal-footer .btn-secondary { width: 100%; text-align: center; justify-content: center; }
}
</style>

<!-- Universities Slider -->
<?php if(!empty($universities)): ?>
<section id="universities-slider" style="padding: 80px 0; background: var(--bg-primary); position: relative; overflow: hidden;">
    <div class="container" style="position: relative;">
        <div style="text-align: center; margin-bottom: 50px;" data-aos="fade-up">
            <h2 style="font-size: 2.8rem; color: var(--heading-color); margin-bottom: 15px; font-family: var(--font-heading);">
                <?= \Core\Language::get('home_universities_title') ?? 'Universitetlər' ?>
            </h2>
        </div>
        
        <div class="slider-wrapper" style="position: relative; padding: 0 40px;">
            <button class="slider-btn prev-btn" onclick="slideUniversities(-1)"><i class="fa-solid fa-chevron-left"></i></button>
            <div class="slider-container" id="uniSliderContainer" style="display: flex; gap: 20px; overflow-x: auto; scroll-behavior: smooth; scrollbar-width: none;">
                <?php foreach($universities as $uni): ?>
                <div class="uni-slide" style="min-width: 300px; flex: 0 0 300px; background: var(--card-bg); border-radius: 12px; overflow: hidden; box-shadow: 0 5px 15px var(--shadow-light);">
                    <img src="<?= APP_URL . htmlspecialchars($uni['image_url']) ?>" alt="<?= htmlspecialchars($uni['name']) ?>" style="width: 100%; height: 200px; object-fit: cover;">
                    <div style="padding: 20px;">
                        <h4 style="margin: 0 0 10px; font-size: 1.2rem; font-family: var(--font-heading); color: var(--heading-color);"><?= htmlspecialchars($uni['name']) ?></h4>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <button class="slider-btn next-btn" onclick="slideUniversities(1)"><i class="fa-solid fa-chevron-right"></i></button>
        </div>
    </div>
</section>
<style>
.slider-container::-webkit-scrollbar { display: none; }
.slider-btn {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    width: 40px; height: 40px;
    border-radius: 50%;
    border: none;
    background: var(--deep-navy);
    color: var(--white);
    font-size: 18px;
    cursor: pointer;
    z-index: 10;
    transition: background 0.3s;
}
.slider-btn:hover { background: var(--ocean-blue); }
.prev-btn { left: 0; }
.next-btn { right: 0; }
</style>
<script>
function slideUniversities(direction) {
    const container = document.getElementById('uniSliderContainer');
    const scrollAmount = 320; // card width + gap
    container.scrollBy({ left: scrollAmount * direction, behavior: 'smooth' });
}
</script>
<?php endif; ?>

<!-- Thrive Mobile Ecosystem Showcase -->
<section id="thrive-mobile-showcase" style="padding: 90px 0; background: linear-gradient(180deg, var(--white) 0%, var(--gray-light) 100%); position: relative;">
    <div class="container">
        <div style="background: var(--deep-navy); border-radius: 30px; padding: 60px 40px; color: #fff; position: relative; overflow: hidden; box-shadow: 0 25px 50px rgba(0, 11, 33, 0.25); border: 1px solid rgba(255,255,255,0.1);">
            <div style="position: absolute; top: -50%; right: -10%; width: 500px; height: 500px; background: radial-gradient(circle, rgba(76,162,181,0.2) 0%, transparent 70%); pointer-events: none;"></div>
            
            <div style="display: flex; flex-wrap: wrap; align-items: center; justify-content: space-between; gap: 40px; position: relative; z-index: 2;">
                <div style="flex: 1; min-width: 300px; max-width: 540px;" data-aos="fade-right">
                    <span style="display: inline-block; padding: 6px 16px; background: rgba(76,162,181,0.2); border: 1px solid var(--aqua-teal); border-radius: 30px; color: var(--aqua-teal); font-size: 0.8rem; font-weight: 700; letter-spacing: 2px; text-transform: uppercase; margin-bottom: 20px;">
                        THRIVE MOBILE APP
                    </span>
                    <h2 style="font-size: 2.8rem; color: #fff; line-height: 1.2; margin-bottom: 20px; font-family: var(--font-heading);">
                        <?= \Core\Language::get('mobile_showcase_title') ?? 'Bütün Təhsil Ekosistemi' ?> <span style="color: var(--aqua-teal);"><?= \Core\Language::get('mobile_showcase_highlight') ?? 'Cibinizdə.' ?></span>
                    </h2>
                    <p style="color: rgba(255,255,255,0.8); font-size: 1.05rem; line-height: 1.7; margin-bottom: 30px;">
                        <?= \Core\Language::get('mobile_showcase_desc') ?? 'Şagird və valideynlər üçün xüsusi dizayn edilmiş rəqəmsal platformamız vasitəsilə tədris prosesi şəffaf və nəzarətdədir.' ?>
                    </p>
                    <a href="<?= APP_URL ?>/thrive-mobile" class="btn-minimal-primary">
                        <?= \Core\Language::get('mobile_showcase_btn') ?? 'Tətbiq İmkanlarına Bax' ?> &rarr;
                    </a>
                </div>
                
                <div style="flex: 1; min-width: 300px; display: grid; grid-template-columns: repeat(auto-fit, minmax(210px, 1fr)); gap: 18px;" data-aos="fade-left">
                    <div style="background: rgba(255,255,255,0.06); border: 1px solid rgba(255,255,255,0.12); border-radius: 18px; padding: 22px; backdrop-filter: blur(10px);">
                        <h4 style="color: #fff; font-size: 1.1rem; margin-bottom: 8px; font-weight: 600;"><?= \Core\Language::get('mobile_f1_title') ?? 'Valideyn Portalı' ?></h4>
                        <p style="color: rgba(255,255,255,0.7); font-size: 0.88rem; line-height: 1.5; margin: 0;"><?= \Core\Language::get('mobile_f1_desc') ?? 'Övladınızın real-vaxt imtahan nəticələrini və davamiyyətini anlıq izləyin.' ?></p>
                    </div>
                    <div style="background: rgba(255,255,255,0.06); border: 1px solid rgba(255,255,255,0.12); border-radius: 18px; padding: 22px; backdrop-filter: blur(10px);">
                        <h4 style="color: #fff; font-size: 1.1rem; margin-bottom: 8px; font-weight: 600;"><?= \Core\Language::get('mobile_f2_title') ?? 'İmtahan Analitikası' ?></h4>
                        <p style="color: rgba(255,255,255,0.7); font-size: 0.88rem; line-height: 1.5; margin: 0;"><?= \Core\Language::get('mobile_f2_desc') ?? 'SAT, CSCA və DİM sınaq nəticələrinin süni intellektlə dinamik inkişaf qrafiki.' ?></p>
                    </div>
                    <div style="background: rgba(255,255,255,0.06); border: 1px solid rgba(255,255,255,0.12); border-radius: 18px; padding: 22px; backdrop-filter: blur(10px);">
                        <h4 style="color: #fff; font-size: 1.1rem; margin-bottom: 8px; font-weight: 600;"><?= \Core\Language::get('mobile_f3_title') ?? 'Görüş Rezervasiyası' ?></h4>
                        <p style="color: rgba(255,255,255,0.7); font-size: 0.88rem; line-height: 1.5; margin: 0;"><?= \Core\Language::get('mobile_f3_desc') ?? 'Study Abroad məsləhətçiləri ilə birbaşa onlayn görüş təyin etmək imkanı.' ?></p>
                    </div>
                    <div style="background: rgba(255,255,255,0.06); border: 1px solid rgba(255,255,255,0.12); border-radius: 18px; padding: 22px; backdrop-filter: blur(10px);">
                        <h4 style="color: #fff; font-size: 1.1rem; margin-bottom: 8px; font-weight: 600;"><?= \Core\Language::get('mobile_f4_title') ?? 'Supabase Cloud' ?></h4>
                        <p style="color: rgba(255,255,255,0.7); font-size: 0.88rem; line-height: 1.5; margin: 0;"><?= \Core\Language::get('mobile_f4_desc') ?? '1-kliklə sürətli və təhlükəsiz Google Auth hesabı və bulud sinxronizasiyası.' ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- About Preview / Why Thrive -->
<section class="section">
    <div class="container">
        <div style="text-align: center; margin-bottom: 60px;" data-aos="fade-up">
            <h2 class="section-title"><?= \Core\Language::get('why_choose') ?? 'Niyə Thrive?' ?></h2>
            <p style="color: var(--text-secondary); font-size: 1.1rem; max-width: 600px; margin: 0 auto;"><?= \Core\Language::get('why_choose_desc') ?? 'Təhsil həyatınızın ən önəmli addımında yanınızdayıq.' ?></p>
        </div>
        
        <div class="why-4-grid">
            <?php
            $reasons = [
                [
                    'icon' => '<i class="fas fa-user-check"></i>',
                    'title' => \Core\Language::get('why_4_1_title') ?? 'Fərdi Yanaşma & Kiçik Qruplar',
                    'desc' => \Core\Language::get('why_4_1_desc') ?? 'Hər bir tələbə üçün xüsusi tədris strategiyası və maksimum diqqət.'
                ],
                [
                    'icon' => '<i class="fas fa-chalkboard-teacher"></i>',
                    'title' => \Core\Language::get('why_4_2_title') ?? 'Peşəkar Müəllim Heyəti',
                    'desc' => \Core\Language::get('why_4_2_desc') ?? 'Beynəlxalq sertifikatlı və uzun illərin təcrübəsinə malik mütəxəssislər.'
                ],
                [
                    'icon' => '<i class="fas fa-globe-americas"></i>',
                    'title' => \Core\Language::get('why_4_3_title') ?? 'Beynəlxalq Proqramlar',
                    'desc' => \Core\Language::get('why_4_3_desc') ?? 'Dünyanın aparıcı universitetlərinin qəbul standartlarına uyğun hazırlıq.'
                ],
                [
                    'icon' => '<i class="fas fa-route"></i>',
                    'title' => \Core\Language::get('why_4_4_title') ?? 'A-dan Z-yə Tam Dəstək',
                    'desc' => \Core\Language::get('why_4_4_desc') ?? 'İmtahandan qəbula, viza və yaşayış yerinə qədər hərtərəfli bələdçilik.'
                ]
            ];
            foreach($reasons as $index => $r):
            ?>
            <div class="why-4-card" data-aos="fade-up" data-aos-delay="<?= ($index + 1) * 100 ?>">
                <div class="why-4-icon"><?= $r['icon'] ?></div>
                <h3 class="why-4-title"><?= $r['title'] ?></h3>
                <p class="why-4-desc"><?= $r['desc'] ?></p>
            </div>
            <?php endforeach; ?>
        </div>
        
        <style>
        .why-4-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 24px;
            max-width: 1100px;
            margin: 0 auto;
        }
        @media (max-width: 992px) {
            .why-4-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }
        @media (max-width: 576px) {
            .why-4-grid {
                grid-template-columns: 1fr;
            }
        }
        .why-4-card {
            background: var(--card-bg);
            border: 1px solid var(--border-color);
            border-radius: 20px;
            padding: 34px 22px;
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
            transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
            box-shadow: 0 4px 20px rgba(0,0,0,0.02);
            position: relative;
            overflow: hidden;
        }
        .why-4-card:hover {
            border-color: var(--aqua-teal);
            transform: translateY(-6px);
            box-shadow: 0 16px 35px rgba(76,162,181,0.1);
        }
        .why-4-icon {
            width: 60px;
            height: 60px;
            border-radius: 16px;
            background: rgba(76,162,181,0.08);
            color: var(--aqua-teal);
            font-size: 1.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
            transition: all 0.3s ease;
        }
        .why-4-card:hover .why-4-icon {
            background: var(--aqua-teal);
            color: #ffffff;
            transform: scale(1.08) rotate(4deg);
        }
        .why-4-title {
            font-size: 1.15rem;
            font-weight: 600;
            color: var(--heading-color);
            margin: 0 0 12px;
            line-height: 1.3;
        }
        .why-4-desc {
            font-size: 0.92rem;
            color: var(--text-secondary);
            line-height: 1.6;
            margin: 0;
        }
        </style>
    </div>
</section>

<!-- Thrive Digital Ecosystem Section (Portal, Mobile, ThrivePrep) -->
<section style="padding: 85px 0; background: linear-gradient(180deg, var(--bg-primary) 0%, var(--bg-secondary) 100%); position: relative; z-index: 20;">
    <div class="container">
        <div style="background: linear-gradient(135deg, #000b21 0%, #002244 50%, #004369 100%); border-radius: 28px; padding: 50px 40px; color: #fff; box-shadow: 0 25px 60px rgba(0,0,0,0.3); border: 1px solid rgba(255,255,255,0.1); position:relative; overflow:hidden;" data-aos="fade-up">
            <div style="display:flex; flex-wrap:wrap; align-items:center; justify-content:space-between; gap:40px; position:relative; z-index:2;">
                <div style="flex:1; min-width:300px; max-width:640px;">
                    <div style="display:inline-flex; align-items:center; gap:8px; background:rgba(76,162,181,0.2); color:var(--aqua-teal); padding:6px 16px; border-radius:30px; font-size:0.85rem; font-weight:600; text-transform:uppercase; letter-spacing:1px; margin-bottom:18px;">
                        <i class="fa-solid fa-layer-group"></i> Rəqəmsal Təhsil Ekosistemi
                    </div>
                    <h2 style="font-size: clamp(2rem, 3.8vw, 2.8rem); color:#fff; font-family:var(--font-heading); margin-bottom:18px; line-height:1.2;">
                        Thrive Portal &bull; Mobile &bull; ThrivePrep
                    </h2>
                    <p style="color: rgba(255,255,255,0.85); font-size: 1.08rem; line-height: 1.7; margin-bottom: 25px;">
                        Tələbələrimiz üçün hər şey düşünülüb: <strong>Thrive Portal</strong> ilə rəsmi dərslər və analitika, <strong>Thrive Mobile</strong> ilə bildirişlər və <strong>ThrivePrep</strong> ilə geniş sual bazası əsaslı Self-Study təlimləri!
                    </p>
                    <div style="display:flex; gap:12px; flex-wrap:wrap;">
                        <a href="https://portal.thrive.az" target="_blank" rel="noopener" class="btn" style="background: linear-gradient(135deg, var(--ocean-blue), var(--aqua-teal)); color: #fff; padding: 12px 24px; border-radius: 50px; font-weight: 600; text-decoration:none; display:inline-flex; align-items:center; gap:8px; box-shadow: 0 8px 25px rgba(76,162,181,0.4); font-size:0.92rem;">
                            <i class="fa-solid fa-graduation-cap"></i> Thrive Portal
                        </a>
                        <a href="<?= APP_URL ?>/thrive-prep" class="btn" style="background: rgba(255,255,255,0.12); color: #fff; border: 1px solid rgba(255,255,255,0.3); padding: 12px 22px; border-radius: 50px; font-weight: 600; text-decoration:none; display:inline-flex; align-items:center; gap:8px; font-size:0.92rem;">
                            <i class="fa-solid fa-bolt" style="color:var(--aqua-teal);"></i> ThrivePrep
                        </a>
                        <a href="<?= APP_URL ?>/thrive-mobile" class="btn" style="background: rgba(255,255,255,0.08); color: #fff; border: 1px solid rgba(255,255,255,0.2); padding: 12px 22px; border-radius: 50px; font-weight: 600; text-decoration:none; display:inline-flex; align-items:center; gap:8px; font-size:0.92rem;">
                            <i class="fa-solid fa-mobile-screen"></i> Thrive Mobile
                        </a>
                    </div>
                </div>
                
                <div style="flex:0 0 320px; display:flex; flex-direction:column; gap:15px;" data-aos="fade-left">
                    <div style="background:rgba(255,255,255,0.06); border:1px solid rgba(255,255,255,0.12); border-radius:16px; padding:18px; display:flex; align-items:center; gap:16px;">
                        <div style="width:46px; height:46px; border-radius:12px; background:rgba(76,162,181,0.2); color:var(--aqua-teal); display:flex; align-items:center; justify-content:center; font-size:1.3rem; flex-shrink:0;">
                            <i class="fa-solid fa-graduation-cap"></i>
                        </div>
                        <div>
                            <h4 style="color:#fff; margin:0 0 3px; font-size:0.95rem;">portal.thrive.az</h4>
                            <p style="color:rgba(255,255,255,0.7); margin:0; font-size:0.82rem;">Tələbə & Valideyn Şəxsi Kabineti</p>
                        </div>
                    </div>
                    <div style="background:rgba(255,255,255,0.06); border:1px solid rgba(255,255,255,0.12); border-radius:16px; padding:18px; display:flex; align-items:center; gap:16px;">
                        <div style="width:46px; height:46px; border-radius:12px; background:rgba(76,162,181,0.2); color:var(--aqua-teal); display:flex; align-items:center; justify-content:center; font-size:1.3rem; flex-shrink:0;">
                            <i class="fa-solid fa-bolt"></i>
                        </div>
                        <div>
                            <h4 style="color:#fff; margin:0 0 3px; font-size:0.95rem;">ThrivePrep Self-Study</h4>
                            <p style="color:rgba(255,255,255,0.7); margin:0; font-size:0.82rem;">15,000+ Sual & Mock Sınaq Bazası</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Student Journey Timeline -->
<section class="section" style="background: var(--bg-primary); padding: 100px 0;">
    <div class="container">
        <div style="text-align: center; margin-bottom: 60px;" data-aos="fade-up">
            <h2 class="section-title"><?= \Core\Language::get('journey_title') ?? 'Sizin Uğur Yolunuz' ?></h2>
            <p style="color: var(--text-secondary); font-size: 1.1rem; max-width: 600px; margin: 0 auto;"><?= \Core\Language::get('journey_desc') ?></p>
        </div>
        <div class="timeline-container">
            <div class="timeline-line"></div>
            
            <div class="timeline-item" data-aos="fade-up" data-aos-delay="100">
                <div class="timeline-dot">1</div>
                <div class="timeline-content">
                    <h3><?= \Core\Language::get('step_consultation') ?? 'Konsultasiya' ?></h3>
                    <p><?= \Core\Language::get('step_1_desc') ?></p>
                </div>
            </div>
            <div class="timeline-item" data-aos="fade-up" data-aos-delay="200">
                <div class="timeline-dot">2</div>
                <div class="timeline-content">
                    <h3><?= \Core\Language::get('step_strategy') ?? 'Strategiya' ?></h3>
                    <p><?= \Core\Language::get('step_2_desc') ?></p>
                </div>
            </div>
            <div class="timeline-item" data-aos="fade-up" data-aos-delay="300">
                <div class="timeline-dot">3</div>
                <div class="timeline-content">
                    <h3><?= \Core\Language::get('step_prep') ?? 'Hazırlıq' ?></h3>
                    <p><?= \Core\Language::get('step_3_desc') ?></p>
                </div>
            </div>
            <div class="timeline-item" data-aos="fade-up" data-aos-delay="400">
                <div class="timeline-dot">4</div>
                <div class="timeline-content">
                    <h3><?= \Core\Language::get('step_apply') ?? 'Müraciətlər' ?></h3>
                    <p><?= \Core\Language::get('step_4_desc') ?></p>
                </div>
            </div>
            <div class="timeline-item" data-aos="fade-up" data-aos-delay="500">
                <div class="timeline-dot">5</div>
                <div class="timeline-content">
                    <h3><?= \Core\Language::get('step_accept') ?? 'Qəbul & Viza' ?></h3>
                    <p><?= \Core\Language::get('step_5_desc') ?></p>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
.timeline-container { position: relative; max-width: 800px; margin: 0 auto; }
.timeline-line { position: absolute; left: 50%; top: 0; bottom: 0; width: 4px; background: rgba(76,162,181,0.2); transform: translateX(-50%); }
.timeline-item { display: flex; align-items: center; justify-content: space-between; margin-bottom: 40px; position: relative; width: 100%; }
.timeline-item:nth-child(even) { flex-direction: row-reverse; }
.timeline-content { width: 45%; background: var(--card-bg); padding: 25px; border-radius: 12px; box-shadow: 0 10px 30px var(--shadow-light); border: 1px solid var(--border-color); }
.timeline-item:nth-child(even) .timeline-content { text-align: right; }
.timeline-dot { width: 40px; height: 40px; background: var(--aqua-teal); color: #fff; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: bold; position: absolute; left: 50%; transform: translateX(-50%); z-index: 2; border: 4px solid var(--bg-primary); box-shadow: 0 0 0 4px rgba(76,162,181,0.2); }
.timeline-content h3 { color: var(--heading-color); margin-bottom: 10px; }
.timeline-content p { color: var(--text-secondary); font-size: 0.95rem; margin: 0; }
@media (max-width: 1024px) {
    .timeline-line { left: 30px; transform: none; }
    .timeline-item, .timeline-item:nth-child(even) { flex-direction: row; }
    .timeline-dot { left: 30px; transform: translateX(-50%); }
    .timeline-content { width: calc(100% - 80px); margin-left: 80px; text-align: left !important; }
}
</style>



