<?php
  include('dbConnection.php');
  if(isset($_REQUEST['submitbtn']))
  {
    //check for empty fields
    if(($_REQUEST['uname'])=="" ||($_REQUEST['uemail'])=="" ||($_REQUEST['uphn'])=="" ||($_REQUEST['upswd'])==""){
      $msg= '<div class="alert alert-warning mt-3" role="alert">All Fields are Required</div>';
    }else{
      $sql = "SELECT u_email FROM usersignup_tb WHERE u_email = '".$_REQUEST['uemail']."'";
      $result = $conn->query($sql);
      if($result->num_rows == 1){
        $msg= '<div class="alert alert-warning mt-3" role="alert">This Email is Already Registerd</div>';
      }else{
        // assigning variables
        $u_name = $_REQUEST['uname'];
        $u_email = $_REQUEST['uemail'];
        $u_phn = $_REQUEST['uphn'];
        $u_pswd = $_REQUEST['upswd'];
        // generating hash of password using crypt_blowfish algorithm 
        $u_hashpswd = password_hash($u_pswd,PASSWORD_BCRYPT);
        $sql = "INSERT INTO usersignup_tb(u_name,u_email,u_phn,u_pswd) VALUES('$u_name','$u_email','$u_phn','$u_hashpswd')";
        //instert into db
        if($conn->query($sql) == TRUE){
          $msg= '<div class="alert alert-success mt-3" role="alert">Account Created Successfully.</div>';
        }else{
          $msg= '<div class="alert alert-danger mt-3" role="alert">Unable To Create Account</div>';
        }
      }
    }
  }
?>

<div class="container my-5" id="signup"> <!-- container -->
    <div class="row justify-content-center"><!-- row -->
      <div class="col-md-6"> <!-- col -->
      <h2 class="text-center mb-3">Sign Up</h2>
        <form action="" method="post" class="shadow-lg p-5 text-dark">
          <div class="form-group">
            <i class="fas fa-user"></i>
            <label class="pl-2 font-weight-bold">Name</label>
            <input type="text" name="uname" class="form-control" pattern="^[A-Za-z0-9]{3,20}$" minlength="3" required>
          </div>
          <div class="form-group">
            <i class="fas fa-envelope"></i>
            <label class="pl-2 font-weight-bold">Email</label>
            <input type="email" name="uemail" class="form-control" required>
          </div>          
          <div class="form-group">
              <i class="fas fa-phone"></i>
              <label class="pl-2 font-weight-bold">Phone</label>
              <input type="text" minlength="10" maxlength="10" onkeypress="isInputNumber(event)" class="form-control" name="uphn" required>
          </div>
          <div class="form-group">
            <i class="fas fa-key"></i>
            <label class="pl-2 font-weight-bold">Password</label>
            <input type="password" name="upswd" class="form-control" required>
          </div>
          <button type="submit" class="btn btn-block btn-info mt-5" name="submitbtn">Submit</button>
          <?php if(isset($msg)){ echo $msg; } ?>
        </form>
      </div> <!-- col -->
    </div><!-- row -->
  </div><!-- container -->

  <script>
    function isInputNumber(evt) {
      var ch = String.fromCharCode(evt.which);
      if (!(/[0-9]/.test(ch))) {
        evt.preventDefault();
      }
    }
  </script>