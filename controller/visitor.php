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

$tempat_kafe_one_all = "SELECT * FROM tempat_kafe WHERE id_tempat % 2 = 0 ORDER BY id_tempat DESC";
$view_tempat_kafe_one_all = mysqli_query($conn, $tempat_kafe_one_all);
$tempat_kafe_two_all = "SELECT * FROM tempat_kafe WHERE id_tempat % 2 = 1 ORDER BY id_tempat DESC";
$view_tempat_kafe_two_all = mysqli_query($conn, $tempat_kafe_two_all);

$tempat_kafe = "SELECT * FROM tempat_kafe";
$view_tempat_kafe = mysqli_query($conn, $tempat_kafe);

$galeri = "SELECT * FROM galeri JOIN tempat_kafe ON galeri.id_tempat = tempat_kafe.id_tempat ORDER BY galeri.id_galeri DESC";
$view_galeri = mysqli_query($conn, $galeri);