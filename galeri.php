<?php require_once("controller/visitor.php");
$_SESSION["project_portal_wisata_kafe"]["name_page"] = "Galeri";
require_once("templates/top.php"); ?>

<main id="content" class="site-main">

  <section class="inner-banner-wrap">
    <div class="inner-baner-container" style="background-image: url(assets/img/banner-3.jpeg);">
      <div class="container">
        <div class="inner-banner-content">
          <h1 class="inner-title">Galeri</h1>
        </div>
      </div>
    </div>
    <div class="inner-shape"></div>
  </section>

  <div class="gallery-section">
    <div class="container">
      <div class="gallery-outer-wrap">
        <div class="gallery-inner-wrap gallery-container grid">
          <?php foreach($view_galeri as $data): ?>
          <div class="single-gallery grid-item">
            <figure class="gallery-img">
              <img src="assets/img/galeri/<?= $data['nama_file']?>" alt="">
              <div class="gallery-title">
                <h3>
                  <a href="assets/img/galeri/<?= $data['nama_file']?>" data-lightbox="lightbox-set">
                    <?= $data['nama_tempat']?>
                  </a>
                </h3>
              </div>
            </figure>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>

</main>

<?php require_once("templates/bottom.php"); ?>