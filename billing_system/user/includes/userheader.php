<?php
  // -----------allow only logged in user to access the page-------
  if(!isset($_SESSION['uemail']))
  {
    echo "<script>location.href='../login/userlogin.php'</script>";
  }
?>
<!DOCTYPE html>
<html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title><?php echo MAINTITLE; ?></title>
  <!-- bootstrap -->
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <!-- font awesome -->
  <link rel="stylesheet" href="../css/all.min.css">
  <!-- animate css -->
  <link rel="stylesheet" href="../css/animate.css">
  <!-- google font
  <link href="https://fonts.googleapis.com/css2?family=Nunito:ital@1&display=swap" rel="stylesheet">  -->
  <!-- custom -->
  <link rel="stylesheet" href="../css/custom.css">
</head>
<body style="background-image:url(../images/bg.png); background-position: cover; background-attachment: fixed;">
  <!-- nav bar -->
  <nav class="navbar navbar-dark fixed-top bg-primary navbar-expand-sm">
    <a href="../index.php" class="navbar-brand">
      <img src="../images/logo.png" height="65px" alt="Billing System">
    </a>
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-text">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="nav-text">
      <span class="navbar-nav ml-auto p-4 navbar-text text-white h5">
        <i class="fas fa-user"></i>
        <div class="d-inline" id="sessionuser"><?php echo $_SESSION['uemail']; ?></div>
      </span>
    </div>
  </nav>

<div class="container-fluid p-0" style="margin-top:90px">  <!-- start of container-fluid -->
  <div class="sidepanel" id="mymenu">
    <button class="btn btn-info closebtn" onclick="closeNav()"><i class="fa fa-times"></i></button>
    <a href="billingboard.php"><i class="mr-2 fas fa-tachometer-alt"></i><span>Dashboard</span></a>
    <a href="userprofile.php"><i class="mr-2 fas fa-user"></i><span>Profile</span></a>
    <a href="#"><i class="mr-2 fas fa-info-circle"></i><span>Reports</span></a>
    <a href="../signout.php"><i class="mr-2 fas fa-sign-out-alt"></i><span>Log Out</span></a>
  </div>
  <div>
    <button class="btn btn-info openbtn" onclick="openNav()"><i class="fas mr-2 fa-bars"></i> Menu </button>
  </div>
  <div id="main" class="p-4"> <!-- start of main div  -->