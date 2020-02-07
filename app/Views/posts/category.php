<!-- Page Header -->
<header class="masthead" style="background-image: url('content/startbootstrap-clean-blog-gh-pages/img/home-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="site-heading">
                    <h3>Catégorie : <?= htmlspecialchars($categorie->getTitle()) ?></h3>
                    <span class="subheading">Liste de tous les articles de la catégorie <em><?= htmlspecialchars($categorie->getTitle()) ?></em></span>
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

                <h3><a href="<?= $post->getUrl(); ?>"><?= htmlspecialchars($post->getTitle()); ?></a></h3>
                <p>Auteur :
                    <em><?= htmlspecialchars($post->getAuthor()); ?></em><span> | Dernière modification : <em><?= $post->getPostUpdateDate(); ?></em></span>
                </p>

                <p><?= $post->getExcerpt(); ?></p>


            <?php endforeach; ?>
        </div>

        <div class="col-lg-4">
            <h3>Filtrer par catégories</h3>
            <ul>
                <?php foreach ($categories as $category): ?>
                    <li><a href="<?= $category->getUrl(); ?>"><?= htmlspecialchars($category->getTitle()); ?></a></li>
                    <hr>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>
