<?php
include 'config.php';  
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $loginURL = 'login.html';
  if (isset($_POST['user']))  {
    $username = $_POST["user"];

  } else {
      header('Location: '.$loginURL);
  } 
  if (isset($_POST['pass']))  {
    $pass = $_POST["pass"];
  } else {
      header('Location: '.$loginURL);
  }
  
  $conn = mysql_connect($mysqlserver, $mysqluser, $mysqlpass);
  mysql_select_db($mysqldb, $conn);
  if (!$conn) {
    die("Connection failed: "  . mysql_error());
  }
  mysql_query("set names 'utf8'");
  $query = sprintf("SELECT `id`, `username`, `pass`, `name`, `img`, `roleid`, `spaid` FROM `user` WHERE `username`='%s'",mysql_real_escape_string($username));
  $result = mysql_query($query,$conn);
  $returnkq = false;
  $session = null;
   while($row = mysql_fetch_assoc($result)){
      if(strcmp($pass,$row["pass"])==0){
        $session = $row;
        $returnkq = true;
      }
   }
  if($returnkq){
    $_SESSION['user'] = $session;
    $droadLink = 'index.php';
    header('Location: '.$droadLink);
  } else {
      header('Location: '.$loginURL);
  }
} else {
  $_SESSION['user'] = null;
}
?>