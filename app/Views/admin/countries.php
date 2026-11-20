<div class="content-header" style="display:flex; justify-content:space-between; align-items:center; margin-bottom:20px;">
    <h2>Ölkələr (Study Abroad)</h2>
    <button onclick="openModal('addCountryModal')" class="btn btn-primary" style="background:#3b82f6; color:#fff; padding:10px 15px; border:none; border-radius:6px; cursor:pointer;"><i class="fas fa-plus"></i> Yeni Ölkə</button>
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
                <th><?= \Core\Language::get('admin_country_az') ?? 'Ad (AZ)' ?></th>
                <th><?= \Core\Language::get('admin_country_en') ?? 'Ad (EN)' ?></th>
                <th><?= \Core\Language::get('admin_country_ru') ?? 'Ad (RU)' ?></th>
                <th><?= \Core\Language::get('admin_emeliyyat') ?? 'Əməliyyatlar' ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($countries as $c): ?>
            <tr>
                <td><?= $c['id'] ?></td>
                <td><?= htmlspecialchars($c['name']) ?></td>
                <td><?= htmlspecialchars($c['name_en'] ?? '') ?></td>
                <td><?= htmlspecialchars($c['name_ru'] ?? '') ?></td>
                <td>
                    <button class="btn-sm" onclick='editCountry(<?= json_encode($c) ?>)' style="background:#eab308; color:#fff; border:none; cursor:pointer;"><i class="fas fa-edit"></i></button>
                    <a href="<?= APP_URL ?>/admin/countries/delete/<?= $c['id'] ?>" class="btn-sm" style="background:#ef4444; color:#fff; text-decoration:none;" onclick="return confirm('Əminsiniz? Bütün əlaqəli universitetlər də silinə bilər!');"><i class="fas fa-trash"></i></a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<!-- Modal -->
<div id="addCountryModal" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(15,23,42,0.6); backdrop-filter: blur(4px); z-index:9999; align-items:center; justify-content:center;">
    <div style="background:var(--card-bg); width:90%; max-width:600px; padding:35px; border-radius:16px; position:relative; box-shadow: 0 20px 40px rgba(0,0,0,0.1);">
        <button onclick="closeModal('addCountryModal')" style="position:absolute; top:20px; right:20px; background:var(--input-bg); border:1px solid var(--input-border); width:36px; height:36px; border-radius:50%; display:flex; align-items:center; justify-content:center; cursor:pointer; color:var(--text-secondary); transition:all 0.2s;">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
        </button>
        <h3 style="margin:0 0 5px 0; color:var(--text-main); font-size:1.5rem; font-weight:700;" id="modalTitle">Yeni Ölkə</h3>
        <p style="margin:0 0 25px 0; color:var(--text-secondary); font-size:0.95rem;">Ölkə məlumatlarını daxil edin.</p>
        
        <form action="<?= APP_URL ?>/admin/countries/save" method="POST">
            <input type="hidden" name="id" id="country_id">
            
            <style>
                #addCountryModal .form-control { padding: 12px 16px; border-radius: 10px; border: 1px solid #cbd5e1; font-size: 1rem; width: 100%; box-sizing: border-box; transition: border-color 0.2s; background: var(--bg-light); color: var(--text-main); }
                #addCountryModal .form-control:focus { border-color: var(--aqua-teal) !important; box-shadow: 0 0 0 3px rgba(76, 162, 181, 0.15) !important; outline: none; }
                #addCountryModal label { font-weight: 600; color: var(--text-main); margin-bottom: 6px; display: block; font-size:0.95rem; }
            </style>

            <div style="margin-bottom:20px;">
                <label>Ad (AZ) <span style="color:#ef4444;">*</span></label>
                <input type="text" name="name" id="country_name" class="form-control" required placeholder="Məs: Almaniya">
            </div>
            
            <div style="display:grid; grid-template-columns: 1fr 1fr; gap:20px; margin-bottom:30px;">
                <div>
                    <label>Ad (EN)</label>
                    <input type="text" name="name_en" id="country_name_en" class="form-control" placeholder="Məs: Germany">
                </div>
                <div>
                    <label>Ad (RU)</label>
                    <input type="text" name="name_ru" id="country_name_ru" class="form-control" placeholder="Məs: Германия">
                </div>
            </div>

            <div style="display:flex; gap:15px; justify-content:flex-end;">
                <button type="button" onclick="closeModal('addCountryModal')" class="btn" style="background: #f1f5f9; color: #475569; padding: 12px 25px; font-weight: 600; border-radius: 10px; border:none; cursor:pointer;">Ləğv Et</button>
                <button type="submit" class="btn" style="background: var(--aqua-teal, #4ca2b5); color: white; padding: 12px 25px; font-weight: 600; border-radius: 10px; display:flex; align-items:center; gap:8px; box-shadow: 0 4px 12px rgba(76,162,181,0.3); border:none; cursor:pointer;">
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
    document.getElementById('country_id').value = '';
    document.getElementById('country_name').value = '';
    document.getElementById('country_name_en').value = '';
    document.getElementById('country_name_ru').value = '';
    document.getElementById('country_image').value = '';
    document.getElementById('modalTitle').innerText = 'Yeni Ölkə';
}
function editCountry(c) {
    document.getElementById('country_id').value = c.id;
    document.getElementById('country_name').value = c.name;
    document.getElementById('country_name_en').value = c.name_en || '';
    document.getElementById('country_name_ru').value = c.name_ru || '';
    document.getElementById('modalTitle').innerText = 'Ölkəni Redaktə Et';
    openModal('addCountryModal');
}
</script>
