<?= $this->extend('layout/planAdmin') ?>

<?= $this->section('contenuAdmin') ?>

<?php
if (session()->getFlashdata('messageCategorieOk')){
  echo ("<div class='col-10 col-md-7 col-lg-5 my-3 mx-auto alert alert-success text-center' role='alert'><i class='bi-check-circle me-2 fs-5'></i>".session()->getFlashdata('messageCategorieOk')."</div>");

  }elseif(session()->getFlashdata('messageSousCategorieOk')){
    echo ("<div class='col-10 col-md-7 col-lg-5 my-3 mx-auto alert alert-success text-center' role='alert'><i class='bi-check-circle me-2 fs-5'></i>".session()->getFlashdata('messageSousCategorieOk')."</div>");

  }elseif(session()->getFlashdata('messageTagOk')){
    echo ("<div class='col-10 col-md-7 col-lg-5 my-3 mx-auto alert alert-success text-center' role='alert'><i class='bi-check-circle me-2 fs-5'></i>".session()->getFlashdata('messageTagOk')."</div>");
  }elseif(session()->getFlashdata('messageUpdateCategorieOk')){
    echo ("<div class='col-10 col-md-7 col-lg-5 my-3 mx-auto alert alert-success text-center' role='alert'><i class='bi-check-circle me-2 fs-5'></i>".session()->getFlashdata('messageUpdateCategorieOk')."</div>");
  }elseif(session()->getFlashdata('messageUpdateSouscatOk')){
    echo ("<div class='col-10 col-md-7 col-lg-5 my-3 mx-auto alert alert-success text-center' role='alert'><i class='bi-check-circle me-2 fs-5'></i>".session()->getFlashdata('messageUpdateSouscatOk')."</div>");
  }elseif(session()->getFlashdata('messageUpdateTagOk')){
    echo ("<div class='col-10 col-md-7 col-lg-5 my-3 mx-auto alert alert-success text-center' role='alert'><i class='bi-check-circle me-2 fs-5'></i>".session()->getFlashdata('messageUpdateTagOk')."</div>");
  }elseif(session()->getFlashdata('deleteCatOk')){
    echo ("<div class='col-10 col-md-7 col-lg-5 my-3 mx-auto alert alert-success text-center' role='alert'><i class='bi-check-circle me-2 fs-5'></i>".session()->getFlashdata('deleteCatOk')."</div>");
  }elseif(session()->getFlashdata('deleteSouscatOk')){
    echo ("<div class='col-10 col-md-7 col-lg-5 my-3 mx-auto alert alert-success text-center' role='alert'><i class='bi-check-circle me-2 fs-5'></i>".session()->getFlashdata('deleteSouscatOk')."</div>");
  }elseif(session()->getFlashdata('deleteTagOk')){
    echo ("<div class='col-10 col-md-7 col-lg-5 my-3 mx-auto alert alert-success text-center' role='alert'><i class='bi-check-circle me-2 fs-5'></i>".session()->getFlashdata('deleteTagOk')."</div>");
  }
?>

