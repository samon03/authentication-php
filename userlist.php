<?php

  session_start();
  require 'controllers/db_credentials.php';

  if (isset($_SESSION['email'])) 
  {
    $email = $_SESSION['email'];
  }

  $qry =  $mysqli->query("SELECT * FROM `user` WHERE email = '$email'");

  while ($row = $qry->fetch_assoc()) 
  {
    $fname = $row['firstname'];
    $lname = $row['lastname'];
  }
  

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authentication</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
    <link rel="stylesheet" href="css/style.css">

</head>
<body>

    <div class="container-fluid px-0 mx-0">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
              <a class="navbar-brand" href="#">Navbigation</a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto">
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-expanded="false">
                       <?php echo $fname ." ". $lname ?>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                      <li><a class="dropdown-item" href="change_password.php">Change Password</a></li>
                      <li><a class="dropdown-item" href="controllers/logout.php">Logout</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
            </div>
          </nav>

         <div class="container-fluid">
          <div class="row sidebar">
              <?php include 'nav.php' ?>
           <div class="col-md-10 px-0 mx-0">
              <div class="user">
                <div class="container-fluid">
                  <div class="row">
                    <div class="col-md-8 me-auto">
                      <h3>User List</h3>
                    </div>
                    <div class="col-md-4 ms-auto">
                      <div class="search"> <i class="fa fa-search"></i> 
                      <input type="text" id="search_text" class="form-control" placeholder="Search"></div>
                    </div>
                  </div>
                </div>
              </div>
              

              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">Name </th>
                    <th scope="col">Age</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                  </tr>
                </thead>
                <tbody id="table_data">

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
                </tbody>
              </table>

            </div>

           </div>
           </div>
         </div>
    </div>

    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>

    <script src="https://code.jquery.com/jquery.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

    
    <script type="text/javascript">
        $(document).ready(function(){
          $("#search_text").keypress(function(){
            var search = $(this).val();

            $.ajax({
              url: 'controllers/action.php',
              method: 'post',
              data: {
                query: search
              },
              success: function(response) {
                $("#table_data").html(response);
              }
            })
          })
        });
    </script>
    
</body>
</html>