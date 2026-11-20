<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
    <div>
        <h2 style="font-size: 2rem; color: var(--text-main); margin-bottom: 5px;"><?= \Core\Language::get('admin_welcome_title') ?? 'Xoş gəldiniz' ?>, <?= htmlspecialchars($_SESSION['user_name'] ?? 'Admin') ?> 👋</h2>
        <p style="color: var(--text-muted); font-size: 1.1rem;"><?= \Core\Language::get('admin_welcome_subtitle') ?></p>
    </div>
</div>

<!-- Modern Statistics Grid -->
<div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 25px; margin-bottom: 40px;">
    
    <!-- Courses Card -->
    <div class="admin-card" style="border: none; border-radius: 20px; padding: 30px; display: flex; flex-direction: column; justify-content: space-between; position: relative; overflow: hidden; background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);">
        <div style="position: absolute; right: -20px; top: -20px; width: 100px; height: 100px; background: radial-gradient(circle, rgba(76,162,181,0.15) 0%, transparent 70%); border-radius: 50%;"></div>
        <div>
            <div style="width: 50px; height: 50px; border-radius: 12px; background: rgba(76,162,181,0.1); display: flex; align-items: center; justify-content: center; margin-bottom: 15px;">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="var(--aqua-teal)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path></svg>
            </div>
            <p style="color: var(--text-muted); font-weight: 500; margin-bottom: 5px;"><?= \Core\Language::get('admin_active_courses') ?? 'Aktiv Kurs' ?></p>
            <h3 style="font-size: 2.5rem; color: var(--text-main); margin: 0;"><?= $stats['courses'] ?></h3>
        </div>
        <a href="<?= APP_URL ?>/admin/courses" style="margin-top: 20px; display: inline-flex; align-items: center; color: var(--aqua-teal); font-weight: 600; text-decoration: none; font-size: 0.95rem;">
            <?= \Core\Language::get('admin_manage') ?? 'İdarə et' ?> <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin-left: 5px;"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
        </a>
    </div>

    <!-- Blogs Card -->
    <div class="admin-card" style="border: none; border-radius: 20px; padding: 30px; display: flex; flex-direction: column; justify-content: space-between; position: relative; overflow: hidden; background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);">
        <div style="position: absolute; right: -20px; top: -20px; width: 100px; height: 100px; background: radial-gradient(circle, rgba(16,185,129,0.15) 0%, transparent 70%); border-radius: 50%;"></div>
        <div>
            <div style="width: 50px; height: 50px; border-radius: 12px; background: rgba(16,185,129,0.1); display: flex; align-items: center; justify-content: center; margin-bottom: 15px;">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#10b981" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
            </div>
            <p style="color: var(--text-muted); font-weight: 500; margin-bottom: 5px;"><?= \Core\Language::get('admin_blog_posts') ?? 'Bloq Yazısı' ?></p>
            <h3 style="font-size: 2.5rem; color: var(--text-main); margin: 0;"><?= $stats['blogs'] ?></h3>
        </div>
        <a href="<?= APP_URL ?>/admin/blog" style="margin-top: 20px; display: inline-flex; align-items: center; color: #10b981; font-weight: 600; text-decoration: none; font-size: 0.95rem;">
            <?= \Core\Language::get('admin_manage') ?? 'İdarə et' ?> <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin-left: 5px;"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
        </a>
    </div>

    <!-- Graduates Card -->
    <div class="admin-card" style="border: none; border-radius: 20px; padding: 30px; display: flex; flex-direction: column; justify-content: space-between; position: relative; overflow: hidden; background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);">
        <div style="position: absolute; right: -20px; top: -20px; width: 100px; height: 100px; background: radial-gradient(circle, rgba(245,158,11,0.15) 0%, transparent 70%); border-radius: 50%;"></div>
        <div>
            <div style="width: 50px; height: 50px; border-radius: 12px; background: rgba(245,158,11,0.1); display: flex; align-items: center; justify-content: center; margin-bottom: 15px;">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#f59e0b" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 10v6M2 10l10-5 10 5-10 5z"></path><path d="M6 12v5c3 3 9 3 12 0v-5"></path></svg>
            </div>
            <p style="color: var(--text-muted); font-weight: 500; margin-bottom: 5px;"><?= \Core\Language::get('admin_total_graduates') ?? 'Məzunumuz' ?></p>
            <h3 style="font-size: 2.5rem; color: var(--text-main); margin: 0;"><?= $stats['graduates'] ?></h3>
        </div>
        <a href="<?= APP_URL ?>/admin/graduates" style="margin-top: 20px; display: inline-flex; align-items: center; color: #f59e0b; font-weight: 600; text-decoration: none; font-size: 0.95rem;">
            <?= \Core\Language::get('admin_manage') ?? 'İdarə et' ?> <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin-left: 5px;"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
        </a>
    </div>

    <!-- Messages Card -->
    <div class="admin-card" style="border: none; border-radius: 20px; padding: 30px; display: flex; flex-direction: column; justify-content: space-between; position: relative; overflow: hidden; background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);">
        <div style="position: absolute; right: -20px; top: -20px; width: 100px; height: 100px; background: radial-gradient(circle, rgba(239,68,68,0.15) 0%, transparent 70%); border-radius: 50%;"></div>
        <div>
            <div style="width: 50px; height: 50px; border-radius: 12px; background: rgba(239,68,68,0.1); display: flex; align-items: center; justify-content: center; margin-bottom: 15px;">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#ef4444" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
            </div>
            <p style="color: var(--text-muted); font-weight: 500; margin-bottom: 5px;"><?= \Core\Language::get('admin_new_messages') ?? 'Yeni Mesaj' ?></p>
            <h3 style="font-size: 2.5rem; color: var(--text-main); margin: 0;"><?= $stats['messages'] ?></h3>
        </div>
        <a href="<?= APP_URL ?>/admin/messages" style="margin-top: 20px; display: inline-flex; align-items: center; color: #ef4444; font-weight: 600; text-decoration: none; font-size: 0.95rem;">
            <?= \Core\Language::get('admin_manage') ?? 'İdarə et' ?> <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin-left: 5px;"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
        </a>
    </div>

    <!-- Consultations Card -->
    <div class="admin-card" style="border: none; border-radius: 20px; padding: 30px; display: flex; flex-direction: column; justify-content: space-between; position: relative; overflow: hidden; background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);">
        <div style="position: absolute; right: -20px; top: -20px; width: 100px; height: 100px; background: radial-gradient(circle, rgba(14,165,233,0.15) 0%, transparent 70%); border-radius: 50%;"></div>
        <div>
            <div style="width: 50px; height: 50px; border-radius: 12px; background: rgba(14,165,233,0.1); display: flex; align-items: center; justify-content: center; margin-bottom: 15px;">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#0ea5e9" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg>
            </div>
            <p style="color: var(--text-muted); font-weight: 500; margin-bottom: 5px;">Yeni Konsultasiya</p>
            <h3 style="font-size: 2.5rem; color: var(--text-main); margin: 0;"><?= $stats['bookings'] ?? 0 ?></h3>
        </div>
        <a href="<?= APP_URL ?>/admin/bookings" style="margin-top: 20px; display: inline-flex; align-items: center; color: #0ea5e9; font-weight: 600; text-decoration: none; font-size: 0.95rem;">
            <?= \Core\Language::get('admin_manage') ?? 'İdarə et' ?> <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin-left: 5px;"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
        </a>
    </div>
    <!-- Visits Today Card -->
    <div class="admin-card" style="border: none; border-radius: 20px; padding: 30px; display: flex; flex-direction: column; justify-content: space-between; position: relative; overflow: hidden; background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);">
        <div style="position: absolute; right: -20px; top: -20px; width: 100px; height: 100px; background: radial-gradient(circle, rgba(99,102,241,0.15) 0%, transparent 70%); border-radius: 50%;"></div>
        <div>
            <div style="width: 50px; height: 50px; border-radius: 12px; background: rgba(99,102,241,0.1); display: flex; align-items: center; justify-content: center; margin-bottom: 15px;">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#6366f1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
            </div>
            <p style="color: var(--text-muted); font-weight: 500; margin-bottom: 5px;"><?= \Core\Language::get('admin_visits_today') ?? 'Ziyarətçi (Bu gün)' ?></p>
            <h3 style="font-size: 2.5rem; color: var(--text-main); margin: 0;"><?= $stats['visits_today'] ?? 0 ?></h3>
        </div>
    </div>

    <!-- Visits Month Card -->
    <div class="admin-card" style="border: none; border-radius: 20px; padding: 30px; display: flex; flex-direction: column; justify-content: space-between; position: relative; overflow: hidden; background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);">
        <div style="position: absolute; right: -20px; top: -20px; width: 100px; height: 100px; background: radial-gradient(circle, rgba(168,85,247,0.15) 0%, transparent 70%); border-radius: 50%;"></div>
        <div>
            <div style="width: 50px; height: 50px; border-radius: 12px; background: rgba(168,85,247,0.1); display: flex; align-items: center; justify-content: center; margin-bottom: 15px;">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#a855f7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
            </div>
            <p style="color: var(--text-muted); font-weight: 500; margin-bottom: 5px;"><?= \Core\Language::get('admin_visits_month') ?? 'Ziyarətçi (Bu ay)' ?></p>
            <h3 style="font-size: 2.5rem; color: var(--text-main); margin: 0;"><?= $stats['visits_month'] ?? 0 ?></h3>
        </div>
    </div>
