<?php

namespace App\Table;

use \Core\Table\Table;

class PostTable extends Table
{
    /**
     * recupère les derniers articles
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
}