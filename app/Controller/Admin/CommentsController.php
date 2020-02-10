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

    public function index()
    {
        $comments = $this->Comment->commentToValidate();
        $this->render('admin.comments.index', compact('comments'));
    }


    public function delete()
    {
        $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_SPECIAL_CHARS);
        $records = $this->Comment->count($id);
        if (!empty($id)) {
            if ($records->total == 0) {
                $_SESSION['noRecords'] = "Aucun enregistrement correspondant trouvé / commentaire déjà supprimé";
                return $this->index();
            }
            $this->Comment->delete($id);
            return $this->index();

        }
    }

    public function validate()
    {
        $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_SPECIAL_CHARS);
        $records = $this->Comment->count($id);
        if (!empty($id)) {
            if ($records->total == 0) {
                $_SESSION['noRecords'] = "Aucun enregistrement correspondant trouvé / commentaire déjà supprimé";
                return $this->index();
            }
            $this->Comment->update($id, [
                'validated' => 1
            ]);
            return $this->index();
        }
    }
}