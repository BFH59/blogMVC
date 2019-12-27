<h1>Admin dashboard - Gestion des articles</h1>

<p>
    <a href="?p=admin.posts.add" class="btn btn-success">Ajouter un article</a>
</p>

<table class="table">
    <thead>
    <tr>
        <td>ID</td>
        <td>Categorie</td>
        <td>Titre</td>
        <td>Auteur</td>
        <td>Actions</td>
    </tr>
    </thead>
    <tbody>
    <?php foreach($posts as $post): ?>
    <tr>
        <td><?= $post->id;?></td>
        <td><?= $post->category;?></td>
        <td><?= htmlspecialchars($post->title);?></td>
        <td><?= htmlspecialchars($post->author);?></td>
        <td>
            <a class="btn btn-primary" href="?p=admin.posts.edit&id=<?= $post->id; ?>">Editer</a>
        <!-- >creation du bouton de suppression. Pas de token CSRF utilisé donc création d'un formulaire specifique à la suppression -->
            <form action="?p=admin.posts.delete" method="post" style="display:inline;">
                <input type="hidden" name="id" value="<?= $post->id ?>">
                <button type="submit" class="btn btn-danger" href="?p=admin.posts.delete&id=<?= $post->id; ?>">Supprimer</button>
            </form>
        </td>
    </tr>
    <?php endforeach;?>
    </tbody>
</table>