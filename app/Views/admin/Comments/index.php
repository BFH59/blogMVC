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
            <td><?= $comment->id;?></td>
            <td><?= $comment->post_id;?></td>
            <td><?= htmlspecialchars($comment->author);?></td>
            <td><?= htmlspecialchars($comment->content);?></td>
            <td>
                <!-- >creation du bouton validation. Pas de token CSRF utilisé donc création d'un formulaire specifique pour valider le commentaire -->

                <form action="?p=admin.comments.validate" method="post" style="display:inline;">
                    <input type="hidden" name="id" value="<?= $comment->id ?>">
                    <button type="submit" class="btn btn-success" href="?p=admin.comments.validate&id=<?= $comment->id; ?>">Valider</button>
                </form>
                <!-- >creation du bouton de suppression. Pas de token CSRF utilisé donc création d'un formulaire specifique à la suppression -->
                <form action="?p=admin.comments.delete" method="post" style="display:inline;">
                    <input type="hidden" name="id" value="<?= $comment->id ?>">
                    <button type="submit" class="btn btn-danger" href="?p=admin.comments.delete&id=<?= $comment->id; ?>">Supprimer</button>
                </form>
            </td>
        </tr>
    <?php endforeach;?>
    </tbody>
</table>