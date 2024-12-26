<?php require_once("../../controller/data-master.php");
$_SESSION["project_portal_wisata_kafe"]["name_page"] = "Tambah Galeri";
require_once("../../templates/views_top.php"); ?>

<div class="nxl-content" style="height: 110vh;">

  <!-- [ page-header ] start -->
  <div class="page-header">
    <div class="page-header-left d-flex align-items-center">
      <div class="page-header-title">
        <h5 class="m-b-10"><?= $_SESSION["project_portal_wisata_kafe"]["name_page"] ?></h5>
      </div>
      <ul class="breadcrumb">
        <li class="breadcrumb-item">Galeri</li>
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
            <form action="" method="post" enctype="multipart/form-data">
              <div class="mb-3">
                <label for="id_tempat" class="form-label">Kafe</label>
                <select name="id_tempat" class="form-control" id="id_tempat" required>
                  <option value="" selected>Pilih Kafe</option>
                  <?php foreach ($view_tempat_kafe as $data_kafe) { ?>
                  <option value="<?= $data_kafe['id_tempat'] ?>"><?= $data_kafe['nama_tempat'] ?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="mb-3">
                <label for="image" class="form-label">Upload Gambar</label>
                <input type="file" name="image" class="form-control" id="image" placeholder="Upload Gambar"
                  accept="image/png, image/jpeg, image/jpg" required>
              </div>
              <div class="mb-3 hstack gap-2 justify-content-left">
                <a href="galeri" class="btn btn-success">Kembali</a>
                <button type="submit" name="add_galeri" class="btn btn-primary">Tambah</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- [ Main Content ] end -->

</div>

<?php require_once("../../templates/views_bottom.php") ?>