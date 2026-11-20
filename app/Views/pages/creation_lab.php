<?php
// CSRF token for the embedded consultation form
$csrf_token = \Core\Security::generateCsrfToken();
?>
<!-- VIP Hero Section for Creation Lab -->
<section class="premium-hero center">
    <!-- Geometric abstract background for a corporate look -->
    <div class="premium-hero-bg" style="background: radial-gradient(circle at 80% 20%, rgba(212, 175, 55, 0.1), transparent 40%), radial-gradient(circle at 20% 80%, rgba(76, 162, 181, 0.1), transparent 40%); opacity: 1;"></div>
    
    <div class="container" style="position: relative; z-index: 2;">
        <div class="hero-badge" style="border-color: rgba(212, 175, 55, 0.5); color: #D4AF37;">
            <?= \Core\Language::get('cl_badge') ?>
        </div>
        <h1 style="font-size: 5rem; line-height: 1.1; margin-bottom: 25px; color: #fff; font-family: 'Anton', sans-serif; letter-spacing: 2px;">
            <?= \Core\Language::get('cl_hero_title1') ?><br><span style="color: #D4AF37;"><?= \Core\Language::get('cl_hero_title2') ?></span>
        </h1>
        <p class="hero-desc">
            <?= \Core\Language::get('cl_hero_desc') ?>
        </p>
        <div style="display: flex; gap: 20px; justify-content: center; flex-wrap: wrap;">
            <a href="#modules" class="btn" style="background: #D4AF37; color: var(--heading-color); padding: 15px 40px; font-size: 1.1rem; border-radius: 30px; box-shadow: 0 10px 25px rgba(212, 175, 55, 0.3);"><?= \Core\Language::get('cl_btn_explore') ?></a>
        </div>
    </div>
</section>

<!-- What You Will Learn Section -->
<section style="padding: 100px 0; background: var(--gray-light);">
    <div class="container">
        <div style="text-align: center; margin-bottom: 60px;">
            <h2 class="section-title" style="color: var(--heading-color);"><?= \Core\Language::get('cl_features_title') ?></h2>
            <p style="font-size: 1.1rem; color: var(--text-secondary);"><?= \Core\Language::get('cl_features_desc') ?></p>
        </div>
        
        <div class="modern-grid">
            <!-- Skill 1 -->
            <div class="modern-card" style="text-align: center; border-bottom: 4px solid #D4AF37;">
                <div style="width: 70px; height: 70px; background: rgba(212, 175, 55, 0.1); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 25px; color: #D4AF37;">
                    <svg width="32" height="32" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M12 2a5 5 0 1 0 0 10 5 5 0 0 0 0-10zm0 12c-4.42 0-8 2.24-8 5v2h16v-2c0-2.76-3.58-5-8-5z"/></svg>
                </div>
                <h3 style="color: var(--heading-color); margin-bottom: 15px; font-size: 1.5rem;"><?= \Core\Language::get('cl_feat1_title') ?></h3>
                <p style="color: var(--text-secondary); line-height: 1.6;"><?= \Core\Language::get('cl_feat1_desc') ?></p>
            </div>
            
            <!-- Skill 2 -->
            <div class="modern-card" style="text-align: center; border-bottom: 4px solid var(--aqua-teal);">
                <div style="width: 70px; height: 70px; background: rgba(76, 162, 181, 0.1); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 25px; color: var(--aqua-teal);">
                    <svg width="32" height="32" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                </div>
                <h3 style="color: var(--heading-color); margin-bottom: 15px; font-size: 1.5rem;"><?= \Core\Language::get('cl_feat2_title') ?></h3>
                <p style="color: var(--text-secondary); line-height: 1.6;"><?= \Core\Language::get('cl_feat2_desc') ?></p>
            </div>

            <!-- Skill 3 -->
            <div class="modern-card" style="text-align: center; border-bottom: 4px solid var(--ocean-blue);">
                <div style="width: 70px; height: 70px; background: rgba(0, 63, 130, 0.1); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 25px; color: var(--ocean-blue);">
                    <svg width="32" height="32" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/></svg>
                </div>
                <h3 style="color: var(--heading-color); margin-bottom: 15px; font-size: 1.5rem;"><?= \Core\Language::get('cl_feat3_title') ?></h3>
                <p style="color: var(--text-secondary); line-height: 1.6;"><?= \Core\Language::get('cl_feat3_desc') ?></p>
            </div>
        </div>
    </div>
