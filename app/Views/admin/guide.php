<?php
$lang = \Core\Language::current();
?>
<div class="admin-header">
    <h2><?= \Core\Language::get('guide_title') ?></h2>
    <p style="color: var(--text-secondary); margin-top: 10px;"><?= \Core\Language::get('guide_desc') ?></p>
</div>

<style>
    .guide-accordion {
        background: var(--card-bg);
        border: 1px solid var(--border-color);
        border-radius: var(--radius-md);
        margin-bottom: 20px;
        overflow: hidden;
        box-shadow: var(--shadow-sm);
    }
    .guide-header {
        padding: 20px;
        cursor: pointer;
        display: flex;
        justify-content: space-between;
        align-items: center;
        background: var(--bg-light);
        transition: background 0.3s;
    }
    .guide-header:hover {
        background: rgba(76, 162, 181, 0.05);
    }
    .guide-header h3 {
        margin: 0;
        font-size: 1.15rem;
        color: var(--heading-color);
        display: flex;
        align-items: center;
        gap: 10px;
    }
    .guide-icon {
        transition: transform 0.3s;
        color: var(--aqua-teal);
    }
    .guide-content {
        padding: 0 20px;
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.4s ease, padding 0.4s ease;
        background: var(--card-bg);
        border-top: 1px solid transparent;
    }
    .guide-accordion.active .guide-content {
        padding: 20px;
        max-height: 2000px;
        border-top: 1px solid var(--border-color);
    }
    .guide-accordion.active .guide-icon {
        transform: rotate(180deg);
    }
    .guide-content h4 {
        color: var(--primary);
        margin-top: 25px;
        margin-bottom: 10px;
        font-size: 1.05rem;
    }
    .guide-content h4:first-child {
        margin-top: 0;
    }
    .guide-content p, .guide-content li {
        color: var(--text-secondary);
        line-height: 1.7;
        margin-bottom: 10px;
    }
    .guide-content ul {
        padding-left: 20px;
        margin-bottom: 20px;
    }
    .guide-note {
        background: rgba(245, 158, 11, 0.1);
        border-left: 4px solid #f59e0b;
        padding: 15px;
        border-radius: 4px;
        margin: 15px 0;
        color: #b45309;
        font-size: 0.9rem;
    }
</style>

