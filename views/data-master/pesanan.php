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
                    <th class="text-center">Pajak</th>
                    <th class="text-center">Total Harga</th>
                    <th class="text-center">Waktu Pesanan</th>
                    <?php if ($status == "admin") { ?>
                    <th class="text-center">Waktu Tunggu</th>
                    <?php } ?>
                    <th class="text-center">Status</th>
                    <?php if ($status == "admin") { ?>
                      <th class="text-center">Aksi</th>
                    <?php } ?>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  date_default_timezone_set("Asia/Makassar");
                  foreach ($view_pesanan as $key => $data) {
                    $ppn = $data['harga'] * ($data['pajak'] / 100);
                    $waktu_pesanan = strtotime($data["waktu_pesanan"]);
                    $waktu_tunggu = $waktu_pesanan + (10 * 60);
                  ?>
                    <tr class="single-item" data-id="<?= $data['id_pesanan'] ?>" data-waktu="<?= $waktu_tunggu ?>">
                      <td class="text-center"><?= $key + 1 ?></td>
                      <td>
                        <h6><?= $data['nama_tempat'] ?></h6><br>
                        <p style="margin-top: -25px;"><?= $data['nama_jalan'] ?></p><br>
                        <p style="margin-top: -30px;"><?= $data['kontak'] ?></p><br>
                      </td>
                      <td><?= $data['nama_menu'] ?></td>
                      <td class="text-center"><?= $data['jumlah_menu'] ?></td>
                      <td class="text-center">Rp.<?= number_format($data['harga']) ?></td>
                      <td class="text-center">Rp.<?= number_format($ppn) ?></td>
                      <td class="text-center">Rp.<?= number_format($data['total_harga'] + $ppn) ?></td>
                      <td class="text-center"><?php echo date("d M Y - H:i", $waktu_pesanan); ?></td>
                      <?php if ($status == "admin") { ?>
                      <td class="text-center">
                        <span
                          class="waktu-tunggu"
                          data-waktu-tunggu="<?= $waktu_tunggu ?>"
                          data-id="<?= $data['id_pesanan'] ?>">
                          Menghitung...
                        </span>
                      </td>
                      <?php } ?>
                      <td class="status-pesanan" data-id="<?= $data['id_pesanan'] ?>"><?= $data['status_pesanan'] ?></td>
                      <?php if ($status == "admin") { ?>
                        <td>
                          <div class="hstack gap-2 justify-content-center">
                            <div class="aksi-pesanan" data-id="<?= $data['id_pesanan'] ?>">
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

<?php if ($status == "admin") { ?>
<script>
  document.addEventListener("DOMContentLoaded", function() {
    function updateWaktuTunggu() {
      const elements = document.querySelectorAll('.waktu-tunggu');
      const now = Math.floor(Date.now() / 1000);
      elements.forEach(element => {
        const waktuTunggu = parseInt(element.getAttribute('data-waktu-tunggu'), 10);
        const remainingTime = waktuTunggu - now;
        const idTempat = element.getAttribute('data-id');
        const statusElement = document.querySelector(`.status-pesanan[data-id="${idTempat}"]`);
        if (remainingTime <= 0) {
          element.textContent = "Waktu Habis";
          updateStatusPesanan(idTempat, statusElement);
        } else {
          const minutes = Math.floor(remainingTime / 60);
          const seconds = remainingTime % 60;
          element.textContent = `${minutes}m ${seconds}s`;
        }
      });
    }

    function updateStatusPesanan(idTempat, statusElement) {
      fetch('../../controller/update_status_pesanan.php', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
          },
          body: `id_tempat=${idTempat}`
        })
        .then(response => response.json())
        .then(data => {
          if (data.success) {
            fetchStatusPesanan(idTempat, statusElement);
          } else {
            console.error('Gagal memperbarui status:', data.message);
          }
        })
        .catch(error => console.error('Kesalahan koneksi:', error));
    }

    setInterval(updateWaktuTunggu, 1000);
    updateWaktuTunggu();
  });
</script>
<script>
  document.addEventListener("DOMContentLoaded", function() {
    function fetchUpdatedStatus() {
      fetch('../../controller/get_status_pesanan.php')
        .then(response => response.json())
        .then(data => {
          if (data.success) {
            data.pesanan.forEach(pesanan => {
              const statusElement = document.querySelector(`.status-pesanan[data-id="${pesanan.id_pesanan}"]`);
              const aksiElement = document.querySelector(`.aksi-pesanan[data-id="${pesanan.id_pesanan}"]`);

              if (statusElement && aksiElement && statusElement.textContent !== pesanan.status_pesanan) {
                // Update status
                statusElement.textContent = pesanan.status_pesanan;

                // Update tombol aksi
                let aksiHTML = '';
                if (pesanan.status_pesanan === "Diproses") {
                  aksiHTML = `
                  <a href="edit-pesanan?p=${pesanan.id_pesanan}" class="btn btn-warning btn-sm">
                    <i class="bi bi-pencil-square"></i>
                  </a>`;
                } else if (pesanan.status_pesanan === "Diterima") {
                  aksiHTML = `
                  <a href="#" class="btn btn-success btn-sm">
                    <i class="bi bi-check2-all"></i>
                  </a>`;
                } else if (pesanan.status_pesanan === "Ditolak") {
                  aksiHTML = `
                  <a href="#" class="btn btn-danger btn-sm">
                    <i class="bi bi-bag-x"></i>
                  </a>`;
                }
                aksiElement.innerHTML = aksiHTML;
              }
            });
          } else {
            console.error('Gagal mengambil status:', data.message);
          }
        })
        .catch(error => console.error('Kesalahan koneksi:', error));
    }

    // Jalankan fungsi secara berkala setiap 5 detik
    setInterval(fetchUpdatedStatus, 1000);
    fetchUpdatedStatus();
  });
</script>
<?php } ?>