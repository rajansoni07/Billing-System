<?php
  include('../dbConnection.php');

  $sql = "SELECT * FROM products_tb";
  $result = $conn->query($sql);
  if($result->num_rows > 0){
    $data = array();
    while($row = $result->fetch_assoc()){
      $data[] = $row;
    }

    //returning JSON data as response of ajax call
    echo json_encode($data);
  }
?>