<div class="container-fluid my-3">
    <div class="row">
      <div class="my-3 mx-auto">
        <div class="card">
          <div class="card-header">
            <h4 class="text-center"><?= $title ?></h4>
              <div class="col-10 col-md-8 d-flex justify-content-evenly mx-auto my-4">
                <div class="d-inline-flex p-2 ">
                  <a href="<?= base_url('adminAjoutCat')?>"><button type="button" class="btn btn-outline-success opacity-75">Ajouter une catégorie</button></a>
                </div>
                <div class="d-inline-flex p-2">
                <a href="<?= base_url('adminAjoutSouscat')?>"><button type="button" class="btn btn-outline-success opacity-75">Ajouter une sous-catégorie</button></a>
                </div>
                <div class="d-inline-flex p-2">
                <a href="<?= base_url('adminAjoutTag')?>"><button type="button" class="btn btn-outline-success opacity-75">Ajouter un tag</button></a>
               </div>
              </div>
            <ul class="nav nav-tabs" id="myTab" role="tablist">
              <li class="nav-item" role="presentation">
                <button class="nav-link active" id="categorie-tab" data-bs-toggle="tab" data-bs-target="#categorie-tab-pane" type="button" role="tab" aria-controls="categorie-tab-pane" aria-selected="true">Catégories</button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="sousCat-tab" data-bs-toggle="tab" data-bs-target="#sousCat-tab-pane" type="button" role="tab" aria-controls="sousCat-tab-pane" aria-selected="false">Sous-catégories</button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="tag-tab" data-bs-toggle="tab" data-bs-target="#tag-tab-pane" type="button" role="tab" aria-controls="tag-tab-pane" aria-selected="false">Tags</button>
              </li>
            </ul>

            <div class="tab-content" id="myTabContent">

              <div class="tab-pane fade show active"  id="categorie-tab-pane"role="tabpanel" aria-labelledby="categorie-tab" tabindex="0">
                <div class="card-body">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col"></th>
                        <th scope="col">nom</th>
                        <th scope="col">id</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                      <tbody>
                      <?php foreach ($catAdmins as $key=>$catAdmin) :?>
                      <tr>
                        <th scope="row"><?= $key +1 ?></th>
                        <td><?= $catAdmin['nom_categorie']?></td>
                        <td><?= $catAdmin['id']?></td>
                        <td>
                          <a href="<?= base_url('adminDatabaseCat/'.$catAdmin['id']) ?>" class="btn btn-primary btn-sm opacity-75"><i class="bi-pencil fs-4" style="color: white"></i></a>
                          <button type="button" class="btn btn-danger btn-sm opacity-75 boutonModal"  value ="<?= $catAdmin['id']?>" data-bs-toggle="modal" data-bs-target="#deleteCategorie"><i class="bi-trash3 fs-4" style="color: white"></i></button>
                        </td>
                      </tr>
                      <?php endforeach;?>
                    </tbody>
                    </table>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="deleteCategorie" tabindex="-1" aria-labelledby="deleteCategorie" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title fs-5" id="deleteCategorie">Supprimer cette catégorie?</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body text-center">
                        <a id="boutonSupprimerCategorie" href="" class="btn btn-danger btn-sm opacity-75">Supprimer</a>
                        <button type="button" class="btn btn-secondary btn-sm " data-bs-dismiss="modal">Annuler</button>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
            
              <div class="tab-pane fade" id="sousCat-tab-pane" role="tabpanel" aria-labelledby="sousCat-tab" tabindex="0">
                <div class="card-body">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col"></th>
                        <th scope="col">nom</th>
                        <th scope="col">catégorie associée</th>
                        <th scope="col">id</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                      <tbody>
                      <?php foreach ($sousCatAdmins as $key=>$sousCatAdmin) :?>
                      <tr>
                        <th scope="row"><?= $key +1 ?></th>
                        <td><?= $sousCatAdmin['nom_souscat']?></td>
                        <td><?= $sousCatAdmin['nom_categorie']?></td>
                        <td><?= $sousCatAdmin['id']?></td>
                        <td>
                          <a href="<?= base_url('adminDatabaseSouscat/'.$sousCatAdmin['id']) ?>" class="btn btn-primary btn-sm opacity-75"><i class="bi-pencil fs-4" style="color: white"></i></a>
                          <button type="button" class="btn btn-danger btn-sm opacity-75 boutonModal"  value ="<?= $sousCatAdmin['id']?>" data-bs-toggle="modal" data-bs-target="#deleteSouscat"><i class="bi-trash3 fs-4" style="color: white"></i></button>
                        </td>
                      </tr>
                      <?php endforeach;?>
                    </tbody>
                    </table>
                  </div>
                  <!-- Modal -->
                  <div class="modal fade" id="deleteSouscat" tabindex="-1" aria-labelledby="deleteSouscat" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title fs-5" id="deleteCategorie">Supprimer cette sous- catégorie?</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body text-center">
                          <a id="boutonSupprimerSousCat" href="" class="btn btn-danger btn-sm opacity-75">Supprimer</a>
                          <button type="button" class="btn btn-secondary btn-sm " data-bs-dismiss="modal">Annuler</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="tab-pane fade" id="tag-tab-pane" role="tabpanel" aria-labelledby="tag-tab" tabindex="0">
                  <div class="card-body">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col"></th>
                        <th scope="col">nom</th>
                        <th scope="col">pour Admin</th>
                        <th scope="col">id</th>
                        <th scope="col">thématique</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                      <tbody>
                      <?php foreach ($tagAdmins as $key=>$tagAdmin) :?>
                      <tr>
                        <th scope="row"><?= $key +1 ?></th>
                        <td><?= $tagAdmin['nom_tag']?></td>
                        
                          <?php 
                            if ($tagAdmin['isAdmin'] ==1){
                              echo "<td class='text-danger'>oui</td>";
                            }else{
                              echo "<td class=''>non</td>";
                            }
                          ?>
                        <td><?= $tagAdmin['id']?></td>
                        <td>
                          <?php 
                              if($tagAdmin["parent_id"] == 1){
                                  echo "événement";
                              }elseif($tagAdmin["parent_id"] == 2){
                                  echo "ingrédient";
                                }elseif($tagAdmin["parent_id"] == 3){
                                  echo "divers";
                                }else{
                                  echo "";
                                }
                                 
                                
                              ?>
                        </td>
                        <td>
                          <a href="<?= base_url('adminDatabaseTag/'.$tagAdmin['id']) ?>" class="btn btn-primary btn-sm opacity-75"><i class="bi-pencil fs-4" style="color: white"></i></a>
                          <button type="button" class="btn btn-danger btn-sm opacity-75 boutonModal"  value ="<?= $tagAdmin['id']?>" data-bs-toggle="modal" data-bs-target="#deleteTag"><i class="bi-trash3 fs-4" style="color: white"></i></button>
                        </td>
                      </tr>
                      <?php endforeach;?>
                    </tbody>
                    </table>
                  </div>

                   <!-- Modal -->
                   <div class="modal fade" id="deleteTag" tabindex="-1" aria-labelledby="deleteTag" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title fs-5" id="deleteCategorie">Supprimer ce Tag?</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body text-center">
                          <a id="boutonSupprimerTag" href="" class="btn btn-danger btn-sm opacity-75">Supprimer</a>
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
  </div>
</div>

<script src="<?=base_url('assets/js/deleteModal.js')?>"></script>
<?= $this->endSection() ?>