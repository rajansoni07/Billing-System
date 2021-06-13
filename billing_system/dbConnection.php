<?php 
  $db_host = "localhost";
  $db_user = "root";
  $db_pswd = "";
  $db_port = 3306;
  $db_name = "billing_system";

  //create connection
  $conn = new mysqli($db_host,$db_user,$db_pswd,$db_name,$db_port);

  //check connection
  if($conn->connect_error){
    die("Connection Failed.");
  // }else{
  //   echo "Connected.";
  }
?>