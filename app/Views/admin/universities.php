<?php $csrf_token = \Core\Security::generateCsrfToken(); ?>
<div class="content-header" style="display:flex; justify-content:space-between; align-items:center; margin-bottom:20px;">
    <h2><?= \Core\Language::get('admin_universities') ?? 'Universitetlər' ?></h2>
    <button class="btn btn-primary" onclick="openModal('addUniModal')"><i class="fas fa-plus"></i> <?= \Core\Language::get('admin_uni_add_btn') ?? 'Yeni Universitet' ?></button>
</div>

<?php if(!empty($_SESSION['error'])): ?>
    <div style="padding: 15px; background: #fee2e2; color: #b91c1c; border-radius: 8px; margin-bottom: 20px;">
        <?= htmlspecialchars($_SESSION['error']) ?>
        <?php unset($_SESSION['error']); ?>
    </div>
<?php endif; ?>

<?php if(!empty($_SESSION['success'])): ?>
    <div style="padding: 15px; background: #d4edda; color: #155724; border-radius: 8px; margin-bottom: 20px;">
        <?= htmlspecialchars($_SESSION['success']) ?>
        <?php unset($_SESSION['success']); ?>
    </div>
<?php endif; ?>

<div class="table-container">
    <table class="admin-table">
        <thead>
            <tr>
                <th>ID</th>
                <th><?= \Core\Language::get('admin_country_col') ?? 'Ölkə' ?></th>
                <th><?= \Core\Language::get('admin_universities') ?? 'Universitet Adı' ?></th>
                <th><?= \Core\Language::get('admin_uni_avg_fee_col') ?? 'Ortalama Qiymət' ?></th>
                <th><?= \Core\Language::get('admin_uni_ranking_col') ?? 'Reytinq' ?></th>
                <th><?= \Core\Language::get('admin_uni_featured_col') ?? 'Xüsusi?' ?></th>
                <th><?= \Core\Language::get('admin_emeliyyat') ?? 'Əməliyyatlar' ?></th>
            </tr>
        </thead>
        <tbody id="uni-table-body">
            <?php foreach($universities as $u): ?>
            <tr data-id="<?= $u['id'] ?>" style="cursor: grab;">
                <td>
                    <i class="fas fa-grip-vertical" style="color: #cbd5e1; margin-right: 10px;"></i>
                    <?= $u['id'] ?>
                </td>
                <td><?= htmlspecialchars($u['country_name']) ?></td>
                <td>
                    <div style="display:flex; align-items:center; gap:10px;">
                        <?php if($u['image_url']): ?>
                            <img src="<?= APP_URL ?><?= htmlspecialchars($u['image_url']) ?>" style="width:40px; height:40px; border-radius:4px; object-fit:cover;">
                        <?php endif; ?>
                        <?= htmlspecialchars($u['name']) ?>
                    </div>
                </td>
                <td><?= htmlspecialchars($u['avg_tuition_fee'] ?? '-') ?></td>
                <td><?= htmlspecialchars($u['ranking'] ?? '-') ?></td>
                <td><?= $u['is_featured'] ? '<span style="color:#10b981;">Bəli</span>' : '<span style="color: var(--text-secondary);">Xeyr</span>' ?></td>
                <td>
                    <button class="btn-sm" onclick="editUni(<?= htmlspecialchars(json_encode($u), ENT_QUOTES, 'UTF-8') ?>)" style="background:#eab308; color:#fff; border:none; cursor:pointer;"><i class="fas fa-edit"></i></button>
                    <a href="<?= APP_URL ?>/admin/universities/delete/<?= $u['id'] ?>?token=<?= htmlspecialchars($csrf_token) ?>" class="btn-sm" style="background:#ef4444; color:#fff; text-decoration:none;" onclick="return confirm('Silməyə əminsiniz?');"><i class="fas fa-trash"></i></a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<!-- Modal -->
