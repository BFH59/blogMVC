<h1>Admin dashboard - Commentaires à valider</h1>

<table class="table">
    <thead>
    <tr>
        <td>ID Commentaire</td>
        <td>ID Article</td>
        <td>Auteur</td>
        <td>Contenu</td>
        <td>Actions</td>
    </tr>
    </thead>
    <tbody>
    <?php
    if(!$comments){
        ?>
    <h4>Aucun commentaire en attente d'approbation</h4>
    <?php
    }
    ?>
    <?php foreach($comments as $comment): ?>
        <tr>
            <td><?= $comment->getId();?></td>
            <td><?= $comment->getPostId();?></td>
            <td><?= htmlspecialchars($comment->getAuthor());?></td>
            <td><?= htmlspecialchars($comment->getContent());?></td>
            <td>
                <!-- >creation du bouton validation. Pas de token CSRF utilisé donc création d'un formulaire specifique pour valider le commentaire -->

                <form action="?p=admin.comments.validate" method="post" style="display:inline;">
                    <input type="hidden" name="id" value="<?= $comment->getId() ?>">
                    <button type="submit" class="btn btn-success" href="?p=admin.comments.validate&id=<?= $comment->getId(); ?>">Valider</button>
                </form>
                <!-- >creation du bouton de suppression. Pas de token CSRF utilisé donc création d'un formulaire specifique à la suppression -->
                <form action="?p=admin.comments.delete" method="post" style="display:inline;">
                    <input type="hidden" name="id" value="<?= $comment->getId() ?>">
                    <button type="submit" class="btn btn-danger" href="?p=admin.comments.delete&id=<?= $comment->getId(); ?>">Supprimer</button>
                </form>
            </td>
        </tr>
    <?php endforeach;?>
    </tbody>
</table>