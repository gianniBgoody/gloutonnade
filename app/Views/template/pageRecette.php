<?= $this->extend('layout/planSession') ?>

<?= $this->section('contenuSession') ?>

<?php
 $erreurContenu = isset($validation)?$validation->getError('contenu'):'';
?>


<div class="container-fluid my-3" style="background-color: #E9EDC9;">
    <div class="mt-2">
        <h3 class="text-center"><?= $title ?></h3>
    </div>  

    <div class="row">
        <div class="col-12 col-md-10 my-3 mx-auto">
            <div class="card">
                <div class="card-header">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="recette-tab" data-bs-toggle="tab" data-bs-target="#recette-tab-pane" type="button" role="tab" aria-controls="recette-tab-pane" aria-selected="true">Recette</button>
                        </li>
                        <li class="nav-item" role="presentation">
                        <button class="nav-link" id="commentaire-tab" data-bs-toggle="tab" data-bs-target="#commentaire-tab-pane" type="button" role="tab" aria-controls="commentaire-tab-pane" aria-selected="false">
                            <!-- pour afficher le nombre de commentaires présents sur la page avec la fonction count -->
                            Commentaires (<?=count($comments)?>)
                        </button>
                        </li>
                    </ul>

                    <div class="tab-content" id="myTabContent">
                        <!-- début du code pour la recette -->
                        <div class="tab-pane fade show active"  id="recette-tab-pane"role="tabpanel" aria-labelledby="recette-tab" tabindex="0">

                            <div class="card-body">
                                <div class="row">
                                    <!-- partie gauche -->
                                    <div class="col-12 col-md-4" style="background-color: #FEFAE0;">
                                        <!-- titre recette -->
                                        <div class="card-title border-bottom border-success my-3">
                                            <h4 class="card-title"><?= $recetteData["titre"] ?></h4>
                                        </div>
                                        <!-- description recette -->
                                        <div class="card-decrit mb-5">
                                            <span class="">Proposée par <p class=" ms-2 badge rounded-pill sessionSpan" > <?= $recetteData["pseudo"] ?></p></span>   
                                        <p class="fst-italic"><?= $recetteData["description"] ?></p>
                                        </div>
                                        <!-- ingrédient -->
                                        <div class="mb-3">
                                            <div class="d-inline-flex p-2"> <h5 class="fiche-ingredient align-self-end me-2">Ingrédients</h5><img src="<?= base_url('assets/images/ingredients.png')?>" alt="ingredient illustration" class="figure-img img-fluid" style="width:40px;"></div>
                    
                                            <!-- insertion de la liste d'ingrédient en javascript -->
                                            <ul class="card-ingredient list-group list-group-flush" id="ingrListe">
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- partie droite -->
                                    <div class="col-12 col-md-8" style="background-color: #FEFAE0;">
                                        <!-- image -->
                                        <div class="mt-3">
                                            <?php if($recetteData["image"]!= NULL): ?>
                                                <img src="<?= base_url('uploads/'.$recetteData["image"])?>" alt="plat illustration" class="figure-img img-fluid ratio mx-auto rounded-2 border border-2 border-success" style="background-color: #FEFAE0;">
                                            <?php else : ?>
                                                <img src="<?= base_url('assets/images/hero_plat.png')?>" alt="plat illustration" class="figure-img img-fluid ratio mx-auto rounded-2 border border-2 border-success" style="background-color: #FEFAE0;">
                                            
                                            <?php endif; ?>    

                                        <!-- difficulté - durée - part -->
                                        <div class="d-flex justify-content-evenly text-center mb-3">
                                            <div class="col-5 col-md-4 col-lg-3 border-end border-success"><i class="bi bi-bar-chart me-2"></i>
                                            <!-- condition pour afficher la difficulté  -->
                                            <?php 
                                                if($recetteData["difficulte"]==1){
                                                echo "très facile";
                                                }
                                                elseif($recetteData["difficulte"]==2){
                                                    echo "facile";
                                                }else{
                                                    echo "moyenne";
                                                }
                                            ?>         
                                            </div>
                                            <div class="col-4 col-md-4 col-lg-2 border-end border-success"><i class="bi bi-alarm me-2"></i><?= $recetteData["duree"].' min.'?>
                                            </div>
                                            <div class="col-3 col-md-4 col-lg-2"><i class="bi bi-people me-2"></i><?= $recetteData["nbPart"].' pers.' ?>
                                            </div>
                                        </div>
                                    </div>                  
                                </div>
                                    <!-- les étapes -->
                                <div class="row my-3">
                                    <div class="card-etapes" style="background-color: #FAEDCD;" >
                                        <div class="d-inline-flex p-2"> <h5 class="me-2 align-self-end fiche-etape">Les étapes</h5><img src="<?= base_url('assets/images/ingredients2.png')?>" alt="ingredient illustration" class="figure-img img-fluid" style="width:50px;">
                                        </div>
                                            <!-- div pour afficher la liste des étapes en javascript -->
                                        <div class="mt-4" id="etapeListe">
                                        </div>
                                    </div>
                                </div>

                                <!-- les boutons de liens pour ajouter un commentaire -->

                                <!-- partie pour insérer les tags -->
                                <div class="col-12 col-md-10 lg-7 mx-auto">
                                    <?php foreach($tags as $tag): ?>
                                    <a class=" tagsFiche badge rounded-pill opacity-75  fs-6 fw-bold my-2 mx-3 " href="<?= base_url('tag/'.$tag['id'])?>" role="button"><?= $tag['nom_tag']; ?></a> 
                                    <?php endforeach; ?>
                                </div>  
                            </div>
                        </div>

                        <!-- fin code de la recette - debut code des commentaires -->
                    </div>
                    <div class="tab-pane fade" id="commentaire-tab-pane" role="tabpanel" aria-labelledby="commentaire-tab" tabindex="0">
                        <div class="card-body" style="background-color: #F6F4EA;">

                        <?php
                         if (session()->getFlashdata('commentaireEditOk')){

                            echo ("<div class='col-10 col-md-7 col-lg-5 my-3 mx-auto alert alert-success text-center' role='alert'><i class='bi-check-circle me-2 fs-5'></i>".session()->getFlashdata('commentaireEditOk')."</div>");

                            }else if(session()->getFlashdata('commentaireDeleteOk')){
                                echo ("<div class='col-10 col-md-7 col-lg-5 my-3 mx-auto alert alert-success text-center' role='alert'><i class='bi-check-circle me-2 fs-5'></i>".session()->getFlashdata('commentaireDeleteOk')."</div>");

                            }else if(session()->getFlashdata('messageCommentaireOk')){
                                echo ("<div class='col-10 col-md-7 col-lg-5 my-3 mx-auto alert alert-success text-center' role='alert'><i class='bi-check-circle me-2 fs-5'></i>".session()->getFlashdata('messageCommentaireOk')."</div>");
                            }
                        ?>

                            <div class="col-12 col-md-10 p-3 my-2 mx-auto" style="background-color: #F6F4EA;" >
                                <h5 class=" card-title text-center">Commentaires</h5>

                                <div class="row ">
                                    <div class="col-10 form-floating my-3">
                                    <?= form_open_multipart('recette/'.$recetteData['id']);?>
                                        <textarea class="form-control mb-2" placeholder="Votre commentaire ici" name="contenu"></textarea>
                                    </div>
                                    <div class="col-2 align-self-center">
                                        <button type="submit" class="btn btn-outline-success btn-sm">Envoyer</button>
                                    </div>
                                    <input name="membre_id" type="hidden" value=<?= session('membre')['id']?>>
                                    <input name="recette_id" type="hidden" value=<?= $recetteData['id']?>>

                                    <?= form_close();?>
                                    <span class="text-danger"><?= $erreurContenu ?></span>
                                </div>

                                <?php foreach($comments as $comment) : ?>
                                <div class="px-3 pt-3 pb-1 my-2 " style="background-color: #FEFAE0;">
                                    <div class="row">
                                        <div class="col-1">
                                            <!-- condition pour mettre l'avatar par defaut si utilisateur n'a pas d'avatar -->
                                        <?php if($comment["avatar"]!= NULL): ?>
                                            <img src="<?= base_url('avatar/'.$comment['avatar'])?>" class="commentAvatar" width="45" height="45" alt="avatar">        
                                        <?php else : ?>
                                                <img src="<?=base_url('assets/images/toque8.svg')?>" alt="avatar" class="commentAvatar" width="45" height="45">
                                            <?php endif; ?>                                           
                                        </div>
                                        <div class="col-11 mt-2">
                                            <span class="commentPseudo badge rounded-pill sessionSpan"><?= $comment["pseudo"] ?></span> 
                                            <!-- on peut retravailler le format de la date(d/m/Y, strtotime()) avec la fonction date et strtotime  si on veut rajouter du texte, il faut échapper la signification de chaque lettre avec \ devant-->
                                            <span class="commentDate text-muted ms-4"><?= date('d/m/Y \à H:i', strtotime($comment["date_commentaire"])); ?></span>
                                            <div class="row">
                                                <div class="commentContenu col-12 mt-3">
                                                    <p><?= $comment["contenu"] ?></p>
                                                </div>
                                            </div>
                                            <!-- condition pour afficher le lien de l'update du message uniquement si c'est le membre qui en est l'auteur -->
                                            <?php if($comment['membre_id'] == session('membre.id')): ?>
                                                <div class="row">
                                                    <div class="col-12 mt-3 border-top">
                                                    <a href=<?= base_url('commentaireRecette/'.$comment['id'])?> class="text-decoration-none"><span class="fw-light">modifier le message</span></a>
                                                    <span class="mx-2"></span>

                                                    <span type="button" class="fw-light text-danger boutonModal spanDelete" data-bs-toggle="modal" data-bs-target="#supprimeCommentaire" value ="<?= $comment['id']?>">supprimer le message</span>
                                                    </div>
                                                    <div class="modal fade" id="supprimeCommentaire" tabindex="-1" aria-labelledby="deleteComm" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title fs-5" id="supprimeCommentaire">Supprimer ce message?</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                        <a id="boutonSupprimeCommentaire" href="" class="btn btn-danger btn-sm opacity-75">Supprimer</a>
                                                        <button type="button" class="btn btn-secondary btn-sm " data-bs-dismiss="modal">Annuler</button>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    </div>

                                                    </div>
                                                <?php endif;?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script>
    // variable pour transformer le tableau en json afin de pouvoir récupérer les données en javascript
    const recette = <?php echo json_encode($recetteData) ?>;

    // code pour activer/desactiver les onglets de la page recette. pour que le active show active de bootstrap  se fasse en fonction du flashdata
    // on cree une variable que l'on passe a false. Puis dans la condition on la passe a true
    let flashdata = false;
    // dans la condition on met les 3 parametres des flashData avec operateur logique ou || car comme ca si l'un ou l'autre est a true alors on déclence l'action qui se trouve dans le js
    <?php if(session()->getFlashdata('commentaireDeleteOk') || session()->getFlashdata('commentaireEditOk') || session()->getFlashdata('messageCommentaireOk')) :?>
        flashdata = true;
    <?php endif; ?>

</script>

<!-- appel du fichier pour récuperer les données du tableau via json parse -->
<script src="<?= base_url('assets/js/recupRecette.js') ?>"></script> 

<!-- appel du fichier pour la modal de confirmation de suppression des commentaires -->
<script src="<?= base_url('assets/js/deleteModal.js') ?>"></script>

<!-- appel du fichier pour activer desactiver les onglets recette/commentaire -->
<script src="<?= base_url('assets/js/ongletPageRecette.js') ?>"></script>

<?= $this->endSection() ?>


