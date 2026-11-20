<!-- ThrivePrep Hero -->
<section class="premium-hero center" style="padding-top: 150px; padding-bottom: 85px; min-height: 65vh; display: flex; align-items: center; justify-content: center; position: relative; overflow: hidden; background: linear-gradient(180deg, var(--deep-navy) 0%, #001f42 55%, var(--ocean-blue) 100%);">
    <div class="premium-hero-bg premium-hero-bg-abstract"></div>
    <div class="container" style="position: relative; z-index: 2; text-align: center;">
        <div data-aos="fade-down" style="margin-bottom: 25px;">
            <!-- ThrivePrep Official Logo (Transparent & Larger) -->
            <img src="<?= APP_URL ?>/assets/images/thriveprep-logo.png" alt="ThrivePrep" style="max-height: 105px; width: auto; display: inline-block; filter: drop-shadow(0 8px 25px rgba(76,162,181,0.25));">
        </div>
        
        <div data-aos="fade-down" data-aos-delay="100">
            <span style="display: inline-flex; align-items: center; gap: 8px; padding: 8px 22px; background: rgba(76,162,181,0.18); border: 1px solid var(--aqua-teal); border-radius: 30px; color: var(--aqua-teal); font-size: 0.85rem; font-weight: 700; letter-spacing: 2px; text-transform: uppercase; margin-bottom: 20px;">
                <i class="fa-solid fa-bolt"></i> Ağıllı Self-Study & Sual Bazası
            </span>
        </div>

        <h1 data-aos="fade-up" data-aos-delay="200" style="font-size: clamp(2.4rem, 5vw, 3.8rem); color: #fff; font-family: var(--font-heading); margin-bottom: 20px; font-weight: 800; line-height: 1.2;">
            Öz Tempinlə Öyrən, İmtahanı Fəth Et
        </h1>

        <p data-aos="fade-up" data-aos-delay="300" style="font-size: 1.25rem; color: rgba(255,255,255,0.88); max-width: 760px; margin: 0 auto 40px; line-height: 1.7;">
            <strong>ThrivePrep</strong> — tələbələrin SAT, IELTS, CSCA və DİM imtahanlarına fərdi şəkildə hazırlaşması üçün hazırlanmış, 15,000-dən çox sual və ağıllı sınaq imtahanı bazasına malik premium <strong>Self-Study</strong> proqramıdır.
        </p>

        <div data-aos="fade-up" data-aos-delay="400" style="display: flex; gap: 16px; justify-content: center; flex-wrap: wrap;">
            <a href="<?= APP_URL ?>/book" class="btn" style="background: linear-gradient(135deg, var(--ocean-blue), var(--aqua-teal)); color: #fff; padding: 15px 36px; border-radius: 50px; font-weight: 700; box-shadow: 0 8px 25px rgba(76,162,181,0.4); text-decoration: none; display: inline-flex; align-items: center; gap: 10px; font-size: 1rem;">
                <i class="fa-solid fa-play"></i> Hazırlığa Başla
            </a>
            <a href="#question-banks" class="btn" style="background: rgba(255,255,255,0.1); color: #fff; border: 1px solid rgba(255,255,255,0.25); padding: 15px 30px; border-radius: 50px; font-weight: 600; text-decoration: none; display: inline-flex; align-items: center; gap: 8px;">
                <i class="fa-solid fa-database"></i> Sual Bazalarını Kəşf Et
            </a>
        </div>
    </div>
</section>

<!-- ThrivePrep Overview Counter Cards -->
<section style="padding: 50px 0; background: var(--bg-secondary); border-bottom: 1px solid var(--border-color);">
    <div class="container">
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 24px;">
            <div class="stat-box" data-aos="fade-up" data-aos-delay="100">
                <div class="stat-number">15,000+</div>
                <div class="stat-label">Praktik Sual Bazası</div>
            </div>
            <div class="stat-box" data-aos="fade-up" data-aos-delay="200">
                <div class="stat-number">100+</div>
                <div class="stat-label">Tam Formatlı Mock Sınaqlar</div>
            </div>
            <div class="stat-box" data-aos="fade-up" data-aos-delay="300">
                <div class="stat-number">AI İzah</div>
                <div class="stat-label">Addım-Addım Həll Yolları</div>
            </div>
            <div class="stat-box" data-aos="fade-up" data-aos-delay="400">
                <div class="stat-number">98%</div>
                <div class="stat-label">Bal Artım Zəmanəti</div>
            </div>
        </div>
    </div>
