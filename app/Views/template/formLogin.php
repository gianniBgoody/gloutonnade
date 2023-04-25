<?= $this->extend('layout/planLanding') ?>

<?= $this->section('contenuLanding') ?>

<?php
 $erreurPseudomail= isset($validation)?$validation->getError('pseudomail'):'';
 $erreurPassword = isset($validation)?$validation->getError('password'):'';
 $erreurLogin = isset($notMatching)?$notMatching:'';
?>

<div class="container-fluid mt-3" style="background-color: #F6F4EA;">
    <h3 class="text-center py-3"><?= $title ?></h3>

    <div class="row">
        <div class="col-12 col-md-4 col-lg-4 offset-1 my-5">
            <img src="<?= base_url('assets/images/homme11.svg') ?>" alt="femme qui cuisine" class="img-fluid mb-4" width="80%">
            <a class="link-secondary" href="<?=base_url('inscription')?>"><p class="fw-bold ">Pas encore membre?</p></a>
        </div>
        <div class="col-12 col-md-6 col-lg-6 offset-1 align-self-center order sm-2 order-1 mb-5">
            <?= form_open_multipart('login');?>

                <div class="col-8 mb-3">
                <input type="text" class="form-control border border-success" name="pseudomail" placeholder="pseudo ou email">
                <span class="text-danger"><?= $erreurPseudomail ?></span>
                </div>

                <div class=" col-8 mb-3 ">
                <input type="password" class="form-control border border-success" name="password" placeholder="mot de passe">
                <span class="text-danger"><?= $erreurPassword ?></span>
                <span class="text-danger"><?= $erreurLogin ?></span>
                </div>
                <button type="submit" class="btn btn-sm btn-success opacity-75 fw-bold">Envoyer</button>
            <?= form_close();?> 
        </div>
    </div>
</div>

<?= $this->endSection() ?>
