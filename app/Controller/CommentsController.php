<?php


namespace App\Controller;


class CommentsController extends AppController
{
    public function __construct()
    {
        parent::__construct();
        $this->loadModel('Comment');
    }
//voir comment recuperer + simplement ID du post
//voir pour message confirmation

    public function add(){
        if(!empty($_POST)) {
            $postId = $_POST['id'];
            $result = $this->Comment->create([
                'post_id' => $postId,
                'author' => $_POST['author'],
                'content' => $_POST['content']
            ]);
            if ($result) {
                $_SESSION['commentSuccess'] = true;
                header('location: index.php?p=posts.single&id=' . $postId . '');
            }
        }
    }
}