<div class="container-fluid my-3">
    <div class="row">
        <div class="col-12 col-md-10 my-3 mx-auto">
            <div class="card border border-0">
                <div class="card-header " style="background-color: #FAECDC;">
                    <!-- début du code pour la recette -->
                    <div class="card-body" style="background-color: #FAECDC;">
                        <div class="row">
                            <!-- partie gauche -->
                            <div class="col-12 col-md-4" style="background-color: #FEFAE0;">
                                <!-- titre recette -->
                                <div class="card-title border-bottom border-success my-3">
                                    <h4 class="card-title"><?= $cardAccueil["titre"] ?></h4>
                                </div>
                                <!-- description recette -->
                                <div class="card-decrit mb-5">
                                    <span class="">Proposée par <p class=" ms-2 badge rounded-pill sessionSpan" > <?= $cardAccueil["pseudo"] ?></p></span>   
                                <p class="fst-italic"><?= $cardAccueil["description"] ?></p>
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
                                    <img src="<?= base_url('uploads/'.$cardAccueil["image"])?>" alt="plat illustration" class="figure-img img-fluid ratio mx-auto rounded-2 border border-2 border-success" style="background-color: #FEFAE0;">
                                </div>
                                <!-- difficulté - durée - part -->
                                <div class="d-flex justify-content-evenly text-center mb-3">
                                    <div class="col-5 col-md-4 col-lg-3 border-end border-success"><i class="bi bi-bar-chart me-2"></i>
                                    <!-- condition pour afficher la difficulté  -->
                                    <?php 
                                        if($cardAccueil["difficulte"]==1){
                                        echo "très facile";
                                        }
                                        elseif($cardAccueil["difficulte"]==2){
                                            echo "facile";
                                        }else{
                                            echo "moyenne";
                                        }
                                    ?>         
                                    </div>
                                    <div class="col-4 col-md-4 col-lg-2 border-end border-success"><i class="bi bi-alarm me-2"></i><?= $cardAccueil["duree"].' min.'?>
                                    </div>
                                    <div class="col-3 col-md-4 col-lg-2"><i class="bi bi-people me-2"></i><?= $cardAccueil["nbPart"].' pers.' ?>
                                    </div>
                                </div>
                            </div>                  
                        </div>
                            <!-- les étapes -->
                        <div class="row">
                            <div class="card-etapes" style="background-color: #FEFAE0;" >
                                <div class="d-inline-flex p-2"> <h5 class="me-2 align-self-end fiche-etape">Les étapes</h5><img src="<?= base_url('assets/images/ingredients2.png')?>" alt="ingredient illustration" class="figure-img img-fluid" style="width:50px;">
                                </div>
                                    <!-- div pour afficher la liste des étapes en javascript -->
                                <div class="mt-4" id="etapeListe">
                                </div>
                            </div>
                        </div>
                    </div>
                   
                        <!-- fin code de la recette - debut code des commentaires -->
                    
                </div>
            </div>
        </div>
    </div>
</div>

<script>
  const recette = <?php echo json_encode($cardAccueil) ?>;
</script>

<script src="<?= base_url('assets/js/recupRecette.js') ?>"></script>