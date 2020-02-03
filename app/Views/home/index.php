<!-- Page Header -->
<header class="masthead" style="background-image: url('content/startbootstrap-clean-blog-gh-pages/img/home-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="site-heading">
                    <h2>Julien Plumecocq</h2>
                    <div class="row">
                        <div class="col-lg-4 mx-auto">
                            <img class="rounded-circle img-fluid" src="../public/content/assets/photo.png" alt="photo presentation">
                        </div>
                        <div class="col-lg-8 col-md-10 mx-auto">
                            <br>
                            <span class="subheading" align="left">Développeur PHP/Symfony/Magento en formation</span>
                            <p class="subheading" align="left">Passioné par le web depuis toujours, je me forme aux différentes technologies web afin de vous aider à réaliser vos e-projets !</p>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</header>

<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <p class="help-block text-danger"><?= $errorMessage ?></p>
            <p class="help-block text-success"><?= $successMessage ?></p>
            <p>Une demande ? Remplissez le formulaire ci-dessous et je vous recontacterai dès que possible !</p>

            <form method="post" action="index.php?p=home.sendmail" name="sentMessage" id="contactForm" novalidate>
                <div class="control-group">
                    <div class="form-group floating-label-form-group controls">
                        <label>Nom</label>
                        <input name="name" type="text" class="form-control" placeholder="Nom" id="name" required data-validation-required-message="Veuillez renseigner ce champ.">
                        <p class="help-block text-danger"></p>
                    </div>
                </div>
                <div class="control-group">
                    <div class="form-group floating-label-form-group controls">
                        <label>Email</label>
                        <input name="email" type="email" class="form-control" placeholder="Email" id="email" required data-validation-required-message="Veuillez renseigner ce champ." data-validation-email-message="Adresse email invalide">
                        <p class="help-block text-danger"></p>
                    </div>
                </div>
                <div class="control-group">
                    <div class="form-group floating-label-form-group controls">
                        <label>Message</label>
                        <textarea name="message" rows="5" class="form-control" placeholder="Message" id="message" required data-validation-required-message="Veuillez renseigner ce champ."></textarea>
                        <p class="help-block text-danger"></p>
                    </div>
                </div>
                <br>
                <div id="success"></div>
                <div class="form-group">
                    <button type="submit" name="submitted" class="btn btn-primary" value="submitted" id="sendMessageButton">Envoyer</button>
                </div>
            </form>

        </div>
    </div>
</div>