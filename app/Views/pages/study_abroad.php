<?php
// CSRF token for the embedded consultation form
$csrf_token = \Core\Security::generateCsrfToken();
?>
<!-- Premium Hero Section for Study Abroad -->
<section class="premium-hero">
    <!-- Map Background -->
    <div class="premium-hero-bg" style="background: url('https://upload.wikimedia.org/wikipedia/commons/8/80/World_map_-_low_resolution.svg') center/cover no-repeat; filter: invert(1); opacity:0.15;"></div>
    <div class="premium-hero-bg" style="background: linear-gradient(to right, rgba(0,11,33,1) 30%, rgba(0,11,33,0.5));"></div>
    
    <div class="container" style="position: relative; z-index: 2;">
        <div style="max-width: 600px;">
            <div class="hero-badge">
                <?= \Core\Language::get('sa_badge') ?? 'Sərhədsiz Təhsil' ?>
            </div>
            <h1><?= \Core\Language::get('study_abroad') ?></h1>
            <p class="hero-desc">
                <?= \Core\Language::get('sa_hero_desc') ?? 'ABŞ, Avropa və Asiyanın ən nüfuzlu universitetlərində təhsil almaq xəyalınızı bizimlə reallaşdırın. Tam sənədləşmə və viza dəstəyi.' ?>
            </p>
            <div style="display: flex; gap: 15px; flex-wrap: wrap;">
                <a href="#consultation" class="btn" style="background: transparent; border: 2px solid #fff; padding: 13px 35px; font-size: 1.1rem; border-radius: 30px;"><?= \Core\Language::get('sa_contact_btn') ?></a>
            </div>
        </div>
    </div>
</section>

<!-- Step by Step Process -->
<section style="padding: 100px 0; background: var(--card-bg);">
    <div class="container">
        <div style="text-align: center; margin-bottom: 60px;">
            <h2 class="section-title"><?= \Core\Language::get('sa_process_title') ?></h2>
            <p style="font-size: 1.1rem; color: var(--text-secondary);"><?= \Core\Language::get('sa_process_desc') ?></p>
        </div>
        
        <div style="display: flex; flex-wrap: wrap; gap: 30px; justify-content: center; position: relative;">
            <div style="position: absolute; top: 40px; left: 10%; right: 10%; height: 2px; background: rgba(76,162,181,0.2); z-index: 1;" class="hide-on-mobile"></div>
            
            <?php 
            $steps = [
                1 => ['title' => \Core\Language::get('sa_step1_title'), 'desc' => \Core\Language::get('sa_step1_desc')],
                2 => ['title' => \Core\Language::get('sa_step2_title'), 'desc' => \Core\Language::get('sa_step2_desc')],
                3 => ['title' => \Core\Language::get('sa_step3_title'), 'desc' => \Core\Language::get('sa_step3_desc')],
                4 => ['title' => \Core\Language::get('sa_step4_title'), 'desc' => \Core\Language::get('sa_step4_desc')]
            ];
            foreach($steps as $num => $step): 
            ?>
            <div class="process-step-container" style="flex: 1; min-width: 220px; text-align: center; position: relative; z-index: 2; cursor: pointer;" onclick="openStepPopup('<?= htmlspecialchars($step['title']) ?>', '<?= htmlspecialchars($step['desc']) ?>')">
                <div class="process-step-circle"><?= $num ?></div>
                <h3 style="color: var(--heading-color); margin-bottom: 10px; font-size: 1.3rem;"><?= $step['title'] ?></h3>
                <p class="process-step-desc"><?= $step['desc'] ?></p>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Step Popup Modal -->
