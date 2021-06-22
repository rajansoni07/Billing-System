<?php
  include('dbConnection.php');
?>

<!DOCTYPE html>
<html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Billing System</title>
  <!-- bootstrap -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <!-- font awesome -->
  <link rel="stylesheet" href="css/all.min.css">
  <!-- animate css -->
  <link rel="stylesheet" href="css/animate.css">
  <!-- google font
  <link href="https://fonts.googleapis.com/css2?family=Nunito:ital@1&display=swap" rel="stylesheet">  -->
  <!-- custom -->
  <link rel="stylesheet" href="css/custom.css">
</head>
<body style="background-image:url(images/bg.png); background-position: cover; background-attachment: fixed;">
  <!-- nav bar -->
  <nav class="navbar navbar-dark fixed-top bg-primary navbar-expand-sm">
    <a href="index.php" class="navbar-brand">
      <img src="images/logo.png" height="65px" alt="Billing System">
    </a>
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#mymenu">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="mymenu">
      <ul class="navbar-nav custom-nav">
        <li class="nav-item m-1"><a href="index.php" class="nav-link">Home</a></li>
        <li class="nav-item m-1"><a href="login/userlogin.php" class="nav-link">Log In</a></li>
        <li class="nav-item m-1"><a href="#aboutus" class="nav-link">About Us</a></li>
        <li class="nav-item m-1"><a href="#contactus" class="nav-link">Contact Us</a></li>
      </ul>
    </div>
  </nav>

  <!-- corausel animation -->
  <div class="container-fluid px-0" style="margin-top:90px">
    <div id="slideshow" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#slideshow" data-slide-to="0" class="active"></li>
        <li data-target="#slideshow" data-slide-to="1"></li>
        <li data-target="#slideshow" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <!-- first slide -->
        <div class="carousel-item active">
          <img class="d-block w-100" src="images/slide3.jpg" alt="First slide">
          <div class="carousel-caption">
            <h2 class="animate__animated  animate__fadeInDown animate__slow ">Join Us And Make Billing Easy</h2>
            <a href="#signup" class="btn btn-success animate__animated animate__fadeIn animate__slow">Sign Up</a>
            <a href="login/userlogin.php" class="btn btn-danger animate__animated animate__fadeIn animate__slow">Log In</a>
          </div>
        </div>
        <!-- second slide -->
        <div class="carousel-item">
          <img class="d-block w-100" src="images/slide1.jpg" alt="Second slide">
          <div class="carousel-caption text-dark" style="top: 50px;">
            <h2 class="py-md-4 slide-heading animate__animated animate__slideInLeft">Any Time - Any Where</h2>
            <h3 class="py-md-4 slide-heading animate__animated animate__delay-1s animate__slideInRight">Manage Your Store Items</h3>
            <h4 class="py-md-4 slide-heading animate__animated animate__delay-2s animate__slideInLeft">Save Bills</h4>
          </div>
        </div>
        <!-- 3rd slide -->
        <div class="carousel-item">
          <img class="d-block w-100" src="images/slide2.jpg" alt="Third slide">
          <div class="carousel-caption text-dark" style="top: 25px;">
            <h4 class="h3-sm py-3 slide-heading">We are Happy To Help You</h4>
            <div class="d-inline-block">
            <a href="#" class="btn btn-danger animate__animated animate__flipInX animate__slow w-auto">Report Problem</a>
            <a href="#" class="btn btn-warning animate__animated animate__flipInX animate__slow">Contact Us</a>
            <a href="#aboutus" class="btn btn-info animate__animated animate__flipInX animate__slow">About Us</a>
          </div>
        </div>
      </div>
      <!-- slide control -->
      <a class="carousel-control-prev" href="#slideshow" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#slideshow" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div>

  <!-- sign up form -->
  <?php 
    include('signup.php');
  ?>

  <!-- about us -->
  <div class="container border-top border-dark"> <!-- container -->
    <div class="jumbotron mt-5" id="aboutus">
      <h4 class="text-center">About Us</h4>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
      Qui perspiciatis suscipit earum sed, quibusdam ut perferendis enim similique 
      officia iure quia quaerat aliquid, ea sint inventore repellendus rerum neque 
      obcaecati fuga animi vero officiis consectetur ipsam?
       Sapiente ea voluptates vel, ipsam dolorem officia exercitationem architecto? 
       Culpa harum eaque doloremque ullam?</p>
    </div>
  </div>
  
  <!-- contact us -->
  <div class="container border-top border-dark" id="contactus">
    <h4 class="text-center my-4">Contact Us</h4>
    <form action="" method="post">
      <input type="text" class="form-control" name="name" placeholder="Name"><br>
      <input type="text" class="form-control" name="subject" placeholder="Subject"><br>
      <input type="email" class="form-control" name="email" placeholder="E-mail"><br>
      <textarea class="form-control" name="message" placeholder="How can we help you?" style="height:150px;"></textarea><br>
      <input class="btn btn-primary" type="submit" value="Send" name="submit"><br><br>
      <?php if(isset($msg)) {echo $msg; } ?>
    </form>
  </div>

  <!-- footer start -->
  <footer class="container-fluid text-white bg-dark mt-5" style="border-top: 3px solid #007bff;">
    <div class="container">
      <div class="row py-3">
        <div class="col-md-6">
          <span class="pr-2">Follow Us On :</span>
          <a href="#" target="_blank" class="pr-2 fi-color"><i class="fab fa-facebook-f"></i></a>
          <a href="#" target="_blank" class="pr-2 fi-color"><i class="fab fa-twitter"></i></a>
          <a href="#" target="_blank" class="pr-2 fi-color"><i class="fab fa-instagram"></i></a>
          <a href="#" target="_blank" class="pr-2 fi-color"><i class="fab fa-linkedin-in"></i></a>
        </div>
        <div class="col-md-6 text-md-right">
          Designed By : <div class="px-2 text-info d-inline">Rajan Lodhiya </div> |
          <a href="login/adminlogin.php" class="px-2 text-danger font-weight-bold">Admin Login</a>
        </div>
      </div>
    </div>
  </footer>
  <!-- java scripts -->
  <script src="js/jquery.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/all.min.js"></script>
</body>
</html>