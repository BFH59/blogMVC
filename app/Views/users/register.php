<header class="masthead">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="site-heading">
                    <h1 class="h1">Créer un compte</h1>
                    <span class="subheading">Remplissez tous les champs et cliquez sur valider pour créer votre compte</span>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <?php if (!empty($errors)): ?>
                <div class="alert alert-danger">
                    <?= htmlspecialchars($errors); ?>
                </div>
            <?php endif; ?>
            <?php if (!empty($success)): ?>
                <div class="alert alert-success">
                    <?= htmlspecialchars($success); ?>
                </div>
            <?php endif; ?>
            <form method="post">
                <?= $form->input('username', 'Pseudo'); ?>
                <?= $form->input('password', 'Mot de passe', ['type' => 'password']); ?>
                <?= $form->input('password2', 'Retapez votre mot de passe', ['type' => 'password']); ?>
                <?= $form->input('email', 'Votre adresse e-mail', ['type' => 'email']); ?>
                <button class="btn btn-primary">Envoyer</button>
            </form>
        </div>
    </div>
</div>

