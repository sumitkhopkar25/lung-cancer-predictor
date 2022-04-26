<?php 
  require 'db/register.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Theme Made By www.w3schools.com - No Copyright -->
  <title>Prediction of Lung Cancer</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap-3.3.7/bootstrap-3.3.7/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/font-awesome-4.6.3/css/font-awesome.css">
  <link rel="stylesheet" href="css/main.css">
  <link href="css/font-families/montserrat.css" rel="stylesheet" type="text/css">
  <link href="css/font-families/lato.css" rel="stylesheet" type="text/css">
  <script src="javascript/jquery.min.js"></script>
  <script src="javascript/main.js"></script>
  <script src="css/bootstrap-3.3.7/bootstrap-3.3.7/dist/js/bootstrap.min.js"></script>
</head>

<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="index.php">Logo</a>
    </div>
   </div>
 </nav>

	<div  id="main-wrapper"> 
		<center><h2>Registration Page </h2>
			
		<form class="form-horizontal" action="register_view.php" method="post">
		<div class = "form-group container-fluid">
			<div class = "row">
			<label class="control-label">Email:</label><br>
			<div class = "col-lg-4"></div><div class = "col-lg-4"><input name="username" type="text" class="inputvalues form-control" placeholder="Type Your Username" required/></div><div class = "col-lg-4"><br><br>
			</div>
			<div class = "row">
			<label class="control-label">Password:</label><br>
			<div class = "col-lg-4"></div><div class = "col-lg-4"><input name="password" type="password" class="inputvalues form-control" placeholder="Type Your password" required/></div><div class = "col-lg-4"><br><br>
			</div>
			<div class = "row">
			<label class="control-label">Confirm Password:</label><br>
			<div class = "col-lg-4"></div><div class = "col-lg-4"><input name="cpassword" type="password" class="inputvalues form-control" placeholder="Confirm your password" required/></div><div class = "col-lg-4"><br><br>
			</div>
			<input name="submit_btn" class="btn btn-success" type="submit" id="signup_btn" value="Sign Up"/><br><br>
			 <a href="index.php" />  <input type="button" class = "btn btn-primary" id="back_btn" value="Back"/>
		</div>
		</form>

		</center>
		
		
	</div>

</body>

</html>