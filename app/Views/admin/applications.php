<div class="admin-header">
    <h2><?= \Core\Language::get('admin_applications_title') ?? 'Müraciətlər' ?></h2>
    <p><?= \Core\Language::get('admin_applications_desc') ?? 'İstifadəçilərin təhsil üçün etdiyi müraciətləri və onların statusunu idarə edin.' ?></p>
</div>

<div class="admin-card">
    <div style="overflow-x: auto;">
        <table class="admin-table" style="width: 100%; border-collapse: collapse;">
            <thead>
                <tr>
                    <th style="padding: 15px; text-align: left; border-bottom: 2px solid #eee;">ID</th>
                    <th style="padding: 15px; text-align: left; border-bottom: 2px solid #eee;"><?= \Core\Language::get('admin_student') ?? 'Tələbə' ?></th>
                    <th style="padding: 15px; text-align: left; border-bottom: 2px solid #eee;"><?= \Core\Language::get('admin_contact') ?? 'Əlaqə' ?></th>
                    <th style="padding: 15px; text-align: left; border-bottom: 2px solid #eee;"><?= \Core\Language::get('admin_program') ?? 'Proqram' ?></th>
                    <th style="padding: 15px; text-align: center; border-bottom: 2px solid #eee;"><?= \Core\Language::get('admin_tarix') ?? 'Tarix' ?></th>
                    <th style="padding: 15px; text-align: center; border-bottom: 2px solid #eee;"><?= \Core\Language::get('admin_status') ?? 'Status' ?></th>
                    <th style="padding: 15px; text-align: right; border-bottom: 2px solid #eee;"><?= \Core\Language::get('admin_emeliyyat') ?? 'Əməliyyat' ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($applications as $app): ?>
                <tr>
                    <td style="padding: 15px; border-bottom: 1px solid var(--border-color);"><?= $app['id'] ?></td>
                    <td style="padding: 15px; border-bottom: 1px solid var(--border-color);">
                        <strong><?= htmlspecialchars($app['name'] . ' ' . $app['surname']) ?></strong>
                    </td>
                    <td style="padding: 15px; border-bottom: 1px solid var(--border-color);">
                        <?= htmlspecialchars($app['email']) ?><br>
                        <small style="color: var(--text-secondary);"><?= htmlspecialchars($app['phone'] ?? '-') ?></small>
                    </td>
                    <td style="padding: 15px; border-bottom: 1px solid var(--border-color);">
                        <strong style="color: var(--aqua-teal);"><?= htmlspecialchars($app['program_type']) ?></strong>
                    </td>
                    <td style="padding: 15px; text-align: center; border-bottom: 1px solid var(--border-color);">
                        <?= date('d.m.Y H:i', strtotime($app['created_at'])) ?>
                    </td>
                    <td style="padding: 15px; text-align: center; border-bottom: 1px solid var(--border-color);">
                        <?php 
                            $bg = '#fff3cd'; $color = '#856404'; 
                            $statusDisplay = \Core\Language::get('admin_app_pending') ?? 'Gözləmədə';
                            
                            if($app['status'] == 'Qəbul edildi') { 
                                $bg = '#d4edda'; $color = '#155724'; 
                                $statusDisplay = \Core\Language::get('admin_app_accepted') ?? 'Qəbul edildi';
                            }
                            if($app['status'] == 'İmtina') { 
                                $bg = '#f8d7da'; $color = '#721c24'; 
                                $statusDisplay = \Core\Language::get('admin_app_rejected') ?? 'İmtina';
                            }
                        ?>
                        <span style="display: inline-block; padding: 4px 10px; background: <?= $bg ?>; color: <?= $color ?>; border-radius: 4px; font-size: 0.85rem; font-weight: bold;">
                            <?= htmlspecialchars($statusDisplay) ?>
                        </span>
                    </td>
                    <td style="padding: 15px; text-align: right; border-bottom: 1px solid var(--border-color);">
                        <form action="<?= APP_URL ?>/admin/applications/status/<?= $app['id'] ?>" method="POST" style="display: flex; gap: 5px; justify-content: flex-end;">
                            <select name="status" style="padding: 6px; border: 1px solid #ccc; border-radius: 4px; outline: none;">
                                <option value="Gözləmədə" <?= $app['status'] == 'Gözləmədə' ? 'selected' : '' ?>><?= \Core\Language::get('admin_app_pending') ?></option>
                                <option value="Qəbul edildi" <?= $app['status'] == 'Qəbul edildi' ? 'selected' : '' ?>><?= \Core\Language::get('admin_app_accepted') ?></option>
                                <option value="İmtina" <?= $app['status'] == 'İmtina' ? 'selected' : '' ?>><?= \Core\Language::get('admin_app_rejected') ?></option>
                            </select>
                            <button type="submit" title="<?= \Core\Language::get('admin_update') ?? 'Yenilə' ?>" style="background: var(--aqua-teal); color: #fff; border: none; padding: 6px 12px; border-radius: 4px; cursor: pointer; display: flex; align-items: center; justify-content: center; transition: background 0.2s;">
                                <i class="fas fa-check"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
                <?php if(empty($applications)): ?>
                <tr>
                    <td colspan="7" style="text-align: center; padding: 30px; color: var(--text-secondary);"><?= \Core\Language::get('admin_no_applications') ?? 'Hələ heç bir müraciət yoxdur.' ?></td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
