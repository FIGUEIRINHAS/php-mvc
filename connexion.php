<?php

class Db 
{
    private static $instance = NULL;

    private function __construct() {}

    private function __clone() {}

    public static function getInstance()
    {
        //vérifie si l'instance existe sinon il l'a créee'
        //self fait référence à la classe
        if (!isset(self::$instance))
        {
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            //on créer l'intance
            self::$instance = new PDO('mysql:host=localhost; dbname=miniblog', 'root', 'root');
        }
        return self::$instance;
    }
}

?>