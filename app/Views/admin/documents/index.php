<div class="admin-header">
    <h2><?= \Core\Language::get('admin_documents_title') ?? 'Sənədlərin İdarəedilməsi' ?></h2>
    <p><?= \Core\Language::get('admin_documents_desc') ?? 'Şagirdlərin sistemə yüklədiyi sənədlər burada göstərilir. Siz sənədlərə baxaraq təsdiqləyə və ya rədd edə bilərsiniz.' ?></p>
</div>

<div class="admin-card">
    <div style="overflow-x: auto;">
        <table class="admin-table" style="width: 100%; border-collapse: collapse;">
            <thead>
                <tr>
                    <th style="padding: 15px; text-align: left; border-bottom: 2px solid #eee;"><?= \Core\Language::get('admin_user') ?? 'İstifadəçi' ?></th>
                    <th style="padding: 15px; text-align: left; border-bottom: 2px solid #eee;"><?= \Core\Language::get('admin_document_type') ?? 'Sənəd Növü' ?></th>
                    <th style="padding: 15px; text-align: center; border-bottom: 2px solid #eee;"><?= \Core\Language::get('admin_status') ?? 'Status' ?></th>
                    <th style="padding: 15px; text-align: right; border-bottom: 2px solid #eee;"><?= \Core\Language::get('admin_tarix') ?? 'Tarix' ?></th>
                    <th style="padding: 15px; text-align: right; border-bottom: 2px solid #eee;"><?= \Core\Language::get('admin_emeliyyat') ?? 'Əməliyyat' ?></th>
                </tr>
            </thead>
            <tbody>
                <?php if(empty($documents)): ?>
                <tr>
                    <td colspan="5" style="padding: 30px; text-align: center; color: var(--text-secondary);"><?= \Core\Language::get('admin_no_documents') ?? 'Gözləyən və ya yüklənmiş sənəd yoxdur.' ?></td>
                </tr>
                <?php else: ?>
                    <?php foreach($documents as $doc): ?>
                    <tr>
                        <td style="padding: 15px; border-bottom: 1px solid var(--border-color);">
                            <strong><?= htmlspecialchars($doc['name'] . ' ' . $doc['surname']) ?></strong><br>
                            <small style="color: var(--text-secondary);"><?= htmlspecialchars($doc['email']) ?></small>
                            <?php 
                                $db = \Core\Database::getInstance();
                                $uStmt = $db->prepare("SELECT fin_code FROM users WHERE id = ?");
                                $uStmt->execute([$doc['user_id']]);
                                $uData = $uStmt->fetch();
                                if($uData && !empty($uData['fin_code'])):
                            ?>
                                <br><small style="color: var(--aqua-teal); font-weight: bold;">FİN: <?= htmlspecialchars($uData['fin_code']) ?></small>
                            <?php endif; ?>
                        </td>
                        <td style="padding: 15px; border-bottom: 1px solid var(--border-color); font-weight: 500;">
                            <?= htmlspecialchars($doc['document_type']) ?>
                        </td>
                        <td style="padding: 15px; text-align: center; border-bottom: 1px solid var(--border-color);">
                            <?php 
                                $bg = '#fff3cd'; $color = '#856404'; // Gözləmədə
                                if($doc['status'] == 'Təsdiqləndi') { $bg = '#d4edda'; $color = '#155724'; } // Yaşıl
                                if($doc['status'] == 'Rədd edildi') { $bg = '#f8d7da'; $color = '#721c24'; } // Qırmızı
                            ?>
                            <span style="display: inline-block; padding: 4px 10px; background: <?= $bg ?>; color: <?= $color ?>; border-radius: 4px; font-size: 0.85rem; font-weight: bold;">
                                <?= htmlspecialchars($doc['status']) ?>
                            </span>
                        </td>
                        <td style="padding: 15px; text-align: center; border-bottom: 1px solid var(--border-color);">
                            <?= date('d.m.Y H:i', strtotime($doc['created_at'])) ?>
                        </td>
                        <td style="padding: 15px; text-align: right; border-bottom: 1px solid var(--border-color);">
                            <a href="<?= APP_URL . $doc['file_path'] ?>" target="_blank" class="btn" style="background: var(--aqua-teal); color: #fff; padding: 6px 12px; border-radius: 4px; text-decoration: none; font-size: 0.85rem; display: inline-block; margin-bottom: 5px;"><?= \Core\Language::get('admin_view') ?? 'Bax' ?></a>
                            <button onclick="openStatusModal(<?= $doc['id'] ?>, '<?= $doc['status'] ?>', '<?= htmlspecialchars(addslashes($doc['admin_comment'] ?? '')) ?>')" class="btn" style="background: var(--deep-navy); color: #fff; padding: 6px 12px; border-radius: 4px; border: none; cursor: pointer; font-size: 0.85rem;"><?= \Core\Language::get('admin_change_status_btn') ?></button>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Status Modal -->
<div id="statusModal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); z-index: 9999; align-items: center; justify-content: center;">
    <div style="background: var(--card-bg); width: 400px; padding: 25px; border-radius: 8px; box-shadow: 0 15px 40px var(--shadow-heavy);">
        <h3 style="margin-top: 0; margin-bottom: 15px;"><?= \Core\Language::get('admin_change_status_title') ?></h3>
        <form id="statusForm" action="" method="POST">
            <div style="margin-bottom: 15px;">
                <label style="display: block; margin-bottom: 5px; font-weight: 600;"><?= \Core\Language::get('admin_status') ?? 'Status' ?></label>
                <select name="status" id="modalStatus" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; outline: none;">
                    <option value="Gözləmədə"><?= \Core\Language::get('admin_doc_pending') ?></option>
                    <option value="Təsdiqləndi"><?= \Core\Language::get('admin_doc_approved') ?></option>
                    <option value="Rədd edildi"><?= \Core\Language::get('admin_doc_rejected') ?></option>
                </select>
            </div>
            <div style="margin-bottom: 20px;">
                <label style="display: block; margin-bottom: 5px; font-weight: 600;"><?= \Core\Language::get('admin_status_comment') ?? 'Şərh / Səbəb (Rədd edildikdə mütləqdir)' ?></label>
                <textarea name="admin_comment" id="modalComment" rows="3" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; outline: none;"></textarea>
            </div>
            <div style="display: flex; justify-content: flex-end; gap: 10px;">
                <button type="button" onclick="closeStatusModal()" style="padding: 10px 15px; background: #eee; border: none; border-radius: 4px; cursor: pointer;"><?= \Core\Language::get('admin_cancel') ?? 'Ləğv et' ?></button>
                <button type="submit" style="padding: 10px 15px; background: var(--aqua-teal); color: #fff; border: none; border-radius: 4px; cursor: pointer; font-weight: 600;"><?= \Core\Language::get('admin_save') ?? 'Yadda Saxla' ?></button>
            </div>
        </form>
    </div>
</div>

<script>
function openStatusModal(id, currentStatus, currentComment) {
    var modal = document.getElementById('statusModal');
    var form = document.getElementById('statusForm');
    var statusSelect = document.getElementById('modalStatus');
    var commentArea = document.getElementById('modalComment');

    form.action = '<?= APP_URL ?>/admin/documents/' + id + '/status';
    statusSelect.value = currentStatus;
    commentArea.value = currentComment;
    
    modal.style.display = 'flex';
}

function closeStatusModal() {
    document.getElementById('statusModal').style.display = 'none';
}
</script>

