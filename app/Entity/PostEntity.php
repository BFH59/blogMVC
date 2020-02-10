<?php

namespace App\Entity;

use Core\Entity\Entity;

class PostEntity extends Entity
{
    private $id;
    private $author;
    private $title;
    private $chapo;
    private $content;
    private $post_date;
    private $post_update_date;
    private $categoryid;

    public function getUrl()
    {
        return 'index.php?p=posts.single&id=' . $this->getId();
    }

    public function getExcerpt()
    {

        $html = '<p>' . htmlspecialchars_decode($this->getChapo(),ENT_QUOTES) . '</p>';
        $html .= '<p><a href="' . htmlspecialchars($this->getUrl()) . '">Lire la suite</a></p>';

        return $html;
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
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param mixed $author
     */
    public function setAuthor($author)
    {
        $this->author = $author;
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

    /**
     * @return mixed
     */
    public function getChapo()
    {
        return $this->chapo;
    }

    /**
     * @param mixed $chapo
     */
    public function setChapo($chapo)
    {
        $this->chapo = $chapo;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param mixed $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * @return mixed
     */
    public function getPostDate()
    {
        return $this->post_date;
    }

    /**
     * @param mixed $post_date
     */
    public function setPostDate($post_date)
    {
        $this->post_date = $post_date;
    }

    /**
     * @return mixed
     */
    public function getPostUpdateDate()
    {
        return $this->post_update_date;
    }

    /**
     * @param mixed $post_update_date
     */
    public function setPostUpdateDate($post_update_date)
    {
        $this->post_update_date = $post_update_date;
    }

    /**
     * @return mixed
     */
    public function getCategoryid()
    {
        return $this->categoryid;
    }

    /**
     * @param mixed $categoryid
     */
    public function setCategoryid($categoryid)
    {
        $this->categoryid = $categoryid;
    }
}