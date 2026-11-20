<section class="section" style="background: var(--input-bg); padding: 100px 0; min-height: 100vh;">
    <div class="container" style="max-width: 800px;">
        <div style="text-align: center; margin-bottom: 40px;">
            <h1 style="color: var(--heading-color); font-size: 2.5rem; margin-bottom: 15px; font-family: var(--font-heading);"><?= \Core\Language::get('booking_title') ?></h1>
            <p style="color: var(--text-secondary); font-size: 1.1rem;"><?= \Core\Language::get('booking_subtitle') ?></p>
        </div>

        <div style="background: var(--card-bg); border-radius: 20px; box-shadow: 0 10px 30px var(--shadow-light); padding: 40px;">
            <!-- Progress Bar -->
            <div style="display: flex; justify-content: space-between; margin-bottom: 40px; position: relative;">
                <div style="position: absolute; top: 15px; left: 0; width: 100%; height: 2px; background: #e2e8f0; z-index: 1;"></div>
                <div id="progressBar" style="position: absolute; top: 15px; left: 0; width: 0%; height: 2px; background: var(--aqua-teal); z-index: 2; transition: width 0.3s;"></div>
                
                <?php for($i=1; $i<=7; $i++): ?>
                <div class="step-indicator" id="ind-<?= $i ?>" style="width: 32px; height: 32px; border-radius: 50%; background: var(--card-bg); border: 2px solid <?= $i==1 ? 'var(--aqua-teal)' : '#e2e8f0' ?>; color: <?= $i==1 ? 'var(--aqua-teal)' : '#94a3b8' ?>; display: flex; align-items: center; justify-content: center; font-weight: bold; position: relative; z-index: 3; transition: all 0.3s;"><?= $i ?></div>
                <?php endfor; ?>
            </div>

            <form id="bookingForm">
                <!-- STEP 1: İstiqamət -->
                <div class="step-content active" id="step-1">
                    <h3 style="margin-bottom: 25px; color: var(--heading-color);"><?= \Core\Language::get('booking_step1') ?></h3>
                    <div style="display: grid; grid-template-columns: 1fr; gap: 15px;">
                        <label class="radio-card">
                            <input type="radio" name="direction" value="Thrive Education Center" required>
                            <span class="rc-content"><?= \Core\Language::get('booking_dir1') ?></span>
                        </label>
                        <label class="radio-card">
                            <input type="radio" name="direction" value="Thrive Study Abroad">
                            <span class="rc-content"><?= \Core\Language::get('booking_dir2') ?></span>
                        </label>
                        <label class="radio-card">
                            <input type="radio" name="direction" value="Thrive Creation Lab">
                            <span class="rc-content"><?= \Core\Language::get('booking_dir3') ?></span>
                        </label>
                    </div>
                </div>

                <!-- STEP 2: Xidmət -->
                <div class="step-content" id="step-2">
                    <h3 id="step2Title" style="margin-bottom: 25px; color: var(--heading-color);"><?= \Core\Language::get('booking_step2') ?></h3>
                    <select name="service" id="serviceSelect" required style="width: 100%; padding: 15px; border: 1px solid var(--input-border); border-radius: 8px; font-family: var(--font-body); font-size: 1rem;">
                        <option value="" id="serviceSelectDefault"><?= \Core\Language::get('booking_select_service') ?></option>
                        <!-- Dynamic options based on Step 1 -->
                    </select>
                </div>

                <!-- STEP 3: Format -->
                <div class="step-content" id="step-3">
                    <h3 style="margin-bottom: 25px; color: var(--heading-color);">Tədris Formatı (Max 2 seçim)</h3>
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px;">
                        <label class="radio-card"><input type="checkbox" name="format[]" value="Onlayn"><span class="rc-content"><?= \Core\Language::get('booking_fmt1') ?></span></label>
                        <label class="radio-card"><input type="checkbox" name="format[]" value="Əyani"><span class="rc-content"><?= \Core\Language::get('booking_fmt2') ?></span></label>
                        <label class="radio-card"><input type="checkbox" name="format[]" value="Fərdi"><span class="rc-content"><?= \Core\Language::get('booking_fmt3') ?></span></label>
                        <label class="radio-card"><input type="checkbox" name="format[]" value="Qrup"><span class="rc-content"><?= \Core\Language::get('booking_fmt4') ?></span></label>
                    </div>
                </div>

                <!-- STEP 4: Dil -->
                <div class="step-content" id="step-4">
                    <h3 style="margin-bottom: 25px; color: var(--heading-color);">Hansı bölmədə təhsil almısınız (yəni təhsil aldığınız dil)</h3>
                    <div style="display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 15px;">
                        <label class="radio-card"><input type="radio" name="language" value="Azərbaycan dili" required><span class="rc-content"><?= \Core\Language::get('booking_lang1') ?></span></label>
                        <label class="radio-card"><input type="radio" name="language" value="Rus dili"><span class="rc-content"><?= \Core\Language::get('booking_lang2') ?></span></label>
                        <label class="radio-card"><input type="radio" name="language" value="İngilis dili"><span class="rc-content"><?= \Core\Language::get('booking_lang3') ?></span></label>
                    </div>
                </div>

                <!-- STEP 5: Təqvim -->
                <div class="step-content" id="step-5">
                    <h3 style="margin-bottom: 25px; color: var(--heading-color);"><?= \Core\Language::get('booking_step5') ?></h3>
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                        <div>
                            <label style="display: block; margin-bottom: 8px; color: var(--text-secondary);"><?= \Core\Language::get('booking_date') ?></label>
                            <input type="date" name="date" required min="<?= date('Y-m-d') ?>" style="width: 100%; padding: 15px; border: 1px solid var(--input-border); border-radius: 8px; font-family: var(--font-body);">
                        </div>
                        <div>
                            <label style="display: block; margin-bottom: 8px; color: var(--text-secondary);"><?= \Core\Language::get('booking_time') ?></label>
                            <input type="time" name="time" required style="width: 100%; padding: 15px; border: 1px solid var(--input-border); border-radius: 8px; font-family: var(--font-body);">
                        </div>
                    </div>
                </div>

                <!-- STEP 6: Şəxsi Məlumatlar -->
                <div class="step-content" id="step-6">
                    <h3 style="margin-bottom: 25px; color: var(--heading-color);"><?= \Core\Language::get('booking_step6') ?></h3>
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                        <input type="text" name="student_name" placeholder="<?= \Core\Language::get('booking_fullname') ?>"  required class="form-input" style="grid-column: span 2;">
                        <input type="tel" name="phone" placeholder="<?= \Core\Language::get('booking_phone') ?>"  required class="form-input">
                        <input type="tel" name="whatsapp" placeholder="<?= \Core\Language::get('booking_whatsapp') ?>"  class="form-input">
                        <input type="email" name="email" placeholder="<?= \Core\Language::get('booking_email') ?>"  required class="form-input" style="grid-column: span 2;">
                        <input type="text" name="age_or_class" placeholder="<?= \Core\Language::get('booking_age') ?>"  required class="form-input">
                        <input type="text" name="school" placeholder="<?= \Core\Language::get('booking_school') ?>"  class="form-input">
                        <input type="text" name="target_program" placeholder="<?= \Core\Language::get('booking_major') ?>"  class="form-input" style="grid-column: span 2;">
                    </div>
                </div>

                <!-- STEP 7: Təsdiq -->
                <div class="step-content" id="step-7" style="text-align: center;">
                    <div style="width: 80px; height: 80px; border-radius: 50%; background: #10b981; color: #fff; display: flex; align-items: center; justify-content: center; font-size: 2.5rem; margin: 0 auto 20px;">✓</div>
                    <h3 style="margin-bottom: 15px; color: var(--heading-color);"><?= \Core\Language::get('booking_step7') ?></h3>
                    <p style="color: var(--text-secondary); margin-bottom: 30px;"><?= \Core\Language::get('booking_step7_desc') ?></p>
                </div>

                <!-- Navigation Buttons -->
                <div style="display: flex; justify-content: space-between; margin-top: 40px; padding-top: 20px; border-top: 1px solid #e2e8f0;">
                    <button type="button" id="prevBtn" class="btn" style="background: transparent; border: 1px solid #cbd5e1; color: var(--text-secondary); display: none;"><?= \Core\Language::get('booking_btn_prev') ?></button>
                    <button type="button" id="nextBtn" class="btn btn-glow" style="margin-left: auto;"><?= \Core\Language::get('booking_btn_next') ?></button>
                    <button type="submit" id="submitBtn" class="btn btn-glow" style="background: #10b981; border-color: #10b981; margin-left: auto; display: none;"><?= \Core\Language::get('booking_btn_submit') ?></button>
                </div>
            </form>
            
            <div id="successMessage" style="display: none; text-align: center; padding: 40px 0;">
                <div style="width: 80px; height: 80px; border-radius: 50%; background: rgba(76,162,181,0.1); color: var(--aqua-teal); display: flex; align-items: center; justify-content: center; font-size: 2.5rem; margin: 0 auto 20px;">🎉</div>
                <h2 style="color: var(--heading-color); margin-bottom: 15px;"><?= \Core\Language::get('booking_success_title') ?></h2>
                <p style="color: var(--text-secondary); margin-bottom: 30px;"><?= \Core\Language::get('booking_success_desc') ?></p>
                <a href="<?= APP_URL ?>" class="btn"><?= \Core\Language::get('booking_btn_home') ?></a>
            </div>
        </div>
    </div>
