<div class="content-header" style="display:flex; justify-content:space-between; align-items:center; margin-bottom:20px;">
    <h2><?= \Core\Language::get('admin_graduates') ?? 'Məzunlar (Nailiyyətlər)' ?></h2>
    <button class="btn btn-primary" onclick="openModal('addGraduateModal')"><i class="fas fa-plus"></i> Yeni Məzun</button>
</div>

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
                <th>Kateqoriya</th>
                <th>Ad Soyad</th>
                <th>Nəticə</th>
                <th>Təfərrüat</th>
                <th>Əməliyyatlar</th>
            </tr>
        </thead>
        <tbody id="graduate-table-body">
            <?php foreach($graduates as $g): 
                $cat_names = [
                    0 => 'SAT',
                    1 => 'CSCA',
                    2 => 'DİM & IELTS / DET',
                    3 => 'Qəbul & Təqaüdlər'
                ];
            ?>
            <tr data-id="<?= $g['id'] ?? '' ?>" style="cursor: grab;">
                <td>
                    <i class="fas fa-grip-vertical" style="color: #cbd5e1; margin-right: 10px;"></i>
                    <?= $g['id'] ?? '' ?>
                </td>
                <?php $cat_id = $g['category_id'] ?? null; ?>
                <td><span style="background:var(--input-bg); padding:4px 10px; border-radius:20px; font-size:0.85rem; font-weight:600;"><?= ($cat_id !== null && isset($cat_names[$cat_id])) ? $cat_names[$cat_id] : 'Naməlum' ?></span></td>
                <td><strong><?= htmlspecialchars($g['name'] ?? '') ?></strong></td>
                <td>
                    <strong style="color:var(--aqua-teal);"><?= htmlspecialchars($g['score'] ?? '') ?></strong>
                    <?php if(!empty($g['max_score'])): ?>
                        <span style="color:var(--text-secondary); font-size:0.8rem;">/ <?= htmlspecialchars($g['max_score']) ?></span>
                    <?php endif; ?>
                </td>
                <td>
                    <?php if(!empty($g['detail'])): ?>
                        <div style="font-size:0.9rem; color:var(--text-secondary);">
                            <?= htmlspecialchars($g['detail']) ?>
                        </div>
                    <?php endif; ?>
                </td>
                <td>
                    <button class="btn-sm" onclick="editGraduate(<?= htmlspecialchars(json_encode($g), ENT_QUOTES, 'UTF-8') ?>)" style="background:#eab308; color:#fff; border:none; cursor:pointer;"><i class="fas fa-edit"></i></button>
                    <a href="<?= APP_URL ?>/admin/graduates/delete/<?= $g['id'] ?>" class="btn-sm" style="background:#ef4444; color:#fff; text-decoration:none;" onclick="return confirm('Silməyə əminsiniz?');"><i class="fas fa-trash"></i></a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<!-- Modal -->
