<?php require_once("../../controller/data-master.php");
if(!isset($_GET["p"])){
  header("Location: menu");
  exit();
}else{
  $id = valid($conn, $_GET["p"]); 
  $pull_data = "SELECT * FROM menu JOIN tempat_kafe ON menu.id_tempat = tempat_kafe.id_tempat WHERE menu.id_tempat = '$id'";
  $store_data = mysqli_query($conn, $pull_data);
  if(mysqli_num_rows($store_data) > 0){
    $data_view = mysqli_fetch_assoc($store_data);
    $_SESSION["project_portal_wisata_kafe"]["name_page"] = "List Menu";
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
    <div class="page-header-right ms-auto">
      <div class="page-header-right-items">
        <div class="d-flex d-md-none">
          <a href="javascript:void(0)" class="page-header-right-close-toggle">
            <i class="feather-arrow-left me-2"></i>
            <span>Back</span>
          </a>
        </div>
        <div class="d-flex align-items-center gap-2 page-header-right-items-wrapper">
          <a href="menu" class="btn btn-primary">
            <i class="bi bi-arrow-90deg-left me-2"></i>
            <span>Kembali</span>
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
      <div class="col-lg-12">
        <div class="card stretch stretch-full">
          <div class="card-body p-0">
            <div class="table-responsive">
              <table class="table table-hover" id="dataTable">
                <thead>
                  <tr>
                    <th class="text-center">#</th>
                    <th class="text-center">Nama Tempat</th>
                    <th class="text-center">Nama Menu</th>
                    <th class="text-center">Harga</th>
                    <th class="text-center">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($store_data as $key => $data) { ?>
                  <tr class="single-item">
                    <td class="text-center"><?= $key + 1 ?></td>
                    <td><?= $data['nama_tempat'] ?></td>
                    <td><?= $data['nama_menu'] ?></td>
                    <td>Rp.<?= number_format($data['harga']) ?></td>
                    <td>
                      <div class="hstack gap-2 justify-content-center">
                        <a href="edit-menu?p=<?= $data['id_menu']?>&ps=<?= $data['id_tempat']?>" class="btn btn-warning btn-sm">
                          <i class="bi bi-pencil-square"></i>
                        </a>
                        <form action="" method="post">
                          <input type="hidden" name="id_menu" value="<?= $data['id_menu'] ?>">
                          <input type="hidden" name="id_tempat" value="<?= $data['id_tempat'] ?>">
                          <input type="hidden" name="nama_menu" value="<?= $data['nama_menu'] ?>">
                          <button type="submit" name="delete_menu" class="btn btn-danger btn-sm">
                            <i class="bi bi-trash"></i>
                          </button>
                        </form>
                      </div>
                    </td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- [ Main Content ] end -->

</div>

<?php }else{
  header('Location: menu');
  exit();
}}
require_once("../../templates/views_bottom.php") ?>