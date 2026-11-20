<div class="admin-header">
    <h2><?= \Core\Language::get('admin_user_edit_title') ?></h2>
    <a href="<?= APP_URL ?>/admin/users" class="btn-primary"><?= \Core\Language::get('admin_back2') ?></a>
</div>

<div class="admin-card">
    <form action="<?= APP_URL ?>/admin/users/edit/<?= $user['id'] ?>" method="POST">
        <div style="display:flex; gap:15px;">
            <div class="form-group" style="flex:1;">
                <label><?= \Core\Language::get('admin_user_first_name') ?></label>
                <input type="text" name="name" class="form-control" value="<?= htmlspecialchars($user['name']) ?>" required>
            </div>
            <div class="form-group" style="flex:1;">
                <label><?= \Core\Language::get('admin_user_last_name') ?></label>
                <input type="text" name="surname" class="form-control" value="<?= htmlspecialchars($user['surname'] ?? '') ?>">
            </div>
        </div>

        <div class="form-group">
            <label><?= \Core\Language::get('admin_user_email') ?></label>
            <input type="email" name="email" class="form-control" value="<?= htmlspecialchars($user['email']) ?>" required>
        </div>

        <div class="form-group">
            <label><?= \Core\Language::get('admin_user_role') ?></label>
            <select name="role" class="form-control">
                <option value="user" <?= $user['role'] == 'user' ? 'selected' : '' ?>><?= \Core\Language::get('admin_role_user') ?? 'İstifadəçi' ?></option>
                <option value="admin" <?= $user['role'] == 'admin' ? 'selected' : '' ?>><?= \Core\Language::get('admin_role_admin') ?? 'Admin' ?></option>
                <option value="blog_writer" <?= $user['role'] == 'blog_writer' ? 'selected' : '' ?>>Blog Writer</option>
                <option value="content_creator" <?= $user['role'] == 'content_creator' ? 'selected' : '' ?>>Content Creator</option>
                <option value="owner" <?= $user['role'] == 'owner' ? 'selected' : '' ?>>Owner (Tam Səlahiyyət)</option>
            </select>
        </div>

        <div class="form-group" style="margin-top:20px; padding-top:20px; border-top:1px solid #eee;">
            <label><?= \Core\Language::get('admin_user_password') ?></label>
            <input type="password" name="password" class="form-control">
        </div>

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
        $userPerms = json_decode($user['permissions'] ?? '[]', true) ?: [];
        ?>
        <h3 style="margin-top: 30px; margin-bottom: 15px; border-bottom: 1px solid var(--border-color); padding-bottom: 10px;"><?= \Core\Language::get('admin_permissions') ?? 'Giriş İcazələri (Permissions)' ?></h3>
        <div style="display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 15px; margin-bottom: 30px;">
            <?php foreach ($modules as $key => $label): ?>
                <label style="display: flex; align-items: center; cursor: pointer; background: var(--bg-light); padding: 10px; border-radius: 4px; border: 1px solid var(--border-color);">
                    <input type="checkbox" name="permissions[]" value="<?= $key ?>" <?= in_array($key, $userPerms) ? 'checked' : '' ?> style="margin-right: 10px; width: 16px; height: 16px;">
                    <?= $label ?>
                </label>
            <?php endforeach; ?>
        </div>

        <button type="submit" class="btn-submit"><?= \Core\Language::get('admin_save_btn') ?></button>
    </form>
</div>
