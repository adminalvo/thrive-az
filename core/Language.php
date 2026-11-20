<?php
namespace Core;

class Language {
    private static $langs = [];

    public static function load() {
        if (!isset($_SESSION['lang']) && isset($_COOKIE['thrive_lang'])) {
            $_SESSION['lang'] = $_COOKIE['thrive_lang'];
        }
        $lang = $_SESSION['lang'] ?? 'az';
        if (!in_array($lang, ['az', 'ru', 'en'])) {
            $lang = 'az';
            $_SESSION['lang'] = 'az';
        }
        if (!isset($_COOKIE['thrive_lang']) || $_COOKIE['thrive_lang'] !== $lang) {
            @setcookie('thrive_lang', $lang, time() + (86400 * 30), '/');
        }
        $file = __DIR__ . "/../lang/{$lang}.php";
        if (file_exists($file)) {
            self::$langs = require $file;
        }
    }

    public static function get($key) {
        return self::$langs[$key] ?? $key;
    }

    public static function setLang($lang) {
        if (in_array($lang, ['az', 'ru', 'en'])) {
            $_SESSION['lang'] = $lang;
            @setcookie('thrive_lang', $lang, time() + (86400 * 30), '/');
        }
    }

    public static function current() {
        $lang = $_SESSION['lang'] ?? 'az';
        return in_array($lang, ['az', 'ru', 'en']) ? $lang : 'az';
    }

    public static function getAll() {
        return self::$langs;
    }
}
