<?php require_once("../../controller/data-master.php");
if(!isset($_GET["p"])){
  header("Location: menu");
  exit();
}else{
  $id = valid($conn, $_GET["p"]); 
  $pull_data = "SELECT * FROM tempat_kafe WHERE id_tempat = '$id'";
  $store_data = mysqli_query($conn, $pull_data);
  $data_view = mysqli_fetch_assoc($store_data);
  $menu = "SELECT * FROM menu JOIN tempat_kafe ON menu.id_tempat = tempat_kafe.id_tempat WHERE menu.id_tempat = '$id'";
  $view_menu = mysqli_query($conn, $menu);
$_SESSION["project_portal_wisata_kafe"]["name_page"] = "Tambah Menu";
require_once("../../templates/views_top.php"); ?>

<div class="nxl-content" style="height: 110vh;">

  <!-- [ page-header ] start -->
  <div class="page-header">
    <div class="page-header-left d-flex align-items-center">
      <div class="page-header-title">
        <h5 class="m-b-10"><?= $_SESSION["project_portal_wisata_kafe"]["name_page"] ?></h5>
      </div>
      <ul class="breadcrumb">
        <li class="breadcrumb-item">Menu</li>
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
                <label for="nama_menu" class="form-label">Nama Menu</label>
                <input type="text" name="nama_menu" class="form-control" id="nama_menu" placeholder="Nama Menu"
                  required>
              </div>
              <div class="mb-3">
                <label for="harga" class="form-label">Harga</label>
                <input type="number" name="harga" class="form-control" id="harga" placeholder="Harga" required>
              </div>
              <div class="mb-3 hstack gap-2 justify-content-left">
                <a href="menu" class="btn btn-success">Kembali</a>
                <button type="submit" name="add_menu" class="btn btn-primary">Tambah</button>
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
              <?php foreach($view_menu as $data){
                echo "<li>".$data['nama_menu']." - Rp.".number_format($data['harga'])."</li>";
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