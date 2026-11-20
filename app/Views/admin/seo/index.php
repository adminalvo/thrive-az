<div class="content-header" style="display:flex; justify-content:space-between; align-items:center; margin-bottom:20px;">
    <h2>SEO İdarəetmə Paneli</h2>
</div>

<?php if(!empty($_SESSION['success'])): ?>
    <div style="padding: 15px; background: #d4edda; color: #155724; border-radius: 8px; margin-bottom: 20px;">
        <?= htmlspecialchars($_SESSION['success']) ?>
        <?php unset($_SESSION['success']); ?>
    </div>
<?php endif; ?>

<div class="table-container">
    <table class="admin-table">
        <thead>
            <tr>
                <th><?= \Core\Language::get('admin_page_url') ?? 'Səhifə (Page)' ?></th>
                <th><?= \Core\Language::get('admin_meta_title') ?? 'SEO Başlıq (Title)' ?></th>
                <th><?= \Core\Language::get('admin_keywords') ?? 'Açar Sözlər (Keywords)' ?></th>
                <th><?= \Core\Language::get('admin_emeliyyat') ?? 'Əməliyyatlar' ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($seo_pages as $seo): ?>
            <tr>
                <td style="font-weight: 500; color: var(--text-main);"><?= htmlspecialchars($seo['page']) ?></td>
                <td><?= htmlspecialchars($seo['title_az'] ?: $seo['title_en']) ?></td>
                <td style="color: var(--text-muted);"><?= htmlspecialchars(substr($seo['keywords_az'] ?: $seo['keywords_en'], 0, 50)) ?>...</td>
                <td>
                    <button class="btn-sm" onclick='editSeo(<?= json_encode($seo, JSON_HEX_APOS | JSON_HEX_QUOT) ?>)' style="background:#eab308; color:#fff; border:none; cursor:pointer;"><i class="fas fa-edit"></i> Redaktə</button>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<!-- Modal -->
