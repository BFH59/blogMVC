<?php


namespace App\Controller;
use \App;
use Core\HTML\BootstrapForm;

class UsersController extends AppController
{

    public function __construct()
    {
        parent::__construct();
        $this->loadModel('User');
    }

    public function register(){
        $errors = [];
        $success = [];
        $_POST = array_map('trim', $_POST); //supprime tous les espace avant et après
        if (isset($_POST)) {

            if ((!empty($_POST['username'])) && (!empty($_POST['password'])) && (!empty($_POST['password2'])) && (!empty($_POST['email']))) {
                if ($_POST['password'] === $_POST['password2']) {
                    if (!$this->User->userExists($_POST['username'], $_POST['email'])) {
                        $result = $this->User->create([
                            'username' => $_POST['username'],
                            'password' => sha1($_POST['password']),
                            'email' => $_POST['email']
                        ]);
                        if ($result) {
                            $success = 'Compte créé avec succès';
                        }
                    } else {
                        $errors = 'Ce nom d\'utilisateur et/ou l\'adresse email sont déjà utilisés';
                    }
                } else {
                    $errors = 'les deux mots de passe ne correspondent pas';
                }
            } else {
                $errors = 'Veuillez remplir tous les champs pour vous inscrire';
            }
        }
        $form = new BootstrapForm($_POST);
        $this->render('users.register', compact('form', 'errors', 'success'));

    }

    public function login(){
        $errors = false;
        if(!empty($_POST)){
            //$auth = new DBAuth(App::getInstance()->getDb());
            if($this->User->login($_POST['username'], $_POST['password'])){
                header('location: index.php');
            } else {
                $errors = true;
            }
        }

        $form = new BootstrapForm($_POST);
        $this->render('users.login', compact('form', 'errors'));

    }
}