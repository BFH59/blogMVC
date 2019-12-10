<?php
use Core\HTML\BootstrapForm;

if(!empty($_POST)){
    $auth = new \Core\Auth\DBAuth(App::getInstance()->getDb());
    if($auth->login($_POST['username'], $_POST['password'])){
        header('location: admin.php');
    } else {
        ?>
        <div class="alert alert-danger">
            Identifiants Incorrects
        </div>
        <?php
    }
}

$form = new BootstrapForm($_POST);
?>

<form method="post">
    <?= $form->input('username', 'Pseudo'); ?>
    <?= $form->input('password', 'Mot de passe', ['type' => 'password']); ?>
    <button class="btn btn-primary">Envoyer</button>
</form>