<?php
$lang = \Core\Language::current();
?>
<!-- Ultra Premium Hero Section for Education -->
<section style="position: relative; background: var(--deep-navy); color: #fff; padding: 200px 0 100px; overflow: hidden; text-align: center;">
    <div class="container" style="position: relative; z-index: 2; max-width: 900px;">
        <div style="display: inline-block; padding: 8px 16px; background: rgba(76, 162, 181, 0.15); border: 1px solid rgba(76, 162, 181, 0.3); border-radius: 30px; color: var(--aqua-teal); font-weight: 600; margin-bottom: 20px; font-size: 0.9rem; text-transform: uppercase; letter-spacing: 1px;">
            <?= \Core\Language::get('education_badge') ?? 'Gələcəyinizi Bizimlə Qurun' ?>
        </div>
        <h1 style="font-size: 3.5rem; line-height: 1.2; margin-bottom: 20px; font-weight: 700; color: #fff;"><?= \Core\Language::get('education') ?></h1>
        <p style="font-size: 1.2rem; color: rgba(255,255,255,0.8); line-height: 1.7; margin-bottom: 40px; margin-left: auto; margin-right: auto;">
            <?= \Core\Language::get('edu_hero_desc') ?? 'SAT və IELTS imtahanlarında ən yüksək nəticəni əldə etmək üçün beynəlxalq dərəcəli müəllimlərimizlə hazırlaşın.' ?>
        </p>
        <div style="display: flex; gap: 20px; justify-content: center; flex-wrap: wrap;">
            <a href="#courses" class="btn" style="background: var(--aqua-teal); color: #fff; padding: 14px 35px; font-size: 1.1rem; border-radius: 8px; font-weight: 600; transition: transform 0.3s;"><?= \Core\Language::get('view_courses') ?? 'Kurslara Bax' ?></a>
            <a href="<?= APP_URL ?>/contact" class="btn" style="background: transparent; color: #fff; border: 2px solid rgba(255,255,255,0.3); padding: 12px 35px; font-size: 1.1rem; border-radius: 8px; font-weight: 600; transition: all 0.3s;" onmouseover="this.style.background='rgba(255,255,255,0.1)'" onmouseout="this.style.background='transparent'"><?= \Core\Language::get('consultation') ?? 'Konsultasiya' ?></a>
        </div>
    </div>
</section>

<!-- Stats / Highlights Row -->
<section style="padding: 40px 0; background: var(--card-bg); border-bottom: 1px solid #f1f5f9;">
    <div class="container">
        <div style="display: flex; flex-wrap: wrap; justify-content: center; gap: 40px; text-align: center;">
            <div style="flex: 1; min-width: 200px;">
                <div style="font-size: 2.5rem; font-weight: 700; color: var(--aqua-teal); margin-bottom: 5px;">98%</div>
                <div style="color: var(--text-secondary); font-weight: 500;"><?= \Core\Language::get('edu_acceptance_rate') ?></div>
            </div>
            <div style="flex: 1; min-width: 200px; border-left: 1px solid #e2e8f0; border-right: 1px solid #e2e8f0;">
                <div style="font-size: 2.5rem; font-weight: 700; color: var(--ocean-blue); margin-bottom: 5px;">50+</div>
                <div style="color: var(--text-secondary); font-weight: 500;"><?= \Core\Language::get('edu_foreign_uni') ?></div>
            </div>
            <div style="flex: 1; min-width: 200px;">
                <div style="font-size: 2.5rem; font-weight: 700; color: var(--aqua-teal); margin-bottom: 5px;">100%</div>
                <div style="color: var(--text-secondary); font-weight: 500;"><?= \Core\Language::get('edu_personal_approach') ?></div>
            </div>
        </div>
    </div>
</section>

