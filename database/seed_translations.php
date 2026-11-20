<?php
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../core/Database.php';

use Core\Database;

$db = Database::getInstance();

$az = require __DIR__ . '/../lang/az.php';
$en = require __DIR__ . '/../lang/en.php';
$ru = require __DIR__ . '/../lang/ru.php';

$stmt = $db->prepare("INSERT OR IGNORE INTO translations (lang_key, az_text, en_text, ru_text) VALUES (?, ?, ?, ?)");
$updateStmt = $db->prepare("UPDATE translations SET az_text = ?, en_text = ?, ru_text = ? WHERE lang_key = ?");

foreach ($az as $key => $az_text) {
    $en_text = $en[$key] ?? $az_text;
    $ru_text = $ru[$key] ?? $az_text;

    // Check if exists
    $check = $db->prepare("SELECT COUNT(*) FROM translations WHERE lang_key = ?");
    $check->execute([$key]);
    if ($check->fetchColumn() > 0) {
        $updateStmt->execute([$az_text, $en_text, $ru_text, $key]);
    } else {
        $stmt->execute([$key, $az_text, $en_text, $ru_text]);
    }
}

echo "Translations seeded successfully!\n";
