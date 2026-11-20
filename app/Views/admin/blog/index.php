<?php $csrf_token = \Core\Security::generateCsrfToken(); ?>
<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
    <h2><?= \Core\Language::get('admin_blog_list') ?></h2>
    <a href="<?= APP_URL ?>/admin/blog/create" class="btn-sm btn-primary"><?= \Core\Language::get('admin_add_new') ?></a>
</div>

<?php if(!empty($_SESSION['error'])): ?>
    <div style="padding: 15px; background: #fee2e2; color: #b91c1c; border-radius: 8px; margin-bottom: 20px;">
        <?= htmlspecialchars($_SESSION['error']) ?>
        <?php unset($_SESSION['error']); ?>
    </div>
<?php endif; ?>

<div class="admin-card">
    <table class="admin-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Şəkil</th>
                <th><?= \Core\Language::get('admin_blog_title_az') ?></th>
                <th><?= \Core\Language::get('admin_tarix') ?></th>
                <th><?= \Core\Language::get('admin_emeliyyat') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($blogs as $b): ?>
            <tr>
                <td><?= $b['id'] ?></td>
                <td>
                    <?php if($b['cover_image']): ?>
                        <img src="<?= APP_URL ?>/uploads/<?= htmlspecialchars($b['cover_image']) ?>" width="50" style="border-radius:8px; box-shadow: var(--shadow-sm);">
                    <?php else: ?>
                        <span style="color:var(--text-muted);">-</span>
                    <?php endif; ?>
                </td>
                <td style="font-weight: 500;"><?= htmlspecialchars($b['title']) ?></td>
                <td><?= date('d M Y', strtotime($b['created_at'])) ?></td>
                <td>
                    <a href="<?= APP_URL ?>/admin/blog/edit/<?= $b['id'] ?>" class="btn-sm" style="background:var(--bg-light); color:var(--primary); border:1px solid var(--border-color);"><?= \Core\Language::get('admin_edit') ?></a>
                    <a href="<?= APP_URL ?>/admin/blog/delete/<?= $b['id'] ?>?token=<?= htmlspecialchars($csrf_token) ?>" class="btn-sm btn-danger" onclick="return confirm(<?= json_encode(\Core\Language::get('admin_delete_confirm')) ?>);"><?= \Core\Language::get('admin_delete') ?></a>
                </td>
            </tr>
            <?php endforeach; ?>
            <?php if(empty($blogs)): ?>
            <tr>
                <td colspan="5" style="text-align:center; color:var(--text-muted); padding:30px;">Heç bir məqalə tapılmadı.</td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
