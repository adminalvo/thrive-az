<!-- Dynamic Page Rendering -->
<div class="dynamic-page">
    <?php if(!empty($blocks)): ?>
        <?php foreach($blocks as $block): ?>
            <?php 
                $content = $block['content'];
                $type = $block['type'];
            ?>
            
            <?php if($type === 'hero'): ?>
                <section class="hero-block" style="background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('<?= htmlspecialchars($content['image']) ?>') center/cover; padding: 100px 0; text-align: center; color: #fff;">
                    <div class="container" data-aos="fade-up">
                        <h1 style="font-size: 3.5rem; font-weight: 800; margin-bottom: 20px; font-family: var(--font-heading);"><?= htmlspecialchars($content['title']) ?></h1>
                        <p style="font-size: 1.2rem; max-width: 700px; margin: 0 auto 30px; opacity: 0.9;"><?= htmlspecialchars($content['desc']) ?></p>
                        <?php if(!empty($content['btn_text']) && !empty($content['btn_link'])): ?>
                            <a href="<?= htmlspecialchars($content['btn_link']) ?>" class="btn-primary" style="padding: 15px 30px; font-size: 1.1rem; border-radius: 50px;"><?= htmlspecialchars($content['btn_text']) ?></a>
                        <?php endif; ?>
                    </div>
                </section>
            
            <?php elseif($type === 'text_image'): ?>
                <section class="text-image-block" style="padding: 80px 0;">
                    <div class="container">
                        <div style="display: flex; flex-wrap: wrap; align-items: center; gap: 40px; flex-direction: <?= $content['image_pos'] === 'left' ? 'row-reverse' : 'row' ?>;">
                            <div style="flex: 1; min-width: 300px;" data-aos="fade-right">
                                <h2 style="font-size: 2.5rem; color: var(--heading-color); margin-bottom: 20px; font-family: var(--font-heading);"><?= htmlspecialchars($content['title']) ?></h2>
                                <div style="color: var(--text-color); line-height: 1.8; font-size: 1.05rem;">
                                    <?= $content['text'] /* HTML is allowed here */ ?>
                                </div>
                            </div>
                            <div style="flex: 1; min-width: 300px;" data-aos="fade-left">
                                <img src="<?= htmlspecialchars($content['image']) ?>" alt="<?= htmlspecialchars($content['title']) ?>" style="width: 100%; border-radius: 16px; box-shadow: 0 15px 40px var(--shadow-heavy);">
                            </div>
                        </div>
                    </div>
                </section>
                
            <?php elseif($type === 'custom_html'): ?>
                <section class="custom-html-block">
                    <?= $content['html'] ?>
                </section>
            <?php endif; ?>
            
        <?php endforeach; ?>
    <?php else: ?>
        <div class="container" style="padding: 100px 0; text-align: center;">
            <p>Bu səhifədə hələ məlumat yoxdur.</p>
        </div>
    <?php endif; ?>
</div>
