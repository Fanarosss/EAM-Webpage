<?php
  $hn = 'localhost';
  $db = 'sdi1500013';
  $usernm = 'root';
  $passwrd = '';

  $conn = new mysqli($hn, $usernm, $passwrd, $db);
  if ($conn->connect_error) die($conn->connect_error)
?>
