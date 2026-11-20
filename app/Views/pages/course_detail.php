<?php
$titleField = 'title_' . $lang;
$title = !empty($course[$titleField]) ? $course[$titleField] : $course['title'];

$contentField = 'content_' . $lang;
$content = !empty($course[$contentField]) ? $course[$contentField] : $course['content'];

$image = !empty($course['image']) ? APP_URL . '/uploads/' . $course['image'] : APP_URL . '/assets/images/placeholder.jpg';
?>

<!-- Premium Course Hero Section -->
<section class="section" style="padding-top: 150px; padding-bottom: 60px; background: var(--deep-navy); color: #fff; min-height: 40vh; display: flex; align-items: center; position: relative; overflow: hidden;">
    <div style="position: absolute; top:0; left:0; width:100%; height:100%; background: url('<?= $image ?>') center/cover no-repeat; opacity: 0.2; filter: blur(5px);"></div>
    <div style="position: absolute; top:0; left:0; width:100%; height:100%; background: linear-gradient(to right, rgba(0,11,33,0.95), rgba(0,11,33,0.7));"></div>
    
    <div class="container" style="position: relative; z-index: 2; display: flex; gap: 40px; align-items: center; flex-wrap: wrap;">
        <div style="flex: 1; min-width: 300px;">
            <span style="background: var(--ocean-blue); color: #fff; padding: 5px 12px; border-radius: 20px; font-size: 0.8rem; font-weight: bold; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 15px; display: inline-block;"><?= \Core\Language::get('education') ?></span>
            <h1 style="font-size: 3.5rem; color: #fff; line-height: 1.2; margin-bottom: 20px; text-shadow: 0 4px 15px rgba(0,0,0,0.5);"><?= htmlspecialchars($title) ?></h1>
            <p style="font-size: 1.2rem; color: rgba(255,255,255,0.8); line-height: 1.6; max-width: 600px;"><?= htmlspecialchars($meta_desc) ?></p>
        </div>
        
        <?php if(!empty($course['image'])): ?>
        <div style="flex: 1; min-width: 300px; text-align: center;">
            <img src="<?= $image ?>" alt="<?= htmlspecialchars($title) ?>" style="max-width: 100%; max-height: 350px; border-radius: 12px; box-shadow: 0 15px 40px var(--shadow-heavy); border: 2px solid rgba(255,255,255,0.1);">
        </div>
        <?php endif; ?>
    </div>
</section>

<!-- Course Content Section -->
<section class="section" style="padding: 60px 0; background: var(--gray-light);">
    <div class="container" style="max-width: 900px;">
        <div style="background: var(--card-bg); padding: 40px; border-radius: 12px; box-shadow: 0 10px 30px var(--shadow-light); color: var(--text-color); line-height: 1.8; font-size: 1.1rem;">
            <?= $content // Allow HTML if stored ?>
        </div>
        
        <div style="margin-top: 40px; text-align: center;">
            <a href="<?= APP_URL ?>/contact" class="btn" style="padding: 15px 40px; font-size: 1.2rem; border-radius: 30px;"><?= \Core\Language::get('apply_now') ?? 'Ä°ndi MÃ¼raciÉ™t Et' ?></a>
        </div>
    </div>
</section>

