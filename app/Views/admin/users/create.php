<?php
$modules = [
    'users' => \Core\Language::get('admin_users_mod') ?? 'İstifadəçiləri İdarəetmə',
    'courses' => \Core\Language::get('admin_courses_mod') ?? 'Kurslar',
    'countries' => \Core\Language::get('admin_countries_mod') ?? 'Ölkələr',
    'universities' => \Core\Language::get('admin_universities_mod') ?? 'Universitetlər',
    'self_study' => \Core\Language::get('admin_self_study_mod') ?? 'Self Study',
    'graduates' => \Core\Language::get('admin_graduates_mod') ?? 'Məzunlar',
    'applications' => \Core\Language::get('admin_applications_mod') ?? 'Müraciətlər',
    'documents' => \Core\Language::get('admin_documents_mod') ?? 'Sənədlər',
    'blog' => \Core\Language::get('admin_blog_mod') ?? 'Bloq',
    'messages' => \Core\Language::get('admin_messages_mod') ?? 'Mesajlar',
    'live_chat' => \Core\Language::get('admin_live_chat_mod') ?? 'Canlı Dəstək',
    'seo' => \Core\Language::get('admin_seo_mod') ?? 'SEO İdarəetmə',
    'security' => \Core\Language::get('admin_security_mod') ?? 'Təhlükəsizlik',
    'logs' => \Core\Language::get('admin_logs_mod') ?? 'Sistem Loqları'
];
?>

<div class="admin-header">
    <a href="<?= APP_URL ?>/admin/users" class="btn-action" style="margin-bottom: 20px; display: inline-block;">&larr; <?= \Core\Language::get('admin_back2') ?? 'Geri' ?></a>
    <h2><?= \Core\Language::get('admin_create_user_title') ?? 'İstifadəçi Yarat' ?></h2>
</div>

<div class="admin-card">
    <form action="<?= APP_URL ?>/admin/users/create" method="POST" style="max-width: 800px;">
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
            <div class="form-group" style="margin-bottom: 15px;">
                <label style="display: block; margin-bottom: 5px;"><?= \Core\Language::get('admin_user_first_name') ?? 'Ad' ?></label>
                <input type="text" name="name" class="form-control" required style="width: 100%; padding: 10px; border: 1px solid var(--border-color); border-radius: 4px;">
            </div>
            <div class="form-group" style="margin-bottom: 15px;">
                <label style="display: block; margin-bottom: 5px;"><?= \Core\Language::get('admin_user_last_name') ?? 'Soyad' ?></label>
                <input type="text" name="surname" class="form-control" style="width: 100%; padding: 10px; border: 1px solid var(--border-color); border-radius: 4px;">
            </div>
        </div>

        <div class="form-group" style="margin-bottom: 15px;">
            <label style="display: block; margin-bottom: 5px;"><?= \Core\Language::get('admin_user_email') ?? 'E-mail' ?></label>
            <input type="email" name="email" class="form-control" required style="width: 100%; padding: 10px; border: 1px solid var(--border-color); border-radius: 4px;">
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
            <div class="form-group" style="margin-bottom: 15px;">
                <label style="display: block; margin-bottom: 5px;"><?= \Core\Language::get('admin_user_password_req') ?? 'Şifrə (Mütləqdir)' ?></label>
                <input type="password" name="password" class="form-control" required style="width: 100%; padding: 10px; border: 1px solid var(--border-color); border-radius: 4px;">
            </div>
            <div class="form-group" style="margin-bottom: 15px;">
                <label style="display: block; margin-bottom: 5px;"><?= \Core\Language::get('admin_user_role') ?? 'Rol' ?></label>
                <select name="role" class="form-control" style="width: 100%; padding: 10px; border: 1px solid var(--border-color); border-radius: 4px;">
                    <option value="user"><?= \Core\Language::get('admin_role_user') ?? 'User' ?></option>
                    <option value="admin"><?= \Core\Language::get('admin_role_admin') ?? 'Admin' ?></option>
                    <option value="content_creator">Content Creator</option>
                    <option value="blog_writer">Blog Writer</option>
                </select>
            </div>
        </div>

        <h3 style="margin-top: 30px; margin-bottom: 15px; border-bottom: 1px solid var(--border-color); padding-bottom: 10px;"><?= \Core\Language::get('admin_permissions') ?? 'Giriş İcazələri (Permissions)' ?></h3>
        <p style="font-size: 0.9rem; color: var(--text-secondary); margin-bottom: 20px;">
            <?= \Core\Language::get('admin_permissions_desc') ?? 'Bu istifadəçinin admin paneldə hansı modullara daxil ola biləcəyini seçin (Rolundan asılı olmayaraq, yalnız seçilmiş bölmələri görəcək).' ?>
        </p>

        <div style="display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 15px; margin-bottom: 30px;">
            <?php foreach ($modules as $key => $label): ?>
                <label style="display: flex; align-items: center; cursor: pointer; background: var(--bg-light); padding: 10px; border-radius: 4px; border: 1px solid var(--border-color);">
                    <input type="checkbox" name="permissions[]" value="<?= $key ?>" style="margin-right: 10px; width: 16px; height: 16px;">
                    <?= $label ?>
                </label>
            <?php endforeach; ?>
        </div>

        <button type="submit" class="btn-action" style="background: var(--aqua-teal); color: white; padding: 12px 25px; border: none; border-radius: 4px; cursor: pointer; font-size: 1rem; width: 100%;">
            <?= \Core\Language::get('admin_save_btn') ?? 'Yadda Saxla' ?>
        </button>
    </form>
</div>
