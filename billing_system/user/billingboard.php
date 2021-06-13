<?php
  define('MAINTITLE', 'Billing Board');
  session_start();
  include('includes/userheader.php');
  require('../dbConnection.php');

  //fetch all products from database
  $sql="SELECT * FROM products_tb";
  $items = $conn->query($sql);

?>

<h4><i class="fas fa-edit"></i> Generate a New Bill</h4>
<div class="row">
  <div class="col-sm-6">
    <form action="" method="post" class="p-3">
      <!-------first row------>
      <div class="row">
        <div class="form-group col">
          <label>To :</label> <!-------To: Customer name------>
          <input type="text" class="form-control" name="b_of_person" id="b_of_person">
        </div>
      </div>
      <!-------second row for date and time----->
      <div class="row">  
        <div class="form-group col-sm-6">
          <label>Date :</label>   
          <input type="date" class="form-control" name="b_date" id="b_date" value="today" disabled>
        </div>
        <div class="form-group col-sm-6">
          <label>Time :</label>
          <input type="text" class="form-control" name="b_time" id="b_time" disabled>
        </div>
        <!-- script for updating live time in input fields -->
        <script>
          function time(){
            var b_date = new Date();    
            var b_time = b_date.toLocaleTimeString();
            var options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
            var day = b_date.toLocaleDateString('en-US',options);
            document.getElementById('b_time').value = b_time;
            document.getElementById('b_date').valueAsDate = b_date;
          }
          setInterval(function(){
            time();
          },1000);
        </script>
        <!------ end of script---------->
      </div>
      <!-------third row------>
      <div class="row" id="prow">
        <div class="form-group col-sm-8">
          <label>Product Name :</label> 
          <select class="form-control" id="pselect"></select>
        </div>
        <div class="form-group col-sm-4">
          <label>Price :</label> 
          <input type="text" class="form-control" id="pricetag" disabled>
        </div>
      </div>
      <!------ fourth row ---------->
      <div class="row">
        <div class="form-group col-sm-4">
          <label>Add Quantity :</label>
          <input type="number" class="form-control" name="p_quant" id="setquant" min="1" max="" disabled required>
        </div>
        <div class="col-sm-4">
          <label>Amount :</label>
          <input type="text" class="form-control" id="pamount" disabled>
        </div>
        <div class="col-sm-4">
          <label></label>
          <button class="btn btn-success form-control mt-2" id="addp2bill">Add</button>
        </div>
      </div>
    </form>
  </div> <!----------end of left side ----------------------->
  <!---------------- display current bill items ------------>
  <div class="col-sm-6">
    <p class=" bg-dark text-white p-2 text-center">Current Bill</p>
    <table class="table table-hover">
      <thead>
      <tr>
        <th scope="col" class="th-sm">No</th>
        <th scope="col" class="th-sm">Product Name</th>
        <th scope="col" class="th-sm">Price</th>
        <th scope="col" class="th-sm">Quantity</th>
        <th scope="col" class="th-sm">Amount</th>
        <th scope="col" class="th-sm">Action</th>
      </tr>
      </thead>
      <tbody id="curbill"></tbody>
  </div>
</div>



<?php
  include('includes/userfooter.php');
?>