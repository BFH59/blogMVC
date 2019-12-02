<?php


namespace App;


class App
{

    const DB_NAME = 'blogP5';
    const DB_USER = 'root';
    const DB_PASS = 'root';
    const DB_HOST = '127.0.0.1:8889';

    private static $title = 'Mon blog MVC/OOP';
    private static $database;


    public static function getDB(){
        // verifie si la connexion BDD n existe pas et la créé
        if(self::$database === null)
        {
            self::$database = new Database(self::DB_NAME, self::DB_USER, self::DB_PASS, self::DB_HOST);
        }
        //sinon on retourne connexion existante
        return self::$database;

    }

    public static function notFound()
    {
        header("HTTP/1.0 404 Not Found");
        header('location:index.php?p=404');
    }

    public static function getTitle()
    {
        return self::$title;
    }

    public static function setTitle($title)
    {
        self::$title = $title;

    }
}