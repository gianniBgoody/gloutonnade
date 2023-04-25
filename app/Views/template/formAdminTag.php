<?= $this->extend('layout/planAdmin') ?>

<?= $this->section('contenuAdmin') ?>

<?php
$erreurNom = isset($validation)?$validation->getError('nom_tag'):'';
$erreurParentId = isset($validation)?$validation->getError('parent_id'):'';
$erreurIsAdmin = isset($validation)?$validation->getError('isAdmin'):'';

if(isset($editTag)){
    $editNomTag = $editTag['nom_tag'];
    $editParentId = $editTag['parent_id'];
    $editIsAdmin = $editTag['parent_id'];


    }else{
        $editNomTag = "";
        $editParentId = "";
        $editIsAdmin = "";
    }
?>

<div class="container-fluid my-3" style="background-color: #F6F4EA;">
    <div class="row">
    <h4 class="text-center "><?= $title ?></h4>
    <div class="col-12 col-md-6 my-3 mx-auto">

        <?php
            if(isset($editTag)){
                echo form_open('adminDatabaseTag/'.$editTag['id']);
                }else{
                    echo form_open('adminAjoutTag');
            }
        ?>
        <div class="mb-3">
            <input type="text" name ="nom_tag" value = "<?= $editNomTag ?>" placeholder="nom tag" class="form-control" aria-describedby="textlHelp" >
            <span class="text-danger"><?= $erreurNom ?></span>
        </div>
        <div class="mb-3">
            <select class="form-select" name="parent_id" value = "<?= $editParentId ?>" aria-label=".form-select-sm example">
            <?php if(isset($editTag)){
                echo "<option selected>choisir la thématique</option>";
                foreach ($tagNulls as $tagNull){
                    if($editParentId == $tagNull['id']){
                        echo "<option selected value=".$tagNull['id'].">".$tagNull['nom_tag']."</option>";
                    }else{
                        echo "<option value=".$tagNull['id'].">".$tagNull['nom_tag']."</option>";
                    }
                }
            }else{
                echo "<option selected>choisir la catégorie associée</option>";
                foreach ($tagNulls as $tagNull){
                    echo "<option value=".$tagNull['id'].">".$tagNull['nom_tag']."</option>";
                }
            }
            ?>
                <option value="0">aucun</option>
            </select>
            <span class="text-danger"><?= $erreurParentId ?></span>
        </div>
        <div class="mb-3">
            <select class="form-select" name="isAdmin" value = "<?= $editIsAdmin ?>" aria-label=".form-select-sm example">
                <option selected>tag réservé à l'administrateur</option>
                <option value="1">oui</option>
                <option value="2">non</option>
            </select>
            <span class="text-danger"><?= $erreurIsAdmin ?></span>
        </div>

            <button class="btn btn-primary mb-3" type="submit">Envoyer</button>
        <?= form_close();?>
    </div>
</div>

<?= $this->endSection() ?>