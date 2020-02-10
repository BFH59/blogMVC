<!-- Page Header -->
<header class="masthead">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="site-heading">
                    <h1 class="subheading">Article : <?= htmlspecialchars_decode($post->getTitle(),ENT_QUOTES) ?></h1>
                    <span class="subheading">Voici le contenu de l'article n° <?= htmlspecialchars($post->getId()) ?> posté par <em><?= htmlspecialchars($post->getAuthor()) ?></em> avec ses commentaires associés</span>
                </div>
            </div>
        </div>
    </div>
</header>
<?php

if ($post === false) {
    $this->notFound();
}

App::getInstance()->title = $post->getTitle();
?>
<div class="container">
    <div class="col-lg-12 col-md-10 mx-auto">

        <h2><?= htmlspecialchars_decode($post->getTitle(),ENT_QUOTES); ?></h2>
        <span>Auteur : <em><?= htmlspecialchars_decode($post->getAuthor(),ENT_QUOTES); ?></em></span><span> | Dernière modification le : <em><?= htmlspecialchars($post->getPostUpdateDate()); ?></em></span>
        <h4><?= htmlspecialchars_decode($post->getChapo(),ENT_QUOTES); ?></h4>
        <p><?= htmlspecialchars_decode($post->getContent(),ENT_QUOTES); ?></p>
    </div>
    <hr>
    <?php
    if (!$comments){
        ?>
        <h3> Pas encore de commentaire pour cet article</h3>
        <?php
    }else{
    ?>
    <div class="card-body">
        <h3>Commentaires de l'article :</h3>
        <?php

        foreach ($comments as $comment) {
            ?>
            <div>
                <p>Auteur: <?= htmlspecialchars_decode($comment->getAuthor(),ENT_QUOTES); ?> ||
                    <span>Posté le: <?= htmlspecialchars($comment->getCommentDate()); ?></span></p>
                <p>Commentaire: <?= htmlspecialchars_decode($comment->getContent(),ENT_QUOTES); ?></p>
                <hr>
            </div>
            <?php
        }
        }
        ?>

    </div>
    <?php if (isset($_SESSION['usertype'])){ ?>
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <?php if (isset($_SESSION['commentSuccess'])): ?>
                    <div class="alert alert-success">
                        Votre commentaire a bien été soumis pour approbation. Celui-ci sera visible une fois validé par
                        l'administrateur
                    </div>
                    <?php unset($_SESSION['commentSuccess']); ?>
                <?php endif; ?>

                <?php if (isset($_SESSION['commentFail'])): ?>
                    <div class="alert alert-danger">
                        Vous devez remplir tous les champs avant d'envoyer votre commentaire
                    </div>
                    <?php unset($_SESSION['commentFail']); ?>
                <?php endif; ?>

                <h3>Laissez nous un commentaire !</h3>

                <form method="post" action="index.php?p=comments.add">
                    <?= $form->input('author', 'Votre pseudo'); ?>
                    <?= $form->input('content', 'Votre commentaire', ['type' => 'textarea']); ?>
                    <input type="hidden" name="id" value="<?= htmlspecialchars($post->getId()) ?>">
                    <button class="btn btn-primary">Envoyer</button>
                </form>
            </div>
        </div>
    <?php } else { ?>
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <p>Veuillez vous <a href="index.php?p=users.login">connectez</a> pour publier un commentaire</p>
        </div>
    </div>
</div>
<?php
}
?>
