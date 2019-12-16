<?php

namespace App\Table;

use \Core\Table\Table;

class PostTable extends Table
{

    /**
     * Recuperation des derniers articles
     * @return array
     */
    public function last()
    {
        return $this->query("
SELECT posts.id, posts.title, posts.chapo, posts.content, categories.title as category 
FROM posts 
LEFT JOIN categories on category_id = categories.id 
ORDER BY posts.post_date DESC");
    }

    /**
     * recupère un post en liant la categorie qui lui est associée
     * @param $id
     * @return \App\Entity\PostEntity
     */
    public function findWithCategory($id){
            return $this->query("
SELECT posts.id, posts.title, posts.chapo, posts.content, categories.title as category 
FROM posts 
LEFT JOIN categories on category_id = categories.id 
WHERE posts.id = ?", [$id], true);

    }

    /**
     * recupère tous les articles liée à une categorie
     * @param $category_id
     * @return array
     */
    public function lastByCategory($category_id){
        return $this->query("
SELECT posts.id, posts.title, posts.chapo, posts.content, categories.title as category 
FROM posts 
LEFT JOIN categories on category_id = categories.id 
WHERE categories.id = ? 
ORDER BY posts.post_date DESC", [$category_id]);
    }
}