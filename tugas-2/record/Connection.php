<?php

class Connection
{
    private static ?PDO $instance = null;

    public static function getInstance(): PDO
    {
        if (!self::$instance) {
            try {
                $pdo = new PDO('mysql:host=localhost;dbname=nwind', 'root', '');

                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                self::$instance = $pdo;
            } catch (Exception $e) {
                echo $e->getMessage();
                die();
            }
        }

        return self::$instance;
    }
}
