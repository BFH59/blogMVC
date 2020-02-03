<?php


namespace Core;


class Config
{
    private $settings = [];
    private static $_instance;

    //singleton pour limiter la classe à une seule instanciation
    //recupére l instance dans $_instance si elle existe
    public static function getInstance($file){
        if(self::$_instance === NULL){
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