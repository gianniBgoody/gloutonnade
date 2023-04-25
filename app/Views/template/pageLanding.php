<?= $this->extend('layout/planLanding') ?>

<?= $this->section('contenuLanding') ?>

<?php

 $erreurNom = isset($validation)?$validation->getError('nom_contact'):'';
 $erreurPrenom = isset($validation)?$validation->getError('prenom_contact'):'';
 $erreurEmail = isset($validation)?$validation->getError('email_contact'):'';
 $erreurObjet = isset($validation)?$validation->getError('objet_contact'):'';
 $erreurContenu = isset($validation)?$validation->getError('contenu_contact'):'';

// message de confirmation que l'inscription est OK
if (session()->getFlashdata('messageInscriptionOk')){

    echo ("<div class='col-10 col-md-7 col-lg-5 my-3 mx-auto alert alert-success text-center' role='alert'><i class='bi-check-circle me-2 fs-5'></i>".session()->getFlashdata('messageInscriptionOk')."</div>");
    }

if (session()->getFlashdata('messageContactOk')){

    echo ("<div class='col-10 col-md-7 col-lg-5 my-3 mx-auto alert alert-success text-center' role='alert'><i class='bi-check-circle me-2 fs-5'></i>".session()->getFlashdata('messageContactOk')."</div>");
    }
?>

<div class="container-fluid my-3" style="background-color: #CCD5AE;">
    <div class="row" >
        <div class="col-11 col-md-5 col-lg-6 offset-1">
            <h1 class="text-landing-h1 ">GLOUTONNADE</h1>
            <h4 class="text-landing-h4">Le site qui vous régale</h4>
            <h6 class="text-landing-h6">
            Des idées de recettes simples et savoureuses à commenter et à déguster.<br>
            Une communauté active et nombreuses vous accueille à sa table. <br>
            Partagez vos recettes, devenez un Glouton !
            </h6>
            <a href="<?=base_url('inscription')?>" type="button" class="btn btn-outline-success fw-bold mt-2">REJOINDRE</a>
        </div>
        <div class="col-12 col-md-6 col-lg-5 divHomme">
        <img src="<?=base_url('assets/images/homme1.svg')?>" alt="homme qui cuisine" width="" class="figure-img img-fluid my-3 hommeSvg">
        </div>
    </div>
    <div class="row d-flex justify-content-evenly g-3 my-3">
        <div class="col-12 col-md-6 col-lg-4 my-3 mx-4 rounded-2" style="width: 20rem; background-color: #FEFAE0;">
            <div class="card-body">
                <div class="row">
                    <div class="col-4 py-4">
                        <img src="<?=base_url('assets/images/planche.svg')?>" class="img-fluid rounded-start testimonial" alt="ustensile de cuisine.">
                    </div>
                    <div class="col-8 py-2">
                        <h6 class="card-subtitle mb-3 text-muted fst-italic testimonialText">
                            <span class="badge rounded-pill testimonialSpan">MartineLapine</span><br>
                             "Un plaisir de partager mes recettes avec mes copains Gloutons."</h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-4 my-3 mx-4 rounded-2" style="width: 20rem; background-color: #FEFAE0;">
            <div class="card-body">
            <div class="row">
                    <div class="col-4 py-3 d-flex">
                        <img src="<?=base_url('assets/images/sacFarine.svg')?>" class="img-fluid rounded-start align-self-end testimonial" alt="ustensile de cuisine.">
                    </div>
                    <div class="col-8 py-2">

                    <h6 class="card-subtitle mb-3 text-muted fst-italic testimonialText">
                    <span class="badge rounded-pill testimonialSpan">Gloutassedu13</span><br>
                    "Je ne regrette pas de m'être inscrit pour participer."</h6>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-4 my-3 mx-4 rounded-2" style="width: 20rem; background-color: #FEFAE0;">
            <div class="card-body">
            <div class="row">
                    <div class="col-4">
                        <img src="<?=base_url('assets/images/pilon.png')?>" class="img-fluid rounded-start testimonial1" alt="ustensile de cuisine">
                    </div>
                    <div class="col-8 py-2">

                    <h6 class="card-subtitle mb-3 text-muted fst-italic testimonialText">
                    <span class="badge rounded-pill testimonialSpan">ChiefGlout</span><br>
                        "J'ai fait de belles rencontres, et en plus je me régale."</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="scroll-container container-fluid my-3" id="Recette" style="background-color: #FAECDC;">
    <div class="row">
      <div class="col-4 col-md-4 col-lg-3 offset-1">
        <img src="<?=base_url('assets/images/femme11.svg')?>" alt="femme qui cuisine" class="figure-img img-fluid my-3 femmeSvg">
      </div>
      <div class="col-7 col-md-6 col-lg-7 mx-auto">
        <h1 class="align-self-center titreUne">La Gloutonnerie du moment</h1>
      </div>
    </div>

        <!-- carte recette du mois include le code html du partial-->
        <?php echo $this->include('partial/landingCard') ?>

