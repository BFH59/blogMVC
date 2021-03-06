<h1>Admin dashboard - Gestion des catégories</h1>

<p>
    <a href="?p=admin.categories.add" class="btn btn-success">Ajouter une catégorie</a>
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
        <td>Actions</td>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($items as $categorie): ?>
        <tr>
            <td><?= htmlspecialchars_decode($categorie->getTitle(),ENT_QUOTES); ?></td>
            <td>
                <a class="btn btn-primary" href="?p=admin.categories.edit&id=<?= $categorie->getId(); ?>">Editer</a>
                <!-- >creation du bouton de suppression. Pas de token CSRF utilisé donc création d'un formulaire specifique à la suppression -->
                <form action="?p=admin.categories.delete" method="post" class="adminForm">
                    <input type="hidden" name="id" value="<?= htmlspecialchars($categorie->getId()); ?>">
                    <button type="submit" class="btn btn-danger"
                            href="?p=admin.categories.delete&id=<?= htmlspecialchars($categorie->getId()); ?>">Supprimer
                    </button>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>