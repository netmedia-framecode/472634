<?php require_once("controller/visitor.php");
$_SESSION["project_portal_wisata_kafe"]["name_page"] = "Pemesanan";
require_once("templates/top.php");
require_once("redirect.php"); ?>

<main id="content" class="site-main">

  <section class="inner-banner-wrap">
    <div class="inner-baner-container" style="background-image: url(assets/img/banner-3.jpeg);">
      <div class="container">
        <div class="inner-banner-content">
          <h1 class="inner-title">Pemesanan</h1>
        </div>
      </div>
    </div>
    <div class="inner-shape"></div>
  </section>

  <div class="cart-section">
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <div class="cart-list-inner">
            <div class="table-responsive">
              <table class="table text-center">
                <thead>
                  <tr>
                    <th>Kafe</th>
                    <th>Status</th>
                    <th>Waktu Tunggu</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <?php date_default_timezone_set("Asia/Makassar");
                  foreach ($view_kafe_pesanan as $data) :
                    $waktu_pesanan = strtotime($data["waktu_pesanan"]);
                    $waktu_tunggu = $waktu_pesanan + (10 * 60);
                  ?>
                    <tr>
                      <td>
                        <a href="tempat-kafe?p=<?= $data["id_tempat"] ?>">
                          <strong><?= htmlspecialchars($data['nama_tempat'], ENT_QUOTES, 'UTF-8') ?></strong>
                        </a>
                      </td>
                      <td class="status-pesanan" data-id="<?= $data['id_pesanan'] ?>">
                        <?= htmlspecialchars($data['status_pesanan'], ENT_QUOTES, 'UTF-8') ?>
                      </td>
                      <td class="text-center">
                        <span
                          class="waktu-tunggu"
                          data-waktu-tunggu="<?= $waktu_tunggu ?>"
                          data-id="<?= $data['id_pesanan'] ?>">
                          Menghitung...
                        </span>
                      </td>
                      <td>
                        <form action="" method="post">
                          <input type="hidden" name="id_tempat" value="<?= htmlspecialchars($data['id_tempat'], ENT_QUOTES, 'UTF-8') ?>">
                          <input type="hidden" name="waktu_pesanan" value="<?= htmlspecialchars($data['waktu_pesanan'], ENT_QUOTES, 'UTF-8') ?>">
                          <button type="submit" name="view_menu_kafe_order" class="btn btn-success btn-sm">
                            Menu <i class="bi bi-arrow-right"></i>
                          </button>
                        </form>
                      </td>
                    </tr>
                  <?php endforeach; ?>
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
                        fetch('controller/update_status_pesanan.php', {
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
                        // Kirim request ke server untuk mendapatkan data status terbaru
                        fetch('controller/get_status_pesanan.php') // Endpoint untuk semua status
                          .then(response => response.json())
                          .then(data => {
                            if (data.success) {
                              data.pesanan.forEach(pesanan => {
                                const statusElement = document.querySelector(`.status-pesanan[data-id="${pesanan.id_pesanan}"]`);
                                if (statusElement && statusElement.textContent !== pesanan.status_pesanan) {
                                  statusElement.textContent = pesanan.status_pesanan; // Update status
                                }
                              });
                            } else {
                              console.error('Gagal mengambil status:', data.message);
                            }
                          })
                          .catch(error => console.error('Kesalahan koneksi:', error));
                      }

                      // Panggil fungsi secara berkala setiap 5 detik
                      setInterval(fetchUpdatedStatus, 1000);
                    });
                  </script>

                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="col-lg-8">
          <?php if (isset($_POST["view_menu_kafe_order"])) { ?>
            <div class="cart-list-inner">
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th class="text-center">No</th>
                      <th class="text-center">Tanggal</th>
                      <th class="text-center">Status</th>
                      <th class="text-center">Menu</th>
                      <th class="text-center">Harga</th>
                      <th class="text-center">Jumlah</th>
                      <th class="text-center">Sub Total</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1;
                    $total = 0;
                    $id_tempat = valid($conn, $_POST['id_tempat']);
                    $waktu_pesanan = valid($conn, $_POST['waktu_pesanan']);
                    $waktu_pesanan = date('Y-m-d', strtotime($waktu_pesanan));

                    $list_pesanan = "SELECT * 
                      FROM pesanan 
                      JOIN menu ON pesanan.id_menu = menu.id_menu 
                      JOIN tempat_kafe ON pesanan.id_tempat = tempat_kafe.id_tempat 
                      JOIN melakukan ON pesanan.id_pesanan = melakukan.id_pesanan 
                      WHERE melakukan.id_user = '$id_user' 
                      AND pesanan.status_pesanan != 'Menunggu' 
                      AND pesanan.id_tempat = '$id_tempat' 
                      AND DATE(pesanan.waktu_pesanan) = '$waktu_pesanan'";
                    $view_list_pesanan = mysqli_query($conn, $list_pesanan);
                    foreach ($view_list_pesanan as $data) { ?>
                      <tr>
                        <th><?= $no++; ?></th>
                        <td><?php $waktu_pesanan = date_create($data["waktu_pesanan"]);
                            echo date_format($waktu_pesanan, "d M Y - H:i"); ?></td>
                        <td><?= $data['status_pesanan'] ?></td>
                        <td><?= $data['nama_menu'] ?></td>
                        <td>Rp.<?= number_format($data['harga']) ?></td>
                        <td><?= $data['jumlah_menu'] ?></td>
                        <td>Rp.<?= number_format($data['harga'] * $data['jumlah_menu']) ?></td>
                      </tr>
                    <?php $total += $data['harga'] * $data['jumlah_menu'];
                    } ?>
                    <tr>
                      <td class="text-right font-weight-bold" colspan="6">Sub Total</td>
                      <td>Rp.<?= number_format($total) ?></td>
                    </tr>
                    <tr>
                      <td class="text-right font-weight-bold" colspan="6">Pajak</td>
                      <td>Rp.<?= number_format($total * ($data['pajak'] / 100)) ?></td>
                    </tr>
                    <tr>
                      <td class="text-right font-weight-bold" colspan="6">Grand Total</td>
                      <td>Rp.<?= number_format($total + ($total * ($data['pajak'] / 100))) ?></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>

</main>

<?php require_once("templates/bottom.php"); ?>