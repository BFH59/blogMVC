<?php

namespace App\Controller\Admin;

use App;

class CommentsController extends AppController
{
    public function __construct()
    {
        parent::__construct();
        $this->loadModel('Comment');
    }

    public function index(){
        $comments = $this->Comment->commentToValidate();
        $this->render('admin.comments.index', compact('comments'));
    }


    public function delete(){
        if (!empty($_POST)) {
            $result = $this->Comment->delete($_POST['id']);
            return $this->index();
        }
    }

    public function validate()
    {
        if (!empty($_POST)) {
            $result = $this->Comment->update($_POST['id'], [
                'validated' => 1
            ]);
            return $this->index();
        }
    }
}