<div style="display: flex; flex-direction: column; gap: 5px;">

    <!-- USERS GUIDE -->
    <?php if (\Core\Auth::hasPermission('users')): ?>
    <div class="guide-accordion">
        <div class="guide-header" onclick="toggleGuide(this)">
            <h3>👥 <?= $lang === 'ru' ? 'Управление пользователями' : ($lang === 'en' ? 'User Management' : 'İstifadəçiləri İdarəetmə') ?></h3>
            <svg class="guide-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 9l6 6 6-6"/></svg>
        </div>
        <div class="guide-content">
            <?php if ($lang === 'ru'): ?>
                <h4>Добавление нового пользователя</h4>
                <p>Нажмите кнопку <strong>+ Новый пользователь</strong> в правом верхнем углу списка пользователей. Заполните необходимые поля (Имя, Фамилия, Email, Пароль). Роль определяет базовые права доступа.</p>
                <h4>Что такое динамические права (Permissions)?</h4>
                <p>Даже если пользователь является "Учителем" или "Администратором", вы можете ограничить то, что он видит. В самом низу формы создания пользователя есть секция <strong>"Права доступа"</strong>. Если вы отметите только "Блог" и "Курсы", этот пользователь сможет управлять только блогами и курсами. Остальные меню (SEO, Сообщения, Настройки) будут скрыты.</p>
                <div class="guide-note">Внимание: Пользователи с ролью "Owner" (Владелец) всегда имеют полный доступ ко всей системе, независимо от галочек.</div>
                <h4>Редактирование и удаление</h4>
                <p>Вы можете нажать кнопку <strong>Редактировать</strong>, чтобы изменить пароль пользователя или обновить его права. Удалить свой аккаунт или аккаунт Владельца невозможно.</p>
            <?php elseif ($lang === 'en'): ?>
                <h4>Adding a New User</h4>
                <p>Click the <strong>+ New User</strong> button in the top right corner. Fill in the required fields. The role defines basic access levels.</p>
                <h4>Dynamic Permissions</h4>
                <p>You can restrict what any user sees. At the bottom of the user form, there is an <strong>"Access Permissions"</strong> section. If you only check "Blog" and "Courses", the user will only manage those sections. Everything else will be hidden.</p>
                <div class="guide-note">Note: "Owner" role users always have full access to everything.</div>
            <?php else: ?>
                <h4>Yeni İstifadəçi Əlavə Etmək</h4>
                <p>İstifadəçilər siyahısında sağ yuxarı küncdəki <strong>+ Yeni İstifadəçi</strong> düyməsinə klikləyin. Lazımi məlumatları (Ad, Soyad, Email, Şifrə) doldurun. Rol seçimi istifadəçinin əsas vəzifəsini təyin edir.</p>
                <h4>Dinamik İcazələr (Permissions) Nədir?</h4>
                <p>Bir istifadəçi "Məzmun Yaradıcı" (Content Creator) olsa belə, onun görəcəyi menyuları daha da məhdudlaşdıra bilərsiniz. Yaratma formunun ən aşağısında <strong>"Giriş İcazələri"</strong> adlı xüsusi bölmə var. Əgər siz oradan yalnız "Bloq" və "Kurslar" seçsəniz, həmin adam ancaq o iki menyunu görəcək. SEO, Loqlar və ya Mesajlar ona görünməyəcək.</p>
                <div class="guide-note">Diqqət: "Owner" (Rəhbər) rolunda olan istifadəçilər bu seçimlərdən asılı olmayaraq sistemin hər bir nöqtəsinə tam giriş hüququna sahibdirlər.</div>
                <h4>Redaktə və Silmək</h4>
                <p>İstifadəçinin qarşısındakı <strong>Redaktə</strong> düyməsinə basaraq onun şifrəsini sıfırlaya və ya icazələrini dəyişə bilərsiniz. Öz hesabınızı və ya digər 1 nömrəli Owner hesabını silmək sistem tərəfindən bloklanmışdır.</p>
            <?php endif; ?>
        </div>
    </div>
    <?php endif; ?>

    <!-- CRM GUIDE -->
    <?php if (\Core\Auth::hasPermission('crm') || \Core\Auth::hasPermission('applications')): ?>
    <div class="guide-accordion">
        <div class="guide-header" onclick="toggleGuide(this)">
            <h3>📩 <?= $lang === 'ru' ? 'CRM и Заявки' : ($lang === 'en' ? 'CRM & Applications' : 'CRM və Müraciətlər') ?></h3>
            <svg class="guide-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 9l6 6 6-6"/></svg>
        </div>
        <div class="guide-content">
            <?php if ($lang === 'ru'): ?>
                <h4>Как работает CRM?</h4>
                <p>CRM — это интерактивная Канбан-доска. Заявки, поступающие на сайт (консультации, регистрация на курсы), попадают сюда. Вы также можете вручную добавить карточку, нажав <strong>+ Новая карточка</strong>.</p>
                <ul>
                    <li><strong>Drag & Drop:</strong> Чтобы изменить статус заявки (например, перенести из "Новая" в "В процессе"), просто зажмите карточку мышкой и перетащите в нужную колонку.</li>
                    <li><strong>Удаление:</strong> Наведите мышку на карточку, и появится значок корзины.</li>
                </ul>
                <div class="guide-note">Любые изменения на доске сохраняются моментально, вам не нужно нажимать кнопку "Сохранить".</div>
            <?php elseif ($lang === 'en'): ?>
                <h4>How does the CRM work?</h4>
                <p>CRM is an interactive Kanban board. Use Drag & Drop to move cards between columns.</p>
            <?php else: ?>
                <h4>CRM Sistemi Necə İşləyir?</h4>
                <p>CRM sistemi "Notion" və ya "Trello" məntiqi ilə işləyən interaktiv bir "Kanban" lövhəsidir. Saytdan gələn qeydiyyat və ya konsultasiya müraciətləri buraya düşür. Həmçinin siz özünüz də <strong>+ Yeni Kart</strong> deyərək sistemə potensial müştəri əlavə edə bilərsiniz.</p>
                <ul>
                    <li><strong>Sürüşdürüb-Bıraxmaq (Drag & Drop):</strong> Hər hansı müraciətin statusunu (məsələn: "Yeni"-dən "Prosesdə"yə) keçirmək üçün sadəcə mausun sol düyməsi ilə kartı tutub istədiyiniz sütuna atırsınız.</li>
                    <li><strong>Silmək:</strong> Mausu kartın üzərinə gətirdikdə zibil qutusu ikonu peyda olacaq, ona klikləyərək ləğv edə bilərsiniz.</li>
                </ul>
                <div class="guide-note">Diqqət: Kartı başqa sütuna atdığınız an sistem avtomatik olaraq onu yadda saxlayır, əlavə save düyməsinə basmağa və ya səhifəni yeniləməyə ehtiyac yoxdur.</div>
            <?php endif; ?>
        </div>
    </div>
    <?php endif; ?>

    <!-- COURSES GUIDE -->
    <?php if (\Core\Auth::hasPermission('courses')): ?>
    <div class="guide-accordion">
        <div class="guide-header" onclick="toggleGuide(this)">
            <h3>🎓 <?= $lang === 'ru' ? 'Курсы' : ($lang === 'en' ? 'Courses' : 'Kursların İdarəedilməsi') ?></h3>
            <svg class="guide-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 9l6 6 6-6"/></svg>
        </div>
        <div class="guide-content">
            <?php if ($lang === 'ru'): ?>
                <h4>Создание курса</h4>
                <p>При создании курса обязательно загрузите красивое изображение (разрешение не менее 800x600 px). Укажите цену, описание и категорию (например, Подготовка к университету, Языковые курсы).</p>
                <h4>Отображение на сайте</h4>
                <p>Новые курсы автоматически появляются в разделе "Курсы" на публичном сайте.</p>
            <?php elseif ($lang === 'en'): ?>
                <h4>Managing Courses</h4>
                <p>Add new courses with images and details. They automatically appear on the public site.</p>
            <?php else: ?>
                <h4>Yeni Kurs Yaratmaq</h4>
                <p>Sistemə IELTS, SAT və s. kimi kurslar əlavə edərkən <strong>şəkil, qiymət, və təsvir</strong> qeyd etməlisiniz. Şəkillərin keyfiyyətli (ən az 800x600 px) olmasına diqqət edin ki, saytın ön tərəfində estetik görünsün.</p>
                <h4>Saytda necə görünür?</h4>
                <p>Buradan əlavə etdiyiniz hər bir kurs avtomatik olaraq saytın "Education" (Təhsil/Kurslar) bölməsinə düşür. Tələbələr kursa daxil olaraq detalları oxuyub "Müraciət Et" düyməsindən qeydiyyatdan keçə bilərlər.</p>
            <?php endif; ?>
        </div>
    </div>
    <?php endif; ?>

    <!-- COUNTRIES AND UNIVERSITIES GUIDE -->
    <?php if (\Core\Auth::hasPermission('countries') || \Core\Auth::hasPermission('universities')): ?>
    <div class="guide-accordion">
        <div class="guide-header" onclick="toggleGuide(this)">
            <h3>🌍 <?= $lang === 'ru' ? 'Страны и Университеты' : ($lang === 'en' ? 'Countries & Universities' : 'Ölkələr və Universitetlər') ?></h3>
            <svg class="guide-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 9l6 6 6-6"/></svg>
        </div>
        <div class="guide-content">
            <?php if ($lang === 'ru'): ?>
                <h4>Порядок действий</h4>
                <p><strong>1. Сначала страна:</strong> Вы не можете добавить университет, если его страны еще нет в системе. Сначала зайдите в "Страны", добавьте, например, "Германия".</p>
                <p><strong>2. Затем Университет:</strong> Перейдите в "Университеты", нажмите Создать, выберите "Германия" из выпадающего списка и введите название университета.</p>
            <?php elseif ($lang === 'en'): ?>
                <h4>Order of Operations</h4>
                <p>Always create a Country first. Then you can assign Universities to that Country.</p>
            <?php else: ?>
                <h4>Əlavəetmə Ardıcıllığı (Çox Vacib!)</h4>
                <p><strong>1. Ölkə Yaratmaq:</strong> Sistemə hər hansı bir universiteti əlavə etmədən öncə mütləq onun yerləşdiyi ölkəni yaratmalısınız. Sol menyudan "Ölkələr"ə girin və məsələn, "Almaniya" yaradın.</p>
                <p><strong>2. Universitet Yaratmaq:</strong> Ölkəni yaratdıqdan sonra "Universitetlər" menyusuna keçin, Yeni Universitet düyməsinə basın və siyahıdan Almaniyanı seçib universitetin adını qeyd edin.</p>
                <div class="guide-note">Qeyd: Əgər ölkəni silsəniz, ona bağlı olan bütün universitetlər də sistemdən silinə bilər və ya əlçatmaz olar. Diqqətli olun.</div>
            <?php endif; ?>
        </div>
    </div>
    <?php endif; ?>

    <!-- BLOG GUIDE -->
    <?php if (\Core\Auth::hasPermission('blog')): ?>
    <div class="guide-accordion">
        <div class="guide-header" onclick="toggleGuide(this)">
            <h3>📝 <?= $lang === 'ru' ? 'Блог и Статьи' : ($lang === 'en' ? 'Blog & Articles' : 'Bloq və Məqalələr') ?></h3>
            <svg class="guide-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 9l6 6 6-6"/></svg>
        </div>
        <div class="guide-content">
            <?php if ($lang === 'ru'): ?>
                <h4>Форматирование контента</h4>
                <p>При написании блога вы используете визуальный редактор (Rich Text). Вы можете делать текст жирным, вставлять списки и ссылки.</p>
                <h4>SEO для блога</h4>
                <p>Постарайтесь использовать ключевые слова в заголовке блога, чтобы студенты могли легко находить ваши статьи в Google.</p>
            <?php elseif ($lang === 'en'): ?>
                <h4>Writing Blogs</h4>
                <p>Use the visual editor to write rich content. Make sure to use good titles for SEO.</p>
            <?php else: ?>
                <h4>Məzmunun (Content) Formatlanması</h4>
                <p>Bloq yazarkən sizə "Rich Text Editor" təqdim olunur. Word proqramında olduğu kimi yazıları <strong>qalın (bold)</strong>, <em>italik</em> edə, siyahılar yarada və hiperlinklər yerləşdirə bilərsiniz.</p>
                <h4>Şəkil Qaydaları</h4>
                <p>Bloqun əsas (Cover) şəkli keyfiyyətli olmalıdır və 16:9 formatına yaxın olması tövsiyə edilir ki, saytda mükəmməl görünsün. Şəklin ölçüsü çox böyük (məsələn, 5-10 MB) olmamalıdır, əks halda saytın sürətini zəiflədər.</p>
                <h4>Bloq SEO-su</h4>
                <p>Məqalə adlarını tələbələrin Google-da axtara biləcəyi formalarda (Məs: "İngiltərədə təhsil almaq üçün 5 səbəb") yazmağınız sayta orqanik trafik (ziyarətçi) gətirəcəkdir.</p>
            <?php endif; ?>
        </div>
    </div>
    <?php endif; ?>

    <!-- SEO GUIDE -->
    <?php if (\Core\Auth::hasPermission('seo')): ?>
    <div class="guide-accordion">
        <div class="guide-header" onclick="toggleGuide(this)">
            <h3>🔍 <?= $lang === 'ru' ? 'SEO (Поисковая оптимизация)' : ($lang === 'en' ? 'SEO Management' : 'SEO İdarəetmə') ?></h3>
            <svg class="guide-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 9l6 6 6-6"/></svg>
        </div>
        <div class="guide-content">
            <?php if ($lang === 'ru'): ?>
                <h4>Что такое SEO?</h4>
                <p>SEO определяет, как ваш сайт выглядит в поисковой выдаче Google. Для каждой страницы (Главная, О нас, Контакты) вы можете задать свои мета-данные.</p>
                <ul>
                    <li><strong>Title (Заголовок):</strong> Должен быть коротким (до 60 символов).</li>
                    <li><strong>Description (Описание):</strong> Кратко опишите страницу (до 155 символов). Это текст, который люди видят под ссылкой в Google.</li>
                    <li><strong>Keywords (Ключевые слова):</strong> Слова через запятую (образование, IELTS, Thrive).</li>
                </ul>
            <?php else: ?>
                <h4>SEO Nədir və Niyə Vacibdir?</h4>
                <p>SEO (Search Engine Optimization) sizin saytınızın Google, Yandex kimi axtarış sistemlərində neçənci yerdə çıxacağını və necə görünəcəyini təyin edir.</p>
                <ul>
                    <li><strong>Meta Title (Səhifə Başlığı):</strong> İnsanlar Google-da axtarış edərkən kliklədikləri göy rəngli əsas linkdir. Qısa və cəlbedici olmalıdır (Maksimum 60 hərf).</li>
                    <li><strong>Meta Description (Açıqlama):</strong> Linkin altında görünən kiçik mətndir. Səhifənin məzmununu xülasə etməlidir. İnsanları sayta girməyə həvəsləndirməlidir (Maksimum 150-160 hərf).</li>
                    <li><strong>Keywords (Açar Sözlər):</strong> Virgüllə ayrılmış sözlərdir. Məsələn: <em>xaricdə təhsil, ielts kursu, thrive education, bakıda ingilis dili</em>.</li>
                </ul>
                <div class="guide-note">Məsləhət: Ana səhifə üçün SEO məlumatlarını mütləq diqqətlə, şirkətin bütün xidmətlərini əhatə edəcək şəkildə yazın.</div>
            <?php endif; ?>
        </div>
    </div>
    <?php endif; ?>

</div>

<script>
    function toggleGuide(element) {
        // Toggle the clicked accordion
        const accordion = element.parentElement;
        accordion.classList.toggle('active');
        
        // Optional: Close all other accordions when one is opened
        /*
        const allAccordions = document.querySelectorAll('.guide-accordion');
        allAccordions.forEach(acc => {
            if (acc !== accordion) {
                acc.classList.remove('active');
            }
        });
        */
    }
</script>
