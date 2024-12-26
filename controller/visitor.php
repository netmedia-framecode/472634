<?php

require_once("config/Base.php");
require_once("config/Alert.php");

$tempat_kafe_one = "SELECT * FROM tempat_kafe ORDER BY id_tempat DESC LIMIT 2";
$view_tempat_kafe_one = mysqli_query($conn, $tempat_kafe_one);
$tempat_kafe_two = "SELECT * FROM tempat_kafe ORDER BY id_tempat DESC LIMIT 2, 2";
$view_tempat_kafe_two = mysqli_query($conn, $tempat_kafe_two);

$galeri_one = "SELECT * FROM galeri ORDER BY id_galeri DESC LIMIT 1";
$view_galeri_one = mysqli_query($conn, $galeri_one);
$galeri_two = "SELECT * FROM galeri ORDER BY id_galeri DESC LIMIT 1, 2";
$view_galeri_two = mysqli_query($conn, $galeri_two);
$galeri_three = "SELECT * FROM galeri ORDER BY id_galeri DESC LIMIT 3, 1";
$view_galeri_three = mysqli_query($conn, $galeri_three);

if (isset($_POST['search_tempat_kafe'])) {
  $keyword = valid($conn, $_POST['keyword']);
  $tempat_kafe_one_all = "SELECT * FROM tempat_kafe WHERE id_tempat % 2 = 0 AND nama_tempat LIKE '%$keyword%' ORDER BY id_tempat DESC";
  $view_tempat_kafe_one_all = mysqli_query($conn, $tempat_kafe_one_all);
  $tempat_kafe_two_all = "SELECT * FROM tempat_kafe WHERE id_tempat % 2 = 1 AND nama_tempat LIKE '%$keyword%' ORDER BY id_tempat DESC";
  $view_tempat_kafe_two_all = mysqli_query($conn, $tempat_kafe_two_all);
} else {
  $tempat_kafe_one_all = "SELECT * FROM tempat_kafe WHERE id_tempat % 2 = 0 ORDER BY id_tempat DESC";
  $view_tempat_kafe_one_all = mysqli_query($conn, $tempat_kafe_one_all);
  $tempat_kafe_two_all = "SELECT * FROM tempat_kafe WHERE id_tempat % 2 = 1 ORDER BY id_tempat DESC";
  $view_tempat_kafe_two_all = mysqli_query($conn, $tempat_kafe_two_all);
}

if (isset($_GET["p"])) {
  $id_tempat = valid($conn, $_GET['p']);
  $tempat_kafe = "SELECT * FROM tempat_kafe WHERE id_tempat != '$id_tempat'";
} else {
  $tempat_kafe = "SELECT * FROM tempat_kafe";
}
$view_tempat_kafe = mysqli_query($conn, $tempat_kafe);

$galeri = "SELECT * FROM galeri JOIN tempat_kafe ON galeri.id_tempat = tempat_kafe.id_tempat ORDER BY galeri.id_galeri DESC";
$view_galeri = mysqli_query($conn, $galeri);

$menu = "SELECT * FROM menu";
$view_menu = mysqli_query($conn, $menu);
if (isset($_POST['add_cart'])) {
  $validated_post = array_map(function ($value) use ($conn) {
    return valid($conn, $value);
  }, $_POST);
  if (function_exists('cart')) {
    if (cart($conn, $validated_post, $action = 'insert') > 0) {
      $message = "Berhasil menambahkan menu ke keranjang.";
      $message_type = "success";
      if (isset($_SESSION["project_portal_wisata_kafe"]["users"])) {
        $id_user = valid($conn, $_SESSION["project_portal_wisata_kafe"]["users"]["id"]);
        $name = valid($conn, $_SESSION["project_portal_wisata_kafe"]["users"]["name"]);
        $role = valid($conn, $_SESSION["project_portal_wisata_kafe"]["users"]["role"]);
        $no_telpon = valid($conn, $_SESSION["project_portal_wisata_kafe"]["users"]["no_telpon"]);
        $_SESSION["project_portal_wisata_kafe"]["users"] = [
          "id" => $id_user,
          "name" => $name,
          "role" => $role,
          "no_telpon" => $no_telpon,
          "message_$message_type" => $message,
          "time_message" => time()
        ];
      } else {
        $_SESSION["project_portal_wisata_kafe"] = [
          "message_$message_type" => $message,
          "time_message" => time()
        ];
      }
      header("Location: tempat-kafe?p=" . $_POST['id_tempat']);
      exit();
    }
  } else {
    $message = "Sepertinya ada kesalahan saat menghubungkan ke system.";
    $message_type = "danger";
    alert($message, $message_type);
    header("Location: tempat-kafe?p=" . $_POST['id_tempat']);
    exit();
  }
}

if (isset($_SESSION["project_portal_wisata_kafe"]["users"])) {
  require_once("config/Auth.php");
  $pesanan = "SELECT * FROM pesanan JOIN menu ON pesanan.id_menu = menu.id_menu JOIN tempat_kafe ON pesanan.id_tempat = tempat_kafe.id_tempat JOIN melakukan ON pesanan.id_pesanan = melakukan.id_pesanan WHERE melakukan.id_user = '$id_user' AND pesanan.status_pesanan = 'Menunggu'";
  $view_pesanan = mysqli_query($conn, $pesanan);
  if (isset($_POST["delete_cart"])) {
    $validated_post = array_map(function ($value) use ($conn) {
      return valid($conn, $value);
    }, $_POST);
    if (cart($conn, $validated_post, $action = 'delete') > 0) {
      $message = "Menu " . $_POST['nama_menu'] . " berhasil dihapus dari keranjang.";
      $message_type = "success";
      alert($message, $message_type);
      header("Location: keranjang");
      exit();
    }
  }
  if (isset($_POST["add_pesanan"])) {
    $validated_post = array_map(function ($value) use ($conn) {
      return valid($conn, $value);
    }, $_POST);
    if (cart($conn, $validated_post, $action = 'update') > 0) {
      $message = "Berhasil melakukan pemesanan.";
      $message_type = "success";
      alert($message, $message_type);
      header("Location: pemesanan");
      exit();
    }
  }

  $kafe_pesanan = "SELECT * 
    FROM pesanan 
    JOIN tempat_kafe ON pesanan.id_tempat = tempat_kafe.id_tempat 
    JOIN melakukan ON pesanan.id_pesanan = melakukan.id_pesanan 
    WHERE melakukan.id_user = '$id_user' 
    AND pesanan.status_pesanan != 'Menunggu' 
    GROUP BY pesanan.id_tempat, DATE(pesanan.waktu_pesanan)";
  $view_kafe_pesanan = mysqli_query($conn, $kafe_pesanan);
}