<div id="stepPopupOverlay" style="position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,11,33,0.8); z-index:10000; display:flex; align-items:center; justify-content:center; opacity:0; visibility:hidden; transition:all 0.3s ease; backdrop-filter: blur(5px);">
    <div id="stepPopupBox" style="background: var(--card-bg); width:90%; max-width:450px; border-radius:16px; padding: 40px; text-align:center; transform:scale(0.9); transition:all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275); position:relative; box-shadow: 0 15px 40px var(--shadow-heavy);">
        <button onclick="closeStepPopup()" style="position:absolute; top:15px; right:15px; background:rgba(0,0,0,0.05); border:none; width:36px; height:36px; border-radius:50%; font-size:1.5rem; color: var(--heading-color); cursor:pointer; display:flex; align-items:center; justify-content:center; transition: background 0.3s;">&times;</button>
        <div style="width: 60px; height: 60px; background: rgba(76,162,181,0.1); color: var(--aqua-teal); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 20px;">
            <svg width="28" height="28" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
        </div>
        <h3 id="stepPopupTitle" style="color: var(--heading-color); font-size: 1.5rem; margin-bottom: 15px; font-family: var(--font-heading);"></h3>
        <p id="stepPopupDesc" style="color: var(--text-secondary); font-size: 1.05rem; line-height: 1.6;"></p>
    </div>
</div>

<script>
function openStepPopup(title, desc) {
    document.getElementById('stepPopupTitle').innerText = title;
    document.getElementById('stepPopupDesc').innerText = desc;
    const overlay = document.getElementById('stepPopupOverlay');
    const box = document.getElementById('stepPopupBox');
    overlay.style.visibility = 'visible';
    overlay.style.opacity = '1';
    box.style.transform = 'scale(1)';
}

function closeStepPopup() {
    const overlay = document.getElementById('stepPopupOverlay');
    const box = document.getElementById('stepPopupBox');
    overlay.style.opacity = '0';
    overlay.style.visibility = 'hidden';
    box.style.transform = 'scale(0.9)';
}

document.getElementById('stepPopupOverlay').addEventListener('click', function(e) {
    if (e.target === this) {
        closeStepPopup();
    }
});
</script>

<!-- Dynamic Countries List -->
<section id="countries" style="padding: 100px 0; background: var(--gray-light);">
    <div class="container">
        <div style="text-align: center; margin-bottom: 60px;">
            <h2 class="section-title"><?= \Core\Language::get('sa_countries_title') ?></h2>
            <p style="font-size: 1.1rem; color: var(--text-secondary);"><?= \Core\Language::get('sa_countries_desc') ?></p>
        </div>
        
        <?php if(empty($records)): ?>
            <div style="background: var(--card-bg); padding: 50px; border-radius: 16px; text-align: center; box-shadow: 0 10px 30px var(--shadow-light);">
                <p style="font-size: 1.2rem; color: var(--text-secondary);"><?= \Core\Language::get('sa_no_info') ?></p>
            </div>
        <?php else: ?>
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 40px;">
                <?php foreach($records as $r): ?>
                    <div style="background: var(--card-bg); border-radius:16px; box-shadow: 0 10px 30px var(--shadow-light); overflow: hidden; transition: transform 0.3s; display: flex; flex-direction: column;" onmouseover="this.style.transform='translateY(-10px)'" onmouseout="this.style.transform='translateY(0)'">
                        
                        <div style="padding: 30px 30px 0; display:flex; justify-content:space-between; align-items:flex-start;">
                            <h2 style="color: var(--heading-color); margin: 0; font-size: 2.2rem; font-weight:900;"><?= htmlspecialchars($r['country']) ?></h2>
                            <svg width="40" height="40" fill="none" stroke="var(--aqua-teal)" stroke-width="1.5" viewBox="0 0 24 24" style="opacity:0.3;"><path d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        </div>
                        
                        <div style="padding: 30px; display: flex; flex-direction: column; gap: 20px; flex-grow: 1;">
                            <?php if(!empty($r['universities'])): ?>
                            <div>
                                <h4 style="color:var(--ocean-blue); margin-bottom: 8px; font-size:1.1rem; border-bottom: 1px solid var(--border-color); padding-bottom:5px;"><?= \Core\Language::get('sa_universities') ?></h4>
                                <div style="font-size: 0.95rem; color: var(--text-secondary); line-height:1.6;"><?= $r['universities'] ?></div>
                            </div>
                            <?php endif; ?>

                            <?php if(!empty($r['required_docs'])): ?>
                            <div>
                                <h4 style="color:var(--ocean-blue); margin-bottom: 8px; font-size:1.1rem; border-bottom: 1px solid var(--border-color); padding-bottom:5px;"><?= \Core\Language::get('sa_req_docs') ?></h4>
                                <div style="font-size: 0.95rem; color: var(--text-secondary); line-height:1.6;"><?= $r['required_docs'] ?></div>
                            </div>
                            <?php endif; ?>
                            
                            <div style="margin-top: auto; padding-top:20px;">
                                <form action="<?= APP_URL ?>/apply" method="POST" style="margin: 0;">
                                    <input type="hidden" name="program_type" value="Xaricdə Təhsil - <?= htmlspecialchars($r['country']) ?>">
                                    <button type="submit" class="btn" style="width: 100%; display:block; text-align:center; padding: 12px; font-size: 1.05rem;"><?= \Core\Language::get('sa_apply_country') ?></button>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>

