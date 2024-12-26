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
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($view_kafe_pesanan as $data) { ?>
                    <tr>
                      <td><a href="tempat-kafe?p=<?= $data["id_tempat"] ?>"><strong><?= $data['nama_tempat'] ?></strong></a></td>
                      <td><?= $data['status_pesanan'] ?></td>
                      <td>
                        <form action="" method="post">
                          <input type="hidden" name="id_tempat" value="<?= $data['id_tempat'] ?>">
                          <input type="hidden" name="waktu_pesanan" value="<?= $data['waktu_pesanan'] ?>">
                          <button type="submit" name="view_menu_kafe_order" class="btn btn-success btn-sm">Menu <i class="bi bi-arrow-right"></i></button>
                        </form>
                      </td>
                    </tr>
                  <?php } ?>
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
                        <td>Rp.<?= number_format($data['total_harga']) ?></td>
                      </tr>
                    <?php $total += $data['total_harga'];
                    } ?>
                    <tr>
                      <td class="text-right font-weight-bold" colspan="6">Sub Total</td>
                      <td>Rp.<?= number_format($total) ?></td>
                    </tr>
                    <tr>
                      <td class="text-right font-weight-bold" colspan="6">Grand Total</td>
                      <td>Rp.<?= number_format($total) ?></td>
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

<script>
  document.addEventListener("DOMContentLoaded", function() {
    const cartTable = document.querySelector("table");
    const subTotalElement = document.querySelector(".subTotalAmount");
    const grandTotalElement = document.querySelector(".grandTotal");

    // Function to update totals
    function updateTotals() {
      let total = 0;
      document.querySelectorAll(".subtotal").forEach((subtotal) => {
        const value = parseFloat(subtotal.textContent.replace(/Rp\.|,/g, "")) || 0;
        total += value;
      });
      subTotalElement.textContent = `Rp.${total.toLocaleString()}`;
      grandTotalElement.textContent = `Rp.${total.toLocaleString()}`;
    }

    // Handle quantity changes
    cartTable.addEventListener("click", function(e) {
      if (e.target.closest(".btn-minus") || e.target.closest(".btn-plus")) {
        e.preventDefault();

        const button = e.target.closest("a");
        const inputField = button.parentElement.querySelector(".jumlah");
        let currentValue = parseInt(inputField.value);
        const isPlus = button.classList.contains("btn-plus");

        if (isPlus) {
          currentValue += 1;
        } else {
          currentValue = Math.max(1, currentValue - 1); // Minimum quantity is 1
        }

        inputField.value = currentValue;

        // Update the subtotal for this row
        const row = button.closest("tr");
        const price = parseFloat(row.querySelector("[data-column='Price']").textContent.replace(/Rp\.|,/g, ""));
        const subtotalField = row.querySelector(".subtotal");
        const subtotal = price * currentValue;
        subtotalField.textContent = `Rp.${subtotal.toLocaleString()}`;

        updateTotals();

        // Optional: Send AJAX request to update the server
        updateCartQuantity(button.dataset.id, currentValue);
      }
    });

    cartTable.addEventListener("change", function(e) {
      if (e.target.classList.contains("jumlah")) {
        const inputField = e.target;
        const currentValue = parseInt(inputField.value) || 1; // Default to 1 if invalid
        inputField.value = currentValue;

        // Update the subtotal for this row
        const row = inputField.closest("tr");
        const price = parseFloat(row.querySelector("[data-column='Price']").textContent.replace(/Rp\.|,/g, ""));
        const subtotalField = row.querySelector(".subtotal");
        const subtotal = price * currentValue;
        subtotalField.textContent = `Rp.${subtotal.toLocaleString()}`;

        updateTotals();

        // Optional: Send AJAX request to update the server
        updateCartQuantity(inputField.dataset.id, currentValue);
      }
    });

    // Function to send updated cart data to the server
    function updateCartQuantity(id, quantity) {
      fetch("update_keranjang.php", {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
          },
          body: JSON.stringify({
            id_pesanan: id,
            jumlah_menu: quantity
          }),
        })
        .then((response) => response.json())
        .then((data) => {
          if (data.success) {
            console.log("Cart updated successfully!");
          } else {
            console.error("Failed to update cart.");
          }
        })
        .catch((error) => console.error("Error:", error));
    }

    // Initial calculation
    updateTotals();
  });
</script>