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

    public function index()
    {
        $posts = $this->Post->last();
        $this->render('admin.posts.index', compact('posts', 'categories'));
    }

    public function add()
    {

        $post = filter_input_array(INPUT_POST, $_POST);

        //encapsule superglobale et nettoie les données
        $author = filter_input(INPUT_POST, 'author', FILTER_SANITIZE_STRING, ENT_QUOTES);
        $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING, ENT_QUOTES);
        $chapo = filter_input(INPUT_POST, 'chapo', FILTER_SANITIZE_STRING, ENT_QUOTES);
        $content = filter_input(INPUT_POST, 'content', FILTER_SANITIZE_STRING, ENT_QUOTES);
        $categoryid = filter_input(INPUT_POST, 'categoryid', FILTER_VALIDATE_INT);
        //supprime espaces avant et apres la chaine
        $author = trim($author);
        $title = trim($title);
        $chapo = trim($chapo);
        $content = trim($content);


        if (!empty($author) && !empty($title) && !empty($chapo) && !empty($content)) {
            $result = $this->Post->create([
                'author' => $author,
                'title' => $title,
                'chapo' => $chapo,
                'content' => $content,
                'categoryid' => $categoryid
            ]);
            if ($result) {
                return $this->index();
            }
        }
        $this->loadModel('Category');
        $categories = $this->Category->listToArray('id', 'title');

        $form = new BootstrapForm($post);
        $this->render('admin.posts.edit', compact('categories', 'form'));

    }

    public function edit()
    {

        //encapsule superglobale et nettoie les données
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        $author = filter_input(INPUT_POST, 'author', FILTER_SANITIZE_STRING, ENT_QUOTES);
        $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING, ENT_QUOTES);
        $chapo = filter_input(INPUT_POST, 'chapo', FILTER_SANITIZE_STRING, ENT_QUOTES);
        $content = filter_input(INPUT_POST, 'content', FILTER_SANITIZE_STRING, ENT_QUOTES);
        $categoryid = filter_input(INPUT_POST, 'categoryid', FILTER_VALIDATE_INT);

        //check si le post n'a pas deja été supprimé de la bdd

        $records = $this->Post->Count($id);
        if ($records->total == 0) {
            $_SESSION['noRecords'] = "Aucun enregistrement correspondant trouvé / Article déjà supprimé";
            return $this->index();
        }

        if (!empty($author) && !empty($title) && !empty($chapo) && !empty($content)) {
            $result = $this->Post->update($id, [
                'author' => $author,
                'title' => $title,
                'chapo' => $chapo,
                'content' => $content,
                'categoryid' => $categoryid,
                'post_update_date' => date("Y-m-d H:i:s")
            ]);
            if ($result) {
                return $this->index();
            }
        }

        $post = $this->Post->find($id);
        $this->loadModel('Category');
        $categories = $this->Category->listToArray('id', 'title');
        $form = new BootstrapForm($post);
        $this->render('admin.posts.edit', compact('categories', 'form'));

    }

    public function delete()
    {
        $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
        $records = $this->Post->count($id);

        if ($records->total == 0) {
            $_SESSION['noRecords'] = "Aucun enregistrement correspondant trouvé / Article déjà supprimé";
            return $this->index();
        }
        $this->Post->delete($id);
        return $this->index();
    }

}