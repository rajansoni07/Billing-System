<?php
  define('MAINTITLE', 'Profile');
  session_start();
  include('../dbConnection.php');
  include('includes/adminheader.php');
?>
<!-- main div already started -->
<h3 class="text-center">Users</h3>
<div class="mx-5 text-center"> <!--Table start-->
    <p class=" bg-dark text-white p-2">List of Users</p>
    <?php
    $sql = "SELECT * FROM usersignup_tb";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
 echo '<table class="table table-hover">
  <thead>
   <tr>
    <th scope="col">User ID</th>
    <th scope="col">Name</th>
    <th scope="col">Email</th>
    <th scope="col">Phone</th>
   </tr>
  </thead>
  <tbody>';
  while($row = $result->fetch_assoc()){
   echo '<tr>';
    echo '<th scope="row">'.$row["u_id"].'</th>';
    echo '<td>'. $row["u_name"].'</td>';
    echo '<td>'.$row["u_email"].'</td>';
    echo '<td>'.$row["u_phn"].'</td>';
  }
 echo '</tbody>
 </table>';
} else {
  echo "0 Result";
}
?>
  </div> <!--Table end -->


<!-- main div ended here -->
<?php
  include('includes/adminfooter.php');
?>