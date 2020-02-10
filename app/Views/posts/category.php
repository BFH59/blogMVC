<!-- Page Header -->
<header class="masthead">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="site-heading">
                    <h1>Catégorie : <?= htmlspecialchars_decode($categorie->getTitle(), ENT_QUOTES) ?></h1>
                    <span class="subheading">Liste de tous les articles de la catégorie <em><?= htmlspecialchars_decode($categorie->getTitle(), ENT_QUOTES) ?></em></span>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <?php

            foreach ($posts as $post): ?>

                <h2><a href="<?= $post->getUrl(); ?>"><?= htmlspecialchars_decode($post->getTitle(), ENT_QUOTES); ?></a>
                </h2>
                <p>Auteur :
                    <em><?= htmlspecialchars_decode($post->getAuthor(), ENT_QUOTES); ?></em><span> | Dernière modification : <em><?= $post->getPostUpdateDate(); ?></em></span>
                </p>

                <p><?= $post->getExcerpt(); ?></p>


            <?php endforeach; ?>
        </div>

        <div class="col-lg-4">
            <h2>Filtrer par catégories</h2>
            <ul>
                <?php foreach ($categories as $category): ?>
                    <li>
                        <a href="<?= $category->getUrl(); ?>"><?= htmlspecialchars_decode($category->getTitle(), ENT_QUOTES); ?></a>
                    </li>
                    <hr>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>