</section>

<!-- Question Banks Categories -->
<section id="question-banks" style="padding: 90px 0; background: var(--bg-primary);">
    <div class="container">
        <div style="text-align: center; margin-bottom: 60px;" data-aos="fade-up">
            <span style="color: var(--aqua-teal); font-weight: 700; letter-spacing: 2px; text-transform: uppercase; font-size: 0.85rem;">Geniş Sual & Test Kapasitəsi</span>
            <h2 style="font-size: clamp(2.2rem, 4vw, 3rem); color: var(--heading-color); margin-top: 10px; font-family: var(--font-heading);">
                ThrivePrep Hansı İmtahanları Əhatə Edir?
            </h2>
            <p style="color: var(--text-secondary); font-size: 1.1rem; max-width: 650px; margin: 15px auto 0;">
                Hər bir imtahan formatına uyğun tərtib edilmiş xüsusi sual bankı və avtomatik qiymətləndirmə:
            </p>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 30px;">
            <!-- Bank 1: Digital SAT -->
            <div class="prep-card" data-aos="fade-up" data-aos-delay="100">
                <div class="prep-card-header" style="background: linear-gradient(135deg, #4f46e5, #7c3aed);">
                    <i class="fa-solid fa-graduation-cap"></i>
                    <span>Digital SAT Bank</span>
                </div>
                <div class="prep-card-body">
                    <h3>SAT Math & Reading/Writing</h3>
                    <p>Digital SAT formatında 5000+ adaptiv sual, Bluebook tipli real interfeys, Desmos kalkulyator inteqrasiyası və çətinlik səviyyəsinə görə filtrləmə.</p>
                    <ul class="prep-list">
                        <li><i class="fa-solid fa-check"></i> 50+ Tam Mock İmtahanı</li>
                        <li><i class="fa-solid fa-check"></i> Hər suala video və mətn izahı</li>
                        <li><i class="fa-solid fa-check"></i> Modul 1 & 2 Adaptiv Alqoritm</li>
                    </ul>
                </div>
            </div>

            <!-- Bank 2: CSCA -->
            <div class="prep-card" data-aos="fade-up" data-aos-delay="200">
                <div class="prep-card-header" style="background: linear-gradient(135deg, #0284c7, #06b6d4);">
                    <i class="fa-solid fa-atom"></i>
                    <span>CSCA Prep Bank</span>
                </div>
                <div class="prep-card-body">
                    <h3>CSCA Fizika & Riyaziyyat</h3>
                    <p>Çin təqaüd proqramları və beynəlxalq mühəndislik qəbulları üçün CSCA standartlarına uyğun 3000+ ixtisaslaşmış sual və analitik tapşırıqlar.</p>
                    <ul class="prep-list">
                        <li><i class="fa-solid fa-check"></i> Mövzu üzrə dərinləşdirilmiş testlər</li>
                        <li><i class="fa-solid fa-check"></i> Keçmiş illərin sınaq arxivləri</li>
                        <li><i class="fa-solid fa-check"></i> Formula və teorem arxivi</li>
                    </ul>
                </div>
            </div>

            <!-- Bank 3: IELTS & DET -->
            <div class="prep-card" data-aos="fade-up" data-aos-delay="300">
                <div class="prep-card-header" style="background: linear-gradient(135deg, #059669, #10b981);">
                    <i class="fa-solid fa-language"></i>
                    <span>IELTS & DET Bank</span>
                </div>
                <div class="prep-card-body">
                    <h3>Dil Sertifikatları Hazırlığı</h3>
                    <p>IELTS Academic Reading/Listening simulyasiyası, Writing esse nümunələri və Duolingo English Test (DET) 1 saatlıq adaptiv test modulları.</p>
                    <ul class="prep-list">
                        <li><i class="fa-solid fa-check"></i> 3000+ Akademik Lüğət Kartı</li>
                        <li><i class="fa-solid fa-check"></i> Audio dinləmə və transkriptlər</li>
                        <li><i class="fa-solid fa-check"></i> Süni intellektlə Writing yoxlanışı</li>
                    </ul>
                </div>
            </div>

            <!-- Bank 4: DİM Milli Qəbul -->
            <div class="prep-card" data-aos="fade-up" data-aos-delay="400">
                <div class="prep-card-header" style="background: linear-gradient(135deg, #ea580c, #f59e0b);">
                    <i class="fa-solid fa-book-bookmark"></i>
                    <span>DİM Milli Bank</span>
                </div>
                <div class="prep-card-body">
                    <h3>DİM Buraxılış & Blok Sınaqları</h3>
                    <p>I, II, III və IV ixtisas qrupları üzrə Dövlət İmtahan Mərkəzi proqramına uyğun açıq və qapalı tipli 4000+ zəngin sual bazası.</p>
                    <ul class="prep-list">
                        <li><i class="fa-solid fa-check"></i> Situasiya və mətn tipli suallar</li>
                        <li><i class="fa-solid fa-check"></i> DİM 700 bal şkalası üzrə hesablama</li>
                        <li><i class="fa-solid fa-check"></i> İllik sınaq testlərinin təhlili</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Self-Study Interactive Features -->
