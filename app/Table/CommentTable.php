<?php

namespace App\Table;

use \Core\Table\Table;

class CommentTable extends Table
{
    public function showValidatedComment($id){
        return $this->query("
SELECT comments.id, comments.post_id, comments.author, comments.content, comments.validated, DATE_FORMAT(commentdate, '%d/%m/%Y à %H:%i:%s ') as commentdate  
FROM comments 
WHERE comments.post_id = ? AND comments.validated = 1
ORDER BY commentdate DESC ", [$id]);

    }
    //genere la liste des commentaires qui doivent être validés
    public function commentToValidate(){
        return $this->query("
SELECT comments.id, comments.post_id, comments.author, comments.content, comments.validated, DATE_FORMAT(commentdate, '%d/%m/%Y à %H:%i:%s ') as commentdate  
FROM comments 
WHERE comments.validated = 0
ORDER BY commentdate DESC");
    }
}