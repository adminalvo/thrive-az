<div class="admin-header" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
    <h2><i class="fas fa-edit" style="color: var(--primary); margin-right: 10px;"></i> <?= str_replace('{title}', htmlspecialchars($page['title']), \Core\Language::get('admin_design_page')) ?></h2>
    <div>
        <a href="<?= APP_URL ?>/admin/pages" class="btn-sm" style="background: rgba(255,255,255,0.1); color: #fff; padding: 10px 20px; border-radius: 8px; text-decoration: none; margin-right: 10px;">
            <i class="fas fa-arrow-left"></i> Geri
        </a>
        <a href="<?= APP_URL ?>/<?= $page['slug'] ?>" target="_blank" class="btn-sm" style="background: var(--secondary); color: #fff; padding: 10px 20px; border-radius: 8px; text-decoration: none;">
            <i class="fas fa-eye"></i> Bax
        </a>
    </div>
</div>

<?php if(isset($_GET['success'])): ?>
    <div style="background: rgba(16, 185, 129, 0.1); color: #10b981; padding: 15px; border-radius: 8px; margin-bottom: 20px; border: 1px solid rgba(16, 185, 129, 0.2);">
        <i class="fas fa-check-circle" style="margin-right: 8px;"></i> <?= \Core\Language::get('admin_page_saved') ?>
    </div>
<?php endif; ?>