<section style="padding: 80px 0; background: var(--bg-secondary);">
    <div class="container">
        <div style="display: flex; flex-wrap: wrap; align-items: center; gap: 50px; justify-content: space-between;">
            <div style="flex: 1; min-width: 300px; max-width: 600px;" data-aos="fade-right">
                <span style="color: var(--aqua-teal); font-weight: 700; letter-spacing: 2px; text-transform: uppercase; font-size: 0.85rem;">Fərdi İnkişaf Alətləri</span>
                <h2 style="font-size: clamp(2rem, 3.5vw, 2.8rem); color: var(--heading-color); margin: 10px 0 20px; font-family: var(--font-heading);">
                    Niyə ThrivePrep ilə Self-Study?
                </h2>
                <p style="color: var(--text-secondary); font-size: 1.05rem; line-height: 1.7; margin-bottom: 25px;">
                    Klassik kitab və vərəq testlərini unudun. ThrivePrep sizin həll etdiyiniz hər sualı analiz edir, zəif olduğunuz bölmələri aşkar edir və növbəti mərhələdə məhz həmin mövzular üzrə fərdi tapşırıqlar təyin edir.
                </p>
                <div style="display: flex; flex-direction: column; gap: 15px;">
                    <div style="display: flex; gap: 15px; align-items: flex-start;">
                        <div style="width: 36px; height: 36px; border-radius: 50%; background: rgba(76,162,181,0.15); color: var(--aqua-teal); display: flex; align-items: center; justify-content: center; flex-shrink: 0; font-size: 1rem;">
                            <i class="fa-solid fa-chart-pie"></i>
                        </div>
                        <div>
                            <h4 style="margin: 0 0 4px; color: var(--heading-color);">Zəif Mövzu Diaqnostikası</h4>
                            <p style="margin: 0; color: var(--text-secondary); font-size: 0.92rem;">Hər testdən sonra hansı riyazi və ya qrammatik qaydada səhv etdiyinizi qrafiklə görün.</p>
                        </div>
                    </div>
                    <div style="display: flex; gap: 15px; align-items: flex-start;">
                        <div style="width: 36px; height: 36px; border-radius: 50%; background: rgba(76,162,181,0.15); color: var(--aqua-teal); display: flex; align-items: center; justify-content: center; flex-shrink: 0; font-size: 1rem;">
                            <i class="fa-solid fa-clock-rotate-left"></i>
                        </div>
                        <div>
                            <h4 style="margin: 0 0 4px; color: var(--heading-color);">Vaxt İdarəetmə Təlimi</h4>
                            <p style="margin: 0; color: var(--text-secondary); font-size: 0.92rem;">Hər suala sərf olunan saniyələri ölçərək real imtahanda vaxt çatışmazlığı problemini aradan qaldırın.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div style="flex: 0 0 380px; max-width: 100%;" data-aos="fade-left">
                <div style="background: linear-gradient(135deg, #000b21, #002b5c); border-radius: 24px; padding: 40px 30px; color: #fff; box-shadow: 0 20px 50px rgba(0,0,0,0.3); border: 1px solid rgba(255,255,255,0.1); text-align: center;">
                    <div style="width: 65px; height: 65px; border-radius: 20px; background: rgba(255,255,255,0.1); color: var(--aqua-teal); font-size: 1.8rem; display: flex; align-items: center; justify-content: center; margin: 0 auto 20px;">
                        <i class="fa-solid fa-brain"></i>
                    </div>
                    <h3 style="color: #fff; margin-bottom: 12px; font-size: 1.4rem;">ThrivePrep-ə Qoşulun</h3>
                    <p style="color: rgba(255,255,255,0.75); font-size: 0.95rem; line-height: 1.6; margin-bottom: 25px;">
                        Minlərlə sualı sərbəst həll etmək və sınaq imtahanlarında rekord nəticə göstərmək üçün indi qeydiyyatdan keçin.
                    </p>
                    <a href="<?= APP_URL ?>/book" class="btn" style="display: block; background: linear-gradient(135deg, var(--ocean-blue), var(--aqua-teal)); color: #fff; padding: 14px 25px; border-radius: 30px; font-weight: 700; text-decoration: none; box-shadow: 0 8px 25px rgba(76,162,181,0.4);">
                        Qeydiyyatdan Keç & Başla
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
.prep-card {
    background: var(--card-bg);
    border: 1px solid var(--border-color);
    border-radius: 20px;
    overflow: hidden;
    transition: all 0.35s ease;
    box-shadow: 0 4px 20px rgba(0,0,0,0.02);
    display: flex;
    flex-direction: column;
}
.prep-card:hover {
    border-color: var(--aqua-teal);
    transform: translateY(-6px);
    box-shadow: 0 15px 35px var(--shadow-light);
}
.prep-card-header {
    padding: 20px 25px;
    color: #fff;
    display: flex;
    align-items: center;
    gap: 12px;
    font-weight: 700;
    font-size: 1.05rem;
    letter-spacing: 0.5px;
}
.prep-card-body {
    padding: 30px 25px;
    display: flex;
    flex-direction: column;
    flex-grow: 1;
}
.prep-card-body h3 {
    font-size: 1.25rem;
    color: var(--heading-color);
    margin: 0 0 12px;
    font-weight: 600;
}
.prep-card-body p {
    color: var(--text-secondary);
    font-size: 0.95rem;
    line-height: 1.6;
    margin-bottom: 20px;
}
.prep-list {
    list-style: none;
    padding: 0;
    margin: auto 0 0;
    display: flex;
    flex-direction: column;
    gap: 10px;
}
.prep-list li {
    font-size: 0.9rem;
    color: var(--heading-color);
    display: flex;
    align-items: center;
    gap: 10px;
}
.prep-list li i {
    color: #10b981;
    font-size: 0.85rem;
}
.stat-box {
    background: var(--card-bg);
    border: 1px solid var(--border-color);
    border-radius: 16px;
    padding: 25px 20px;
    text-align: center;
    box-shadow: 0 4px 15px rgba(0,0,0,0.02);
}
.stat-number {
    font-size: 2.2rem;
    font-weight: 800;
    font-family: var(--font-heading);
    color: var(--aqua-teal);
    margin-bottom: 5px;
}
.stat-label {
    font-size: 0.9rem;
    color: var(--text-secondary);
    font-weight: 500;
}
</style>
