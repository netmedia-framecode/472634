<?php require_once("../../controller/data-master.php");
$_SESSION["project_portal_wisata_kafe"]["name_page"] = "Galeri";
require_once("../../templates/views_top.php"); ?>

<div class="nxl-content">

  <!-- [ page-header ] start -->
  <div class="page-header">
    <div class="page-header-left d-flex align-items-center">
      <div class="page-header-title">
        <h5 class="m-b-10"><?= $_SESSION["project_portal_wisata_kafe"]["name_page"] ?></h5>
      </div>
      <ul class="breadcrumb">
        <li class="breadcrumb-item">Data Master</li>
        <li class="breadcrumb-item"><?= $_SESSION["project_portal_wisata_kafe"]["name_page"] ?></li>
      </ul>
    </div>
    <div class="page-header-right ms-auto">
      <div class="page-header-right-items">
        <div class="d-flex d-md-none">
          <a href="javascript:void(0)" class="page-header-right-close-toggle">
            <i class="feather-arrow-left me-2"></i>
            <span>Back</span>
          </a>
        </div>
        <div class="d-flex align-items-center gap-2 page-header-right-items-wrapper">
          <a href="add-galeri" class="btn btn-primary">
            <i class="feather-plus me-2"></i>
            <span>Tambah</span>
          </a>
        </div>
      </div>
      <div class="d-md-none d-flex align-items-center">
        <a href="javascript:void(0)" class="page-header-right-open-toggle">
          <i class="feather-align-right fs-20"></i>
        </a>
      </div>
    </div>
  </div>
  <!-- [ page-header ] end -->

  <!-- [ Main Content ] start -->
  <div class="main-content">
    <div class="row">
      <?php foreach($view_galeri as $data){ ?>
      <div class="col-lg-4">
        <div class="card stretch stretch-full">
          <img src="../../assets/img/galeri/<?= $data['nama_file']?>" class="card-img-top" style="height: 350px; object-fit: cover;" alt="<?= $data['nama_file']?>">
          <div class="card-body">
            <h6>Nama tempat : <?= $data['nama_tempat']?></h6>
            <form action="" method="post">
              <input type="hidden" name="id_galeri" value="<?= $data['id_galeri']?>">
              <input type="hidden" name="imageOld" value="<?= $data['nama_file']?>">
              <input type="hidden" name="nama_tempat" value="<?= $data['nama_tempat']?>">
              <button type="submit" name="delete_galeri" class="btn btn-danger btn-sm w-100"><i class="bi bi-trash3 me-2"></i> Hapus</button>
            </form>
          </div>
        </div>
      </div>
      <?php } ?>
    </div>
  </div>
  <!-- [ Main Content ] end -->

</div>

<?php require_once("../../templates/views_bottom.php") ?>