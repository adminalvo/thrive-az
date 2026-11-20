<style>
/* Hero Section Styles */
.thrive-hero {
    position: relative;
    min-height: 100vh;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    background: var(--deep-navy);
    padding-top: 120px; /* Offset for fixed navbar */
    padding-bottom: 80px; /* Space for the bottom cards */
}
.thrive-hero-bg {
    position: absolute;
    top: 0; left: 0; width: 100%; height: 100%;
    background-image: url('<?= APP_URL ?>/assets/images/premium-hero-bg.jpg');
    background-size: cover;
    background-position: center;
    opacity: 0.4;
    z-index: 1;
}
.thrive-hero-overlay {
    position: absolute;
    top: 0; left: 0; width: 100%; height: 100%;
    background: linear-gradient(135deg, rgba(0, 11, 33, 0.9) 0%, rgba(0, 63, 130, 0.7) 100%);
    z-index: 2;
}
.thrive-hero-content {
    position: relative;
    z-index: 10;
    text-align: center;
    max-width: 900px;
    padding: 0 20px;
    margin-top: -50px;
}
.thrive-hero-badge {
    display: inline-block;
    padding: 8px 20px;
    background: rgba(76, 162, 181, 0.15);
    border: 1px solid rgba(76, 162, 181, 0.4);
    color: var(--aqua-teal);
    border-radius: 50px;
    font-size: 0.9rem;
    font-weight: 600;
    letter-spacing: 1.5px;
    text-transform: uppercase;
    margin-bottom: 24px;
    backdrop-filter: blur(10px);
}
.thrive-hero-title {
    font-size: 4.5rem;
    color: var(--white);
    margin-bottom: 24px;
    letter-spacing: -1px;
}
.thrive-hero-desc {
    font-size: 1.25rem;
    color: var(--gray-medium);
    margin-bottom: 40px;
    max-width: 700px;
    margin-left: auto;
    margin-right: auto;
}
.thrive-hero-actions {
    display: flex;
    gap: 20px;
    justify-content: center;
    margin-bottom: 60px;
}
.btn-primary {
    background: var(--aqua-teal);
    color: var(--white);
}
.btn-primary:hover {
    background: #3a8a9a;
}
.btn-outline {
    background: transparent;
    border: 2px solid rgba(255,255,255,0.3);
    color: var(--white);
}
.btn-outline:hover {
    border-color: var(--white);
    background: rgba(255,255,255,0.1);
}
/* Quick Links Glass Card */
.thrive-hero-quick-links {
    position: relative;
    margin-top: 40px;
    z-index: 20;
    width: 90%;
    max-width: 1000px;
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(20px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    border-radius: 24px;
    padding: 30px;
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 20px;
    box-shadow: var(--shadow-lg);
}
.quick-link-item {
    display: flex;
    align-items: center;
    gap: 15px;
    color: var(--white);
    padding: 15px;
    border-radius: 16px;
    transition: all 0.3s ease;
    background: var(--dropdown-hover-bg);
}
.quick-link-item:hover {
    background: rgba(255,255,255,0.15);
    transform: translateY(-3px);
}
.quick-link-icon {
    width: 48px;
    height: 48px;
    background: rgba(76, 162, 181, 0.2);
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--aqua-teal);
}
.quick-link-text h4 {
    color: var(--white);
    margin: 0 0 4px 0;
    font-size: 1.1rem;
}
.quick-link-text p {
    color: rgba(255,255,255,0.7);
    margin: 0;
    font-size: 0.85rem;
}

@media (max-width: 991px) {
    .thrive-hero-title { font-size: 3rem; }
    .thrive-hero-quick-links {
        position: relative;
        bottom: 0;
        margin-top: 40px;
        grid-template-columns: 1fr;
    }
}
</style>

<section class="thrive-hero">
    <div class="thrive-hero-bg"></div>
    <div class="thrive-hero-overlay"></div>
    
    <div class="thrive-hero-content">
        <div data-aos="fade-down" data-aos-duration="1000">
            <span class="thrive-hero-badge">Təhsilin Gələcəyi</span>
        </div>
        
        <h1 class="thrive-hero-title" data-aos="fade-up" data-aos-delay="100">
            Təhsilin Yeni Standartı
        </h1>
        
        <p class="thrive-hero-desc" data-aos="fade-up" data-aos-delay="200">
            Thrive Education Center, Study Abroad və Creation Lab ilə qlobal karyeranıza ilk addımı atın. Bizimlə hüdudları aşın.
        </p>
        
        <div class="thrive-hero-actions" data-aos="fade-up" data-aos-delay="300">
            <a href="<?= APP_URL ?>/booking" class="btn btn-primary">
                Konsultasiya Sifariş Et
            </a>
            <a href="#programs" class="btn btn-outline">
                Proqramlara Bax
            </a>
        </div>
    </div>
    
    <div class="thrive-hero-quick-links" data-aos="fade-up" data-aos-delay="500">
        <a href="<?= APP_URL ?>/education" class="quick-link-item">
            <div class="quick-link-icon">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/></svg>
            </div>
            <div class="quick-link-text">
                <h4>Education Center</h4>
                <p>Dil və Akademik Kurslar</p>
            </div>
        </a>
        
        <a href="<?= APP_URL ?>/study-abroad" class="quick-link-item">
            <div class="quick-link-icon">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M2 12h20M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg>
            </div>
            <div class="quick-link-text">
                <h4>Study Abroad</h4>
                <p>Xaricdə Təhsil və Təqaüd</p>
            </div>
        </a>
        
        <a href="<?= APP_URL ?>/creation-lab" class="quick-link-item">
            <div class="quick-link-icon">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>
            </div>
            <div class="quick-link-text">
                <h4>Creation Lab</h4>
                <p>Praktiki və Şəxsi İnkişaf</p>
            </div>
        </a>
    </div>
</section>
