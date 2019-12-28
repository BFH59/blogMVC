<?php if(isset($_SESSION['commentSuccess'])): ?>
<div class="alert alert-success">
    Votre commentaire a bien été soumis pour approbation. Celui-ci sera visible une fois validé par l'administrateur
</div>
<?php unset($_SESSION['commentSuccess']); ?>
<?php endif;?>

<?php if(isset($_SESSION['commentFail'])): ?>
    <div class="alert alert-danger">
        Vous devez remplir tous les champs avant d'envoyer votre commentaire
    </div>
    <?php unset($_SESSION['commentFail']); ?>
<?php endif;?>
<?php

if($post === false){
    $this->notFound();
}

App::getInstance()->title = $post->title;
?>

<h1><?= $post->title; ?></h1>
<span>Auteur : <em><?= $post->author; ?></em></span><span> | Dernière modification le : <em><?=$post->post_update_date;?></em></span>
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

    <form method="post" action="index.php?p=comments.add">
        <?= $form->input('author', 'Votre pseudo'); ?>
        <?= $form->input('content', 'Votre commentaire', ['type' => 'textarea']); ?>
        <input type="hidden" name="id" value="<?= $post->id ?>">
        <button class="btn btn-primary">Envoyer</button>
    </form>

</div>
