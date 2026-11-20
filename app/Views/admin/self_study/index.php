<div class="header" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px; background: linear-gradient(to right, #ffffff, #f8fafc); padding: 20px 30px; border-radius: 16px; box-shadow: 0 4px 15px rgba(0,0,0,0.03);">
    <div style="display: flex; align-items: center; gap: 15px;">
        <div style="background: rgba(76, 162, 181, 0.1); width: 45px; height: 45px; border-radius: 12px; display: flex; align-items: center; justify-content: center;">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="var(--aqua-teal)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path></svg>
        </div>
        <div>
            <h2 style="margin: 0; font-size: 1.5rem; color: #003f82; font-weight: 700;"><?= \Core\Language::get('admin_self_study') ?></h2>
            <p style="margin: 3px 0 0; color: var(--text-secondary); font-size: 0.95rem;"><?= \Core\Language::get('admin_self_study_desc') ?></p>
        </div>
    </div>
    <a href="<?= APP_URL ?>/admin/self-study/create" class="btn" style="display: flex; align-items: center; gap: 8px; border-radius: 10px; font-weight: 600; padding: 12px 20px; box-shadow: 0 4px 12px rgba(76,162,181,0.3);">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
        <?= \Core\Language::get('admin_new_material') ?>
    </a>
</div>

<div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(320px, 1fr)); gap: 25px;">
    <?php foreach($records as $r): ?>
    <div style="background: var(--card-bg); border-radius: 16px; padding: 25px; box-shadow: 0 10px 30px var(--shadow-light); transition: transform 0.3s ease, box-shadow 0.3s ease; border: 1px solid rgba(0,0,0,0.02); position: relative; overflow: hidden;" class="study-card">
        <!-- Decorative top bar -->
        <div style="position: absolute; top: 0; left: 0; right: 0; height: 4px; background: linear-gradient(90deg, var(--aqua-teal), #003f82);"></div>
        
        <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 15px;">
            <div style="background: rgba(0, 63, 130, 0.05); padding: 8px 12px; border-radius: 8px; color: #003f82; font-size: 0.8rem; font-weight: 600; display: flex; align-items: center; gap: 5px;">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                <?= date('d M Y', strtotime($r['created_at'])) ?>
            </div>
            
            <a href="<?= APP_URL ?>/admin/self-study/delete/<?= $r['id'] ?>" class="text-danger" onclick="return confirm(<?= json_encode(\Core\Language::get('admin_delete_confirm')) ?>);" style="background: rgba(239, 68, 68, 0.1); padding: 8px; border-radius: 8px; display: flex; align-items: center; justify-content: center; transition: all 0.2s;" title="<?= \Core\Language::get('admin_delete') ?>">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 6h18"></path><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>
            </a>
        </div>
        
        <h3 style="margin: 0 0 10px 0; font-size: 1.25rem; color: #1e293b; font-weight: 700; line-height: 1.4;"><?= htmlspecialchars($r['title']) ?></h3>
        
        <?php if(!empty($r['description'])): ?>
            <p style="color: var(--text-secondary); font-size: 0.95rem; line-height: 1.5; margin-bottom: 20px; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;"><?= htmlspecialchars($r['description']) ?></p>
        <?php else: ?>
            <p style="color: #cbd5e1; font-size: 0.95rem; margin-bottom: 20px; font-style: italic;"><?= \Core\Language::get('admin_no_desc') ?></p>
        <?php endif; ?>

        <?php if(!empty($r['file_url'])): ?>
        <div style="margin-top: auto;">
            <a href="<?= htmlspecialchars($r['file_url']) ?>" target="_blank" style="display: flex; align-items: center; justify-content: center; gap: 8px; width: 100%; padding: 12px; background: rgba(76, 162, 181, 0.08); color: var(--aqua-teal); border-radius: 10px; font-weight: 600; text-decoration: none; transition: background 0.2s;">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path><polyline points="15 3 21 3 21 9"></polyline><line x1="10" y1="14" x2="21" y2="3"></line></svg>
                <?= \Core\Language::get('admin_view_file') ?>
            </a>
        </div>
        <?php endif; ?>
    </div>
    <?php endforeach; ?>
</div>

<?php if(empty($records)): ?>
<div style="text-align: center; padding: 60px 20px; background: var(--card-bg); border-radius: 16px; box-shadow: 0 5px 20px rgba(0,0,0,0.03);">
    <div style="width: 80px; height: 80px; background: #f1f5f9; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 20px;">
        <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="#94a3b8" stroke-width="1.5"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="9" y1="3" x2="9" y2="21"></line></svg>
    </div>
    <h3 style="color: #334155; margin: 0 0 10px 0;"><?= \Core\Language::get('admin_no_materials') ?></h3>
    <p style="color: var(--text-secondary); margin: 0 0 20px 0;"><?= \Core\Language::get('admin_materials_cta') ?></p>
    <a href="<?= APP_URL ?>/admin/self-study/create" class="btn" style="border-radius: 10px;"><?= \Core\Language::get('admin_add_first_material') ?></a>
</div>
<?php endif; ?>

<style>
    .study-card:hover { transform: translateY(-5px); box-shadow: 0 12px 30px rgba(0,0,0,0.08) !important; }
    .study-card .text-danger:hover { background: #ef4444 !important; color: #fff !important; }
</style>
