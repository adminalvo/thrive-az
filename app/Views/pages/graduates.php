<!-- Student Achievements Interactive 4-Card Speedometer Showcase -->
<section class="premium-hero center" style="padding-top: 150px; padding-bottom: 75px; min-height: 45vh; display: flex; align-items: center; justify-content: center; position: relative; overflow: hidden; background: linear-gradient(180deg, var(--deep-navy) 0%, #001f42 55%, var(--ocean-blue) 100%);">
    <div class="premium-hero-bg premium-hero-bg-abstract"></div>
    <div class="container" style="position: relative; z-index: 2; text-align: center;">
        <div data-aos="fade-down">
            <span style="display: inline-flex; align-items: center; gap: 8px; padding: 8px 22px; background: rgba(76,162,181,0.18); border: 1px solid var(--aqua-teal); border-radius: 30px; color: var(--aqua-teal); font-size: 0.85rem; font-weight: 700; letter-spacing: 2px; text-transform: uppercase; margin-bottom: 20px;">
                <i class="fa-solid fa-gauge-high"></i> <?= \Core\Language::get('graduates') ?>
            </span>
        </div>
        <h1 data-aos="fade-up" data-aos-delay="100" style="font-size: clamp(2.4rem, 5vw, 3.8rem); color: #fff; font-family: var(--font-heading); margin-bottom: 18px; text-transform: uppercase; font-weight: 800;">
            <?= \Core\Language::get('graduates_hero_title') ?? 'Məzunlarımız & Nəticələrimiz' ?>
        </h1>
        <p data-aos="fade-up" data-aos-delay="200" style="font-size: 1.2rem; color: rgba(255,255,255,0.88); max-width: 720px; margin: 0 auto 10px; line-height: 1.6;">
            <?= \Core\Language::get('graduates_hero_desc') ?? 'Kateqoriyalara klikləyərək məzunlarımızın müxtəlif imtahan və təqaüd üzrə spidometr göstəriciləri ilə tanış olun.' ?>
        </p>
    </div>
</section>