</section>

<style>
.step-content { display: none; animation: fadeIn 0.5s ease; }
.step-content.active { display: block; }
@keyframes fadeIn { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }

.radio-card input { display: none; }
.rc-content { display: block; padding: 20px; border: 2px solid var(--border-color); border-radius: 12px; cursor: pointer; transition: all 0.3s; font-weight: 500; color: #475569; text-align: center; }
.radio-card input:checked + .rc-content { border-color: var(--aqua-teal); background: rgba(76,162,181,0.05); color: var(--heading-color); font-weight: 600; box-shadow: 0 4px 12px rgba(76,162,181,0.15); }

.form-input { width: 100%; padding: 15px; border: 1px solid var(--input-border); border-radius: 8px; font-family: var(--font-body); outline: none; transition: border-color 0.3s; }
.form-input:focus { border-color: var(--aqua-teal); }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const dbCourses = <?= json_encode(array_column($db_courses ?? [], 'title')) ?>;
    const dbCountries = <?= json_encode(array_column($db_countries ?? [], 'name')) ?>;

    const services = {
        'Thrive Education Center': dbCourses,
        'Thrive Study Abroad': dbCountries,
        'Thrive Creation Lab': ['İctimai Çıxış (Public Speaking)', 'Liderlik', 'Layihə İdarəetməsi', 'Startap Yaradılması']
    };

    let currentStep = 1;
    const totalSteps = 7;
    const form = document.getElementById('bookingForm');
    let selectedDirection = '';
    
    // Dynamic service loading based on direction
    document.querySelectorAll('input[name="direction"]').forEach(el => {
        el.addEventListener('change', function() {
            selectedDirection = this.value;
            const select = document.getElementById('serviceSelect');
            const defaultOpt = document.getElementById('serviceSelectDefault');
            const step2Title = document.getElementById('step2Title');
            
            const lang = '<?= \Core\Language::current() ?>';
            let countryText = 'Ölkə Seçimi';
            let countrySelect = 'Ölkə Seçin';
            if (lang === 'en') { countryText = 'Country Selection'; countrySelect = 'Select Country'; }
            if (lang === 'ru') { countryText = 'Выбор страны'; countrySelect = 'Выберите страну'; }
            
            if (selectedDirection === 'Thrive Study Abroad') {
                step2Title.innerText = countryText;
                defaultOpt.innerText = countrySelect;
            } else {
                step2Title.innerText = '<?= \Core\Language::get('booking_step2') ?>';
                defaultOpt.innerText = '<?= \Core\Language::get('booking_select_service') ?>';
            }
            
            select.innerHTML = '';
            select.appendChild(defaultOpt);
            
            if (services[this.value]) {
                services[this.value].forEach(srv => {
                    select.innerHTML += `<option value="${srv}">${srv}</option>`;
                });
            }
        });
    });

    function getNextStep(step) {
        if (selectedDirection === 'Thrive Study Abroad' && step === 2) return 5;
        return step + 1;
    }
    
    function getPrevStep(step) {
        if (selectedDirection === 'Thrive Study Abroad' && step === 5) return 2;
        return step - 1;
    }

    document.getElementById('nextBtn').addEventListener('click', () => {
        if (selectedDirection === 'Thrive Study Abroad') {
            document.querySelectorAll('input[name="language"]').forEach(el => el.required = false);
        } else {
            document.querySelectorAll('input[name="language"]').forEach(el => el.required = true);
        }

        if (validateStep(currentStep)) {
            document.getElementById(`step-${currentStep}`).classList.remove('active');
            currentStep = getNextStep(currentStep);
            updateUI();
        } else {
            alert('<?= \Core\Language::get('booking_err_req') ?>');
        }
    });

    document.getElementById('prevBtn').addEventListener('click', () => {
        document.getElementById(`step-${currentStep}`).classList.remove('active');
        currentStep = getPrevStep(currentStep);
        updateUI();
    });

    form.addEventListener('submit', function(e) {
        e.preventDefault();
        const formData = new FormData(form);
        
        // Show loading state on button
        const submitBtn = document.getElementById('submitBtn');
        const originalText = submitBtn.innerText;
        submitBtn.innerText = '<?= \Core\Language::get('booking_wait') ?>';
        submitBtn.disabled = true;

        fetch('<?= APP_URL ?>/book/submit', {
            method: 'POST',
            body: formData
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                form.style.display = 'none';
                document.getElementById('successMessage').style.display = 'block';
            } else {
                alert(data.message);
                submitBtn.innerText = originalText;
                submitBtn.disabled = false;
            }
        })
        .catch(err => {
            alert('<?= \Core\Language::get('booking_err_gen') ?>');
            submitBtn.innerText = originalText;
            submitBtn.disabled = false;
        });
    });

    function validateStep(step) {
        const currentContent = document.getElementById(`step-${step}`);
        const requiredFields = currentContent.querySelectorAll('[required]');
        let valid = true;
        
        if (step === 1 || step === 4) {
            const radios = currentContent.querySelectorAll('input[type="radio"]');
            if (radios.length > 0) {
                const checked = Array.from(radios).some(r => r.checked);
                if (!checked) valid = false;
            }
        }

        if (step === 3) {
            const checks = currentContent.querySelectorAll('input[type="checkbox"]');
            if (checks.length > 0) {
                const checkedCount = Array.from(checks).filter(c => c.checked).length;
                if (checkedCount === 0) valid = false;
                if (checkedCount > 2) {
                    alert('Maksimum 2 seçim edə bilərsiniz.');
                    valid = false;
                }
            }
        }
        
        requiredFields.forEach(field => {
            if (!field.value.trim()) valid = false;
        });
        
        return valid;
    }

    // Limit checkboxes directly on click
    const formatChecks = document.querySelectorAll('input[name="format[]"]');
    formatChecks.forEach(chk => {
        chk.addEventListener('change', function() {
            const checkedCount = document.querySelectorAll('input[name="format[]"]:checked').length;
            if (checkedCount > 2) {
                this.checked = false;
                alert('Maksimum 2 format seçə bilərsiniz.');
            }
        });
    });

    function updateUI() {
        document.getElementById(`step-${currentStep}`).classList.add('active');
        
        // Update Progress Bar
        const progress = ((currentStep - 1) / (totalSteps - 1)) * 100;
        document.getElementById('progressBar').style.width = `${progress}%`;
        
        for (let i = 1; i <= totalSteps; i++) {
            const ind = document.getElementById(`ind-${i}`);
            if (i <= currentStep) {
                ind.style.borderColor = 'var(--aqua-teal)';
                ind.style.color = 'var(--aqua-teal)';
                if (i < currentStep) {
                    ind.style.background = 'var(--aqua-teal)';
                    ind.style.color = '#fff';
                } else {
                    ind.style.background = '#fff';
                }
            } else {
                ind.style.borderColor = '#e2e8f0';
                ind.style.color = '#94a3b8';
                ind.style.background = '#fff';
            }
        }

        // Buttons
        document.getElementById('prevBtn').style.display = currentStep > 1 ? 'block' : 'none';
        
        if (currentStep === totalSteps) {
            document.getElementById('nextBtn').style.display = 'none';
            document.getElementById('submitBtn').style.display = 'block';
        } else {
            document.getElementById('nextBtn').style.display = 'block';
            document.getElementById('submitBtn').style.display = 'none';
        }
    }
});
</script>
