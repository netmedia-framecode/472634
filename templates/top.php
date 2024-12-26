<!doctype html>
<html lang="en">

<head>
  <?php require_once("sections/head.php");?>
</head>
<body class="home">
  <?php foreach ($messageTypes as $type) {
    if (isset($_SESSION["project_portal_wisata_kafe"]["message_$type"])) {
      echo "<div class='message-$type' data-message-$type='{$_SESSION["project_portal_wisata_kafe"]["message_$type"]}'></div>";
    } else if (isset($_SESSION["project_portal_wisata_kafe"]["users"]["message_$type"])) {
      echo "<div class='message-$type' data-message-$type='{$_SESSION["project_portal_wisata_kafe"]["users"]["message_$type"]}'></div>";
    }
  } ?>
  <div id="siteLoader" class="site-loader">
    <div class="preloader-content">
      <img src="assets/img/loader1.gif" alt="">
    </div>
  </div>
  <div id="page" class="full-page">
    <?php require_once("sections/navbar.php");?>