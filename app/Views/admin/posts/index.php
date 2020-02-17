<h1>Admin dashboard - Gestion des articles</h1>

<p>
    <a href="?p=admin.posts.add" class="btn btn-success">Ajouter un article</a>
</p>
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
<table class="table">
    <thead>
    <tr>
        <td>Titre</td>
        <td>Auteur</td>
        <td>Actions</td>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($posts as $post): ?>
        <tr>
            <td><?= htmlspecialchars_decode($post->getTitle(), ENT_QUOTES); ?></td>
            <td><?= htmlspecialchars_decode($post->getAuthor(),ENT_QUOTES); ?></td>
            <td>
                <a class="btn btn-primary"
                   href="?p=admin.posts.edit&id=<?= htmlspecialchars($post->getId()); ?>">Editer</a>
                <!-- >creation du bouton de suppression. Pas de token CSRF utilisé donc création d'un formulaire specifique à la suppression -->
                <form action="?p=admin.posts.delete" method="post" class="adminForm">
                    <input type="hidden" name="id" value="<?= htmlspecialchars($post->getId()) ?>">
                    <button type="submit" class="btn btn-danger"
                            href="?p=admin.posts.delete&id=<?= htmlspecialchars($post->getId()); ?>">Supprimer
                    </button>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>