<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
    <div>
        <h2 style="font-size: 2rem; color: var(--text-main); margin-bottom: 5px;">Konsultasiya Müraciətləri</h2>
        <p style="color: var(--text-muted); font-size: 1.1rem;">Saytdan gələn bütün konsultasiya və müraciətlər siyahısı</p>
    </div>
</div>

<div style="background: #fff; border-radius: 20px; padding: 30px; margin-bottom: 40px; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05);">
    <?php if(empty($bookings)): ?>
        <p style="color: var(--text-muted);">Hələlik heç bir müraciət yoxdur.</p>
    <?php else: ?>
        <div style="overflow-x:auto;">
            <table style="width: 100%; border-collapse: collapse;">
                <thead>
                    <tr style="border-bottom: 1px solid #e2e8f0;">
                        <th style="text-align: left; padding: 12px 15px; color: var(--text-muted); font-weight: 500;">Tarix</th>
                        <th style="text-align: left; padding: 12px 15px; color: var(--text-muted); font-weight: 500;">Müştəri</th>
                        <th style="text-align: left; padding: 12px 15px; color: var(--text-muted); font-weight: 500;">Əlaqə</th>
                        <th style="text-align: left; padding: 12px 15px; color: var(--text-muted); font-weight: 500;">Xidmət (Dil/Format)</th>
                        <th style="text-align: left; padding: 12px 15px; color: var(--text-muted); font-weight: 500;">Rezerv Vaxtı</th>
                        <th style="text-align: center; padding: 12px 15px; color: var(--text-muted); font-weight: 500;">Status</th>
                        <th style="text-align: right; padding: 12px 15px; color: var(--text-muted); font-weight: 500;">Əməliyyat</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($bookings as $row): ?>
                    <tr style="border-bottom: 1px solid #f1f5f9; <?= $row['status'] == 'pending' ? 'background: rgba(14,165,233,0.05);' : '' ?>">
                        <td style="padding: 12px 15px; color: var(--text-muted); font-size: 0.9rem;">
                            <?= date('d.m.Y H:i', strtotime($row['created_at'])) ?>
                        </td>
                        <td style="padding: 12px 15px;">
                            <div style="font-weight: 600; color: var(--text-main);"><?= htmlspecialchars($row['student_name']) ?></div>
                            <div style="font-size: 0.85rem; color: var(--text-muted);"><?= htmlspecialchars($row['age_or_class']) ?> / <?= htmlspecialchars($row['school']) ?></div>
                        </td>
                        <td style="padding: 12px 15px;">
                            <div style="color: var(--text-main);"><i class="fa fa-phone" style="margin-right:5px; color:var(--text-muted)"></i><?= htmlspecialchars($row['phone']) ?></div>
                            <?php if(!empty($row['whatsapp'])): ?>
                                <div style="color: var(--text-main); font-size: 0.85rem;"><i class="fab fa-whatsapp" style="margin-right:5px; color:#25D366"></i><?= htmlspecialchars($row['whatsapp']) ?></div>
                            <?php endif; ?>
                            <?php if(!empty($row['email'])): ?>
                                <div style="color: var(--text-main); font-size: 0.85rem;"><i class="fa fa-envelope" style="margin-right:5px; color:var(--text-muted)"></i><?= htmlspecialchars($row['email']) ?></div>
                            <?php endif; ?>
                        </td>
                        <td style="padding: 12px 15px;">
                            <div style="font-weight: 500; color: var(--aqua-teal);"><?= htmlspecialchars($row['service_type']) ?></div>
                            <div style="font-size: 0.85rem; color: var(--text-muted);"><?= htmlspecialchars($row['format']) ?> • <?= htmlspecialchars($row['language']) ?></div>
                        </td>
                        <td style="padding: 12px 15px; color: var(--text-main); font-weight: 500;">
                            <?= htmlspecialchars($row['date']) ?> <br>
                            <span style="color:var(--text-muted); font-size:0.85rem"><?= htmlspecialchars($row['time']) ?></span>
                        </td>
                        <td style="padding: 12px 15px; text-align: center;">
                            <?php if($row['status'] == 'pending'): ?>
                                <span style="background: rgba(245,158,11,0.1); color: #f59e0b; padding: 4px 10px; border-radius: 20px; font-size: 0.8rem; font-weight: 600;">Gözləyir</span>
                            <?php else: ?>
                                <span style="background: rgba(16,185,129,0.1); color: #10b981; padding: 4px 10px; border-radius: 20px; font-size: 0.8rem; font-weight: 600;">Təsdiqləndi</span>
                            <?php endif; ?>
                        </td>
                        <td style="padding: 12px 15px; text-align: right;">
                            <div style="display: flex; gap: 10px; justify-content: flex-end;">
                                <?php if($row['status'] == 'pending'): ?>
                                    <a href="<?= APP_URL ?>/admin/bookings/approve/<?= $row['id'] ?>" class="btn-action btn-approve" title="Təsdiqlə"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 6L9 17l-5-5"></path></svg></a>
                                <?php endif; ?>
                                <a href="<?= APP_URL ?>/admin/bookings/delete/<?= $row['id'] ?>" class="btn-action btn-delete" onclick="return confirm('Silmək istədiyinizə əminsiniz?')" title="Sil"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg></a>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>
</div>

<style>
.btn-action {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 32px;
    height: 32px;
    border-radius: 8px;
    transition: all 0.3s;
}
.btn-approve {
    background: rgba(16,185,129,0.1);
    color: #10b981;
}
.btn-approve:hover {
    background: #10b981;
    color: #fff;
}
.btn-delete {
    background: rgba(239,68,68,0.1);
    color: #ef4444;
}
.btn-delete:hover {
    background: #ef4444;
    color: #fff;
}
</style>
