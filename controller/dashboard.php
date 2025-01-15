<?php

require_once("../config/Base.php");
require_once("../config/Auth.php");
require_once("../config/Alert.php");
require_once("redirect.php");

if ($status == 'superadmin') {
  $tempat_kafe = "SELECT * FROM tempat_kafe";
} else if ($status == 'admin') {
  $tempat_kafe = "SELECT * FROM tempat_kafe WHERE id_user='$id_user'";
}
$view_tempat_kafe = mysqli_query($conn, $tempat_kafe);
$count_tempat_kafe = mysqli_num_rows($view_tempat_kafe);
if ($status == 'superadmin') {
  $menu = "SELECT * FROM menu";
} else if ($status == 'admin') {
  $menu = "SELECT * FROM menu JOIN tempat_kafe ON menu.id_tempat = tempat_kafe.id_tempat WHERE tempat_kafe.id_user='$id_user'";
}
$view_menu = mysqli_query($conn, $menu);
$count_menu = mysqli_num_rows($view_menu);
if ($status == 'superadmin') {
  $jam_operasional = "SELECT * FROM waktu_operasional";
} else if ($status == 'admin') {
  $jam_operasional = "SELECT * FROM waktu_operasional JOIN tempat_kafe ON waktu_operasional.id_tempat = tempat_kafe.id_tempat WHERE tempat_kafe.id_user='$id_user'";
}
$view_jam_operasional = mysqli_query($conn, $jam_operasional);
$count_jam_operasional = mysqli_num_rows($view_jam_operasional);
if ($status == 'superadmin') {
  $galeri = "SELECT * FROM galeri JOIN tempat_kafe ON galeri.id_tempat = tempat_kafe.id_tempat";
} else if ($status == 'admin') {
  $galeri = "SELECT * FROM galeri JOIN tempat_kafe ON galeri.id_tempat = tempat_kafe.id_tempat WHERE tempat_kafe.id_user='$id_user'";
}
$view_galeri = mysqli_query($conn, $galeri);
$count_galeri = mysqli_num_rows($view_galeri);
