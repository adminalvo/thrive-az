<!DOCTYPE html>
<html lang="az">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Təhlükəsizliyi | Thrive Admin</title>
    <link rel="stylesheet" href="<?= APP_URL ?>/assets/css/style.css">
    <style>
        body {
            margin: 0;
            background: #000b21;
            color: #fff;
            font-family: Arial, sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            overflow: hidden;
            position: relative;
        }

        /* Cyber grid background */
        body::before {
            content: '';
            position: absolute;
            top: -50%; left: -50%; width: 200%; height: 200%;
            background: 
                linear-gradient(rgba(76, 162, 181, 0.05) 1px, transparent 1px),
                linear-gradient(90deg, rgba(76, 162, 181, 0.05) 1px, transparent 1px);
            background-size: 40px 40px;
            transform: perspective(500px) rotateX(60deg) translateY(-100px) translateZ(-200px);
            animation: gridMove 20s linear infinite;
            z-index: 0;
        }
        @keyframes gridMove {
            0% { transform: perspective(500px) rotateX(60deg) translateY(0) translateZ(-200px); }
            100% { transform: perspective(500px) rotateX(60deg) translateY(40px) translateZ(-200px); }
        }

        .verify-container {
            position: relative;
            z-index: 10;
            background: rgba(0, 11, 33, 0.8);
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            border: 1px solid rgba(76, 162, 181, 0.3);
            padding: 50px;
            border-radius: 20px;
            text-align: center;
            box-shadow: 0 20px 50px rgba(0,0,0,0.5), inset 0 0 20px rgba(76, 162, 181, 0.1);
            max-width: 400px;
            width: 90%;
            animation: popIn 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        @keyframes popIn {
            0% { transform: scale(0.8); opacity: 0; }
            100% { transform: scale(1); opacity: 1; }
        }

        .verify-container svg {
            margin-bottom: 20px;
            filter: drop-shadow(0 0 10px rgba(76, 162, 181, 0.5));
            animation: pulse 2s infinite;
        }
        @keyframes pulse {
            0%, 100% { transform: scale(1); opacity: 1; }
            50% { transform: scale(1.05); opacity: 0.8; }
        }

        .verify-container h2 {
            margin: 0 0 10px;
            font-size: 1.8rem;
            color: var(--aqua-teal, #4ca2b5);
            letter-spacing: 1px;
            text-transform: uppercase;
            font-family: var(--font-heading, Arial, sans-serif);
        }

        .verify-container p {
            color: #94a3b8;
            font-size: 0.95rem;
            margin-bottom: 30px;
            line-height: 1.5;
        }

        .pin-input {
            width: 100%;
            padding: 15px;
            background: rgba(0,0,0,0.5);
            border: 2px solid #1e293b;
            border-radius: 12px;
            color: var(--aqua-teal, #4ca2b5);
            font-size: 1.5rem;
            font-family: monospace;
            text-align: center;
            letter-spacing: 5px;
            transition: all 0.3s ease;
            text-transform: uppercase;
            outline: none;
        }
        .pin-input:focus {
            border-color: var(--aqua-teal, #4ca2b5);
            box-shadow: 0 0 15px rgba(76, 162, 181, 0.3);
        }
        .pin-input::placeholder {
            color: rgba(76, 162, 181, 0.2);
        }

        .btn-verify {
            width: 100%;
            margin-top: 20px;
            padding: 15px;
            background: linear-gradient(90deg, #003f82, var(--aqua-teal, #4ca2b5));
            color: #fff;
            border: none;
            border-radius: 12px;
            font-size: 1.1rem;
            font-weight: 800;
            cursor: pointer;
            text-transform: uppercase;
            letter-spacing: 2px;
            transition: all 0.3s ease;
        }
        .btn-verify:hover {
            box-shadow: 0 0 20px rgba(76, 162, 181, 0.5);
            transform: translateY(-2px);
        }

        .error-msg {
            background: rgba(239, 68, 68, 0.1);
            color: #ef4444;
            border: 1px solid rgba(239, 68, 68, 0.3);
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 0.9rem;
            animation: shake 0.4s ease;
        }
        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-5px); }
            75% { transform: translateX(5px); }
        }
    </style>
</head>
<body>

    <div class="verify-container">
        <svg width="60" height="60" viewBox="0 0 24 24" fill="none" stroke="var(--aqua-teal, #4ca2b5)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
            <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
        </svg>

        <h2><?= \Core\Language::get('admin_verify_title') ?></h2>
        <p><?= \Core\Language::get('admin_pin_desc') ?? 'Sistem idarəetmə panelinə daxil olmaq və əməliyyatlar aparmaq üçün təhlükəsizlik kodunu daxil edin.' ?></p>

        <?php if(isset($error)): ?>
            <div class="error-msg"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

        <form action="<?= APP_URL ?>/admin/verify" method="POST">
            <input type="text" name="pin" class="pin-input" placeholder="XXXXXX" maxlength="6" autocomplete="off" autofocus required>
            <button type="submit" class="btn-verify"><?= \Core\Language::get('admin_verify_btn') ?? 'Təsdiqlə' ?></button>
        </form>
    </div>

</body>
</html>
