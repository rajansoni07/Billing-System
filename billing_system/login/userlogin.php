<?php
  include('../dbConnection.php');
  session_start();
  //check for session
  if(!isset($_SESSION['is_login']))
  {
    if(isset($_REQUEST['loginbtn']))
    {
      //check for empty fields
      if($_REQUEST['uemail']=="" || $_REQUEST['upswd']==""){
        $msg = '<div class="alert alert-warning mt-3" role="alert">All Fields are Required</div>';
      }else{
        // assigning variables
        $u_email = mysqli_real_escape_string($conn , trim($_REQUEST['uemail']));
        $u_pswd = mysqli_real_escape_string($conn , trim($_REQUEST['upswd']));
        $sql = "SELECT u_email, u_pswd FROM usersignup_tb WHERE u_email = '$u_email'";
        $result = $conn->query($sql);
        if($result->num_rows == 1){
          //get the stored password hash from db 
          $row = $result->fetch_assoc();
          $u_hash = $row["u_pswd"];
          $match = password_verify($u_pswd,$u_hash);    //verify the hash with input
          if($match == 1){
            $_SESSION['is_login'] = TRUE;               //set session variable
            $_SESSION['uemail'] = $u_email;
            //redirect to billboard
            echo "<script>location.href='../user/billingboard.php'</script>";
            exit;
          }else{
            $msg = '<div class="alert alert-danger mt-2">Incorrect Email and Password.</div>';
          }
        }
      }
    }
  }else{
    //is login then redirect to billboard
    echo "<script>location.href='../user/billingboard.php'</script>";
  }
  
?>


<!DOCTYPE html>
<html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>User Login</title>
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
  </nav>

  <div class="container" style="margin-top:120px">
    <div class="mt-5 mb-3 text-center" style="font-size:30px">
       <i class="fas fa-hand-holding-usd"></i>
      <span>Billing System</span> 
    </div>
    <p class="text-center text-primary" style="font-size:20px">
      <i class="fas fa-user mr-2 "></i>User Login
    </p>
    <!-- login form  -->
    <div class="row justify-content-center mt-4">
      <div class="col-sm-6">
        <form method="post" class="shadow-lg p-4" action="">
          <!-- for email -->
          <div class="form-group">
            <i class="fas fa-envelope"></i><label class="pl-2 font-weight-bold">Email</label>
            <input type="email" class="form-control" name="uemail">
          </div>
          <!-- for password -->
          <div class="form-group">
            <i class="fas fa-key"></i><label class="pl-2 font-weight-bold">Password</label>
            <input type="password" class="form-control" name="upswd">
          </div>
          <button type="submit" name="loginbtn" class="btn btn-block shadow-sm mt-4 font-weight-bold btn-outline-info">Login</button>
        </form>
        <?php if(isset($msg)){echo "$msg";} ?>
        <div class="text-center"><a href="../index.php" class="btn btn-info mt-4 font-weight-bold shadow-sm">Back to Home</a></div>
      </div>
    </div>
  </div>
  
  <!-- java scripts -->
  <script src="../js/jquery.min.js"></script>
  <script src="../js/popper.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/all.min.js"></script>
</body>
</html>