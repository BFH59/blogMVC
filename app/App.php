<?php

use Core\Config;
use Core\Database\MysqlDatabase;

class App
{

    public $title = "Mon blog MVC/OOP";
    private static $_instance;
    private $db_instance;

//singleton pour limiter la class App à une seule instance
    public static function getInstance(){
        if(is_null(self::$_instance)){
            self::$_instance = new App();
        }
        return self::$_instance;
    }

    public static function load(){
        session_start();
        require ROOT . '/app/Autoloader.php';
        App\Autoloader::register();
        require ROOT . '/core/Autoloader.php';
        Core\Autoloader::register();
    }
//factory Table
    public function getTable($name){
        $class_name = '\\App\\Table\\' . ucfirst($name) . 'Table';
        return new $class_name($this->getDb());
        }

//factory db et check pour initier une seule instance
    public function getDb(){
        $config = Config::getInstance(ROOT . '/app/config/config.php');
        if(is_null($this->db_instance)){
            $this->db_instance =  new MysqlDatabase($config->get('db_name'), $config->get('db_user'), $config->get('db_pass'), $config->get('db_host'));
        }
        return $this->db_instance;
    }

}