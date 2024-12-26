<header id="masthead" class="site-header header-primary">
  <div class="bottom-header">
    <div class="container d-flex justify-content-between align-items-center">
      <div class="site-identity">
        <h1 class="site-title">
          <a href="./">
            <img class="white-logo" src="assets/img/<?= $data_utilities['logo'] ?>" style="width: 65px;" alt="logo">
          </a>
        </h1>
      </div>
      <div class="main-navigation d-none d-lg-block">
        <nav id="navigation" class="navigation">
          <ul>
            <li>
              <a href="./">Beranda</a>
            </li>
            <li>
              <a href="tempat-kafe">Tempat Kafe</a>
            </li>
            <li>
              <a href="galeri">Galeri</a>
            </li>
            <?php if (isset($_SESSION["project_portal_wisata_kafe"]["users"])) { ?>
              <li>
                <a href="pemesanan">Pemesanan</a>
              </li>
            <?php } ?>
          </ul>
        </nav>
      </div>
      <div class="header-btn">
        <?php if (!isset($_SESSION["project_portal_wisata_kafe"]["users"])) { ?>
          <a href="auth/" class="button-primary"><i class="bi bi-box-arrow-in-right"></i> Login</a>
        <?php } else { ?>
          <a href="keranjang" class="button-primary"><i class="bi bi-cart"></i></a>
          <span class="separator"></span>
          <a href="auth/logout" class="button-primary"><i class="bi bi-box-arrow-left"></i> Logout</a>
          <style>
            .button-primary {
              text-decoration: none;
              padding: 10px 15px;
              margin: 0 5px;
              background-color: #007bff;
              color: white;
              border-radius: 5px;
            }

            .separator {
              display: inline-block;
              width: 1px;
              height: 40px;
              background-color: #ccc;
              margin: 0 10px;
            }
          </style>

        <?php } ?>
      </div>
    </div>
  </div>
  <div class="mobile-menu-container"></div>
</header>