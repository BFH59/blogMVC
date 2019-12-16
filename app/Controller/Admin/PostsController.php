<?php

namespace App\Controller\Admin;

use App;
use Core\HTML\BootstrapForm;

class PostsController extends AppController
{
    public function __construct()
    {
        parent::__construct();
        $this->loadModel('Post');
    }

    public function index(){
        $posts = $this->Post->last();
        $this->render('admin.posts.index', compact('posts', 'categories'));
    }

    public function add(){

        if (!empty($_POST)) {
            $result = $this->Post->create([
                'title' => $_POST['title'],
                'chapo' => $_POST['chapo'],
                'content' => $_POST['content'],
                'category_id' => $_POST['category_id'],
                'user_id' => $_SESSION['auth']
            ]);
            if ($result) {
                return $this->index();
            }
        }
        $this->loadModel('Category');
        $categories = $this->Category->listToArray('id', 'title');
        $form = new BootstrapForm($_POST);
        $this->render('admin.posts.edit', compact('categories', 'form'));

    }

    public function edit(){
        if(!empty($_POST)){
            $result = $this->Post->update($_GET['id'], [
                'title' => $_POST['title'],
                'chapo' => $_POST['chapo'],
                'content' => $_POST['content'],
                'category_id' => $_POST['category_id'],
                'post_update_date' => date("Y-m-d H:i:s")
            ]);
            if($result){
               return $this->index();
            }
        }

        $post = $this->Post->find($_GET['id']);
        $this->loadModel('Category');
        $categories = $this->Category->listToArray('id', 'title');

        $form = new BootstrapForm($post);
        $this->render('admin.posts.edit', compact('categories', 'form'));

    }

    public function delete(){
        if (!empty($_POST)) {
            $result = $this->Post->delete($_POST['id']);
            return $this->index();
        }
    }
}