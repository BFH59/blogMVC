<?php

namespace App\Entity;

use Core\Entity\Entity;

class PostEntity extends Entity
{
    public function getUrl()
    {
        return 'index.php?p=posts.single&id=' . $this->id;
    }

    public function getExcerpt(){

        $html = '<p>' . htmlspecialchars($this->chapo) . '</p>';
        $html .= '<p><a href="' . htmlspecialchars($this->getUrl()) .'">Lire la suite</a></p>';

        return $html;
    }
}