</section>

<!-- Program Modules Section -->
<section id="modules" style="padding: 100px 0; background: var(--card-bg);">
    <div class="container">
        <div style="display: flex; flex-wrap: wrap; gap: 60px; align-items: center;">
            <div style="flex: 1; min-width: 300px;">
                <h2 style="font-size: 2.5rem; color: var(--heading-color); margin-bottom: 20px;"><?= \Core\Language::get('cl_program_title') ?></h2>
                <p style="font-size: 1.1rem; color: var(--text-secondary); line-height: 1.8; margin-bottom: 30px;">
                    <?= \Core\Language::get('cl_program_desc') ?>
                </p>
                
                <div style="display: flex; flex-direction: column; gap: 20px;">
                    <?php if(!empty($records)): ?>
                        <?php $colors = ['#D4AF37', 'var(--aqua-teal)', 'var(--ocean-blue)']; ?>
                        <?php foreach($records as $index => $r): ?>
                            <div style="background: var(--gray-light); padding: 20px 25px; border-radius: 8px; border-left: 4px solid <?= $colors[$index % count($colors)] ?>;">
                                <h4 style="color: var(--heading-color); margin-bottom: 5px; font-size: 1.1rem;"><?= htmlspecialchars($r['title']) ?></h4>
                                <p style="color: var(--text-secondary); font-size: 0.95rem; margin: 0;"><?= htmlspecialchars($r['description']) ?></p>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div style="background: var(--gray-light); padding: 20px 25px; border-radius: 8px; border-left: 4px solid #D4AF37;">
                            <h4 style="color: var(--heading-color); margin-bottom: 5px; font-size: 1.1rem;"><?= \Core\Language::get('cl_mod1_title') ?></h4>
                            <p style="color: var(--text-secondary); font-size: 0.95rem; margin: 0;"><?= \Core\Language::get('cl_mod1_desc') ?></p>
                        </div>
                        <div style="background: var(--gray-light); padding: 20px 25px; border-radius: 8px; border-left: 4px solid var(--aqua-teal);">
                            <h4 style="color: var(--heading-color); margin-bottom: 5px; font-size: 1.1rem;"><?= \Core\Language::get('cl_mod2_title') ?></h4>
                            <p style="color: var(--text-secondary); font-size: 0.95rem; margin: 0;"><?= \Core\Language::get('cl_mod2_desc') ?></p>
                        </div>
                        <div style="background: var(--gray-light); padding: 20px 25px; border-radius: 8px; border-left: 4px solid var(--ocean-blue);">
                            <h4 style="color: var(--heading-color); margin-bottom: 5px; font-size: 1.1rem;"><?= \Core\Language::get('cl_mod3_title') ?></h4>
                            <p style="color: var(--text-secondary); font-size: 0.95rem; margin: 0;"><?= \Core\Language::get('cl_mod3_desc') ?></p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            
            <div style="flex: 1; min-width: 300px; text-align: center;">
                <div style="background: var(--deep-navy); padding: 50px 40px; border-radius: 16px; box-shadow: 0 15px 40px var(--shadow-heavy); color: #fff; position: relative; overflow: hidden;">
                    <!-- Graphic element inside card -->
                    <div style="position: absolute; top: -50px; right: -50px; width: 150px; height: 150px; background: rgba(212, 175, 55, 0.1); border-radius: 50%;"></div>
                    
                    <h3 style="font-size: 2rem; margin-bottom: 20px; font-family: 'Anton', sans-serif; letter-spacing: 1px; color: #D4AF37;"><?= \Core\Language::get('cl_join_title') ?></h3>
                    <p style="color: rgba(255,255,255,0.8); line-height: 1.6; margin-bottom: 30px;">
                        <?= \Core\Language::get('cl_join_desc') ?>
                    </p>
                    
                    <form action="<?= APP_URL ?>/apply" method="POST">
                        <input type="hidden" name="program_type" value="Creation Lab">
                        <button type="submit" class="btn" style="background: #D4AF37; color: var(--heading-color); width: 100%; padding: 15px; font-size: 1.1rem; border-radius: 30px;"><?= \Core\Language::get('cl_join_btn') ?></button>
                    </form>
                    <p style="margin-top: 15px; font-size: 0.85rem; color: rgba(255,255,255,0.5);"><?= \Core\Language::get('cl_join_note') ?></p>
                </div>
            </div>
        </div>
    </div>
</section>
