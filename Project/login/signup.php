<?php 
session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$name = $_POST['name'];
		$mobilenum = $_POST['mobilenum'];
		$email_id = $_POST['email_id'];
		$dob = $_POST['dob'];
		$gender = $_POST['gender'];
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];
		$conf_password = $_POST['conf_password'];

		if(!empty($name) && !empty($mobilenum) && !empty($email_id) && !empty($dob) && !empty($gender) && !empty($user_name) && !empty($password) && !is_numeric($user_name) && !empty($conf_password))
		{

			if($password === $conf_password)
			{

				//save to database
				$user_id = random_num(20);
				$query = "insert into users (user_id,name,mobilenum,email_id,dob,gender,user_name,password) values ('$user_id','$name','$mobilenum','$email_id','$dob','$gender','$user_name','$password')";

				mysqli_query($con, $query);

				header("Location: login.php");
				die;
			}
			else
			{
				echo "Password and Confirm Password not matched Please try again!";
			}

		}else
		{
			echo "Please enter some valid information!";
		}
	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Signup</title>
</head>
<body>

	<style type="text/css">
	
	#text{

		height: 25px;
		border-radius: 5px;
		padding: 4px;
		border: solid thin #aaa;
		width: 100%;
	}

	#button{

		padding: 10px;
		width: 100px;
		color: white;
		background-color: lightblue;
		border: none;
	}

	#box{

		background-color: grey;
		margin: auto;
		width: 300px;
		padding: 20px;
	}

	</style>

	<div id="box">
		
		<form method="post">
			<div style="font-size: 20px;margin: 10px;color: white;">Signup</div>
			<label>Name:</label>
			<input id="text" type="text" name="name"><br><br>

			<label>Mobile Number:</label>
			<input id="text" type="number" name="mobilenum"><br><br>

			<label>Email id:</label>
			<input id="text" type="text" name="email_id"><br><br>

			<label>Date of Birth:</label>
			<input id="text" type="date" name="dob"><br><br>

			<label>Gender:</label>
			<input type="radio" id="male" name="gender" value="MALE">
			<label for="html">MALE</label>
			<input type="radio" id="female" name="gender" value="FEMALE">
			<label for="css">FEMALE</label><br><br>

			<label>Username:</label>
			<input id="text" type="text" name="user_name"><br><br>

			<label>Password:</label>
			<input id="text" type="password" name="password"><br><br>

			<label>Confirm Password:</label>
			<input id="text" type="password" name="conf_password"><br><br>

			<input id="button" type="submit" value="Signup"><br><br>

			<a href="login.php">Click to Login</a><br><br>
		</form>
	</div>
</body>
</html>