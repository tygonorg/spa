<?php
session_start();
if ($_SESSION['user'] != null) :
  $user = $_SESSION['user'];
else :
  $newURL = 'login.html';
  header('Location: ' . $newURL);
endif;
?>
<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <?php
  $spa = $_SESSION['spa'];
  if ($spa == null) {
    $conn = mysql_connect($mysqlserver, $mysqluser, $mysqlpass);
    mysql_select_db($mysqldb, $conn);
    if (!$conn) {
      die("Connection failed: "  . mysql_error());
    }
    mysql_query("set names 'utf8'");
    $query = sprintf("SELECT `id`, `shortname`, `fullname`, `adresss`, `logo`, `description`, `phone` FROM `spa` WHERE `id` ='%s'", mysql_real_escape_string($user['spaid']));
    $result = mysql_query($query, $conn);
    while ($row = mysql_fetch_assoc($result)) {
      $spa = $row;
      $_SESSION['spa'] = $row;
      $returnkq = true;
    }
  }
  if ($spa == null) {
    $newURL = 'login.html';
    header('Location: ' . $newURL);
  }
  ?>
  <title>Hệ Thống Quản Lý Spa - <?php echo ($titles = 'Khách hàng'); ?></title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- IonIcons -->
  <link rel="stylesheet" href="dist/css/ionic.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="plugins/select2/css/select2.min.css">

  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>