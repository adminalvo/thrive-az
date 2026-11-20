<?php
namespace Core;

class Auth {
    public static function login($user) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_role'] = $user['role'];
        $_SESSION['user_name'] = $user['name'];
        $_SESSION['user_permissions'] = $user['permissions'] ?? '[]';
    }

    public static function logout() {
        unset($_SESSION['user_id']);
        unset($_SESSION['user_role']);
        unset($_SESSION['user_name']);
        unset($_SESSION['user_permissions']);
        session_destroy();
    }

    public static function check() {
        return isset($_SESSION['user_id']);
    }

    public static function requireLogin() {
        if (!self::check()) {
            header("Location: " . APP_URL . "/admin/login");
            exit();
        }
    }

    public static function requireAdmin() {
        self::requireLogin();
        if (($_SESSION['user_role'] ?? '') !== 'admin' && ($_SESSION['user_role'] ?? '') !== 'owner') {
            header("Location: " . APP_URL . "/admin/login");
            exit();
        }
    }

    public static function requirePanelAccess() {
        self::requireLogin();
        $allowedRoles = ['admin', 'owner', 'blog_writer', 'content_creator'];
        if (!in_array($_SESSION['user_role'] ?? '', $allowedRoles)) {
            header("Location: " . APP_URL . "/admin/login");
            exit();
        }
    }

    public static function checkRole($role) {
        if (is_array($role)) {
            return in_array($_SESSION['user_role'] ?? '', $role);
        }
        return ($_SESSION['user_role'] ?? '') === $role;
    }

    public static function hasPermission($permissionKey) {
        // Owner and Admin usually have full access, but we can also just rely on the permissions JSON
        // If we want owner to ALWAYS have access regardless of JSON:
        if (($_SESSION['user_role'] ?? '') === 'owner') return true;
        if (($_SESSION['user_role'] ?? '') === 'admin') return true;

        $perms = $_SESSION['user_permissions'] ?? '[]';
        $permsArray = json_decode($perms, true) ?: [];
        return in_array($permissionKey, $permsArray);
    }

    public static function requirePermission($permissionKey) {
        self::requireLogin();
        if (!self::hasPermission($permissionKey)) {
            $_SESSION['error'] = 'Kifayət qədər hüququnuz yoxdur.';
            header("Location: " . APP_URL . "/admin/dashboard");
            exit;
        }
    }
}
