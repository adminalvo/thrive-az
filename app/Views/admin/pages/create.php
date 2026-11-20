<div class="admin-header" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
    <h2><i class="fas fa-plus" style="color: var(--primary); margin-right: 10px;"></i> <?= \Core\Language::get('admin_page_create_title') ?></h2>
    <a href="<?= APP_URL ?>/admin/pages" class="btn-sm" style="background: rgba(255,255,255,0.1); color: #fff; padding: 10px 20px; border-radius: 8px; text-decoration: none;">
        <i class="fas fa-arrow-left"></i> <?= \Core\Language::get('admin_back2') ?>
    </a>
</div>

<div class="admin-card" style="background: #1e293b; padding: 30px; border-radius: 12px; border: 1px solid rgba(255,255,255,0.05);">
    <form action="<?= APP_URL ?>/admin/pages/create" method="POST">
        
        <div style="margin-bottom: 25px;">
            <label style="display: block; color: #94a3b8; font-size: 0.9rem; margin-bottom: 8px;"><?= \Core\Language::get('admin_page_name') ?></label>
            <input type="text" name="title" required placeholder="<?= \Core\Language::get('admin_page_title_placeholder') ?>" style="width: 100%; padding: 12px; background: rgba(0,0,0,0.2); border: 1px solid rgba(255,255,255,0.1); border-radius: 8px; color: #fff; font-size: 1rem;">
        </div>

        <div style="margin-bottom: 25px;">
            <label style="display: block; color: #94a3b8; font-size: 0.9rem; margin-bottom: 8px;"><?= \Core\Language::get('admin_page_slug') ?></label>
            <input type="text" name="slug" required placeholder="<?= \Core\Language::get('admin_page_slug_placeholder') ?>" style="width: 100%; padding: 12px; background: rgba(0,0,0,0.2); border: 1px solid rgba(255,255,255,0.1); border-radius: 8px; color: #fff; font-size: 1rem;">
            <small style="color: var(--text-secondary); margin-top: 5px; display: block;"><?= \Core\Language::get('admin_page_slug_hint') ?> <?= APP_URL ?>/xidmetlerimiz</small>
        </div>

        <div style="margin-bottom: 25px;">
            <label style="display: block; color: #94a3b8; font-size: 0.9rem; margin-bottom: 8px;"><?= \Core\Language::get('admin_meta_title') ?> (SEO)</label>
            <input type="text" name="meta_title" placeholder="<?= \Core\Language::get('admin_meta_title_placeholder') ?>" style="width: 100%; padding: 12px; background: rgba(0,0,0,0.2); border: 1px solid rgba(255,255,255,0.1); border-radius: 8px; color: #fff; font-size: 1rem;">
        </div>

        <div style="margin-bottom: 25px;">
            <label style="display: block; color: #94a3b8; font-size: 0.9rem; margin-bottom: 8px;"><?= \Core\Language::get('admin_meta_desc') ?> (SEO)</label>
            <textarea name="meta_desc" rows="3" placeholder="<?= \Core\Language::get('admin_meta_desc_placeholder') ?>" style="width: 100%; padding: 12px; background: rgba(0,0,0,0.2); border: 1px solid rgba(255,255,255,0.1); border-radius: 8px; color: #fff; font-size: 1rem; resize: vertical;"></textarea>
        </div>

        <div style="margin-bottom: 30px;">
            <label style="display: block; color: #94a3b8; font-size: 0.9rem; margin-bottom: 8px;">Status</label>
            <select name="status" style="width: 100%; padding: 12px; background: rgba(0,0,0,0.2); border: 1px solid rgba(255,255,255,0.1); border-radius: 8px; color: #fff; font-size: 1rem;">
                <option value="1"><?= \Core\Language::get('admin_page_active') ?></option>
                <option value="0"><?= \Core\Language::get('admin_page_draft') ?></option>
            </select>
        </div>

        <button type="submit" style="background: var(--primary); color: #fff; border: none; padding: 15px 30px; border-radius: 8px; font-weight: 600; cursor: pointer; transition: 0.3s; display: flex; align-items: center; gap: 10px; font-size: 1rem;">
            <?= \Core\Language::get('admin_continue_design') ?> <i class="fas fa-arrow-right"></i>
        </button>
    </form>
</div>
