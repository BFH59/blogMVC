<h1>Home page du blog</h1>

<div class="row">
    <div class="col-sm-8">
        <?php

        foreach ($posts as $post): ?>


            <h2> <a href="<?= $post->url; ?>"><?= htmlspecialchars($post->title);?></a> </h2>
            <p>Catégorie : <em><?= $post->category;?></em>  <span>| Dernière modification : <em><?=$post->post_update_date;?></em></span></p>

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
