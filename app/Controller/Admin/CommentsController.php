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
        $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_SPECIAL_CHARS);
        if (!empty($id)) {
            $this->Comment->delete($id);
            return $this->index();
        }
    }

    public function validate()
    {
        $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_SPECIAL_CHARS);
        if (!empty($id)) {
            $this->Comment->update($id, [
                'validated' => 1
            ]);
            return $this->index();
        }
    }
}