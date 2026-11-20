<?php
    $lang = $_SESSION['lang'] ?? 'az';
    $title = $lang == 'az' ? $blog['title'] : ($blog['title_'.$lang] ?: $blog['title']);
    $content = $lang == 'az' ? $blog['content'] : ($blog['content_'.$lang] ?: $blog['content']);
?>
<section class="section" style="padding-top: 50px;">
    <div class="container" style="max-width: 800px;">
        <a href="<?= APP_URL ?>/blog" style="display:inline-block; margin-bottom: 20px; color:var(--primary); font-weight:bold;">← <?= \Core\Language::get('blog') ?? 'Bütün Məqalələr' ?></a>

        <h1 style="color:var(--heading-color); font-size:clamp(1.8rem, 4vw, 2.5rem); margin-bottom:15px; line-height: 1.3;"><?= htmlspecialchars($title) ?></h1>
        <p style="color:var(--aqua-teal); font-weight:bold; margin-bottom: 30px;"><?= date('d M Y', strtotime($blog['created_at'])) ?> • <?= $blog['views'] ?> baxış</p>
        
        <?php if($blog['cover_image']): ?>
            <img src="<?= APP_URL ?>/uploads/<?= htmlspecialchars($blog['cover_image']) ?>" alt="<?= htmlspecialchars($title) ?>" style="width:100%; border-radius:12px; margin-bottom:30px; box-shadow: 0 10px 30px var(--shadow-heavy);">
        <?php endif; ?>

        <!-- SEO Article Schema -->
        <script type="application/ld+json">
        {
          "@context": "https://schema.org",
          "@type": "Article",
          "headline": <?= json_encode($title, JSON_UNESCAPED_UNICODE) ?>,
          "image": [
            <?= json_encode(APP_URL . '/uploads/' . ($blog['cover_image'] ?? ''), JSON_UNESCAPED_UNICODE) ?>
          ],
          "datePublished": <?= json_encode(date('c', strtotime($blog['created_at'] ?? 'now')), JSON_UNESCAPED_UNICODE) ?>,
          "author": {
            "@type": "Organization",
            "name": "Thrive Education Center",
            "url": "https://thrive.az"
          },
          "publisher": {
            "@type": "Organization",
            "name": "Thrive Education Center",
            "logo": {
              "@type": "ImageObject",
              "url": "https://thrive.az/assets/images/logo.png"
            }
          }
        }
        </script>

        <div class="rich-text-content" style="font-size: 1.1rem; line-height: 1.8; color: var(--text-primary);">
            <?= $content ?>
        </div>
    </div>
</section>

<style>
/* Rich text content styles */
.rich-text-content img { max-width: 100%; height: auto; border-radius: 8px; margin: 20px 0; }
.rich-text-content h2, .rich-text-content h3 { color: var(--heading-color); margin-top: 30px; margin-bottom: 15px; }
.rich-text-content p { margin-bottom: 20px; }
.rich-text-content ul {
    list-style-type: disc !important;
    margin: 15px 0 20px 28px !important;
    padding-left: 6px !important;
}
.rich-text-content ol {
    list-style-type: decimal !important;
    margin: 15px 0 20px 28px !important;
    padding-left: 6px !important;
}
.rich-text-content li {
    display: list-item !important;
    margin-bottom: 8px !important;
    line-height: 1.75 !important;
}
.rich-text-content ul ul {
    list-style-type: circle !important;
    margin: 6px 0 8px 22px !important;
}
.rich-text-content ul ul ul {
    list-style-type: square !important;
}
.rich-text-content ol ol {
    list-style-type: lower-alpha !important;
    margin: 6px 0 8px 22px !important;
}
.rich-text-content blockquote { border-left: 4px solid var(--aqua-teal); padding-left: 15px; font-style: italic; color: var(--text-secondary); margin: 20px 0; background: var(--card-bg); padding: 15px; }
</style>
