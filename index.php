<?php require_once("controller/visitor.php");
$_SESSION["project_portal_wisata_kafe"]["name_page"] = "";
require_once("templates/top.php"); ?>

<main id="content" class="site-main">

  <section class="home-slider-section">
    <div class="home-slider">
      <div class="home-banner-items">
        <div class="banner-inner-wrap" style="background-image: url(assets/img/banner-1.jpg);"></div>
        <div class="banner-content-wrap">
          <div class="container">
            <div class="banner-content text-center">
              <h2 class="banner-title">TEMUKAN KAFE TERBAIK DI KUPANG</h2>
              <p>Selamat datang di <?= $data_utilities['name_web']?>, panduan lengkap Anda untuk menjelajahi
                tempat-tempat kafe terbaik di kupang. Kami menghubungkan Anda dengan pengalaman kafe yang unik, penuh
                rasa, dan tak terlupakan.</p>
            </div>
          </div>
        </div>
        <div class="overlay"></div>
      </div>
      <div class="home-banner-items">
        <div class="banner-inner-wrap" style="background-image: url(assets/img/banner-2.jpg);"></div>
        <div class="banner-content-wrap">
          <div class="container">
            <div class="banner-content text-center">
              <h2 class="banner-title">JELAJAHI BERBAGAI KAFE UNIK</h2>
              <p>Mulai dari sudut-sudut tersembunyi yang tenang hingga tempat hits dengan suasana modern, kami
                menghadirkan beragam pilihan kafe yang bisa Anda kunjungi. Setiap kafe memiliki karakteristik dan cita
                rasa tersendiri yang layak untuk dijelajahi.</p>
            </div>
          </div>
        </div>
        <div class="overlay"></div>
      </div>
    </div>
  </section>

  <div class="trip-search-section shape-search-section"></div>

  <section class="destination-section">
    <div class="container">
      <div class="section-heading">
        <div class="row align-items-end">
          <div class="col-lg-7">
            <h5 class="dash-style">TUJUAN POPULER</h5>
            <h2>KAFE TERBAIK</h2>
          </div>
          <div class="col-lg-5">
            <div class="section-disc">
              Tempat sempurna untuk bersantai, bekerja, atau berkumpul. Nikmati pengalaman yang memikat di setiap
              kunjungan. Menawarkan cita rasa makanan dan minuman yang luar biasa, suasana nyaman, dan layanan ramah.
            </div>
          </div>
        </div>
      </div>
      <div class="destination-inner destination-three-column">
        <div class="row">
          <div class="col-lg-7">
            <div class="row">
              <?php foreach($view_tempat_kafe_one as $data_kafe_one){
                $cafe_img1 = "SELECT nama_file FROM galeri WHERE id_tempat='$data_kafe_one[id_tempat]'";
                $view_cafe_img1 = mysqli_query($conn, $cafe_img1);
                $data_cafe_img1 = mysqli_fetch_assoc($view_cafe_img1);
                ?>
              <div class="col-sm-6">
                <div class="desti-item overlay-desti-item">
                  <figure class="desti-image">
                    <img src="assets/img/galeri/<?= $data_cafe_img1['nama_file']?>"
                      style="height: 530px; object-fit: cover;" alt="">
                  </figure>
                  <div class="desti-content">
                    <h3>
                      <a href="tempat-kafe?p=<?= $data_kafe_one['id_tempat']?>"><?= $data_kafe_one['nama_tempat']?></a>
                    </h3>
                  </div>
                </div>
              </div>
              <?php }?>
            </div>
          </div>
          <div class="col-lg-5">
            <div class="row">
              <?php foreach($view_tempat_kafe_two as $data_kafe_two){
                $cafe_img2 = "SELECT nama_file FROM galeri WHERE id_tempat='$data_kafe_two[id_tempat]'";
                $view_cafe_img2 = mysqli_query($conn, $cafe_img2);
                $data_cafe_img2 = mysqli_fetch_assoc($view_cafe_img2);
                ?>
              <div class="col-md-6 col-xl-12">
                <div class="desti-item overlay-desti-item">
                  <figure class="desti-image">
                    <img src="assets/img/galeri/<?= $data_cafe_img2['nama_file']?>"
                      style="width: 100%; height: 250px; object-fit: cover;" alt="">
                  </figure>
                  <div class="desti-content">
                    <h3>
                      <a href="tempat-kafe?p=<?= $data_kafe_two['id_tempat']?>"><?= $data_kafe_two['nama_tempat']?></a>
                    </h3>
                  </div>
                </div>
              </div>
              <?php }?>
            </div>
          </div>
        </div>
        <div class="btn-wrap text-center">
          <a href="tempat-kafe" class="button-primary">Lihat Lainnya</a>
        </div>
      </div>
    </div>
  </section>

  <section class="best-section">
    <div class="container">
      <div class="row">
        <div class="col-lg-5">
          <div class="section-heading">
            <h5 class="dash-style">GALERI WISATA KAFE</h5>
            <h2>MOMEN BERSAMA PELANGGAN SETIA DI KAFE FAVORIT</h2>
            <p>Nikmati deretan foto kebersamaan di kafe favorit, menampilkan pelanggan setia yang menciptakan kenangan
              tak terlupakan. Suasana hangat dan akrab membuat setiap kunjungan menjadi lebih istimewa.</p>
          </div>
          <?php foreach($view_galeri_one as $data_galeri_one):?>
          <figure class="gallery-img">
            <img src="assets/img/galeri/<?= $data_galeri_one['nama_file']?>" style="height: 275px; object-fit: cover;"
              alt="">
          </figure>
          <?php endforeach; ?>
        </div>
        <div class="col-lg-7">
          <div class="row">
            <?php foreach($view_galeri_two as $data_galeri_two):?>
            <div class="col-sm-6">
              <figure class="gallery-img">
                <img src="assets/img/galeri/<?= $data_galeri_two['nama_file']?>"
                  style="width: 100%; height: 250px; object-fit: cover;" alt="">
              </figure>
            </div>
            <?php endforeach; ?>
          </div>
          <div class="row">
            <?php foreach($view_galeri_three as $data_galeri_three):?>
            <div class="col-12">
              <figure class="gallery-img">
                <img src="assets/img/galeri/<?= $data_galeri_three['nama_file']?>"
                  style="width: 100%; height: 345px; object-fit: cover;" alt="">
              </figure>
            </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </div>
  </section>

</main>

<?php require_once("templates/bottom.php"); ?>