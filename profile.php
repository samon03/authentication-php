<?php

  session_start();
  require 'controllers/db_credentials.php';

  if (isset($_SESSION['email'])) 
  {
    $email = $_SESSION['email'];
    
    $qry =  $mysqli->query("SELECT * FROM `user` WHERE email = '$email'");

    while ($row = $qry->fetch_assoc()) 
    {
      $fname = $row['firstname'];
      $lname = $row['lastname'];
      $phn = $row['phone'];
      $address = $row['address'];
      $dob = date("F d, Y", strtotime($row['dob']));
      $email = $row['email'];
    }
    
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
                      <li><a class="dropdown-item" href="#">Change Password</a></li>
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
             <div class="text-center user">
               <h3>User Profile</h3>
              </div>

              <div class="container py-4">
                <div class="row reg">
                    <div class="col-md-6 mx-auto">
                        <div class="p-4 my-3">
        
                            <div class="">
                                <div class="row g-3">
                                    <div class="col-md-4">
                                      <label class="font-18 h-500 col-form-label">First Name</label>
                                    </div>
                                    <div class="col-md-1">
                                      <span class="h-600">:</span>
                                    </div>
                                    <div class="col-md-7">
                                        <span class="h-600">
                                          <?php echo $fname?>
                                        </span>
                                    </div>
                                </div>
                                <div class="row g-3">
                                    <div class="col-md-4">
                                      <label class="font-18 h-500 col-form-label">Last Name</label>
                                    </div>
                                    <div class="col-md-1">
                                      <span class="h-600">:</span>
                                    </div>
                                    <div class="col-md-7">
                                        <span class="h-600"><?php echo $lname?></span>
                                    </div>
                                </div>
                                <div class="row g-3">
                                    <div class="col-md-4">
                                      <label class="font-18 h-500 col-form-label">Address</label>
                                    </div>
                                    <div class="col-md-1">
                                      <span class="h-600">:</span>
                                    </div>
                                    <div class="col-md-7">
                                        <span class="h-600"><?php echo $address?></span>
                                    </div>
                                </div>
                                <div class="row g-3">
                                    <div class="col-md-4">
                                      <label class="font-18 h-500 col-form-label">Phone</label>
                                    </div>
                                    <div class="col-md-1">
                                      <span class="h-600">:</span>
                                    </div>
                                    <div class="col-md-7">
                                        <span class="h-600"><?php echo $phn?></span>
                                    </div>
                                </div>
                                <div class="row g-3">
                                    <div class="col-md-4">
                                      <label class="font-18 h-500 col-form-label">Email</label>
                                    </div>
                                    <div class="col-md-1">
                                      <span class="h-600">:</span>
                                    </div>
                                    <div class="col-md-7">
                                        <span class="h-600"><?php echo $email?></span>
                                    </div>
                                </div>
                                <div class="row g-3">
                                    <div class="col-md-4">
                                      <label class="font-18 h-500 col-form-label">Birthdate</label>
                                    </div>
                                    <div class="col-md-1">
                                      <span class="h-600">:</span>
                                    </div>
                                    <div class="col-md-7">
                                        <span class="h-600"><?php echo $dob?></span>
                                    </div>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                </div>
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
    
</body>
</html>