<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(isset($_POST['send']))
  {
$name=$_POST['fullname'];
$email=$_POST['email'];
$contactno=$_POST['contactno'];
$message=$_POST['message'];
$sql="INSERT INTO  tblcontactusquery(name,EmailId,ContactNumber,Message) VALUES(:name,:email,:contactno,:message)";
$query = $dbh->prepare($sql);
$query->bindParam(':name',$name,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':contactno',$contactno,PDO::PARAM_STR);
$query->bindParam(':message',$message,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$msg="Query Sent. We will contact you shortly";
}
else 
{
$error="Something went wrong. Please try again";
}

}
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="keywords" content="">
<meta name="description" content="">
<title>FAQs</title>
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
		<link rel="stylesheet" id="switcher-css" type="text/css" href="assets/switcher/css/switcher.css" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/red.css" title="red" media="all" data-default-color="true" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/orange.css" title="orange" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/blue.css" title="blue" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/pink.css" title="pink" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/green.css" title="green" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/purple.css" title="purple" media="all" />
        
<!-- Fav and touch icons -->
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/images/favicon-icon/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/images/favicon-icon/apple-touch-icon-114-precomposed.html">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/favicon-icon/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="assets/images/favicon-icon/apple-touch-icon-57-precomposed.png">
<link rel="shortcut icon" href="assets/images/favicon-icon/favicon.png">
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
<link rel='stylesheet' href='https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css'>
<style>
.container1 {
  margin: 0 auto;
  padding: 6rem;
  width: 100rem;
}
h3 {
  font-size: 1.75rem;
  color: #373d51;
  padding: 1.3rem;
  margin: 0;
}
.accordion a {
  position: relative;
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
  -webkit-flex-direction: column;
  -ms-flex-direction: column;
  flex-direction: column;
  width: 100%;
  padding: 1rem 3rem 1rem 1rem;
  color: #7288a2;
  font-size: 2.15rem;
  font-weight: 500;
  border-bottom: 1px solid #e5e5e5;
}
.accordion a:hover,
.accordion a:hover::after {
  cursor: pointer;
  color: #ff5353;
}
.accordion a:hover::after {
  border: 1px solid #ff5353;
}
.accordion a.active {
  color: #ff5353;
  border-bottom: 1px solid #ff5353;
}
.accordion a::after {
  font-family: 'Ionicons';
  content: '\f218';
  position: absolute;
  float: right;
  right: 1rem;
  font-size: 1rem;
  color: #7288a2;
  padding: 5px;
  width: 30px;
  height: 30px;
  -webkit-border-radius: 50%;
  -moz-border-radius: 50%;
  border-radius: 50%;
  border: 1px solid #7288a2;
  text-align: center;
}
.accordion a.active::after {
  font-family: 'Ionicons';
  content: '\f209';
  color: #ff5353;
  border: 1px solid #ff5353;
}
.accordion .content {
  opacity: 0;
  padding: 0 1rem;
  max-height: 0;
  border-bottom: 1px solid #e5e5e5;
  overflow: hidden;
  clear: both;
  -webkit-transition: all 0.2s ease 0.15s;
  -o-transition: all 0.2s ease 0.15s;
  transition: all 0.2s ease 0.15s;
}
.accordion .content p {
  font-size: 2rem;
  font-weight: 300;
}
.accordion .content.active {
  opacity: 1;
  padding: 1rem;
  max-height: 100%;
  -webkit-transition: all 0.35s ease 0.15s;
  -o-transition: all 0.35s ease 0.15s;
  transition: all 0.35s ease 0.15s;
}
	</style>
</head>
<body>

<<!-- Start Switcher -->
<?php include('includes/colorswitcher.php');?>
<!-- /Switcher -->  
        
<!--Header-->
<?php include('includes/header.php');?>
<!-- /Header --> 
<!--Page Header-->
<section class="page-header contactus_page">
  <div class="container">
    <div class="page-header_wrap">
      <div class="page-heading">
        <h1>FAQs</h1>
      </div>
      <ul class="coustom-breadcrumb">
        <li><a href="#">Home</a></li>
        <li>FAQs</li>
      </ul>
    </div>
  </div>
  <!-- Dark Overlay-->
  <div class="dark-overlay"></div>
