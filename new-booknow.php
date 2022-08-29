<?php 
session_start();
include('includes/config.php');
error_reporting(0);



?>

<?php
      if(isset($_POST['btn_contact_details']))
        {   
    $id = $_POST['id']; 
    // $destination = $_POST['destination'];
     $name = $_POST['name'];
     $email = $_POST['email'];
     $gender = $_POST['gender'];
     $address = $_POST['address'];
     $phone = $_POST['phone'];

     if($_FILES['uploadfile']['name']){
      move_uploaded_file($_FILES['uploadfile']['tmp_name'], "admin/uploads/".$_FILES['uploadfile']['name']);
      $image="admin/uploads".$_FILES['uploadfile']['name'];
    }

     $sql = "INSERT INTO booked (ID,NAME,EMAIL,gender,ADDRESS,PHONE,Govt_Proof)
     VALUES ('$id','$name','$email','$gender','$address','$phone','$image')";
      $query = $dbh->prepare($sql);
      $query->execute();

      }
?>


<html>
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>MedDrive|Book Now</title>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
 <link rel="stylesheet" href="GovtUpload.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    


/* --------------------------------------------------------------------------------------------- */
  
.box
  {
   width:1100px;
   margin:0 auto;
  }
  .active_tab1
  {
   background-color:#B2DAD3;
   color:#333;
   font-weight: 600;
  }
  .inactive_tab1
  {
   background-color: #f5f5f5;
   color: #333;
   cursor: not-allowed;
  }
  .has-error
  {
   border-color:#cc0000;
   background-color:#ffff99;
  }
  </style>
 </head>
 <body>
 <br />
  <div class="container box">
   <br />
  
   <?php echo $message; ?>
   <form method="post" id="register_form" enctype="multipart/form-data" >
    <ul class="nav nav-tabs">
     <li class="nav-item">
      <a class="nav-link active_tab1" style="border:1px solid #ccc" id="list_login_details">Choose Your Destination</a>
     </li>
     <li class="nav-item">
      <a class="nav-link inactive_tab1" id="list_personal_details" style="border:1px solid #ccc">Personal Details</a>
     </li>
     <li class="nav-item">
      <a class="nav-link inactive_tab1" id="list_contact_details" style="border:1px solid #ccc">Proof Verification</a>
     </li>
    </ul>
    <div class="tab-content" style="margin-top:16px;">
     <div class="tab-pane active" id="login_details">
      <div class="panel panel-default">

      <div class="panel-heading">Destination Details</div>
       <div class="panel-body">
        <div class="form-group">
    
      
       
            <div>
            <iframe src="mapbox.php" height="460" width="1040" title="Iframe Example"></iframe>
            
            </div>
       
</div>
</br>
      
             <div align="center">
         <button type="button" name="btn_login_details" id="btn_login_details" class="btn btn-info btn-lg">Next</button>
        </div>
        <br />
       </div>
      </div>
     </div>
     <div class="tab-pane fade" id="personal_details">
      <div class="panel panel-default">
       <div class="panel-heading">Fill Personal Details</div>
       <div class="panel-body">
        <div class="form-group">
         <label>Enter Name</label>
         <input type="text" name="name" id="name" class="form-control" />
         <span id="error_first_name" class="text-danger"></span>
        </div>
        <div class="form-group">
         <label>Enter Email</label>
         <input type="text" name="email" id="email" class="form-control" />
         <span id="error_last_name" class="text-danger"></span>
        </div>
        <div class="form-group">
         <label>Gender</label>
         <label class="radio-inline">
          <input type="radio" name="gender" value="male" checked> Male
         </label>
         <label class="radio-inline">
          <input type="radio" name="gender" value="female"> Female
         </label>
        </div>
        <div class="form-group">
         <label>Enter Address</label>
         <input type="text" name="address" id="address" class="form-control" />
         <span id="error_last_name" class="text-danger"></span>
        </div>
        <div class="form-group">
         <label>Enter Phone</label>
         <input type="text" name="phone" id="phone" class="form-control" />
         <span id="error_last_name" class="text-danger"></span>
        </div>
        <br />
        <div align="center">
         <button type="button" name="previous_btn_personal_details" id="previous_btn_personal_details" class="btn btn-default btn-lg">Previous</button>
         <button type="button" name="btn_personal_details" id="btn_personal_details" class="btn btn-info btn-lg">Next</button>
        </div>
        <br />
       </div>
      </div>
     </div>
     <div class="tab-pane fade" id="contact_details">
      <div class="panel panel-default">
       <div class="panel-heading">Proof Verification</div>
       <div class="panel-body">
        <div class="form-group">
<!-- 
        <label class="col-sm-2 control-label">Government ID<span style="color:red">*</span></label>
    <div class="col-sm-4">
	<input type="file" name="uploadfile"/> -->
        
  
  
  <div align="center">
  <div class="text">
                  CHOOSE YOUR FILE
               </div>
            <div class="content">
               <div class="icon">
                  <i class="fas fa-cloud-upload-alt fa-10x"></i>
               </div>
             
            </div>
          
         </div>
         
         <div class="file-input">
         <input type="file" id="file" class="file" name="uploadfile" />
       
         <label for="file">
    Select file
    <p class="file-name"></p>
  </label>
  </div
      </div>
