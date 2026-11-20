<style>
@media (max-width: 768px) {
    .profile-section { padding: 90px 15px 40px !important; }
    .profile-header { flex-direction: column; text-align: center; padding: 20px !important; align-items: center; justify-content: center; }
    .profile-header > div:first-child { position: static !important; width: 100px !important; height: 100px !important; margin-bottom: 10px; display:none; }
    .profile-header .logout-btn { margin-left: 0 !important; margin-top: 15px; width: 100%; justify-content: center; }
    .profile-tabs { padding-bottom: 5px; -webkit-overflow-scrolling: touch; }
    .tab-content > div { padding: 20px !important; overflow-x: auto; -webkit-overflow-scrolling: touch; }
    .upload-form { flex-direction: column; align-items: stretch !important; }
    .upload-form .form-group { width: 100% !important; min-width: 100% !important; }
    .upload-form button { width: 100%; }
    .chart-grid { grid-template-columns: 1fr !important; }
    table { min-width: 600px; }
}
</style>
<section class="profile-section" style="min-height: 100vh; background: var(--input-bg); padding: 120px 20px 60px;">
    <div class="container" style="max-width: 1000px; margin: 0 auto;">
        
        <div class="profile-header" style="background: var(--deep-navy); border-radius: 12px; padding: 30px; color: #fff; display: flex; align-items: center; gap: 20px; box-shadow: 0 10px 30px rgba(0, 11, 33, 0.1); margin-bottom: 30px; position: relative; overflow: hidden;">
            <div style="position: absolute; top: -50px; right: -50px; width: 150px; height: 150px; background: var(--dropdown-hover-bg); border-radius: 50%;"></div>
            <div style="width: 80px; height: 80px; background: var(--aqua-teal); border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 2rem; font-weight: bold; color: #fff; border: 4px solid rgba(255,255,255,0.2);">
                <?= strtoupper(substr($user['name'], 0, 1)) ?>
            </div>
            <div style="position: relative; z-index: 1;">
                <h1 style="font-family: var(--font-heading); font-size: 2rem; margin-bottom: 5px; color: #fff;"><?= htmlspecialchars($user['name'] . ' ' . $user['surname']) ?></h1>
                <p style="color: #cbd5e1; font-size: 0.95rem; margin: 0; display: flex; align-items: center; gap: 10px;">
                    <span style="background: rgba(255,255,255,0.1); padding: 4px 10px; border-radius: 20px; font-size: 0.8rem; text-transform: uppercase; letter-spacing: 1px;"><?= htmlspecialchars($user['role'] == 'student' ? 'Şagird' : ($user['role'] == 'parent' ? 'Valideyn' : 'Admin')) ?></span>
                    <?= htmlspecialchars($user['email']) ?>
                </p>
            </div>
            <a href="<?= APP_URL ?>/logout" class="logout-btn" style="margin-left: auto; background: rgba(239, 68, 68, 0.1); color: #fca5a5; padding: 10px 20px; border-radius: 6px; text-decoration: none; font-weight: 600; font-size: 0.9rem; transition: all 0.3s; display: flex; align-items: center; gap: 8px; z-index: 1;" onmouseover="this.style.background='rgba(239, 68, 68, 0.2)'; this.style.color='#fecaca';">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                Çıxış
            </a>
        </div>

        <?php if(isset($success) && $success): ?>
            <div style="background: #ecfdf5; color: #10b981; padding: 15px; border-radius: 8px; margin-bottom: 25px; border: 1px solid #a7f3d0; display: flex; align-items: center; gap: 10px;">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                <?= $success ?>
            </div>
        <?php endif; ?>
        <?php if(isset($error) && $error): ?>
            <div style="background: rgba(239, 68, 68, 0.1); color: #ef4444; padding: 15px; border-radius: 8px; margin-bottom: 25px; border: 1px solid rgba(239, 68, 68, 0.2); display: flex; align-items: center; gap: 10px;">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
                <?= $error ?>
            </div>
        <?php endif; ?>

        <!-- Tabs Navigation -->
        <div class="profile-tabs" style="display: flex; gap: 10px; margin-bottom: 25px; border-bottom: 2px solid #e2e8f0; overflow-x: auto;">
            <button class="tab-btn active" onclick="openTab(event, 'info')" style="padding: 12px 20px; background: none; border: none; border-bottom: 3px solid var(--aqua-teal); color: var(--heading-color); font-size: 1rem; font-weight: 600; cursor: pointer; transition: all 0.2s; white-space: nowrap;">Məlumatlarım</button>
            <?php if(empty($user['role']) || $user['role'] == 'student' || $user['role'] == 'applicant' || $user['role'] == 'admin'): ?>
                <button class="tab-btn" onclick="openTab(event, 'documents')" style="padding: 12px 20px; background: none; border: none; border-bottom: 3px solid transparent; color: var(--text-secondary); font-size: 1rem; font-weight: 600; cursor: pointer; transition: all 0.2s; white-space: nowrap;">Sənədlərim</button>
                <button class="tab-btn" onclick="openTab(event, 'applications')" style="padding: 12px 20px; background: none; border: none; border-bottom: 3px solid transparent; color: var(--text-secondary); font-size: 1rem; font-weight: 600; cursor: pointer; transition: all 0.2s; white-space: nowrap;">Müraciətlərim</button>
            <?php endif; ?>
            <?php if($user['role'] == 'student'): ?>
                <button class="tab-btn" onclick="openTab(event, 'results')" style="padding: 12px 20px; background: none; border: none; border-bottom: 3px solid transparent; color: var(--text-secondary); font-size: 1rem; font-weight: 600; cursor: pointer; transition: all 0.2s; white-space: nowrap;">Nəticələrim</button>
                <button class="tab-btn" onclick="openTab(event, 'attendance')" style="padding: 12px 20px; background: none; border: none; border-bottom: 3px solid transparent; color: var(--text-secondary); font-size: 1rem; font-weight: 600; cursor: pointer; transition: all 0.2s; white-space: nowrap;">Davamiyyət & Qiymətlər</button>
            <?php endif; ?>
            <?php if($user['role'] == 'parent'): ?>
                <button class="tab-btn" onclick="openTab(event, 'children')" style="padding: 12px 20px; background: none; border: none; border-bottom: 3px solid transparent; color: var(--text-secondary); font-size: 1rem; font-weight: 600; cursor: pointer; transition: all 0.2s; white-space: nowrap;">Övladlarım</button>
            <?php endif; ?>
            <?php if($user['role'] == 'teacher'): ?>
                <button class="tab-btn" onclick="openTab(event, 'teacher_classes')" style="padding: 12px 20px; background: none; border: none; border-bottom: 3px solid transparent; color: var(--text-secondary); font-size: 1rem; font-weight: 600; cursor: pointer; transition: all 0.2s; white-space: nowrap;">Dərslərim</button>
            <?php endif; ?>
            <button class="tab-btn" onclick="openTab(event, 'booking')" style="padding: 12px 20px; background: none; border: none; border-bottom: 3px solid transparent; color: var(--text-secondary); font-size: 1rem; font-weight: 600; cursor: pointer; transition: all 0.2s; white-space: nowrap;">Konsultasiya Rezervasiyası</button>
        </div>

        <!-- TAB 1: INFO -->
        <div id="info" class="tab-content" style="display: block;">
            <div class="tab-content-box" style="background: var(--card-bg); border-radius: 12px; box-shadow: 0 10px 30px var(--shadow-light); padding: 35px; border: 1px solid var(--border-color);">
                <h3 style="color: var(--heading-color); font-size: 1.3rem; margin-bottom: 25px; font-family: var(--font-heading); display: flex; align-items: center; gap: 10px;">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="var(--aqua-teal)" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                    Şəxsi Məlumatlar
                </h3>
                <form action="<?= APP_URL ?>/profile" method="POST">
                    <input type="hidden" name="update_profile" value="1">
                    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px; margin-bottom: 25px;">
                        <div class="form-group">
                            <label style="display: block; font-size: 0.85rem; color: #475569; margin-bottom: 8px; font-weight: 600;">Ad</label>
                            <input type="text" name="name" value="<?= htmlspecialchars($user['name']) ?>" required style="width: 100%; padding: 12px 15px; border: 1px solid var(--input-border); border-radius: 6px; font-family: var(--font-body); font-size: 1rem; color: var(--heading-color); outline: none; transition: 0.3s;" onfocus="this.style.borderColor='var(--aqua-teal)';">
                        </div>
                        <div class="form-group">
                            <label style="display: block; font-size: 0.85rem; color: #475569; margin-bottom: 8px; font-weight: 600;">Soyad</label>
                            <input type="text" name="surname" value="<?= htmlspecialchars($user['surname'] ?? '') ?>" required style="width: 100%; padding: 12px 15px; border: 1px solid var(--input-border); border-radius: 6px; font-family: var(--font-body); font-size: 1rem; color: var(--heading-color); outline: none; transition: 0.3s;" onfocus="this.style.borderColor='var(--aqua-teal)';">
                        </div>
                        <div class="form-group">
                            <label style="display: block; font-size: 0.85rem; color: #475569; margin-bottom: 8px; font-weight: 600;">Email Ünvanı</label>
                            <input type="email" name="email" value="<?= htmlspecialchars($user['email']) ?>" required style="width: 100%; padding: 12px 15px; border: 1px solid var(--input-border); border-radius: 6px; font-family: var(--font-body); font-size: 1rem; color: var(--heading-color); outline: none; transition: 0.3s;" onfocus="this.style.borderColor='var(--aqua-teal)';">
                        </div>
                        <div class="form-group">
                            <label style="display: block; font-size: 0.85rem; color: #475569; margin-bottom: 8px; font-weight: 600;">Telefon</label>
                            <input type="text" name="phone" value="<?= htmlspecialchars($user['phone'] ?? '') ?>" style="width: 100%; padding: 12px 15px; border: 1px solid var(--input-border); border-radius: 6px; font-family: var(--font-body); font-size: 1rem; color: var(--heading-color); outline: none; transition: 0.3s;" onfocus="this.style.borderColor='var(--aqua-teal)';">
                        </div>
                    </div>
                    
                    <div style="border-top: 1px solid #f1f5f9; padding-top: 25px; margin-bottom: 25px;">
                        <h4 style="color: var(--heading-color); font-size: 1.1rem; margin-bottom: 15px;">Şifrəni Yenilə (İstəyə bağlı)</h4>
                        <div class="form-group" style="max-width: 400px;">
                            <label style="display: block; font-size: 0.85rem; color: #475569; margin-bottom: 8px; font-weight: 600;">Yeni Şifrə</label>
                            <input type="password" name="password" placeholder="Yeni şifrə yazın (dəyişmək üçün)" style="width: 100%; padding: 12px 15px; border: 1px solid var(--input-border); border-radius: 6px; font-family: var(--font-body); font-size: 1rem; color: var(--heading-color); outline: none; transition: 0.3s;" onfocus="this.style.borderColor='var(--aqua-teal)';">
                        </div>
                    </div>
                    
                    <div style="text-align: right;">
                        <button type="submit" style="background: var(--aqua-teal); color: #fff; border: none; padding: 12px 30px; border-radius: 6px; font-weight: 600; font-family: var(--font-body); cursor: pointer; transition: 0.3s; box-shadow: 0 4px 10px rgba(76, 162, 181, 0.3);" onmouseover="this.style.transform='translateY(-2px)';" onmouseout="this.style.transform='translateY(0)';">
                            Məlumatları Yadda Saxla
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- TAB 2: DOCUMENTS -->
        <div id="documents" class="tab-content" style="display: none;">
            <div class="tab-content-box" style="background: var(--card-bg); border-radius: 12px; box-shadow: 0 10px 30px var(--shadow-light); padding: 35px; border: 1px solid var(--border-color); margin-bottom: 30px;">
                <h3 style="color: var(--heading-color); font-size: 1.3rem; margin-bottom: 15px; font-family: var(--font-heading); display: flex; align-items: center; gap: 10px;">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="var(--aqua-teal)" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="12" y1="18" x2="12" y2="12"></line><line x1="9" y1="15" x2="15" y2="15"></line></svg>
                    Yeni Sənəd Yüklə
                </h3>
                <p style="color: var(--text-secondary); font-size: 0.9rem; margin-bottom: 25px;">Tələb olunan sənədlərinizi buradan sistemə yükləyin (Yalnız PDF, JPG, PNG). Maksimum həcm: 5MB.</p>
                
                <form class="upload-form" action="<?= APP_URL ?>/profile/upload-document" method="POST" enctype="multipart/form-data" style="display: flex; gap: 20px; align-items: flex-end; flex-wrap: wrap;">
                    <div class="form-group" style="flex: 1; min-width: 200px;">
                        <label style="display: block; font-size: 0.85rem; color: #475569; margin-bottom: 8px; font-weight: 600;">Sənədin Növü</label>
                        <select name="document_type" required style="width: 100%; padding: 12px 15px; border: 1px solid var(--input-border); border-radius: 6px; font-family: var(--font-body); font-size: 1rem; color: var(--heading-color); outline: none;">
                            <option value="Şəxsiyyət Vəsiqəsi">Şəxsiyyət Vəsiqəsi (Ön və Arxa)</option>
                            <option value="Xarici Pasport">Xarici Pasport</option>
                            <option value="Attestat / Diplom">Attestat / Diplom</option>
                            <option value="Transkript">Transkript (Qiymət cədvəli)</option>
                            <option value="IELTS/TOEFL Sertifikatı">IELTS / TOEFL Sertifikatı</option>
                            <option value="Digər">Digər</option>
                        </select>
                    </div>
                    <div class="form-group" style="flex: 1; min-width: 250px;">
                        <label style="display: block; font-size: 0.85rem; color: #475569; margin-bottom: 8px; font-weight: 600;">Fayl Seçin</label>
                        <input type="file" name="document_file" required accept=".pdf,.jpg,.jpeg,.png" style="width: 100%; padding: 9px 15px; border: 1px solid var(--input-border); border-radius: 6px; font-family: var(--font-body); background: var(--input-bg); cursor: pointer;">
                    </div>
                    <button type="submit" style="background: var(--deep-navy); color: #fff; border: none; padding: 12px 25px; border-radius: 6px; font-weight: 600; font-family: var(--font-body); cursor: pointer; transition: 0.3s; height: 47px;">Yüklə</button>
                </form>
            </div>

            <div style="background: var(--card-bg); border-radius: 12px; box-shadow: 0 10px 30px var(--shadow-light); padding: 35px; border: 1px solid var(--border-color);">
                <h3 style="color: var(--heading-color); font-size: 1.3rem; margin-bottom: 25px; font-family: var(--font-heading);">Yüklənmiş Sənədlər</h3>
                
                <?php if(empty($documents)): ?>
                    <div style="text-align: center; padding: 40px; color: #94a3b8;">
                        <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" style="margin-bottom: 15px;"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path><polyline points="13 2 13 9 20 9"></polyline></svg>
                        <p>Hələ heç bir sənəd yükləməmisiniz.</p>
                    </div>
                <?php else: ?>
                    <div style="overflow-x: auto;">
                        <table style="width: 100%; border-collapse: collapse;">
                            <thead>
                                <tr style="background: var(--input-bg); border-bottom: 2px solid #e2e8f0;">
                                    <th style="padding: 15px; text-align: left; color: #475569; font-size: 0.9rem;">Sənəd Növü</th>
                                    <th style="padding: 15px; text-align: left; color: #475569; font-size: 0.9rem;">Tarix</th>
                                    <th style="padding: 15px; text-align: center; color: #475569; font-size: 0.9rem;">Status</th>
                                    <th style="padding: 15px; text-align: right; color: #475569; font-size: 0.9rem;">Bax</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($documents as $doc): ?>
                                <tr style="border-bottom: 1px solid #f1f5f9;">
                                    <td style="padding: 15px; color: var(--heading-color); font-weight: 500; font-size: 0.95rem;">
                                        <?= htmlspecialchars($doc['document_type']) ?>
                                        <?php if($doc['status'] == 'Rədd edildi' && !empty($doc['admin_comment'])): ?>
                                            <div style="font-size: 0.8rem; color: #ef4444; margin-top: 5px;">Səbəb: <?= htmlspecialchars($doc['admin_comment']) ?></div>
                                        <?php endif; ?>
                                    </td>
                                    <td style="padding: 15px; color: var(--text-secondary); font-size: 0.9rem;"><?= date('d.m.Y H:i', strtotime($doc['created_at'])) ?></td>
                                    <td style="padding: 15px; text-align: center;">
                                        <?php 
                                            $bg = '#fef3c7'; $color = '#d97706'; // Gözləmədə (Sarı)
                                            if($doc['status'] == 'Təsdiqləndi') { $bg = '#d1fae5'; $color = '#059669'; } // Yaşıl
                                            if($doc['status'] == 'Rədd edildi') { $bg = '#fee2e2'; $color = '#dc2626'; } // Qırmızı
                                        ?>
                                        <span style="display: inline-block; padding: 4px 12px; background: <?= $bg ?>; color: <?= $color ?>; border-radius: 20px; font-size: 0.85rem; font-weight: 600;"><?= htmlspecialchars($doc['status']) ?></span>
                                    </td>
                                    <td style="padding: 15px; text-align: right; display: flex; gap: 10px; justify-content: flex-end;">
                                        <a href="<?= APP_URL . $doc['file_path'] ?>" target="_blank" style="color: var(--aqua-teal); text-decoration: none; font-weight: 600; font-size: 0.9rem; transition: 0.3s;" onmouseover="this.style.color='var(--deep-navy)';">Faylı Aç</a>
                                        <a href="<?= APP_URL ?>/profile/delete-document/<?= $doc['id'] ?>" onclick="return confirm('Bu sənədi silmək istədiyinizə əminsiniz?');" style="color: #ef4444; text-decoration: none; font-weight: 600; font-size: 0.9rem; transition: 0.3s;" onmouseover="this.style.color='#b91c1c';">Sil</a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <!-- TAB 3: APPLICATIONS -->
        <div id="applications" class="tab-content" style="display: none;">
            <div class="tab-content-box" style="background: var(--card-bg); border-radius: 12px; box-shadow: 0 10px 30px var(--shadow-light); padding: 35px; border: 1px solid var(--border-color);">
                <h3 style="color: var(--heading-color); font-size: 1.3rem; margin-bottom: 25px; font-family: var(--font-heading); display: flex; align-items: center; gap: 10px;">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="var(--aqua-teal)" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                    Aktiv Müraciətlərim
                </h3>
                
                <?php if(empty($applications)): ?>
                    <div style="text-align: center; padding: 40px; color: #94a3b8;">
                        <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" style="margin-bottom: 15px;"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                        <p>Hazırda aktiv bir təhsil müraciətiniz yoxdur. Sənədləriniz tamdırsa, mərkəzimizlə əlaqə saxlayın.</p>
                    </div>
                <?php else: ?>
                    <div style="display: grid; grid-template-columns: 1fr; gap: 20px;">
                        <?php foreach($applications as $app): ?>
                            <div style="border: 1px solid var(--input-border); border-radius: 8px; padding: 20px; display: flex; justify-content: space-between; align-items: center;">
                                <div>
                                    <h4 style="color: var(--heading-color); font-size: 1.1rem; margin-bottom: 5px;"><?= htmlspecialchars($app['program_type']) ?></h4>
                                    <p style="color: var(--text-secondary); font-size: 0.85rem; margin: 0;">Müraciət tarixi: <?= date('d.m.Y', strtotime($app['created_at'])) ?></p>
                                </div>
                                <div style="text-align: right;">
                                    <span style="display: inline-block; padding: 6px 15px; background: var(--input-bg); border: 1px solid #cbd5e1; color: var(--heading-color); border-radius: 20px; font-size: 0.9rem; font-weight: 600;"><?= htmlspecialchars($app['status']) ?></span>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        
        <!-- TAB 4: ATTENDANCE & HOMEWORKS -->
        <?php if($user['role'] == 'student'): ?>
        <div id="attendance" class="tab-content" style="display: none;">
            <div class="tab-content-box" style="background: var(--card-bg); border-radius: 12px; box-shadow: 0 10px 30px var(--shadow-light); padding: 35px; border: 1px solid var(--border-color); margin-bottom:30px;">
                <h3 style="color: var(--heading-color); font-size: 1.3rem; margin-bottom: 25px; font-family: var(--font-heading);">Davamiyyət</h3>
                <?php if(empty($attendances)): ?>
                    <p style="color: var(--text-secondary);">Məlumat yoxdur.</p>
                <?php else: ?>
                    <table style="width: 100%; border-collapse: collapse;">
                        <tr style="background: var(--input-bg); border-bottom: 2px solid #e2e8f0;">
                            <th style="padding: 12px; text-align: left;">Kurs</th>
                            <th style="padding: 12px; text-align: left;">Tarix</th>
                            <th style="padding: 12px; text-align: left;">Status</th>
                        </tr>
                        <?php foreach($attendances as $att): ?>
                        <tr style="border-bottom: 1px solid #f1f5f9;">
                            <td style="padding: 12px;"><?= htmlspecialchars($att['course_title'] ?? '') ?></td>
                            <td style="padding: 12px;"><?= htmlspecialchars($att['date']) ?></td>
                            <td style="padding: 12px; font-weight:600;"><?= htmlspecialchars($att['status']) ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                <?php endif; ?>
            </div>

            <div style="background: var(--card-bg); border-radius: 12px; box-shadow: 0 10px 30px var(--shadow-light); padding: 35px; border: 1px solid var(--border-color);">
                <h3 style="color: var(--heading-color); font-size: 1.3rem; margin-bottom: 25px; font-family: var(--font-heading);">Ev Tapşırıqları və Nəticələr</h3>
                <?php if(empty($homeworks)): ?>
                    <p style="color: var(--text-secondary);">Məlumat yoxdur.</p>
                <?php else: ?>
                    <table style="width: 100%; border-collapse: collapse;">
                        <tr style="background: var(--input-bg); border-bottom: 2px solid #e2e8f0;">
                            <th style="padding: 12px; text-align: left;">Kurs</th>
                            <th style="padding: 12px; text-align: left;">Tapşırıq</th>
                            <th style="padding: 12px; text-align: left;">Nəticə</th>
                            <th style="padding: 12px; text-align: left;">Rəy</th>
                        </tr>
                        <?php foreach($homeworks as $hw): ?>
                        <tr style="border-bottom: 1px solid #f1f5f9;">
                            <td style="padding: 12px;"><?= htmlspecialchars($hw['course_title'] ?? '') ?></td>
                            <td style="padding: 12px;"><?= htmlspecialchars($hw['title']) ?></td>
                            <td style="padding: 12px; font-weight:bold; color:var(--aqua-teal);"><?= htmlspecialchars($hw['grade']) ?></td>
                            <td style="padding: 12px;"><?= htmlspecialchars($hw['feedback'] ?? '-') ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                <?php endif; ?>
            </div>
        </div>
        <?php endif; ?>

        <!-- TAB 5: CHILDREN -->
        <?php if($user['role'] == 'parent'): ?>
        <div id="children" class="tab-content" style="display: none;">
            <div class="tab-content-box" style="background: var(--card-bg); border-radius: 12px; box-shadow: 0 10px 30px var(--shadow-light); padding: 35px; border: 1px solid var(--border-color);">
                <h3 style="color: var(--heading-color); font-size: 1.3rem; margin-bottom: 25px; font-family: var(--font-heading);">Övladlarım</h3>
                <?php if(empty($children)): ?>
                    <p style="color: var(--text-secondary);">Hesabınıza bağlı şagird yoxdur. Əlaqələndirmə üçün mərkəzə müraciət edin.</p>
                <?php else: ?>
                    <div style="display: grid; gap: 20px;">
                        <?php foreach($children as $child): ?>
                            <div style="padding: 20px; border: 1px solid var(--input-border); border-radius: 8px;">
                                <h4 style="color: var(--heading-color); margin-bottom: 10px;"><?= htmlspecialchars($child['name'] . ' ' . $child['surname']) ?></h4>
                                <p style="color: var(--text-secondary); margin:0;">Ətraflı məlumat üçün şagirdin şəxsi kabinetinə daxil olun və ya ofisimizlə əlaqə saxlayın.</p>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <?php endif; ?>

        <!-- TAB: TEACHER CLASSES -->
        <?php if($user['role'] == 'teacher'): ?>
        <div id="teacher_classes" class="tab-content" style="display: none;">
            <div class="tab-content-box" style="background: var(--card-bg); border-radius: 12px; box-shadow: 0 10px 30px var(--shadow-light); padding: 35px; border: 1px solid var(--border-color);">
                <h3 style="color: var(--heading-color); font-size: 1.3rem; margin-bottom: 25px; font-family: var(--font-heading);">Cədvəlim və Dərslərim</h3>
                <?php if(empty($teacherClasses)): ?>
                    <p style="color: var(--text-secondary);">Hazırda təyin edilmiş dərs yoxdur.</p>
                <?php else: ?>
                    <div style="overflow-x: auto;">
                        <table style="width: 100%; border-collapse: collapse;">
                            <thead>
                                <tr style="background: var(--input-bg); border-bottom: 2px solid #e2e8f0;">
                                    <th style="padding: 15px; text-align: left; color: #475569; font-size: 0.9rem;">Dərs Adı</th>
                                    <th style="padding: 15px; text-align: left; color: #475569; font-size: 0.9rem;">Tələbə</th>
                                    <th style="padding: 15px; text-align: left; color: #475569; font-size: 0.9rem;">Tarix / Saat</th>
                                    <th style="padding: 15px; text-align: left; color: #475569; font-size: 0.9rem;">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($teacherClasses as $class): ?>
                                <tr style="border-bottom: 1px solid #f1f5f9;">
                                    <td style="padding: 15px; color: var(--heading-color); font-weight: 600;"><?= htmlspecialchars($class['title']) ?></td>
                                    <td style="padding: 15px; color: var(--text-secondary);"><?= htmlspecialchars($class['student_name'] . ' ' . $class['student_surname']) ?></td>
                                    <td style="padding: 15px; color: #475569;">
                                        <?= date('d.m.Y', strtotime($class['start_time'])) ?><br>
                                        <small><?= date('H:i', strtotime($class['start_time'])) ?> - <?= date('H:i', strtotime($class['end_time'])) ?></small>
                                    </td>
                                    <td style="padding: 15px;">
                                        <?php 
                                            $bg = '#fef3c7'; $color = '#d97706'; 
                                            if($class['status'] == 'completed') { $bg = '#d1fae5'; $color = '#059669'; } 
                                            if($class['status'] == 'cancelled') { $bg = '#fee2e2'; $color = '#dc2626'; } 
                                        ?>
                                        <span style="display: inline-block; padding: 4px 12px; background: <?= $bg ?>; color: <?= $color ?>; border-radius: 20px; font-size: 0.85rem; font-weight: 600;"><?= ucfirst(htmlspecialchars($class['status'])) ?></span>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <?php endif; ?>

        <!-- TAB 6: BOOKING -->
        <div id="booking" class="tab-content" style="display: none;">
            <div class="tab-content-box" style="background: var(--card-bg); border-radius: 12px; box-shadow: 0 10px 30px var(--shadow-light); padding: 35px; border: 1px solid var(--border-color); margin-bottom: 30px;">
                <h3 style="color: var(--heading-color); font-size: 1.3rem; margin-bottom: 25px; font-family: var(--font-heading);">Yeni Konsultasiya Rezervasiyası</h3>
                <form action="<?= APP_URL ?>/profile/book" method="POST">
                    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px; margin-bottom: 20px;">
                        <div class="form-group">
                            <label style="display: block; font-size: 0.85rem; font-weight: 600; margin-bottom: 8px;">Xidmət Növü</label>
                            <select name="service_type" required style="width: 100%; padding: 12px; border: 1px solid var(--input-border); border-radius: 6px;">
                                <option value="Xaricdə Təhsil">Xaricdə Təhsil Konsultasiyası</option>
                                <option value="IELTS / SAT Hazırlıq">IELTS / SAT Hazırlıq</option>
                                <option value="Creation Lab">Creation Lab Məlumat</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label style="display: block; font-size: 0.85rem; font-weight: 600; margin-bottom: 8px;">Tarix</label>
                            <input type="date" name="date" required min="<?= date('Y-m-d') ?>" style="width: 100%; padding: 12px; border: 1px solid var(--input-border); border-radius: 6px;">
                        </div>
                        <div class="form-group">
                            <label style="display: block; font-size: 0.85rem; font-weight: 600; margin-bottom: 8px;">Saat Seçimi</label>
                            <select name="time" required style="width: 100%; padding: 12px; border: 1px solid var(--input-border); border-radius: 6px;">
                                <option value="10:00 - 11:00">10:00 - 11:00</option>
                                <option value="12:00 - 13:00">12:00 - 13:00</option>
                                <option value="14:00 - 15:00">14:00 - 15:00</option>
                                <option value="16:00 - 17:00">16:00 - 17:00</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group" style="margin-bottom: 20px;">
                        <label style="display: block; font-size: 0.85rem; font-weight: 600; margin-bottom: 8px;">Qeydləriniz</label>
                        <textarea name="notes" rows="3" style="width: 100%; padding: 12px; border: 1px solid var(--input-border); border-radius: 6px;" placeholder="Bilməmizi istədiyiniz detallar..."></textarea>
                    </div>
                    <button type="submit" style="background: var(--aqua-teal); color: #fff; border: none; padding: 12px 30px; border-radius: 6px; font-weight: 600; cursor: pointer;">Rezervasiya Et</button>
                </form>
            </div>

            <div style="background: var(--card-bg); border-radius: 12px; box-shadow: 0 10px 30px var(--shadow-light); padding: 35px; border: 1px solid var(--border-color);">
                <h3 style="color: var(--heading-color); font-size: 1.3rem; margin-bottom: 25px; font-family: var(--font-heading);">Rezervasiyalarım</h3>
                <?php if(empty($bookings)): ?>
                    <p style="color: var(--text-secondary);">Aktiv rezervasiya yoxdur.</p>
                <?php else: ?>
                    <table style="width: 100%; border-collapse: collapse;">
                        <tr style="background: var(--input-bg); border-bottom: 2px solid #e2e8f0;">
                            <th style="padding: 12px; text-align: left;">Xidmət</th>
                            <th style="padding: 12px; text-align: left;">Tarix / Saat</th>
                            <th style="padding: 12px; text-align: left;">Status</th>
                        </tr>
                        <?php foreach($bookings as $book): ?>
                        <tr style="border-bottom: 1px solid #f1f5f9;">
                            <td style="padding: 12px;"><?= htmlspecialchars($book['service_type']) ?></td>
                            <td style="padding: 12px;"><?= date('d.m.Y', strtotime($book['date'])) ?> / <?= htmlspecialchars($book['time']) ?></td>
                            <td style="padding: 12px; font-weight:600; color: var(--heading-color);"><?= htmlspecialchars($book['status']) ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                <?php endif; ?>
            </div>
        </div>
        
        </div>
        
        <!-- TAB: RESULTS (Exam Charts) -->
        <?php if($user['role'] == 'student'): ?>
        <div id="results" class="tab-content" style="display: none;">
            <div class="tab-content-box" style="background: var(--card-bg); border-radius: 12px; box-shadow: 0 10px 30px var(--shadow-light); padding: 35px; border: 1px solid var(--border-color);">
                <h3 style="color: var(--heading-color); font-size: 1.3rem; margin-bottom: 25px; font-family: var(--font-heading); display: flex; align-items: center; gap: 10px;">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="var(--aqua-teal)" stroke-width="2"><path d="M3 3v18h18"/><path d="M18 17V9"/><path d="M13 17V5"/><path d="M8 17v-3"/></svg>
                    İmtahan Nəticələri (İnkişaf Qrafiki)
                </h3>

                <?php if(empty($examResults)): ?>
                    <p style="color: var(--text-secondary);">Hələ imtahan nəticəniz yoxdur.</p>
                <?php else: ?>
                    <?php 
                        $ieltsDates = []; $ieltsScores = [];
                        $satDates = []; $satScores = [];
                        foreach($examResults as $res) {
                            if($res['exam_type'] == 'IELTS Mock') {
                                $ieltsDates[] = date('M Y', strtotime($res['exam_date']));
                                $ieltsScores[] = floatval($res['score']);
                            } else if($res['exam_type'] == 'SAT Mock') {
                                $satDates[] = date('M Y', strtotime($res['exam_date']));
                                $satScores[] = floatval($res['score']);
                            }
                        }
                    ?>
                    
                    <div class="chart-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 30px; margin-bottom: 40px;">
                        <?php if(!empty($ieltsScores)): ?>
                        <div>
                            <h4 style="text-align:center; color: var(--ocean-blue);">IELTS Mock</h4>
                            <canvas id="ieltsChart"></canvas>
                        </div>
                        <?php endif; ?>

                        <?php if(!empty($satScores)): ?>
                        <div>
                            <h4 style="text-align:center; color: var(--aqua-teal);">SAT Mock</h4>
                            <canvas id="satChart"></canvas>
                        </div>
                        <?php endif; ?>
                    </div>

                    <h4 style="color: var(--heading-color); margin-bottom: 15px;">Nəticə Tarixçəsi və Müəllim Rəyi</h4>
                    <table style="width: 100%; border-collapse: collapse;">
                        <tr style="background: var(--input-bg); border-bottom: 2px solid #e2e8f0;">
                            <th style="padding: 12px; text-align: left;">Tarix</th>
                            <th style="padding: 12px; text-align: left;">İmtahan</th>
                            <th style="padding: 12px; text-align: left;">Bal</th>
                            <th style="padding: 12px; text-align: left;">Rəy (Feedback)</th>
                        </tr>
                        <?php foreach($examResults as $res): ?>
                        <tr style="border-bottom: 1px solid #f1f5f9;">
                            <td style="padding: 12px; color: var(--text-secondary);"><?= date('d.m.Y', strtotime($res['exam_date'])) ?></td>
                            <td style="padding: 12px; font-weight:600;"><?= htmlspecialchars($res['exam_type']) ?></td>
                            <td style="padding: 12px; font-weight:bold; color: var(--heading-color);"><?= htmlspecialchars($res['score']) ?></td>
                            <td style="padding: 12px; color: #475569; font-size:0.95rem;"><?= htmlspecialchars($res['feedback']) ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                <?php endif; ?>
            </div>
        </div>
        <?php endif; ?>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        function openTab(evt, tabName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tab-content");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tab-btn");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
                tablinks[i].style.color = "#64748b";
                tablinks[i].style.borderBottomColor = "transparent";
            }
            document.getElementById(tabName).style.display = "block";
            evt.currentTarget.className += " active";
            evt.currentTarget.style.color = "var(--deep-navy)";
            evt.currentTarget.style.borderBottomColor = "var(--aqua-teal)";
        }

        // Initialize Charts if data exists
        document.addEventListener("DOMContentLoaded", function() {
            <?php if(!empty($ieltsScores)): ?>
            new Chart(document.getElementById('ieltsChart'), {
                type: 'line',
                data: {
                    labels: <?= json_encode($ieltsDates) ?>,
                    datasets: [{
                        label: 'IELTS Balı',
                        data: <?= json_encode($ieltsScores) ?>,
                        borderColor: '#003f82',
                        backgroundColor: 'rgba(0, 63, 130, 0.1)',
                        tension: 0.4,
                        fill: true
                    }]
                },
                options: { scales: { y: { min: 0, max: 9 } } }
            });
            <?php endif; ?>

            <?php if(!empty($satScores)): ?>
            new Chart(document.getElementById('satChart'), {
                type: 'line',
                data: {
                    labels: <?= json_encode($satDates) ?>,
                    datasets: [{
                        label: 'SAT Balı',
                        data: <?= json_encode($satScores) ?>,
                        borderColor: '#4ca2b5',
                        backgroundColor: 'rgba(76, 162, 181, 0.1)',
                        tension: 0.4,
                        fill: true
                    }]
                },
                options: { scales: { y: { min: 400, max: 1600 } } }
            });
            <?php endif; ?>
        });
    </script>
</section>
