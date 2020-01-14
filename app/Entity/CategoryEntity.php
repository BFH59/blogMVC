<?php


namespace App\Entity;


use Core\Entity\Entity;

class CategoryEntity extends Entity
{
    public $id;
    public $title;

    public function getUrl(){
        return 'index.php?p=posts.category&id=' . $this->getId();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }
}