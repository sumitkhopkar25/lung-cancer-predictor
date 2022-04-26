<?php
	session_start();

	if(isset($_SESSION['username']))
	{
		session_unset('username');
	}
	
	$con= mysqli_connect("localhost","root","")or die("UNABLE TO CONNECT");
	mysqli_select_db($con,"lung_cancer");

	if(isset($_POST['login']))
		{
			//echo'<script type="text/javascript"> alert("sign up button clicked")</script>';
			$username=$_POST['username'];
			$password=$_POST['password'];
			
			$query = "select * from user_credentials WHERE username='$username' AND password='$password'";
			$result = $con->query($query);
			
			if($result->num_rows > 0)
			{
				
				//valid
				$_SESSION['username']=$username;
				
				while($row = $result->fetch_assoc()) {
					$_SESSION['user_id'] = $row['id'];
    			}

				header('location:homepage.php');
			}
			else
			{
				//invalid
				
				unset($_POST['login']);
				header('location:index.php');
			}
				
		}			
		
?>