<?php

class Database {
    private static $host = "172.28.240.1"; 
    private static $dbname = "filmes_db";
    private static $user = "user";
    private static $pass = "password";
    private static $conn;

    public static function connect() {
        if (!isset(self::$conn)) {
            try {
                self::$conn = new PDO("mysql:host=" . self::$host . ";dbname=" . self::$dbname, self::$user, self::$pass);
                self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Erro na conexão: " . $e->getMessage());
            }
        }
        return self::$conn;
    }

    public static function disconnect() {
        self::$conn = null;  // PDO se desconecta automaticamente, mas é bom ter esse método
    }
}
