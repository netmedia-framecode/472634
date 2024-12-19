<?php
  
  require_once("../../config/Base.php");
  require_once("../../config/Auth.php");
  require_once("../../config/Alert.php");
  require_once("../../views/data-master/redirect.php");
  
  $tempat_kafe = "SELECT * FROM tempat_kafe";
  $view_tempat_kafe = mysqli_query($conn, $tempat_kafe);
  if (isset($_POST["add_tempat_kafe"])) {
    $validated_post = array_map(function ($value) use ($conn) {
      return valid($conn, $value);
    }, $_POST);
    if (tempat_kafe($conn, $validated_post, $action = 'insert') > 0) {
      $message = "Kafe baru berhasil ditambahkan.";
      $message_type = "success";
      alert($message, $message_type);
      header("Location: kafe");
      exit();
    }
  }
  if (isset($_POST["edit_tempat_kafe"])) {
    $validated_post = array_map(function ($value) use ($conn) {
      return valid($conn, $value);
    }, $_POST);
    if (tempat_kafe($conn, $validated_post, $action = 'update') > 0) {
      $message = "Kafe " . $_POST['nama_tempatOld'] . " berhasil diubah.";
      $message_type = "success";
      alert($message, $message_type);
      header("Location: kafe");
      exit();
    }
  }
  if (isset($_POST["delete_tempat_kafe"])) {
    $validated_post = array_map(function ($value) use ($conn) {
      return valid($conn, $value);
    }, $_POST);
    if (tempat_kafe($conn, $validated_post, $action = 'delete') > 0) {
      $message = "Kafe " . $_POST['nama_tempat'] . " berhasil dihapus.";
      $message_type = "success";
      alert($message, $message_type);
      header("Location: kafe");
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
      header("Location: add-menu?p=".$_POST['id_tempat']);
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
      header("Location: edit-menu?p=".$_POST['id_menu']."&ps=".$_POST['id_tempat']);
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
      header("Location: list-menu?p=".$_POST['id_tempat']);
      exit();
    }
  }

  $hari_array = ["Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu", "Minggu"];
  if (isset($_POST["add_jam_operasional"])) {
    $validated_post = array_map(function ($value) use ($conn) {
      return valid($conn, $value);
    }, $_POST);
    if (jam_operasional($conn, $validated_post, $action = 'insert') > 0) {
      $message = "Jam operasional baru berhasil ditambahkan.";
      $message_type = "success";
      alert($message, $message_type);
      header("Location: add-jam-operasional?p=".$_POST['id_tempat']);
      exit();
    }
  }
  if (isset($_POST["edit_jam_operasional"])) {
    $validated_post = array_map(function ($value) use ($conn) {
      return valid($conn, $value);
    }, $_POST);
    if (jam_operasional($conn, $validated_post, $action = 'update') > 0) {
      $message = "Jam operasional " . $_POST['nama_tempatOld'] . " berhasil diubah.";
      $message_type = "success";
      alert($message, $message_type);
      header("Location: edit-jam-operasional?p=".$_POST['id_jam']."&ps=".$_POST['id_tempat']);
      exit();
    }
  }
  if (isset($_POST["delete_menu"])) {
    $validated_post = array_map(function ($value) use ($conn) {
      return valid($conn, $value);
    }, $_POST);
    if (jam_operasional($conn, $validated_post, $action = 'delete') > 0) {
      $message = "Jam operasional " . $_POST['nama_tempat'] . " berhasil dihapus.";
      $message_type = "success";
      alert($message, $message_type);
      header("Location: list-jam-operasional?p=".$_POST['id_tempat']);
      exit();
    }
  }

  $galeri = "SELECT * FROM galeri JOIN tempat_kafe ON galeri.id_tempat = tempat_kafe.id_tempat";
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