<form method="post">
    <?= $form->input('author', 'Votre pseudo'); ?>
    <?= $form->input('title', 'Titre de l\'article'); ?>
    <?= $form->input('chapo', 'Chapo de l\'article', ['type' => 'textarea']); ?>
    <?= $form->input('content', 'Contenu de l\'article', ['type' => 'textarea']); ?>
    <?= $form->select('category_id', 'Catégorie de l\'article', $categories); ?>
    <button class="btn btn-primary">Sauvegarder</button>
</form>