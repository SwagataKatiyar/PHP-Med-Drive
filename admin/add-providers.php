<?php
session_start();
error_reporting(0);
include('includes/config.php');

if(isset($_POST['save'])){
    
	$NAME = $_POST['NAME'];
    $PHONE = $_POST['PHONE'];
    $COST = $_POST['COST'];
    $TYPEOFSERVICE = $_POST['SERVICE'];
    $LOCATION = $_POST['LOCATION'];
    $AVAILABLE = $_POST['status'];
	
	
	$sql = "INSERT INTO list (`NAME`,`PHONE`,`COST`,`SERVICE`,`LOCATION`,`status`)
   VALUES ('$NAME','$PHONE','$COST','$TYPEOFSERVICE','$LOCATION','$AVAILABLE')";
	$query = $dbh->prepare($sql);
	$query->execute();


	}

?>

<!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1">

<!-- Font awesome -->
<link rel="stylesheet" href="css/font-awesome.min.css">
	<!-- Sandstone Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Bootstrap Datatables -->
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<!-- Bootstrap social button library -->
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<!-- Bootstrap select -->
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<!-- Bootstrap file input -->
	<link rel="stylesheet" href="css/fileinput.min.css">
	<!-- Awesome Bootstrap checkbox -->
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<!-- Admin Stye -->
	<link rel="stylesheet" href="css/style.css">

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


<link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/images/favicon-icon/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/images/favicon-icon/apple-touch-icon-114-precomposed.html">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/favicon-icon/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="assets/images/favicon-icon/apple-touch-icon-57-precomposed.png">
<link rel="shortcut icon" href="assets/images/favicon-icon/favicon.png">
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
</head>

<body>
<?php include('includes/header.php');?>

	<div class="ts-main-content">
		<?php include('includes/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">

						<h2 class="page-title">Add Providers</h2>

				<div class="row">
					<div class="col-md-12">
						<div class="panel panel-default">
							<div class="panel-heading">Add</div>
<br>

<form method="post" class="form-horizontal" style="padding:60px;" enctype="multipart/form-data">

  <div class="form-group">
  <label class="col-sm-2 control-label">NAME<span style="color:red">*</span></label>
    <div class="col-sm-4">
      <input type="text" name="NAME" class="form-control" required>
    </div>


    <label class="col-sm-2 control-label">PHONE<span style="color:red">*</span></label>
    <div class="col-sm-4">
      <input type="text" name="PHONE" class="form-control" required>
    </div>

	
	</div>
											
	<div class="form-group">
		<label class="col-sm-2 control-label">COST<span style="color:red">*</span></label>
		<div class="col-sm-4">
		<textarea class="form-control" name="COST" rows="1" required></textarea>
		</div>

        <label class="col-sm-2 control-label">TYPE OF SERVICE<span style="color:red">*</span></label>
		<div class="col-sm-4">
		<select class="selectpicker" name="SERVICE" required>
		<option value=""> Select </option>

		<option value="Public Hospital">Public Hospital</option>
        <option value="Private Hospital">Private Hospital</option>
        <option value="Guruswara">Gurudwara Service</option>
        <option value="Personal/Pvt Service">Personal/Pvt Service</option>
	

	</select>
		</div>

	

		</div>

		<div class="hr-dashed"></div>

		<div class="form-group">
		<label class="col-sm-2 control-label">LOCATION<span style="color:red">*</span></label>
		<div class="col-sm-4">
		<input type="text" name="LOCATION" class="form-control" required>
	</div>
	

	


<div class="hr-dashed"></div>





<div class="hr-dashed"></div>									
</div>
</div>
</div>
</div>
							





</div>
</div>

<div class="form-group">
<div class="col-sm-8 col-sm-offset-2 text-center">
<button class="btn btn-default" type="reset">Cancel</button>
<input class="btn btn-danger" name="save" type="submit" id="save" value="Save Changes"/>
</div>
</div>



</form>


									</div>
								</div>
							</div>
						</div>
						
					

					</div>
				</div>
				
			

			</div>
		</div>
	</div>
	

	<!-- Loading Scripts -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>

	<br>

	<!--Footer -->

<!-- /Footer--> 
</body>
</html>