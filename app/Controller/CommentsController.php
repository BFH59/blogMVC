<?php


namespace App\Controller;

use Core\Session;
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

        $_POST = array_map('trim', $_POST); //supprime tous les espace avant et après
        $postId = htmlspecialchars($_POST['id']);
        if(!empty($_POST['author']) && !empty($_POST['content'])) {

            $result = $this->Comment->create([
                'post_id' => $postId,
                'author' => $_POST['author'],
                'content' => $_POST['content']
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