<?php

require_once("../../config/Base.php");
require_once("../../config/Auth.php");
require_once("../../config/Alert.php");
require_once("redirect.php");

if ($status == 'superadmin') {
  $tempat_kafe = "SELECT * FROM tempat_kafe";
} else if ($status == 'admin') {
  $tempat_kafe = "SELECT * FROM tempat_kafe WHERE id_user='$id_user'";
}
$view_tempat_kafe = mysqli_query($conn, $tempat_kafe);
if (isset($_POST["add_tempat_kafe"])) {
  $validated_post = array_map(function ($value) use ($conn) {
    return valid($conn, $value);
  }, $_POST);
  if (tempat_kafe($conn, $validated_post, $action = 'insert', $id_user) > 0) {
    $message = "Kafe baru berhasil ditambahkan.";
    $message_type = "success";
    alert($message, $message_type);
    header("Location: add-kafe");
    exit();
  }
}
if (isset($_POST["edit_tempat_kafe"])) {
  $validated_post = array_map(function ($value) use ($conn) {
    return valid($conn, $value);
  }, $_POST);
  if (tempat_kafe($conn, $validated_post, $action = 'update', $id_user) > 0) {
    $message = "Kafe " . $_POST['nama_tempatOld'] . " berhasil diubah.";
    $message_type = "success";
    alert($message, $message_type);
    header("Location: edit-kafe?p=".$_POST['id_tempat']);
    exit();
  }
}
if (isset($_POST["delete_tempat_kafe"])) {
  $validated_post = array_map(function ($value) use ($conn) {
    return valid($conn, $value);
  }, $_POST);
  if (tempat_kafe($conn, $validated_post, $action = 'delete', $id_user) > 0) {
    $message = "Kafe " . $_POST['nama_tempat'] . " berhasil dihapus.";
    $message_type = "success";
    alert($message, $message_type);
    header("Location: tempat-kafe");
    exit();
  }
}

$hari_array = ["Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu", "Minggu"];
if (isset($_POST["add_jam_operasional"])) {
  $validated_post = array_map(function ($value) use ($conn) {
    return valid($conn, $value);
  }, $_POST);
  if (waktu_operasional($conn, $validated_post, $action = 'insert') > 0) {
    $message = "Jam operasional baru berhasil ditambahkan.";
    $message_type = "success";
    alert($message, $message_type);
    header("Location: add-jam-operasional?p=" . $_POST['id_tempat']);
    exit();
  }
}
if (isset($_POST["edit_jam_operasional"])) {
  $validated_post = array_map(function ($value) use ($conn) {
    return valid($conn, $value);
  }, $_POST);
  if (waktu_operasional($conn, $validated_post, $action = 'update') > 0) {
    $message = "Jam operasional " . $_POST['nama_tempatOld'] . " berhasil diubah.";
    $message_type = "success";
    alert($message, $message_type);
    header("Location: edit-jam-operasional?p=" . $_POST['id_waktu_operasional'] . "&ps=" . $_POST['id_tempat']);
    exit();
  }
}
if (isset($_POST["delete_menu"])) {
  $validated_post = array_map(function ($value) use ($conn) {
    return valid($conn, $value);
  }, $_POST);
  if (waktu_operasional($conn, $validated_post, $action = 'delete') > 0) {
    $message = "Jam operasional " . $_POST['nama_tempat'] . " berhasil dihapus.";
    $message_type = "success";
    alert($message, $message_type);
    header("Location: list-jam-operasional?p=" . $_POST['id_tempat']);
    exit();
  }
}

