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

    public function register()
    {
        $errors = [];
        $success = [];
        $post = filter_input_array(INPUT_POST, $_POST);
        if (isset($post)) {
            $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
            $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);
            $password2 = filter_input(INPUT_POST, 'password2', FILTER_SANITIZE_SPECIAL_CHARS);
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS);

            //enleve espace avant et après la chaine

            $username = trim($username);
            $password = trim($password);
            $password2 = trim($password2);
            $email = trim($email);

            if (($username != "") && ($password != "") && ($password2 != "") && ($email != "")) {
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
        $form = new BootstrapForm($post);
        $this->render('users.register', compact('form', 'errors', 'success'));

    }

    public function login()
    {
        $errors = false;
        $post = filter_input_array(INPUT_POST, $_POST);
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);
        $username = trim($username);
        $password = trim($password);
        if (!empty($username) && !empty($password)) {

            //$auth = new DBAuth(App::getInstance()->getDb());
            if ($this->User->login($username, $password)) {
                if (isset($_SESSION) && $_SESSION['usertype'] === 'admin') {
                    header('location: index.php?p=admin.posts.index');
                    exit;
                } else {
                    header('location: index.php?p=posts.index');
                    exit;
                }
            } else {
                $errors = true;
            }
        }

        $form = new BootstrapForm($post);
        $this->render('users.login', compact('form', 'errors'));

    }

    public function logout()
    {

        $_SESSION['logout'] = false;
        if (isset($_SESSION)) {
            session_unset();
            $_SESSION['logout'] = true;
        }
        header('location: index.php?p=posts.index');

    }
}