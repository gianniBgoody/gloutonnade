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
            <li class="nav-item">
              <a class="nav-link mx-2" style="color: #542B20" href="#About">A propos</a>
            </li>
	          <li class="nav-item">
	            <a class="nav-link mx-2" style="color: #542B20" href="#Recette">Gloutonnerie</a>
	          </li>
            <li class="nav-item">
	            <a class="nav-link mx-2" style="color: #542B20" href="#Contact">Contact</a>
	          </li>
            <?php if(isset($_SESSION["membre"]["id"])): ?>
            <li class="nav-item">
	            <a class="nav-link mx-2" style="color: #542B20" href="<?= base_url('session')?>">Session</a>
	          </li>
            <?php endif;?>
	        </ul>

	        <ul class="navbar-nav ms-auto d-sm-inline-flex">
            
          <ul class="navbar-nav ms-auto d-sm-inline-flex">
          <li class="nav-item">
       	    <a href="<?=base_url('login')?>" type="button" class="av-link mx-2 btn btn-outline-success btn-rounded rounded-pill btn-sm opacity-75 fw-bold">
			      CONNEXION</a>
         </li>
	      </ul>
	    </div>
	  </div>
  </nav>
</header>


    <section>
      <?= $this->renderSection('contenuLanding') ?>
    </section> 



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


