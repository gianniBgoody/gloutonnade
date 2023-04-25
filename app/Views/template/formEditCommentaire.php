<?= $this->extend('layout/planAdmin') ?>

<?= $this->section('contenuAdmin') ?>

<?php
$erreurContenu = isset($validation)?$validation->getError('contenu'):'';

?>

<div class="container-fluid my-3" style="background-color: #F6F4EA;">
    <div class="col-12 col-md-8 form-floating mx-auto my-3">
        <h4 class="text-center mb-5"><?= $title ?></h4>
        <div>
        <?= form_open('commentaireRecette/'.$editComment['id']); ?>
            <textarea class="form-control mb-2" placeholder="Votre commentaire ici" name="contenu" ><?= $editComment["contenu"] ?></textarea>

            <span class="text-danger"><?= $erreurContenu ?></span>
        </div>
            <button class="btn btn-primary mb-3" type="submit">Envoyer</button>
            <?= form_close();?>
    </div>
</div>


<?= $this->endSection() ?>