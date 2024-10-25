<?php require_once("../../controller/data-master.php");
if(!isset($_GET["p"])){
  header("Location: menu");
  exit();
}else{
  $id = valid($conn, $_GET["p"]); 
  $ids = valid($conn, $_GET["ps"]);
  $pull_data = "SELECT * FROM menu JOIN tempat_kafe ON menu.id_tempat = tempat_kafe.id_tempat WHERE menu.id_menu = '$id'";
  $store_data = mysqli_query($conn, $pull_data);
  $data_view = mysqli_fetch_assoc($store_data);
  $pull_data_more = "SELECT * FROM menu JOIN tempat_kafe ON menu.id_tempat = tempat_kafe.id_tempat WHERE menu.id_tempat = '$ids'";
  $view_pull_data_more = mysqli_query($conn, $pull_data_more);
$_SESSION["project_portal_wisata_kafe"]["name_page"] = "Ubah Menu";
require_once("../../templates/views_top.php"); ?>

<div class="nxl-content">

  <!-- [ page-header ] start -->
  <div class="page-header">
    <div class="page-header-left d-flex align-items-center">
      <div class="page-header-title">
        <h5 class="m-b-10"><?= $_SESSION["project_portal_wisata_kafe"]["name_page"] ?></h5>
      </div>
      <ul class="breadcrumb">
        <li class="breadcrumb-item">Menu</li>
        <li class="breadcrumb-item"><?= $_SESSION["project_portal_wisata_kafe"]["name_page"].' '.$data_view["nama_menu"]  ?>
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
              <input type="hidden" name="id_menu" value="<?= $data_view['id_menu']?>">
              <input type="hidden" name="id_tempat" value="<?= $data_view['id_tempat']?>">
              <input type="hidden" name="nama_menu" value="<?= $data_view['nama_menu'] ?>">
              <div class="mb-3">
                <label for="nama_tempat" class="form-label">Nama Tempat</label>
                <input type="text" name="nama_tempat" value="<?= $data_view['nama_tempat']?>" class="form-control"
                  id="nama_tempat" placeholder="Nama Tempat" readonly>
              </div>
              <div class="mb-3">
                <label for="nama_menu" class="form-label">Nama Menu</label>
                <input type="text" name="nama_menu" value="<?= $data_view['nama_menu']?>" class="form-control" id="nama_menu" placeholder="Nama Menu"
                  required>
              </div>
              <div class="mb-3">
                <label for="harga" class="form-label">Harga</label>
                <input type="number" name="harga" value="<?= $data_view['harga']?>" class="form-control" id="harga" placeholder="Harga" required>
              </div>
              <div class="mb-3 hstack gap-2 justify-content-left">
                <a href="list-menu?p=<?= $ids?>" class="btn btn-success">Kembali</a>
                <button type="submit" name="edit_menu" class="btn btn-warning">Ubah</button>
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
                echo "<li class='d-flex'><p class='me-2'>".$data['nama_menu']." - Rp.".number_format($data['harga'])."</p><a href='edit-menu?p=".$data['id_menu']."&ps=".$data['id_tempat']."'><i class='bi bi-pencil-square'></i></a></li>";
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