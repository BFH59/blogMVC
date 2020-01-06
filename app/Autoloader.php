<?php

namespace App;

/**
 * Class Autoloader
 * Permet de charger dynamiquement une class
 */
class Autoloader
{
    /**
     * Enregistre notre autoloader
     */
    public static function register()
    {
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }
    /**
     * Inclue le fichier correspondant à notre classe
     * @param string $class Nom de la class à charger
     */
    public static function autoload($class)
    {
        // Uniquement si présent dans notre namespace
        if (strpos($class, __NAMESPACE__ .  '\\') === 0) {
            $class = str_replace(__NAMESPACE__ . '\\','', $class);
            $class = str_replace('\\','/', $class);
            require __DIR__ . '/' . $class .'.php';
        }
    }
}