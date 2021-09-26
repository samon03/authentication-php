<?php

   session_start();

   require 'db_credentials.php';

   if (isset($_POST['mail'])) 
   {
       $mail = $_POST['mail'];

       $qry = $mysqli->query("SELECT * FROM `user` WHERE email = '$mail'");

       if(mysqli_num_rows($qry) > 0) 
       {
           echo "<small style='color: red;'>Email Already Exist </small>"; 
       }
       else 
       {
        echo "<small style='color: blue;'>Avalible</small>";    
       }
   }

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
        
        header('Location: '.'../index.html');
        
    }

   

?>