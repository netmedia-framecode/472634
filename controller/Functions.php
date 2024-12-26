<?php

function handle_error($errno, $errstr, $errfile, $errline)
{
  // Create error log file path based on the file where the error occurred
  $errorLog = dirname(__FILE__) . '/error_log.log'; // Error log file location within the project folder

  // Format error message with additional information
  $error_message = "[" . date("Y-m-d H:i:s") . "] Error [$errno]: $errstr in $errfile on line $errline" . PHP_EOL;

  // Attempt to open the error log file in append mode, creating it if it doesn't exist
  $file_handle = fopen($errorLog, 'a');
  if ($file_handle !== false) {
    // Write error message to the log file
    fwrite($file_handle, $error_message);
    // Close the file handle
    fclose($file_handle);
  }

  // Save error message in session
  $_SESSION['error_message'] = $error_message;

  // Redirect user back to the same page only if there is no error
  if (!isset($_SESSION['error_flag'])) {
    // Set error flag to prevent infinite redirection loop
    $_SESSION['error_flag'] = true;
    // Redirect user back to the same page
    header("Location: {$_SERVER['REQUEST_URI']}");
    exit(); // Stop further execution
  }
}

function valid($conn, $value)
{
  $valid = htmlspecialchars(addslashes(trim(mysqli_real_escape_string($conn, $value))));
  return $valid;
}

function separateAlphaNumeric($string)
{
  $alpha = "";
  $numeric = "";
  // Mengiterasi setiap karakter dalam string
  for ($i = 0; $i < strlen($string); $i++) {
    // Memeriksa apakah karakter adalah huruf
    if (ctype_alpha($string[$i])) {
      $alpha .= $string[$i];
    }
    // Memeriksa apakah karakter adalah angka
    if (ctype_digit($string[$i])) {
      $numeric .= $string[$i];
    }
  }
  // Mengembalikan array yang berisi huruf dan angka terpisah
  return array(
    "alpha" => $alpha,
    "numeric" => $numeric
  );
}

function generateToken()
{
  // Generate a random 6-digit number
  $token = mt_rand(100000, 999999);
  return $token;
}

function compressImage($source, $destination, $quality)
{
  // mendapatkan info image
  $imgInfo = getimagesize($source);
  $mime = $imgInfo['mime'];
  // membuat image baru
  switch ($mime) {
      // proses kode memilih tipe tipe image 
    case 'image/jpeg':
      $image = imagecreatefromjpeg($source);
      break;
    case 'image/png':
      $image = imagecreatefrompng($source);
      break;
    default:
      $image = imagecreatefromjpeg($source);
  }

  // Menyimpan image dengan ukuran yang baru
  imagejpeg($image, $destination, $quality);

  // Return image
  return $destination;
}

function hapusFolderRecursively($folderPath)
{
  if (is_dir($folderPath)) {
    $files = glob($folderPath . '/*');
    foreach ($files as $file) {
      is_dir($file) ? hapusFolderRecursively($file) : unlink($file);
    }
    rmdir($folderPath);
  }
}

function cart($conn, $data, $action)
{
  if ($action == "insert") {
    if (!isset($_SESSION["project_portal_wisata_kafe"]["users"])) {
      $checkUser = mysqli_query($conn, "SELECT * FROM users WHERE username='$data[username]'");
      if (mysqli_num_rows($checkUser) > 0) {
        $row = mysqli_fetch_assoc($checkUser);
        if (password_verify($data['password'], $row["password"])) {
          $_SESSION["project_portal_wisata_kafe"]["users"] = [
            "id" => $row["id_user"],
            "name" => $row["username"],
            "role" => "user",
            "no_telpon" => $row["no_telpon"]
          ];
          $sql = "
            INSERT INTO pesanan (id_menu,id_tempat,total_harga,jumlah_menu) VALUES ('$data[id_menu]','$data[id_tempat]','$data[total_harga]','$data[jumlah_menu]');
            INSERT INTO melakukan (id_user,id_pesanan) VALUES ('$row[id_user]',LAST_INSERT_ID());
          ";
          mysqli_multi_query($conn, $sql);
        } else {
          $message = "Maaf, kata sandi yang anda masukan salah.";
          $message_type = "danger";
          alert($message, $message_type);
          return false;
        }
      } else {
        $message = "Maaf, akun yang anda masukan belum terdaftar.";
        $message_type = "danger";
        alert($message, $message_type);
        return false;
      }
    } else {
      $sql = "
        INSERT INTO pesanan (id_menu,id_tempat,total_harga,jumlah_menu) VALUES ('$data[id_menu]','$data[id_tempat]','$data[total_harga]','$data[jumlah_menu]');
        INSERT INTO melakukan (id_user,id_pesanan) VALUES ('$data[id_user]',LAST_INSERT_ID());
      ";
      mysqli_multi_query($conn, $sql);
    }
  }

  if ($action == "update") {
    $sql = "UPDATE pesanan SET status_pesanan = 'Diproses' WHERE id_tempat = '$data[id_tempat]' AND status_pesanan = 'Menunggu'";
    mysqli_query($conn, $sql);
  }

  if ($action == "delete") {
    $sql = "DELETE FROM pesanan WHERE id_pesanan = '$data[id_pesanan]'";
    mysqli_query($conn, $sql);
  }

  return mysqli_affected_rows($conn);
}

