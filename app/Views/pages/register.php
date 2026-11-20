<section class="auth-section" style="min-height: 100vh; display: flex; align-items: center; justify-content: center; background: var(--input-bg); padding: 100px 20px 40px;">
    <div style="background: var(--card-bg); width: 100%; max-width: 500px; border-radius: 12px; box-shadow: 0 10px 30px var(--shadow-light); padding: 40px; position: relative; overflow: hidden; border-top: 4px solid var(--aqua-teal);">
        
        <div style="text-align: center; margin-bottom: 30px;">
            <div style="width: 50px; height: 50px; background: rgba(76, 162, 181, 0.1); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 15px; color: var(--aqua-teal);">
                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="20" y1="8" x2="20" y2="14"></line><line x1="23" y1="11" x2="17" y2="11"></line></svg>
            </div>
            <h2 style="color: var(--heading-color); font-size: 1.8rem; font-family: var(--font-heading); margin-bottom: 5px;"><?= \Core\Language::get('register') ?></h2>
            <p id="form-desc" style="color: var(--text-secondary); font-size: 0.95rem;" data-select="<?= \Core\Language::get('select_role') ?>" data-complete="<?= \Core\Language::get('complete_registration') ?>"><?= \Core\Language::get('select_role') ?></p>
        </div>

        <?php if(isset($error)): ?>
            <div style="background: rgba(239, 68, 68, 0.1); color: #ef4444; padding: 12px; border-radius: 6px; margin-bottom: 20px; text-align: center; font-size: 0.9rem; border: 1px solid rgba(239, 68, 68, 0.2);"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

        <!-- STEP 1: ROLE SELECTION -->
        <div id="step-1">
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px;">
                <div class="role-card" onclick="selectRole('student')" style="background: var(--input-bg); border: 2px solid var(--border-color); border-radius: 12px; padding: 25px 15px; text-align: center; cursor: pointer; transition: all 0.3s;">
                    <div style="width: 60px; height: 60px; background: rgba(76, 162, 181, 0.1); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 15px; color: var(--aqua-teal);">
                        <svg viewBox="0 0 24 24" width="30" height="30" stroke="currentColor" stroke-width="2" fill="none"><path d="M22 10v6M2 10l10-5 10 5-10 5z"></path><path d="M6 12v5c3 3 9 3 12 0v-5"></path></svg>
                    </div>
                    <h3 style="color: var(--heading-color); font-size: 1.1rem; font-weight: 700; margin-bottom: 5px;"><?= \Core\Language::get('role_student') ?></h3>
                    <p style="color: var(--text-secondary); font-size: 0.8rem; margin: 0;"><?= \Core\Language::get('role_student_desc') ?></p>
                </div>
                
                <div class="role-card" onclick="selectRole('parent')" style="background: var(--input-bg); border: 2px solid var(--border-color); border-radius: 12px; padding: 25px 15px; text-align: center; cursor: pointer; transition: all 0.3s;">
                    <div style="width: 60px; height: 60px; background: rgba(0, 63, 130, 0.1); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 15px; color: var(--ocean-blue);">
                        <svg viewBox="0 0 24 24" width="30" height="30" stroke="currentColor" stroke-width="2" fill="none"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                    </div>
                    <h3 style="color: var(--heading-color); font-size: 1.1rem; font-weight: 700; margin-bottom: 5px;"><?= \Core\Language::get('role_parent') ?></h3>
                    <p style="color: var(--text-secondary); font-size: 0.8rem; margin: 0;"><?= \Core\Language::get('role_parent_desc') ?></p>
                </div>
            </div>
        </div>

        <!-- STEP 2: REGISTRATION FORM -->
        <div id="step-2" style="display: none;">
            <form action="<?= APP_URL ?>/register" method="POST">
                <input type="hidden" name="role" id="selected-role" value="student">
                
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px; margin-bottom: 15px;">
                    <div class="form-group">
                        <label style="color: var(--heading-color); font-size: 0.85rem; font-weight: 600; margin-bottom: 8px; display: block; text-transform: uppercase; letter-spacing: 0.5px;"><?= \Core\Language::get('name') ?></label>
                        <input type="text" name="name" required style="width: 100%; padding: 12px 15px; border: 1px solid var(--input-border); border-radius: 6px; outline: none; transition: all 0.3s; font-family: var(--font-body); font-size: 1rem; color: var(--heading-color);" onfocus="this.style.borderColor='var(--aqua-teal)'; this.style.boxShadow='0 0 0 3px rgba(76,162,181,0.1)';" onblur="this.style.borderColor='var(--input-border)'; this.style.boxShadow='none';">
                    </div>
                    <div class="form-group">
                        <label style="color: var(--heading-color); font-size: 0.85rem; font-weight: 600; margin-bottom: 8px; display: block; text-transform: uppercase; letter-spacing: 0.5px;"><?= \Core\Language::get('surname') ?></label>
                        <input type="text" name="surname" required style="width: 100%; padding: 12px 15px; border: 1px solid var(--input-border); border-radius: 6px; outline: none; transition: all 0.3s; font-family: var(--font-body); font-size: 1rem; color: var(--heading-color);" onfocus="this.style.borderColor='var(--aqua-teal)'; this.style.boxShadow='0 0 0 3px rgba(76,162,181,0.1)';" onblur="this.style.borderColor='var(--input-border)'; this.style.boxShadow='none';">
                    </div>
                </div>

                <div class="form-group" style="margin-bottom: 15px;">
                    <label style="color: var(--heading-color); font-size: 0.85rem; font-weight: 600; margin-bottom: 8px; display: block; text-transform: uppercase; letter-spacing: 0.5px;"><?= \Core\Language::get('email') ?></label>
                    <input type="email" name="email" required style="width: 100%; padding: 12px 15px; border: 1px solid var(--input-border); border-radius: 6px; outline: none; transition: all 0.3s; font-family: var(--font-body); font-size: 1rem; color: var(--heading-color);" onfocus="this.style.borderColor='var(--aqua-teal)'; this.style.boxShadow='0 0 0 3px rgba(76,162,181,0.1)';" onblur="this.style.borderColor='var(--input-border)'; this.style.boxShadow='none';">
                </div>
                
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px; margin-bottom: 15px;">
                    <div class="form-group">
                        <label style="color: var(--heading-color); font-size: 0.85rem; font-weight: 600; margin-bottom: 8px; display: block; text-transform: uppercase; letter-spacing: 0.5px;"><?= \Core\Language::get('phone') ?></label>
                        <input type="text" name="phone" placeholder="+994" required style="width: 100%; padding: 12px 15px; border: 1px solid var(--input-border); border-radius: 6px; outline: none; transition: all 0.3s; font-family: var(--font-body); font-size: 1rem; color: var(--heading-color);" onfocus="this.style.borderColor='var(--aqua-teal)'; this.style.boxShadow='0 0 0 3px rgba(76,162,181,0.1)';" onblur="this.style.borderColor='var(--input-border)'; this.style.boxShadow='none';">
                    </div>
                    <div class="form-group">
                        <label style="color: var(--heading-color); font-size: 0.85rem; font-weight: 600; margin-bottom: 8px; display: block; text-transform: uppercase; letter-spacing: 0.5px;"><?= \Core\Language::get('dob') ?></label>
                        <input type="date" name="dob" required style="width: 100%; padding: 12px 15px; border: 1px solid var(--input-border); border-radius: 6px; outline: none; transition: all 0.3s; font-family: var(--font-body); font-size: 1rem; color: var(--heading-color);" onfocus="this.style.borderColor='var(--aqua-teal)'; this.style.boxShadow='0 0 0 3px rgba(76,162,181,0.1)';" onblur="this.style.borderColor='var(--input-border)'; this.style.boxShadow='none';">
                    </div>
                </div>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px; margin-bottom: 15px;">
                    <div class="form-group">
                        <label style="color: var(--heading-color); font-size: 0.85rem; font-weight: 600; margin-bottom: 8px; display: block; text-transform: uppercase; letter-spacing: 0.5px;"><?= \Core\Language::get('fin_code') ?></label>
                        <input type="text" name="fin_code" maxlength="7" required placeholder="7 simvol" style="width: 100%; padding: 12px 15px; border: 1px solid var(--input-border); border-radius: 6px; outline: none; transition: all 0.3s; font-family: var(--font-body); font-size: 1rem; color: var(--heading-color); text-transform: uppercase;" onfocus="this.style.borderColor='var(--aqua-teal)'; this.style.boxShadow='0 0 0 3px rgba(76,162,181,0.1)';" onblur="this.style.borderColor='var(--input-border)'; this.style.boxShadow='none';">
                    </div>
                    <div class="form-group">
                        <label style="color: var(--heading-color); font-size: 0.85rem; font-weight: 600; margin-bottom: 8px; display: block; text-transform: uppercase; letter-spacing: 0.5px;"><?= \Core\Language::get('id_serial') ?></label>
                        <input type="text" name="id_serial" required placeholder="AZE12345678" style="width: 100%; padding: 12px 15px; border: 1px solid var(--input-border); border-radius: 6px; outline: none; transition: all 0.3s; font-family: var(--font-body); font-size: 1rem; color: var(--heading-color); text-transform: uppercase;" onfocus="this.style.borderColor='var(--aqua-teal)'; this.style.boxShadow='0 0 0 3px rgba(76,162,181,0.1)';" onblur="this.style.borderColor='var(--input-border)'; this.style.boxShadow='none';">
                    </div>
                </div>
                
                <div class="form-group" style="margin-bottom: 25px;">
                    <label style="color: var(--heading-color); font-size: 0.85rem; font-weight: 600; margin-bottom: 8px; display: block; text-transform: uppercase; letter-spacing: 0.5px;"><?= \Core\Language::get('password') ?></label>
                    <input type="password" name="password" required minlength="6" style="width: 100%; padding: 12px 15px; border: 1px solid var(--input-border); border-radius: 6px; outline: none; transition: all 0.3s; font-family: var(--font-body); font-size: 1rem; color: var(--heading-color);" onfocus="this.style.borderColor='var(--aqua-teal)'; this.style.boxShadow='0 0 0 3px rgba(76,162,181,0.1)';" onblur="this.style.borderColor='var(--input-border)'; this.style.boxShadow='none';">
                </div>

                
                <button type="submit" style="width: 100%; padding: 14px; background: var(--deep-navy); color: #fff; border: none; border-radius: 6px; font-size: 1rem; font-weight: 600; font-family: var(--font-body); cursor: pointer; transition: all 0.3s; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 15px;" onmouseover="this.style.background='var(--ocean-blue)';" onmouseout="this.style.background='var(--deep-navy)';">
                    <?= \Core\Language::get('register_now') ?>
                </button>
                
                <div style="text-align: center;">
                    <a href="javascript:void(0)" onclick="goBack()" style="color: var(--text-secondary); font-size: 0.9rem; text-decoration: none;">&larr; <?= \Core\Language::get('back_to_role') ?></a>
                </div>
            </form>
        </div>
        
        <div style="text-align: center; margin-top: 25px; border-top: 1px solid #f1f5f9; padding-top: 20px;">
            <p style="color: var(--text-secondary); font-size: 0.95rem;">
                <?= \Core\Language::get('have_account') ?? 'Artıq hesabınız var?' ?> <a href="<?= APP_URL ?>/login" style="color: var(--aqua-teal); font-weight: 600; text-decoration: none; transition: color 0.3s;" onmouseover="this.style.color='var(--deep-navy)';" onmouseout="this.style.color='var(--aqua-teal)';"><?= \Core\Language::get('login') ?></a>
            </p>
        </div>
    </div>
    
    <style>
        @keyframes rc-spin { 100% { transform: rotate(360deg); } }
        .role-card:hover {
            border-color: var(--aqua-teal) !important;
            box-shadow: 0 10px 20px rgba(76,162,181,0.1);
            transform: translateY(-5px);
        }
        header { background: var(--deep-navy) !important; position: relative !important; }
    </style>

    <script>
        function selectRole(role) {
            document.getElementById('selected-role').value = role;
            document.getElementById('step-1').style.display = 'none';
            document.getElementById('step-2').style.display = 'block';
            let descElem = document.getElementById('form-desc');
            descElem.innerText = descElem.getAttribute('data-complete');
        }
        
        function goBack() {
            document.getElementById('step-2').style.display = 'none';
            document.getElementById('step-1').style.display = 'block';
            let descElem = document.getElementById('form-desc');
            descElem.innerText = descElem.getAttribute('data-select');
        }
    </script>
</section>
