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
              <li><strong>PPN</strong> <span class="ppn"><?= $data['pajak']?>% - Rp.0</span></li>
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
  document.addEventListener("DOMContentLoaded", function () {
    const subTotalElement = document.querySelector(".subTotalAmount");
    const ppnElement = document.querySelector(".ppn");
    const grandTotalElement = document.querySelector(".grandTotal");
    const cartTable = document.querySelector("table");

    // Ambil nilai PPN dari elemen ppn (diberikan dari server-side melalui $data['pajak'])
    const PPN_RATE = parseFloat(ppnElement.textContent.split("%")[0]) || 0;

    // Fungsi untuk menghitung dan memperbarui nilai PPN dan Grand Total
    function updateTotals() {
      let total = 0;

      // Hitung Sub Total
      document.querySelectorAll(".subtotal").forEach((subtotal) => {
        const value = parseFloat(subtotal.textContent.replace(/Rp\.|,/g, "")) || 0;
        total += value;
      });

      // Hitung nilai PPN dan Grand Total
      const ppnAmount = total * (PPN_RATE / 100);
      const grandTotal = total + ppnAmount;

      // Perbarui elemen dengan nilai yang dihitung
      subTotalElement.textContent = `Rp.${total.toLocaleString()}`; // Tetap seperti awal
      ppnElement.textContent = `${PPN_RATE}% - Rp.${ppnAmount.toLocaleString()}`; // Tampilkan PPN
      grandTotalElement.textContent = `Rp.${grandTotal.toLocaleString()}`; // Tampilkan Grand Total
    }

    // Handle quantity changes
    cartTable.addEventListener("click", function (e) {
      if (e.target.closest(".btn-minus") || e.target.closest(".btn-plus")) {
        e.preventDefault();

        const button = e.target.closest("a");
        const inputField = button.parentElement.querySelector(".jumlah");
        const id_pesanan = button.dataset.id;
        let currentValue = parseInt(inputField.value, 10);
        const isPlus = button.classList.contains("btn-plus");

        // Perbarui jumlah
        currentValue = isPlus ? currentValue + 1 : Math.max(1, currentValue - 1);
        inputField.value = currentValue;

        // Perbarui subtotal untuk baris ini
        const row = button.closest("tr");
        const price = parseFloat(row.querySelector("[data-column='Price']").textContent.replace(/Rp\.|,/g, ""));
        const subtotalField = row.querySelector(".subtotal");
        const subtotal = price * currentValue;
        subtotalField.textContent = `Rp.${subtotal.toLocaleString()}`;

        updateTotals();

        // Kirim data ke server untuk update keranjang
        updateCartQuantity(id_pesanan, currentValue);
      }
    });

    cartTable.addEventListener("change", function (e) {
      if (e.target.classList.contains("jumlah")) {
        const inputField = e.target;
        const currentValue = parseInt(inputField.value, 10) || 1; // Default ke 1 jika invalid
        inputField.value = currentValue;

        // Perbarui subtotal untuk baris ini
        const row = inputField.closest("tr");
        const price = parseFloat(row.querySelector("[data-column='Price']").textContent.replace(/Rp\.|,/g, ""));
        const subtotalField = row.querySelector(".subtotal");
        const subtotal = price * currentValue;
        subtotalField.textContent = `Rp.${subtotal.toLocaleString()}`;

        updateTotals();

        // Kirim data ke server untuk update keranjang
        updateCartQuantity(inputField.dataset.id, currentValue);
      }
    });

    // Fungsi untuk mengirim pembaruan jumlah pesanan ke server
    function updateCartQuantity(id, quantity) {
      fetch("update_keranjang.php", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify({
          id_pesanan: id,
          jumlah_menu: quantity,
        }),
      })
        .then((response) => response.json())
        .then((data) => {
          if (data.success) {
            console.log("Keranjang berhasil diperbarui!");
          } else {
            console.error("Gagal memperbarui keranjang.");
          }
        })
        .catch((error) => console.error("Terjadi kesalahan:", error));
    }

    // Lakukan perhitungan awal setelah halaman dimuat
    updateTotals();
  });
</script>

