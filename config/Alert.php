<?php

$messageTypes = ["success", "info", "warning", "danger", "dark"];

if (!isset($_SESSION["project_portal_wisata_kafe"]["users"])) {
  if (isset($_SESSION["project_portal_wisata_kafe"]["time_message"]) && (time() - $_SESSION["project_portal_wisata_kafe"]["time_message"]) > 2) {
    foreach ($messageTypes as $type) {
      if (isset($_SESSION["project_portal_wisata_kafe"]["message_$type"])) {
        unset($_SESSION["project_portal_wisata_kafe"]["message_$type"]);
      }
    }
    unset($_SESSION["project_portal_wisata_kafe"]["time_message"]);
  }
} else if (isset($_SESSION["project_portal_wisata_kafe"]["users"])) {
  if (isset($_SESSION["project_portal_wisata_kafe"]["users"]["time_message"]) && (time() - $_SESSION["project_portal_wisata_kafe"]["users"]["time_message"]) > 2) {
    foreach ($messageTypes as $type) {
      if (isset($_SESSION["project_portal_wisata_kafe"]["users"]["message_$type"])) {
        unset($_SESSION["project_portal_wisata_kafe"]["users"]["message_$type"]);
      }
    }
    unset($_SESSION["project_portal_wisata_kafe"]["users"]["time_message"]);
  }
}
