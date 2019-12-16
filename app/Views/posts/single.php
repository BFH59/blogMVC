<?php

use Core\HTML\BootstrapForm;

if(!empty($_POST)) {
    $result = $commentTable->create([
        'post_id' => $post->id,
        'author' => $_POST['author'],
        'content' => $_POST['content']
    ]);
    if ($result) {
        ?>
        <div class="alert alert-success">Merci pour votre commentaire. Celui-ci est soumis pour approbation avant d'être
            publié !
        </div>
        <?php

    }
}

if($post === false){
    $this->notFound();
}

App::getInstance()->title = $post->title;
?>

<h1><?= $post->title; ?></h1>
<h3><?= $post->chapo; ?></h3>
<p><?= $post->content;?></p>

<?php
if(!$comments){
    ?>
<div><h3> Pas encore de commentaire pour cet article</h3></div>
<?php
}else{
?>
<div>
    <h3>Commentaires de l'article :</h3>
    <?php
    //todo : ajouter date commentaire
    foreach ($comments as $comment) {
        ?>
        <div>
            <p>Auteur: <?= htmlspecialchars($comment->author); ?> || <span>Posté le: <?= $comment->commentdate;?></span></p>
            <p>Commentaire: <?= htmlspecialchars($comment->content); ?></p>
        </div>
        <?php
    }
    }
    ?>

</div>
<div>
    <h3>Laissez nous un commentaire !</h3>

    <?php
    $form = new BootstrapForm($_POST);
    ?>

    <form method="post">
        <?= $form->input('author', 'Votre pseudo'); ?>
        <?= $form->input('content', 'Votre commentaire', ['type' => 'textarea']); ?>
        <button class="btn btn-primary">Envoyer</button>
    </form>

</div>
