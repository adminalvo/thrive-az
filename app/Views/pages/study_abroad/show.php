<section class="section" style="background: linear-gradient(135deg, var(--deep-navy, #001f3f) 0%, var(--ocean-blue, #0074D9) 100%); padding: 150px 0 60px; color: #fff; text-align: center;">
    <div class="container">
        <div style="display: inline-block; background: rgba(76,162,181,0.2); padding: 8px 20px; border-radius: 30px; font-size: 0.9rem; font-weight: 600; text-transform: uppercase; letter-spacing: 1px; color: var(--aqua-teal); margin-bottom: 20px; backdrop-filter: blur(5px);">
            <i class="fas fa-map-marker-alt"></i> <?= htmlspecialchars($university['country_name']) ?>
        </div>
        <h1 style="font-size: 3rem; margin-bottom: 20px; font-weight: 700; color: #fff; text-shadow: 0 4px 15px rgba(0,0,0,0.5);"><?= htmlspecialchars($university['name']) ?></h1>
        <div style="display: flex; justify-content: center; gap: 30px; flex-wrap: wrap;">
            <?php if($university['ranking']): ?>
                <span style="font-size: 1.1rem; text-shadow: 0 2px 5px rgba(0,0,0,0.5);"><i class="fas fa-trophy" style="color: #f59e0b; margin-right: 8px;"></i> <?= htmlspecialchars($university['ranking']) ?> <?= \Core\Language::get('study_abroad_world_ranking') ?></span>
            <?php endif; ?>
            <?php if($university['avg_tuition_fee']): ?>
                <span style="font-size: 1.1rem; text-shadow: 0 2px 5px rgba(0,0,0,0.5);"><i class="fas fa-money-bill-wave" style="color: #10b981; margin-right: 8px;"></i> <?= htmlspecialchars($university['avg_tuition_fee']) ?> <?= \Core\Language::get('study_abroad_per_year') ?></span>
            <?php endif; ?>
        </div>
    </div>
</section>

<section class="section" style="padding: 80px 0; background: var(--input-bg);">
    <div class="container">
        <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 40px;">
            
            <!-- Left Column: Details -->
            <div style="min-width: 0;">
                <div style="background: var(--card-bg); padding: 40px; border-radius: 16px; box-shadow: 0 10px 30px var(--shadow-light); margin-bottom: 30px;">
                    <h2 style="color: var(--heading-color); margin-top: 0; margin-bottom: 20px; font-size: 1.8rem;"><?= \Core\Language::get('study_abroad_about') ?></h2>
                    <p style="color: #475569; font-size: 1.1rem; line-height: 1.8;">
                        <?php 
                        $lang = \Core\Language::current();
                        $desc = $university['description'];
                        if($lang == 'en' && !empty($university['description_en'])) $desc = $university['description_en'];
                        if($lang == 'ru' && !empty($university['description_ru'])) $desc = $university['description_ru'];
                        echo nl2br(htmlspecialchars($desc ?: \Core\Language::get('study_abroad_no_info')));
                        ?>
                    </p>
                </div>

                <div style="background: var(--card-bg); padding: 40px; border-radius: 16px; box-shadow: 0 10px 30px var(--shadow-light);">
                    <h2 style="color: var(--heading-color); margin-top: 0; margin-bottom: 20px; font-size: 1.8rem;"><?= \Core\Language::get('study_abroad_majors') ?></h2>
                    <div style="display: flex; flex-wrap: wrap; gap: 15px;">
                        <?php 
                        $majors = [];
                        try {
                            if($university['majors']) {
                                $majors = json_decode($university['majors'], true);
                            }
                        } catch(\Exception $e) {}
                        
                        if(!empty($majors) && is_array($majors)):
                            foreach($majors as $m):
                        ?>
                            <span style="background: rgba(76,162,181,0.1); color: var(--aqua-teal); padding: 10px 20px; border-radius: 8px; font-weight: 600;">
                                <i class="fas fa-graduation-cap" style="margin-right: 8px;"></i> <?= htmlspecialchars($m) ?>
                            </span>
                        <?php 
                            endforeach;
                        else:
                        ?>
                            <p style="color: var(--text-secondary);">Məlumat yoxdur.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <!-- Right Column: Sidebar CTA -->
            <div>
                <div style="background: var(--card-bg); padding: 40px; border-radius: 16px; box-shadow: 0 10px 30px var(--shadow-light); position: sticky; top: 100px;">
                    <h3 style="color: var(--heading-color); margin-top: 0; margin-bottom: 15px; font-size: 1.5rem; line-height: 1.3;"><?= \Core\Language::get('study_abroad_want_to_apply') ?></h3>
                    <p style="color: var(--text-secondary); margin-bottom: 25px; line-height: 1.6;">
                        <?= \Core\Language::get('study_abroad_apply_desc') ?>
                    </p>
                    <a href="<?= APP_URL ?>/book" class="btn btn-glow" style="width: 100%; display: block; text-align: center; padding: 15px; font-size: 1.1rem; margin-bottom: 15px;">
                        <i class="fas fa-calendar-check" style="margin-right: 8px;"></i> <?= \Core\Language::get('study_abroad_book') ?>
                    </a>
                    <a href="<?= APP_URL ?>/study-abroad" class="btn-text" style="display: block; text-align: center; width: 100%;"><i class="fas fa-arrow-left"></i> <?= \Core\Language::get('study_abroad_all_unis') ?></a>
                </div>
            </div>

        </div>
    </div>
</section>
