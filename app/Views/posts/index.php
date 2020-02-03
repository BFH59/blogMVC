<!-- Page Header -->
<header class="masthead" style="background-image: url('content/startbootstrap-clean-blog-gh-pages/img/home-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="site-heading">
                    <h3>Articles du blog</h3>
                    <span class="subheading">Liste de tous les articles triés par dates :)</span>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <?php if(isset($_SESSION['logout'])){?>
                <div class="alert alert-danger">
                Vous vous êtes correctement deconnecté !
                </div>
            <?php
                unset($_SESSION['logout']);
            }?>
        <?php foreach ($posts as $post): ?>
            <h3> <a href="<?= $post->getUrl(); ?>"><?= htmlspecialchars($post->getTitle());?></a> </h3>
            <p>Auteur : <em><?= htmlspecialchars($post->getAuthor());?></em>  <span>| Dernière modification : <em><?=htmlspecialchars($post->getPostUpdateDate());?></em></span></p>
            <p><?= $post->getExcerpt(); ?></p>
        <hr>
        <?php endforeach;?>
        </div>

        <div class="col-lg-4 col-md-6 mx-auto">
            <h3>Filtrer par catégories</h3>
                <ul>
                    <?php foreach ($categories as $category): ?>
                         <li><a href="<?= $category->getUrl();?>"><?= htmlspecialchars($category->getTitle());?></a></li>
                         <hr>
                    <?php endforeach;?>
                 </ul>
        </div>
    </div>
</div>