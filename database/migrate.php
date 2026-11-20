<?php
// database/migrate.php

require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../core/Database.php';

use Core\Database;

$db = Database::getInstance();

$tables = [
    "users" => "
        CREATE TABLE IF NOT EXISTS users (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            name TEXT NOT NULL,
            email TEXT NOT NULL UNIQUE,
            password TEXT NOT NULL,
            role TEXT DEFAULT 'admin',
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP
        );
    ",
    "courses" => "
        CREATE TABLE IF NOT EXISTS courses (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            title TEXT NOT NULL,
            slug TEXT NOT NULL UNIQUE,
            short_desc TEXT,
            content TEXT,
            image TEXT,
            teacher TEXT,
            price REAL,
            duration TEXT,
            category_id INTEGER,
            status INTEGER DEFAULT 1,
            meta_title TEXT,
            meta_desc TEXT,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP
        );
    ",
    "study_abroad" => "
        CREATE TABLE IF NOT EXISTS study_abroad (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            country TEXT NOT NULL,
            slug TEXT NOT NULL UNIQUE,
            universities TEXT,
            admission_process TEXT,
            required_docs TEXT,
            visa_process TEXT,
            faq TEXT,
            meta_title TEXT,
            meta_desc TEXT
        );
    ",
    "creation_lab" => "
        CREATE TABLE IF NOT EXISTS creation_lab (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            title TEXT NOT NULL,
            slug TEXT NOT NULL UNIQUE,
            description TEXT,
            image TEXT,
            status INTEGER DEFAULT 1
        );
    ",
    "self_study_materials" => "
        CREATE TABLE IF NOT EXISTS self_study_materials (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            title TEXT NOT NULL,
            category TEXT,
            type TEXT, -- pdf, video
            file_path TEXT,
            cover_image TEXT,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP
        );
    ",
    "blog_categories" => "
        CREATE TABLE IF NOT EXISTS blog_categories (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            name TEXT NOT NULL,
            slug TEXT NOT NULL UNIQUE
        );
    ",
    "blog_posts" => "
        CREATE TABLE IF NOT EXISTS blog_posts (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            title TEXT NOT NULL,
            slug TEXT NOT NULL UNIQUE,
            content TEXT,
            author_id INTEGER,
            category_id INTEGER,
            cover_image TEXT,
            read_time INTEGER,
            views INTEGER DEFAULT 0,
            status INTEGER DEFAULT 1,
            meta_title TEXT,
            meta_desc TEXT,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY (author_id) REFERENCES users(id),
            FOREIGN KEY (category_id) REFERENCES blog_categories(id)
        );
    ",
    "graduates" => "
        CREATE TABLE IF NOT EXISTS graduates (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            name TEXT NOT NULL,
            university TEXT,
            country TEXT,
            scholarship TEXT,
            story TEXT,
            image TEXT,
            video_url TEXT,
            social_links TEXT,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP
        );
    ",
    "contacts" => "
        CREATE TABLE IF NOT EXISTS contacts (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            name TEXT NOT NULL,
            surname TEXT NOT NULL,
            email TEXT NOT NULL,
            phone TEXT,
            subject TEXT,
            message TEXT NOT NULL,
            status INTEGER DEFAULT 0, -- 0: oxunmamış, 1: oxunmuş
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP
        );
    ",
    "user_applications" => "
        CREATE TABLE IF NOT EXISTS user_applications (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            user_id INTEGER NOT NULL,
            program_type TEXT NOT NULL, -- e.g., 'SAT', 'IELTS', 'USA'
            status TEXT DEFAULT 'Gözləmədə', -- 'Gözləmədə', 'Qəbul edildi', 'İmtina'
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY (user_id) REFERENCES users(id)
        );
    ",
    "user_favorites" => "
        CREATE TABLE IF NOT EXISTS user_favorites (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            user_id INTEGER NOT NULL,
            blog_id INTEGER NOT NULL,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY (user_id) REFERENCES users(id),
            FOREIGN KEY (blog_id) REFERENCES blog_posts(id)
        );
    ",
    "translations" => "
        CREATE TABLE IF NOT EXISTS translations (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            lang_key TEXT NOT NULL UNIQUE,
            az_text TEXT,
            en_text TEXT,
            ru_text TEXT
        );
    ",
    "settings" => "
        CREATE TABLE IF NOT EXISTS settings (
            setting_key TEXT PRIMARY KEY,
            setting_value TEXT
        );
    "
];

echo "Miqrasiyalar başladılır...\n";

foreach ($tables as $name => $sql) {
    try {
        $db->exec($sql);
        echo "Cədvəl '$name' yaradıldı (və ya artıq mövcuddur).\n";
    } catch (Exception $e) {
        echo "Cədvəl '$name' yaradılarkən xəta: " . $e->getMessage() . "\n";
    }
}

// Defolt admin istifadəçisini əlavə edək (əgər yoxdursa)
$stmt = $db->query("SELECT COUNT(*) FROM users");
if ($stmt->fetchColumn() == 0) {
    $password = password_hash('Thrive2026@', PASSWORD_BCRYPT);
    $stmt = $db->prepare("INSERT INTO users (name, email, password, role) VALUES (?, ?, ?, ?)");
    $stmt->execute(['Admin', 'admin@thrive.az', $password, 'admin']);
    echo "Defolt admin istifadəçisi yaradıldı (admin@thrive.az / Thrive2026@).\n";
}

// Defolt tənzimləmələr
$db->exec("INSERT OR IGNORE INTO settings (setting_key, setting_value) VALUES ('site_name', 'Thrive Education Center')");
$db->exec("INSERT OR IGNORE INTO settings (setting_key, setting_value) VALUES ('site_description', 'Premium Education & Study Abroad Services')");

echo "Miqrasiyalar uğurla tamamlandı.\n";