<div style="display: grid; grid-template-columns: 300px 1fr; gap: 30px;">
    
    <!-- Səhifə Ayarları -->
    <div class="admin-card" style="background: #1e293b; padding: 25px; border-radius: 12px; border: 1px solid rgba(255,255,255,0.05); align-self: start;">
        <h3 style="margin-top: 0; color: #fff; font-size: 1.1rem; margin-bottom: 20px; border-bottom: 1px solid rgba(255,255,255,0.1); padding-bottom: 10px;">Ümumi Ayarlar</h3>
        <form action="<?= APP_URL ?>/admin/pages/edit/<?= $page['id'] ?>" method="POST">
            <div style="margin-bottom: 15px;">
                <label style="display: block; color: #94a3b8; font-size: 0.85rem; margin-bottom: 5px;">Başlıq</label>
                <input type="text" name="title" value="<?= htmlspecialchars($page['title']) ?>" required style="width: 100%; padding: 10px; background: rgba(0,0,0,0.2); border: 1px solid rgba(255,255,255,0.1); border-radius: 6px; color: #fff; font-size: 0.95rem;">
            </div>
            <div style="margin-bottom: 15px;">
                <label style="display: block; color: #94a3b8; font-size: 0.85rem; margin-bottom: 5px;">URL (Slug)</label>
                <input type="text" name="slug" value="<?= htmlspecialchars($page['slug']) ?>" required style="width: 100%; padding: 10px; background: rgba(0,0,0,0.2); border: 1px solid rgba(255,255,255,0.1); border-radius: 6px; color: #fff; font-size: 0.95rem;">
            </div>
            <div style="margin-bottom: 15px;">
                <label style="display: block; color: #94a3b8; font-size: 0.85rem; margin-bottom: 5px;">Meta Title</label>
                <input type="text" name="meta_title" value="<?= htmlspecialchars($page['meta_title']) ?>" style="width: 100%; padding: 10px; background: rgba(0,0,0,0.2); border: 1px solid rgba(255,255,255,0.1); border-radius: 6px; color: #fff; font-size: 0.95rem;">
            </div>
            <div style="margin-bottom: 15px;">
                <label style="display: block; color: #94a3b8; font-size: 0.85rem; margin-bottom: 5px;">Meta Description</label>
                <textarea name="meta_desc" rows="3" style="width: 100%; padding: 10px; background: rgba(0,0,0,0.2); border: 1px solid rgba(255,255,255,0.1); border-radius: 6px; color: #fff; font-size: 0.95rem; resize: vertical;"><?= htmlspecialchars($page['meta_desc']) ?></textarea>
            </div>
            <div style="margin-bottom: 20px;">
                <label style="display: block; color: #94a3b8; font-size: 0.85rem; margin-bottom: 5px;">Status</label>
                <select name="status" style="width: 100%; padding: 10px; background: rgba(0,0,0,0.2); border: 1px solid rgba(255,255,255,0.1); border-radius: 6px; color: #fff; font-size: 0.95rem;">
                    <option value="1" <?= $page['status'] == 1 ? 'selected' : '' ?>>Aktiv</option>
                    <option value="0" <?= $page['status'] == 0 ? 'selected' : '' ?>>Deaktiv</option>
                </select>
            </div>
            <button type="submit" style="width: 100%; background: rgba(255,255,255,0.1); color: #fff; border: 1px solid rgba(255,255,255,0.2); padding: 10px; border-radius: 6px; cursor: pointer; transition: 0.3s;">
                <?= \Core\Language::get('admin_update_settings') ?>
            </button>
        </form>
    </div>

    <!-- Page Builder -->
    <div class="admin-card" style="background: #0f172a; padding: 25px; border-radius: 12px; border: 1px solid rgba(255,255,255,0.05);">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; border-bottom: 1px solid rgba(255,255,255,0.1); padding-bottom: 15px;">
            <h3 style="margin: 0; color: #fff; font-size: 1.2rem;">Visual Editor</h3>
            <button onclick="saveBlocks()" style="background: var(--primary); color: #fff; border: none; padding: 10px 20px; border-radius: 6px; font-weight: 600; cursor: pointer;">
                <i class="fas fa-save"></i> <?= \Core\Language::get('admin_save_design') ?>
            </button>
        </div>

        <div id="blocks-container" style="min-height: 200px; display: flex; flex-direction: column; gap: 20px; margin-bottom: 30px;">
            <!-- Blocks will be injected here via JS -->
        </div>

        <div style="text-align: center; border: 2px dashed rgba(255,255,255,0.2); padding: 30px; border-radius: 12px;">
            <p style="color: #94a3b8; margin-bottom: 15px;"><?= \Core\Language::get('admin_add_new_section') ?></p>
            <div style="display: flex; justify-content: center; gap: 10px; flex-wrap: wrap;">
                <button onclick="addBlock('hero')" class="btn-sm" style="background: rgba(255,255,255,0.1); color: #fff; padding: 8px 15px; border-radius: 6px; cursor: pointer; border: none;"><i class="fas fa-image"></i> Hero Section</button>
                <button onclick="addBlock('text_image')" class="btn-sm" style="background: rgba(255,255,255,0.1); color: #fff; padding: 8px 15px; border-radius: 6px; cursor: pointer; border: none;"><i class="fas fa-columns"></i> <?= \Core\Language::get('admin_text_image') ?></button>
                <button onclick="addBlock('custom_html')" class="btn-sm" style="background: rgba(255,255,255,0.1); color: #fff; padding: 8px 15px; border-radius: 6px; cursor: pointer; border: none;"><i class="fas fa-code"></i> Custom HTML</button>
            </div>
        </div>
    </div>
</div>

