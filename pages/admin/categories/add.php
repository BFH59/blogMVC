<?php
use Core\HTML\BootstrapForm;

$categorieTable = App::getInstance()->getTable('Category');
if(!empty($_POST)){
    $result = $categorieTable->create([
        'title' => $_POST['title']
    ]);
    if($result){
        header('location: admin.php?p=categories.index');
    }
}



$form = new BootstrapForm($_POST);
?>

<form method="post">
    <?= $form->input('title', 'Titre'); ?>
    <button class="btn btn-primary">Sauvegarder</button>
</form>
