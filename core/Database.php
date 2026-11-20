<?php
namespace Core;

use PDO;
use PDOException;

class Database {
    private static $instance = null;
    private $pdo;

    private function __construct() {
        $dbPath = defined('DB_PATH') ? DB_PATH : __DIR__ . '/../database/db.sqlite';
        try {
            $this->pdo = new PDO("sqlite:" . $dbPath);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            
            // SQLite üçün xarici açarları (foreign keys) və UTF-8 kodlaşdırmanı aktivləşdirmək
            $this->pdo->exec('PRAGMA foreign_keys = ON;');
            $this->pdo->exec('PRAGMA encoding = "UTF-8";');
        } catch (PDOException $e) {
            die("Verilənlər bazasına qoşulma xətası: " . $e->getMessage());
        }
    }

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance->pdo;
    }

    public static function query($sql, $params = []) {
        $stmt = self::getInstance()->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    }
}
