<?php

declare(strict_types=1);
class TrabajadorModel
{

    private PDO $pdo;

    public function __construct()
    {
        //se conecta y le da el valor
        $this->pdo = $this->conectar();
    }
    private function conectar(): PDO
    {
        //        $manager = new DBManager(); tiene prevenida la creacion de objeto usando new
        // (hay dos casos: si usa metodo estatico o si usa metodo de creacion/singleton)
        // $db = DBManager::getInstance();
        // $db->getConnection();
        $host = "mysql";
        $bdname = "ud5";
        $charset = "utf8mb4"; //utf por defecto es mb3
        $username = 'admin';
        $password = 'daw2pass';
        $emulated = false;

        $dsn = "mysql:host=$host;bdname=$bdname;charset=$charset";
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => $emulated
        ];
        try {
            $pdo = new PDO($dsn, $username, $password, $options);
            return $pdo;
        } catch (PDOException $e) {
            throw $e;
        };
    }
}