<div id="editSeoModal" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(15,23,42,0.6); backdrop-filter: blur(4px); z-index:9999; align-items:center; justify-content:center;">
    <div style="background:var(--card-bg); width:90%; max-width:700px; max-height:90vh; overflow-y:auto; padding:35px; border-radius:16px; position:relative; box-shadow: 0 20px 40px rgba(0,0,0,0.1);">
        <button onclick="closeModal('editSeoModal')" style="position:absolute; top:20px; right:20px; background:var(--input-bg); border:1px solid var(--input-border); width:36px; height:36px; border-radius:50%; display:flex; align-items:center; justify-content:center; cursor:pointer; color:var(--text-secondary); transition:all 0.2s;">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
        </button>
        <h3 style="margin:0 0 5px 0; color:var(--text-main); font-size:1.5rem; font-weight:700;" id="modalTitle">SEO Redaktə <span id="modalPageName" style="color:var(--aqua-teal);"></span></h3>
        <p style="margin:0 0 25px 0; color:var(--text-secondary); font-size:0.95rem;">Səhifənin axtarış motorlarında (Google) görünüşünü hər dil üçün ayrılıqda tənzimləyin.</p>
        
        <form action="<?= APP_URL ?>/admin/seo/save" method="POST">
            <input type="hidden" name="id" id="seo_id">
            <input type="hidden" name="page" id="seo_page">
            
            <style>
                #editSeoModal .form-control { padding: 12px 16px; border-radius: 10px; border: 1px solid #cbd5e1; font-size: 1rem; width: 100%; box-sizing: border-box; transition: border-color 0.2s; background: var(--bg-light); color: var(--text-main); margin-bottom: 15px; }
                #editSeoModal .form-control:focus { border-color: var(--aqua-teal) !important; box-shadow: 0 0 0 3px rgba(76, 162, 181, 0.15) !important; outline: none; }
                #editSeoModal label { font-weight: 600; color: var(--text-main); margin-bottom: 6px; display: block; font-size:0.95rem; }
                .lang-tabs { display: flex; border-bottom: 2px solid #e2e8f0; margin-bottom: 20px; }
                .lang-tab { padding: 10px 20px; cursor: pointer; font-weight: 600; color: #64748b; border-bottom: 2px solid transparent; margin-bottom: -2px; }
                .lang-tab.active { color: var(--aqua-teal); border-bottom-color: var(--aqua-teal); }
                .lang-content { display: none; }
                .lang-content.active { display: block; }
            </style>

            <div class="lang-tabs">
                <div class="lang-tab active" onclick="switchLangTab('az', this)">Azərbaycanca</div>
                <div class="lang-tab" onclick="switchLangTab('en', this)">English</div>
                <div class="lang-tab" onclick="switchLangTab('ru', this)">Русский</div>
            </div>

            <!-- AZ -->
            <div id="seo-lang-az" class="lang-content active">
                <label>SEO Başlıq (Title) - AZ</label>
                <input type="text" name="title_az" id="seo_title_az" class="form-control">
                
                <label>Qısa Təsvir (Meta Description) - AZ</label>
                <textarea name="description_az" id="seo_desc_az" class="form-control" rows="3"></textarea>

                <label>Açar Sözlər (Keywords) - AZ</label>
                <textarea name="keywords_az" id="seo_keywords_az" class="form-control" rows="2"></textarea>
            </div>

            <!-- EN -->
            <div id="seo-lang-en" class="lang-content">
                <label>SEO Başlıq (Title) - EN</label>
                <input type="text" name="title_en" id="seo_title_en" class="form-control">
                
                <label>Qısa Təsvir (Meta Description) - EN</label>
                <textarea name="description_en" id="seo_desc_en" class="form-control" rows="3"></textarea>

                <label>Açar Sözlər (Keywords) - EN</label>
                <textarea name="keywords_en" id="seo_keywords_en" class="form-control" rows="2"></textarea>
            </div>

            <!-- RU -->
            <div id="seo-lang-ru" class="lang-content">
                <label>SEO Başlıq (Title) - RU</label>
                <input type="text" name="title_ru" id="seo_title_ru" class="form-control">
                
                <label>Qısa Təsvir (Meta Description) - RU</label>
                <textarea name="description_ru" id="seo_desc_ru" class="form-control" rows="3"></textarea>

                <label>Açar Sözlər (Keywords) - RU</label>
                <textarea name="keywords_ru" id="seo_keywords_ru" class="form-control" rows="2"></textarea>
            </div>

            <div style="margin-top:20px; display:flex; gap:15px; justify-content:flex-end;">
                <button type="button" onclick="closeModal('editSeoModal')" class="btn" style="background: #f1f5f9; color: #475569; padding: 12px 25px; font-weight: 600; border-radius: 10px;">Ləğv Et</button>
                <button type="submit" class="btn" style="background: var(--aqua-teal); color: white; padding: 12px 25px; font-weight: 600; border-radius: 10px; display:flex; align-items:center; gap:8px; box-shadow: 0 4px 12px rgba(76,162,181,0.3); border:none; cursor:pointer;">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path><polyline points="17 21 17 13 7 13 7 21"></polyline><polyline points="7 3 7 8 15 8"></polyline></svg>
                    Yadda Saxla
                </button>
            </div>
        </form>
    </div>
</div>

<script>
function switchLangTab(lang, element = null) {
    document.querySelectorAll('.lang-tab').forEach(el => el.classList.remove('active'));
    document.querySelectorAll('.lang-content').forEach(el => el.classList.remove('active'));
    
    if (element) {
        element.classList.add('active');
    } else {
        let tabs = document.querySelectorAll('.lang-tab');
        if (lang === 'az') tabs[0].classList.add('active');
        if (lang === 'en') tabs[1].classList.add('active');
        if (lang === 'ru') tabs[2].classList.add('active');
    }
    
    document.getElementById('seo-lang-' + lang).classList.add('active');
}

function editSeo(seo) {
    document.getElementById('seo_id').value = seo.id || '';
    document.getElementById('seo_page').value = seo.page || '';
    document.getElementById('modalPageName').innerText = seo.page ? "(" + seo.page + ")" : "";
    
    document.getElementById('seo_title_az').value = seo.title_az || seo.title || '';
    document.getElementById('seo_desc_az').value = seo.description_az || seo.description || '';
    document.getElementById('seo_keywords_az').value = seo.keywords_az || seo.keywords || '';
    
    document.getElementById('seo_title_en').value = seo.title_en || '';
    document.getElementById('seo_desc_en').value = seo.description_en || '';
    document.getElementById('seo_keywords_en').value = seo.keywords_en || '';
    
    document.getElementById('seo_title_ru').value = seo.title_ru || '';
    document.getElementById('seo_desc_ru').value = seo.description_ru || '';
    document.getElementById('seo_keywords_ru').value = seo.keywords_ru || '';
    
    // Switch to AZ tab by default when opening modal
    switchLangTab('az');
    
    document.getElementById('editSeoModal').style.display = 'flex';
}
function closeModal(id) {
    document.getElementById(id).style.display = 'none';
}
</script>
