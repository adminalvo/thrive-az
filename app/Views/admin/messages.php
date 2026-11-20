<div class="admin-card">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h2><?= \Core\Language::get('admin_messages_title') ?></h2>
    </div>

    <table class="admin-table">
        <thead>
            <tr>
                <th><?= \Core\Language::get('admin_msg_status') ?></th>
                <th><?= \Core\Language::get('admin_msg_sender') ?></th>
                <th><?= \Core\Language::get('admin_msg_contact') ?></th>
                <th><?= \Core\Language::get('admin_msg_subject') ?></th>
                <th><?= \Core\Language::get('admin_tarix') ?></th>
                <th><?= \Core\Language::get('admin_emeliyyat') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($messages as $msg): ?>
            <tr style="<?= $msg['status'] == 0 ? 'background: rgba(45,212,191,0.05); font-weight: bold;' : '' ?>">
                <td>
                    <?php if($msg['status'] == 0): ?>
                        <span style="padding: 4px 8px; border-radius: 4px; font-size: 0.8rem; background: rgba(220,53,69,0.2); color: #ff6b6b;"><?= \Core\Language::get('admin_msg_unread') ?></span>
                    <?php else: ?>
                        <span style="padding: 4px 8px; border-radius: 4px; font-size: 0.8rem; background: rgba(45,212,191,0.1); color: #2dd4bf;"><?= \Core\Language::get('admin_msg_read') ?></span>
                    <?php endif; ?>
                </td>
                <td><?= htmlspecialchars($msg['name'] . ' ' . $msg['surname'], ENT_QUOTES, 'UTF-8') ?></td>
                <td>
                    <?= htmlspecialchars($msg['email'], ENT_QUOTES, 'UTF-8') ?><br>
                    <small style="color: var(--text-muted); font-weight: normal;"><?= htmlspecialchars($msg['phone'] ?? '-', ENT_QUOTES, 'UTF-8') ?></small>
                </td>
                <td><?= htmlspecialchars($msg['subject'] ?? '-', ENT_QUOTES, 'UTF-8') ?></td>
                <td style="font-weight: normal;"><?= date('d.m.Y H:i', strtotime($msg['created_at'])) ?></td>
                <td>
                    <button class="btn-sm btn-primary" onclick="viewMessage(<?= $msg['id'] ?>)"><?= \Core\Language::get('admin_view') ?></button>
                    <?php if($msg['status'] == 0): ?>
                        <a href="<?= APP_URL ?>/admin/messages/read/<?= $msg['id'] ?>" class="btn-sm" style="background: var(--aqua-teal); color: #fff;"><?= \Core\Language::get('admin_msg_mark_read') ?></a>
                    <?php endif; ?>
                    <a href="<?= APP_URL ?>/admin/messages/delete/<?= $msg['id'] ?>" class="btn-sm" style="background:#dc3545; color:#fff;" onclick="return confirm('<?= \Core\Language::get('admin_delete_confirm') ?>')"><?= \Core\Language::get('admin_delete') ?></a>
                </td>
            </tr>

            <!-- Hidden Message Content Row -->
            <tr id="msg-content-<?= $msg['id'] ?>" style="display: none; background: rgba(255,255,255,0.02);">
                <td colspan="6" style="padding: 20px;">
                    <div style="border-left: 3px solid var(--aqua-teal); padding-left: 15px; font-weight: normal; color: var(--text-primary); white-space: pre-wrap; font-size: 1.05rem; line-height: 1.6; background: var(--card-bg); padding: 15px; border-radius: 8px; box-shadow: 0 10px 30px var(--shadow-light);"><?= htmlspecialchars($msg['message'], ENT_QUOTES, 'UTF-8', false) ?></div>
                </td>
            </tr>
            <?php endforeach; ?>

            <?php if(empty($messages)): ?>
            <tr>
                <td colspan="6" style="text-align: center; color: var(--text-muted); padding: 30px;"><?= \Core\Language::get('admin_no_data') ?></td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<script>
function viewMessage(id) {
    const row = document.getElementById('msg-content-' + id);
    if(row.style.display === 'none') {
        row.style.display = 'table-row';
    } else {
        row.style.display = 'none';
    }
}
</script>
