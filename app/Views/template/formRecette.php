<?= $this->extend('layout/planSession') ?>

<?= $this->section('contenuSession') ?>

<?php
 $erreurCategorie = isset($validation)?$validation->getError('categorie_id'):'';
 $erreurSouscat = isset($validation)?$validation->getError('sousCategorie_id'):'';
 $erreurTitre = isset($validation)?$validation->getError('titre'):'';
 $erreurDuree = isset($validation)?$validation->getError('duree'):'';
 $erreurNbPart = isset($validation)?$validation->getError('nbPart'):'';
 $erreurDifficulte= isset($validation)?$validation->getError('difficulte'):'';
 $erreurEtape= isset($validation)?$validation->getError('etape'):'';
 $erreurIngredient = isset($validation)?$validation->getError('ingredient'):'';
 $erreurDescription = isset($validation)?$validation->getError('description'):'';
 $erreurImage= isset($validation)?$validation->getError('image'):'';

?>

<div class="container-fluid my-3" style="background-color: #F6F4EA;">

  <!-- titre de la page partager une gloutonnerie -->
  <div class="row">
      <div class="d-flex justify-content-center my-3">
          <img src="<?=base_url('assets/images/logo2.svg')?>" alt="homme qui cuisine" class="figure-img img-fluid me-3" style="width:50px;" >
          <h3><?= $title ?></h3>
          <img src="<?=base_url('assets/images/logo2.svg')?>" alt="homme qui cuisine" class="figure-img img-fluid ms-3" style="width:50px;" >
      </div>
  </div>

    <!-- début du formulaire -->
    <div class="col-12 col-md-10 mx-auto">
        <?= form_open_multipart('ajoutRecette');?>

            <!--Choix de la catégorie et sous catégorie -->
            <div class="row d-flex justify-content-center mb-3" style="background-color: #FEFAE0;">
              <div class="col-2 mt-3 text-end d-none d-sm-block">
                  <img src="<?=base_url('assets/images/louche.svg')?>" alt="ustensile de cuisine" class="figure-img img-fluid ms-3" style="height:90px;" >
              </div>

              <div class="col-12 col-md-6 mt-3">
                <!-- on prépare le select pour le js avec l'ajout d'un eventlistener -->
                <select class="form-select form-select-sm mb-4" name ="categorie_id" aria-label=".form-select-sm example" onchange="selectSousCat(this)">
                    <option selected>Choisir une catégorie</option>
                    <!-- boucle sur les catégories que l'on récupère via $data dans le controller  -->
                    <?php foreach ($categories as $rowCat) : ?>
                    <option value="<?= $rowCat["id"]?>"><?= $rowCat["nom_categorie"]?>
                    <?php endforeach; ?>
                </select>
                <span class="text-danger"><?php echo $erreurCategorie ?></span>

                <select id="sousCatList" class="form-select form-select-sm mb-3" aria-label=".form-select-sm example" name="sousCategorie_id" >
                <option selected >Choisir une Sous catégorie</option>
                </select>
                <span class="text-danger"><?php echo $erreurSouscat ?></span>

              </div>
            </div>

            <!-- nom de la recette -->
            <div class="row d-flex justify-content-center mb-3" style="background-color: #FEF6E0;">
                <div class="col-2 text-end align-self-center d-none d-sm-block">
                    <img src="<?=base_url('assets/images/plat3.png')?>" alt="plat" class="figure-img img-fluid ms-3"  style="height:40px;" >
                </div>
                <div class=" col-12 col-md-6 my-3">
                    <input class="form-control" type="text" placeholder="nom de la recette" aria-label="defaultinput" name="titre">
                    <span class="text-danger"><?php echo $erreurTitre ?></span>
                </div>
            </div>

            <!-- Drescription de la recette -->
            <div class="row d-flex justify-content-center mb-3" style="background-color: #FEFAE0;">
                <div class="col-12 col-md-6 ">
                    <p>Décrire en une phrase ou deux, la recette.</p>
                    <textarea class="form-control mb-3" rows="2" name="description" placeholder=""></textarea>
                    <span class="text-danger"><?php echo $erreurDescription ?></span>
                </div>
                <div class="col-6 col-md-2 align-self-end d-none d-sm-block">
                    <img src="<?=base_url('assets/images/fourchette.png')?>" alt="fourchette" class="figure-img img-fluid" style="width: 135px;">
                </div>
            </div>

            <!-- champs pour la durée, le nbre de part et la difficulté -->
            <div class="row d-flex justify-content-evenly mb-3" style="background-color: #FEF6E0;">
                <div class="col-12 col-md-3 col-lg-3 d-flex flex-column">
                    <i class="bi bi-hourglass-split fs-2"></i>
                    <input class="form-control mb-3" type="text" placeholder="durée" aria-label="defaultinput" name="duree">
                    <span class="text-danger"><?php echo $erreurDuree ?></span>
                </div>
                <div class="col-12 col-md-3 col-lg-3 d-flex flex-column">
                    <i class="bi bi-people fs-2"></i>
                    <input class="form-control mb-3" type="text" placeholder="nombre de part" aria-label="defaultinput" name="nbPart">
                    <span class="text-danger"><?php echo $erreurNbPart ?></span>
                </div>
                <div class="col-12 col-md-3 col-lg-3 d-flex flex-column">
                    <i class="bi bi-speedometer2 fs-2"></i>
                    <select class="form-select form-select-sm mb-3" aria-label=".form-select-sm example" name="difficulte">
                        <option selected>Difficulté</option>
                        <option value="1">Très facile</option>
                        <option value="2">Facile</option>
                        <option value="3">Moyenne</option>
                    </select>
                    <span class="text-danger"><?php echo $erreurDifficulte ?></span>
                </div>
            </div>

            
            <!--champs pour les ingrédients -->
            <div class="row d-flex justify-content-center mb-3" style="background-color: #FEFAE0;">
                <div class="col-2 mt-2 text-end d-none d-sm-block">
                    <img src="<?=base_url('assets/images/rape1.svg')?>" alt="ustensile cuisine" class="figure-img img-fluid ms-3" style="width:50px;" >
                </div>
                <div class="col-12 col-md-6 mt-3">
                    <input type="text" class="form-control" placeholder="ingrédients" id="ingredient" aria-label="nomIngredient" aria-describedby="defaultinput">
                    <span id="compteurIngr">20 ajout restant</span>
                    <span class="d-flex justify-content-end mt-2">
                    <div>Ajouter un ingrédient <button onclick="nouvelIngr()" class="btn btn-outline-success" type="button" id="btnIngr"><i class="bi-plus-circle"></i></button>
                    </div>
                    </span>
                    <span class="text-danger"><?php echo $erreurIngredient ?></span>
                
                    <!-- champs javascript pour ingrédient -->
                    <div class="col-10 col-md-6 mb-3" id="ingrDiv">
                        <ul class="list-group list-group-flush" id="ulIngr"></ul>
                    </div>
                </div>
                <span class="text-danger d-flex justify-content-center " id="erreurIngr"></span>
            </div>

            <!-- champs pour les étapes -->
            <div class="row d-flex justify-content-center mb-3" style="background-color: #FEF6E0;">
                <div class="col-2 text-end align-self-center d-none d-sm-block">
                    <img src="<?=base_url('assets/images/rouleau1.svg')?>" alt="rouleau" class="figure-img img-fluid ms-3" style="height:80px;" >
                </div>
                <div class="col-12 col-md-6 mt-3">
                    <textarea class="form-control mb-3" id="etapeRecette" rows="4" placeholder="Etapes de la recette"></textarea>
                    <span id="compteurEtape">15 ajout restant</span>
                    <span class="d-flex justify-content-end mb-3">
                    <div>Ajouter une étape<button onclick="nouvelEtape()" class="btn btn-outline-success ms-2" type="button" id="btnEtape"><i class="bi-plus-circle"></i></button>
                    </div>
                    </span>
                    <span class="text-danger"><?php echo $erreurEtape ?></span>
                    <!-- champs javascript pour les étapes -->
                    <div class="" id="etapeDiv">
                        <ul class="list-group list-group-flush" id="ulEtape"></ul>
                    </div>
                </div>
                <span class="text-danger d-flex justify-content-center " id="erreurEtape"></span>
            </div>

            <!-- row pour la selection de l'image -->
            <div class="row d-flex justify-content-evenly mb-3" style="background-color: #FEFAE0;">
                <div class="col-2 mt-3 text-end d-none d-sm-block">
                    <img src="<?=base_url('assets/images/saliere.svg')?>" alt="ustensile de cuisine" class="figure-img img-fluid ms-3" style="height:90px;" >
                </div>
                <div class="col-12 col-md-5 col-lg-4 mt-3">
                    <?= form_label('Choisir une image d\'illustration', 'image');?>
                    <?= form_upload('image', '', ['id' => 'image', 'class'=>'form-control border-warning', 'type'=>'file']);?>
                    <span class="text-danger"><?php echo $erreurImage ?></span>
                </div>
                <!-- insertion de la div pour l'image de l'upload en javascipt-->
                <div id="insert_image" class="col-6 col-md-4 col-lg-4 mt-3" style="height: 150px;">
                </div>
            </div>

            <!-- row pour la selection des tags -->
          <div class="row d-flex justify-content-evenly g-3 my-3" style="background-color: #FEF6E0;">
                <h5 class="text-center">Choisir les tags (optionnel)</h5>

            <div class="cardOccasion col-12 col-md-6 col-lg-4 my-3 mx-4" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Evénement / Occasion</h5>
                    <h6 class="card-subtitle mb-3 text-muted">En relation avec la temporalité</h6>
                    <?php foreach($tagOccasion as $rowTagOccasion) : ?>
                        <span class="tagsOccasion badge rounded-pill my-1 mx-1">
                        <p class="tagsOccasion fs-6">
                        <?= $rowTagOccasion["nom_tag"] ?>
                        <input class="form-check-input mt-0" type="checkbox" name="tagEnvoi[]" value="<?= $rowTagOccasion["id"] ?>">
                        </p>
                        </span>
                    <?php endforeach ?>
                </div>
            </div>

            <div class="cardIngredient col-12 col-md-6 col-lg-4 my-3" style="width: 18rem;">
                <div class="card-body">
                <h5 class="card-title">Ingrédients</h5>
                <h6 class="card-subtitle mb-2 text-muted">En relation avec les ingrédients</h6>
                <?php foreach($tagIngr as $rowTagIngr) : ?>
                    <span class="tagsIngredient badge rounded-pill my-1 mx-1">
                    <p class="tagsIngredient fs-6">
                        <?= $rowTagIngr["nom_tag"] ?>
                        <input class="form-check-input mt-0" type="checkbox" name="tagEnvoi[]" value="<?= $rowTagIngr["id"] ?>">
                    </p>
                    </span>
                <?php endforeach ?>
                </div>
            </div>    

            <div class="cardDivers col-12 col-md-6 col-lg-4 my-3 mx-4" style="width: 18rem;">
                <div class="card-body">
                <h5 class="card-title">Divers</h5>
                <h6 class="card-subtitle mb-2 text-muted">Tout le reste</h6>
                <?php foreach($tagDivers as $rowTagDivers) : ?>

                    <!-- début de la condition générale pour savoir si la session est admin ou pas
                    si on est dans une session Admin alors rien ne se passe car Admin à accès à tout -->
                    <?php if(session('membre.statut_id') == 1): ?>
                        <span class="tagsDivers badge rounded-pill my-1 mx-1">
                            <p class="tagsDivers fs-6">
                                <?= $rowTagDivers["nom_tag"] ?>
                                <input class="form-check-input mt-0" type="checkbox" name="tagEnvoi[]" value="<?= $rowTagDivers["id"] ?>">
                            </p>
                        </span>
                    <?php else: ?>
                        <!-- si la session n'est pas admin alors on vérifie si le tag est isAdmin ou pas
                        si isAdmin alors on desactive. Si pas isAdmin alors on laisse normal  -->
                        <?php if($rowTagDivers["isAdmin"] == 1) : ?>
                            <span class="tagsDivers badge rounded-pill my-1 mx-1">
                                <p class="tagsDivers fs-6">
                                    <?= $rowTagDivers["nom_tag"] ?>
                                    <input class="form-check-input mt-0" type="checkbox" name="tagEnvoi[]" value="<?= $rowTagDivers["id"] ?>" disabled>
                                </p>
                            </span>
                        <?php else:?>
                            <span class="tagsDivers badge rounded-pill my-1 mx-1">
                                <p class="tagsDivers fs-6">
                                    <?= $rowTagDivers["nom_tag"] ?>
                                    <input class="form-check-input mt-0" type="checkbox" name="tagEnvoi[]" value="<?= $rowTagDivers["id"] ?>">
                                </p>
                            </span>
                        <?php endif;?>
                    <?php endif; ?>
                <?php endforeach ?>
                </div>
             </div>
          </div>


            <!-- input caché pour les étapes et les infredients -->
            <input id="ingrId" name="ingredient" type="hidden" value="">
            <input id="etapeId" name="etape" type="hidden" value="">

            <!-- input caché pour récupérer id utilisateur avec l'id de la session-->
            <input name="membre_id" type="hidden" value=<?= session('membre')['id']?>>

            <!-- bonton submit -->
            <button onclick="enregistrer()" class="btn btn-primary mb-3" type="submit">Envoyer</button>

         <!-- fermeture du formulaire -->
        <?= form_close();?>
    </div> 
</div>

<script>
    const sousCat = <?php echo(json_encode($sousCategories)) ?>;
  </script>
  <script src="<?=base_url('assets/js/formulaire.js')?>"></script>

<?= $this->endSection() ?>