</div>
      
 




</div>

        <br />
        <div align="center">
         <button type="button" name="previous_btn_contact_details" id="previous_btn_contact_details" class="btn btn-default btn-lg">Previous</button>
         <button type="submit" name="btn_contact_details" id="btn_contact_details" class="btn btn-success btn-lg">Register</button>
        </div>
        <br />
       </div>
      </div>
     </div>
    </div>
   </form>
  </div>
 </body>
 
</html>

<script>
$(document).ready(function(){
 
 $('#btn_login_details').click(function(){
  
  {
   $('#list_login_details').removeClass('active active_tab1');
   $('#list_login_details').removeAttr('href data-toggle');
   $('#login_details').removeClass('active');
   $('#list_login_details').addClass('inactive_tab1');
   $('#list_personal_details').removeClass('inactive_tab1');
   $('#list_personal_details').addClass('active_tab1 active');
   $('#list_personal_details').attr('href', '#personal_details');
   $('#list_personal_details').attr('data-toggle', 'tab');
   $('#personal_details').addClass('active in');
  }
 });
 
 $('#previous_btn_personal_details').click(function(){
  $('#list_personal_details').removeClass('active active_tab1');
  $('#list_personal_details').removeAttr('href data-toggle');
  $('#personal_details').removeClass('active in');
  $('#list_personal_details').addClass('inactive_tab1');
  $('#list_login_details').removeClass('inactive_tab1');
  $('#list_login_details').addClass('active_tab1 active');
  $('#list_login_details').attr('href', '#login_details');
  $('#list_login_details').attr('data-toggle', 'tab');
  $('#login_details').addClass('active in');
 });
 
 $('#btn_personal_details').click(function(){
 
  {
   $('#list_personal_details').removeClass('active active_tab1');
   $('#list_personal_details').removeAttr('href data-toggle');
   $('#personal_details').removeClass('active');
   $('#list_personal_details').addClass('inactive_tab1');
   $('#list_contact_details').removeClass('inactive_tab1');
   $('#list_contact_details').addClass('active_tab1 active');
   $('#list_contact_details').attr('href', '#contact_details');
   $('#list_contact_details').attr('data-toggle', 'tab');
   $('#contact_details').addClass('active in');
  }
 });
 
 $('#previous_btn_contact_details').click(function(){
  $('#list_contact_details').removeClass('active active_tab1');
  $('#list_contact_details').removeAttr('href data-toggle');
  $('#contact_details').removeClass('active in');
  $('#list_contact_details').addClass('inactive_tab1');
  $('#list_personal_details').removeClass('inactive_tab1');
  $('#list_personal_details').addClass('active_tab1 active');
  $('#list_personal_details').attr('href', '#personal_details');
  $('#list_personal_details').attr('data-toggle', 'tab');
  $('#personal_details').addClass('active in');
 });
 
//  $('#btn_contact_details').click(function(){
//   var error_address = '';
//   var error_mobile_no = '';
//   var mobile_validation = /^\d{10}$/;
//   if($.trim($('#address').val()).length == 0)
//   {
//    error_address = 'Address is required';
//    $('#error_address').text(error_address);
//    $('#address').addClass('has-error');
//   }
//   else
//   {
//    error_address = '';
//    $('#error_address').text(error_address);
//    $('#address').removeClass('has-error');
//   }
  
//   if($.trim($('#mobile_no').val()).length == 0)
//   {
//    error_mobile_no = 'Mobile Number is required';
//    $('#error_mobile_no').text(error_mobile_no);
//    $('#mobile_no').addClass('has-error');
//   }
//   else
//   {
//    if (!mobile_validation.test($('#mobile_no').val()))
//    {
//     error_mobile_no = 'Invalid Mobile Number';
//     $('#error_mobile_no').text(error_mobile_no);
//     $('#mobile_no').addClass('has-error');
//    }
//    else
//    {
//     error_mobile_no = '';
//     $('#error_mobile_no').text(error_mobile_no);
//     $('#mobile_no').removeClass('has-error');
//    }
//   }
//   if(error_address != '' || error_mobile_no != '')
//   {
//    return false;
//   }
//   else
//   {
//    $('#btn_contact_details').attr("disabled", "disabled");
//    $(document).css('cursor', 'prgress');
//    $("#register_form").submit();
//   }
  
//  });
 
});
</script>

<script>

const file = document.querySelector('#file');
file.addEventListener('change', (e) => {
  // Get the selected file
  const [file] = e.target.files;
  // Get the file name and size
  const { name: fileName, size } = file;
  // Convert size in bytes to kilo bytes
  const fileSize = (size / 1000).toFixed(2);
  // Set the text content
  const fileNameAndSize = `${fileName} - ${fileSize}KB`;
  document.querySelector('.file-name').textContent = fileNameAndSize;
});

</script>
   
   
