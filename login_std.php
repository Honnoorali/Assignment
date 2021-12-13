<?php
require "config.php";
if(isset($_POST['submit']))
{
	$email=$_POST['email'];
	$pwd=$_POST['pwd'];

	if(empty($email))
	{
		echo '<script>alert("empty username")</script>';
		die();
	}
	if(empty($pwd))
	{
		echo '<script>alert("empty password")</script>';
		die();	
	}
	$query="select * from student where email='".$email."'";
	$result=mysqli_query($conn,$query);
	if($result->num_rows<=0)
	{
		echo '<script>alert("Invalid username....")</script>';
		/*header('Location:login_std.php');*/
	}
	else
	{
		$row=mysqli_fetch_assoc($result);
		if($pwd==$row['pwd'])
		{
			session_start();
			$_session['email']=$email;
			header('Location:frame1_std.html');
		}
		else
		{
			echo '<script>alert("Invalid username and password")</script>';
			
		}
		/*header('Location:login_std.php');*/
	}

}

?>

<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
		@import "https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css";
		body{
			margin: 0;
			padding: 0;
			font-family: sans-serif;
			background: url(5.jpg) no-repeat;
			background-size: cover;
		}

		.box{
			width: 380px;
			position: absolute;top: 50%;left: 50%;
			transform:translate(-50%,-50%);
			color: white;
		}

		.box h1{
			float: left;
			font-size: 38px;
			border-bottom: 5px solid #4caf50;
			margin-bottom: 50px;
			padding: 13px 0;
		}
		.textbox{
			width: 100%;
			overflow: hidden;
			font-size: 20px;
			padding: 8px 0;
			margin: 8px 0;
			border-bottom: 3px solid gray;
		}
		.box i{
			width: 26px;
			float: left;
			text-align: center;
			position: relative;top: 7px;
		}
		.box input{
			border:none;
			outline: none;
			background:none;
			color: white;
			font-size: 18px;
			width: 80%;
			float: left;
			margin: 5px 10px;
		}
		.box .btn{
			width: 100%;
			background:none;
			border:2px solid #4caf50;
			color: white;
			padding: 5px;
			font-size: 18px;
			cursor: pointer;
			margin: 12px 0;
		}
		.box .btn:hover{
			font-size: 25px;
			font-weight: bold;
			border:10px solid #03a9f4;
			color: #03a9f4;
		}
		/*.box .btnn{
			position: relative;left: 20%;
			width: 40%;
			background:none;
			border:2px solid #4caf50;
			color: white;
			padding: 5px;
			font-size: 18px;
			cursor: pointer;
			margin: 12px 0;
		}
		.box .btnn:hover{
			font-size: 25px;
			font-weight: bold;
			border:10px solid #03a9f4;
			color: #03a9f4;
		}*/
		.btn1{
			position: absolute;top: 540px;left: 630px;
			width: 8%;
			background:none;
			border:2px solid  #03a9f4;
			color: white;
			padding: 5px;
			font-size: 18px;
			cursor: pointer;
			margin: 12px 0;
		}
		.btn1:hover{
			font-size: 20px;
			font-weight: bold;
			border:10px solid #4caf50;
			color: #4caf50;
		}
	</style>
</head>
<body>
	<form method="post" action="#">
		<div class="box">
			<h1>STUDENT LOGIN</h1>
			<div class="textbox">
				<i class="fa fa-user" aria-hidden="true"></i>
				<input type="email" placeholder="Username" name="email" value="" required="">
			</div>
			<div class="textbox">
				<i class="fa fa-lock" aria-hidden="true"></i>
				<input type="password" placeholder="Password" name="pwd" value="" required="">
			</div>
			<input class="btn" type="submit" name="submit" value="Sign In">
			<!-- <a href="signup_std.html"><input class="btnn" type="button" name="" value="Sign Up"></a> -->
		</div>
		<a href="index.html"><input class="btn1" type="button" name="" value="BACK"></a>
	</form>
</body>
</html>