if (!isset($_SESSION["project_portal_wisata_kafe"]["users"])) {
  function register($conn, $data, $action)
  {
    if ($action == "insert") {
      $checkUsername = "SELECT * FROM users WHERE username='$data[username]'";
      $checkUsername = mysqli_query($conn, $checkUsername);
      if (mysqli_num_rows($checkUsername) > 0) {
        $message = "Maaf, username yang anda masukan sudah terdaftar.";
        $message_type = "danger";
        alert($message, $message_type);
        return false;
      } else {
        if ($data['password'] !== $data['re_password']) {
          $message = "Maaf, konfirmasi password yang anda masukan belum sama.";
          $message_type = "danger";
          alert($message, $message_type);
          return false;
        } else {
          $password = password_hash($data['password'], PASSWORD_DEFAULT);
          $sql = "INSERT INTO users(username,password,no_telpon) VALUES('$data[username]','$password','$data[no_telpon]')";
        }
      }
    }

    mysqli_query($conn, $sql);
    return mysqli_affected_rows($conn);
  }

  function login($conn, $data)
  {
    // check account
    $checkAdmin = mysqli_query($conn, "SELECT * FROM admin WHERE username='$data[username]'");
    if (mysqli_num_rows($checkAdmin) > 0) {
      $row = mysqli_fetch_assoc($checkAdmin);
      if (password_verify($data['password'], $row["password"])) {
        $_SESSION["project_portal_wisata_kafe"]["users"] = [
          "id" => $row["id_admin"],
          "name" => $row["username"],
          "role" => "admin",
          "no_telpon" => 0
        ];
        return mysqli_affected_rows($conn);
      } else {
        $message = "Maaf, kata sandi yang anda masukan salah.";
        $message_type = "danger";
        alert($message, $message_type);
        return false;
      }
    } else if (mysqli_num_rows($checkAdmin) == 0) {
      $checkUser = mysqli_query($conn, "SELECT * FROM users WHERE username='$data[username]'");
      if (mysqli_num_rows($checkUser) > 0) {
        $row = mysqli_fetch_assoc($checkUser);
        if (password_verify($data['password'], $row["password"])) {
          $_SESSION["project_portal_wisata_kafe"]["users"] = [
            "id" => $row["id_user"],
            "name" => $row["username"],
            "role" => "user",
            "no_telpon" => $row["no_telpon"]
          ];
          return mysqli_affected_rows($conn);
        } else {
          $message = "Maaf, kata sandi yang anda masukan salah.";
          $message_type = "danger";
          alert($message, $message_type);
          return false;
        }
      } else {
        $message = "Maaf, akun yang anda masukan belum terdaftar.";
        $message_type = "danger";
        alert($message, $message_type);
        return false;
      }
    }
  }
}

