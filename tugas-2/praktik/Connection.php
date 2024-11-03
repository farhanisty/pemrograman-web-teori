<?php

class Connection
{
    private static ?PDO $instance = null;

    public static function getInstance(): PDO
    {
        if (!self::$instance) {
            try {
                $pdo = new PDO(dsn: 'mysql:host=localhost;dbname=nwind', username: 'root', password: '');
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                self::$instance = $pdo;
            } catch (\Exception $e) {
                die($e->getMessage());
            }
        }

        return self::$instance;
    }
}
