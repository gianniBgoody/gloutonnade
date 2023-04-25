<?= $this->extend('layout/planAdmin') ?>

<?= $this->section('contenuAdmin') ?>

<?php
if (session()->getFlashdata('deleteMessageOk')){
  echo ("<div class='col-10 col-md-7 col-lg-5 my-3 mx-auto alert alert-success text-center' role='alert'><i class='bi-check-circle me-2 fs-5'></i>".session()->getFlashdata('deleteMessageOk')."</div>");
}
 ?>   

<div class="container-fluid my-3">
    <div class="row">
      <div class="my-3 mx-auto">
        <div class="card">
          <div class="card-header">
            <h4 class="text-center mb-4"><?= $title ?></h4>
            <ul class="nav nav-tabs" id="myTab" role="tablist">
              <li class="nav-item" role="presentation">
                <button class="nav-link active" id="allMessage-tab" data-bs-toggle="tab" data-bs-target="#allMessage-tab-pane" type="button" role="tab" aria-controls="allMessage-tab-pane" aria-selected="true">Tous les messages</button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="membreMessage-tab" data-bs-toggle="tab" data-bs-target="#membreMessage-tab-pane" type="button" role="tab" aria-controls="membreMessage-tab-pane" aria-selected="false">Messages membres</button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="autreMessage-tab" data-bs-toggle="tab" data-bs-target="#autreMessage-tab-pane" type="button" role="tab" aria-controls="autreMessage-tab-pane" aria-selected="false">Messages visiteurs</button>
              </li>
            </ul>

            <div class="tab-content" id="myTabContent">

              <div class="tab-pane fade show active"  id="allMessage-tab-pane"role="tabpanel" aria-labelledby="allMessage-tab" tabindex="0">

                <div class="card-body">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col"></th>
                        <th scope="col">date</th>
                        <th scope="col">objet</th>
                        <th scope="col">contenu</th>                       
                        <th scope="col">nom</th>
                        <th scope="col">prenom</th>
                        <th scope="col">email</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                      <tbody>
                      <!-- $key est l'index du tableau. on l'utilise pour afficher le nbre de lignes dans le th  
                      boucle foreach pour afficher les messages-->
                      <?php foreach ($allMessages as $key=>$allMessageRow) :?>
                      <tr>
                        <th scope="row"><?= $key +1 ?></th>
                        <td><?= date('d/m/Y \à H:i', strtotime($allMessageRow['date_contact']))?></td>
                        <td><?php
                          if($allMessageRow['objet_contact']== 1){
                              echo 'information générales';
                            }elseif($allMessageRow['objet_contact']== 2){
                              echo 'inscription News Letter';
                            }elseif($allMessageRow['objet_contact']== 3){
                              echo 'autre';
                            }elseif($allMessageRow['objet_contact']== 4){
                              echo 'à propos du statut';
                            }elseif($allMessageRow['objet_contact']== 5){
                              echo 'à propos des recettes';
                            }else
                              echo 'à propos des commentaires';
                            ?>
                        </td>
                        <td><?= $allMessageRow['contenu_contact']?></td>
                        <td><?= $allMessageRow['nom_contact']?></td>
                        <td><?= $allMessageRow['prenom_contact']?></td>
                        <td><?= $allMessageRow['email_contact']?></td>
                        <td>
                          <button type="button" class="btn btn-danger btn-sm opacity-75 boutonModal"  value ="<?= $allMessageRow['id']?>" data-bs-toggle="modal" data-bs-target="#deleteMessageAll"><i class="bi-trash3 fs-4" style="color: white"></i></button>
                        </td>
                      </tr>
                      <?php endforeach;?>
                    </tbody>
                    </table>
                </div>
                  <!-- Modal -->
                  <div class="modal fade" id="deleteMessageAll" tabindex="-1" aria-labelledby="deleteMessageAll" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title fs-5" id="deleteMessageAll">Supprimer ce Message?</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body text-center">
                          <a id="boutonSupprimerMessageAll" href="" class="btn btn-danger btn-sm opacity-75">Supprimer</a>
                          <button type="button" class="btn btn-secondary btn-sm " data-bs-dismiss="modal">Annuler</button>
                        </div>
                      </div>
                    </div>
                  </div>
              </div>

                <div class="tab-pane fade" id="membreMessage-tab-pane" role="tabpanel" aria-labelledby="membreMessage-tab" tabindex="0">
                  <div class="card-body">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th scope="col"></th>
                          <th scope="col">date</th>
                          <th scope="col">contenu</th>
                          <th scope="col">objet</th>
                          <th scope="col">pseudo</th>
                          <th scope="col">membre Id</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                        <tbody>
                        <?php foreach ($messageMembres as $key=>$messageMembreRow) :?>
                        <tr>
                          <th scope="row"><?= $key +1 ?></th>
                          <td><?= date('d/m/Y \à H:i', strtotime($messageMembreRow['date_contact']))?></td>
                          <td><?= $messageMembreRow['contenu_contact']?></td>
                          <td><?php
                            if($messageMembreRow['objet_contact']== 1){
                                echo 'information générales';
                            }elseif($messageMembreRow['objet_contact']== 2){
                                echo 'inscription News Letter';
                            }elseif($messageMembreRow['objet_contact']== 3){
                              echo 'autre';
                              }elseif($messageMembreRow['objet_contact']== 4){
                                echo 'à propos du statut';
                              }elseif($messageMembreRow['objet_contact']== 5){
                                echo 'à propos des recettes';
                              }else
                                echo 'à propos des commentaires';
                              ?>
                          </td>
                          <td><?= $messageMembreRow['pseudo']?></td>
                          <td><?= $messageMembreRow['membre_id']?></td>
                          <td>
                            <button type="button" class="btn btn-danger btn-sm opacity-75 boutonModal"  value ="<?= $messageMembreRow['idcontact']?>" data-bs-toggle="modal" data-bs-target="#deleteMessageMembre"><i class="bi-trash3 fs-4" style="color: white"></i></button>
                          </td>
                        </tr>
                        <?php endforeach;?>
                      </tbody>
                    </table>
                  </div>
                    <!-- Modal -->
                    <div class="modal fade" id="deleteMessageMembre" tabindex="-1" aria-labelledby="deleteMessageMembre" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title fs-5" id="deleteMessageMembre">Supprimer ce Message?</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body text-center">
                          <a id="boutonSupprimerMessageMembre" href="" class="btn btn-danger btn-sm opacity-75">Supprimer</a>
                          <button type="button" class="btn btn-secondary btn-sm " data-bs-dismiss="modal">Annuler</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="tab-pane fade" id="autreMessage-tab-pane" role="tabpanel" aria-labelledby="autreMessage-tab" tabindex="0">
           
                  <div class="card-body">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th scope="col"></th>
                          <th scope="col">date</th>
                          <th scope="col">objet</th>
                          <th scope="col">contenu</th>                       
                          <th scope="col">nom</th>
                          <th scope="col">prenom</th>
                          <th scope="col">email</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                        <tbody>
                         <!-- condition pour afficher uniquement les messages des visiteurs. avec membre_id = NULL. La condition doit être inclus dans la boucle -->
                          <?php foreach ($allMessages as $key=>$allMessageRow) :?>
                            <?php if($allMessageRow['membre_id'] == NULL) :?>
                            <tr>
                              <th scope="row"><?= $key +1 ?></th>
                              <td><?= date('d/m/Y \à H:i', strtotime($allMessageRow['date_contact']))?></td>
                              <td><?php
                                if($allMessageRow['objet_contact']== 1){
                                    echo 'information générales';
                                  }elseif($allMessageRow['objet_contact']== 2){
                                    echo 'inscription News Letter';
                                  }elseif($allMessageRow['objet_contact']== 3){
                                    echo 'autre';
                                  }elseif($allMessageRow['objet_contact']== 4){
                                    echo 'à propos du statut';
                                  }elseif($allMessageRow['objet_contact']== 5){
                                    echo 'à propos des recettes';
                                  }else{
                                    echo 'à propos des commentaires';
                                  }
                                  ?>
                              </td>
                              <td><?= $allMessageRow['contenu_contact']?></td>
                              <td><?= $allMessageRow['nom_contact']?></td>
                              <td><?= $allMessageRow['prenom_contact']?></td>
                              <td><?= $allMessageRow['email_contact']?></td>
                              <td>
                                <button type="button" class="btn btn-danger btn-sm opacity-75 boutonModal"  value ="<?= $allMessageRow['id']?>" data-bs-toggle="modal" data-bs-target="#deleteMessageVisiteur"><i class="bi-trash3 fs-4" style="color: white"></i></button>
                              </td>
                            </tr>                            
                            <?php endif;?>
                            <?php endforeach;?>
                      </tbody>
                    </table>
                  </div>
                    <!-- Modal -->
                    <div class="modal fade" id="deleteMessageVisiteur" tabindex="-1" aria-labelledby="deleteMessageVisiteur" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title fs-5" id="deleteMessageVisiteur">Supprimer ce Message?</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body text-center">
                          <a id="boutonSupprimerMessageVisiteur" href="" class="btn btn-danger btn-sm opacity-75">Supprimer</a>
                          <button type="button" class="btn btn-secondary btn-sm " data-bs-dismiss="modal">Annuler</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
          </div>
      </div>
    </div>
  </div>
</div>

<script src="<?=base_url('assets/js/deleteModal.js')?>"></script>
<?= $this->endSection() ?>