<section class="section" style="padding: 70px 0 100px; background: var(--bg-primary); position: relative;">
    <div class="container">

        <!-- 4 Interactive Category Selector Cards -->
        <div class="speedo-tabs-grid" data-aos="fade-up" data-aos-delay="100">
            <div class="speedo-tab-card active" onclick="switchSpeedoTab(0, this)">
                <div class="st-icon" style="background: rgba(124,58,237,0.12); color: #7c3aed;"><i class="fa-solid fa-graduation-cap"></i></div>
                <div class="st-info">
                    <h4><?= \Core\Language::get('grad_sat_tab') ?></h4>
                    <span><?= \Core\Language::get('grad_sat_sub') ?></span>
                </div>
                <div class="st-arrow">&rarr;</div>
            </div>

            <div class="speedo-tab-card" onclick="switchSpeedoTab(1, this)">
                <div class="st-icon" style="background: rgba(14,165,233,0.12); color: #0ea5e9;"><i class="fa-solid fa-atom"></i></div>
                <div class="st-info">
                    <h4><?= \Core\Language::get('grad_csca_tab') ?></h4>
                    <span><?= \Core\Language::get('grad_csca_sub') ?></span>
                </div>
                <div class="st-arrow">&rarr;</div>
            </div>

            <div class="speedo-tab-card" onclick="switchSpeedoTab(2, this)">
                <div class="st-icon" style="background: rgba(16,185,129,0.12); color: #10b981;"><i class="fa-solid fa-language"></i></div>
                <div class="st-info">
                    <h4><?= \Core\Language::get('grad_dim_tab') ?></h4>
                    <span><?= \Core\Language::get('grad_dim_sub') ?></span>
                </div>
                <div class="st-arrow">&rarr;</div>
            </div>

            <div class="speedo-tab-card" onclick="switchSpeedoTab(3, this)">
                <div class="st-icon" style="background: rgba(245,158,11,0.12); color: #f59e0b;"><i class="fa-solid fa-award"></i></div>
                <div class="st-info">
                    <h4><?= \Core\Language::get('grad_grant_tab') ?></h4>
                    <span><?= \Core\Language::get('grad_grant_sub') ?></span>
                </div>
                <div class="st-arrow">&rarr;</div>
            </div>
        </div>

        <!-- SVG Gradients for Speedometer Arcs -->
        <svg style="width:0; height:0; position:absolute;" aria-hidden="true">
            <defs>
                <linearGradient id="speedo-grad-0" x1="0%" y1="0%" x2="100%" y2="0%">
                    <stop offset="0%" stop-color="#7c3aed" />
                    <stop offset="100%" stop-color="#4ca2b5" />
                </linearGradient>
                <linearGradient id="speedo-grad-1" x1="0%" y1="0%" x2="100%" y2="0%">
                    <stop offset="0%" stop-color="#0ea5e9" />
                    <stop offset="100%" stop-color="#38bdf8" />
                </linearGradient>
                <linearGradient id="speedo-grad-2" x1="0%" y1="0%" x2="100%" y2="0%">
                    <stop offset="0%" stop-color="#10b981" />
                    <stop offset="100%" stop-color="#34d399" />
                </linearGradient>
                <linearGradient id="speedo-grad-3" x1="0%" y1="0%" x2="100%" y2="0%">
                    <stop offset="0%" stop-color="#f59e0b" />
                    <stop offset="100%" stop-color="#fbbf24" />
                </linearGradient>
            </defs>
        </svg>

        <?php
        $currentLang = \Core\Language::current();

        $defaultSpeedo = [
            // Category 0: SAT Nəticələri
            0 => [
                'max_val' => 1600,
                'unit' => '/ 1600',
                'grad' => '0',
                'items' => [
                    ['name' => 'Murad Əliyev', 'score' => 1550, 'pct' => 0.968, 'detail' => 'Harvard University'],
                    ['name' => 'Aysel Məmmədova', 'score' => 1530, 'pct' => 0.956, 'detail' => 'MIT'],
                    ['name' => 'Rəsul Qasımov', 'score' => 1520, 'pct' => 0.950, 'detail' => 'University of Oxford'],
                    ['name' => 'Omar Babayev', 'score' => 1510, 'pct' => 0.943, 'detail' => 'Bocconi University'],
                    ['name' => 'Fatima Yunus', 'score' => 1490, 'pct' => 0.931, 'detail' => 'KAIST University'],
                    ['name' => 'Rufat Humbatov', 'score' => 1490, 'pct' => 0.931, 'detail' => 'Politecnico di Milano'],
                ]
            ],
            // Category 1: CSCA Nəticələri
            1 => [
                'max_val' => 100,
                'unit' => '%',
                'grad' => '1',
                'items' => [
                    ['name' => 'Taghizada Samila', 'score' => 92.5, 'pct' => 0.925, 'detail' => 'Riyaziyyat Üzrə Rekord'],
                    ['name' => 'Javad Rahioli', 'score' => 87.5, 'pct' => 0.875, 'detail' => 'Riyaziyyat İxtisası'],
                    ['name' => 'Ulvi Ibrahimov', 'score' => 82.5, 'pct' => 0.825, 'detail' => 'Fizika & Riyaziyyat'],
                    ['name' => 'Sadig Rahimzade', 'score' => 82.5, 'pct' => 0.825, 'detail' => 'STEM Proqramı'],
                    ['name' => 'Cəmil Ələkbərli', 'score' => 77.5, 'pct' => 0.775, 'detail' => 'Tsinghua University'],
                    ['name' => 'Taghizada Saida', 'score' => 75.0, 'pct' => 0.750, 'detail' => 'Riyazi Təhlil'],
                ]
            ],
            // Category 2: DİM & IELTS / DET
            2 => [
                'max_val' => 700,
                'unit' => 'bal',
                'grad' => '2',
                'items' => [
                    ['name' => 'Kamran Məmmədov', 'score' => 685, 'pct' => 0.978, 'detail' => 'BANM - İnformasiya Təhlükəsizliyi'],
                    ['name' => 'Ləman Hüseynova', 'score' => 8.5, 'pct' => 0.944, 'detail' => 'IELTS Academic'],
                    ['name' => 'Nigar Abdullayeva', 'score' => 670, 'pct' => 0.957, 'detail' => 'ADA Universiteti'],
                    ['name' => 'Elvin Quliyev', 'score' => 145, 'pct' => 0.906, 'detail' => 'Duolingo English (DET)'],
                    ['name' => 'Leyla Əhmədova', 'score' => 660, 'pct' => 0.942, 'detail' => 'DİM Qrup III'],
                    ['name' => 'Rəsul Qasımov', 'score' => 8.5, 'pct' => 0.944, 'detail' => 'IELTS Academic'],
                ]
            ],
            // Category 3: Qəbul & Təqaüdlər
            3 => [
                'max_val' => 100,
                'unit' => '% Təqaüd',
                'grad' => '3',
                'items' => [
                    ['name' => 'Murad Əliyev', 'score' => 100, 'pct' => 1.000, 'detail' => 'Harvard Universiteti'],
                    ['name' => 'Aysel Məmmədova', 'score' => 100, 'pct' => 1.000, 'detail' => 'MIT Mühəndislik'],
                    ['name' => 'Cəmil Ələkbərli', 'score' => 100, 'pct' => 1.000, 'detail' => 'Tsinghua Təqaüd Proqramı'],
                    ['name' => 'Nigar Abdullayeva', 'score' => 100, 'pct' => 1.000, 'detail' => 'Prezident Təqaüdü'],
                    ['name' => 'Omar Babayev', 'score' => 100, 'pct' => 1.000, 'detail' => 'Bocconi Təqaüdü'],
                    ['name' => 'Fatima Yunus', 'score' => 100, 'pct' => 1.000, 'detail' => 'KAIST Tam Təhsil Təqaüdü'],
                ]
            ]
        ];

        // Group dynamic graduates from database by category
        $dbGrouped = [];
        if (!empty($graduates)) {
            foreach ($graduates as $g) {
                $c = isset($g['category_id']) ? (int)$g['category_id'] : 0;
                $maxV = !empty($g['max_score']) ? (float)$g['max_score'] : ($defaultSpeedo[$c]['max_val'] ?? 100);
                $sc = (float)str_replace(',', '.', $g['score'] ?? '0');
                $pct = $maxV > 0 ? min(1, max(0, $sc / $maxV)) : 0;
                
                $name = !empty($g['name_' . $currentLang]) ? $g['name_' . $currentLang] : ($g['name'] ?? '');
                $detail = !empty($g['detail_' . $currentLang]) ? $g['detail_' . $currentLang] : ($g['detail'] ?? '');
                
                $dbGrouped[$c][] = [
                    'name' => $name,
                    'score' => $g['score'] ?? '',
                    'pct' => $pct,
                    'detail' => $detail
                ];
            }
        }

        $speedoData = [];
        foreach ($defaultSpeedo as $cIdx => $catConfig) {
            $items = !empty($dbGrouped[$cIdx]) ? $dbGrouped[$cIdx] : $catConfig['items'];
            $speedoData[$cIdx] = [
                'max_val' => $catConfig['max_val'],
                'unit' => $catConfig['unit'],
                'grad' => $catConfig['grad'],
                'items' => $items
            ];
        }
        ?>

        <!-- Speedometer Content Panels -->
        <div class="speedo-panels-container" style="margin-top: 40px;">
            <?php foreach($speedoData as $cIdx => $cat): ?>
            <div class="speedo-panel <?= $cIdx === 0 ? 'active' : '' ?>" id="speedo-panel-<?= $cIdx ?>">
                <div class="speedometer-cards-grid">
                    <?php foreach($cat['items'] as $item):
                        $dashTotal = 251.2;
                        $dashTarget = round($dashTotal * (1 - $item['pct']), 2);
                        $angleTarget = round(-90 + ($item['pct'] * 180), 1);
                    ?>
                    <div class="speedometer-card">
                        <div class="speedo-svg-wrapper">
                            <svg viewBox="0 0 200 115" class="speedo-svg">
                                <!-- Background Track -->
                                <path d="M 20 100 A 80 80 0 0 1 180 100" fill="none" stroke="var(--border-color)" stroke-width="14" stroke-linecap="round" />
                                
                                <!-- Animated Value Arc with Slowdown Curve -->
                                <path class="speedo-arc" d="M 20 100 A 80 80 0 0 1 180 100" fill="none" stroke="url(#speedo-grad-<?= $cat['grad'] ?>)" stroke-width="14" stroke-linecap="round" stroke-dasharray="251.2" stroke-dashoffset="251.2" data-target-offset="<?= $dashTarget ?>" />

                                <!-- Tick marks -->
                                <line x1="20" y1="100" x2="28" y2="100" stroke="var(--text-secondary)" stroke-width="2" />
                                <line x1="100" y1="20" x2="100" y2="28" stroke="var(--text-secondary)" stroke-width="2" />
                                <line x1="180" y1="100" x2="172" y2="100" stroke="var(--text-secondary)" stroke-width="2" />

                                <!-- Animated Needle with Slowdown Curve -->
                                <g class="speedo-needle" data-target-angle="<?= $angleTarget ?>" style="transform-origin: 100px 100px; transform: rotate(-90deg);">
                                    <line x1="100" y1="56" x2="100" y2="26" stroke="var(--heading-color)" stroke-width="4" stroke-linecap="round" />
                                    <circle cx="100" cy="26" r="4.5" fill="var(--aqua-teal)" />
                                </g>
                            </svg>

                            <!-- Center Score Display -->
                            <div class="speedo-center-score">
                                <span class="speedo-counter-num" data-val="<?= $item['score'] ?>">0</span>
                                <span class="speedo-unit-label"><?= $cat['unit'] ?></span>
                            </div>
                        </div>

                        <div class="speedo-student-info">
                            <h4 class="speedo-s-name"><?= htmlspecialchars($item['name']) ?></h4>
                            <?php if(!empty($item['detail'])): ?>
                                <p class="speedo-s-detail"><?= htmlspecialchars($item['detail']) ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

    </div>
