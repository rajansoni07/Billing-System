$(document).ready(function(){
  // --------------------------------------------ajax req for manage product page-----------------------------------------
  //ajax req for retrive data
  function showdata(){
    $.ajax({
      url:"retrive.php",
      method:"GET",
      dataType:"json",
      success: function(data){
        // console.log(data);
        if(!data == ""){
          output = "";
          for(i=0; i < data.length ; i++){
            output+= 
            "<tr><td>"
            + data[i].p_id +
            "</td><td>" + 
            data[i].p_name +
            "</td><td>" +
            data[i].p_price +
            "</td><td>" +
            data[i].p_avail +
            "</td><td><button class='btn btn-warning btn-sm btn-edit' data-pid="+data[i].p_id+">Edit</button>" +
            "<button class='btn btn-danger btn-sm btn-del' data-pid="+data[i].p_id+">Delete</button></td></tr>";
          }
          $("#tbody").html(output);
        }
      },
    })
  }
  showdata();

  // ajax request for insert data
  $("#btnsave").click(function (e) {
    e.preventDefault();
    let id = $("#pid").val();
    let nm = $("#p_name_id").val();
    let pr = $("#p_price_id").val();
    let qu = $("#p_quant_id").val();
    
    mydata = { pid:id, pname:nm, pprice:pr, pquant:qu };
    //my data is  js object
    // {pname: "sad", pprice: "23", pquant: "213"}
    $.ajax({
      url:"insertproduct.php",
      method:"POST",
      data: JSON.stringify(mydata),
      success: function(data){
        // console.log(data);
        msg = '<div class="alert alert-info mt-3">'+ data +'</div>';  
        $("#msg").html(msg);
        $("#myform")[0].reset();
        showdata();
      }
    })
  });  // end of btn save

  //ajax request for delete product
  $("tbody").on("click", ".btn-del", function(){
    let id = $(this).attr("data-pid");
    confirmmsg = "Are you sure you want to Delete Product "+id+" ?"
    if (confirm(confirmmsg)){
      // console.log("delete product clicked");
      mydata = { pid:id };
      mythis = this;
      $.ajax({
        url:"deleteproduct.php",
        method:"POST",
        data: JSON.stringify(mydata),
        success:function(data){
          // console.log(data);
          if(data == 1){
            msg = '<div class="alert alert-info mt-3">Product Deleted Successfully.</div>';
            $(mythis).closest("tr").fadeOut();
          }else if(data == 0){
            msg = '<div class="alert alert-info mt-3">Unable to Delete.</div>';
          }
          $("#msg").html(msg);
        }
      })
    }
  });

  //ajax request for edit product
  $("tbody").on("click", ".btn-edit", function(){
    // console.log("delete product clicked");
    let id = $(this).attr("data-pid");
    mydata = { pid:id };
    $.ajax({
      url:"editproduct.php",
      method:"POST",
      dataType:"json",
      data: JSON.stringify(mydata),
      success:function(data){
        // console.log(data);
        $("#pid").val(data.p_id);
        $("#p_name_id").val(data.p_name);
        $("#p_price_id").val(data.p_price);
        $("#p_quant_id").val(data.p_avail);
        // $("#msg").html(msg);
      }
    })
  });

  // --------------------------------------------ajax req for billingboard page-----------------------------------------
  $("#prow").load("retrive.php", function(){
    $.ajax({
      url:"../admin/retrive.php",
      method:"GET",
      dataType:"json",
      success: function(data){
        //console.log(data);
        if(!data == ""){
          output = "<option disabled selected id='defsel' value='0'>---Select A Product---</option>";
          for(i=0; i < data.length ; i++){
            output += "<option data-pid="+data[i].p_id+">"+data[i].p_name+"</option>";
          }
          $("#pselect").html(output);
        }
      }
    })
  })

  //for setting values of product is selected
  $("#pselect").change(function(){
    $.ajax({
      url:"../admin/retrive.php",
      method:"GET",
      dataType:"json",
      success: function(data){
        let id = $("option:selected").attr("data-pid");
        for(i=0;i<data.length;i++){
          if(data[i].p_id == id){
            //console.log(data[i].p_price);
            $("#pricetag").val(data[i].p_price);
            $("#setquant").removeAttr("disabled");
            $("#setquant").attr("max",data[i].p_avail);
          }
        }
      }
    })
  })

  // display amount of products
  function setamount(){
    //console.log("change quant");
    var pr = $("#pricetag").val();
    var qu = $(this).val();
    var amt = pr*qu;
    $("#pamount").val(amt);
    $("#pselect").attr("disabled","true");
  }
  $("#setquant").change(setamount);

  // add row(product) to bill table
  $("#addp2bill").click(function(e){
    //console.log("hello");
    e.preventDefault();
    output = $("#curbill").html();
    if($("#pricetag").val() != ""){
      if($("#setquant").val() != ""){
        //console.log("ok");
        let id = $("option:selected").attr("data-pid");
        let nm = $("option:selected").val();
        let pr = $("#pricetag").val();
        var qu = $("#setquant").val();
        let amt = $("#pamount").val();
  
        output += "<tr data-rid="+id+"><td class='itemnm'>"+nm
        +"</td><td class='itempr'>"+pr
        +"</td><td class='itemqu'>"+qu
        +"</td><td class='itemamt'>"+amt+
        "</td><td><button class='btn btn-sm' id='rm2bill'><i class='fa fa-minus-circle text-danger'></i></button></td></tr>"
        $("#curbill").html(output);
        
        // clear the selected product
        resetfield();
        calctotalamount();
      }else{
        //console.log("empty");
        alert("Please Select Quantity.");
      }
    }else{
      alert("Please Select A Product.");
    }
  })

  // clearing selection
  function resetfield(){
    $("#pricetag").val("");
    $("#setquant").val("");
    $("#pamount").val("");
    $("#pselect").val('0');
    $("#setquant").attr("disabled","true");
    $("#pselect").removeAttr("disabled");
  }
  function clearselect(e){
    e.preventDefault();
    resetfield();
  }
  $("#clearselect").click(clearselect);


  // remove row(product) to bill table
  $("#curbill").on("click", "#rm2bill", function(){
    //console.log("delete product clicked");
    let id = $(this).attr("data-rid");
      // console.log(data);
      document.getElementById("curbill").deleteRow(id);
      calctotalamount();
  })


  // total amount count
  function calctotalamount(){
    let a = $(".itemamt");
    totalamount = 0;
    for(i=0; i < a.length; i++){
      totalamount += parseInt(a[i].innerHTML);
    }
    $("#curbilltotal").html(totalamount);
  }

  //printing bill and store to db
  $("#createbill").click(function(){
    let b_per = $("#b_of_person").val();
    let b_date = $("#b_date").val();
    let b_time = $("#b_time").val();
    let b_total = parseInt($("#curbilltotal").html());
    //for items of bill
    let amt = $(".itemamt");
    let nm = $(".itemnm");
    let pr = $(".itempr");
    let qu = $(".itemqu");
    let items = [];
    for(i=0; i < nm.length; i++){
      mydata = { inm:nm[i].innerHTML ,iqu:qu[i].innerHTML,ipr:pr[i].innerHTML,iamt:amt[i].innerHTML};
      items.push(mydata);
    }
    //console.log(items);
    billdetails = { bpr: b_per, bdate:b_date, btime:b_time, btotal:b_total ,bitem:items};
    //console.log(billdetails);
    $.ajax({
      url:"savebill.php",
      method:"POST",
      data: JSON.stringify(billdetails),
      success:function(data){
        msg = '<div class="alert alert-info mt-3">'+ data +'</div>';  
        $("#msg").html(msg);
      }
    })
    resetfield();
    $("#b_of_person").val("");
  })

  // --------------------------------------------ajax req for userprofile page-----------------------------------------

  //-----------------------retrive user profile details-----------------------------------------
  function displayuserprofile(){
    let em = $("#sessionuser").html();
    mydata = {uemail:em};
    //console.log(mydata);
    $.ajax({
      url:"displayuserprofile.php",
      method:"POST",
      dataType:"json",
      data: JSON.stringify(mydata),
      success:function(data){
        //console.log(data);
        $("#uemail").val(data.u_email);
        $("#uname").val(data.u_name);
        $("#uphn").val(data.u_phn);
        // $("#msg").html(msg);
      }
    })
  }

  //------------------------------view profile button ----------------------------
  $("#viewuserbtn").click(function(e){
    e.preventDefault();
    $("#edituserprofile").removeClass("d-none");
    $("#viewedituserheading").html("View Profile");
    $("input").attr("disabled","true");
    $("#updateuprofile").addClass("d-none");
    $("#notemail").addClass("d-none");
    $("#msg").addClass("d-none");
    displayuserprofile();
  })

  //------------------------------edit profile button ----------------------------
  $("#edituserbtn").click(function(){
    //console.log("helo");
    $("#edituserprofile").removeClass("d-none");
    $("#viewedituserheading").html("Edit Profile");
    $("#uname").removeAttr("disabled");
    $("#uphn").removeAttr("disabled");
    $("#notemail").removeClass("d-none");
    $("#updateuprofile").removeClass("d-none");
    $("#msg").removeClass("d-none");
    $("#msg").html("");
    displayuserprofile();
  })

  //---------------updating user profile---------------------------------------------
  $("#updateuprofile").click(function(e){
    e.preventDefault();
    let em = $("#uemail").val();
    let nm = $("#uname").val();
    let ph = $("#uphn").val();
    mydata = { uemail:em, uname:nm, uphn:ph };
    //console.log(mydata);
    $.ajax({
      url:"updateuserprofile.php",
      method:"POST",
      data: JSON.stringify(mydata),
      success: function(data){
        // console.log(data); 
        $("#msg").html(data);
        displayuserprofile();
      },
    })

  })


  // --------------------------------------------ajax req for adminprofile page-----------------------------------------

  //-----------------------retrive admin profile details-----------------------------------------
  function displayadminprofile(){
    let em = $("#sessionadmin").html();
    mydata = {aemail:em};
    //console.log(mydata);
    $.ajax({
      url:"displayadminprofile.php",
      method:"POST",
      dataType:"json",
      data: JSON.stringify(mydata),
      success:function(data){
        //console.log(data);
        $("#aemail").val(data.a_email);
        $("#aname").val(data.a_name);
        $("#aphn").val(data.a_phn);
        // $("#msg").html(msg);
      }
    })
  }

  //------------------------------view profile button ----------------------------
  $("#viewadminbtn").click(function(e){
    e.preventDefault();
    $("#editadminprofile").removeClass("d-none");
    $("#viewedituserheading").html("View Profile");
    $("input").attr("disabled","true");
    $("#updateaprofile").addClass("d-none");
    $("#notemail").addClass("d-none");
    $("#msg").addClass("d-none");
    displayadminprofile();
  })

  //------------------------------edit profile button ----------------------------
  $("#editadminbtn").click(function(){
    //console.log("helo");
    $("#editadminprofile").removeClass("d-none");
    $("#viewedituserheading").html("Edit Profile");
    $("#aname").removeAttr("disabled");
    $("#aphn").removeAttr("disabled");
    $("#notemail").removeClass("d-none");
    $("#updateaprofile").removeClass("d-none");
    $("#msg").removeClass("d-none");
    $("#msg").html("");
    displayadminprofile();
  })

  //---------------updating user profile---------------------------------------------
  $("#updateaprofile").click(function(e){
    e.preventDefault();
    let em = $("#aemail").val();
    let nm = $("#aname").val();
    let ph = $("#aphn").val();
    mydata = { aemail:em, aname:nm, aphn:ph };
    //console.log(mydata);
    $.ajax({
      url:"updateadminprofile.php",
      method:"POST",
      data: JSON.stringify(mydata),
      success: function(data){
        // console.log(data); 
        $("#msg").html(data);
        displayadminprofile();
      },
    })

  })

}); //end of document.ready