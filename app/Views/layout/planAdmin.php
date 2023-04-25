<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?= $meta_title ?></title>
          <link rel="icon" type="image/x-icon" href="<?=base_url('assets/images/faviglout.svg')?>">

          <link href="<?=base_url('assets/css/bootstrap.min.css')?>" rel="stylesheet" type="text/css">
          <link href="<?=base_url('assets/css/main.css')?>" rel="stylesheet" type="text/css">

            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=B612:ital,wght@0,700;1,400&display=swap" rel="stylesheet">

            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    </head>

  <body>
    <header>

        <!-- navbar -->
        <nav class="navbar navbar-expand-lg navbar-light px-5 py-2" style="background-color: #FAECDC;">
            <div class="container-fluid">
                <a class="navbar-brand" style="color: #542B20" href="<?= base_url('/')?>">
                <img src="<?=base_url('assets/images/logo.svg')?>" id= "logo" alt="logo" width="70" class="d-inline-block align-text-center"></a>
                <ul class="navbar-nav">
                    <li class="nav-item fw-semibold" style="color: #542B20">
                        <span><h6 id="logo-text" class="">GLOUTONNADE</h6></span> 
                        <ul class="navbar-nav">
                        <li class="nav-item fw-light"><h6 class=""><small>l'adresse qui régale</small></h6></li>
                        </ul>
                    </li>
                </ul>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
        
                <div class=" collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav ms-auto">

                        <li class="nav-item dropdown">
                            <a class="nav-link mx-2 dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="true" style="color: #542B20">Recettes</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="<?= base_url('iode')?>">Iodées</a></li>
                                <li><a class="dropdown-item" href="<?= base_url('sucre')?>">Sucrées</a></li>
                                <li><a class="dropdown-item" href="<?= base_url('vegetarien')?>">Végétariennes</a></li>
                            </ul>
                        </li>
           
                        <li class="nav-item">
                            <a class="nav-link mx-2" style="color: #542B20" href="<?= base_url('saison')?>">C'est de saison</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-2" style="color: #542B20" href="<?= base_url('session')?>">Toutes les recettes</a>
                        </li>
                    </ul>

                    <ul class="navbar-nav ms-auto d-sm-inline-flex">
                    <span class="badge rounded-pill sessionSpan align-self-center "><?php echo session('membre.pseudo')?></span>
                        <li class="nav-item dropstart">
                            <!-- condition pour afficher avatar. si NULL, avatar par defaut -->
                            <?php if(session('membre.avatar')!= NULL): ?>
                                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">
                                 <img src="<?=base_url('avatar/'.session('membre.avatar'))?>"  alt="avatar" class="avatarNavbar d-inline-block" height="40"></a>              

                                <?php else : ?>
                                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">
                                    <img src="<?=base_url('assets/images/toque8.svg')?>" alt="avatar" class="avatarNavbar d-inline-block" height="40"></a>
                            <?php endif; ?>  

                            <!-- début partial de la liste déroulante du menu de Session-->

                            <?= $this->include('partial/navAdmin') ?>
                        
                            <!-- fin partial -->
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

     <!-- navbar admin latérale -->
    <div class="container-fluid mt-3" style="background-color: #F6F4EA;">
        <div class="row">
            <div class="col-sm-auto sticky-top" style="background-color: #E9EDC9;">
                <div class="d-flex flex-sm-column flex-row flex-nowrap align-items-center sticky-top">

                    <!-- debut icon -->
                    <div class="col-sm-auto sticky-top" style="background-color: #E9EDC9;">
                        <div class="d-flex flex-sm-column flex-row flex-nowrap align-items-center sticky-top">    
                            <ul class="nav nav-pills nav-flush flex-sm-column flex-row flex-nowrap mb-auto mx-auto text-center align-items-center mt-5">
                                <li class="nav-item">
                                    <a href="<?= base_url('session')?>" class="nav-link py-2 px-2 link-dark" title="Retour à l'accueil" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Accueil">
                                    <i class="bi-house fs-1"></i></a>
                                </li>
                                <li>
                                    <a href="<?= base_url('adminMembre')?>" class="nav-link link-dark py-2 px-2" title="Gestion des utilisateurs" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="membre">
                                    <i class="bi-person-gear fs-1"></i></a>
                                </li>
                                <li>
                                    <a href="<?= base_url('adminDatabase')?>" class="nav-link link-dark py-2 px-2" title="Gérer les catégories et les tags" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="base de donnée">
                                    <i class="bi-database-check fs-1"></i></a>
                                </li>
                                <li>
                                    <a href="<?=base_url('adminRecette')?>" class="nav-link link-dark py-2 px-2" title="Gestion des recettes" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="recette">
                                    <i class="bi-cup-hot fs-1"></i></a>
                                </li>
                                <li>
                                    <a href="<?= base_url('adminComment')?>" class="nav-link link-dark py-2 px-2" title="gestion des commentaires" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="commentaire">
                                    <i class="bi-chat-square-text fs-1"></i></a>
                                </li>
                                <li>
                                    <a href="<?= base_url('admin')?>" class="nav-link link-dark py-2 px-2" title="Courrier reçu" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="contact">
                                    <i class="bi-envelope-at fs-1"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm p-3 min-vh-100">
                <!-- contenu dynamique -->

                <section>
                <?= $this->renderSection('contenuAdmin') ?>
                </section> 

            </div>
        </div>
    </div>

    <!-- footer -->
    <div class="container-fluid px-5" style="background-color: #FAECDC;">
      <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
          <div class="col-md-4 d-flex align-items-center">
            <img src="<?=base_url('assets/images/logo.svg')?>" class="mb-3 me-2 mb-md-0 text-muted lh-1" id= "logo" alt="logo" width="50">
          <span class="mb-3 mb-md-0 text-muted">&copy; 2023 Gloutonnade</span>
          </div>

          <ul class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-dark list-unstyled">
              <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Mentions légales</a></li>
          </ul>

          <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
          <li class="ms-3"><a class="text-muted" href="#"><i class="bi bi-twitter fs-4"></i></a></li>
          <li class="ms-3"><a class="text-muted" href="#"><i class="bi bi-facebook fs-4"></i></a></li>
          <li class="ms-3"><a class="text-muted" href="#"><i class="bi bi-instagram fs-4"></i></a></li>
          </ul>
      </footer>
    </div>

    <script src="<?=base_url('assets/js/bootstrap.bundle.min.js')?>"></script>
    <script src="<?=base_url('assets/js/popper.min.js')?>"></script>
  </body>
</html>

