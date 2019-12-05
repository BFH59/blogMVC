<?php

namespace App\Entity;

use Core\Entity\Entity;

class PostEntity extends Entity
{
    public function getUrl()
    {
        return 'index.php?page=single&id=' . $this->id;
    }

    public function getExcerpt(){

        $html = '<p>' . $this->chapo . '</p>';
        $html .= '<p><a href="' . $this->getUrl() .'">Lire la suite</a></p>';

        return $html;
    }
}