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

    public function index()
    {
        $items = $this->Category->all();
        $this->render('admin.categories.index', compact('items'));
    }

    public function add()
    {

        $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_SPECIAL_CHARS);
        $title = trim($title);
        if (!empty($title)) {
            $result = $this->Category->create([
                'title' => $title,
            ]);
            if ($result) {
                return $this->index();
            }
        }
        $form = new BootstrapForm($title);
        $this->render('admin.categories.edit', compact('form'));

    }

    public function edit()
    {
        $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_SPECIAL_CHARS);
        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_SPECIAL_CHARS);

        $records = $this->Category->Count($id);
        if ($records->total == 0) {
            $_SESSION['noRecords'] = "Aucun enregistrement correspondant trouvé / Catégorie déjà supprimée";
            return $this->index();
        }
        if (!empty($title)) {
            $result = $this->Category->update($id, [
                'title' => $title,
            ]);
            if ($result) {
                return $this->index();
            }
        }
        $category = $this->Category->find($id);
        $form = new BootstrapForm($category);
        $this->render('admin.categories.edit', compact('form'));

    }

    public function delete()
    {
        $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_SPECIAL_CHARS);
        $records = $this->Category->count($id);
        if (!empty($id)) {
            if ($records->total == 0) {
                $_SESSION['noRecords'] = "Aucun enregistrement correspondant trouvé / catégorie déjà supprimée";
                return $this->index();
            }
            $this->Category->delete($id);
            return $this->index();
        }
    }
}