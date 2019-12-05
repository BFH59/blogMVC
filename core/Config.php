<?php


namespace Core;


class Config
{
    private $settings = [];
    private static $_instance;

    //singleton pour limiter à une seule instanciation de la classe
    //recupére l instance dans $_instance si elle existe
    public static function getInstance($file){
        if(is_null(self::$_instance)){
            self::$_instance = new Config($file);
        }
        return self::$_instance;
    }

    //le constructeur stock dans l array $settings le fichier config.php
    public function __construct($file)
    {

        $this->settings = require($file);

    }

    //verifie si la clé existe dans $setting ou renvoi null
    public function get($key){
        if (!isset($this->settings[$key])){
            return null;
        }
        return $this->settings[$key];
    }
}