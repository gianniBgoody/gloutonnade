<?= $this->extend('layout/planAdmin') ?>

<?= $this->section('contenuAdmin') ?>
<?php
$erreurNom = isset($validation)?$validation->getError('nom_categorie'):'';

if(isset($updateCat)){
    $nomCat = $updateCat['nom_categorie'];
    }else{
        $nomCat = "";
    }
?>

<div class="container-fluid my-3" style="background-color: #F6F4EA;">
    <div class="row">
        <h4 class="text-center "><?= $title ?></h4>
        <div class="col-12 col-md-6 my-3 mx-auto">
            <?php 
                if(isset($updateCat)){
                    echo form_open('adminDatabaseCat/'.$updateCat['id']);
                }else{
                    echo form_open('adminAjoutCat');
                }
                ?>
        
                <div class="mb-3">
                    <input type="text" name ="nom_categorie" value = "<?= $nomCat ?>" class="form-control" aria-describedby="textlHelp">
                    <span class="text-danger"><?= $erreurNom ?></span>

                </div>

                <button class="btn btn-primary mb-3" type="submit">Envoyer</button>
            <?= form_close();?>
        </div>
    </div>
</div>


<?= $this->endSection() ?>