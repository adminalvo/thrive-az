<section class="premium-hero center" style="min-height: 400px; display: flex; align-items: center; justify-content: center; position: relative;">
    <div class="premium-hero-bg premium-hero-bg-abstract" style="z-index: 0;"></div>
    <div class="container" style="position: relative; z-index: 2; width: 100%; text-align: center;">
        <h1 style="font-size: clamp(2.5rem, 5vw, 4rem); margin-bottom: 20px; color: #fff; text-shadow: 0 4px 20px rgba(0,0,0,0.3);"><?= \Core\Language::get('blog') ?? 'Blog' ?></h1>
        <p style="font-size: 1.2rem; color: rgba(255,255,255,0.9); margin-bottom: 40px; max-width: 600px; margin-left: auto; margin-right: auto;"><?= \Core\Language::get('blog_subdesc') ?? 'Ən son yeniliklər və faydalı məqalələr' ?></p>

        <!-- Search Bar -->
        <form action="<?= APP_URL ?>/blog" method="GET" style="max-width: 600px; margin: 0 auto; display: flex; background: #fff; border-radius: 50px; padding: 5px; box-shadow: 0 10px 30px rgba(0,0,0,0.15);">
            <input type="text" name="q" value="<?= htmlspecialchars($searchQuery ?? '') ?>" placeholder="<?= \Core\Language::get('search_placeholder') ?? 'Axtarış...' ?>" style="flex: 1; border: none; padding: 15px 25px; border-radius: 50px; outline: none; font-size: 1rem; color: var(--text-main); font-family: var(--font-body);">
            <button type="submit" style="background: var(--aqua-teal); color: #fff; border: none; padding: 0 30px; border-radius: 50px; font-weight: 600; cursor: pointer; transition: background 0.3s;">
                <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" style="vertical-align: middle;">
                    <circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                </svg>
            </button>
        </form>
    </div>
</section>

