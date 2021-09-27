
                  <?php

$qry =  $mysqli->query("SELECT firstname, lastname, email, TIMESTAMPDIFF(YEAR, dob, CURDATE()) as age, phone FROM `user`");

while ($row = $qry->fetch_assoc()) 
{
  $fname = $row['firstname'];
  $lname = $row['lastname'];
  $phn = $row['phone'];
  $age = $row['age'];
  $email = $row['email'];

?>

<tr>
  <td><?php echo $fname ." ". $lname ?></td>
  <td><?php echo $age ?></td>
  <td><?php echo $email ?></td>
  <td><?php echo $phn ?></td>
</tr>

<?php
}

?>