</div>

<div class="scroll-container container-fluid my-3" id="About" style="background-color: #CCD5AE;">
  <div class="row">
    <div class="col-11 col-md-5 col-lg-6 offset-1">
        <h2 class="mt-5">Qui sommes nous?</h2>
        <p class="aboutUs"> Nam aliquam mi faucibus eleifend posuere. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum in sapien quis lorem eleifend sodales.</p>
        <p class="aboutUs"> In a malesuada ante. Integer odio ante, faucibus vitae condimentum ullamcorper, bibendum semper lorem. Praesent eleifend turpis lacus, et tempus massa vehicula id. Mauris in magna id lorem ultrices pulvinar. Duis dignissim dictum urna sit amet lacinia. </p>
        <p class="aboutUs"> Nullam ultrices elementum libero. Duis in ipsum nulla. Nunc viverra sem eget massa feugiat, sit amet imperdiet ipsum congue. Integer in ultricies arcu. Integer imperdiet ante ac condimentum ullamcorper. Mauris suscipit, lorem in ultricies condimentum, purus tortor malesuada leo, eget rutrum orci libero a nulla.</p>
    </div>
    <div class="col-12 col-md-5 col-lg-4">
    <img src="<?=base_url('assets/images/hero_ustensile.png')?>" alt="femme qui cuisine" class="figure-img img-fluid my-3 aboutImg">
    </div>
  </div>
</div>

<div class="scroll-container container-fluid my-3" id="Contact" style="background-color: #FAECDC;">
    <div class="row">
        <div class="col-12 col-md-5 col-lg-4 offset-1 align-self-center">
            <img src="<?=base_url('assets/images/livreRecette.png')?>" alt="femme qui cuisine" class="figure-img img-fluid my-3 aboutImg" width="90%">
        </div>
        <div class="col-11 col-md-5 col-lg-6 offset-1">
            <h2 class="my-5">Nous Contacter</h2>
            <!-- si il y a une session d'ouverte on empêche le formulaire de se lancer et on redirige l'utilisateur vers sa page compte pour qu'il contacte l'administrateur depuis le formulaire du compte-->
            <?php if(isset($_SESSION["membre"]["id"])): ?>
                <div>
                    <p>Veuillez envoyer votre message depuis votre compte utilisateur. </p><br>
                  <a href="<?=base_url('compte')?>"><button type="button" class="btn btn-outline-success opacity-75">Mon compte</button></a>
                </div> 
            <?php else: ?>


            <?= form_open('/');?>

                <div class="col-8 mb-3">
                    <input type="text" class="form-control border border-success" name="nom_contact" placeholder="nom">
                    <span class="text-danger"><?= $erreurNom ?></span>
                </div>
                <div class="col-8 mb-3">
                    <input type="text" class="form-control border border-success" name="prenom_contact" placeholder="prénom">
                    <span class="text-danger"><?= $erreurPrenom ?></span>
                </div>
                <div class="col-8 mb-3">
                    <input type="text" class="form-control border border-success" name="email_contact" placeholder="email">
                    <span class="text-danger"><?= $erreurEmail ?></span>
                </div>
                <div class="col-8 mb-3">
                    <select select class="form-select form-select-sm border border-success" aria-label=".form-select-sm example" name="objet_contact">
                        <option selected >Objet de votre demande</option>
                        <option value="1">Informations générales</option>
                        <option value="2">S'inscrire à la News Letter</option>
                        <option value="3">Autre</option>
                    </select>
                    <span class="text-danger"><?= $erreurObjet ?></span>
                </div>
                <div class="col-8 mb-3">
                    <textarea class="form-control border border-success" rows="5" placeholder="votre message" id="floatingTextarea" name="contenu_contact"></textarea>
                    <span class="text-danger"><?= $erreurContenu ?></span>
                </div>

                <button type="submit" class="btn btn-sm btn-success opacity-75 fw-bold mb-5">Envoyer</button>
            <?= form_close();?> 
            <?php endif;?>

        </div>

    </div>
</div>

<!-- declaration des variables de qui sont affichées lors des règles de validation. On utilise ces variables ensuite dans le fichier js. Au niveau de la condition du if-->
<script>
    const erreurNom = "<?php echo($erreurNom)?>";
    const erreurPrenom = "<?php echo($erreurPrenom)?>";
    const erreurEmail = "<?php echo($erreurEmail)?>";
    const erreurObjet = "<?php echo($erreurObjet)?>";
    const erreurContenu = "<?php echo($erreurContenu)?>";

    if(erreurContenu.length > 1 || erreurObjet.length > 1 ||$erreurEmail.length > 1 || $erreurPrenom.length > 1 || $erreurNom.length > 1){
        window.location.href="#Contact"
    }
</script>

<?= $this->endSection() ?>
