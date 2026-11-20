<?php
$normalLogs = [];
$hackLogs = [];
foreach($logs as $log) {
    $url = $log['page_url'];
    $isMalicious = preg_match('/(wp-admin|wp-login|wp-content|\.env|\.git|\.php|config|setup|eval|base64|passwd|myadmin|sql|db)/i', $url);
    if($isMalicious) {
        $hackLogs[] = $log;
    } else {
        $normalLogs[] = $log;
    }
}
?>

<div class="content-header" style="display:flex; justify-content:space-between; align-items:center; margin-bottom:20px;">
    <div>
        <h2 style="margin:0; color:var(--text-main);">Ziyarətçi Loqları / <span style="color:var(--text-secondary); font-size:1.2rem;">Visitor Logs</span></h2>
        <p style="color:var(--text-secondary); margin-top:5px;">Sayta daxil olan istifadəçilərin izlənilməsi və təhlükəsizlik hesabatı / User tracking and security report.</p>
    </div>
</div>

<div style="display:flex; gap:10px; margin-bottom:20px;">
    <button class="log-tab-btn active" onclick="switchLogTab('visitors', this)" style="padding:10px 20px; border:none; background:var(--aqua-teal); color:#fff; border-radius:6px; cursor:pointer; font-weight:600; font-size:0.9rem;">
        <i class="fas fa-users"></i> Ziyarətçilər / Visitors
    </button>
    <button class="log-tab-btn" onclick="switchLogTab('hacking', this)" style="padding:10px 20px; border:none; background:var(--input-bg); color:var(--text-main); border-radius:6px; cursor:pointer; font-weight:600; font-size:0.9rem;">
        <i class="fas fa-skull-crossbones"></i> Hacking Cəhdləri / Hacking Attempts
        <?php if(count($hackLogs) > 0): ?>
            <span style="background:#ef4444; color:#fff; padding:2px 6px; border-radius:10px; font-size:0.75rem; margin-left:5px;"><?= count($hackLogs) ?></span>
        <?php endif; ?>
    </button>
</div>

<!-- Visitors Tab -->
<div id="tab-visitors" class="log-tab-content" style="display:block;">
    <div class="table-container">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Tarix / Date</th>
                    <th>IP Ünvanı / Country</th>
                    <th>Səhifə / Page (URL)</th>
                    <th>Cihaz / User Agent</th>
                </tr>
            </thead>
            <tbody>
                <?php if(empty($normalLogs)): ?>
                    <tr><td colspan="4" style="text-align:center; padding: 20px;">Heç bir ziyarətçi tapılmadı / No visitors found.</td></tr>
                <?php else: ?>
                    <?php foreach($normalLogs as $log): ?>
                    <tr>
                        <td style="white-space:nowrap;"><?= htmlspecialchars($log['visited_at']) ?></td>
                        <td>
                            <div style="display:flex; align-items:center; gap:8px;">
                                <span class="ip-address" style="font-weight:600; color:var(--text-main);"><?= htmlspecialchars($log['ip_address']) ?></span>
                                <span class="country-badge" data-ip="<?= htmlspecialchars($log['ip_address']) ?>" style="font-size:0.8rem; background:var(--bg-light); padding:2px 6px; border-radius:4px; color:var(--text-secondary); display:flex; align-items:center; gap:4px;"><i class="fas fa-spinner fa-spin"></i> Yoxlanılır</span>
                            </div>
                        </td>
                        <td style="word-break:break-all; max-width: 250px;">
                            <a href="<?= APP_URL . htmlspecialchars($log['page_url']) ?>" target="_blank" style="color:var(--aqua-teal); text-decoration:none; font-weight: 500;">
                                <?= htmlspecialchars($log['page_url']) ?>
                            </a>
                        </td>
                        <td style="font-size:0.85rem; color:var(--text-secondary); max-width:300px; line-height: 1.4;"><?= htmlspecialchars($log['user_agent'] ?? 'Cihaz məlumatı yoxdur / No device info') ?></td>
                    </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Hacking Tab -->