<div id="addGraduateModal" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(15,23,42,0.6); backdrop-filter: blur(4px); z-index:9999; align-items:center; justify-content:center;">
    <div style="background:var(--card-bg); width:90%; max-width:700px; padding:35px; border-radius:16px; position:relative; max-height:90vh; overflow-y:auto; box-shadow: 0 20px 40px rgba(0,0,0,0.1);">
        <button onclick="closeModal('addGraduateModal')" style="position:absolute; top:20px; right:20px; background:var(--input-bg); border:1px solid var(--input-border); width:36px; height:36px; border-radius:50%; display:flex; align-items:center; justify-content:center; cursor:pointer; color:var(--text-secondary); transition:all 0.2s;">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
        </button>
        <h3 style="margin:0 0 5px 0; color:var(--text-main); font-size:1.5rem; font-weight:700;" id="modalTitle">Yeni Nəticə</h3>
        <p style="margin:0 0 25px 0; color:var(--text-secondary); font-size:0.95rem;">Tələbənin imtahan və nailiyyət nəticələrini daxil edin.</p>
        
        <form action="<?= APP_URL ?>/admin/graduates/save" method="POST">
            <input type="hidden" name="id" id="grad_id">
            
            <style>
                #addGraduateModal .form-control { padding: 12px 16px; border-radius: 10px; border: 1px solid #cbd5e1; font-size: 1rem; width: 100%; box-sizing: border-box; transition: border-color 0.2s; background: var(--bg-light); color: var(--text-main); }
                #addGraduateModal .form-control:focus { border-color: var(--aqua-teal) !important; box-shadow: 0 0 0 3px rgba(76, 162, 181, 0.15) !important; outline: none; }
                #addGraduateModal label { font-weight: 600; color: var(--text-main); margin-bottom: 6px; display: block; font-size:0.95rem; }
            </style>

            <div style="margin-bottom:20px;">
                <label>Kateqoriya <span style="color:#ef4444;">*</span></label>
                <select name="category_id" id="grad_category" class="form-control" required>
                    <option value="0">SAT Nəticələri</option>
                    <option value="1">CSCA Nəticələri</option>
                    <option value="2">DİM & IELTS / DET</option>
                    <option value="3">Qəbul & Təqaüdlər</option>
                </select>
            </div>
            
            <div style="display:grid; grid-template-columns: 1fr 1fr 1fr; gap:20px; margin-bottom:20px;">
                <div>
                    <label>Ad Soyad (AZ) <span style="color:#ef4444;">*</span></label>
                    <input type="text" name="name" id="grad_name" class="form-control" required>
                </div>
                <div>
                    <label>Ad Soyad (EN)</label>
                    <input type="text" name="name_en" id="grad_name_en" class="form-control">
                </div>
                <div>
                    <label>Ad Soyad (RU)</label>
                    <input type="text" name="name_ru" id="grad_name_ru" class="form-control">
                </div>
            </div>

            <div style="display:grid; grid-template-columns: 1fr 1fr; gap:20px; margin-bottom:20px;">
                <div>
                    <label>Nəticə / Bal (Məs: 1510, 8.5, 680) <span style="color:#ef4444;">*</span></label>
                    <input type="text" name="score" id="grad_score" class="form-control" placeholder="Məs: 1510" required>
                </div>
                <div>
                    <label>Maksimum Bal (Faiz üçün, Məs: 1600, 9.0, 700) <span style="color:#ef4444;">*</span></label>
                    <input type="number" step="0.1" name="max_score" id="grad_max_score" class="form-control" placeholder="Məs: 1600" required>
                </div>
            </div>

            <!-- Ətraflı Məlumat / Təfərrüat -->
            <div style="margin-bottom:25px;">
                <label style="display:flex; justify-content:space-between; align-items:center;">
                    <span>Ətraflı Məlumat (Təfərrüat)</span>
                    <span style="font-size:0.8rem; color:var(--text-secondary); font-weight:normal;">(Universitet, fənn, rekord və ya qeyd)</span>
                </label>
                <div style="display:grid; grid-template-columns: 1fr 1fr 1fr; gap:15px;">
                    <div>
                        <label style="font-size:0.85rem; font-weight:600;">Təfərrüat (AZ)</label>
                        <input type="text" name="detail" id="grad_detail" class="form-control" placeholder="Məs: Harvard University">
                    </div>
                    <div>
                        <label style="font-size:0.85rem; font-weight:600;">Təfərrüat (EN)</label>
                        <input type="text" name="detail_en" id="grad_detail_en" class="form-control" placeholder="e.g. Harvard University">
                    </div>
                    <div>
                        <label style="font-size:0.85rem; font-weight:600;">Təfərrüat (RU)</label>
                        <input type="text" name="detail_ru" id="grad_detail_ru" class="form-control" placeholder="напр: Гарвардский университет">
                    </div>
                </div>
            </div>

            <div style="display:flex; gap:15px; justify-content:flex-end;">
                <button type="button" onclick="closeModal('addGraduateModal')" class="btn" style="background: #f1f5f9; color: #475569; padding: 12px 25px; font-weight: 600; border-radius: 10px; border:none; cursor:pointer;">Ləğv Et</button>
                <button type="submit" class="btn" style="background: var(--aqua-teal); color: white; padding: 12px 25px; font-weight: 600; border-radius: 10px; display:flex; align-items:center; gap:8px; box-shadow: 0 4px 12px rgba(76,162,181,0.3); border:none; cursor:pointer;">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path><polyline points="17 21 17 13 7 13 7 21"></polyline><polyline points="7 3 7 8 15 8"></polyline></svg>
                    Yadda Saxla
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
    document.getElementById('grad_id').value = '';
    document.getElementById('grad_category').value = '0';
    document.getElementById('grad_name').value = '';
    document.getElementById('grad_name_en').value = '';
    document.getElementById('grad_name_ru').value = '';
    document.getElementById('grad_score').value = '';
    document.getElementById('grad_max_score').value = '';
    document.getElementById('grad_detail').value = '';
    document.getElementById('grad_detail_en').value = '';
    document.getElementById('grad_detail_ru').value = '';
    document.getElementById('modalTitle').innerText = 'Yeni Nəticə';
}

function editGraduate(g) {
    document.getElementById('grad_id').value = g.id || '';
    document.getElementById('grad_category').value = g.category_id !== undefined ? g.category_id : '0';
    document.getElementById('grad_name').value = g.name || '';
    document.getElementById('grad_name_en').value = g.name_en || '';
    document.getElementById('grad_name_ru').value = g.name_ru || '';
    document.getElementById('grad_score').value = g.score || '';
    document.getElementById('grad_max_score').value = g.max_score || '';

    document.getElementById('grad_detail').value = g.detail || '';
    document.getElementById('grad_detail_en').value = g.detail_en || '';
    document.getElementById('grad_detail_ru').value = g.detail_ru || '';
    
    document.getElementById('modalTitle').innerText = 'Nəticəni Redaktə Et';
    openModal('addGraduateModal');
}
</script>

<script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
<script>
document.addEventListener("DOMContentLoaded", function() {
    var el = document.getElementById('graduate-table-body');
    if (el) {
        new Sortable(el, {
            animation: 150,
            ghostClass: 'sortable-ghost',
            onEnd: function (evt) {
                var order = [];
                el.querySelectorAll('tr').forEach(function(row) {
                    order.push(row.getAttribute('data-id'));
                });

                fetch('<?= APP_URL ?>/admin/graduates/reorder', {
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
                .catch(err => console.error('Error:', err));
            }
        });
    }
});
</script>
