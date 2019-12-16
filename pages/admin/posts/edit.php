<?php
use Core\HTML\BootstrapForm;

$postTable = App::getInstance()->getTable('Post');
if(!empty($_POST)){
    $result = $postTable->update($_GET['id'], [
        'title' => $_POST['title'],
        'chapo' => $_POST['chapo'],
        'content' => $_POST['content'],
        'category_id' => $_POST['category_id'],
        'post_update_date' => date("Y-m-d H:i:s")
    ]);
    if($result){
        ?>
        <div class="alert alert-success">Article mis à jour</div>
        <?php
    }
}

$post = $postTable->find($_GET['id']);
$categories = App::getInstance()->getTable('Category')->listToArray('id', 'title');



$form = new BootstrapForm($post);
?>

<form method="post">
    <?= $form->input('title', 'Titre de l\'article'); ?>
    <?= $form->input('chapo', 'Chapo de l\'article', ['type' => 'textarea']); ?>
    <?= $form->input('content', 'Contenu de l\'article', ['type' => 'textarea']); ?>
    <?= $form->select('category_id', 'Catégorie de l\'article', $categories); ?>
    <button class="btn btn-primary">Sauvegarder</button>
</form>