<?php require_once("../../controller/data-master.php");
$_SESSION["project_portal_wisata_kafe"]["name_page"] = "Jam Operasional";
require_once("../../templates/views_top.php"); ?>

<div class="nxl-content">

  <!-- [ page-header ] start -->
  <div class="page-header">
    <div class="page-header-left d-flex align-items-center">
      <div class="page-header-title">
        <h5 class="m-b-10"><?= $_SESSION["project_portal_wisata_kafe"]["name_page"] ?></h5>
      </div>
      <ul class="breadcrumb">
        <li class="breadcrumb-item">Jam Operasional</li>
        <li class="breadcrumb-item"><?= $_SESSION["project_portal_wisata_kafe"]["name_page"] ?></li>
      </ul>
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
                    <th class="text-center">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($view_tempat_kafe as $key => $data) { ?>
                  <tr class="single-item">
                    <td class="text-center"><?= $key + 1 ?></td>
                    <td><?= $data['nama_tempat'] ?></td>
                    <td>
                      <div class="hstack gap-2 justify-content-center">
                        <a href="add-jam-operasional?p=<?= $data['id_tempat']?>" class="btn btn-primary btn-sm">
                          <i class="feather-plus me-2"></i> Tambah
                        </a>
                        <a href="list-jam-operasional?p=<?= $data['id_tempat']?>" class="btn btn-success btn-sm">
                          <i class="bi bi-eye me-2"></i> Lihat
                        </a>
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

<?php require_once("../../templates/views_bottom.php") ?>