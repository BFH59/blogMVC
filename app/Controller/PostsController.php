<?php

namespace App\Controller;

use Core\Controller\Controller;
use Core\HTML\BootstrapForm;

class PostsController extends AppController
{
    public function __construct()
    {
        parent::__construct();
        $this->loadModel('Post');
        $this->loadModel('Category');
        $this->loadModel('Comment');
    }

    public function index(){
        $posts = $this->Post->last();
        $categories = $this->Category->all();
        $this->render('posts.index', compact('posts', 'categories'));
    }
    public function category(){
        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_SPECIAL_CHARS);

        $categorie = $this->Category->find($id);


        if($categorie === false){
            $this->notFound();
        }
        $posts = $this->Post->lastByCategory($id);
        $categories = $this->Category->all();
        $this->render('posts.category', compact('posts', 'categories','categorie'));

    }

    public function single(){
        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_SPECIAL_CHARS);

        $post = $this->Post->findWithCategory($id);
        $comments = $this->Comment->showValidatedComment($id);
        $form = new BootstrapForm();
        $this->render('posts.single', compact('post', 'comments','form'));
    }

}