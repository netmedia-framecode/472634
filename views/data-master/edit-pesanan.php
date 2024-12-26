<?php require_once("../../controller/data-master.php");
if (!isset($_GET["p"])) {
  header("Location: pesanan");
  exit();
} else {
  $id = valid($conn, $_GET["p"]);
  $pull_data = "SELECT * FROM pesanan 
                  JOIN menu ON pesanan.id_menu = menu.id_menu
                  JOIN tempat_kafe ON pesanan.id_tempat = tempat_kafe.id_tempat 
                  WHERE pesanan.id_pesanan = '$id'";
  $store_data = mysqli_query($conn, $pull_data);
  $data_view = mysqli_fetch_assoc($store_data);
  $_SESSION["project_portal_wisata_kafe"]["name_page"] = "Ubah Pesanan";
  require_once("../../templates/views_top.php"); ?>

  <div class="nxl-content" style="height: 100vh;">

    <!-- [ page-header ] start -->
    <div class="page-header">
      <div class="page-header-left d-flex align-items-center">
        <div class="page-header-title">
          <h5 class="m-b-10"><?= $_SESSION["project_portal_wisata_kafe"]["name_page"] ?></h5>
        </div>
        <ul class="breadcrumb">
          <li class="breadcrumb-item">Pesanan</li>
          <li class="breadcrumb-item">
            <?= $_SESSION["project_portal_wisata_kafe"]["name_page"] . ' ' . $data_view['nama_menu']  ?>
          </li>
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
                <input type="hidden" name="id_pesanan" value="<?= $data_view['id_pesanan'] ?>">
                <input type="hidden" name="nama_menu" value="<?= $data_view['nama_menu'] ?>">
                <div class="mb-3">
                  <label for="status_pesanan" class="form-label">Status</label>
                  <select name="status_pesanan" class="form-control" id="status_pesanan" required>
                    <option value="">Pilih Status</option>
                    <?php
                    foreach ($status_pesanan_array as $status_pesanan) {
                      echo "<option value='$status_pesanan'>$status_pesanan</option>";
                    }
                    ?>
                  </select>
                </div>
                <div class="mb-3 hstack gap-2 justify-content-left">
                  <a href="pesanan" class="btn btn-success">Kembali</a>
                  <button type="submit" name="edit_pesanan" class="btn btn-warning">Ubah</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- [ Main Content ] end -->

  </div>

<?php }
require_once("../../templates/views_bottom.php") ?>