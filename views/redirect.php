<?php
if (!isset($_SESSION["project_portal_wisata_kafe"]["users"])) {
  header("Location: ../auth/");
  exit;
}
