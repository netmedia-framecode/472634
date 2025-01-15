<?php require_once("../../controller/data-master.php");
$_SESSION["project_portal_wisata_kafe"]["name_page"] = "Pesanan";
require_once("../../templates/views_top.php"); ?>

<div class="nxl-content" style="height: 100vh;">

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
                    <th class="text-center">Kafe</th>
                    <th class="text-center">Menu</th>
                    <th class="text-center">Jumlah Pesanan</th>
                    <th class="text-center">Harga</th>
                    <th class="text-center">Total Harga</th>
                    <th class="text-center">Waktu Pesanan</th>
                    <th class="text-center">Status</th>
                    <?php if ($status == "admin") { ?>
                      <th class="text-center">Aksi</th>
                    <?php } ?>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($view_pesanan as $key => $data) { ?>
                    <tr class="single-item">
                      <td class="text-center"><?= $key + 1 ?></td>
                      <td>
                        <h6><?= $data['nama_tempat'] ?></h6><br>
                        <p style="margin-top: -25px;"><?= $data['nama_jalan'] ?></p><br>
                        <p style="margin-top: -30px;"><?= $data['kontak'] ?></p><br>
                      </td>
                      <td><?= $data['nama_menu'] ?></td>
                      <td class="text-center"><?= $data['jumlah_menu'] ?></td>
                      <td class="text-center">Rp.<?= number_format($data['harga']) ?></td>
                      <td class="text-center">Rp.<?= number_format($data['total_harga']) ?></td>
                      <td class="text-center"><?php $waktu_pesanan = date_create($data["waktu_pesanan"]);
                                              echo date_format($waktu_pesanan, "d M Y - H:i"); ?></td>
                      <td class="text-center"><?= $data['status_pesanan'] ?></td>
                      <?php if ($status == "admin") { ?>
                        <td>
                          <div class="hstack gap-2 justify-content-center">
                            <?php if ($data["status_pesanan"] == "Diproses") { ?>
                              <a href="edit-pesanan?p=<?= $data['id_pesanan'] ?>" class="btn btn-warning btn-sm">
                                <i class="bi bi-pencil-square"></i>
                              </a>
                            <?php } else if ($data["status_pesanan"] == "Diterima") { ?>
                              <a href="#" class="btn btn-success btn-sm">
                                <i class="bi bi-check2-all"></i>
                              </a>
                            <?php } else if ($data["status_pesanan"] == "Ditolak") { ?>
                              <a href="#" class="btn btn-danger btn-sm">
                                <i class="bi bi-bag-x"></i>
                              </a>
                            <?php } ?>
                          </div>
                        </td>
                      <?php } ?>
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