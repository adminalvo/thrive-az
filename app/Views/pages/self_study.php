<section class="premium-hero center" style="min-height: 400px; display: flex; align-items: center;">
    <div class="premium-hero-bg premium-hero-bg-abstract"></div>
    <div class="container" style="position: relative; z-index: 2; width: 100%; text-align: center; margin-top: 50px;">
        <h1 style="margin: 0; font-size: 4rem;"><?= \Core\Language::get('self_study') ?></h1>
    </div>
</section>

<section class="section" style="background: var(--gray-light);">
    <div class="container">
        <div style="text-align: center; margin-bottom: 50px;">
            <h2 class="section-title"><?= \Core\Language::get('ss_page_title') ?></h2>
            <p style="font-size: 1.1rem; color: var(--text-secondary);"><?= \Core\Language::get('ss_page_desc') ?></p>
        </div>

        <?php if(empty($records)): ?>
            <div style="text-align: center; color: var(--text-secondary); font-size: 1.2rem;">
                <?= \Core\Language::get('ss_no_material') ?>
            </div>
        <?php else: ?>
            <div class="modern-grid">
                <?php foreach($records as $r): 
                    $lang = \Core\Language::current();
                    $titleField = ($lang !== 'az' && !empty($r['title_'.$lang])) ? 'title_'.$lang : 'title';
                    $descField = ($lang !== 'az' && !empty($r['description_'.$lang])) ? 'description_'.$lang : 'description';
                ?>
                <div class="modern-card" style="padding: 0; overflow: hidden; display: flex; flex-direction: column;">
                    <?php if(!empty($r['image_url'])): ?>
                    <div style="width: 100%; overflow: hidden;">
                        <img src="<?= htmlspecialchars($r['image_url']) ?>" alt="<?= htmlspecialchars($r[$titleField] ?? $r['title']) ?>" style="width: 100%; height: auto; display: block; transition: transform 0.3s ease;" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
                    </div>
                    <?php endif; ?>
                    <div style="padding: 30px; display: flex; flex-direction: column; flex: 1;">
                        <div style="display: flex; align-items: center; margin-bottom: 15px; color: var(--aqua-teal);">
                            <svg width="28" height="28" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                <path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/>
                            </svg>
                            <h3 style="color: var(--heading-color); margin-left: 12px; font-size: 1.4rem; font-weight: 600; line-height: 1.3;"><?= htmlspecialchars($r[$titleField] ?? $r['title']) ?></h3>
                        </div>
                        <p style="color: var(--text-secondary); line-height: 1.6; margin-bottom: 20px; font-size: 0.95rem;">
                            <?= nl2br($r[$descField] ?? $r['description']) ?>
                        </p>
                        <?php if(!empty($r['id'])): ?>
                        <div style="margin-top: auto;">
                            <a href="<?= APP_URL ?>/self-study/<?= $r['id'] ?>" class="btn" style="display: block; text-align: center; width: 100%; box-sizing: border-box;">Ətraflı Bax</a>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