</section>

<style>
.speedo-tabs-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 20px;
    margin-bottom: 30px;
}
@media (max-width: 992px) {
    .speedo-tabs-grid { grid-template-columns: repeat(2, 1fr); }
}
@media (max-width: 576px) {
    .speedo-tabs-grid { grid-template-columns: 1fr; }
}
.speedo-tab-card {
    background: var(--card-bg);
    border: 1.5px solid var(--border-color);
    border-radius: 18px;
    padding: 22px 20px;
    display: flex;
    align-items: center;
    gap: 16px;
    cursor: pointer;
    transition: all 0.35s cubic-bezier(0.16, 1, 0.3, 1);
    box-shadow: 0 4px 15px rgba(0,0,0,0.02);
    position: relative;
    overflow: hidden;
}
.speedo-tab-card:hover {
    transform: translateY(-4px);
    border-color: var(--aqua-teal);
    box-shadow: 0 12px 25px rgba(76,162,181,0.1);
}
.speedo-tab-card.active {
    border-color: var(--aqua-teal);
    background: linear-gradient(135deg, var(--card-bg) 0%, rgba(76,162,181,0.08) 100%);
    box-shadow: 0 12px 30px rgba(76,162,181,0.15);
}
.st-icon {
    width: 48px;
    height: 48px;
    border-radius: 14px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.35rem;
    flex-shrink: 0;
    transition: transform 0.3s ease;
}
.speedo-tab-card.active .st-icon {
    transform: scale(1.1);
}
.st-info {
    flex-grow: 1;
    text-align: left;
}
.st-info h4 {
    margin: 0 0 4px;
    font-size: 1.05rem;
    color: var(--heading-color);
    font-weight: 600;
}
.st-info span {
    font-size: 0.82rem;
    color: var(--text-secondary);
}
.st-arrow {
    font-size: 1.2rem;
    color: var(--aqua-teal);
    opacity: 0;
    transform: translateX(-10px);
    transition: all 0.3s ease;
}
.speedo-tab-card.active .st-arrow,
.speedo-tab-card:hover .st-arrow {
    opacity: 1;
    transform: translateX(0);
}

