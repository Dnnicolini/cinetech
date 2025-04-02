<?php

namespace app\config;

class Helpers {
    public static function requireAuth() {
        session_start();
        if (!isset($_SESSION['usuario_id'])) {
            header("Location: /auth/login");
            exit;
        }
    }

    public static function dd($var) {
        echo "<pre>";
        var_dump($var);
        echo "</pre>";
        exit;
    }
}
