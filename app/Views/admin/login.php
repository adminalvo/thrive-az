<!DOCTYPE html>
<html lang="az">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Team Login | Thrive</title>
    <link rel="stylesheet" href="<?= APP_URL ?>/assets/css/style.css">
    <style>
        body {
            margin: 0;
            font-family: 'Inter', sans-serif;
            display: flex;
            height: 100vh;
            background: #0f172a;
            color: #fff;
            overflow: hidden;
        }

        /* Left Side: Welcome Graphic */
        .welcome-side {
            flex: 1;
            background: linear-gradient(135deg, rgba(0, 11, 33, 0.9) 0%, rgba(76, 162, 181, 0.8) 100%), url('<?= APP_URL ?>/assets/images/hero-bg.jpg') center/cover;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 60px;
            position: relative;
        }
        .welcome-side::after {
            content: '';
            position: absolute;
            top: 0; left: 0; width: 100%; height: 100%;
            background: radial-gradient(circle at center, transparent 0%, #0f172a 120%);
        }
        .welcome-content {
            position: relative;
            z-index: 2;
            max-width: 600px;
        }
        .welcome-content h1 {
            font-family: var(--font-heading);
            font-size: 4.5rem;
            line-height: 1.1;
            margin: 0 0 20px;
            text-transform: uppercase;
            letter-spacing: 2px;
            background: linear-gradient(90deg, #fff, #a5f3fc);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .welcome-content p {
            font-size: 1.2rem;
            color: #cbd5e1;
            line-height: 1.6;
            margin-bottom: 40px;
        }
        .features {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
        }
        .feature-item {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            padding: 15px 25px;
            border-radius: 50px;
            border: 1px solid rgba(255,255,255,0.2);
            font-size: 0.95rem;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        /* Right Side: Login Form */
        .login-side {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #0f172a;
            position: relative;
        }
        .login-box {
            width: 100%;
            max-width: 420px;
            padding: 40px;
        }
        .login-header {
            text-align: center;
            margin-bottom: 40px;
        }
        .login-header img {
            width: 150px;
            margin-bottom: 20px;
            filter: brightness(0) invert(1);
        }
        .login-header h2 {
            margin: 0;
            font-size: 1.8rem;
            font-weight: 600;
            color: #fff;
        }
        .login-header p {
            color: #94a3b8;
            margin: 10px 0 0;
            font-size: 0.95rem;
        }
        .form-group {
            margin-bottom: 25px;
        }
        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: #cbd5e1;
            font-size: 0.9rem;
            font-weight: 500;
        }
        .form-group input {
            width: 100%;
            padding: 14px 16px;
            background: #1e293b;
            border: 1px solid #334155;
            border-radius: 12px;
            color: #fff;
            font-size: 1rem;
            transition: all 0.3s ease;
        }
        .form-group input:focus {
            outline: none;
            border-color: var(--aqua-teal);
            box-shadow: 0 0 0 3px rgba(76, 162, 181, 0.2);
            background: #0f172a;
        }
        .btn-glow {
            width: 100%;
            background: var(--aqua-teal);
            color: #fff;
            border: none;
            padding: 16px;
            border-radius: 12px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 10px 25px rgba(76,162,181,0.3);
            margin-top: 10px;
        }
        .btn-glow:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 35px rgba(76,162,181,0.5);
        }

        /* Responsive */
        @media (max-width: 992px) {
            body {
                flex-direction: column;
            }
            .welcome-side {
                padding: 40px 20px;
                text-align: center;
                align-items: center;
                flex: 0.8;
            }
            .welcome-content h1 {
                font-size: 3rem;
            }
            .features {
                justify-content: center;
            }
            .login-side {
                padding: 40px 20px;
            }
        }
    </style>
</head>
<body>
    
    <!-- Left: Welcome Graphic -->
    <div class="welcome-side">
        <div class="welcome-content">
            <h1>Thrive<br><?= \Core\Language::get('admin_team_login') ?? 'Team Login' ?></h1>
            <p><?= \Core\Language::get('admin_welcome_text') ?? 'Xoş gəldiniz. Mərkəzi idarəetmə panelinə daxil olaraq saytın bütün məzmununu, tələbə müraciətlərini və təhlükəsizlik tənzimləmələrini idarə edə bilərsiniz.' ?></p>
            
            <div class="features">
                <div class="feature-item">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg>
                    <?= \Core\Language::get('admin_content_management') ?? 'Məzmun İdarəetməsi' ?>
                </div>
                <div class="feature-item">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                    <?= \Core\Language::get('admin_user_panel') ?? 'İstifadəçi Paneli' ?>
                </div>
                <div class="feature-item">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>
                    <?= \Core\Language::get('admin_security_panel') ?? 'Təhlükəsizlik' ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Right: Login Form -->
    <div class="login-side">
        <div class="login-box">
            <div class="login-header">
                <img src="<?= APP_URL ?>/assets/images/logo.png" alt="Thrive Logo">
                <h2><?= \Core\Language::get('admin_login_btn') ?></h2>
                <p><?= \Core\Language::get('admin_login_subtitle') ?></p>
            </div>

            <?php if(isset($error)): ?>
                <div style="background: rgba(239, 68, 68, 0.1); color: #fca5a5; padding: 15px; border-radius: 12px; margin-bottom: 25px; border: 1px solid rgba(239, 68, 68, 0.2); font-size: 0.95rem; text-align: center;">
                    <?= htmlspecialchars($error) ?>
                </div>
            <?php endif; ?>

            <form action="<?= APP_URL ?>/admin/login" method="POST">
                <div class="form-group">
                    <label><?= \Core\Language::get('admin_email_label') ?></label>
                    <input type="email" name="email" placeholder="<?= \Core\Language::get('admin_email') ?? 'admin@thrive.az' ?>" required>
                </div>
                <div class="form-group">
                    <label><?= \Core\Language::get('admin_password') ?? 'Şifrə' ?></label>
                    <input type="password" name="password" placeholder="••••••••" required>
                </div>
                <button type="submit" class="btn-glow"><?= \Core\Language::get('admin_login_submit') ?></button>
            </form>
        </div>
    </div>

</body>
</html>
