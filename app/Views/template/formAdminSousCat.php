<?= $this->extend('layout/planAdmin') ?>

<?= $this->section('contenuAdmin') ?>

<?php
// variables pour les règles de validations
$erreurNom = isset($validation)?$validation->getError('nom_souscat'):'';
$erreurCategorieId = isset($validation)?$validation->getError('categorie_id'):'';

// variables pour savoir ce que le affiche en fonction de la methode appelé par le Controlleur. Ici $editSouscat est la fonction définit dans le Model qui selectionne les sous-categorie par l'id
if(isset($editSouscat)){
    $nomSouscat = $editSouscat['nom_souscat'];
    $categorieId = $editSouscat['categorie_id'];
    }else{
        $nomSouscat = "";
        $categorieId = "";
    }
?>

<div class="container-fluid my-3" style="background-color: #F6F4EA;">
    <div class="row">
    <h4 class="text-center "><?= $title ?></h4>
    <div class="col-12 col-md-6 my-3 mx-auto">
        <?php
        // on selectionne le formulaire en fonction que la route qui amène à cette vue. Car c'est le même formulaire mais c'est l'action qui change
            if(isset($editSouscat)){
                echo form_open('adminDatabaseSouscat/'.$editSouscat['id']);
                }else{
                    echo form_open('adminAjoutSouscat');
                }
            ?>
        <div class="mb-3">
            <input type="text" name ="nom_souscat" value = "<?= $nomSouscat ?>" placeholder="nom sous catégorie" class="form-control" aria-describedby="textlHelp" >
            <span class="text-danger"><?= $erreurNom ?></span>
        </div>

        <div class="mb-3">
            <select class="form-select" name="categorie_id" aria-label=".form-select-sm example">
            <?php 
                if(isset($editSouscat)){
                    echo "<option>choisir la catégorie associée</option>";
                    foreach ($catAdmins as $catAdmin){
                        if($categorieId == $catAdmin['id']){
                            echo "<option selected value=".$catAdmin['id'].">".$catAdmin['nom_categorie']."</option>";
                        }else{
                            echo "<option value=".$catAdmin['id'].">".$catAdmin['nom_categorie']."</option>";
                        }
                    }
                }else{
                    echo "<option selected>choisir la catégorie associée</option>";
                    foreach ($catAdmins as $catAdmin){
                        echo "<option value=".$catAdmin['id'].">".$catAdmin['nom_categorie']."</option>";
                    }
                    
                }
                ?>


            </select>
            <span class="text-danger"><?= $erreurCategorieId ?></span>
        </div>

        <button class="btn btn-primary mb-3" type="submit">Envoyer</button>
        <?= form_close();?>
    </div>
</div>


<?= $this->endSection() ?>