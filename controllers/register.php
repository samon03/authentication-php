<?php

   session_start();

   require 'db_credentials.php';

   
   if(isset($_POST['regbtn']))
   {
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $address = $_POST['address'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $dob = $_POST['dob'];
        $password = $_POST['password'];
         
        $enpassword = md5($password);

        $mysqli->query("INSERT INTO `user` VALUES ('','$firstname','$lastname','$address','$phone','$email','$dob','$enpassword')");
        
        header('Location: '.'../profile.html');
   }
   

?>