</section>
<!-- /Page Header--> 
<div class="container1">
 
  <h2>Frequently Asked Questions</h2>
 <br></br>
  <div class="accordion">
    <div class="accordion-item">
      <a>Is this a 24/7 service?</a>
      <div class="content">
        <p> Yes, our call centre is operational 24/7/365</p>
      </div>
    </div>
    <div class="accordion-item">
      <a>Looking at the COVID situation, what all precautions you’re taking?</a>
      <div class="content">
        <p> Our ambulances are sanitized before and after every trip, PPE kits are worn by staff at all times, and payment mode is digital- cashless</p>
      </div>
    </div>
    <div class="accordion-item">
      <a>How can I make payment to you and do you accept cash?</a>
      <div class="content">
        <p>You can make a payment through digital mechanism such as google pay, paytm, UPI, Net banking or cash. Digital payment is preferred.</p>
      </div>
    </div>
    <div class="accordion-item">
      <a>What all types of ambulances do you provide?</a>
      <div class="content">
        <p> We provide basic life support, advanced cardiac life support, Paediatric, Hearse van, train ambulance &amp; Air ambulance.</p>
      </div>
    </div>
    <div class="accordion-item">
      <a>Can you arrange the bed in the nearest hospital?</a>
      <div class="content">
        <p>Yes we will try to support as much as possible for our members.</p>
      </div>
    </div>
  </div>
  
</div>
 


 


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
<!--/Forgot-password-Form --> 

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
<script src='https://code.jquery.com/jquery-3.2.1.min.js'></script>
<script>
	const items = document.querySelectorAll(".accordion a");
  <?php
session_start();
error_reporting(0);
include('includes/config.php');
if(isset($_POST['send']))
  {
$name=$_POST['fullname'];
$email=$_POST['email'];
$contactno=$_POST['contactno'];
$message=$_POST['message'];
$sql="INSERT INTO  tblcontactusquery(name,EmailId,ContactNumber,Message) VALUES(:name,:email,:contactno,:message)";
$query = $dbh->prepare($sql);
$query->bindParam(':name',$name,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':contactno',$contactno,PDO::PARAM_STR);
$query->bindParam(':message',$message,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$msg="Query Sent. We will contact you shortly";
}
else 
{
$error="Something went wrong. Please try again";
}

}
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="keywords" content="">
<meta name="description" content="">
<title>FAQs</title>
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
		<link rel="stylesheet" id="switcher-css" type="text/css" href="assets/switcher/css/switcher.css" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/red.css" title="red" media="all" data-default-color="true" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/orange.css" title="orange" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/blue.css" title="blue" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/pink.css" title="pink" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/green.css" title="green" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/purple.css" title="purple" media="all" />
        
