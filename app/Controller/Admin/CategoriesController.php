<?php

namespace App\Controller\Admin;

use App;
use Core\HTML\BootstrapForm;

class CategoriesController extends AppController
{
    public function __construct()
    {
        parent::__construct();
        $this->loadModel('Category');
    }

    public function index(){
        $items = $this->Category->all();
        $this->render('admin.categories.index', compact('items'));
    }

    public function add(){

        if (!empty($_POST)) {
            $result = $this->Category->create([
                'title' => $_POST['title'],
            ]);
            if ($result) {
                return $this->index();
            }
        }
        $form = new BootstrapForm($_POST);
        $this->render('admin.categories.edit', compact('form'));

    }

    public function edit(){
        $data['id'] = htmlspecialchars($_GET['id']);
        if(!empty($_POST)){
            $result = $this->Category->update($data['id'], [
                'title' => $_POST['title'],
            ]);
            if($result){
               return $this->index();
            }
        }
        $category = $this->Category->find($data['id']);
        $form = new BootstrapForm($category);
        $this->render('admin.categories.edit', compact('form'));

    }

    public function delete(){
        if (!empty($_POST)) {
            $result = $this->Category->delete($_POST['id']);
            return $this->index();
        }
    }
}