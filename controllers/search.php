<?php

   session_start();

   require 'db_credentials.php';

   $skey = $_POST['search'];

   $qry = $mysqli->query("SELECT firstname, lastname, email, TIMESTAMPDIFF(YEAR, dob, CURDATE()) as age, phone 
                        FROM `user` WHERE firstname LIKE '%".$skey."%' OR lastname LIKE '%".$skey."%' ") or die(mysqli_error());

  if(mysqli_num_rows($qry) > 0) {
    while($row = mysqli_num_rows($qry)) 
    {
        echo "<tr>
        <td>" . $row['firstname'] . " ". $row['lastname'] ."</td>
        <td>" . $row['age'] ."</td>
        <td>" . $row['email'] ."</td>
        <td>" . $row['phone'] ."</td>
        </tr>";
 
 
    }
  }
  else {
     echo "<tr><td>No result found</td></tr>";
  }

?>