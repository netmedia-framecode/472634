<?php if (!isset($_SESSION[""])) {
  session_start();
}
error_reporting(~E_NOTICE & ~E_DEPRECATED);
require_once("Database.php");
require_once("Mail.php");
require_once(__DIR__ . "/../models/sql.php");
require_once(__DIR__ . "/../assets/vendor/autoload.php");
require_once(__DIR__ . "/../controller/Functions.php");

$baseURL = "http://$_SERVER[HTTP_HOST]/apps/tugas/portal_wisata_kafe/";
$hostname = $_SERVER['HTTP_HOST'];
$port = $_SERVER['SERVER_PORT'];
if (strpos($hostname, 'apps.test') !== false && $port == 8080) {
  $baseURL = str_replace('/apps/', '/', $baseURL);
}
$name_website = "Portal Wisata Kafe";

// $select_auth = "SELECT * FROM auth";
// $views_auth = mysqli_query($conn, $select_auth);
// $data_auth = mysqli_fetch_assoc($views_auth);
$data_auth = [
  'model' => 2,
  'bg'=> '#4e73de',
  'image' => 'auth.png'
];

// $select_utilities = "SELECT * FROM utilities";
// $views_utilities = mysqli_query($conn, $select_utilities);
// $data_utilities = mysqli_fetch_assoc($views_utilities);
$data_utilities = [
  'logo' => 'logo.png',
  'name_web' => 'Portal Wisata Kafe',
  'keyword'=> '',
  'description'=> '',
  'author'=> 'Alfinardus Dedi Tasman'
];
