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

App::getInstance()->title = $post->getTitle();
?>

<h1><?= htmlspecialchars($post->getTitle()); ?></h1>
<span>Auteur : <em><?= htmlspecialchars($post->getAuthor()); ?></em></span><span> | Dernière modification le : <em><?=htmlspecialchars($post->getPostUpdateDate());?></em></span>
<h3><?= htmlspecialchars($post->getChapo()); ?></h3>
<p><?= htmlspecialchars($post->getContent());?></p>

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
            <p>Auteur: <?= htmlspecialchars($comment->getAuthor()); ?> || <span>Posté le: <?= htmlspecialchars($comment->getCommentDate());?></span></p>
            <p>Commentaire: <?= htmlspecialchars($comment->getContent()); ?></p>
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
        <input type="hidden" name="id" value="<?= htmlspecialchars($post->getId()) ?>">
        <button class="btn btn-primary">Envoyer</button>
    </form>

</div>