/* Panels */
.speedo-panel {
    display: none;
    animation: fadeInSpeedo 0.45s ease forwards;
}
.speedo-panel.active {
    display: block;
}
@keyframes fadeInSpeedo {
    from { opacity: 0; transform: translateY(12px); }
    to { opacity: 1; transform: translateY(0); }
}

/* Speedometer Grid */
.speedometer-cards-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 24px;
}
@media (max-width: 992px) {
    .speedometer-cards-grid { grid-template-columns: repeat(2, 1fr); }
}
@media (max-width: 600px) {
    .speedometer-cards-grid { grid-template-columns: 1fr; }
}

.speedometer-card {
    background: var(--card-bg);
    border: 1px solid var(--border-color);
    border-radius: 24px;
    padding: 30px 22px 24px;
    text-align: center;
    display: flex;
    flex-direction: column;
    align-items: center;
    transition: all 0.4s ease;
    box-shadow: 0 4px 20px rgba(0,0,0,0.02);
    position: relative;
}
.speedometer-card:hover {
    transform: translateY(-6px);
    border-color: var(--aqua-teal);
    box-shadow: 0 15px 35px rgba(0,0,0,0.06);
}
.speedo-svg-wrapper {
    position: relative;
    width: 200px;
    height: 115px;
    margin-bottom: 16px;
}
.speedo-svg {
    width: 100%;
    height: 100%;
    overflow: visible;
}
/* Gradual Slowdown Deceleration (2.4s duration with ease-out cubic-bezier) */
.speedo-arc {
    transition: stroke-dashoffset 2.4s cubic-bezier(0.08, 0.82, 0.17, 1);
}
.speedo-needle {
    transition: transform 2.4s cubic-bezier(0.08, 0.82, 0.17, 1);
}
.speedo-center-score {
    position: absolute;
    bottom: 2px;
    left: 50%;
    transform: translateX(-50%);
    display: flex;
    flex-direction: column;
    align-items: center;
    line-height: 1.1;
    z-index: 5;
    pointer-events: none;
}
.speedo-counter-num {
    font-size: 1.8rem;
    font-weight: 800;
    font-family: var(--font-heading);
    color: var(--heading-color);
    letter-spacing: -0.5px;
}
.speedo-unit-label {
    font-size: 0.78rem;
    color: var(--text-secondary);
    font-weight: 600;
    margin-top: 2px;
}
.speedo-student-info {
    border-top: 1px solid var(--border-color);
    padding-top: 16px;
    width: 100%;
}
.speedo-s-name {
    margin: 0 0 5px;
    font-size: 1.1rem;
    color: var(--heading-color);
    font-weight: 600;
}
.speedo-s-detail {
    margin: 0;
    font-size: 0.88rem;
    color: var(--aqua-teal);
    font-weight: 500;
}
</style>