if (isset($_SESSION["project_portal_wisata_kafe"]["users"])) {

  function tempat_kafe($conn, $data, $action)
  {
    if ($action == "insert") {
      $peta_lokasi = $data['latitude'] . "_" . $data['longitude'];
      $sql = "INSERT INTO tempat_kafe (nama_tempat,nama_jalan,peta_lokasi,kontak) VALUES ('$data[nama_tempat]','$data[nama_jalan]','$peta_lokasi','$data[kontak]')";
    }

    if ($action == "update") {
      $peta_lokasi = $data['latitude'] . "_" . $data['longitude'];
      $sql = "UPDATE tempat_kafe SET nama_tempat = '$data[nama_tempat]', nama_jalan='$data[nama_jalan]', peta_lokasi='$peta_lokasi', kontak='$data[kontak]' WHERE id_tempat = '$data[id_tempat]'";
    }

    if ($action == "delete") {
      $sql = "DELETE FROM tempat_kafe WHERE id_tempat = '$data[id_tempat]'";
    }

    mysqli_query($conn, $sql);
    return mysqli_affected_rows($conn);
  }

  function waktu_operasional($conn, $data, $action)
  {
    if ($action == "insert") {
      $sql = "INSERT INTO waktu_operasional (id_tempat,hari,jam_buka,jam_tutup) VALUES ('$data[id_tempat]','$data[hari]','$data[jam_buka]','$data[jam_tutup]')";
    }

    if ($action == "update") {
      $sql = "UPDATE waktu_operasional SET hari = '$data[hari]', jam_buka='$data[jam_buka]', jam_tutup='$data[jam_tutup]' WHERE id_waktu_operasional = '$data[id_waktu_operasional]'";
    }

    if ($action == "delete") {
      $sql = "DELETE FROM waktu_operasional WHERE id_waktu_operasional = '$data[id_waktu_operasional]'";
    }

    mysqli_query($conn, $sql);
    return mysqli_affected_rows($conn);
  }

  function menu_kafe($conn, $data, $action)
  {
    if ($action == "insert") {
      $sql = "INSERT INTO menu (id_tempat,nama_menu,harga) VALUES ('$data[id_tempat]','$data[nama_menu]','$data[harga]')";
    }

    if ($action == "update") {
      $sql = "UPDATE menu SET nama_menu = '$data[nama_menu]', harga='$data[harga]' WHERE id_menu = '$data[id_menu]'";
    }

    if ($action == "delete") {
      $sql = "DELETE FROM menu WHERE id_menu = '$data[id_menu]'";
    }

    mysqli_query($conn, $sql);
    return mysqli_affected_rows($conn);
  }

  function galeri($conn, $data, $action)
  {
    $path = "../../assets/img/galeri/";
    if ($action == "insert") {
      $fileName = basename($_FILES["image"]["name"]);
      $fileName = str_replace(" ", "-", $fileName);
      $fileName_encrypt = crc32($fileName);
      $ekstensiGambar = explode('.', $fileName);
      $ekstensiGambar = strtolower(end($ekstensiGambar));
      $imageUploadPath = $path . $fileName_encrypt . "." . $ekstensiGambar;
      $fileType = pathinfo($imageUploadPath, PATHINFO_EXTENSION);
      $allowTypes = array('jpg', 'png', 'jpeg');
      if (in_array($fileType, $allowTypes)) {
        $imageTemp = $_FILES["image"]["tmp_name"];
        compressImage($imageTemp, $imageUploadPath, 75);
        $image = $fileName_encrypt . "." . $ekstensiGambar;
      } else {
        $message = "Maaf, hanya file gambar JPG, JPEG, dan PNG yang diizinkan.";
        $message_type = "danger";
        alert($message, $message_type);
        return false;
      }
      $sql = "INSERT INTO galeri (id_tempat,nama_file) VALUES ('$data[id_tempat]','$image')";
    }

    // if ($action == "update") {
    //   if (!empty($_FILES['image']["name"])) {
    //     $fileName = basename($_FILES["image"]["name"]);
    //     $fileName = str_replace(" ", "-", $fileName);
    //     $fileName_encrypt = crc32($fileName);
    //     $ekstensiGambar = explode('.', $fileName);
    //     $ekstensiGambar = strtolower(end($ekstensiGambar));
    //     $imageUploadPath = $path . $fileName_encrypt . "." . $ekstensiGambar;
    //     $fileType = pathinfo($imageUploadPath, PATHINFO_EXTENSION);
    //     $allowTypes = array('jpg', 'png', 'jpeg');
    //     if (in_array($fileType, $allowTypes)) {
    //       unlink($path . $data['imageOld']);
    //       $imageTemp = $_FILES["image"]["tmp_name"];
    //       compressImage($imageTemp, $imageUploadPath, 75);
    //       $image = $fileName_encrypt . "." . $ekstensiGambar;
    //     } else {
    //       $message = "Maaf, hanya file gambar JPG, JPEG, dan PNG yang diizinkan.";
    //       $message_type = "danger";
    //       alert($message, $message_type);
    //       return false;
    //     }
    //   } else if (empty($_FILE['image']["name"])) {
    //     $image = $data['imageOld'];
    //   }
    //   $sql = "UPDATE galeri SET nama_file = '$image' WHERE id_galeri = '$data[id_galeri]'";
    // }

    if ($action == "delete") {
      unlink($path . $data['imageOld']);
      $sql = "DELETE FROM galeri WHERE id_galeri = '$data[id_galeri]'";
    }

    mysqli_query($conn, $sql);
    return mysqli_affected_rows($conn);
  }

  function pesanan($conn, $data, $action)
  {
    if ($action == "insert") {
    }

    if ($action == "update") {
      $sql = "UPDATE pesanan SET status_pesanan = '$data[status_pesanan]' WHERE id_pesanan = '$data[id_pesanan]'";
    }

    if ($action == "delete") {
    }

    mysqli_query($conn, $sql);
    return mysqli_affected_rows($conn);
  }

  function __name($conn, $data, $action)
  {
    if ($action == "insert") {
    }

    if ($action == "update") {
    }

    if ($action == "delete") {
    }

    // mysqli_query($conn, $sql);
    return mysqli_affected_rows($conn);
  }
}
