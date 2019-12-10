<?php
use Core\HTML\BootstrapForm;

$categorieTable = App::getInstance()->getTable('Category');
if(!empty($_POST)){
    $result = $categorieTable->update($_GET['id'], [
        'title' => $_POST['title']
    ]);
    if($result){
        ?>
        <div class="alert alert-success">Catégorie mise à jour</div>
        <?php
    }
}

$categorie = $categorieTable->find($_GET['id']);



$form = new BootstrapForm($categorie);
?>

<form method="post">
    <?= $form->input('title', 'Titre de la categorie'); ?>
    <button class="btn btn-primary">Sauvegarder</button>
</form>