<?php require_once("../controller/dashboard.php");
$_SESSION["project_portal_wisata_kafe"]["name_page"] = "";
require_once("../templates/views_top.php"); ?>

<!-- Begin Page Content -->

<div class="nxl-content" style="height: 100vh;">
  <!-- [ page-header ] start -->
  <div class="page-header">
    <div class="page-header-left d-flex align-items-center">
      <div class="page-header-title">
        <h5 class="m-b-10">Dashboard</h5>
      </div>
      <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="./">Home</a></li>
        <li class="breadcrumb-item">Dashboard</li>
      </ul>
    </div>
  </div>
  <!-- [ page-header ] end -->
  <!-- [ Main Content ] start -->
  <div class="main-content">
    <div class="row">
      <!-- [Invoices Awaiting Payment] start -->
      <div class="col-xxl-3 col-md-6">
        <a href="data-master/tempat-kafe">
          <div class="card stretch stretch-full">
            <div class="card-body">
              <div class="d-flex align-items-start justify-content-between mb-4">
                <div class="d-flex gap-4 align-items-center">
                  <div class="avatar-text avatar-lg bg-gray-200">
                    <i class="bi bi-shop"></i>
                  </div>
                  <div>
                    <div class="fs-4 fw-bold text-dark"><?= $count_tempat_kafe?>
                    </div>
                    <h3 class="fs-13 fw-semibold text-truncate-1-line">Kafe</h3>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </a>
      </div>
      <!-- [Invoices Awaiting Payment] end -->
      <!-- [Converted Leads] start -->
      <div class="col-xxl-3 col-md-6">
        <a href="data-master/menu">
          <div class="card stretch stretch-full">
            <div class="card-body">
              <div class="d-flex align-items-start justify-content-between mb-4">
                <div class="d-flex gap-4 align-items-center">
                  <div class="avatar-text avatar-lg bg-gray-200">
                    <i class="bi bi-menu-app"></i>
                  </div>
                  <div>
                    <div class="fs-4 fw-bold text-dark"><?= $count_menu?>
                    </div>
                    <h3 class="fs-13 fw-semibold text-truncate-1-line">Menu</h3>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </a>
      </div>
      <!-- [Converted Leads] end -->
      <!-- [Projects In Progress] start -->
      <div class="col-xxl-3 col-md-6">
        <a href="data-master/jam-operasional">
          <div class="card stretch stretch-full">
            <div class="card-body">
              <div class="d-flex align-items-start justify-content-between mb-4">
                <div class="d-flex gap-4 align-items-center">
                  <div class="avatar-text avatar-lg bg-gray-200">
                    <i class="bi bi-stopwatch"></i>
                  </div>
                  <div>
                    <div class="fs-4 fw-bold text-dark"><?= $count_jam_operasional?>
                    </div>
                    <h3 class="fs-13 fw-semibold text-truncate-1-line">Jam Operasional</h3>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </a>
      </div>
      <!-- [Projects In Progress] end -->
      <!-- [Conversion Rate] start -->
      <div class="col-xxl-3 col-md-6">
        <a href="data-master/galeri">
          <div class="card stretch stretch-full">
            <div class="card-body">
              <div class="d-flex align-items-start justify-content-between mb-4">
                <div class="d-flex gap-4 align-items-center">
                  <div class="avatar-text avatar-lg bg-gray-200">
                    <i class="bi bi-card-image"></i>
                  </div>
                  <div>
                    <div class="fs-4 fw-bold text-dark"><?= $count_galeri?></div>
                    <h3 class="fs-13 fw-semibold text-truncate-1-line">Galeri</h3>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </a>
      </div>
      <!-- [Conversion Rate] end -->
    </div>
  </div>
  <!-- [ Main Content ] end -->
</div>
<!-- /.container-fluid -->

<?php require_once("../templates/views_bottom.php") ?>