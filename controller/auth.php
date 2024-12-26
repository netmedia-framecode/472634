<?php

require_once("../config/Base.php");
require_once("../config/Alert.php");

if (isset($_POST["register"])) {
  $validated_post = array_map(function ($value) use ($conn) {
    return valid($conn, $value);
  }, $_POST);
  if (register($conn, $validated_post, $action = 'insert') > 0) {
    header("Location: ./");
    exit();
  }
}

if (isset($_POST["login"])) {
  if (login($conn, $_POST) > 0) {
    header("Location: ../views/");
    exit();
  }
}
