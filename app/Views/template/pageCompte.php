<?= $this->extend('layout/planSession') ?>

<?= $this->section('contenuSession') ?>

<?php
 $erreurObjet = isset($validation) ? $validation->getError('objet_contact'):'';
 $erreurContenu = isset($validation)?$validation->getError('contenu_contact'):'';
 $erreurAvatar = isset($validation)?$validation->getError('avatar'):'';

  if (session()->getFlashdata('messageContactOk')){

  echo ("<div class='col-10 col-md-7 col-lg-5 my-3 mx-auto alert alert-success text-center' role='alert'><i class='bi-check-circle me-2 fs-5'></i>".session()->getFlashdata('messageContactOk')."</div>");
  }
?>

<div class="container-fluid my-3" style="background-color: #F6F4EA;">
  <div class="row">
    <h4 class="text-center"><?= $title ?></h4>

    <!-- col de la carte -->
    <div class="col-12 col-md-10 my-3 mx-auto">
      <div class="card">

        <div class="card-header" style="background-color: #FEFAE0;">  
          <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
              <button class="nav-link active" id="accueil-tab" data-bs-toggle="tab" data-bs-target="#accueil-tab-pane" type="button" role="tab" aria-controls="accueil-tab-pane" aria-selected="true">Accueil</button>
            </li>

            <li class="nav-item" role="presentation">
              <button class="nav-link" id="avatar-tab" data-bs-toggle="tab" data-bs-target="#avatar-tab-pane" type="button" role="tab" aria-controls="avatar-tab-pane" aria-selected="false">Modifier Avatar</button>
            </li>

            <li class="nav-item" role="presentation">
              <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">Contacter Administrateur</button>
            </li>

            <li class="nav-item" role="presentation">
              <button class="nav-link" id="recette-tab" data-bs-toggle="tab" data-bs-target="#recette-tab-pane" type="button" role="tab" aria-controls="recette-tab-pane" aria-selected="false">Mes Recettes</button>
            </li>

            <li class="nav-item" role="presentation">
              <button class="nav-link" id="commentaire-tab" data-bs-toggle="tab" data-bs-target="#commentaire-tab-pane" type="button" role="tab" aria-controls="commentaire-tab-pane" aria-selected="false">Mes Commentaires</button>
            </li>
            
          </ul>
          <!-- div de la partie qui engloge l'affichage des onglets -->
          <div class="tab-content" id="myTabContent">

            <!-- div affiche Accueil -->
            <div class="tab-pane fade show active"  id="accueil-tab-pane"role="tabpanel" aria-labelledby="accueil-tab" tabindex="0">

              <div class="card-body">
                <div class="row mt-5">
                  <div class="col-4">
                  <img src="<?=base_url('assets/images/user.png')?>" alt="membre illustration" width="40%" class="ms-5">
                  </div>
                  <div class="col-7">
                      <?php
                        if (session()->getFlashdata('messageAvatarOk')){
                            echo ("<div class='mb-5 mx-auto alert alert-success' role='alert'><i class='bi-check-circle me-2 fs-5'></i>".session()->getFlashdata('messageAvatarOk')."</div>");
                          }
                      ?>
                      <h5 class="card-title">Bienvenue sur votre espace compte</h5>
                      <p class="card-text">Vous pouvez effectuer plusieures action depuis cette page</p>
                      <ul>
                        <li>Changer l'avatar</li>
                        <li>Contacter l'administratreur</li>
                        <li>Voir vos contributions</li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>

            <!-- affichage de la partie Avatar -->
            <div class="tab-pane fade"  id="avatar-tab-pane"role="tabpanel" aria-labelledby="avatar-tab" tabindex="0">

              <div class="card-body">
                <div class="row mt-5">
                    <div class="col-4">
                      <img src="<?=base_url('assets/images/logoToque3.png')?>" alt="membre illustration" width="70%" class="ms-5">
                    </div>
                    <div class="col-8">
                      <h5 class="card-title">Modifier votre Avatar</h5>
                      <p class="card-text">Vous pouvez modifier votre avatar si vous le souhaitez en selectionnant votre image via le formulaire</p>
                      <div class="col-7">
                        <?= form_open_multipart('compte');?>
                            <?= form_upload('avatar', '', ['id' => 'avatar', 'class'=>'form-control border-warning my-3', 'type'=>'file']);?>

                          <!-- input caché pour récupérer membre_id via la session-->
                          <input name="id" type="hidden" value=<?= session('membre')['id']?>>

                            <button class="btn btn-primary mb-3" type="submit">Envoyer</button>
                        <?= form_close();?>
                        <span class="text-danger"><?= $erreurAvatar ?></span>
                        
                        <div id="insert_avatar" class="col-7 mt-3"></div>
                       </div>
                    </div>
                </div>
              </div>
            </div>

            <!-- div pour affichage du contact Administrateur -->
            <div class="tab-pane fade"  id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">

              <div class="card-body">
                <div class="row mt-5">
                  <div class="col-3 align-self-center">
                      <img src="<?=base_url('assets/images/fiche.png')?>" alt="membre illustration" width="70%" class="ms-5">
                  </div>
                  <div class="col-9">
                    <h5 class="card-title">Vous avez une question ou une demande</h5>
                    <p class="card-text">Veuiller remplir le formulaire</p>

                    <div class="col-9 mb-3">

                      <?= form_open('message');?>
                        <select select class="form-select form-select-sm border border-success" aria-label=".form-select-sm example" name="objet_contact">
                          <option selected >Objet de votre demande</option>
                          <option value="1">Informations générales</option>
                          <option value="4">A propos du statut</option>
                          <option value="5">A propos des recettes</option>
                          <option value="6">A propos des commentaires </option>
                          <option value="3">Autre</option>
                        </select>
                      <span class="text-danger"><?= $erreurObjet ?></span>
                    </div>
                    <div class="col-9 mb-3">
                      <textarea class="form-control border border-success" rows="5" placeholder="votre message" id="floatingTextarea" name="contenu_contact"></textarea>
                      <span class="text-danger"><?= $erreurContenu ?></span>
                    </div>

                    <input name="nom_contact" type="hidden" value=<?= session('membre')['nom_membre']?>>
                    <input name="prenom_contact" type="hidden" value=<?= session('membre')['prenom_membre']?>>
                    <input name="email_contact" type="hidden" value=<?= session('membre')['email']?>>
                    <input name="membre_id" type="hidden" value=<?= session('membre')['id']?>>

                    <button class="btn btn-primary mb-3" type="submit">Envoyer</button>
                    <?= form_close();?>
                  </div>
                </div>
              </div>
            </div>

            <!-- affichage des recettes -->
            <div class="tab-pane fade" id="recette-tab-pane" role="tabpanel" aria-labelledby="recette-tab" tabindex="0">
              
                <div class="card-body">
                  <h5 class="card-title my-3">Liste de mes recettes postées sur la Gloutonnade</h5>

                  <!-- debut de la condition pour  savoir si le tableau comporte un élément ou pas
                  si il possède 1 recette, on l'affiche le tableau-->
                  <?php if(count($membreRecettes) > 0):?>
                    
                        <table class="table table-striped">
                          <thead>
                              <tr>
                                <th scope="col"></th>
                                <th scope="col">Titre</th>
                                <th scope="col">Voir recette</th>
                                <th scope="col">Action</th>
                              </tr>
                          </thead>
                          <tbody>
                          <!-- $key est l'index du tableau. on l'utilise pour afficher le nbre de lignes dans le th  
                          boucle foreach pour afficher les recettes-->
                          <?php foreach ($membreRecettes as $key=>$membreRecetteRow) :?>
                          <tr>
                          <th scope="row"><?= $key +1 ?></th>
                          <td><?= $membreRecetteRow['titre'] ?></td>
                          <!-- condition pour afficher l'image par defaut de la recette si besoin -->
                            <?php if($membreRecetteRow["image"]!= NULL): ?>
                              <td><a href="<?=base_url('recette/'.$membreRecetteRow['id'])?>"><img src="<?=base_url('uploads')."/".$membreRecetteRow['image']?>" alt="image illustration" class="figure-img img-fluid" width="80px"></a></td>
                            <?php else : ?>
                              <td><a href="<?=base_url('recette/'.$membreRecetteRow['id'])?>"><img src="<?=base_url('assets/images/hero_plat.png')?>" alt="image illustration" class="figure-img img-fluid" width="80px"></a></td>
                            <?php endif; ?> 
                            <td>
                              <a href="" class="btn btn-primary btn-sm opacity-75"><i class="bi-pencil fs-3" style="color: white"></i></a>
                              <a href="" class="btn btn-danger btn-sm opacity-75"><i class="bi-trash3 fs-3" style="color: white
                              "></i></a>
                            </td>
                          </tr>
                          <?php endforeach;?>
                        </tbody>
                        </table>
                          
                          <!-- fin de la condition pour tester le nombre d'élémemts du tableau. Ici on est dans le cas il n'y a pas de recette. Donc le tableau ne s'affiche pas. -->
                        <?php else: ?>
                          <div class="row">
                            <div class="col-4">
                              <img src="<?=base_url('assets/images/recipe.png')?>" alt="recette illustration" width="40%" class="ms-5">
                            </div>
                            <div class="col-8 align-self-center">
                            <h5 class=""> Vous n'avez pas encore posté de Gloutonneries</h5>                        
                            </div>
                          </div>
                        <?php endif; ?>
                </div>
              </div>

              <!-- div pour l'affichage des commentaires -->

              <div class="tab-pane fade" id="commentaire-tab-pane" role="tabpanel" aria-labelledby="commentaire-tab" tabindex="0">

                <div class="card-body">
                <h5 class="card-title my-3">Liste de mes commentaires</h5>

                  <!-- debut de la condition pour  savoir si le tableau comporte un élément ou pas
                  si il possède 1 commentaire, on l'affiche le tableau-->
                  <?php if(count($commentMembres) > 0):?>
                    
                    <table class="table table-striped">
                      <thead>
                          <tr>
                            <th scope="col"></th>
                            <th scope="col">Date</th>
                            <th scope="col">message</th>
                            <th scope="col">voir recette</th>
                            <th scope="col">Action</th>
                          </tr>
                      </thead>
                      <tbody>
                      <!-- $key est l'index du tableau. on l'utilise pour afficher le nbre de lignes dans le th  
                      boucle foreach pour afficher les recettes-->
                      <?php foreach ($commentMembres as $key=>$commentMembreRow) :?>
                      <tr>
                      <th scope="row"><?= $key +1 ?></th>
                      <td><?= date('d/m/Y \à H:i', strtotime($commentMembreRow['date_commentaire']))?></td>
                      <td><?= $commentMembreRow['contenu']?></td>

                        <!-- condition pour mettre l'image par défaut si besoin -->
                      <?php if($commentMembreRow["image"] != NULL): ?>
                        <td><a href="<?= base_url('recette/'.$commentMembreRow['recette_id'])?>"><img src="<?= base_url('uploads')."/".$commentMembreRow['image']?>" alt="image illustration" class="figure-img img-fluid" width="80px"></a></td>
                          <?php else : ?>
                            <td><a href="<?php echo base_url('recette/'.$commentMembreRow['recette_id'])?>"><img src="<?= base_url('assets/images/hero_plat.png')?>" alt="image illustration" class="figure-img img-fluid" width="80px"></a></td>
                          <?php endif; ?>
                      <td>
                        <a href="" class="btn btn-primary btn-sm opacity-75"><i class="bi-pencil fs-3" style="color: white
                        "></i></a>
                        <a href="" class="btn btn-danger btn-sm opacity-75"><i class="bi-trash3 fs-3" style="color: white
                        "></i></a>
                      </td>
                      </tr>
                      <?php endforeach;?>
                    </tbody>
                    </table>
                      
                      <!-- fin de la condition pour tester le nombre d'élémemts du tableau. Ici on est dans le cas il n'y a pas de recette. Donc le tableau ne s'affiche pas. -->
                    <?php else: ?>
                      <div class="row">
                        <div class="col-4">
                          <img src="<?=base_url('assets/images/speak.png')?>" alt="commentaire illustration" width="40%" class="ms-5">
                        </div>
                        <div class="col-8 align-self-center">
                        <h5 class=""> Vous n'avez pas encore posté de commentaire</h5>                        
                        </div>
                      </div>
                    <?php endif; ?>
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- declaration des variables de qui sont affichées lors des règles de validation. On utilise ces variables ensuite dans le fichier js. Au niveau de la condition du if-->
<script>
  const erreurObjet = "<?php echo($erreurObjet)?>";
  const erreurContenu = "<?php echo($erreurContenu)?>";
  const erreurAvatar = "<?php echo($erreurAvatar )?>";
</script>
<script src="<?=base_url('assets/js/avatar.js')?>"></script>
<script src="<?=base_url('assets/js/ongletPageCompte.js')?>"></script>

<?= $this->endSection() ?>
