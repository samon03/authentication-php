<?php

if (isset($_SESSION['email'])) 
{
  $email = $_SESSION['email'];
}

?>

<div class="col-md-2 text-center  px-0 mx-0">
    <ul class="list-group list-group-flush">
    <li class="list-group-item">
        <a href="profile.php" class="rmv">User Profile</a>
    </li>
    <li class="list-group-item">
        <a href="change_password.php" class="rmv" >Change Password</a>
    </li>
    <?php

        if ($email == 'admin@localhost.local') 
        {
           ?>
                <li class="list-group-item">
                    <a href="userlist.php" class="rmv" >User List</a>
                </li>
           <?php
        }

    ?>

    
    <li class="list-group-item"></li>
    </ul> 
</div>