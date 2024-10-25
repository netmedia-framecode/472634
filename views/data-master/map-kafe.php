<?php require_once("../../controller/data-master.php");
if(!isset($_GET["p"])){
  header("Location: kafe");
  exit();
}else{
  $id = valid($conn, $_GET["p"]); 
  $pull_data = "SELECT * FROM tempat_kafe WHERE id_tempat = '$id'";
  $store_data = mysqli_query($conn, $pull_data);
  $data_view = mysqli_fetch_assoc($store_data);
$_SESSION["project_portal_wisata_kafe"]["name_page"] = "Lokasi Kafe";
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
        <li class="breadcrumb-item">
          <?= $_SESSION["project_portal_wisata_kafe"]["name_page"].' '.$data_view["nama_tempat"]  ?>
        </li>
      </ul>
    </div>
  </div>
  <!-- [ page-header ] end -->

  <!-- [ Main Content ] start -->
  <div class="main-content">
    <div class="row">
      <div class="col-md-12">
        <div class="card stretch stretch-full">
          <div class="card-body">
            <h4>Nama Tempat : <?= $data_view['nama_tempat']?></h4>
            <h6><?= $data_view['nama_jalan']?></h6>
            <?php
            $data = $data_view['peta_lokasi'];
            list($latitude, $longitude) = explode('_', $data);

            $map_url = "https://www.google.com/maps/embed?pb=";
            $map_url .= "!1m14!1m12!1m3!1d13209.155128571221!2d" . $longitude . "!3d" . $latitude;
            $map_url .= "!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sid!2sid";
            $map_url .= "!4m5!3m4!1s0x0:0x0!8m2!3d" . $latitude . "!4d" . $longitude;

            $google_maps_url = "https://www.google.com/maps?q=" . $latitude . "," . $longitude;
            ?>
            <a href="<?= $google_maps_url ?>" target="_blank">
              <button
                style="margin-top: 10px; padding: 10px 20px; background-color: #4285F4; color: white; border: none; border-radius: 4px; cursor: pointer;">
                Lihat di Google Maps
              </button>
            </a>
            <hr>
            <iframe src="<?= $map_url ?>" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
              referrerpolicy="no-referrer-when-downgrade"></iframe>
            <div class="mb-3 hstack gap-2 justify-content-left">
              <a href="kafe" class="btn btn-success mt-4">Kembali</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- [ Main Content ] end -->

</div>

<?php }
        require_once("../../templates/views_bottom.php") ?>