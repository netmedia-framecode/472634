<?php if (!isset($_SESSION["project_portal_wisata_kafe"]["users"])) {
  header("Location: ../../auth/");
  exit;
} else {
  if ($_SESSION["project_portal_wisata_kafe"]["users"]["role"] == "user") {
    header("Location: ../../");
    exit;
  }
}
