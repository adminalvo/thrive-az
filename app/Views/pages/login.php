<section class="auth-section" style="min-height: 100vh; display: flex; align-items: center; justify-content: center; background: var(--input-bg); padding: 100px 20px 40px;">
    <div style="background: var(--card-bg); width: 100%; max-width: 420px; border-radius: 12px; box-shadow: 0 10px 30px var(--shadow-light); padding: 40px; position: relative; overflow: hidden; border-top: 4px solid var(--aqua-teal);">
        
        <div style="text-align: center; margin-bottom: 30px;">
            <div style="width: 50px; height: 50px; background: rgba(76, 162, 181, 0.1); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 15px; color: var(--aqua-teal);">
                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
            </div>
            <h2 style="color: var(--heading-color); font-size: 1.8rem; font-family: var(--font-heading); margin-bottom: 5px;"><?= \Core\Language::get('login') ?></h2>
            <p style="color: var(--text-secondary); font-size: 0.95rem;"><?= \Core\Language::get('welcome_popup_desc') ?? 'Hesabınıza daxil olun' ?></p>
        </div>

        <?php if(isset($error)): ?>
            <div style="background: rgba(239, 68, 68, 0.1); color: #ef4444; padding: 12px; border-radius: 6px; margin-bottom: 20px; text-align: center; font-size: 0.9rem; border: 1px solid rgba(239, 68, 68, 0.2);"><?= \Core\Language::get('invalid_login') ?></div>
        <?php endif; ?>

        <form action="<?= APP_URL ?>/login" method="POST">
            <div class="form-group" style="margin-bottom: 20px;">
                <label style="color: var(--heading-color); font-size: 0.85rem; font-weight: 600; margin-bottom: 8px; display: block; text-transform: uppercase; letter-spacing: 0.5px;"><?= \Core\Language::get('email') ?></label>
                <input type="email" name="email" required style="width: 100%; padding: 12px 15px; border: 1px solid var(--input-border); border-radius: 6px; outline: none; transition: all 0.3s; font-family: var(--font-body); font-size: 1rem; color: var(--heading-color);" onfocus="this.style.borderColor='var(--aqua-teal)'; this.style.boxShadow='0 0 0 3px rgba(76,162,181,0.1)';" onblur="this.style.borderColor='var(--input-border)'; this.style.boxShadow='none';">
            </div>
            
            <div class="form-group" style="margin-bottom: 25px;">
                <label style="color: var(--heading-color); font-size: 0.85rem; font-weight: 600; margin-bottom: 8px; display: block; text-transform: uppercase; letter-spacing: 0.5px;"><?= \Core\Language::get('password') ?></label>
                <input type="password" name="password" required style="width: 100%; padding: 12px 15px; border: 1px solid var(--input-border); border-radius: 6px; outline: none; transition: all 0.3s; font-family: var(--font-body); font-size: 1rem; color: var(--heading-color);" onfocus="this.style.borderColor='var(--aqua-teal)'; this.style.boxShadow='0 0 0 3px rgba(76,162,181,0.1)';" onblur="this.style.borderColor='var(--input-border)'; this.style.boxShadow='none';">
            </div>
            
            <button type="submit" style="width: 100%; padding: 14px; background: var(--deep-navy); color: #fff; border: none; border-radius: 6px; font-size: 1rem; font-weight: 600; font-family: var(--font-body); cursor: pointer; transition: all 0.3s; text-transform: uppercase; letter-spacing: 1px;" onmouseover="this.style.background='var(--ocean-blue)';" onmouseout="this.style.background='var(--deep-navy)';">
                <?= \Core\Language::get('login_now') ?>
            </button>

        </form>
        
        <div style="text-align: center; margin-top: 25px; border-top: 1px solid #f1f5f9; padding-top: 20px;">
            <p style="color: var(--text-secondary); font-size: 0.95rem;">
                <?= \Core\Language::get('no_account') ?> <a href="<?= APP_URL ?>/register" style="color: var(--aqua-teal); font-weight: 600; text-decoration: none; transition: color 0.3s;" onmouseover="this.style.color='var(--deep-navy)';" onmouseout="this.style.color='var(--aqua-teal)';"><?= \Core\Language::get('register_now') ?></a>
            </p>
        </div>
    </div>
    
    <style>
        @keyframes rc-spin { 100% { transform: rotate(360deg); } }
        /* Keep header dark blue like other pages */
        header { background: var(--deep-navy) !important; position: relative !important; }
    </style>
</section>
