<?= $this->extend('layout/planAdmin') ?>

<?= $this->section('contenuAdmin') ?>

<div class="container-fluid my-3">
    <div class="row">
      <div class="my-3 mx-auto">
        <div class="card">
          <div class="card-header">
            <h4 class="text-center"><?= $title ."<span class ='text-decoration-underline'>". $membreIds["pseudo"]."</span>" ?></h4>
            <ul class="nav nav-tabs" id="myTab" role="tablist">
              <li class="nav-item" role="presentation">
                <button class="nav-link active" id="recette-tab" data-bs-toggle="tab" data-bs-target="#recette-tab-pane" type="button" role="tab" aria-controls="recette-tab-pane" aria-selected="true">Recettes</button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="commentaire-tab" data-bs-toggle="tab" data-bs-target="#commentaire-tab-pane" type="button" role="tab" aria-controls="commentaire-tab-pane" aria-selected="false">Commentaires</button>
              </li>
            </ul>

            <div class="tab-content" id="myTabContent">

              <div class="tab-pane fade show active"  id="recette-tab-pane"role="tabpanel" aria-labelledby="recette-tab" tabindex="0">

              <!-- début de la condition pour voir si il y a au moins un élément dans le  tableau. si il n'y a rien on affiche un message-->
                <?php if(count($contribRecettes) > 0):?>

                <table class="table table-striped">
                  <thead>
                      <tr>
                      <th scope="col"></th>
                      <th scope="col">nom</th>
                      <th scope="col">image</th>
                      <th scope="col">Action</th>
                      </tr>
                  </thead>
                  <tbody>
                      <?php foreach ($contribRecettes as $key=>$contribRecette) :?>
                      <tr>
                      <th scope="row"><?php echo $key +1 ?></th>
                      <td><?= $contribRecette['titre']?></td>
                      <td>
                        <?php if($contribRecette["image"] != NULL): ?>  
                          <a href="<?= base_url('recette/'.$contribRecette['id'])?>"><img src="<?= base_url('uploads'."/".$contribRecette['image'])?>" alt="image illustration" class="figure-img img-fluid" width="60px"></a></td>
                        <?php else : ?>
                          <a href="<?= base_url('recette/'.$contribRecette['id'])?>"><img src="<?= base_url('assets/images/hero_plat.png')?>" alt="image illustration" class="figure-img img-fluid" width="60px"></a></td>

                        <?php endif; ?>
                      <td>
                          <a href="" class="btn btn-primary btn-sm opacity-75"><i class="bi-pencil fs-3" style="color: white"></i></a>
                          <a href="" class="btn btn-danger btn-sm opacity-75"><i class="bi-trash3 fs-3" style="color: white"></i></a>
                      </td>
                      </tr>
                      <?php endforeach;?>
                  </tbody>
                </table>

                <?php else: ?>
                  <div class="row">
                    <div class="col-4 mt-5">
                      <img src="<?=base_url('assets/images/recipe.png')?>" alt="contribution illustration" width="30%" class="ms-5">
                    </div>
                    <div class="col-8 align-self-center">
                      <h5 class=""> Ce Glouton n'a pas encore posté de recette</h5>                        
                    </div>
                  </div>
                <?php endif; ?>
              </div>
              

              <div class="tab-pane fade" id="commentaire-tab-pane" role="tabpanel" aria-labelledby="commentaire-tab" tabindex="0">
                <div class="card-body">
                  <?php if(count($contribComments) > 0):?>

                    <table class="table table-striped">
                      <thead>
                          <tr>
                          <th scope="col"></th>
                          <th scope="col">date</th>
                          <th scope="col">contenu</th>
                          <th scope="col">recette</th>
                          <th scope="col">Action</th>
                          </tr>
                      </thead>
                      <tbody>
                          <?php foreach ($contribComments as $key=>$contribComment) :?>
                          <tr>
                          <th scope="row"><?php echo $key +1 ?></th>
                          <td><?= $contribComment['date_commentaire']?></td>
                          <td><?= $contribComment['contenu']?></td>

                          <td>
                            <?php if($contribComment["image"] != NULL): ?>  
                              <a href="<?= base_url('recette/'.$contribComment['recette_id'])?>"><img src="<?= base_url('uploads'."/".$contribComment['image'])?>" alt="image illustration" class="figure-img img-fluid" width="60px"></a></td>
                            <?php else : ?>
                              <a href="<?= base_url('recette/'.$contribComment['recette_id'])?>"><img src="<?= base_url('assets/images/hero_plat.png')?>" alt="image illustration" class="figure-img img-fluid" width="60px"></a></td>

                            <?php endif; ?>
                          <td>
                              <a href="" class="btn btn-primary btn-sm opacity-75"><i class="bi-pencil fs-3" style="color: white"></i></a>
                              <a href="" class="btn btn-danger btn-sm opacity-75"><i class="bi-trash3 fs-3" style="color: white"></i></a>
                          </td>
                          </tr>
                          <?php endforeach;?>
                      </tbody>
                    </table>

                    <?php else: ?>
                      <div class="row">
                        <div class="col-4 mt-5">
                          <img src="<?=base_url('assets/images/speak.png')?>" alt="contribution illustration" width="30%" class="ms-5">
                        </div>
                        <div class="col-8 align-self-center">
                          <h5 class=""> Ce Glouton n'a pas encore posté de commentaire</h5>                        
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
</div>

<?= $this->endSection() ?>