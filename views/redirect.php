<?php if (!isset($_SESSION["project_portal_wisata_kafe"]["users"])) {
  header("Location: ../auth/");
  exit;
} else {
  if ($_SESSION["project_portal_wisata_kafe"]["users"]["status"] == "pembeli") {
    header("Location: ../");
    exit;
  }
}
