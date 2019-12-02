<?php

namespace App\Table;

class Post
{

    public function __get($key)
    {
        $method = 'get' . ucfirst($key);
        $this->$key = $this->$method();
        return $this->$key;
    }

    public function getUrl(){
        return 'index.php?p=single&id='.$this->id;
    }

    public function getChapo(){

        $html = '<p>' . $this->chapo . '</p>';
        $html .= '<p><a href="' . $this->getUrl() .'">Lire la suite</a></p>';

        return $html;
    }
}