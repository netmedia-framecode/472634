<?php

require_once("../config/Base.php");
require_once("../config/Auth.php");
require_once("../config/Alert.php");

$tempat_kafe = "SELECT * FROM tempat_kafe";
$view_tempat_kafe = mysqli_query($conn, $tempat_kafe);
$count_tempat_kafe = mysqli_num_rows($view_tempat_kafe);
$menu = "SELECT * FROM menu";
$view_menu = mysqli_query($conn, $menu);
$count_menu = mysqli_num_rows($view_menu);
$jam_operasional = "SELECT * FROM jam_operasional";
$view_jam_operasional = mysqli_query($conn, $jam_operasional);
$count_jam_operasional = mysqli_num_rows($view_jam_operasional);
$galeri = "SELECT * FROM galeri";
$view_galeri = mysqli_query($conn, $galeri);
$count_galeri = mysqli_num_rows($view_galeri);