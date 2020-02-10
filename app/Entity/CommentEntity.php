<?php

namespace App\Entity;

use Core\Entity\Entity;

class CommentEntity extends Entity
{
    private $id;
    private $post_id;
    private $title;
    private $author;
    private $content;
    private $validated;
    private $commentdate;


    public function getId()
    {
        return $this->id;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function getValidated()
    {
        return $this->validated;
    }

    public function getCommentDate()
    {
        return $this->commentdate;
    }

    /**
     * @param mixed $comment_date
     * @return CommentEntity
     */
    public function setCommentDate($commentdate)
    {
        $this->comment_date = $commentdate;
        return $this;
    }

    /**
     * @param mixed $validated
     * @return CommentEntity
     */
    public function setValidated($validated)
    {
        $this->validated = $validated;
        return $this;
    }

    /**
     * @param mixed $content
     * @return CommentEntity
     */
    public function setContent($content)
    {
        $this->content = $content;
        return $this;
    }

    /**
     * @param mixed $author
     * @return CommentEntity
     */
    public function setAuthor($author)
    {
        $this->author = $author;
        return $this;
    }

    /**
     * @param mixed $id
     * @return CommentEntity
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPostId()
    {
        return $this->post_id;
    }

    /**
     * @param mixed $post_id
     */
    public function setPostId($post_id)
    {
        $this->post_id = $post_id;
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