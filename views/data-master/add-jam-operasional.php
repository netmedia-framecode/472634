<?php require_once("../../controller/data-master.php");
if(!isset($_GET["p"])){
  header("Location: menu");
  exit();
}else{
  $id = valid($conn, $_GET["p"]); 
  $pull_data = "SELECT * FROM tempat_kafe WHERE id_tempat = '$id'";
  $store_data = mysqli_query($conn, $pull_data);
  $data_view = mysqli_fetch_assoc($store_data);
  $waktu_operasional = "SELECT * FROM waktu_operasional JOIN tempat_kafe ON waktu_operasional.id_tempat = tempat_kafe.id_tempat WHERE waktu_operasional.id_tempat = '$id'";
  $view_jam_operasional = mysqli_query($conn, $waktu_operasional);
$_SESSION["project_portal_wisata_kafe"]["name_page"] = "Tambah Jam Operasional";
require_once("../../templates/views_top.php"); ?>

<div class="nxl-content" style="height: 110vh;">

  <!-- [ page-header ] start -->
  <div class="page-header">
    <div class="page-header-left d-flex align-items-center">
      <div class="page-header-title">
        <h5 class="m-b-10"><?= $_SESSION["project_portal_wisata_kafe"]["name_page"] ?></h5>
      </div>
      <ul class="breadcrumb">
        <li class="breadcrumb-item">Jam Operasional</li>
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
      <div class="col-lg-6">
        <div class="card stretch stretch-full">
          <div class="card-body">
            <form action="" method="post">
              <input type="hidden" name="id_tempat" value="<?= $data_view['id_tempat']?>">
              <div class="mb-3">
                <label for="nama_tempat" class="form-label">Nama Tempat</label>
                <input type="text" name="nama_tempat" value="<?= $data_view['nama_tempat']?>" class="form-control"
                  id="nama_tempat" placeholder="Nama Tempat" readonly>
              </div>
              <div class="mb-3">
                <label for="hari" class="form-label">Hari</label>
                <select name="hari" class="form-control" id="hari" required>
                  <option value="">Pilih Hari</option>
                  <?php
                  foreach ($hari_array as $hari) {
                    echo "<option value='$hari'>$hari</option>";
                  }
                  ?>
                </select>
              </div>
              <div class="mb-3">
                <label for="jam_buka" class="form-label">Jam Buka</label>
                <input type="time" name="jam_buka" class="form-control" id="jam_buka" placeholder="Jam Buka" required>
              </div>
              <div class="mb-3">
                <label for="jam_tutup" class="form-label">Jam Tutup</label>
                <input type="time" name="jam_tutup" class="form-control" id="jam_tutup" placeholder="Jam Tutup"
                  required>
              </div>
              <div class="mb-3 hstack gap-2 justify-content-left">
                <a href="jam-operasional" class="btn btn-success">Kembali</a>
                <button type="submit" name="add_jam_operasional" class="btn btn-primary">Tambah</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="card stretch stretch-full">
          <div class="card-body">
            <h6>List Jam Operasional :</h6>
            <ol>
              <?php foreach($view_jam_operasional as $data){
                echo "<li>".$data['hari']." - ".$data['jam_buka']."-".$data['jam_tutup']."</li>";
              }?>
            </ol>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- [ Main Content ] end -->

</div>

<?php }
require_once("../../templates/views_bottom.php") ?>