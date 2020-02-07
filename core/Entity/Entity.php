<?php

namespace Core\Entity;

abstract class Entity
{
    /**
     * public function __get($key)
     * {
     * $method = 'get' . ucfirst($key);
     * $this->$key = $this->$method();
     * return $this->$key;
     * }*/

    //constructeur avec fonction hydrate si jamais un tableau est passé en parametre, sinon c'est PDO fetch_class (MySQLDatabase) qui gère l'hydratation
    public function __construct(array $data)
    {
        if (!empty($data)) {
            $this->hydrate($data);
        }
    }

    public function hydrate(array $data)
    {
        // Hydratation dynamique (Appel d'une méthode dont le nom n'est pas connu à l'avance).
        foreach ($data as $key => $value) {
            // Transformation de underscore_case vers camelCase
            $key = lcfirst(str_replace('_', '', ucwords($key, '_')));
            // On récupère le nom du setter correspondant à l'attribut.
            $method = 'set' . ucfirst($key);
            // Si le setter correspondant existe.
            if (method_exists($this, $method)) {
                // On appelle le setter.
                $this->$method($value);
            }
        }
    }

}