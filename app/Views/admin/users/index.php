<div class="admin-header" style="display: flex; justify-content: space-between; align-items: center;">
    <h2><?= \Core\Language::get('admin_users') ?? 'İstifadəçilər' ?></h2>
    <a href="<?= APP_URL ?>/admin/users/create" class="btn-action" style="background: var(--aqua-teal); color: white; padding: 10px 20px; text-decoration: none; border-radius: 4px;">+ <?= \Core\Language::get('admin_create_user') ?? 'Yeni İstifadəçi' ?></a>
</div>

<div class="admin-card">
    <div style="overflow-x: auto;">
        <table class="admin-table" style="width: 100%; border-collapse: collapse;">
            <thead>
                <tr>
                    <th style="padding: 15px; border-bottom: 2px solid #eee; text-align: left;">ID</th>
                    <th style="padding: 15px; border-bottom: 2px solid #eee; text-align: left;"><?= \Core\Language::get('admin_full_name') ?? 'Ad Soyad' ?></th>
                    <th style="padding: 15px; border-bottom: 2px solid #eee; text-align: left;"><?= \Core\Language::get('admin_registration_details') ?? 'Qeydiyyat Məlumatları' ?></th>
                    <th style="padding: 15px; border-bottom: 2px solid #eee; text-align: left;"><?= \Core\Language::get('admin_user_email') ?? 'E-mail' ?></th>
                    <th style="padding: 15px; border-bottom: 2px solid #eee; text-align: center;"><?= \Core\Language::get('admin_role') ?? 'Rol' ?></th>
                    <th style="padding: 15px; border-bottom: 2px solid #eee; text-align: center;"><?= \Core\Language::get('admin_date') ?? 'Tarix' ?></th>
                    <th style="padding: 15px; border-bottom: 2px solid #eee; text-align: right;"><?= \Core\Language::get('admin_actions') ?? 'Əməliyyatlar' ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($users as $user): ?>
                    <tr>
                        <td style="padding: 15px; border-bottom: 1px solid var(--border-color);"><?= $user['id'] ?></td>
                        <td style="padding: 15px; border-bottom: 1px solid var(--border-color);">
                            <strong><?= htmlspecialchars($user['name'] . ' ' . ($user['surname'] ?? '')) ?></strong>
                        </td>
                        <td style="padding: 15px; border-bottom: 1px solid var(--border-color); font-size: 0.85rem; color: var(--text-secondary);">
                            <?php if(!empty($user['fin_code'])): ?>
                            <span style="display:inline-block; margin-bottom:3px;"><strong><?= \Core\Language::get('admin_fin') ?? 'FİN' ?>:</strong> <?= htmlspecialchars($user['fin_code']) ?></span><br>
                            <?php endif; ?>
                            <?php if(!empty($user['id_serial'])): ?>
                            <span style="display:inline-block; margin-bottom:3px;"><strong><?= \Core\Language::get('admin_id_serial') ?? 'Ş.V. Seriya' ?>:</strong> <?= htmlspecialchars($user['id_serial']) ?></span><br>
                            <?php endif; ?>
                            <?php if(!empty($user['dob'])): ?>
                            <span><strong><?= \Core\Language::get('admin_dob') ?? 'D.Tarixi' ?>:</strong> <?= htmlspecialchars($user['dob']) ?></span>
                            <?php endif; ?>
                        </td>
                        <td style="padding: 15px; border-bottom: 1px solid var(--border-color); font-size: 0.9rem;">
                            <?= htmlspecialchars($user['email']) ?>
                        </td>
                        <td style="padding: 15px; border-bottom: 1px solid var(--border-color); text-align: center;">
                            <span style="padding:4px 10px; border-radius:4px; font-size:12px; font-weight:bold; background: <?= $user['role'] == 'admin' || $user['role'] == 'owner' ? 'var(--aqua-teal)' : '#f1f5f9' ?>; color: <?= $user['role'] == 'admin' || $user['role'] == 'owner' ? '#fff' : 'var(--deep-navy)' ?>;">
                                <?php
                                $rNames = [
                                    'admin' => 'Admin',
                                    'owner' => 'Owner',
                                    'blog_writer' => 'Blog Writer',
                                    'content_creator' => 'Content Creator',
                                    'user' => 'İstifadəçi'
                                ];
                                echo $rNames[$user['role']] ?? strtoupper(str_replace('_', ' ', $user['role']));
                                ?>
                            </span>
                        </td>
                        <td style="padding: 15px; border-bottom: 1px solid var(--border-color); text-align: center; font-size: 0.9rem;">
                            <?= date('d M Y', strtotime($user['created_at'])) ?>
                        </td>
                        <td style="padding: 15px; border-bottom: 1px solid var(--border-color); text-align: right;">
                            <a href="<?= APP_URL ?>/admin/users/edit/<?= $user['id'] ?>" class="btn-action btn-edit" style="background: var(--aqua-teal); color: white; padding: 6px 12px; text-decoration: none; border-radius: 4px; font-size: 0.85rem;"><?= \Core\Language::get('admin_edit') ?? 'Redaktə' ?></a>
                            <?php if($user['id'] != 1): ?>
                                <a href="<?= APP_URL ?>/admin/users/delete/<?= $user['id'] ?>" class="btn-action btn-delete" style="background: #ef4444; color: white; padding: 6px 12px; text-decoration: none; border-radius: 4px; font-size: 0.85rem; margin-left: 5px;" onclick="return confirm(\Core\Language::get('admin_delete_confirm') ?? 'Silmək istədiyinizə əminsiniz?');"><?= \Core\Language::get('admin_delete') ?? 'Sil' ?></a>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
