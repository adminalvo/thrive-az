<div class="header" style="margin-bottom: 30px; display: flex; align-items: center; gap: 15px;">
    <a href="<?= APP_URL ?>/admin/self-study" style="background: var(--card-bg); border: 1px solid var(--input-border); width: 40px; height: 40px; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: var(--text-secondary); transition: all 0.2s; text-decoration: none;" onmouseover="this.style.background='#f8fafc'; this.style.color='#0f172a';" onmouseout="this.style.background='var(--card-bg)'; this.style.color='#64748b';">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
    </a>
    <div>
        <h2 style="margin: 0; font-size: 1.5rem; color: #0f172a; font-weight: 700;"><?= \Core\Language::get('admin_new_material_title') ?></h2>
        <p style="margin: 4px 0 0; color: var(--text-secondary); font-size: 0.95rem;"><?= \Core\Language::get('admin_material_add_desc') ?></p>
    </div>
</div>

<div class="card" style="border-radius: 16px; border: none; box-shadow: 0 4px 20px rgba(0,0,0,0.03); max-width: 800px;">
    <form action="<?= APP_URL ?>/admin/self-study/create" method="POST">
        
        <div class="form-group" style="margin-bottom: 25px;">
            <label style="font-weight: 600; color: #334155; margin-bottom: 8px; display: block;"><?= \Core\Language::get('admin_material_title') ?> <span style="color: #ef4444;">*</span></label>
            <input type="text" name="title" class="form-control" placeholder="<?= \Core\Language::get('admin_material_title_ex') ?>" required style="padding: 14px 18px; border-radius: 10px; border: 1px solid #cbd5e1; font-size: 1rem; transition: border-color 0.2s;">
        </div>
        
        <div class="form-group" style="margin-bottom: 25px;">
            <label style="font-weight: 600; color: #334155; margin-bottom: 8px; display: block;"><?= \Core\Language::get('admin_material_desc') ?></label>
            <textarea name="description" class="form-control" rows="4" placeholder="<?= \Core\Language::get('admin_material_desc_ex') ?>" style="padding: 14px 18px; border-radius: 10px; border: 1px solid #cbd5e1; font-size: 1rem; transition: border-color 0.2s; resize: vertical;"></textarea>
        </div>
        
        <div class="form-group" style="margin-bottom: 35px; background: var(--input-bg); padding: 20px; border-radius: 12px; border: 1px dashed #cbd5e1;">
            <label style="font-weight: 600; color: #0f172a; margin-bottom: 8px; display: flex; align-items: center; gap: 8px;">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="var(--aqua-teal)" stroke-width="2"><path d="M21.44 11.05l-9.19 9.19a6 6 0 0 1-8.49-8.49l9.19-9.19a4 4 0 0 1 5.66 5.66l-9.2 9.19a2 2 0 0 1-2.83-2.83l8.49-8.48"></path></svg>
                <?= \Core\Language::get('admin_file_video_url') ?> <span style="color: #ef4444;">*</span>
            </label>
            <input type="url" name="file_url" class="form-control" placeholder="https://" required style="padding: 14px 18px; border-radius: 10px; border: 1px solid #cbd5e1; font-size: 1rem;">
            <p style="color: var(--text-secondary); font-size: 0.9rem; margin: 10px 0 0; display: flex; align-items: center; gap: 5px;">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg>
                <?= \Core\Language::get('admin_file_url_hint') ?>
            </p>
        </div>
        
        <div style="display: flex; gap: 15px; border-top: 1px solid #f1f5f9; padding-top: 25px;">
            <button type="submit" class="btn" style="padding: 14px 30px; font-weight: 600; font-size: 1.05rem; border-radius: 10px; display: flex; align-items: center; gap: 8px; box-shadow: 0 4px 12px rgba(76,162,181,0.3);">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path><polyline points="17 21 17 13 7 13 7 21"></polyline><polyline points="7 3 7 8 15 8"></polyline></svg>
                <?= \Core\Language::get('admin_save_btn') ?>
            </button>
            <a href="<?= APP_URL ?>/admin/self-study" class="btn" style="background: #f1f5f9; color: #475569; padding: 14px 30px; font-weight: 600; font-size: 1.05rem; border-radius: 10px; text-decoration: none;"><?= \Core\Language::get('admin_cancel') ?></a>
        </div>
    </form>
</div>

<style>
    .form-control:focus {
        border-color: var(--aqua-teal) !important;
        box-shadow: 0 0 0 3px rgba(76, 162, 181, 0.15) !important;
        outline: none;
    }
</style>
