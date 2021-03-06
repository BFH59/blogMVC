<!-- Page Header -->
<header class="masthead">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="site-heading">
                    <h1 class="h1">Julien Plumecocq</h1>
                    <div class="row">
                        <div class="col-lg-4 mx-auto">
                            <img class="rounded-circle img-fluid" src="../public/content/assets/photo.png"
                                 alt="photo presentation">
                        </div>
                        <div class="col-lg-8 col-md-10 mx-auto">
                            <span class="subheading text-left">Développeur PHP/Symfony/Magento en formation</span>
                            <p class="subheading text-left">Passionné par le web depuis toujours, je me forme aux
                                différentes technologies web afin de vous aider à réaliser vos e-projets !</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</header>

<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <p>Une demande ? Remplissez le formulaire ci-dessous et je vous recontacterai dès que possible !</p>

            <form method="post" action="index.php?p=home.sendmail" name="sentMessage" id="contactForm" novalidate>
                <div class="control-group">
                    <div class="form-group floating-label-form-group controls">
                        <label for="name">Nom</label>
                        <input name="name" type="text" class="form-control" placeholder="Nom" id="name" required
                               data-validation-required-message="Veuillez renseigner ce champ.">
                        <p class="help-block text-danger"></p>
                    </div>
                </div>
                <div class="control-group">
                    <div class="form-group floating-label-form-group controls">
                        <label for="email">Email</label>
                        <input name="email" type="email" class="form-control" placeholder="Email" id="email" required
                               data-validation-required-message="Veuillez renseigner ce champ."
                               data-validation-email-message="Adresse email invalide">
                        <p class="help-block text-danger"></p>
                    </div>
                </div>
                <div class="control-group">
                    <div class="form-group floating-label-form-group controls">
                        <label for="message">Message</label>
                        <textarea name="message" rows="5" class="form-control" placeholder="Message" id="message"
                                  required data-validation-required-message="Veuillez renseigner ce champ."></textarea>
                        <p class="help-block text-danger"></p>
                    </div>
                </div>
                <div id="success"></div>
                <div class="form-group">
                    <button type="submit" name="submitted" class="btn btn-primary" value="submitted"
                            id="sendMessageButton">Envoyer
                    </button>
                </div>
            </form>

        </div>
        <div class="col-lg-4 col-md-6 mx-auto">
            <h2 class="text-right">télécharger mon CV</h2>
            <a href="#" data-toggle="modal" data-target="#CV"><img align="right" src="content/assets/pdflogo.png" alt="CV"></a>
        </div>
    </div>

    <div class="modal fade" id="CV" tabindex="-1" role="dialog" aria-labelledby="CV de Julien Plumecocq"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLongTitle">CV de Julien Plumecocq</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fermer">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <object type="application/pdf" data="content/assets/CV.pdf" width="100%" height="500"
                    ></object>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                </div>
            </div>
        </div>
    </div>
</div>