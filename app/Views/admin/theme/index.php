<div class="admin-header" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
    <h2><i class="fas fa-paint-roller" style="color: var(--primary); margin-right: 10px;"></i> <?= \Core\Language::get('admin_theme_title') ?></h2>
</div>

<?php if(isset($_GET['success'])): ?>
    <div style="background: rgba(16, 185, 129, 0.1); color: #10b981; padding: 15px; border-radius: 8px; margin-bottom: 20px; border: 1px solid rgba(16, 185, 129, 0.2);">
        <i class="fas fa-check-circle" style="margin-right: 8px;"></i> <?= \Core\Language::get('admin_settings_saved') ?>
    </div>
<?php endif; ?>

<div class="admin-card" style="background: #1e293b; padding: 30px; border-radius: 12px; border: 1px solid rgba(255,255,255,0.05);">
    <form action="<?= APP_URL ?>/admin/theme" method="POST" enctype="multipart/form-data">
        
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 30px; margin-bottom: 30px;">
            <div>
                <label style="display: block; color: #94a3b8; font-size: 0.9rem; margin-bottom: 8px;"><?= \Core\Language::get('admin_theme_primary') ?></label>
                <input type="color" name="primary_color" value="<?= htmlspecialchars($settings['primary_color'] ?? '#000b21') ?>" style="width: 100%; height: 50px; border: none; border-radius: 8px; cursor: pointer; background: transparent;">
            </div>
            <div>
                <label style="display: block; color: #94a3b8; font-size: 0.9rem; margin-bottom: 8px;"><?= \Core\Language::get('admin_theme_gradient') ?></label>
                <input type="color" name="ocean_blue" value="<?= htmlspecialchars($settings['ocean_blue'] ?? '#003f82') ?>" style="width: 100%; height: 50px; border: none; border-radius: 8px; cursor: pointer; background: transparent;">
            </div>
            <div>
                <label style="display: block; color: #94a3b8; font-size: 0.9rem; margin-bottom: 8px;"><?= \Core\Language::get('admin_theme_accent') ?></label>
                <input type="color" name="secondary_color" value="<?= htmlspecialchars($settings['secondary_color'] ?? '#4ca2b5') ?>" style="width: 100%; height: 50px; border: none; border-radius: 8px; cursor: pointer; background: transparent;">
            </div>
            <div>
                <label style="display: block; color: #94a3b8; font-size: 0.9rem; margin-bottom: 8px;"><?= \Core\Language::get('admin_theme_angle') ?></label>
                <input type="text" name="gradient_angle" value="<?= htmlspecialchars($settings['gradient_angle'] ?? '135deg') ?>" style="width: 100%; padding: 12px; background: rgba(0,0,0,0.2); border: 1px solid rgba(255,255,255,0.1); border-radius: 8px; color: #fff;">
            </div>
            <div>
                <label style="display: block; color: #94a3b8; font-size: 0.9rem; margin-bottom: 8px;"><?= \Core\Language::get('admin_theme_body_bg') ?></label>
                <input type="color" name="body_bg_color" value="<?= htmlspecialchars($settings['body_bg_color'] ?? '#f4f7f6') ?>" style="width: 100%; height: 50px; border: none; border-radius: 8px; cursor: pointer; background: transparent;">
            </div>
            <div>
                <label style="display: block; color: #94a3b8; font-size: 0.9rem; margin-bottom: 8px;"><?= \Core\Language::get('admin_theme_header_bg') ?></label>
                <input type="color" name="header_bg_color" value="<?= htmlspecialchars($settings['header_bg_color'] ?? '#000b21') ?>" style="width: 100%; height: 50px; border: none; border-radius: 8px; cursor: pointer; background: transparent;">
            </div>
        </div>

        <div style="margin-bottom: 30px;">
            <label style="display: block; color: #94a3b8; font-size: 0.9rem; margin-bottom: 8px;"><?= \Core\Language::get('admin_upload_logo') ?></label>
            <input type="file" name="logo_file" accept="image/*" style="width: 100%; padding: 12px; background: rgba(0,0,0,0.2); border: 1px solid rgba(255,255,255,0.1); border-radius: 8px; color: #fff;">
            <small style="color: var(--text-secondary); margin-top: 5px; display: block;"><?= \Core\Language::get('admin_upload_logo_hint') ?></small>
        </div>

        <div style="margin-bottom: 30px;">
            <label style="display: block; color: #94a3b8; font-size: 0.9rem; margin-bottom: 8px;"><?= \Core\Language::get('admin_theme_font') ?></label>
            <input type="text" name="font_family" value="<?= htmlspecialchars($settings['font_family'] ?? 'Inter') ?>" style="width: 100%; padding: 12px; background: rgba(0,0,0,0.2); border: 1px solid rgba(255,255,255,0.1); border-radius: 8px; color: #fff;">
            <small style="color: var(--text-secondary); margin-top: 5px; display: block;"><?= \Core\Language::get('admin_font_hint') ?></small>
        </div>

        <button type="submit" style="background: var(--primary); color: #fff; border: none; padding: 12px 24px; border-radius: 8px; font-weight: 600; cursor: pointer; transition: 0.3s; display: flex; align-items: center; gap: 10px;">
            <i class="fas fa-save"></i> <?= \Core\Language::get('admin_save_btn') ?>
        </button>
    </form>
</div>