if (isset($_POST["add_menu"])) {
  $validated_post = array_map(function ($value) use ($conn) {
    return valid($conn, $value);
  }, $_POST);
  if (menu_kafe($conn, $validated_post, $action = 'insert') > 0) {
    $message = "Menu baru berhasil ditambahkan.";
    $message_type = "success";
    alert($message, $message_type);
    header("Location: add-menu?p=" . $_POST['id_tempat']);
    exit();
  }
}
if (isset($_POST["edit_menu"])) {
  $validated_post = array_map(function ($value) use ($conn) {
    return valid($conn, $value);
  }, $_POST);
  if (menu_kafe($conn, $validated_post, $action = 'update') > 0) {
    $message = "Menu " . $_POST['nama_menuOld'] . " berhasil diubah.";
    $message_type = "success";
    alert($message, $message_type);
    header("Location: edit-menu?p=" . $_POST['id_menu'] . "&ps=" . $_POST['id_tempat']);
    exit();
  }
}
if (isset($_POST["delete_menu"])) {
  $validated_post = array_map(function ($value) use ($conn) {
    return valid($conn, $value);
  }, $_POST);
  if (menu_kafe($conn, $validated_post, $action = 'delete') > 0) {
    $message = "Menu " . $_POST['nama_menu'] . " berhasil dihapus.";
    $message_type = "success";
    alert($message, $message_type);
    header("Location: list-menu?p=" . $_POST['id_tempat']);
    exit();
  }
}

if ($status == 'superadmin') {
  $galeri = "SELECT * FROM galeri JOIN tempat_kafe ON galeri.id_tempat = tempat_kafe.id_tempat";
} else if ($status == 'admin') {
  $galeri = "SELECT * FROM galeri JOIN tempat_kafe ON galeri.id_tempat = tempat_kafe.id_tempat WHERE tempat_kafe.id_user='$id_user'";
}
$view_galeri = mysqli_query($conn, $galeri);
if (isset($_POST["add_galeri"])) {
  $validated_post = array_map(function ($value) use ($conn) {
    return valid($conn, $value);
  }, $_POST);
  if (galeri($conn, $validated_post, $action = 'insert') > 0) {
    $message = "Gambar baru berhasil dimasukan ke galeri.";
    $message_type = "success";
    alert($message, $message_type);
    header("Location: galeri");
    exit();
  }
}
if (isset($_POST["delete_galeri"])) {
  $validated_post = array_map(function ($value) use ($conn) {
    return valid($conn, $value);
  }, $_POST);
  if (galeri($conn, $validated_post, $action = 'delete') > 0) {
    $message = "Gambar " . $_POST['nama_tempat'] . " berhasil dihapus.";
    $message_type = "success";
    alert($message, $message_type);
    header("Location: galeri");
    exit();
  }
}

if ($status == 'superadmin') {
  $pesanan = "SELECT pesanan.*, menu.nama_menu, menu.harga, menu.pajak, tempat_kafe.nama_tempat, tempat_kafe.nama_jalan, tempat_kafe.peta_lokasi, tempat_kafe.kontak FROM pesanan JOIN menu ON pesanan.id_menu = menu.id_menu JOIN tempat_kafe ON menu.id_tempat = tempat_kafe.id_tempat";
} else if ($status == 'admin') {
  $pesanan = "SELECT pesanan.*, menu.nama_menu, menu.harga, menu.pajak, tempat_kafe.nama_tempat, tempat_kafe.nama_jalan, tempat_kafe.peta_lokasi, tempat_kafe.kontak FROM pesanan JOIN menu ON pesanan.id_menu = menu.id_menu JOIN tempat_kafe ON menu.id_tempat = tempat_kafe.id_tempat WHERE tempat_kafe.id_user = '$id_user'";
}
$view_pesanan = mysqli_query($conn, $pesanan);
$status_pesanan_array = ["Diterima", "Ditolak"];
if (isset($_POST["edit_pesanan"])) {
  $validated_post = array_map(function ($value) use ($conn) {
    return valid($conn, $value);
  }, $_POST);
  if (pesanan($conn, $validated_post, $action = 'update') > 0) {
    $message = "Status pesanan berhasil diubah.";
    $message_type = "success";
    alert($message, $message_type);
    header("Location: pesanan");
    exit();
  }
}
