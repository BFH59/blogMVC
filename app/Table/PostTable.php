<?php

namespace App\Table;

use App\Entity\PostEntity;
use \Core\Table\Table;

class PostTable extends Table
{

    /**
     * Recuperation des derniers articles avec la categorie
     * @return array
     */

    public function last()
    {
        return $this->query("
SELECT posts.id, posts.author, posts.title, posts.chapo, posts.content, DATE_FORMAT(posts.post_update_date, '%d/%m/%Y à %H:%i:%s ') as post_update_date, categories.title as category 
FROM posts 
LEFT JOIN categories on categoryid = categories.id 
ORDER BY posts.post_date DESC");
    }


    /**
     * recupère un post en liant la categorie qui lui est associée
     * @param $id
     * @return \App\Entity\PostEntity
     */
    public function findWithCategory($id)
    {
        return $this->query("
SELECT posts.id, posts.author, posts.title, posts.chapo, posts.content, DATE_FORMAT(posts.post_update_date, '%d/%m/%Y à %H:%i:%s ') as post_update_date, categories.title as category 
FROM posts 
LEFT JOIN categories on categoryid = categories.id 
WHERE posts.id = ?", [$id], true);

    }

    /**
     * recupère tous les articles liée à une categorie
     * @param $categoryid
     * @return array
     */
    public function lastByCategory($categoryid)
    {
        return $this->query("
SELECT posts.id, posts.author, posts.title, posts.chapo, posts.content, DATE_FORMAT(posts.post_update_date, '%d/%m/%Y à %H:%i:%s ') as post_update_date, categories.title as category 
FROM posts 
LEFT JOIN categories on categoryid = categories.id 
WHERE categories.id = ? 
ORDER BY posts.post_date DESC", [$categoryid]);
    }
}