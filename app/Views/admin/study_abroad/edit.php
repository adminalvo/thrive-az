<div class="form-container">
    <div style="margin-bottom:20px;">
        <a href="<?= APP_URL ?>/admin/study-abroad" class="btn-sm btn-secondary"><?= \Core\Language::get('admin_back') ?? 'Geri' ?></a>
    </div>
    <form action="<?= APP_URL ?>/admin/study-abroad/edit/<?= $record['id'] ?>" method="POST">
        
        <div class="lang-tabs">
            <div class="lang-tab active" data-lang="az">Azərbaycan (AZ)</div>
            <div class="lang-tab" data-lang="en">İngilis (EN)</div>
            <div class="lang-tab" data-lang="ru">Rus (RU)</div>
        </div>

        <!-- AZ Tab -->
        <div class="lang-content active" id="lang-az">
            <div class="form-group">
                <label><?= \Core\Language::get('admin_country_az') ?? 'Ölkə Adı (AZ)' ?></label>
                <input type="text" name="country_az" class="form-control" value="<?= htmlspecialchars($record['country']) ?>" required>
            </div>
            <div class="form-group">
                <label><?= \Core\Language::get('admin_universities_az') ?? 'Universitetlər (AZ)' ?></label>
                <textarea name="universities_az" class="form-control rich-text"><?= htmlspecialchars($record['universities']) ?></textarea>
            </div>
            <div class="form-group">
                <label><?= \Core\Language::get('admin_admission_az') ?? 'Qəbul Prosesi (AZ)' ?></label>
                <textarea name="admission_process_az" class="form-control rich-text"><?= htmlspecialchars($record['admission_process']) ?></textarea>
            </div>
            <div class="form-group">
                <label><?= \Core\Language::get('admin_req_docs_az') ?? 'Tələb Olunan Sənədlər (AZ)' ?></label>
                <textarea name="required_docs_az" class="form-control rich-text"><?= htmlspecialchars($record['required_docs']) ?></textarea>
            </div>
            <div class="form-group">
                <label><?= \Core\Language::get('admin_visa_az') ?? 'Viza Prosesi (AZ)' ?></label>
                <textarea name="visa_process_az" class="form-control rich-text"><?= htmlspecialchars($record['visa_process']) ?></textarea>
            </div>
            <div class="form-group">
                <label><?= \Core\Language::get('admin_faq_az') ?? 'Tez-tez Verilən Suallar (AZ)' ?></label>
                <textarea name="faq_az" class="form-control rich-text"><?= htmlspecialchars($record['faq']) ?></textarea>
            </div>
        </div>

        <!-- EN Tab -->
        <div class="lang-content" id="lang-en">
            <div class="form-group">
                <label><?= \Core\Language::get('admin_country_en') ?? 'Ölkə Adı (EN)' ?></label>
                <input type="text" name="country_en" class="form-control" value="<?= htmlspecialchars($record['country_en']) ?>">
            </div>
            <div class="form-group">
                <label><?= \Core\Language::get('admin_universities_en') ?? 'Universities (EN)' ?></label>
                <textarea name="universities_en" class="form-control rich-text"><?= htmlspecialchars($record['universities_en']) ?></textarea>
            </div>
            <div class="form-group">
                <label><?= \Core\Language::get('admin_admission_en') ?? 'Admission Process (EN)' ?></label>
                <textarea name="admission_process_en" class="form-control rich-text"><?= htmlspecialchars($record['admission_process_en']) ?></textarea>
            </div>
            <div class="form-group">
                <label><?= \Core\Language::get('admin_req_docs_en') ?? 'Required Documents (EN)' ?></label>
                <textarea name="required_docs_en" class="form-control rich-text"><?= htmlspecialchars($record['required_docs_en']) ?></textarea>
            </div>
            <div class="form-group">
                <label><?= \Core\Language::get('admin_visa_en') ?? 'Visa Process (EN)' ?></label>
                <textarea name="visa_process_en" class="form-control rich-text"><?= htmlspecialchars($record['visa_process_en']) ?></textarea>
            </div>
            <div class="form-group">
                <label><?= \Core\Language::get('admin_faq_en') ?? 'FAQ (EN)' ?></label>
                <textarea name="faq_en" class="form-control rich-text"><?= htmlspecialchars($record['faq_en']) ?></textarea>
            </div>
        </div>

        <!-- RU Tab -->
        <div class="lang-content" id="lang-ru">
            <div class="form-group">
                <label><?= \Core\Language::get('admin_country_ru') ?? 'Страна (RU)' ?></label>
                <input type="text" name="country_ru" class="form-control" value="<?= htmlspecialchars($record['country_ru']) ?>">
            </div>
            <div class="form-group">
                <label><?= \Core\Language::get('admin_universities_ru') ?? 'Университеты (RU)' ?></label>
                <textarea name="universities_ru" class="form-control rich-text"><?= htmlspecialchars($record['universities_ru']) ?></textarea>
            </div>
            <div class="form-group">
                <label><?= \Core\Language::get('admin_admission_ru') ?? 'Процесс приема (RU)' ?></label>
                <textarea name="admission_process_ru" class="form-control rich-text"><?= htmlspecialchars($record['admission_process_ru']) ?></textarea>
            </div>
            <div class="form-group">
                <label><?= \Core\Language::get('admin_req_docs_ru') ?? 'Необходимые документы (RU)' ?></label>
                <textarea name="required_docs_ru" class="form-control rich-text"><?= htmlspecialchars($record['required_docs_ru']) ?></textarea>
            </div>
            <div class="form-group">
                <label><?= \Core\Language::get('admin_visa_ru') ?? 'Визовый процесс (RU)' ?></label>
                <textarea name="visa_process_ru" class="form-control rich-text"><?= htmlspecialchars($record['visa_process_ru']) ?></textarea>
            </div>
            <div class="form-group">
                <label><?= \Core\Language::get('admin_faq_ru') ?? 'FAQ (RU)' ?></label>
                <textarea name="faq_ru" class="form-control rich-text"><?= htmlspecialchars($record['faq_ru']) ?></textarea>
            </div>
        </div>

        <h4 style="margin:20px 0; border-bottom:1px solid #ccc; padding-bottom:10px;"><?= \Core\Language::get('admin_seo_settings') ?? 'SEO Tənzimləmələri' ?></h4>
        <div class="form-group">
            <label><?= \Core\Language::get('admin_meta_title') ?? 'Meta Title' ?></label>
            <input type="text" name="meta_title" class="form-control" value="<?= htmlspecialchars($record['meta_title']) ?>">
        </div>
        <div class="form-group">
            <label><?= \Core\Language::get('admin_meta_desc') ?? 'Meta Description' ?></label>
            <textarea name="meta_desc" class="form-control" style="min-height:80px;"><?= htmlspecialchars($record['meta_desc']) ?></textarea>
        </div>

        <button type="submit" class="btn-submit"><?= \Core\Language::get('admin_save_btn') ?? 'Yadda Saxla' ?></button>
    </form>
</div>
<script>
    document.querySelector('form').addEventListener('invalid', function(e) {
        const invalidInput = e.target;
        const parentTab = invalidInput.closest('.lang-content');
        if(parentTab && !parentTab.classList.contains('active')) {
            const lang = parentTab.id.replace('lang-', '');
            const tabBtn = document.querySelector('.lang-tab[data-lang="' + lang + '"]');
            if(tabBtn) {
                tabBtn.click();
                invalidInput.focus();
            }
        }
    }, true);
</script>
