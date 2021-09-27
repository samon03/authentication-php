<?php

session_start();

    require 'db_credentials.php';

    if(isset($_POST['newpassword']))
    {
        $newpass = md5($_POST['newpassword']);
        $email = $_SESSION['email'];

        $sql = $mysqli->query("UPDATE `user` SET `password` = '$newpass'
        WHERE email = '$email'") or die(mysqli_error());

        header('Location: '.'../profile.php');
    }


?>