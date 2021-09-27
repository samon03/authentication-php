<?php

    session_start();

    require 'db_credentials.php';

    $output = '';

    if(isset($_POST['query'])) {
        $serach = $_POST['query'];

        $qry = $mysqli->query("SELECT firstname, lastname, email, TIMESTAMPDIFF(YEAR, dob, CURDATE()) as age, phone 
                        FROM `user` WHERE firstname LIKE '%".$serach."%' OR lastname LIKE '%".$serach."%' ") or die(mysqli_error());

    }
    else {
        $qry =  $mysqli->query("SELECT firstname, lastname, email, TIMESTAMPDIFF(YEAR, dob, CURDATE()) as age, phone FROM `user`");
    }

    if(mysqli_num_rows($qry) > 0) {

      while ($row=$qry->fetch_assoc()) 
      {

        $output = "
            <tr>
                <td>" . $row['firstname'] . " ". $row['lastname'] ."</td>
                <td>" . $row['age'] ."</td>
                <td>" . $row['email'] ."</td>
                <td>" . $row['phone'] ."</td>
            </tr>";
        
        echo $output;

      }
    }
    else {
        echo "<h3>No records</h3>";
    }
?>