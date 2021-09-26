<?php
  
  $server = 'localhost';
  $user = 'root';
  $password = '';
  $dbname = 'portal';
  $mysqli = new mysqli($server, $user, $password, $dbname) or die(mysqli_error());
  
?>