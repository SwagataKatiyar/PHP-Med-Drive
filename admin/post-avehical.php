<?php
session_start();
error_reporting(0);
include('includes/config.php');

if(isset($_POST['save'])){
    

	$id = $_POST['id'];
	$DriverName = $_POST['DriverName'];
	$VehiclesTitle = $_POST['VehiclesTitle'];
	$VehiclesBrand = $_POST['VehiclesBrand'];
	$VehiclesOverview  = $_POST['VehiclesOverview'];
	$PricePerDay = $_POST['PricePerDay'];
	$FuelType = $_POST['FuelType'];
	$ModelYear = $_POST['ModelYear'];
	$SeatingCapacity = $_POST['SeatingCapacity'];
	$AirConditioner = $_POST['AirConditioner'];
	$PowerDoorLocks = $_POST['PowerDoorLocks'];
	$AntiLockBrakingSystem = $_POST['AntiLockBrakingSystem'];
	$BrakeAssist = $_POST['BrakeAssist'];
	$PowerSteering = $_POST['PowerSteering'];
	$DriverAirbag = $_POST['DriverAirbag'];
	$PassengerAirbag = $_POST['PassengerAirbag'];
	$PowerWindows	= $_POST['PowerWindows'];
	
	$sql = "INSERT INTO newvehicles (`id`,`DriverName`,`VehiclesTitle`,`VehiclesBrand`,`VehiclesOverview`,`PricePerDay`,`FuelType`,`ModelYear`,`SeatingCapacity`,`AirConditioner`,`PowerDoorLocks`,`AntiLockBrakingSystem`,`BrakeAssist`,`PowerSteering`,`DriverAirbag`,`PassengerAirbag`,`PowerWindows`)
   VALUES ('$id','$DriverName','$VehiclesTitle',' $VehiclesBrand','$VehiclesOverview','$PricePerDay','$FuelType','$ModelYear','$SeatingCapacity','$AirConditioner','$PowerDoorLocks','$AntiLockBrakingSystem','$BrakeAssist','$PowerSteering','$DriverAirbag','$PassengerAirbag','$PowerWindows')";
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

						<h2 class="page-title">Add Vehicle</h2>

				<div class="row">
					<div class="col-md-12">
						<div class="panel panel-default">
							<div class="panel-heading">Basic Info</div>
<br>

<form method="post" class="form-horizontal" style="padding:8px;" enctype="multipart/form-data">

  <div class="form-group">
  <label class="col-sm-2 control-label">Driver Name<span style="color:red">*</span></label>
    <div class="col-sm-4">
      <input type="text" name="DriverName" class="form-control" required>
    </div>


    <label class="col-sm-2 control-label">Vehicle Title<span style="color:red">*</span></label>
    <div class="col-sm-4">
      <input type="text" name="VehiclesTitle" class="form-control" required>
    </div>

	
	</div>
											
	<div class="form-group">
		<label class="col-sm-2 control-label">Vehical Overview<span style="color:red">*</span></label>
		<div class="col-sm-4">
		<textarea class="form-control" name="VehiclesOverview" rows="3" required></textarea>
		</div>
		<label class="col-sm-2 control-label">Select Brand<span style="color:red">*</span></label>
      <div class="col-sm-4">
        <select class="form-control" name="VehiclesBrand" required>
		<option value=""> Select </option>

		<option value="Maruti">Maruti</option>
	<option value="Toyota">Toyota</option>
	<option value="Nissan">Nissan</option>
	<option value="Honda">Honda</option>
	<option value="Other">Other</option>

	</select>
	</div>
		</div>

		<div class="hr-dashed"></div>

		<div class="form-group">
		<label class="col-sm-2 control-label">Price Per Day<span style="color:red">*</span></label>
		<div class="col-sm-4">
		<input type="text" name="PricePerDay" class="form-control" required>
	</div>
	<label class="col-sm-2 control-label">Select Fuel Type<span style="color:red">*</span></label>
	<div class="col-sm-4">
	<select class="form-control" name="FuelType" required>
	<option value=""> Select </option>

	<option value="Petrol">Petrol</option>
	<option value="Diesel">Diesel</option>
	<option value="CNG">CNG</option>
	</select>
	</div>
	</div>


<div class="form-group">
<label class="col-sm-2 control-label">Model Year<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="ModelYear" class="form-control" required>
</div>
<label class="col-sm-2 control-label">Seating Capacity<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="SeatingCapacity" class="form-control" required>
</div>
</div>
<div class="hr-dashed"></div>





<div class="hr-dashed"></div>									
</div>
</div>
</div>
</div>
							

<div class="row" style="padding:10px;">
<div class="col-md-12">
<div class="panel panel-default">
<div class="panel-heading">Accessories</div>
<div class="panel-body" style="padding:8px;">


<div class="form-group" >
<div class="col-sm-3">
<div class="checkbox checkbox-inline">
<input type="checkbox" id="airconditioner" name="AirConditioner" value="1">
<label for="airconditioner"> Air Conditioner </label>
</div>
</div>
<div class="col-sm-3">
<div class="checkbox checkbox-inline">
<input type="checkbox" id="powerdoorlocks" name="PowerDoorLocks" value="1">
<label for="powerdoorlocks"> Power Door Locks </label>
</div></div>
<div class="col-sm-3">
<div class="checkbox checkbox-inline">
<input type="checkbox" id="antilockbrakingsys" name="AntiLockBrakingSystem" value="1">
<label for="antilockbrakingsys"> AntiLock Braking System </label>
</div></div>
<div class="checkbox checkbox-inline">
<input type="checkbox" id="brakeassist" name="BrakeAssist" value="1">
<label for="brakeassist"> Brake Assist </label>
</div>
</div>



<div class="form-group">

<div class="col-sm-3">
<div class="checkbox checkbox-inline">
<input type="checkbox" id="powersteering" name="PowerSteering" value="1">
<label for="inlineCheckbox5"> Power Steering </label>
</div>
</div>
<div class="col-sm-3">
<div class="checkbox checkbox-inline">
<input type="checkbox" id="driverairbag" name="DriverAirbag" value="1">
<label for="driverairbag">Driver Airbag</label>
</div>
</div>
<div class="col-sm-3">
<div class="checkbox checkbox-inline">
<input type="checkbox" id="passengerairbag" name="PassengerAirbag" value="1">
<label for="passengerairbag"> Passenger Airbag </label>
</div></div>
<div class="checkbox checkbox-inline">
<input type="checkbox" id="powerwindow" name="PowerWindows" value="1">
<label for="powerwindow"> Power Windows </label>
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