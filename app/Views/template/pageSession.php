<?= $this->extend('layout/planSession') ?>

<?= $this->section('contenuSession') ?>


<div class="container-fluid mb-3 px-5" style="background-color: #FEFAE0;">
  <div class="mb-4">
    <h3 class="text-center "><?= $title ?></h3>
  </div>

    <?php
      if (session()->getFlashdata('messageRecetteOk')){

        echo ("<div class='col-10 col-md-7 col-lg-5 my-3 mx-auto alert alert-success text-center' role='alert'><i class='bi-check-circle me-2 fs-5'></i>".session()->getFlashdata('messageRecetteOk')."</div>");
      }
    ?>

  <div class="row g-3">
    <?php foreach($cardData as $card) : ?>
      <div class="col-12 col-md-6 col-lg-4 my-3">
        <a href="<?= base_url('recette/'.$card["id"])?>">
          <div class="card h-100">

          <?php if($card["image"]!= NULL): ?>
            <img src="<?= base_url('uploads/'.$card["image"])?>" class="card-img-top ratio" alt="image cuisine"></a>
          <?php else : ?>
            <img src="<?= base_url('assets/images/hero_plat.png')?>" class="card-img-top ratio" alt="image cuisine"></a>
          <?php endif; ?>


          <div class="card-body">
            <h5 class="card-title"><?= $card["titre"] ?></h5>
          </div>
        </div>
      </div>
    <?php endforeach ?>
  </div>
</div>

<?= $this->endSection() ?>