<div id="tab-hacking" class="log-tab-content" style="display:none;">
    <div class="table-container" style="border: 1px solid rgba(239, 68, 68, 0.3);">
        <table class="admin-table">
            <thead>
                <tr>
                    <th style="color:#ef4444;">Tarix / Date</th>
                    <th style="color:#ef4444;">IP Ünvanı / Country</th>
                    <th style="color:#ef4444;">Səhifə / Page (URL)</th>
                    <th style="color:#ef4444;">Cihaz / User Agent</th>
                </tr>
            </thead>
            <tbody>
                <?php if(empty($hackLogs)): ?>
                    <tr><td colspan="4" style="text-align:center; padding: 20px;">Təhlükəsizlik təhdidi tapılmadı / No security threats found.</td></tr>
                <?php else: ?>
                    <?php foreach($hackLogs as $log): ?>
                    <tr style="background-color: rgba(239, 68, 68, 0.05);">
                        <td style="white-space:nowrap;">
                            <?= htmlspecialchars($log['visited_at']) ?>
                            <br><span style="background:#ef4444; color:#fff; font-size:0.7rem; padding:2px 4px; border-radius:4px; font-weight:bold; margin-top:4px; display:inline-block;"><i class="fas fa-skull-crossbones"></i> Hacking Cəhdi / Attack</span>
                        </td>
                        <td>
                            <div style="display:flex; align-items:center; gap:8px;">
                                <span class="ip-address" style="font-weight:600; color:#ef4444;"><?= htmlspecialchars($log['ip_address']) ?></span>
                                <span class="country-badge" data-ip="<?= htmlspecialchars($log['ip_address']) ?>" style="font-size:0.8rem; background:rgba(239, 68, 68, 0.1); padding:2px 6px; border-radius:4px; color:#ef4444; display:flex; align-items:center; gap:4px;"><i class="fas fa-spinner fa-spin"></i> Yoxlanılır</span>
                            </div>
                        </td>
                        <td style="word-break:break-all; max-width: 250px;">
                            <span style="color:#ef4444; font-weight: 600;">
                                <?= htmlspecialchars($log['page_url']) ?>
                            </span>
                        </td>
                        <td style="font-size:0.85rem; color:var(--text-secondary); max-width:300px; line-height: 1.4;">
                            <?= htmlspecialchars($log['user_agent'] ?? 'Cihaz məlumatı yoxdur / No device info') ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<script>
function switchLogTab(tabId, activeBtn) {
    document.querySelectorAll('.log-tab-content').forEach(el => el.style.display = 'none');
    document.getElementById('tab-' + tabId).style.display = 'block';
    
    document.querySelectorAll('.log-tab-btn').forEach(btn => {
        btn.style.background = 'var(--input-bg)';
        btn.style.color = 'var(--text-main)';
    });
    
    if(tabId === 'visitors') {
        activeBtn.style.background = 'var(--aqua-teal)';
        activeBtn.style.color = '#fff';
    } else {
        activeBtn.style.background = '#ef4444';
        activeBtn.style.color = '#fff';
    }
}

document.addEventListener("DOMContentLoaded", function() {
    const countryBadges = document.querySelectorAll('.country-badge');
    const ipMap = {};
    
    countryBadges.forEach(badge => {
        const ip = badge.getAttribute('data-ip');
        if (ip && ip !== '127.0.0.1' && ip !== '::1') {
            if(!ipMap[ip]) ipMap[ip] = [];
            ipMap[ip].push(badge);
        } else if (ip === '127.0.0.1' || ip === '::1') {
            badge.innerHTML = '🌍 Localhost';
        }
    });

    const uniqueIps = Object.keys(ipMap);
    
    uniqueIps.forEach((ip, index) => {
        setTimeout(() => {
            fetch(`http://ip-api.com/json/${ip}?fields=status,country,countryCode`)
                .then(res => res.json())
                .then(data => {
                    const text = data.status === 'success' ? `🌍 ${data.country} (${data.countryCode})` : '🌍 Naməlum';
                    ipMap[ip].forEach(b => b.innerHTML = text);
                })
                .catch(() => {
                    ipMap[ip].forEach(b => b.innerHTML = '🌍 Xəta');
                });
        }, index * 200); 
    });
});
</script>
