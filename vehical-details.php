<?php 
session_start();
include('includes/config.php');
error_reporting(0);



?>


<!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="keywords" content="">
<meta name="description" content="">
<title>24x7 Ambulance Booking | MedDrive Services| Vehicle Details</title>
<!--Bootstrap -->
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">

<link rel="stylesheet" href="assets/maps/map.css">

<link rel="stylesheet" href="assets/css/style.css" type="text/css">
<!--OWL Carousel slider-->
<link rel="stylesheet" href="assets/css/owl.carousel.css" type="text/css">
<link rel="stylesheet" href="assets/css/owl.transitions.css" type="text/css">
<!--slick-slider -->
<link href="assets/css/slick.css" rel="stylesheet">
<!--bootstrap-slider -->
<link href="assets/css/bootstrap-slider.min.css" rel="stylesheet">
<!--FontAwesome Font Style -->
<link href="assets/css/font-awesome.min.css" rel="stylesheet">

<link href="https://api.mapbox.com/mapbox-gl-js/v2.6.0/mapbox-gl.css" rel="stylesheet">
<link href="/maps/map.css" rel="stylesheet">
<script src="https://api.mapbox.com/mapbox-gl-js/v2.6.0/mapbox-gl.js"></script>
<script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-directions/v4.1.0/mapbox-gl-directions.js"></script>
<link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-directions/v4.1.0/mapbox-gl-directions.css" type="text/css">
<!-- geocoder -->
<script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.7.2/mapbox-gl-geocoder.min.js"></script>
<link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.7.2/mapbox-gl-geocoder.css" type="text/css">



<!-- SWITCHER -->
		<link rel="stylesheet" id="switcher-css" type="text/css" href="assets/switcher/css/switcher.css" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/red.css" title="red" media="all" data-default-color="true" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/orange.css" title="orange" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/blue.css" title="blue" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/pink.css" title="pink" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/green.css" title="green" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/purple.css" title="purple" media="all" />
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/images/favicon-icon/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/images/favicon-icon/apple-touch-icon-114-precomposed.html">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/favicon-icon/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="assets/images/favicon-icon/apple-touch-icon-57-precomposed.png">
<link rel="shortcut icon" href="assets/images/favicon-icon/favicon.png">
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
</head>
<body>



<!--Header-->
<?php include('includes/header.php');?>
<!-- /Header --> 

     

        
        

<!--/Listing-Image-Slider-->


      
      <!--Side-Bar-->
      <br>
      <br>
      <div class="container">
      <aside class="col-md-4">
      
        <div class="sidebar_widget">
          <div class="widget_heading">
            <h5><i class="fa fa-envelope" aria-hidden="true"></i>Book Now</h5>
          </div>
          <form method="post">
          <div class="form-group">
              <input type="text" class="form-control" name="name" placeholder="NAME" required>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="email" placeholder="EMAIL" required>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="address" placeholder="PICK UP ADDRESS" required>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="phone" placeholder="PHONE NUMBER" required>
            </div>
            <div class="form-group">
            <input type="file" name="uploadfile"/> <button type="submit" name="upload">Upload</button>  
          </div>

            <div class="text-center">
           
             <div class="form-group btn btn-xL uppercase">
              <input id="myButton" name="book" class="btn btn-xl uppercase " type="submit" value="BOOK NOW"/>
            </div>
</div>
            
          </form>
        </div>

      </aside>
      <div class="col-md-8">
      <div class="contain">  
        <div class="map-container">
            <div>
            <iframe src="mapbox.html" height="430" width="800" title="Iframe Example"></iframe>
            </div>
        </div>    
    </div>
              </div>

              

        
      <!--/Side-Bar--> 

      
      <script type="text/javascript">
    document.getElementById("myButton").onclick = function () {
        location.href = "https://rzp.io/l/vCedAHIjtC";
    };
</script>

      <?php
      if(isset($_POST['book']))
        {    
     $name = $_POST['name'];
     $email = $_POST['email'];
     $address = $_POST['address'];
     $phone = $_POST['phone'];
     $sql = "INSERT INTO booked (NAME,EMAIL,ADDRESS,PHONE)
     VALUES ('$name','$email','$address','$phone')";
      $query = $dbh->prepare($sql);
      $query->execute();
      }
?>
    </div>

    
    
  </div>
</section>
<!--/Listing-detail--> 
     

   
    

<!--Footer -->
<?php include('includes/footer.php');?>
<!-- /Footer--> 

<!--Back to top-->
<div id="back-top" class="back-top"> <a href="#top"><i class="fa fa-angle-up" aria-hidden="true"></i> </a> </div>
<!--/Back to top--> 

<!--Login-Form -->
<?php include('includes/login.php');?>
<!--/Login-Form --> 

<!--Register-Form -->
<?php include('includes/registration.php');?>

<!--/Register-Form --> 

<!--Forgot-password-Form -->
<?php include('includes/forgotpassword.php');?>

<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script> 
<script src="assets/js/interface.js"></script> 
<script src="assets/switcher/js/switcher.js"></script>
<script src="assets/js/bootstrap-slider.min.js"></script> 
<script src="assets/js/slick.min.js"></script> 
<script src="assets/js/owl.carousel.min.js"></script>  
<script src="assets/maps/scriptmap.js"></script>
<script src="assets/maps/map.js"></script>

    
</body>
</html>