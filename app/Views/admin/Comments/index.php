<h1>Admin dashboard - Commentaires à valider</h1>

<table class="table">
    <thead>
    <tr>
        <td>Titre de l'article</td>
        <td>Auteur du commentaire</td>
        <td>Contenu du commentaire</td>
        <td>Actions</td>
    </tr>
    </thead>
    <tbody>
    <?php
    if (isset($_SESSION['noRecords'])) {
        ?>
        <div class="alert-danger">
            <?= $_SESSION['noRecords']; ?>
        </div>
        <?php
        unset($_SESSION['noRecords']);
    }
    ?>
    <?php
    if (!$comments) {
        ?>
        <h2>Aucun commentaire en attente d'approbation</h2>
        <?php
    }
    ?>
    <?php foreach ($comments as $comment): ?>
        <tr>
            <td><?= htmlspecialchars_decode($comment->getTitle(),ENT_QUOTES); ?></td>
            <td><?= htmlspecialchars_decode($comment->getAuthor(),ENT_QUOTES); ?></td>
            <td><?= htmlspecialchars_decode($comment->getContent(),ENT_QUOTES); ?></td>
            <td>
                <!-- >creation du bouton validation. Pas de token CSRF utilisé donc création d'un formulaire specifique pour valider le commentaire -->

                <form action="?p=admin.comments.validate" method="post" class="adminForm">
                    <input type="hidden" name="id" value="<?= htmlspecialchars($comment->getId()) ?>">
                    <button type="submit" class="btn btn-success"
                            href="?p=admin.comments.validate&id=<?= htmlspecialchars($comment->getId()); ?>">Valider
                    </button>
                </form>
                <!-- >creation du bouton de suppression. Pas de token CSRF utilisé donc création d'un formulaire specifique à la suppression -->
                <form action="?p=admin.comments.delete" method="post" class="adminForm">
                    <input type="hidden" name="id" value="<?= htmlspecialchars($comment->getId()) ?>">
                    <button type="submit" class="btn btn-danger"
                            href="?p=admin.comments.delete&id=<?= htmlspecialchars($comment->getId()); ?>">Supprimer
                    </button>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>