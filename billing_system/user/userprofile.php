<?php
  define('MAINTITLE', 'Profile');
  session_start();
  include('../dbConnection.php');
  include('includes/userheader.php');
  $u_email=$_SESSION['uemail'];
?>
<!-- main div already started -->

<h3>Profile</h3>
<div class="btn-group">
  <button class="btn btn-success profile-btn" id="viewuserbtn">View Profile</button>
  <button class="btn btn-danger profile-btn" id="edituserbtn">Edit Profile</button>
</div>

<!----------------------------------------- Edit Profile Container ------------------------------------------->
<div class="col-sm-8 container-fluid p-4 d-none" id="edituserprofile"> 
  <h4 id="viewedituserheading"></h4>
  <div class="border border-dark p-3">
    <div class="form-group">
      <label class="font-weight-bold">Email</label>
      <input type="email" class="form-control" name="uemail" id="uemail"  readonly>
      <small class="form-text" id="notemail">Email Address Can Not Be Updated Because Of Our Policy.</small>
    </div>
    <div class="form-group">
      <label class="font-weight-bold">Name</label>
      <input type="text" class="form-control" name="uname" id="uname" 
        pattern="^[A-Za-z0-9 ]{3,20}$" minlength="3"  required>
    </div>
    <div class="form-group">
      <label class="font-weight-bold">Phone</label>
      <input type="text" onkeypress="isInputNumber(event)" class="form-control" name="uphn" id="uphn" 
      minlength="10" maxlength="10"  required>
    </div>
    <button type="submit" class="btn btn-danger mt-2 px-5" name="updatedata" id="updateuprofile">Update</button>
    <div id="msg"></div>
  </div>
</div>

<!-- main div ended here -->

<?php
  include('includes/userfooter.php');
?>