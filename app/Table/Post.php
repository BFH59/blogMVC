<?php

namespace App\Table;

use App\App;

class Post extends Table
{
    protected static $table = "posts";

    public static function getLast()
    {
        return self::query("
            SELECT posts.id, posts.title, posts.chapo, posts.content, categories.title as category 
            FROM posts LEFT JOIN categories on category_id = categories.id ORDER BY posts.post_date DESC");
    }

    public static function lastByCategory($category_id)
    {
        return self::query("
            SELECT posts.id, posts.title, posts.chapo, posts.content, categories.title as category 
            FROM posts 
            LEFT JOIN categories on category_id = categories.id 
            WHERE categories.id = ? ORDER BY posts.post_date DESC",[$category_id]);
    }

    public function getUrl(){
        return 'index.php?p=single&id='.$this->id;
    }

    public function getExcerpt(){

        $html = '<p>' . $this->chapo . '</p>';
        $html .= '<p><a href="' . $this->getUrl() .'">Lire la suite</a></p>';

        return $html;
    }
}