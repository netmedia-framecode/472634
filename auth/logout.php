<?php if (!isset($_SESSION)) {
  session_start();
}
require_once("../controller/auth.php");
if (isset($_SESSION["project_portal_wisata_kafe"])) {
  unset($_SESSION["project_portal_wisata_kafe"]);
  header("Location: ./");
  exit();
}