<div id="addUniModal" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(15,23,42,0.6); backdrop-filter: blur(4px); z-index:9999; align-items:center; justify-content:center;">
    <div style="background:var(--card-bg); width:90%; max-width:700px; padding:35px; border-radius:16px; position:relative; max-height:90vh; overflow-y:auto; box-shadow: 0 20px 40px rgba(0,0,0,0.1);">
        <button onclick="closeModal('addUniModal')" style="position:absolute; top:20px; right:20px; background:var(--input-bg); border:1px solid var(--input-border); width:36px; height:36px; border-radius:50%; display:flex; align-items:center; justify-content:center; cursor:pointer; color:var(--text-secondary); transition:all 0.2s;">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
        </button>
        <h3 style="margin:0 0 5px 0; color:var(--text-main); font-size:1.5rem; font-weight:700;" id="modalTitle"><?= \Core\Language::get('admin_uni_add_btn') ?? 'Yeni Universitet' ?></h3>
        <p style="margin:0 0 25px 0; color:var(--text-secondary); font-size:0.95rem;"><?= \Core\Language::get('admin_uni_add_desc') ?? 'Universitet məlumatlarını daxil edin.' ?></p>
        
        <form action="<?= APP_URL ?>/admin/universities/save" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($csrf_token) ?>">
            <input type="hidden" name="id" id="uni_id">
            <input type="hidden" name="current_image" id="uni_current_image">
            
            <style>
                #addUniModal .form-control { padding: 12px 16px; border-radius: 10px; border: 1px solid #cbd5e1; font-size: 1rem; width: 100%; box-sizing: border-box; transition: border-color 0.2s; background: var(--bg-light); color: var(--text-main); }
                #addUniModal .form-control:focus { border-color: var(--aqua-teal) !important; box-shadow: 0 0 0 3px rgba(76, 162, 181, 0.15) !important; outline: none; }
                #addUniModal label { font-weight: 600; color: var(--text-main); margin-bottom: 6px; display: block; font-size:0.95rem; }
            </style>

            <div style="margin-bottom:20px;">
                <label><?= \Core\Language::get('admin_country_col') ?? 'Ölkə' ?> <span style="color:#ef4444;">*</span></label>
                <select name="country_id" id="uni_country" class="form-control" required>
                    <option value="">-- <?= \Core\Language::get('admin_select') ?? 'Seçin' ?> --</option>
                    <?php foreach($countries as $c): ?>
                        <option value="<?= $c['id'] ?>"><?= htmlspecialchars($c['name']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div style="margin-bottom:20px;">
                <label><?= \Core\Language::get('admin_name_col') ?? 'Ad' ?> <span style="color:#ef4444;">*</span></label>
                <input type="text" name="name" id="uni_name" class="form-control" required>
            </div>
            
            <div style="display:grid; grid-template-columns: 1fr 1fr; gap:20px; margin-bottom:20px;">
                <div>
                    <label><?= \Core\Language::get('admin_uni_avg_fee') ?? 'Ortalama Qiymət (məs: $10,000)' ?></label>
                    <input type="text" name="avg_tuition_fee" id="uni_fee" class="form-control">
                </div>
                <div>
                    <label><?= \Core\Language::get('admin_uni_ranking') ?? 'Reytinq (məs: #10)' ?></label>
                    <input type="text" name="ranking" id="uni_ranking" class="form-control">
                </div>
            </div>

            <div style="margin-bottom:20px;">
                <label><?= \Core\Language::get('admin_uni_majors') ?? 'İxtisaslar (vergüllə ayrılmış, məs: IT, Business)' ?></label>
                <input type="text" name="majors" id="uni_majors" class="form-control">
            </div>

            <div style="margin-bottom:20px;">
                <label><?= \Core\Language::get('admin_desc') ?? 'Təsvir' ?> (AZ)</label>
                <textarea name="description" id="uni_desc" class="form-control" rows="3"></textarea>
            </div>
            
            <div style="margin-bottom:20px;">
                <label><?= \Core\Language::get('admin_desc') ?? 'Təsvir' ?> (EN)</label>
                <textarea name="description_en" id="uni_desc_en" class="form-control" rows="3"></textarea>
            </div>

            <div style="margin-bottom:20px;">
                <label><?= \Core\Language::get('admin_desc') ?? 'Təsvir' ?> (RU)</label>
                <textarea name="description_ru" id="uni_desc_ru" class="form-control" rows="3"></textarea>
            </div>

            <div style="margin-bottom:20px; background: var(--input-bg); padding: 20px; border-radius: 12px; border: 1px dashed #cbd5e1;">
                <label style="display:flex; align-items:center; gap:8px;">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="var(--aqua-teal)" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><circle cx="8.5" cy="8.5" r="1.5"></circle><polyline points="21 15 16 10 5 21"></polyline></svg>
                    <?= \Core\Language::get('admin_image_url') ?? 'Şəkil Yüklə' ?>
                </label>
                <div id="uni_img_preview" style="display:none; margin-bottom:10px;">
                    <img src="" style="width:80px; height:80px; border-radius:8px; object-fit:cover; border:1px solid var(--border-color);">
                </div>
                <input type="file" name="image" class="form-control" accept="image/*" style="padding: 10px;" onchange="previewUniImage(this)">
                <small style="color:var(--text-secondary); display:block; margin-top:8px;">Yeni şəkil yükləməsəniz, əvvəlki şəkil olduğu kimi qalacaq.</small>
            </div>

            <div style="margin-bottom:30px;">
                <label style="display:flex; align-items:center; gap:10px; cursor:pointer; font-weight:normal; background:#f8fafc; padding:15px; border-radius:10px; border:1px solid #e2e8f0;">
                    <input type="checkbox" name="is_featured" id="uni_featured" value="1" style="width:20px; height:20px; accent-color:var(--aqua-teal);">
                    <span style="color:#334155;"><?= \Core\Language::get('admin_uni_featured') ?? 'Önə Çıxan Universitet (Ana Səhifədə göstərilsin)' ?></span>
                </label>
            </div>

            <div style="display:flex; gap:15px; justify-content:flex-end;">
                <button type="button" onclick="closeModal('addUniModal')" class="btn" style="background: #f1f5f9; color: #475569; padding: 12px 25px; font-weight: 600; border-radius: 10px;"><?= \Core\Language::get('admin_cancel_btn') ?? 'Ləğv Et' ?></button>
                <button type="submit" class="btn" style="background: var(--aqua-teal); color: white; padding: 12px 25px; font-weight: 600; border-radius: 10px; display:flex; align-items:center; gap:8px; box-shadow: 0 4px 12px rgba(76,162,181,0.3); border:none; cursor:pointer;">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path><polyline points="17 21 17 13 7 13 7 21"></polyline><polyline points="7 3 7 8 15 8"></polyline></svg>
                    <?= \Core\Language::get('admin_save_btn') ?? 'Yadda Saxla' ?>
                </button>
            </div>
        </form>
    </div>
</div>

<script>
function openModal(id) {
    document.getElementById(id).style.display = 'flex';
}
function closeModal(id) {
    document.getElementById(id).style.display = 'none';
    document.getElementById('uni_id').value = '';
    document.getElementById('uni_country').value = '';
    document.getElementById('uni_name').value = '';
    document.getElementById('uni_fee').value = '';
    document.getElementById('uni_ranking').value = '';
    document.getElementById('uni_majors').value = '';
    document.getElementById('uni_desc').value = '';
    document.getElementById('uni_desc_en').value = '';
    document.getElementById('uni_desc_ru').value = '';
    document.getElementById('uni_current_image').value = '';
    document.getElementById('uni_img_preview').style.display = 'none';
    document.getElementById('uni_featured').checked = false;
    document.getElementById('modalTitle').innerText = '<?= \Core\Language::get("admin_uni_add_btn") ?? "Yeni Universitet" ?>';
}
function editUni(u) {
    document.getElementById('uni_id').value = u.id;
    document.getElementById('uni_country').value = u.country_id;
    document.getElementById('uni_name').value = u.name;
    document.getElementById('uni_fee').value = u.avg_tuition_fee || '';
    document.getElementById('uni_ranking').value = u.ranking || '';
    
    // Majors are stored as JSON string `["IT","Business"]`
    let majorsStr = '';
    try {
        if(u.majors) {
            let mArr = JSON.parse(u.majors);
            if(Array.isArray(mArr)) majorsStr = mArr.join(', ');
        }
    }catch(e){}
    document.getElementById('uni_majors').value = majorsStr;
    
    document.getElementById('uni_desc').value = u.description || '';
    document.getElementById('uni_desc_en').value = u.description_en || '';
    document.getElementById('uni_desc_ru').value = u.description_ru || '';
    
    document.getElementById('uni_current_image').value = u.image_url || '';
    if(u.image_url) {
        document.getElementById('uni_img_preview').style.display = 'block';
        document.getElementById('uni_img_preview').querySelector('img').src = '<?= APP_URL ?>' + u.image_url;
    } else {
        document.getElementById('uni_img_preview').style.display = 'none';
    }
    
    document.getElementById('uni_featured').checked = parseInt(u.is_featured) === 1;
    
    document.getElementById('modalTitle').innerText = '<?= \Core\Language::get("admin_uni_edit_title") ?? "Universiteti Redaktə Et" ?>';
    openModal('addUniModal');
}

function previewUniImage(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('uni_img_preview').style.display = 'block';
            document.getElementById('uni_img_preview').querySelector('img').src = e.target.result;
        }
        reader.readAsDataURL(input.files[0]);
    }
}
</script>

<script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
<script>
document.addEventListener("DOMContentLoaded", function() {
    var el = document.getElementById('uni-table-body');
    if (el) {
        new Sortable(el, {
            animation: 150,
            ghostClass: 'sortable-ghost',
            onEnd: function (evt) {
                var order = [];
                el.querySelectorAll('tr').forEach(function(row) {
                    order.push(row.getAttribute('data-id'));
                });

                fetch('<?= APP_URL ?>/admin/universities/reorder', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({ order: order })
                })
                .then(response => response.json())
                .then(data => {
                    if(!data.success) {
                        alert('Xəta baş verdi: Sıralama yadda saxlanılmadı.');
                    }
                })
                .catch(err => {
                    console.error('Error:', err);
                });
            }
        });
    }
});
</script>
