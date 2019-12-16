<?php
use Core\HTML\BootstrapForm;

$postTable = App::getInstance()->getTable('Post');

if(!empty($_POST)){
    $result = $postTable->create([
        'title' => $_POST['title'],
        'chapo' => $_POST['chapo'],
        'content' => $_POST['content'],
        'category_id' => $_POST['category_id'],
        'user_id' => $_SESSION['auth']
    ]);
    if($result){
        header('location: admin.php?p=posts.edit&id='. App::getInstance()->getDb()->lastInsertId());
    }
}

$categories = App::getInstance()->getTable('Category')->listToArray('id', 'title');



$form = new BootstrapForm($_POST);
?>

<form method="post">
    <?= $form->input('title', 'Titre de l\'article'); ?>
    <?= $form->input('chapo', 'Chapo de l\'article', ['type' => 'textarea']); ?>
    <?= $form->input('content', 'Contenu de l\'article', ['type' => 'textarea']); ?>
    <?= $form->select('category_id', 'Catégorie de l\'article', $categories); ?>
    <button class="btn btn-primary">Sauvegarder</button>
</form>