<?= $this->extend('layout/planAdmin') ?>

<?= $this->section('contenuAdmin') ?>

<?php
if (session()->getFlashdata('messageEditMembreOk')){
  echo ("<div class='col-10 col-md-7 col-lg-5 my-3 mx-auto alert alert-success text-center' role='alert'><i class='bi-check-circle me-2 fs-5'></i>".session()->getFlashdata('messageEditMembreOk')."</div>");
}
?>

<div class="container-fluid my-3">
    <div class="card">
        <h4 class="card-header text-center"><?= $title?></h4>
        <div class="card-body mt-3">

            <table class="table table-striped">
                <thead>
                    <tr>
                    <th scope="col"></th>
                    <th scope="col">pseudo</th>
                    <th scope="col">statut</th>
                    <th scope="col">id</th>
                    <th scope="col">avatar</th>
                    <th scope="col">nom</th>
                    <th scope="col">prénom</th>                   
                    <th scope="col">contribution</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($allMembres as $key=>$allMembre) :?>
                    <tr>
                    <th scope="row"><?php echo $key +1 ?></th>
                    <td><?= $allMembre['pseudo']?></td>
                    <td><?php
                        if($allMembre['statut_id'] == 2){
                            echo 'contributeur';
                            }elseif($allMembre['statut_id'] == 3){
                            echo 'lecteur';
                        }else{
                            echo 'administrateur';
                        }              
                        ?></td>
                    <td><?= $allMembre['id']?></td>
                    <td>
                        <?php if($allMembre["avatar"] != NULL): ?>
                            <img src="<?= base_url('avatar')."/".$allMembre['avatar']?>" alt="avatar" class="figure-img img-fluid" width="40px"></td>
                        <?php else : ?>
                        <?php endif; ?>

                    <td><?= $allMembre['nom_membre']?></td>
                    <td><?= $allMembre['prenom_membre']?></td>
                    <td><a href="<?= base_url('contribution/'.$allMembre['id'])?>"><img src="<?= base_url('assets/images/livre.png')?>" alt="image illustration" class="figure-img img-fluid" width="40px"></a></td>
                    <td>
                        <a href="<?= base_url('adminDatabaseMembre/'.$allMembre['id'])?>" class="btn btn-primary btn-sm opacity-75"><i class="bi-pencil fs-3" style="color: white"></i></a>
                        <a href="" class="btn btn-danger btn-sm opacity-75"><i class="bi-trash3 fs-3" style="color: white"></i></a>
                    </td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
            </table>

        </div>
    </div>
</div>

<?= $this->endSection() ?>