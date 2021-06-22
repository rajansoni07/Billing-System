<?php
  include('../dbConnection.php');
  // read data
  $data = stripcslashes(file_get_contents("php://input"));
  // decode jsondata, get assoc array = true
  $mydata = json_decode($data,true);
  $b_of_person = $mydata['bpr'];
  $b_date = $mydata['bdate'];
  $b_time = $mydata['btime'];
  $b_amount = $mydata['btotal'];
  $b_items = json_encode($mydata['bitem']);

  if(!empty($b_of_person)){
    if(!empty($b_amount)){
      $sql = "INSERT INTO metabill_tb (b_date,b_time,b_of_person,b_amount,b_items) 
      VALUES('$b_date','$b_time','$b_of_person','$b_amount', '$b_items')";
      if($conn->query($sql) == true){
        echo 'Bill Saved Successfully.';
      } else{
        echo 'Unable to Save.';
      }
    }else{
      echo 'Please Enter Items.';
    }
    
  }else{
    echo 'Name is Required.';
  }

?>