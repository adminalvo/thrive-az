<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thrive Admin | Select Language</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --deep-navy: #000b21;
            --ocean-blue: #003f82;
            --aqua-teal: #4ca2b5;
        }
        body {
            margin: 0; padding: 0;
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, var(--deep-navy) 0%, var(--ocean-blue) 100%);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
        }
        .lang-container {
            background: var(--dropdown-hover-bg);
            backdrop-filter: blur(15px);
            padding: 40px 50px;
            border-radius: 20px;
            text-align: center;
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 15px 40px var(--shadow-heavy);
            max-width: 400px;
            width: 90%;
        }
        .lang-container h2 {
            margin-top: 0;
            font-size: 1.8rem;
            margin-bottom: 10px;
        }
        .lang-container p {
            color: #cbd5e1;
            margin-bottom: 30px;
            font-size: 0.95rem;
        }
        .lang-buttons {
            display: flex;
            gap: 20px;
            justify-content: center;
        }
        .lang-btn {
            background: rgba(255, 255, 255, 0.1);
            border: 2px solid rgba(255, 255, 255, 0.2);
            color: #fff;
            padding: 15px 30px;
            border-radius: 10px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 5px;
            min-width: 100px;
        }
        .lang-btn:hover {
            background: var(--aqua-teal);
            border-color: var(--aqua-teal);
            transform: translateY(-5px);
        }
        .lang-btn span {
            font-size: 0.8rem;
            opacity: 0.8;
        }
    </style>
</head>
<body>
    <div class="lang-container">
        <h2>Welcome to Thrive Admin</h2>
        <p>Please select your preferred language before logging in.</p>
        
        <div class="lang-buttons">
            <a href="?lang_select=az" class="lang-btn">
                AZ
                <span>Azərbaycan dili</span>
            </a>
            <a href="?lang_select=ru" class="lang-btn">
                RU
                <span>Русский язык</span>
            </a>
        </div>
    </div>
</body>
</html>
