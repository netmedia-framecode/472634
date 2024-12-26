<?php require_once("controller/visitor.php");
$_SESSION["project_portal_wisata_kafe"]["name_page"] = "Tempat Kafe";
require_once("templates/top.php"); ?>

<main id="content" class="site-main">

  <section class="inner-banner-wrap">
    <div class="inner-baner-container" style="background-image: url(assets/img/banner-3.jpeg);">
      <div class="container">
        <div class="inner-banner-content">
          <h1 class="inner-title">Tempat Kafe</h1>
        </div>
      </div>
    </div>
    <div class="inner-shape"></div>
  </section>

  <?php if (!isset($_GET['p'])) { ?>
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
            <div class="col-md-12">
              <form action="" method="post">
                <div class="form-row">
                  <div class="col-md-4">
                    <input type="text" class="form-control" name="keyword" placeholder="Cari tempat kafe" required>
                  </div>
                  <div class="col-md-2">
                    <button type="submit" name="search_tempat_kafe" class="btn btn-primary" style="height: 49px;"><i class="bi bi-search"></i> Cari</button>
                  </div>
                </div>
              </form>
            </div>
            <div class="col-lg-7">
              <div class="row">
                <?php foreach ($view_tempat_kafe_one_all as $data_kafe_one) {
                  $cafe_img1 = "SELECT nama_file FROM galeri WHERE id_tempat='$data_kafe_one[id_tempat]'";
                  $view_cafe_img1 = mysqli_query($conn, $cafe_img1);
                  $data_cafe_img1 = mysqli_fetch_assoc($view_cafe_img1);
                ?>
                  <div class="col-sm-6">
                    <div class="desti-item overlay-desti-item">
                      <figure class="desti-image">
                        <img src="assets/img/galeri/<?= $data_cafe_img1['nama_file'] ?>"
                          style="height: 530px; object-fit: cover;" alt="">
                      </figure>
                      <div class="desti-content">
                        <h3>
                          <a href="tempat-kafe?p=<?= $data_kafe_one['id_tempat'] ?>"><?= $data_kafe_one['nama_tempat'] ?></a>
                        </h3>
                      </div>
                    </div>
                  </div>
                <?php } ?>
              </div>
            </div>
            <div class="col-lg-5">
              <div class="row">
                <?php foreach ($view_tempat_kafe_two_all as $data_kafe_two) {
                  $cafe_img2 = "SELECT nama_file FROM galeri WHERE id_tempat='$data_kafe_two[id_tempat]'";
                  $view_cafe_img2 = mysqli_query($conn, $cafe_img2);
                  $data_cafe_img2 = mysqli_fetch_assoc($view_cafe_img2);
                ?>
                  <div class="col-md-6 col-xl-12">
                    <div class="desti-item overlay-desti-item">
                      <figure class="desti-image">
                        <img src="assets/img/galeri/<?= $data_cafe_img2['nama_file'] ?>"
                          style="width: 100%; height: 250px; object-fit: cover;" alt="">
                      </figure>
                      <div class="desti-content">
                        <h3>
                          <a href="tempat-kafe?p=<?= $data_kafe_two['id_tempat'] ?>"><?= $data_kafe_two['nama_tempat'] ?></a>
                        </h3>
                      </div>
                    </div>
                  </div>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  <?php } else if (isset($_GET['p'])) {
    $id = valid($conn, $_GET['p']);
    $pull_data = "SELECT * FROM tempat_kafe WHERE id_tempat = '$id'";
    $store_data = mysqli_query($conn, $pull_data);
    $data_view = mysqli_fetch_assoc($store_data);

    $galeri_kafe = "SELECT nama_file FROM galeri WHERE id_tempat='$id'";
    $view_galeri_kafe = mysqli_query($conn, $galeri_kafe);
    $data_galeri_kafe = mysqli_fetch_assoc($view_galeri_kafe);
  ?>
    <div class="single-tour-section">
      <div class="container">
        <div class="row">
          <div class="col-lg-8">
            <div class="single-tour-inner">
              <h2><?= $data_view['nama_tempat'] ?></h2>
              <figure class="feature-image">
                <img src="assets/img/galeri/<?= $data_galeri_kafe['nama_file'] ?>" alt="<?= $data_galeri_kafe['nama_file'] ?>" style="width: 100%; height: 500px; object-fit: cover;">
                <div class="package-meta text-center">
                  <ul>
                    <li style="cursor: pointer;">
                      <?php
                      $data_lokasi = $data_view['peta_lokasi'];
                      list($latitude, $longitude) = explode('_', $data_lokasi);

                      $map_url = "https://www.google.com/maps/embed?pb=";
                      $map_url .= "!1m14!1m12!1m3!1d13209.155128571221!2d" . $longitude . "!3d" . $latitude;
                      $map_url .= "!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sid!2sid";
                      $map_url .= "!4m5!3m4!1s0x0:0x0!8m2!3d" . $latitude . "!4d" . $longitude;

                      $google_maps_url = "https://www.google.com/maps?q=" . $latitude . "," . $longitude;
                      ?>
                      <a
                        href="<?= $google_maps_url ?>"
                        target="_blank"
                        style="text-decoration: none; color: inherit;">
                        <i class="bi bi-geo-alt"></i>
                        <?= $data_view['nama_jalan'] ?>
                      </a>
                    </li>
                    <li>
                      <i class="bi bi-telephone"></i>
                      <?= $data_view['kontak'] ?>
                    </li>
                  </ul>
                </div>
              </figure>
              <div class="tab-container">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="menu-tab" data-toggle="tab" href="#menu" role="tab" aria-controls="menu" aria-selected="true">Menu</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="waktu-operasional-tab" data-toggle="tab" href="#waktu-operasional" role="tab" aria-controls="waktu-operasional" aria-selected="false">Waktu Operasional</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="lokasi-tab" data-toggle="tab" href="#lokasi" role="tab" aria-controls="lokasi" aria-selected="false">Lokasi</a>
                  </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                  <div class="tab-pane fade show active" id="menu" role="tabpanel" aria-labelledby="menu-tab">
                    <table class="table table-borderless table-sm mt-n3">
                      <tbody>
                        <?php $menu = "SELECT * FROM menu WHERE id_tempat = '$id'";
                        $view_menu = mysqli_query($conn, $menu);
                        foreach ($view_menu as $data): ?>
                          <tr>
                            <td><?= $data['nama_menu'] . " - Rp." . number_format($data['harga']) ?></td>
                          </tr>
                        <?php endforeach; ?>
                      </tbody>
                    </table>
                  </div>
                  <div class="tab-pane" id="waktu-operasional" role="tabpanel" aria-labelledby="waktu-operasional-tab">
                    <table class="table table-borderless table-sm mt-n3">
                      <tbody>
                        <?php $waktu_operasional = "SELECT * FROM waktu_operasional WHERE id_tempat = '$id'";
                        $view_waktu_operasional = mysqli_query($conn, $waktu_operasional);
                        foreach ($view_waktu_operasional as $data): ?>
                          <tr>
                            <td><?= $data['hari'] ?></td>
                            <td class="pl-0 pr-0">:</td>
                            <td><?= $data['jam_buka'] . " - " . $data['jam_tutup'] ?></td>
                          </tr>
                        <?php endforeach; ?>
                      </tbody>
                    </table>
                  </div>
                  <div class="tab-pane" id="lokasi" role="tabpanel" aria-labelledby="lokasi-tab">
                    <div class="map-area">
                      <iframe
                        src="https://www.google.com/maps?q=<?= $latitude ?>,<?= $longitude ?>&hl=es;z=14&output=embed"
                        height="450"
                        style="border:0;"
                        allowfullscreen="">
                      </iframe>
                    </div>
                  </div>
                </div>
              </div>
              <div class="single-tour-gallery">
                <h3>GALERI</h3>
                <div class="single-tour-slider">
                  <?php foreach ($view_galeri_kafe as $data_gk): ?>
                    <div class="single-tour-item">
                      <figure class="feature-image">
                        <img src="assets/img/galeri/<?= $data_gk['nama_file'] ?>" style="width: 100%; height: 350px; object-fit: cover;" alt="">
                      </figure>
                    </div>
                  <?php endforeach; ?>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="sidebar">
              <div class="widget-bg booking-form-wrap">
                <h4 class="bg-title">Pemesanan</h4>
                <form class="booking-form" method="post">
                  <input type="hidden" name="id_tempat" value="<?= $id ?>">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <select name="id_menu" id="id_menu" onchange="calculateTotal()">
                          <option value="" data-price="0">Pilih Menu</option>
                          <?php foreach ($view_menu as $data_menu) {
                            $selected = ($data_menu['id_tempat'] == $id) ? 'selected' : ''; ?>
                            <option value="<?= $data_menu['id_menu'] ?>" <?= $selected ?> data-price="<?= $data_menu['harga'] ?>">
                              <?= $data_menu['nama_menu'] . ' - Rp.' . number_format($data_menu['harga']) ?>
                            </option>
                          <?php } ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <input name="jumlah_menu" id="jumlah_menu" type="number" placeholder="Jumlah Pesanan" oninput="calculateTotal()">
                      </div>
                      <div class="form-group">
                        <input name="total_harga" id="total_harga" type="number" placeholder="Total Harga" readonly>
                      </div>
                      <hr>
                      <?php if (!isset($_SESSION["project_portal_wisata_kafe"]["users"])) { ?>
                        <p>Masukan akunmu disini:</p>
                        <div class="form-group">
                          <input type="text" name="username" class="form-control" id="username" placeholder="Username"
                            required>
                        </div>
                        <div class="form-group">
                          <input type="password" name="password" class="form-control" placeholder="Password" required>
                        </div>
                      <?php } else { ?>
                        <p>Data akun kamu:</p>
                        <input type="hidden" name="id_user" value="<?= $_SESSION["project_portal_wisata_kafe"]["users"]["id"] ?>">
                        <div class="form-group">
                          <input type="text" value="<?= $_SESSION["project_portal_wisata_kafe"]["users"]["name"] ?>" class="form-control" id="username" placeholder="Username"
                            readonly>
                        </div>
                        <div class="form-group">
                          <input type="number" value="<?= $_SESSION["project_portal_wisata_kafe"]["users"]["no_telpon"] ?>" class="form-control" id="no_telpon" placeholder="Username"
                            readonly>
                        </div>
                      <?php } ?>
                      <div class="form-group submit-btn">
                        <input type="submit" name="add_cart" value="Tambah ke Keranjang">
                      </div>
                    </div>
                  </div>
                </form>
                <script>
                  function calculateTotal() {
                    const menuSelect = document.getElementById('id_menu');
                    const jumlahMenu = document.getElementById('jumlah_menu');
                    const totalHarga = document.getElementById('total_harga');
                    const selectedOption = menuSelect.options[menuSelect.selectedIndex];
                    const hargaPerItem = parseFloat(selectedOption.getAttribute('data-price')) || 0;
                    const jumlah = parseInt(jumlahMenu.value) || 0;
                    const total = hargaPerItem * jumlah;
                    totalHarga.value = total;
                  }
                </script>
              </div>
              <?php foreach ($view_tempat_kafe as $data_kafe) {
                $cafe = "SELECT nama_file FROM galeri WHERE id_tempat='$data_kafe[id_tempat]'";
                $view_cafe = mysqli_query($conn, $cafe);
                $data_cafe = mysqli_fetch_assoc($view_cafe);
              ?>
                <div class="desti-item overlay-desti-item">
                  <figure class="desti-image">
                    <img src="assets/img/galeri/<?= $data_cafe['nama_file'] ?>"
                      style="width: 100%; height: 250px; object-fit: cover;" alt="">
                  </figure>
                  <div class="desti-content">
                    <h3>
                      <a href="tempat-kafe?p=<?= $data_kafe['id_tempat'] ?>"><?= $data_kafe['nama_tempat'] ?></a>
                    </h3>
                  </div>
                </div>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  <?php } ?>

</main>

<?php require_once("templates/bottom.php"); ?>