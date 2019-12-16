<h1>Home page du blog</h1>

<div class="row">
    <div class="col-sm-8">
        <?php

        foreach (App::getInstance()->getTable('Post')->last() as $post): ?>


            <h2> <a href="<?= $post->url; ?>"><?= htmlspecialchars($post->title);?></a> </h2>
            <p><em><?= $post->category;?></em></p>

            <p><?= $post->excerpt; ?></p>


        <?php endforeach;?>
    </div>

    <div class="col-sm-4">
        <ul>
        <?php foreach (App::getInstance()->getTable('Category')->all() as $category): ?>
            <li><a href="<?= $category->url;?>"><?= htmlspecialchars($category->title);?></a></li>
        <?php endforeach;?>
        </ul>
    </div>
</div>
