<?php
// Check if the function has already been defined before creating it
if (!function_exists('db_conn')) {

    function db_conn(){    
        $host = "localhost";
        $db = 'myradio';
        $user = 'root';
        $pass = '';
        $charset = "utf8mb4";

        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        try {
            $pdo = new PDO($dsn, $user, $pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
             // log für debug
            return $pdo;
        } catch (PDOException $e) {
            die('Verbindung fehlgeschlagen! ' . $e->getMessage());
        }
    }

}
