<header class="masthead" style="background-image: url('content/startbootstrap-clean-blog-gh-pages/img/home-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="site-heading">
                    <h3>Se connecter</h3>
                    <span class="subheading">Veuillez saisir votre login et mot de passe pour vous connecter</span>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <?php if($errors): ?>
                <div class="alert alert-danger">
                    Identifiants Incorrects
                </div>
            <?php endif;?>

            <?php if($deco): ?>
                <div class="alert alert-success">
                    Vous vous êtes correctement deconnecté !
                </div>
            <?php endif;?>
<form method="post">
    <?= $form->input('username', 'Pseudo'); ?>
    <?= $form->input('password', 'Mot de passe', ['type' => 'password']); ?>
    <button class="btn btn-primary">Envoyer</button>
</form>
        </div>
    </div>
</div>
