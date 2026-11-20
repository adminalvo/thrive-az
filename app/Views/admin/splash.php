<!DOCTYPE html>
<html lang="az">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dil Seçimi | Thrive Admin</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #000B21;
            --accent: #4CA2B5;
            --bg: #f8fafc;
        }
        body {
            margin: 0;
            padding: 0;
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, var(--primary) 0%, #001a4d 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .splash-card {
            background: var(--card-bg);
            padding: 50px 40px;
            border-radius: 20px;
            box-shadow: 0 15px 40px var(--shadow-heavy);
            text-align: center;
            max-width: 450px;
            width: 90%;
            animation: slideUp 0.5s ease;
        }
        @keyframes slideUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .logo {
            width: 80px;
            height: 80px;
            background: rgba(76, 162, 181, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            color: var(--accent);
        }
        h1 {
            margin: 0 0 10px;
            color: var(--primary);
            font-size: 1.8rem;
        }
        p {
            color: var(--text-secondary);
            margin: 0 0 30px;
            line-height: 1.6;
        }
        .lang-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 15px;
        }
        .lang-btn {
            display: block;
            padding: 16px;
            background: var(--bg);
            border: 2px solid var(--border-color);
            border-radius: 12px;
            text-decoration: none;
            color: var(--primary);
            font-weight: 600;
            font-size: 1.1rem;
            transition: all 0.2s;
            position: relative;
            overflow: hidden;
        }
        .lang-btn:hover {
            border-color: var(--accent);
            background: rgba(76, 162, 181, 0.05);
            transform: translateY(-2px);
        }
    </style>
</head>
<body>
    <div class="splash-card">
        <div class="logo">
            <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2L2 7l10 5 10-5-10-5z"/><path d="M2 17l10 5 10-5"/><path d="M2 12l10 5 10-5"/></svg>
        </div>
        <h1>Thrive Education</h1>
        <p>Admin panelə daxil olmazdan əvvəl idarəetmə dilini seçin:<br><span style="font-size:0.85rem; color: var(--text-secondary);">(Bunu seçməyiniz sistemin düzgün işləməsi üçün vacibdir)</span></p>
        
        <div class="lang-grid">
            <a href="<?= APP_URL ?>/admin/login?lang=az" class="lang-btn">🇦🇿 Azərbaycan (AZ)</a>
            <a href="<?= APP_URL ?>/admin/login?lang=ru" class="lang-btn">🇷🇺 Русский (RU)</a>
        </div>
    </div>
</body>
</html>
