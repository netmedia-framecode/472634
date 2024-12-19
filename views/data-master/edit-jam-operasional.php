<?php require_once("../../controller/data-master.php");
if(!isset($_GET["p"])){
  header("Location: menu");
  exit();
}else{
  $id = valid($conn, $_GET["p"]); 
  $ids = valid($conn, $_GET["ps"]);
  $pull_data = "SELECT * FROM jam_operasional JOIN tempat_kafe ON jam_operasional.id_tempat = tempat_kafe.id_tempat WHERE jam_operasional.id_jam = '$id'";
  $store_data = mysqli_query($conn, $pull_data);
  $data_view = mysqli_fetch_assoc($store_data);
  $pull_data_more = "SELECT * FROM jam_operasional JOIN tempat_kafe ON jam_operasional.id_tempat = tempat_kafe.id_tempat WHERE jam_operasional.id_tempat = '$ids'";
  $view_pull_data_more = mysqli_query($conn, $pull_data_more);
$_SESSION["project_portal_wisata_kafe"]["name_page"] = "Ubah Jam Operasional";
require_once("../../templates/views_top.php"); ?>

<div class="nxl-content" style="height: 100vh;">

  <!-- [ page-header ] start -->
  <div class="page-header">
    <div class="page-header-left d-flex align-items-center">
      <div class="page-header-title">
        <h5 class="m-b-10"><?= $_SESSION["project_portal_wisata_kafe"]["name_page"] ?></h5>
      </div>
      <ul class="breadcrumb">
        <li class="breadcrumb-item">Jam Operasional</li>
        <li class="breadcrumb-item"><?= $_SESSION["project_portal_wisata_kafe"]["name_page"].' '.$data_view["hari"]  ?>
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
              <input type="hidden" name="id_jam" value="<?= $data_view['id_jam']?>">
              <input type="hidden" name="id_tempat" value="<?= $data_view['id_tempat']?>">
              <input type="hidden" name="nama_tempat" value="<?= $data_view['nama_tempat'] ?>">
              <div class="mb-3">
                <label for="nama_tempat" class="form-label">Nama Tempat</label>
                <input type="text" name="nama_tempat" value="<?= $data_view['nama_tempat']?>" class="form-control"
                  id="nama_tempat" placeholder="Nama Tempat" readonly>
              </div>
              <div class="mb-3">
                <label for="hari" class="form-label">Hari</label>
                <select name="hari" class="form-control" id="hari" required>
                  <option value="">Pilih Hari</option>
                  <?php $id_hari = $data_view['hari'];
                  foreach ($hari_array as $hari) {
                    $selected = ($hari == $id_hari) ? 'selected' : '';
                    echo "<option value='$hari' $selected>$hari</option>";
                  }
                  ?>
                </select>
              </div>
              <div class="mb-3">
                <label for="jam_buka" class="form-label">Jam Buka</label>
                <input type="time" name="jam_buka" value="<?= $data_view['jam_buka']?>" class="form-control" id="jam_buka" placeholder="Jam Buka" required>
              </div>
              <div class="mb-3">
                <label for="jam_tutup" class="form-label">Jam Tutup</label>
                <input type="time" name="jam_tutup" value="<?= $data_view['jam_tutup']?>" class="form-control" id="jam_tutup" placeholder="Jam Tutup"
                  required>
              </div>
              <div class="mb-3 hstack gap-2 justify-content-left">
                <a href="list-jam-operasional?p=<?= $ids?>" class="btn btn-success">Kembali</a>
                <button type="submit" name="edit_jam_operasional" class="btn btn-warning">Ubah</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="card stretch stretch-full">
          <div class="card-body">
            <h6>List Menu :</h6>
            <ol>
              <?php foreach($view_pull_data_more as $data){
                echo "<li class='d-flex'><p class='me-2'>".$data['hari']." - ".$data['jam_buka']."-".$data['jam_tutup']."</p><a href='edit-jam-operasional?p=".$data['id_jam']."&ps=".$data['id_tempat']."'><i class='bi bi-pencil-square'></i></a></li>";
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