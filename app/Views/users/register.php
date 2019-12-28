<?php if(!empty($errors)): ?>
    <div class="alert alert-danger">
        <?= $errors;?>
    </div>
<?php endif;?>
<?php if(!empty($success)): ?>
    <div class="alert alert-success">
        <?= $success;?>
    </div>
<?php endif;?>
<form method="post">
    <?= $form->input('username', 'Pseudo'); ?>
    <?= $form->input('password', 'Mot de passe', ['type' => 'password']); ?>
    <?= $form->input('password2', 'Retapez votre mot de passe', ['type' => 'password']); ?>
    <?= $form->input('email', 'Votre adresse e-mail', ['type' => 'email']); ?>
    <button class="btn btn-primary">Envoyer</button>
</form>

