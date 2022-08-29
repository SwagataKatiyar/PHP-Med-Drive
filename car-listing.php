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
<title>24x7 Ambulance Booking | MedDrive</title>
<!--Bootstrap -->
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
<!--Custome Style -->
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

<!-- SWITCHER -->

		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/red.css" title="red" media="all"data-default-color="true" />
        
<!-- Fav and touch icons -->
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/images/favicon-icon/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/images/favicon-icon/apple-touch-icon-114-precomposed.html">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/favicon-icon/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="assets/images/favicon-icon/apple-touch-icon-57-precomposed.png">
<link rel="shortcut icon" href="assets/images/favicon-icon/favicon.png">
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
</head>
<body>

<!-- Start Switcher -->
<?php include('includes/colorswitcher.php');?>
<!-- /Switcher -->  

<!--Header--> 
<?php include('includes/header.php');?>
<!-- /Header --> 

<!--Page Header-->
<section class="page-header listing_page">
  <div class="container">
    <div class="page-header_wrap">
      <div class="page-heading">
        <h1>Ambulance Listing</h1>
      </div>
      <ul class="coustom-breadcrumb">
        <li><a href="#">Home</a></li>
        <li>Ambulances</li>
      </ul>
    </div>
  </div>
  <!-- Dark Overlay-->
  <div class="dark-overlay"></div>
</section>
<!-- /Page Header--> 

<!--Listing-->





<section class="listing-page">
  <div class="container table-responsive">
    
	<?php

if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];

    if($valueToSearch=="ALL"){

      $query = "SELECT * FROM `list`";
    $search_result = filterTable($query);

    }

    else{

      $query = "SELECT * FROM `list` WHERE `LOCATION` = '$valueToSearch' ";
      $search_result = filterTable($query);

    }
    
}

 else {
    $query = "SELECT * FROM `list`";
    $search_result = filterTable($query);
}

// function to connect and execute the query
function filterTable($query)
{
    $connect = mysqli_connect("localhost", "root", "", "minor");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}

?>
     
      <!--Side-Bar-->
     
          <div class="widget_heading">
            <h5><i class="fa fa-filter" aria-hidden="true"></i> Find Your Ambulance </h5>
          </div>
          <div class="sidebar_filter">
            <form action="car-listing.php" method="post">
              <div class="form-group select col-md-10">
                <select class="form-control" name="valueToSearch">
                  <option>SELECT</option>
                  <option>ALL </option>
                  <option>DELHI</option>
                  <option>CHANDIGARH</option>
                  <option>UTTAR PRADESH</option>
                  <option>KERALA</option>
                  <option>MUMBAI</option>
                  <option>GOA</option>
                  <option>GURUGRAM</option>
                  <option>NOIDA</option>
                 
                </select>
              </div></div>
              
             
              <div class="form-group col-md-2">
                <button type="submit" class="btn btn-block" name='search'><i class="fa fa-search" aria-hidden="true"></i> Search</button>
              </div>
            </form>
         

        
      <!--/Side-Bar--> 
            
      <table class="table table-striped table-hover text-center">
				<thead style="text-align:center">
					<tr>
						<th>ID</th>
						<th>NAME</th>
						<th>PHONE</th>
						<th>COST</th>
            <th>TYPE OF SERVICE</th>
						<th>LOCATION</th>
            <th>AVAILABLE</th>
            <th>ACTION</th>
					</tr>
				</thead>

    
                <?php while($row = mysqli_fetch_array($search_result)):?>
                <tr>
                    <td><?php echo $row['id'];?></td>
                    <td><?php echo $row['NAME'];?></td>
                    <td><?php echo $row['PHONE'];?></td>
                    <td><?php echo $row['COST'];?></td>
                    <td><?php echo $row['SERVICE'];?></td>
                    <td><?php echo $row['LOCATION'];?></td>
                    <td><?php 
                     if(strcmp($row['status'],"1")==0){
                        echo "YES";
                     }
                      else
                        echo "NO";
                      

                     ?></td>
                   
                    <td>
							<a href="vehical-details.php" class="edit" id="booknow">BOOK NOW</a>
							
						</td>
                </tr>
                
                <?php endwhile;?>
            </table>
            <br>
        </form>
    </div>
  </div>
</section>
<!-- /Listing--> 

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

<!-- Scripts --> 
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script> 
<script src="assets/js/interface.js"></script> 
<!--Switcher-->
<script src="assets/switcher/js/switcher.js"></script>
<!--bootstrap-slider-JS--> 
<script src="assets/js/bootstrap-slider.min.js"></script> 
<!--Slider-JS--> 
<script src="assets/js/slick.min.js"></script> 
<script src="assets/js/owl.carousel.min.js"></script>



</body>
</html>
