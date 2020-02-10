<!-- Page Header -->
<header class="masthead">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="site-heading">
                    <h1>Articles du blog</h1>
                    <span class="subheading">Liste de tous les articles triés par dates :)</span>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <?php if (isset($_SESSION['logout'])) { ?>
                <p class="alert alert-danger">
                    Vous vous êtes correctement deconnecté !
                </p>
                <?php
                unset($_SESSION['logout']);
            } ?>
            <?php foreach ($posts as $post): ?>
                <h2><a href="<?= $post->getUrl(); ?>"><?= htmlspecialchars_decode($post->getTitle(), ENT_QUOTES); ?></a>
                </h2>
                <p>Auteur : <em><?= htmlspecialchars_decode($post->getAuthor(), ENT_QUOTES); ?></em>
                    <span>| Dernière modification : <em><?= htmlspecialchars($post->getPostUpdateDate()); ?></em></span>
                </p>
                <p><?= $post->getExcerpt(); ?></p>
                <hr>
            <?php endforeach; ?>
        </div>

        <div class="col-lg-4 col-md-6 mx-auto">
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