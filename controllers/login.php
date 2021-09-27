<?php  

    session_start();

    require 'db_credentials.php';

    if(isset($_POST['loginbtn']))
    {
        $email = $_POST['email'];
        $password = md5($_POST['password']);

        $sql = "SELECT * FROM `user` WHERE email = '$email' AND password = '$password' LIMIT 1";
        $result = $mysqli->query($sql);

        if (mysqli_num_rows($result) == 1) 
        {
            $_SESSION['email'] = $email;
            echo $_SESSION['email'];
            header('Location: '.'../profile.php');        
        }
        
        else
        {
            echo "<h3 style='color: red;'>You have entered wrong email/password! </h3>";        
        }
    }

    if(isset($_POST['clearbtn']))
    {
        $_POST['email'] = '';
        $_POST['password'] = '';
        header('Location: '.'../index.html');  
    }

    
?>