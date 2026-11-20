<div class="admin-card" style="margin-bottom: 20px;">
    <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 15px;">
        <div>
            <h2 style="margin:0 0 10px 0; color:var(--text-main);"><?= \Core\Language::get('admin_live_chat_title') ?></h2>
            <p style="margin:0; color:var(--text-muted); font-size: 0.95rem;"><?= \Core\Language::get('admin_live_chat_desc') ?? 'Saytdan gələn canlı mesajları cavablamaq üçün aşağıdakı bölmədən istifadə edin.' ?></p>
        </div>
        <div style="background: rgba(76, 162, 181, 0.1); border-left: 4px solid var(--aqua-teal); padding: 15px; border-radius: 4px;">
            <p style="margin: 0 0 5px 0; font-weight: bold; color: var(--heading-color);"><?= \Core\Language::get('admin_live_chat_creds') ?? 'Giriş Məlumatları (Əgər tələb olunarsa):' ?></p>
            <p style="margin: 0; font-size: 0.9rem; color: var(--text-main);">
                <strong><?= \Core\Language::get('admin_email') ?? 'E-poçt:' ?></strong> info@thrive.az <br>
                <strong><?= \Core\Language::get('admin_password') ?? 'Şifrə:' ?></strong> Thrive2026
            </p>
        </div>
    </div>
</div>

<div class="admin-card" style="padding: 50px 20px; text-align: center; border: 1px solid var(--border-color); border-radius: 12px; box-shadow: 0 10px 30px var(--shadow-light); background: var(--card-bg);">
    <div style="width: 80px; height: 80px; background: rgba(76, 162, 181, 0.1); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 20px;">
        <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="var(--aqua-teal)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
        </svg>
    </div>
    <h3 style="margin-bottom: 15px; color: var(--heading-color);"><?= \Core\Language::get('admin_live_chat_security') ?? 'Təhlükəsizlik Səbəbilə Yeni Pəncərədə Açılır' ?></h3>
    <p style="color: var(--text-muted); max-width: 500px; margin: 0 auto 30px; line-height: 1.6;">
        <?= \Core\Language::get('admin_live_chat_security_desc') ?? 'onWebChat sistemi təhlükəsizlik protokollarına əsasən başqa saytların daxilində (iframe) açılmağa icazə vermir. Operator panelinə daxil olmaq və müştərilərə cavab vermək üçün aşağıdakı düyməyə klikləyərək sistemi yeni səhifədə aça bilərsiniz.' ?>
    </p>
    <a href="https://www.onwebchat.com/operator/#/" target="_blank" class="btn" style="background: var(--aqua-teal); color: #fff; padding: 12px 30px; border-radius: 25px; text-decoration: none; font-weight: bold; display: inline-flex; align-items: center; gap: 10px; transition: transform 0.2s, box-shadow 0.2s; margin-bottom: 40px;" onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 5px 15px rgba(76,162,181,0.4)';" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none';">
        <?= \Core\Language::get('admin_live_chat_btn') ?? 'Operator Panelinə Keçid Et' ?>
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path><polyline points="15 3 21 3 21 9"></polyline><line x1="10" y1="14" x2="21" y2="3"></line></svg>
    </a>

    <!-- Alvosite Partnership Info -->
    <div style="background: linear-gradient(135deg, rgba(0, 11, 33, 0.05) 0%, rgba(76, 162, 181, 0.1) 100%); border-top: 1px solid rgba(76, 162, 181, 0.2); margin: 0 -20px -50px; padding: 40px 30px; text-align: left;">
        <div style="display: flex; align-items: flex-start; gap: 20px; flex-wrap: wrap;">
            <div style="flex: 1; min-width: 300px;">
                <div style="display: inline-flex; align-items: center; gap: 10px; background: rgba(76, 162, 181, 0.15); padding: 5px 15px; border-radius: 20px; color: var(--aqua-teal); font-weight: bold; font-size: 0.85rem; margin-bottom: 15px; letter-spacing: 1px; text-transform: uppercase;">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2L2 7l10 5 10-5-10-5z"/><path d="M2 17l10 5 10-5"/><path d="M2 12l10 5 10-5"/></svg>
                    Alvosite Powered AI
                </div>
                <h3 style="margin: 0 0 15px; color: var(--heading-color); font-size: 1.4rem;"><?= \Core\Language::get('admin_live_chat_ai_title') ?? 'Süni İntellekt Dəstəkli Müraciət İdarəetməsi' ?></h3>
                <p style="color: var(--text-muted); line-height: 1.7; margin-bottom: 15px; font-size: 0.95rem;">
                    <?= \Core\Language::get('admin_live_chat_ai_desc1') ?? '<strong>onWebChat</strong>, <span style="color: var(--heading-color); font-weight: bold;">Alvosite</span> şirkətinin rəsmi partnyoru və alt layihəsidir. Bu sistem adi bir mesajlaşma paneli deyil, saytınıza tam zamanlı (7/24) süni intellekt dəstəyi verən inkişaf etmiş bir alətdir.' ?>
                </p>
                <p style="color: var(--text-muted); line-height: 1.7; margin: 0; font-size: 0.95rem;">
                    <?= \Core\Language::get('admin_live_chat_ai_desc2') ?? 'Sistem arxa planda <strong>8 fərqli süni intellekt (AI) modeli</strong> ilə inteqrasiya olunmuş şəkildə işləyir. Bu süni intellekt alqoritmləri sayta daxil olan istifadəçilərin davranışlarını analiz edir, onların ehtiyaclarını avtomatik müəyyənləşdirir və siz offlayn olduqda belə onlara ən uyğun ilkin məlumatı verərək müştəri məmnuniyyətini maksimallaşdırır.' ?>
                </p>
            </div>
            <div style="width: 250px; background: var(--card-bg); padding: 25px; border-radius: 12px; box-shadow: 0 10px 30px var(--shadow-light); text-align: center;">
                <div style="font-size: 2.5rem; color: var(--aqua-teal); margin-bottom: 10px; font-weight: 800;">8x</div>
                <h4 style="margin: 0 0 10px; color: var(--heading-color);"><?= \Core\Language::get('admin_live_chat_ai_model') ?? 'AI Modeli' ?></h4>
                <p style="margin: 0; color: var(--text-muted); font-size: 0.85rem; line-height: 1.5;"><?= \Core\Language::get('admin_live_chat_ai_model_desc') ?? 'Dil emalı, müştəri analizi və avtomatik cavablandırma üçün.' ?></p>
            </div>
        </div>
    </div>
</div>
