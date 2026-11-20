<section class="premium-hero center" style="min-height: 350px; display: flex; align-items: center; position: relative; overflow: hidden;">
    <?php if(!empty($record['image_url'])): ?>
    <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: url('<?= htmlspecialchars($record['image_url']) ?>') center/cover; opacity: 0.3; z-index: 1;"></div>
    <?php endif; ?>
    <div class="premium-hero-bg premium-hero-bg-abstract" style="z-index: 0;"></div>
    <div class="container" style="position: relative; z-index: 2; width: 100%; text-align: center; margin-top: 30px;">
        <h1 style="margin: 0; font-size: clamp(2rem, 5vw, 3.5rem); text-shadow: 0 2px 10px rgba(0,0,0,0.5); color: #fff;"><?= htmlspecialchars($record[$titleField] ?? $record['title']) ?></h1>
    </div>
</section>

<section class="section" style="background: var(--bg-color);">
    <div class="container" style="max-width: 900px;">
        <a href="<?= APP_URL ?>/self-study" style="display:inline-block; margin-bottom: 30px; color:var(--primary); font-weight:bold; font-size: 1.1rem; text-decoration: none;">
            <span style="margin-right: 8px;">&larr;</span> <?= \Core\Language::get('self_study') ?? 'Geri Qayıt' ?>
        </a>

        <div class="modern-card" style="padding: 40px; border-radius: 20px; box-shadow: 0 15px 40px var(--shadow-medium);">
            
            <?php if(!empty($record['image_url'])): ?>
            <div style="width: 100%; max-height: 400px; overflow: hidden; border-radius: 12px; margin-bottom: 40px; box-shadow: 0 10px 25px var(--shadow-light);">
                <img src="<?= htmlspecialchars($record['image_url']) ?>" alt="<?= htmlspecialchars($record[$titleField] ?? $record['title']) ?>" style="width: 100%; height: auto; display: block;">
            </div>
            <?php endif; ?>

            <div style="display: flex; align-items: center; margin-bottom: 25px; color: var(--aqua-teal);">
                <div style="width: 60px; height: 60px; border-radius: 15px; background: rgba(76,162,181,0.1); display: flex; align-items: center; justify-content: center; margin-right: 20px;">
                    <svg width="32" height="32" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                </div>
                <h2 style="color: var(--heading-color); font-size: 2rem; margin: 0; line-height: 1.2;"><?= htmlspecialchars($record[$titleField] ?? $record['title']) ?></h2>
            </div>
            
            <div class="rich-text-content" style="color: var(--text-primary); line-height: 1.8; font-size: 1.15rem; margin-bottom: 40px;">
                <?= nl2br($record[$descField] ?? $record['description']) ?>
            </div>

            <?php if(!empty($record['file_url'])): ?>
            <div style="text-align: center; margin-top: 30px; padding-top: 30px; border-top: 1px solid var(--border-color);">
                <a href="<?= htmlspecialchars($record['file_url']) ?>" target="_blank" class="btn" style="display: inline-flex; align-items: center; padding: 15px 35px; font-size: 1.1rem; border-radius: 50px; text-transform: uppercase; letter-spacing: 1px; box-shadow: 0 10px 20px rgba(76,162,181,0.3); transition: transform 0.3s ease, box-shadow 0.3s ease;" onmouseover="this.style.transform='translateY(-3px)'; this.style.boxShadow='0 15px 25px rgba(76,162,181,0.4)';" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 10px 20px rgba(76,162,181,0.3)';">
                    <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" style="margin-right: 10px;">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                    </svg>
                    Xarici Resursa Keçid Et
                </a>
                <p style="margin-top: 15px; font-size: 0.9rem; color: var(--text-secondary);">
                    Qeyd: Bütün materiallar rəsmi xarici resurslara əsaslanır.
                </p>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<style>
.rich-text-content a { color: var(--aqua-teal); text-decoration: underline; font-weight: 500; transition: color 0.3s; }
.rich-text-content a:hover { color: var(--primary); }
</style>