<!-- Dedicated Consultation Form -->
<section id="consultation" style="padding: 100px 0; background: var(--deep-navy); color: #fff;">
    <div class="container">
        <div style="max-width: 700px; margin: 0 auto; text-align: center;">
            <h2 style="font-size: 2.5rem; margin-bottom: 20px; color: #fff;"><?= \Core\Language::get('sa_consult_title') ?></h2>
            <p style="font-size: 1.15rem; color: rgba(255,255,255,0.8); margin-bottom: 40px;"><?= \Core\Language::get('sa_consult_desc') ?></p>
        </div>
        
        <div style="max-width: 600px; margin: 0 auto;">
            <form class="glass-form-container" action="<?= APP_URL ?>/contact" method="POST" style="text-align: left;">
                <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($csrf_token) ?>">
                <input type="hidden" name="subject" value="Xaricdə Təhsil Konsultasiyası">
                
                <div style="margin-bottom: 25px;">
                    <label style="display: block; margin-bottom: 8px; color: #fff; font-weight: 600;"><?= \Core\Language::get('form_fullname') ?></label>
                    <input type="text" name="name" class="glass-input" required>
                    <input type="hidden" name="surname" value="-"> <!-- Required by contact controller -->
                </div>
                
                <div style="margin-bottom: 20px;">
                    <label style="display: block; margin-bottom: 8px; color: #fff; font-weight: 600;"><?= \Core\Language::get('form_email') ?></label>
                    <input type="email" name="email" class="glass-input" required>
                </div>

                <div style="margin-bottom: 20px;">
                    <label style="display: block; margin-bottom: 8px; color: #fff; font-weight: 600;"><?= \Core\Language::get('form_phone') ?></label>
                    <input type="text" name="phone" class="glass-input" required>
                </div>

                <div style="margin-bottom: 30px;">
                    <label style="display: block; margin-bottom: 8px; color: #fff; font-weight: 600;"><?= \Core\Language::get('form_message_sa') ?></label>
                    <textarea name="message" rows="4" class="glass-input" style="resize: vertical;"></textarea>
                </div>

                <button type="submit" class="btn-glow" style="width: 100%; padding: 16px; font-size: 1.1rem; border-radius: 30px;"><?= \Core\Language::get('form_submit_sa') ?></button>
            </form>
        </div>
    </div>
</section>
<style>
.process-step-container {
    transition: transform 0.3s ease;
}
.process-step-container:hover {
    transform: translateY(-5px);
}
.process-step-circle {
    width: 80px; height: 80px;
    background: var(--card-bg);
    border: 3px solid rgba(76,162,181,0.3);
    border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    margin: 0 auto 20px;
    font-size: 2rem; font-weight: bold;
    color: var(--heading-color);
    box-shadow: 0 10px 30px var(--shadow-light);
    transition: all 0.4s ease;
}
.process-step-container:hover .process-step-circle {
    background: var(--aqua-teal);
    border-color: var(--aqua-teal);
    color: #fff;
    box-shadow: 0 15px 30px rgba(76,162,181,0.4);
    transform: scale(1.05);
}
.process-step-desc {
    color: var(--text-secondary);
    font-size: 0.95rem;
    line-height: 1.6;
    opacity: 0.8;
}
@media (max-width: 768px) {
    .hide-on-mobile { display: none !important; }
}
</style>