<script>
// Switch between 4 category cards
function switchSpeedoTab(index, tabEl) {
    document.querySelectorAll('.speedo-tab-card').forEach(c => c.classList.remove('active'));
    tabEl.classList.add('active');

    document.querySelectorAll('.speedo-panel').forEach(p => p.classList.remove('active'));
    const targetPanel = document.getElementById('speedo-panel-' + index);
    if(targetPanel) {
        targetPanel.classList.add('active');
        animateSpeedometerPanel(targetPanel);
    }
}

// Animate Speedometer Arcs, Needles, and Counters with Smooth Slowdown Deceleration
function animateSpeedometerPanel(panelEl) {
    if(!panelEl) return;

    // Reset initial states
    panelEl.querySelectorAll('.speedo-arc').forEach(arc => {
        arc.style.strokeDashoffset = '251.2';
    });
    panelEl.querySelectorAll('.speedo-needle').forEach(needle => {
        needle.style.transform = 'rotate(-90deg)';
    });
    panelEl.querySelectorAll('.speedo-counter-num').forEach(counter => {
        counter.textContent = '0';
    });

    // Start animated rise with progressive deceleration curve
    setTimeout(() => {
        // 1. Animate SVG Arcs
        panelEl.querySelectorAll('.speedo-arc').forEach(arc => {
            const targetOffset = arc.getAttribute('data-target-offset');
            arc.style.strokeDashoffset = targetOffset;
        });

        // 2. Animate SVG Needles
        panelEl.querySelectorAll('.speedo-needle').forEach(needle => {
            const targetAngle = needle.getAttribute('data-target-angle');
            needle.style.transform = 'rotate(' + targetAngle + 'deg)';
        });

        // 3. Animate Counter Numbers with Deceleration Slowdown (Ease-out Quart)
        panelEl.querySelectorAll('.speedo-counter-num').forEach(counter => {
            const targetVal = parseFloat(counter.getAttribute('data-val')) || 0;
            const isDecimal = targetVal % 1 !== 0;
            let startTime = null;
            const duration = 2400; // 2.4s smooth gradual slowdown

            function step(timestamp) {
                if(!startTime) startTime = timestamp;
                const progress = Math.min((timestamp - startTime) / duration, 1);
                // Quartic ease-out deceleration formula: 1 - (1 - t)^4
                const ease = 1 - Math.pow(1 - progress, 4);
                const currentVal = targetVal * ease;
                counter.textContent = isDecimal ? currentVal.toFixed(1) : Math.round(currentVal);
                if(progress < 1) {
                    requestAnimationFrame(step);
                } else {
                    counter.textContent = isDecimal ? targetVal.toFixed(1) : targetVal;
                }
            }
            requestAnimationFrame(step);
        });
    }, 60);
}

// Trigger initial animation on page load
document.addEventListener('DOMContentLoaded', () => {
    const firstPanel = document.getElementById('speedo-panel-0');
    if(firstPanel) {
        animateSpeedometerPanel(firstPanel);
    }
});
</script>
