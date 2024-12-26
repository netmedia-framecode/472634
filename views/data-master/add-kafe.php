<?php require_once("../../controller/data-master.php");
$_SESSION["project_portal_wisata_kafe"]["name_page"] = "Tambah Kafe";
require_once("../../templates/views_top.php"); ?>

<div class="nxl-content">

  <!-- [ page-header ] start -->
  <div class="page-header">
    <div class="page-header-left d-flex align-items-center">
      <div class="page-header-title">
        <h5 class="m-b-10"><?= $_SESSION["project_portal_wisata_kafe"]["name_page"] ?></h5>
      </div>
      <ul class="breadcrumb">
        <li class="breadcrumb-item">Kafe</li>
        <li class="breadcrumb-item"><?= $_SESSION["project_portal_wisata_kafe"]["name_page"] ?></li>
      </ul>
    </div>
  </div>
  <!-- [ page-header ] end -->

  <!-- [ Main Content ] start -->
  <div class="main-content">
    <div class="row">
      <div class="col-lg-6">
        <div class="card stretch stretch-full">
          <div class="card-body">
            <form action="" method="post">
              <div class="mb-3">
                <label for="nama_tempat" class="form-label">Nama Tempat</label>
                <input type="text" name="nama_tempat" class="form-control" id="nama_tempat" placeholder="Nama Tempat"
                  required>
              </div>
              <div class="mb-3">
                <label for="nama_jalan" class="form-label">Nama Jalan</label>
                <input type="text" name="nama_jalan" class="form-control" id="nama_jalan" placeholder="Nama Jalan"
                  required>
              </div>
              <hr>
              <div class="row">
                <h6>Peta Lokasi</h6>
                <p class="text-dark">Masukan data peta lokasi dengan titik koordinat tempat kafe.</p>
                <div class="col-lg-6">
                  <div class="mb-3">
                    <label for="latitude" class="form-label">Latitude</label>
                    <input type="text" name="latitude" class="form-control" id="latitude" placeholder="Longitude"
                      required>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="mb-3">
                    <label for="longitude" class="form-label">Longitude</label>
                    <input type="text" name="longitude" class="form-control" id="longitude" placeholder="Latitude"
                      required>
                  </div>
                </div>
              </div>
              <div class="mb-3">
                <label for="kontak" class="form-label">Kontak</label>
                <input type="text" name="kontak" class="form-control" id="kontak" placeholder="Kontak">
              </div>
              <div class="mb-3 hstack gap-2 justify-content-left">
                <a href="tempat-kafe" class="btn btn-success">Kembali</a>
                <button type="submit" name="add_tempat_kafe" class="btn btn-primary">Tambah</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="col-md-12">
        <div class="card stretch stretch-full">
          <div class="card-body">
            <iframe
              src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d13209.155128571221!2d123.6225208!3d-10.1734285!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sid!2sid!4v1729309833993!5m2!1sid!2sid"
              width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
              referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- [ Main Content ] end -->

</div>

<?php require_once("../../templates/views_bottom.php") ?>