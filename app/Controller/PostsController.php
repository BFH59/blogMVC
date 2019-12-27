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
        $categorie = $this->Category->find($_GET['id']);


        if($categorie === false){
            $this->notFound();
        }
        $posts = $this->Post->lastByCategory($_GET['id']);
        $categories = $this->Category->all();
        $this->render('posts.category', compact('posts', 'categories','categorie'));

    }

    public function single(){
        $post = $this->Post->findWithCategory($_GET['id']);
        $comments = $this->Comment->showValidatedComment($_GET['id']);
        $form = new BootstrapForm();
        $this->render('posts.single', compact('post', 'comments','form'));
    }

}