<?= $this->extend('layout/planAdmin') ?>

<?= $this->section('contenuAdmin') ?>

<?php
$erreurStatut = isset($validation)?$validation->getError('statut_id'):'';
$erreurAvatar = isset($validation)?$validation->getError('avatar'):'';

if(isset($editMembre)){
    $editStatutId = $editMembre['statut_id'];
}else{
    $editStatutId = "";
}
?>

<div class="container-fluid my-3" style="background-color: #F6F4EA;">
    <div class="row">
    <h4 class="text-center mb-4"><?= $title ?></h4>
        <div class="col-12 col-md-6 my-3 mx-auto">
            <?= form_open_multipart('adminDatabaseMembre/'.$editMembre['id']); ?>
            <h6 class="">modifier le statut</h6>
            <div class="mb-3">
                <select class="form-select" name="statut_id" value = "<?= $editStatutId ?>" aria-label=".form-select-sm example">
                <?php if(isset($editMembre)){
                    echo "<option selected>choisir la thématique</option>";
                    foreach ($statutMembres as $statutMembre){
                        if($editStatutId == $statutMembre['id']){
                            echo "<option selected value=".$statutMembre['id'].">".$statutMembre['nom_statut']."</option>";
                        }else{
                            echo "<option value=".$statutMembre['id'].">".$statutMembre['nom_statut']."</option>";
                        }
                    }
                }
                ?>
                </select>
                <span class="text-danger"><?= $erreurStatut ?></span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-6 my-3 mx-auto">
            <h6 class="">avatar actuel</h6>
            <span>
                <img src="<?= base_url('avatar'."/".$editMembre['avatar'])?>" alt="avatar membre" class="figure-img img-fluid" width="100px;">
            </span>

            <div class="form-check mb-3">
                <input class="form-check-input" name="avatarCheck" type="checkbox" value="" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault"> 
                    Supprimer l'avatar actuel
                </label>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-6 my-3 mx-auto">
            <h6 class="">remplacer l'avatar actuel</h6>
                <?= form_upload('avatar', '', ['id' => 'avatar', 'class'=>'form-control border-warning my-3', 'type'=>'file']);?>
            <div id="insert_avatar" class="col-7 mt-3">
                <span class="text-danger"><?= $erreurAvatar ?></span>
            </div>
            <button class="btn btn-primary mb-3" type="submit">Envoyer</button>
            <?= form_close();?>
        </div>
    </div>
</div>


<script src="<?=base_url('assets/js/avatar.js')?>"></script>

<?= $this->endSection() ?>