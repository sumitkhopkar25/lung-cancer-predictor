<?php
	$con= mysqli_connect("localhost","root","")or die("UNABLE TO CONNECT");
	mysqli_select_db($con,"lung_cancer");

	if(isset($_POST['submit_btn']))
	{
		//echo'<script type="text/javascript"> alert("sign up button clicked")</script>';
		$username=$_POST['username'];
		$password=$_POST['password'];
		$cpassword=$_POST['cpassword'];

		if($password==$cpassword)
		{
			$query = "select * from user_credentials WHERE username='".$username."'";
			$query_run = mysqli_query($con,$query);

			if(mysqli_num_rows($query_run)>0)
			{
				//same username taken 
				
				echo '<script type="text/javascript"> alert("username already exists use different name")</script>';
				
				
			}
			else
			{
				$query= "insert into user_credentials(username,password) values('".$username."','".$password."')";
				$query_run= mysqli_query($con,$query);
				
				
				if($query_run)
				{
					$_SESSION['username']=$username;
					echo '<script type="text/javascript"> alert("USER HAS BEEN REGISTERED SUCCESFULY")</script>';
					header('location:homepage.php');
				}
				else
				{
					echo '<script type="text/javascript"> alert("SOME ERROR HAS OCCURED")</script>';
				}
			}
			
		}
		else
		{
			echo '<script type="text/javascript"> alert("password and confirm password do not match")</script>';
		}
	}
			
?>