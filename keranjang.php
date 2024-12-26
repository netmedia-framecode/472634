<?php require_once("controller/visitor.php");
$_SESSION["project_portal_wisata_kafe"]["name_page"] = "Proses Pesanan";
require_once("templates/top.php");
require_once("redirect.php"); ?>

<main id="content" class="site-main">

  <section class="inner-banner-wrap">
    <div class="inner-baner-container" style="background-image: url(assets/img/banner-3.jpeg);">
      <div class="container">
        <div class="inner-banner-content">
          <h1 class="inner-title">Proses Pesanan</h1>
        </div>
      </div>
    </div>
    <div class="inner-shape"></div>
  </section>

  <div class="cart-section">
    <div class="container">
      <div class="cart-list-inner">
        <form action="#" method="post">
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th></th>
                  <th>Menu</th>
                  <th>Harga</th>
                  <th>Jumlah</th>
                  <th>Sub Total</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($view_pesanan as $data) { ?>
                  <tr>
                    <td class="">
                      <input type="hidden" name="id_pesanan" value="<?= $data["id_pesanan"]; ?>">
                      <input type="hidden" name="id_tempat" value="<?= $data["id_tempat"]; ?>">
                      <input type="hidden" name="nama_menu" value="<?= $data["nama_menu"]; ?>">
                      <button class="close" type="submit" name="delete_cart" aria-label="Close"><span aria-hidden="true">×</span></button>
                    </td>
                    <td data-column="Product Name"><?= $data['nama_menu'] ?></td>
                    <td data-column="Price">Rp.<?= number_format($data['harga']) ?></td>
                    <td data-column="jumlah-pesanan" class="hitung-pesanan">
                      <div>
                        <a class="btn-minus" href="#" data-id="<?= $data['id_pesanan']; ?>"><i class="fa fa-minus"></i></a>
                        <input class="jumlah" type="number" data-id="<?= $data['id_pesanan']; ?>" value="<?= $data['jumlah_menu'] ?>">
                        <a class="btn-plus" href="#" data-id="<?= $data['id_pesanan']; ?>"><i class="fa fa-plus"></i></a>
                      </div>
                    </td>
                    <td data-column="Sub Total" class="subtotal" data-id="<?= $data['id_pesanan']; ?>">Rp.<?= number_format($data['harga'] * $data['jumlah_menu']) ?></td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
          <div class="totalAmountArea">
            <ul class="list-unstyled">
              <li><strong>Sub Total</strong> <span class="subTotalAmount">Rp.0</span></li>
              <li><strong>Grand Total</strong> <span class="grandTotal">Rp.0</span></li>
            </ul>
          </div>
          <div class="checkBtnArea text-right">
            <button type="submit" name="add_pesanan" class="button-primary">Pesan</button>
          </div>
        </form>
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