<script>
    let blocks = [];
    
    // Yüklənmiş blokları bura alırıq
    <?php if(!empty($blocks)): ?>
        <?php foreach($blocks as $b): ?>
            blocks.push({
                type: '<?= $b['type'] ?>',
                content: <?= $b['content_json'] ?>
            });
        <?php endforeach; ?>
    <?php endif; ?>

    function renderBlocks() {
        const container = document.getElementById('blocks-container');
        container.innerHTML = '';
        
        if (blocks.length === 0) {
            container.innerHTML = '<div style="text-align:center; color: var(--text-secondary); padding: 40px;"><?= \Core\Language::get('admin_no_sections') ?></div>';
            return;
        }

        blocks.forEach((block, index) => {
            const blockEl = document.createElement('div');
            blockEl.style.cssText = 'background: #1e293b; border: 1px solid rgba(255,255,255,0.1); border-radius: 8px; overflow: hidden;';
            
            // Header
            let titleStr = block.type === 'hero' ? <?= json_encode(\Core\Language::get('admin_hero_section')) ?> : (block.type === 'text_image' ? <?= json_encode(\Core\Language::get('admin_text_and_image')) ?> : <?= json_encode(\Core\Language::get('admin_custom_html')) ?>);
            
            let html = `
                <div style="background: rgba(0,0,0,0.3); padding: 10px 15px; display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid rgba(255,255,255,0.05);">
                    <div style="font-weight: 600; font-size: 0.9rem; color: #cbd5e1;"><i class="fas fa-layer-group" style="margin-right:8px;"></i> ${titleStr}</div>
                    <div>
                        <button onclick="moveBlock(${index}, -1)" title="<?= \Core\Language::get('admin_block_up') ?>" style="background:transparent; border:none; color:#94a3b8; cursor:pointer; padding:5px;"><i class="fas fa-arrow-up"></i></button>
                        <button onclick="moveBlock(${index}, 1)" title="<?= \Core\Language::get('admin_block_down') ?>" style="background:transparent; border:none; color:#94a3b8; cursor:pointer; padding:5px;"><i class="fas fa-arrow-down"></i></button>
                        <button onclick="deleteBlock(${index})" title="<?= \Core\Language::get('admin_block_delete') ?>" style="background:transparent; border:none; color:#ef4444; cursor:pointer; padding:5px; margin-left: 10px;"><i class="fas fa-trash"></i></button>
                    </div>
                </div>
                <div style="padding: 15px;">
            `;

            if (block.type === 'hero') {
                html += `
                    <div style="margin-bottom: 10px;"><input type="text" placeholder="<?= \Core\Language::get('admin_block_title') ?>" value="${escapeHtml(block.content.title || '')}" onchange="updateBlock(${index}, 'title', this.value)" style="width: 100%; padding: 8px; background: rgba(0,0,0,0.2); border: 1px solid rgba(255,255,255,0.1); color: #fff; border-radius: 4px;"></div>
                    <div style="margin-bottom: 10px;"><textarea placeholder="<?= \Core\Language::get('admin_block_subtitle') ?>" onchange="updateBlock(${index}, 'desc', this.value)" style="width: 100%; padding: 8px; background: rgba(0,0,0,0.2); border: 1px solid rgba(255,255,255,0.1); color: #fff; border-radius: 4px; height: 60px;">${escapeHtml(block.content.desc || '')}</textarea></div>
                    <div style="display:flex; gap:10px; margin-bottom: 10px;">
                        <input type="text" placeholder="<?= \Core\Language::get('admin_block_btn_text') ?>" value="${escapeHtml(block.content.btn_text || '')}" onchange="updateBlock(${index}, 'btn_text', this.value)" style="flex:1; padding: 8px; background: rgba(0,0,0,0.2); border: 1px solid rgba(255,255,255,0.1); color: #fff; border-radius: 4px;">
                        <input type="text" placeholder="<?= \Core\Language::get('admin_block_btn_link') ?>" value="${escapeHtml(block.content.btn_link || '')}" onchange="updateBlock(${index}, 'btn_link', this.value)" style="flex:1; padding: 8px; background: rgba(0,0,0,0.2); border: 1px solid rgba(255,255,255,0.1); color: #fff; border-radius: 4px;">
                    </div>
                    <div><input type="text" placeholder="<?= \Core\Language::get('admin_block_bg_img') ?>" value="${escapeHtml(block.content.image || '')}" onchange="updateBlock(${index}, 'image', this.value)" style="width: 100%; padding: 8px; background: rgba(0,0,0,0.2); border: 1px solid rgba(255,255,255,0.1); color: #fff; border-radius: 4px;"></div>
                `;
            } 
            else if (block.type === 'text_image') {
                html += `
                    <div style="margin-bottom: 10px;"><input type="text" placeholder="<?= \Core\Language::get('admin_block_title') ?>" value="${escapeHtml(block.content.title || '')}" onchange="updateBlock(${index}, 'title', this.value)" style="width: 100%; padding: 8px; background: rgba(0,0,0,0.2); border: 1px solid rgba(255,255,255,0.1); color: #fff; border-radius: 4px;"></div>
                    <div style="margin-bottom: 10px;"><textarea placeholder="<?= \Core\Language::get('admin_block_text_html') ?>" onchange="updateBlock(${index}, 'text', this.value)" style="width: 100%; padding: 8px; background: rgba(0,0,0,0.2); border: 1px solid rgba(255,255,255,0.1); color: #fff; border-radius: 4px; height: 80px;">${escapeHtml(block.content.text || '')}</textarea></div>
                    <div style="display:flex; gap:10px;">
                        <input type="text" placeholder="<?= \Core\Language::get('admin_block_img_url') ?>" value="${escapeHtml(block.content.image || '')}" onchange="updateBlock(${index}, 'image', this.value)" style="flex:2; padding: 8px; background: rgba(0,0,0,0.2); border: 1px solid rgba(255,255,255,0.1); color: #fff; border-radius: 4px;">
                        <select onchange="updateBlock(${index}, 'image_pos', this.value)" style="flex:1; padding: 8px; background: rgba(0,0,0,0.2); border: 1px solid rgba(255,255,255,0.1); color: #fff; border-radius: 4px;">
                            <option value="left" ${block.content.image_pos === 'left' ? 'selected' : ''}><?= \Core\Language::get('admin_block_img_left') ?></option>
                            <option value="right" ${block.content.image_pos === 'right' ? 'selected' : ''}><?= \Core\Language::get('admin_block_img_right') ?></option>
                        </select>
                    </div>
                `;
            }
            else if (block.type === 'custom_html') {
                html += `
                    <div><textarea placeholder="<?= \Core\Language::get('admin_html_placeholder') ?>" onchange="updateBlock(${index}, 'html', this.value)" style="width: 100%; padding: 12px; font-family: monospace; background: #000; border: 1px solid rgba(255,255,255,0.1); color: #10b981; border-radius: 4px; height: 150px; resize: vertical;">${escapeHtml(block.content.html || '')}</textarea></div>
                `;
            }

            html += `</div>`;
            blockEl.innerHTML = html;
            container.appendChild(blockEl);
        });
    }

    function addBlock(type) {
        let content = {};
        if (type === 'hero') content = { title: '', desc: '', btn_text: '', btn_link: '', image: '' };
        if (type === 'text_image') content = { title: '', text: '', image: '', image_pos: 'right' };
        if (type === 'custom_html') content = { html: '<div class="container">\n  <h2><?= \Core\Language::get('admin_your_text') ?></h2>\n</div>' };

        blocks.push({ type: type, content: content });
        renderBlocks();
    }

    function updateBlock(index, field, value) {
        blocks[index].content[field] = value;
    }

    function deleteBlock(index) {
        if(confirm(<?= json_encode(\Core\Language::get('admin_delete_confirm')) ?>)) {
            blocks.splice(index, 1);
            renderBlocks();
        }
    }

    function moveBlock(index, direction) {
        if (index + direction < 0 || index + direction >= blocks.length) return;
        const temp = blocks[index];
        blocks[index] = blocks[index + direction];
        blocks[index + direction] = temp;
        renderBlocks();
    }

    function escapeHtml(unsafe) {
        if(!unsafe) return '';
        return unsafe
             .replace(/&/g, "&amp;")
             .replace(/</g, "&lt;")
             .replace(/>/g, "&gt;")
             .replace(/"/g, "&quot;")
             .replace(/'/g, "&#039;");
    }

    function saveBlocks() {
        const btn = document.querySelector('button[onclick="saveBlocks()"]');
        const origText = btn.innerHTML;
        btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> <?= \Core\Language::get('admin_wait') ?>';
        btn.disabled = true;

        fetch('<?= APP_URL ?>/admin/pages/blocks/<?= $page['id'] ?>', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ blocks: blocks })
        })
        .then(res => res.json())
        .then(data => {
            if(data.success) {
                alert('<?= \Core\Language::get('admin_design_saved') ?>');
            } else {
                alert('<?= \Core\Language::get('admin_error_occurred') ?>');
            }
        })
        .catch(err => {
            alert('<?= \Core\Language::get('admin_system_error') ?>');
        })
        .finally(() => {
            btn.innerHTML = origText;
            btn.disabled = false;
        });
    }

    // <?= \Core\Language::get('admin_first_load') ?>
    renderBlocks();
</script>