<!-- Fav and touch icons -->
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/images/favicon-icon/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/images/favicon-icon/apple-touch-icon-114-precomposed.html">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/favicon-icon/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="assets/images/favicon-icon/apple-touch-icon-57-precomposed.png">
<link rel="shortcut icon" href="assets/images/favicon-icon/favicon.png">
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
<link rel='stylesheet' href='https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css'>
<style>
.container1 {
  margin: 0 auto;
  padding: 6rem;
  width: 100rem;
}
h3 {
  font-size: 1.75rem;
  color: #373d51;
  padding: 1.3rem;
  margin: 0;
}
.accordion a {
  position: relative;
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
  -webkit-flex-direction: column;
  -ms-flex-direction: column;
  flex-direction: column;
  width: 100%;
  padding: 1rem 3rem 1rem 1rem;
  color: #7288a2;
  font-size: 2.15rem;
  font-weight: 500;
  border-bottom: 1px solid #e5e5e5;
}
.accordion a:hover,
.accordion a:hover::after {
  cursor: pointer;
  color: #ff5353;
}
.accordion a:hover::after {
  border: 1px solid #ff5353;
}
.accordion a.active {
  color: #ff5353;
  border-bottom: 1px solid #ff5353;
}
.accordion a::after {
  font-family: 'Ionicons';
  content: '\f218';
  position: absolute;
  float: right;
  right: 1rem;
  font-size: 1rem;
  color: #7288a2;
  padding: 5px;
  width: 30px;
  height: 30px;
  -webkit-border-radius: 50%;
  -moz-border-radius: 50%;
  border-radius: 50%;
  border: 1px solid #7288a2;
  text-align: center;
}
.accordion a.active::after {
  font-family: 'Ionicons';
  content: '\f209';
  color: #ff5353;
  border: 1px solid #ff5353;
}
.accordion .content {
  opacity: 0;
  padding: 0 1rem;
  max-height: 0;
  border-bottom: 1px solid #e5e5e5;
  overflow: hidden;
  clear: both;
  -webkit-transition: all 0.2s ease 0.15s;
  -o-transition: all 0.2s ease 0.15s;
  transition: all 0.2s ease 0.15s;
}
.accordion .content p {
  font-size: 2rem;
  font-weight: 300;
}
.accordion .content.active {
  opacity: 1;
  padding: 1rem;
  max-height: 100%;
  -webkit-transition: all 0.35s ease 0.15s;
  -o-transition: all 0.35s ease 0.15s;
  transition: all 0.35s ease 0.15s;
}
	</style>
</head>
<body>

<<!-- Start Switcher -->
<?php include('includes/colorswitcher.php');?>
<!-- /Switcher -->  
        
<!--Header-->
<?php include('includes/header.php');?>
<!-- /Header --> 
<!--Page Header-->
<section class="page-header ">
  <div class="container">
    <div class="page-header_wrap">
      <div class="page-heading">
        <h1>FAQs</h1>
      </div>
      <ul class="coustom-breadcrumb">
        <li><a href="#">Home</a></li>
        <li>FAQs</li>
      </ul>
    </div>
  </div>
  <!-- Dark Overlay-->
  <div class="dark-overlay"></div>
</section>
<!-- /Page Header--> 
<div class="container1">
 
  <h2>Frequently Asked Questions</h2>
 <br></br>
  <div class="accordion">
    <div class="accordion-item">
      <a>Is this a 24/7 service?</a>
      <div class="content">
        <p> Yes, our call centre is operational 24/7/365</p>
      </div>
    </div>
    <div class="accordion-item">
      <a>Looking at the COVID situation, what all precautions you’re taking?</a>
      <div class="content">
        <p> Our ambulances are sanitized before and after every trip, PPE kits are worn by staff at all times, and payment mode is digital- cashless</p>
      </div>
    </div>
    <div class="accordion-item">
      <a>How can I make payment to you and do you accept cash?</a>
      <div class="content">
        <p>You can make a payment through digital mechanism such as google pay, paytm, UPI, Net banking or cash. Digital payment is preferred.</p>
      </div>
    </div>
    <div class="accordion-item">
      <a>What all types of ambulances do you provide?</a>
      <div class="content">
        <p> We provide basic life support, advanced cardiac life support, Paediatric, Hearse van, train ambulance &amp; Air ambulance.</p>
      </div>
    </div>
    <div class="accordion-item">
      <a>Can you arrange the bed in the nearest hospital?</a>
      <div class="content">
        <p>Yes we will try to support as much as possible for our members.</p>
      </div>
    </div>
  </div>
  
</div>
 


 


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
<!--/Forgot-password-Form --> 

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
<script src='https://code.jquery.com/jquery-3.2.1.min.js'></script>
<script>
	const items = document.querySelectorAll(".accordion a");
 
 function toggleAccordion(){
   this.classList.toggle('active');
   this.nextElementSibling.classList.toggle('active');
 }
  
 items.forEach(item => item.addEventListener('click', toggleAccordion));
</script>
</body>


</html>

 function toggleAccordion(){
   this.classList.toggle('active');
   this.nextElementSibling.classList.toggle('active');
 }
  
 items.forEach(item => item.addEventListener('click', toggleAccordion));
</script>
</body>


</html>
