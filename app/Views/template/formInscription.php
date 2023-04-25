<?= $this->extend('layout/planLanding') ?>

<?= $this->section('contenuLanding') ?>

<?php
 $erreurNom = isset($validation)?$validation->getError('nom_membre'):'';
 $erreurPrenom = isset($validation)?$validation->getError('prenom_membre'):'';
 $erreurPseudo= isset($validation)?$validation->getError('pseudo'):'';
 $erreurEmail = isset($validation)?$validation->getError('email'):'';
 $erreurPassword = isset($validation)?$validation->getError('password'):'';
 $erreurConfirm = isset($validation)?$validation->getError('confirm_password'):'';

?>

<div class="container-fluid mt-3" style="background-color: #F6F4EA;">
    <h3 class="text-center py-3"><?= $title ?></h3>
    <p class="text-center mb-3">Veuillez compléter le formulaire</p>

    <div class="row">

        <div class="col-11 col-md-5 col-lg-6 offset-1 align-self-center my-5 inscriptionDiv">
            <?= form_open_multipart('inscription');?>

                <div class="col-11 col-md-10 col-lg-7 mb-3 float-center ">
                    <input type="text" class="form-control border border-success" name="nom_membre" placeholder="nom">
                    <span class="text-danger"><?= $erreurNom ?></span>
                </div>
                <div class="col-11 col-md-10 col-lg-7 mb-3">
                    <input type="text" class="form-control border border-success" name="prenom_membre" placeholder="prénom">
                    <span class="text-danger"><?= $erreurPrenom ?></span>
                </div>
                <div class="col-11 col-md-10 col-lg-7 mb-3">
                    <input type="text" class="form-control border border-success" name="pseudo" placeholder="choisir un pseudo">
                    <span class="text-danger"><?= $erreurPseudo ?></span>
                </div>
                <div class="col-11 col-md-10 col-lg-7 mb-3">
                    <input type="text" class="form-control border border-success" name="email" placeholder="email">
                    <span class="text-danger"><?= $erreurEmail ?></span>
                </div>
                <div class=" col-11 col-md-10 col-lg-7 mb-3 ">
                    <input type="password" class="form-control border border-success" name="password" placeholder="mot de passe">
                    <span class="text-danger"><?= $erreurPassword ?></span>
                </div>
                <div class=" col-11 col-md-10 col-lg-7 mb-4 ">
                    <input type="password" class="form-control border border-success" name="confirm_password" placeholder="confirmer mot de passe">
                    <span class="text-danger"><?= $erreurConfirm ?></span>
                </div>
                
                <button type="submit" class="btn btn-sm btn-success opacity-75 fw-bold">Envoyer</button>
            <?= form_close();?> 
        </div>

        <div class="col-11 col-md-5 col-lg-4 offset-1 my-3">
            <img src="<?= base_url('assets/images/femme1.svg') ?>" alt="femme qui cuisine" class="img-fluid inscriptionSvg" width="80%">
            <a class="link-secondary" href="<?=base_url('login')?>"><p class="mt-4">Déjà membre?</p></a>
        </div>

    </div>
</div>

<?= $this->endSection() ?>
