<?php $csrf_token = \Core\Security::generateCsrfToken(); ?>
<div class="header" style="margin-bottom: 30px; display: flex; align-items: center; gap: 15px;">
    <a href="<?= APP_URL ?>/admin/courses" style="background: var(--card-bg); border: 1px solid var(--input-border); width: 40px; height: 40px; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: var(--text-secondary); transition: all 0.2s; text-decoration: none;" onmouseover="this.style.background='#f8fafc'; this.style.color='#0f172a';" onmouseout="this.style.background='var(--card-bg)'; this.style.color='#64748b';">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
    </a>
    <div>
        <h2 style="margin: 0; font-size: 1.5rem; color: var(--text-main); font-weight: 700;">Yeni Kurs Əlavə Et</h2>
        <p style="margin: 4px 0 0; color: var(--text-secondary); font-size: 0.95rem;">Sistemə yeni tədris kursu əlavə edin.</p>
    </div>
</div>

<div class="card" style="border-radius: 16px; border: none; box-shadow: 0 4px 20px rgba(0,0,0,0.03); max-width: 900px; padding: 30px; background: var(--card-bg);">
    <form action="<?= APP_URL ?>/admin/courses/create" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($csrf_token) ?>">
        
        <div class="lang-tabs" style="margin-bottom: 25px; border-bottom: 2px solid #f1f5f9; display: flex; gap: 15px;">
            <div class="lang-tab active" data-lang="az" style="padding: 10px 20px; font-weight: 600; cursor: pointer; color: var(--text-secondary); border-bottom: 2px solid transparent; margin-bottom: -2px;">Azərbaycan (AZ)</div>
            <div class="lang-tab" data-lang="en" style="padding: 10px 20px; font-weight: 600; cursor: pointer; color: var(--text-secondary); border-bottom: 2px solid transparent; margin-bottom: -2px;">İngilis (EN)</div>
            <div class="lang-tab" data-lang="ru" style="padding: 10px 20px; font-weight: 600; cursor: pointer; color: var(--text-secondary); border-bottom: 2px solid transparent; margin-bottom: -2px;">Rus (RU)</div>
        </div>

        <style>
            .lang-tab.active { color: var(--aqua-teal) !important; border-bottom-color: var(--aqua-teal) !important; }
            .form-control { padding: 14px 18px; border-radius: 10px; border: 1px solid #cbd5e1; font-size: 1rem; transition: border-color 0.2s; width: 100%; box-sizing: border-box; }
            .form-control:focus { border-color: var(--aqua-teal) !important; box-shadow: 0 0 0 3px rgba(76, 162, 181, 0.15) !important; outline: none; }
            .form-group label { font-weight: 600; color: var(--text-main); margin-bottom: 8px; display: block; }
        </style>

        <!-- AZ Tab -->
        <div class="lang-content active" id="lang-az">
            <div class="form-group" style="margin-bottom: 25px;">
                <label>Başlıq (AZ) <span style="color: #ef4444;">*</span></label>
                <input type="text" name="title_az" class="form-control" required>
            </div>
            <div class="form-group" style="margin-bottom: 25px;">
                <label>Qısa Təsvir (AZ)</label>
                <textarea name="short_desc_az" class="form-control" rows="3"></textarea>
            </div>
            <div class="form-group" style="margin-bottom: 25px;">
                <label>Məzmun (AZ)</label>
                <textarea name="content_az" class="form-control rich-text" style="min-height:200px;"></textarea>
            </div>
        </div>

        <!-- EN Tab -->
        <div class="lang-content" id="lang-en" style="display:none;">
            <div class="form-group" style="margin-bottom: 25px;">
                <label>Title (EN)</label>
                <input type="text" name="title_en" class="form-control">
            </div>
            <div class="form-group" style="margin-bottom: 25px;">
                <label>Short Description (EN)</label>
                <textarea name="short_desc_en" class="form-control" rows="3"></textarea>
            </div>
            <div class="form-group" style="margin-bottom: 25px;">
                <label>Content (EN)</label>
                <textarea name="content_en" class="form-control rich-text" style="min-height:200px;"></textarea>
            </div>
        </div>

        <!-- RU Tab -->
        <div class="lang-content" id="lang-ru" style="display:none;">
            <div class="form-group" style="margin-bottom: 25px;">
                <label>Заголовок (RU)</label>
                <input type="text" name="title_ru" class="form-control">
            </div>
            <div class="form-group" style="margin-bottom: 25px;">
                <label>Краткое описание (RU)</label>
                <textarea name="short_desc_ru" class="form-control" rows="3"></textarea>
            </div>
            <div class="form-group" style="margin-bottom: 25px;">
                <label>Содержание (RU)</label>
                <textarea name="content_ru" class="form-control rich-text" style="min-height:200px;"></textarea>
            </div>
        </div>

        <div class="form-group" style="margin-bottom: 30px; background: var(--input-bg); padding: 20px; border-radius: 12px; border: 1px dashed #cbd5e1;">
            <label style="display: flex; align-items: center; gap: 8px;">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="var(--aqua-teal)" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><circle cx="8.5" cy="8.5" r="1.5"></circle><polyline points="21 15 16 10 5 21"></polyline></svg>
                Şəkil Yüklə (Cover)
            </label>
            <input type="file" name="image" class="form-control" accept="image/*" style="padding: 10px;">
        </div>
        
        <div style="display: flex; gap: 15px; border-top: 1px solid #f1f5f9; padding-top: 25px;">
            <button type="submit" class="btn" style="padding: 14px 30px; font-weight: 600; font-size: 1.05rem; border-radius: 10px; display: flex; align-items: center; gap: 8px; box-shadow: 0 4px 12px rgba(76,162,181,0.3);">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path><polyline points="17 21 17 13 7 13 7 21"></polyline><polyline points="7 3 7 8 15 8"></polyline></svg>
                Yadda Saxla
            </button>
            <a href="<?= APP_URL ?>/admin/courses" class="btn" style="background: #f1f5f9; color: #475569; padding: 14px 30px; font-weight: 600; font-size: 1.05rem; border-radius: 10px; text-decoration: none;">Ləğv Et</a>
        </div>
    </form>
</div>

<script>
    document.querySelectorAll('.lang-tab').forEach(tab => {
        tab.addEventListener('click', () => {
            const lang = tab.getAttribute('data-lang');
            document.querySelectorAll('.lang-tab').forEach(t => t.classList.remove('active'));
            document.querySelectorAll('.lang-content').forEach(c => c.style.display = 'none');
            tab.classList.add('active');
            document.getElementById('lang-' + lang).style.display = 'block';
        });
    });
</script>