</div>

<!-- Top Pages -->
<div style="background: #fff; border-radius: 20px; padding: 30px; margin-bottom: 40px; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05);">
    <h3 style="margin-top: 0; margin-bottom: 20px; font-size: 1.25rem; color: var(--text-main);"><?= \Core\Language::get('admin_top_pages') ?? 'Ən Çox Baxılan Səhifələr' ?></h3>
    <?php if(!empty($topPages)): ?>
    <div style="overflow-x:auto;">
        <table style="width: 100%; border-collapse: collapse;">
            <thead>
                <tr style="border-bottom: 1px solid #e2e8f0;">
                    <th style="text-align: left; padding: 12px 15px; color: var(--text-muted); font-weight: 500;">URL</th>
                    <th style="text-align: right; padding: 12px 15px; color: var(--text-muted); font-weight: 500;"><?= \Core\Language::get('admin_views_col') ?? 'Baxış' ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($topPages as $page): ?>
                <tr style="border-bottom: 1px solid #f1f5f9;">
                    <td style="padding: 12px 15px; color: var(--text-main);"><a href="<?= APP_URL . htmlspecialchars($page['page_url']) ?>" target="_blank" style="color:var(--aqua-teal); text-decoration:none;"><?= htmlspecialchars($page['page_url']) ?></a></td>
                    <td style="padding: 12px 15px; text-align: right; font-weight: 600; color: var(--text-main);"><?= $page['views'] ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?php else: ?>
    <p style="color: var(--text-muted);"><?= \Core\Language::get('admin_no_data') ?? 'Hələlik məlumat yoxdur.' ?></p>
    <?php endif; ?>
</div>



<style>
.admin-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.05), 0 10px 10px -5px rgba(0, 0, 0, 0.02);
}
</style>