<section class="section" style="background: var(--bg-color); padding-top: 60px;">
    <div class="container">
        
        <?php if(!empty($searchQuery)): ?>
            <div style="margin-bottom: 40px;">
                <h3 style="color: var(--text-main); font-size: 1.5rem;">"<?= htmlspecialchars($searchQuery) ?>" üçün axtarış nəticələri: <?= count($blogs) ?> <?= \Core\Language::get('results_found') ?? 'nəticə tapıldı' ?></h3>
                <a href="<?= APP_URL ?>/blog" style="color: var(--primary); text-decoration: underline; font-size: 0.95rem;">Axtarışı təmizlə</a>
            </div>
        <?php endif; ?>

        <?php if(empty($blogs)): ?>
            <div style="background: var(--card-bg); padding: 80px 20px; border-radius: 20px; text-align: center; border: 1px solid var(--border-color); box-shadow: 0 10px 30px var(--shadow-light);">
                <svg width="64" height="64" fill="none" stroke="var(--border-color)" stroke-width="1.5" viewBox="0 0 24 24" style="margin-bottom: 20px;">
                    <path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z"/><path d="M8 15h8M9 9h.01M15 9h.01"/>
                </svg>
                <p style="font-size: 1.2rem; color: var(--text-secondary);"><?= \Core\Language::get('blog_soon') ?? 'Heç nə tapılmadı.' ?></p>
            </div>
        <?php else: ?>
            
            <?php 
                $featured = empty($searchQuery) ? array_shift($blogs) : null; 
            ?>

            <?php if($featured): ?>
                <?php 
                    $lang = $_SESSION['lang'] ?? 'az';
                    $title = $lang == 'az' ? $featured['title'] : ($featured['title_'.$lang] ?: $featured['title']);
                ?>
                <div style="margin-bottom: 60px;">
                    <a href="<?= APP_URL ?>/blog/<?= htmlspecialchars($featured['slug']) ?>" style="display: block; text-decoration: none; color: inherit; position: relative; border-radius: 24px; overflow: hidden; box-shadow: 0 20px 40px var(--shadow-medium); background: var(--card-bg);" class="featured-card">
                        <div style="display: flex; flex-direction: column;">
                            <div style="width: 100%; height: 400px; overflow: hidden; position: relative; background: var(--bg-light); display: flex; align-items: center; justify-content: center;">
                                <?php if($featured['cover_image']): ?>
                                    <img src="<?= APP_URL ?>/uploads/<?= htmlspecialchars($featured['cover_image']) ?>" alt="" style="max-width: 100%; max-height: 100%; object-fit: contain; transition: transform 0.5s ease;" class="featured-img">
                                <?php else: ?>
                                    <div style="width: 100%; height: 100%; background: var(--gradient-primary);"></div>
                                <?php endif; ?>
                                <div style="position: absolute; top: 20px; left: 20px; background: var(--aqua-teal); color: #fff; padding: 6px 15px; border-radius: 50px; font-size: 0.85rem; font-weight: bold; text-transform: uppercase; letter-spacing: 1px;">Önə Çıxan</div>
                            </div>
                            <div style="padding: 40px;">
                                <div style="display: flex; align-items: center; gap: 15px; margin-bottom: 15px; color: var(--text-secondary); font-size: 0.95rem;">
                                    <span style="display: flex; align-items: center; gap: 5px;">
                                        <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                                        <?= date('d M Y', strtotime($featured['created_at'])) ?>
                                    </span>
                                </div>
                                <h2 style="font-size: clamp(1.8rem, 3vw, 2.5rem); color: var(--heading-color); margin-bottom: 20px; line-height: 1.2; transition: color 0.3s;"><?= htmlspecialchars($title) ?></h2>
                                <span style="display: inline-flex; align-items: center; color: var(--primary); font-weight: 600; font-size: 1.1rem;">
                                    <?= \Core\Language::get('read_more') ?? 'Ətraflı Oxu' ?> 
                                    <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" style="margin-left: 8px; transition: transform 0.3s;" class="arrow-icon"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                                </span>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endif; ?>

            <?php if(!empty($blogs)): ?>
                <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(320px, 1fr)); gap: 40px;">
                    <?php foreach($blogs as $blog): ?>
                        <?php 
                            $lang = $_SESSION['lang'] ?? 'az';
                            $title = $lang == 'az' ? $blog['title'] : ($blog['title_'.$lang] ?: $blog['title']);
                        ?>
                        <a href="<?= APP_URL ?>/blog/<?= htmlspecialchars($blog['slug']) ?>" style="display: block; text-decoration: none; color: inherit;" class="blog-grid-card">
                            <div style="background: var(--card-bg); border-radius: 20px; box-shadow: 0 10px 30px var(--shadow-light); border: 1px solid var(--border-color); overflow: hidden; display: flex; flex-direction: column; height: 100%; transition: transform 0.4s ease, box-shadow 0.4s ease;">
                                <div style="height: 240px; overflow: hidden; background: var(--bg-light); display: flex; align-items: center; justify-content: center;">
                                    <?php if(isset($blog['thumbnail_image']) && $blog['thumbnail_image']): ?>
                                        <img src="<?= APP_URL ?>/uploads/<?= htmlspecialchars($blog['thumbnail_image']) ?>" alt="" style="max-width: 100%; max-height: 100%; object-fit: contain; transition: transform 0.5s ease;" class="grid-img">
                                    <?php elseif($blog['cover_image']): ?>
                                        <img src="<?= APP_URL ?>/uploads/<?= htmlspecialchars($blog['cover_image']) ?>" alt="" style="max-width: 100%; max-height: 100%; object-fit: contain; transition: transform 0.5s ease;" class="grid-img">
                                    <?php else: ?>
                                        <div style="width: 100%; height: 100%; background: var(--gradient-primary);"></div>
                                    <?php endif; ?>
                                </div>
                                <div style="padding: 25px; display: flex; flex-direction: column; flex: 1;">
                                    <div style="color: var(--text-secondary); font-size: 0.85rem; margin-bottom: 10px; font-weight: 500;">
                                        <?= date('d M Y', strtotime($blog['created_at'])) ?>
                                    </div>
                                    <h3 style="font-size: 1.4rem; margin-bottom: 20px; color: var(--heading-color); line-height: 1.3;"><?= htmlspecialchars($title) ?></h3>
                                    <div style="margin-top: auto; display: inline-flex; align-items: center; color: var(--aqua-teal); font-weight: 600; font-size: 0.95rem;">
                                        <?= \Core\Language::get('read_more') ?? 'Ətraflı Oxu' ?>
                                        <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" style="margin-left: 6px;"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                                    </div>
                                </div>
                            </div>
                        </a>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

        <?php endif; ?>
    </div>
</section>

<style>
/* Hover Animations */
.featured-card:hover .featured-img { transform: scale(1.03); }
.featured-card:hover h2 { color: var(--primary); }
.featured-card:hover .arrow-icon { transform: translateX(5px); }

.blog-grid-card:hover > div { transform: translateY(-8px); box-shadow: 0 20px 40px var(--shadow-medium); }
.blog-grid-card:hover .grid-img { transform: scale(1.05); }

/* Responsive Adjustments */
@media(min-width: 992px) {
    .featured-card > div { flex-direction: row; align-items: stretch; }
    .featured-card > div > div:first-child { width: 55%; height: auto; min-height: 400px; }
    .featured-card > div > div:last-child { width: 45%; display: flex; flex-direction: column; justify-content: center; }
}
</style>
