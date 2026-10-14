<?php
declare(strict_types=1);
class TrabajadorModel {

    public function conectar(): string {
//        $manager = new DBManager(); tiene prevenida la creacion de objeto usando new
// (hay dos casos: si usa metodo estatico o si usa metodo de creacion/singleton)
$db = DBManager::getInstance();
$db-> getConnection();

        return "Hola, soy " . $this->nombre;
    }
}