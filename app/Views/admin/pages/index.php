<div class="admin-header" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
    <h2><i class="fas fa-file-alt" style="color: var(--primary); margin-right: 10px;"></i> <?= \Core\Language::get('admin_pages_title') ?></h2>
    <a href="<?= APP_URL ?>/admin/pages/create" class="btn-primary" style="background: var(--primary); color: #fff; padding: 10px 20px; border-radius: 8px; text-decoration: none; display: flex; align-items: center; gap: 8px;">
        <i class="fas fa-plus"></i> <?= \Core\Language::get('admin_new_page') ?>
    </a>
</div>

<div class="admin-card" style="background: #1e293b; border-radius: 12px; border: 1px solid rgba(255,255,255,0.05); overflow: hidden;">
    <table style="width: 100%; border-collapse: collapse; text-align: left; color: #f8fafc;">
        <thead>
            <tr style="background: rgba(0,0,0,0.2); border-bottom: 1px solid rgba(255,255,255,0.05);">
                <th style="padding: 15px 20px;"><?= \Core\Language::get('admin_page_title_col') ?></th>
                <th style="padding: 15px 20px;"><?= \Core\Language::get('admin_page_url') ?></th>
                <th style="padding: 15px 20px;"><?= \Core\Language::get('admin_page_status') ?></th>
                <th style="padding: 15px 20px;"><?= \Core\Language::get('admin_page_created') ?></th>
                <th style="padding: 15px 20px; text-align: right;"><?= \Core\Language::get('admin_emeliyyat') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php if(empty($pages)): ?>
                <tr>
                    <td colspan="5" style="padding: 20px; text-align: center; color: #94a3b8;"><?= \Core\Language::get('admin_page_no_data') ?></td>
                </tr>
            <?php else: ?>
                <?php foreach($pages as $page): ?>
                <tr style="border-bottom: 1px solid rgba(255,255,255,0.05);">
                    <td style="padding: 15px 20px; font-weight: 500;"><?= htmlspecialchars($page['title']) ?></td>
                    <td style="padding: 15px 20px; color: #94a3b8;">/<?= htmlspecialchars($page['slug']) ?></td>
                    <td style="padding: 15px 20px;">
                        <?php if($page['status'] == 1): ?>
                            <span style="background: rgba(16, 185, 129, 0.2); color: #10b981; padding: 4px 10px; border-radius: 20px; font-size: 0.8rem;"><?= \Core\Language::get('admin_page_active') ?></span>
                        <?php else: ?>
                            <span style="background: rgba(245, 158, 11, 0.2); color: #f59e0b; padding: 4px 10px; border-radius: 20px; font-size: 0.8rem;"><?= \Core\Language::get('admin_page_draft') ?></span>
                        <?php endif; ?>
                    </td>
                    <td style="padding: 15px 20px; color: var(--text-secondary);"><?= date('d M Y', strtotime($page['created_at'])) ?></td>
                    <td style="padding: 15px 20px; text-align: right;">
                        <a href="<?= APP_URL ?>/admin/pages/edit/<?= $page['id'] ?>" class="btn-sm" style="background: rgba(255,255,255,0.1); color: #fff; padding: 6px 12px; border-radius: 6px; text-decoration: none; font-size: 0.85rem; margin-right: 5px;">
                            <i class="fas fa-edit"></i> <?= \Core\Language::get('admin_design') ?>
                        </a>
                        <a href="<?= APP_URL ?>/admin/pages/delete/<?= $page['id'] ?>" class="btn-sm btn-danger" style="background: rgba(239, 68, 68, 0.1); color: #ef4444; padding: 6px 12px; border-radius: 6px; text-decoration: none; font-size: 0.85rem;" onclick="return confirm(<?= json_encode(\Core\Language::get('admin_delete_confirm')) ?>);">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>
