<h1>Home page du blog</h1>

<div class="row">
    <div class="col-sm-8">
        <?php

        foreach ($posts as $post): ?>


            <h2> <a href="<?= $post->getUrl(); ?>"><?= htmlspecialchars($post->getTitle());?></a> </h2>
            <p>Auteur : <em><?= htmlspecialchars($post->getAuthor());?></em>  <span>| Dernière modification : <em><?=htmlspecialchars($post->getPostUpdateDate());?></em></span></p>

            <p><?= $post->getExcerpt(); ?></p>


        <?php endforeach;?>
    </div>

    <div class="col-sm-4">
        <ul>
        <?php foreach ($categories as $category): ?>
            <li><a href="<?= $category->getUrl();?>"><?= htmlspecialchars($category->getTitle());?></a></li>
        <?php endforeach;?>
        </ul>
    </div>
</div>
