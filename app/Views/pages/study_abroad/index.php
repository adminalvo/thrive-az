<style>
.uni-card:hover { transform: translateY(-10px); box-shadow: 0 15px 40px var(--shadow-heavy); }
</style>
<section class="section" style="background: linear-gradient(135deg, var(--deep-navy) 0%, var(--ocean-blue) 100%); padding: 200px 0 80px; color: #fff; text-align: center;">
    <div class="container">
        <h1 style="color: #fff; font-size: 2.5rem; margin-bottom: 20px; font-weight: 700;"><?= \Core\Language::get('study_abroad_title') ?></h1>
        <p style="color: #fff; font-size: 1.1rem; max-width: 600px; margin: 0 auto; opacity: 0.9;"><?= \Core\Language::get('study_abroad_subtitle') ?></p>
    </div>
</section>

<section class="section" style="padding: 60px 0; background: var(--input-bg); min-height: 60vh;">
    <div class="container">
        
        <!-- Filter Panel -->
        <div style="background: var(--card-bg); padding: 25px; border-radius: 12px; box-shadow: 0 10px 30px var(--shadow-light); margin-bottom: 40px;">
            <form action="<?= APP_URL ?>/study-abroad" method="GET" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px; align-items: end;">
                <div>
                    <label style="display: block; margin-bottom: 8px; font-weight: 600; color: var(--heading-color);"><?= \Core\Language::get('study_abroad_country') ?></label>
                    <select name="country" style="width: 100%; padding: 12px; border: 1px solid var(--input-border); border-radius: 8px; background: var(--input-bg);">
                        <option value=""><?= \Core\Language::get('study_abroad_all_countries') ?></option>
                        <?php foreach($countries as $c): ?>
                            <option value="<?= $c['id'] ?>" <?= $filters['country'] == $c['id'] ? 'selected' : '' ?>><?= htmlspecialchars($c['name']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div>
                    <label style="display: block; margin-bottom: 8px; font-weight: 600; color: var(--heading-color);"><?= \Core\Language::get('study_abroad_major') ?></label>
                    <input type="text" name="major" value="<?= htmlspecialchars($filters['major']) ?>" placeholder="<?= \Core\Language::get('study_abroad_major_placeholder') ?>" style="width: 100%; padding: 12px; border: 1px solid var(--input-border); border-radius: 8px; background: var(--input-bg);">
                </div>
                <div>
                    <button type="submit" class="btn btn-primary" style="width: 100%; padding: 12px; border-radius: 8px; border: none; font-size: 1rem;"><i class="fas fa-search"></i> <?= \Core\Language::get('study_abroad_search') ?></button>
                </div>
            </form>
        </div>

        <!-- Catalog Grid -->
        <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(320px, 1fr)); gap: 30px;">
            <?php if(empty($universities)): ?>
                <div style="grid-column: 1 / -1; text-align: center; padding: 50px; background: var(--card-bg); border-radius: 12px;">
                    <i class="fas fa-search" style="font-size: 3rem; color: #cbd5e1; margin-bottom: 20px;"></i>
                    <h3 style="color: var(--heading-color); margin:0;"><?= \Core\Language::get('study_abroad_not_found') ?></h3>
                    <p style="color: var(--text-secondary); margin-top: 10px;"><?= \Core\Language::get('study_abroad_not_found_desc') ?></p>
                </div>
            <?php else: ?>
                <?php foreach($universities as $u): ?>
                    <div class="uni-card" style="background: var(--card-bg); border-radius: 16px; overflow: hidden; box-shadow: 0 10px 30px var(--shadow-light); transition: all 0.3s; display: flex; flex-direction: column;">
                        <div style="height: 200px; background-image: url('<?= APP_URL ?><?= htmlspecialchars($u['image_url'] ?? '/assets/images/default-uni.jpg') ?>'); background-size: cover; background-position: center; position: relative;">
                            <?php if($u['is_featured']): ?>
                                <span style="position: absolute; top: 15px; right: 15px; background: #f59e0b; color: #fff; padding: 5px 12px; border-radius: 20px; font-size: 0.8rem; font-weight: bold;"><i class="fas fa-star"></i> <?= \Core\Language::get('study_abroad_top_choice') ?></span>
                            <?php endif; ?>
                        </div>
                        <div style="padding: 25px; flex: 1; display: flex; flex-direction: column;">
                            <div style="color: var(--aqua-teal); font-size: 0.85rem; font-weight: 600; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 8px;">
                                <i class="fas fa-map-marker-alt"></i> <?= htmlspecialchars($u['country_name']) ?>
                            </div>
                            <h3 style="margin: 0 0 15px; color: var(--heading-color); font-size: 1.3rem; line-height: 1.4;"><?= htmlspecialchars($u['name']) ?></h3>
                            
                            <div style="margin-bottom: 20px; flex: 1;">
                                <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 8px; color: #475569; font-size: 0.95rem;">
                                    <i class="fas fa-money-bill-wave" style="color: #10b981; width: 20px; text-align: center;"></i> 
                                    <?= htmlspecialchars($u['avg_tuition_fee'] ?: \Core\Language::get('study_abroad_no_info')) ?> <?= \Core\Language::get('study_abroad_per_year') ?>
                                </div>
                                <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 8px; color: #475569; font-size: 0.95rem;">
                                    <i class="fas fa-trophy" style="color: #eab308; width: 20px; text-align: center;"></i> 
                                    <?= \Core\Language::get('study_abroad_ranking') ?> <?= htmlspecialchars($u['ranking'] ?: \Core\Language::get('study_abroad_no_info')) ?>
                                </div>
                            </div>
                            
                            <a href="<?= APP_URL ?>/study-abroad/university/<?= $u['id'] ?>" class="btn-outline" style="text-align: center; width: 100%; border-radius: 8px; padding: 12px;"><?= \Core\Language::get('study_abroad_view_uni') ?></a>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>

    </div>
</section>
