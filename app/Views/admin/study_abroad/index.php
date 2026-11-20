<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
    <h2><?= \Core\Language::get('admin_study_abroad_title') ?></h2>
    <a href="<?= APP_URL ?>/admin/study-abroad/create" class="btn-sm btn-primary"><?= \Core\Language::get('admin_add_new') ?></a>
</div>
<div class="admin-card">
    <table class="admin-table">
        <thead>
            <tr>
                <th>ID</th>
                <th><?= \Core\Language::get('admin_country_col') ?></th>
                <th><?= \Core\Language::get('admin_url_slug') ?></th>
                <th><?= \Core\Language::get('admin_emeliyyat') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($records as $r): ?>
            <tr>
                <td><?= $r['id'] ?></td>
                <td style="font-weight: 500; color:var(--text-main);"><?= htmlspecialchars($r['country']) ?></td>
                <td style="color:var(--text-muted);"><?= htmlspecialchars($r['slug']) ?></td>
                <td>
                    <a href="<?= APP_URL ?>/admin/study-abroad/edit/<?= $r['id'] ?>" class="btn-sm" style="background:var(--bg-light); color:var(--primary); border:1px solid var(--border-color);"><?= \Core\Language::get('admin_edit') ?></a>
                    <a href="<?= APP_URL ?>/admin/study-abroad/delete/<?= $r['id'] ?>" class="btn-sm btn-danger" onclick="return confirm(<?= json_encode(\Core\Language::get('admin_delete_confirm')) ?>);"><?= \Core\Language::get('admin_delete') ?></a>
                </td>
            </tr>
            <?php endforeach; ?>
            <?php if(empty($records)): ?>
            <tr><td colspan="4" style="text-align:center; color:var(--text-muted); padding:30px;"><?= \Core\Language::get('admin_no_data') ?></td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
