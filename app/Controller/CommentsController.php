<?php


namespace App\Controller;

class CommentsController extends AppController
{
    public function __construct()
    {
        parent::__construct();
        $this->loadModel('Comment');
    }

    public function add(){

        $postId = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_SPECIAL_CHARS);
        $author = filter_input(INPUT_POST, 'author', FILTER_SANITIZE_SPECIAL_CHARS);
        $content = filter_input(INPUT_POST, 'content', FILTER_SANITIZE_SPECIAL_CHARS);
        $author = trim($author);
        $content = trim($content);


        if(!empty($author) && !empty($content)) {

            $result = $this->Comment->create([
                'post_id' => $postId,
                'author' => $author,
                'content' => $content
            ]);
            if ($result) {
                $_SESSION['commentSuccess'] = true;
                header('location: index.php?p=posts.single&id=' . $postId . '');
            }
        }else{
            $_SESSION['commentFail'] = true;
            header('location: index.php?p=posts.single&id=' . $postId . '');
        }
    }
}