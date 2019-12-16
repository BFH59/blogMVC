<?php
$app = App::getInstance();
$categorie = $app->getTable('Category')->find($_GET['id']);


if($categorie === false){
    $app->notFound();
}
$posts = $app->getTable('Post')->lastByCategory($_GET['id']);
$categories = $app->getTable('Category')->all();

 ?>

<h1><?= $categorie->title; ?></h1>

<div class="row">
    <div class="col-sm-8">
        <?php

        foreach ($posts as $post): ?>


            <h2> <a href="<?= $post->url; ?>"><?= htmlspecialchars($post->title);?></a> </h2>
            <p><em><?= htmlspecialchars($post->category);?></em></p>

            <p><?= $post->excerpt; ?></p>


        <?php endforeach;?>
    </div>

    <div class="col-sm-4">
        <ul>
            <?php foreach ($categories as $category): ?>
                <li><a href="<?= $category->url;?>"><?= htmlspecialchars($category->title);?></a></li>
            <?php endforeach;?>
        </ul>
    </div>
</div>

