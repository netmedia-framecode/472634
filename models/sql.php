<?php

if (isset($_SESSION["project_portal_wisata_kafe"]["users"])) {
  function alert($message, $message_type)
  {
    global $conn;
    $id_user = valid($conn, $_SESSION["project_portal_wisata_kafe"]["users"]["id"]);
    $name = valid($conn, $_SESSION["project_portal_wisata_kafe"]["users"]["name"]);
    $role = valid($conn, $_SESSION["project_portal_wisata_kafe"]["users"]["role"]);
    $no_telpon = valid($conn, $_SESSION["project_portal_wisata_kafe"]["users"]["no_telpon"]);
    $status = valid($conn, $_SESSION["project_portal_wisata_kafe"]["users"]["status"]);

    $_SESSION["project_portal_wisata_kafe"]["users"] = [
      "id" => $id_user,
      "name" => $name,
      "role" => $role,
      "no_telpon" => $no_telpon,
      "message_$message_type" => $message,
      "time_message" => time(),
      "status"=> $status
    ];
  }
} else if (!isset($_SESSION["project_portal_wisata_kafe"]["users"])) {
  function alert($message, $message_type)
  {
    $_SESSION["project_portal_wisata_kafe"] = [
      "message_$message_type" => $message,
      "time_message" => time()
    ];

    return true;
  }
}