<!-- Why Choose Us Features -->
<section style="padding: 80px 0; background: var(--input-bg);">
    <div class="container">
        <div style="text-align: center; margin-bottom: 50px;">
            <h2 style="font-size: 2.2rem; color: var(--heading-color); font-weight: 700;"><?= \Core\Language::get('why_us_title') ?? 'Niyə Thrive Education?' ?></h2>
        </div>
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 30px;">
            <!-- Feature 1 -->
            <div style="background: var(--card-bg); padding: 40px 30px; border-radius: 16px; box-shadow: 0 10px 30px rgba(0,0,0,0.03); text-align: left; transition: transform 0.3s;">
                <div style="width: 60px; height: 60px; background: rgba(76, 162, 181, 0.1); border-radius: 12px; display: flex; align-items: center; justify-content: center; margin-bottom: 20px; color: var(--aqua-teal);">
                    <svg width="30" height="30" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/></svg>
                </div>
                <h3 style="color: var(--heading-color); margin-bottom: 15px; font-size:1.3rem; font-weight: 600;"><?= \Core\Language::get('edu_feat1_title') ?></h3>
                <p style="color: var(--text-secondary); line-height:1.7;"><?= \Core\Language::get('edu_feat1_new_desc') ?></p>
            </div>
            <!-- Feature 2 -->
            <div style="background: var(--card-bg); padding: 40px 30px; border-radius: 16px; box-shadow: 0 10px 30px rgba(0,0,0,0.03); text-align: left; transition: transform 0.3s;">
                <div style="width: 60px; height: 60px; background: rgba(0, 63, 130, 0.1); border-radius: 12px; display: flex; align-items: center; justify-content: center; margin-bottom: 20px; color: var(--ocean-blue);">
                    <svg width="30" height="30" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                <h3 style="color: var(--heading-color); margin-bottom: 15px; font-size:1.3rem; font-weight: 600;"><?= \Core\Language::get('edu_feat2_title') ?></h3>
                <p style="color: var(--text-secondary); line-height:1.7;"><?= \Core\Language::get('edu_feat2_new_desc') ?></p>
            </div>
            <!-- Feature 3 -->
            <div style="background: var(--card-bg); padding: 40px 30px; border-radius: 16px; box-shadow: 0 10px 30px rgba(0,0,0,0.03); text-align: left; transition: transform 0.3s;">
                <div style="width: 60px; height: 60px; background: rgba(0, 11, 33, 0.1); border-radius: 12px; display: flex; align-items: center; justify-content: center; margin-bottom: 20px; color: var(--heading-color);">
                    <svg width="30" height="30" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M13 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V9zM13 2v7h7"/></svg>
                </div>
                <h3 style="color: var(--heading-color); margin-bottom: 15px; font-size:1.3rem; font-weight: 600;"><?= \Core\Language::get('edu_feat3_title') ?></h3>
                <p style="color: var(--text-secondary); line-height:1.7;"><?= \Core\Language::get('edu_feat3_new_desc') ?></p>
            </div>
        </div>
    </div>
</section>

<!-- Dynamic Courses Grid -->
<section id="courses" style="padding: 80px 0; background: var(--card-bg);">
    <div class="container">
        <div style="text-align: center; margin-bottom: 50px;">
            <h2 style="font-size: 2.2rem; color: var(--heading-color); font-weight: 700; margin-bottom: 10px;"><?= \Core\Language::get('edu_subtitle') ?></h2>
            <p style="font-size: 1.1rem; color: var(--text-secondary);"><?= \Core\Language::get('edu_subdesc') ?></p>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 30px;">
            <?php 
            if(!empty($courses)): 
                foreach($courses as $course): 
                    $titleField = 'title_' . $lang;
                    $title = !empty($course[$titleField]) ? $course[$titleField] : $course['title'];
                    $descField = 'short_desc_' . $lang;
                    $desc = !empty($course[$descField]) ? $course[$descField] : $course['short_desc'];
                    $image = !empty($course['image']) ? APP_URL . '/uploads/' . $course['image'] : 'https://images.unsplash.com/photo-1523240795612-9a054b0db644?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80';
                    $slug = $course['slug'] ?? $course['id'];
                    $url = APP_URL . '/education/' . htmlspecialchars($slug);
            ?>
            <a href="<?= $url ?>" style="text-decoration:none; display:block; transition: transform 0.3s;" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='translateY(0)'">
                <div style="background: var(--card-bg); border-radius: 16px; border: 1px solid var(--border-color); box-shadow: 0 10px 25px rgba(0,0,0,0.03); overflow: hidden; height: 100%; display: flex; flex-direction: column;">
                    <div style="height: 200px; background: url('<?= $image ?>') center/cover no-repeat; position: relative; border-bottom: 1px solid #f1f5f9;">
                    </div>
                    <div style="padding: 25px; display: flex; flex-direction: column; flex-grow: 1;">
                        <h3 style="margin: 0 0 10px 0; color: var(--heading-color); font-size: 1.4rem; font-weight: 600;"><?= htmlspecialchars($title) ?></h3>
                        <p style="color: var(--text-secondary); line-height: 1.6; margin: 0 0 20px 0; flex-grow: 1; font-size: 1rem;"><?= htmlspecialchars($desc) ?></p>
                        <div style="display: flex; align-items: center; color: var(--ocean-blue); font-weight: 600; font-size: 0.95rem; text-transform: uppercase; letter-spacing: 0.5px;">
                            <?= \Core\Language::get('read_more') ?? 'Daha Ətraflı' ?> 
                            <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" style="margin-left:5px;"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                        </div>
                    </div>
                </div>
            </a>
            <?php 
                endforeach; 
            else:
            ?>
                <div style="grid-column: 1 / -1; text-align: center; padding: 50px; background: var(--input-bg); border-radius:12px; border: 1px dashed #cbd5e1;">
                    <p style="color: var(--text-secondary); font-size: 1.1rem; margin: 0;"><?= \Core\Language::get('edu_no_courses') ?></p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

