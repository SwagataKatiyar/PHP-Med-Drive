<?php
session_start();
include('includes/config.php');
if(isset($_POST['alogin']))
{
$UserName=$_POST['UserName'];
$Password=$_POST['Password'];
$sql ="SELECT UserName,Password FROM admin WHERE UserName=:UserName and Password=:Password";
$query= $dbh -> prepare($sql);
$query-> bindParam(':UserName', $UserName, PDO::PARAM_STR);
$query-> bindParam(':Password', $Password, PDO::PARAM_STR);
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
	$_SESSION['alogin']=$_POST['UserName'];
	echo "<script type='text/javascript'> document.location = 'dashboard.php'; </script>";

} else{
  
	echo "<script>alert('Invalid Details');</script>";
	

}

}

?>
<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title> Service Portal | Admin Login</title>
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<link rel="stylesheet" href="css/fileinput.min.css">
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<link rel="stylesheet" href="css/style.css">

	<style>

@import url('https://fonts.googleapis.com/css?family=Roboto:300,400');


a,a:hover{
  text-decoration: none;
}




.myform-area .form-area .form-content{
  width: 50%;
  padding: 40px 30px;
 
}

.myform-area .form-area .form-content h2{
  color: #fff;

}
.myform-area .form-area .form-content p{
  color: #fff;
}
.myform-area .form-area .form-content ul{
  margin-top: 50px;
}

.myform-area .form-area .form-content ul li{
  display: inline-block;
  margin-right: 10px;
}
.myform-area .form-area .form-content a i{
    margin-right: 10px;
}


.myform-area .form-area .form-input{
  background-color: white;
  position: relative;
  overflow: hidden;
  box-shadow: 0 0 40px 0 #e1e1e1;
  position: relative;
  top:120px;
  left:400px;
}
.myform-area .form-area .form-input{
    width: 50%;
    background: #fff;
    padding: 40px 30px;
}

.myform-area .form-area .form-input h2{
  margin-bottom: 20px;
    color: #07315B;
}

.myform-area .form-area .form-input input{
    position: relative;
    height: 60px;
    padding: 20px 0;
}
.myform-area .form-area .form-input textarea{
    height: 120px;
    padding: 20px 0;
}

.myform-area .form-area .form-input input,
.myform-area .form-area .form-input textarea{
    text-transform: capitalize;
    width: 100%;
    box-sizing: border-box;
    outline: none;
    border: none;
    border-bottom: 2px solid #e1e1e1;
    color: #07315B;
}
.myform-area .form-area .form-input form .form-group{
    position: relative;
}
.myform-area .form-area .form-input form .form-group label{
    position: absolute;
    text-transform: capitalize;
    top: 20px;
    left: 0;
    pointer-events: none;
    font-size: 14px;
    color: #595959;
    margin-bottom: 0;
    transition: all .6s;
}
.myform-area .form-area .form-input input:focus ~ label,
.myform-area .form-area .form-input textarea:focus ~ label,
.myform-area .form-area .form-input input:valid ~ label,
.myform-area .form-area .form-input textarea:valid ~ label{
    top: -5px;
    opacity: 0;
    left: 0;
    color: rgba(103,58,183);
    font-size: 12px;
    color: #07315B;
    font-weight: bold;
}
.myform-area .form-area .form-input input:focus,
.myform-area .form-area .form-input textarea:focus,
.myform-area .form-area .form-input input:valid,
.myform-area .form-area .form-input textarea:valid{
    border-bottom: 2px solid rgba(103,58,183);
}
.myform-area .form-area .form-text{
    margin-top: 30px;
}
.myform-area .form-area .form-text span a{
    color: rgba(103,58,183);
}
.myform-area .form-area .myform-button{
    margin-top: 30px;
}
.myform-area .form-area .myform-button .myform-btn{
    width: 100%;
    height: 50px;
    font-size: 17px;
    background: rgba(103,58,183);
    border: none;
    border-radius: 50px;
    color: #fff;
    cursor: pointer;
    -webkit-transition: all .5s;
    -o-transition: all .5s;
    transition: all .5s;
}
.myform-area .form-area .myform-button .myform-btn:hover{
    background: #07315B;
}
	
	</style>
</head>


<body>
	
<section class="myform-area">
              <div class="container">
                  <div class="row justify-content-center">
                      <div class="col-lg-8">
                          <div class="form-area login-form">
                            
                              <div class="form-input">
                                  <h2>Admin Login</h2>
                                  <form method="post">
                                      <div class="form-group">
                                          <input type="text"  id="" name="UserName" required>
                                          <label>User Name</label>
                                      </div>
                                      <div class="form-group">
                                          <input type="password" id="" name="Password" required>
                                          <label>password</label>
                                      </div>
                                      <div class="myform-button">
                                          <button class="myform-btn" name="alogin">Login</button>
                                      </div>
                                  </form>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </section>
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

</body>

</html>