<?php
namespace Core;

class Settings {
    private static $settings = null;

    public static function load() {
        if (self::$settings === null) {
            $db = Database::getInstance();
            $stmt = $db->query("SELECT setting_key, setting_value FROM settings");
            $rows = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            self::$settings = [];
            foreach ($rows as $row) {
                self::$settings[$row['setting_key']] = $row['setting_value'];
            }
        }
    }

    public static function get($key, $default = '') {
        self::load();
        return isset(self::$settings[$key]) ? self::$settings[$key] : $default;
    }
}
