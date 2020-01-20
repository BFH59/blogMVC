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
            $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
            $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);
            $password2 = filter_input(INPUT_POST, 'password2', FILTER_SANITIZE_SPECIAL_CHARS);
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS);





            if ((!empty($username)) && (!empty($password)) && (!empty($password2)) && (!empty($email))) {
                if ($password === $password2) {
                    if (!$this->User->userExists($username, $email)) {
                        $result = $this->User->create([
                            'username' => $username,
                            'password' => sha1($password),
                            'email' => $email
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
            $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
            $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);
            //$auth = new DBAuth(App::getInstance()->getDb());
            if($this->User->login($username, $password)){
                header('location: index.php');
            } else {
                $errors = true;
            }
        }

        $form = new BootstrapForm($_POST);
        $this->render('users.login', compact('form', 'errors'));

    }
}