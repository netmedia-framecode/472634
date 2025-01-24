<?php if (!isset($_SESSION[""])) {
  session_start();
}
error_reporting(~E_NOTICE & ~E_DEPRECATED);
require_once("Database.php");
require_once(__DIR__ . "/../assets/vendor/autoload.php");
require_once(__DIR__ . "/../controller/Functions.php");
require_once(__DIR__ . "/../models/sql.php");

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

$baseURL = "http://$_SERVER[HTTP_HOST]/apps/website/tugas/portal_wisata_kafe/";
$hostname = $_SERVER['HTTP_HOST'];
$port = $_SERVER['SERVER_PORT'];
if (strpos($hostname, 'apps.test') !== false && $port == 8080) {
  $baseURL = str_replace('/apps/', '/', $baseURL);
}
$name_website = "Portal Wisata Kafe";

$data_auth = [
  'model' => 2,
  'bg'=> '#4e73de',
  'image' => 'auth.png'
];

$data_utilities = [
  'logo' => 'logo.png',
  'name_web' => 'Portal Wisata Kafe',
  'keyword'=> '',
  'description'=> '',
  'author'=> 'Alfinardus Dedi Tasman'
];
