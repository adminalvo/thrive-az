<?php $csrf_token = \Core\Security::generateCsrfToken(); ?>
<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
    <h2><?= \Core\Language::get('admin_graduates_title') ?></h2>
    <a href="<?= APP_URL ?>/admin/graduates/create" class="btn-sm btn-primary"><?= \Core\Language::get('admin_add_new') ?></a>
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
                <th><?= \Core\Language::get('admin_image') ?></th>
                <th><?= \Core\Language::get('admin_grad_name') ?></th>
                <th><?= \Core\Language::get('admin_grad_uni') ?></th>
                <th><?= \Core\Language::get('admin_grad_scholarship') ?></th>
                <th><?= \Core\Language::get('admin_emeliyyat') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($graduates as $g): ?>
            <tr>
                <td><?= $g['id'] ?></td>
                <td>
                    <?php if($g['image']): ?>
                        <img src="<?= APP_URL ?>/uploads/<?= htmlspecialchars($g['image']) ?>" width="50" style="border-radius:8px; box-shadow: var(--shadow-sm);">
                    <?php else: ?>
                        <span style="color:var(--text-muted);">-</span>
                    <?php endif; ?>
                </td>
                <td style="font-weight: 500; color:var(--text-main);"><?= htmlspecialchars($g['name']) ?></td>
                <td style="color:var(--text-muted);"><?= htmlspecialchars($g['university']) ?> <br><small><?= htmlspecialchars($g['country']) ?></small></td>
                <td style="color:var(--success); font-weight:500;"><?= htmlspecialchars($g['scholarship']) ?></td>
                <td>
                    <a href="<?= APP_URL ?>/admin/graduates/delete/<?= $g['id'] ?>?token=<?= htmlspecialchars($csrf_token) ?>" class="btn-sm btn-danger" onclick="return confirm(<?= json_encode(\Core\Language::get('admin_delete_confirm')) ?>);"><?= \Core\Language::get('admin_delete') ?></a>
                </td>
            </tr>
            <?php endforeach; ?>
            <?php if(empty($graduates)): ?>
            <tr><td colspan="6" style="text-align:center; color:var(--text-muted); padding:30px;"><?= \Core\Language::get('admin_no_data') ?></td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
