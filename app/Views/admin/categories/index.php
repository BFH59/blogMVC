<h1>Admin dashboard - Gestion des catégories</h1>

<p>
    <a href="?p=admin.categories.add" class="btn btn-success">Ajouter une catégorie</a>
</p>

<table class="table">
    <thead>
    <tr>
        <td>ID</td>
        <td>Titre</td>
        <td>Actions</td>
    </tr>
    </thead>
    <tbody>
    <?php foreach($items as $categorie): ?>
    <tr>
        <td><?= $categorie->id;?></td>
        <td><?= htmlspecialchars($categorie->title);?></td>
        <td>
            <a class="btn btn-primary" href="?p=admin.categories.edit&id=<?= $categorie->id; ?>">Editer</a>
        <!-- >creation du bouton de suppression. Pas de token CSRF utilisé donc création d'un formulaire specifique à la suppression -->
            <form action="?p=admin.categories.delete" method="post" style="display:inline;">
                <input type="hidden" name="id" value="<?= $categorie->id ?>">
                <button type="submit" class="btn btn-danger" href="?p=admin.categories.delete&id=<?= $categorie->id; ?>">Supprimer</button>
            </form>
        </td>
    </tr>
    <?php endforeach;?>
    </tbody>
</table>