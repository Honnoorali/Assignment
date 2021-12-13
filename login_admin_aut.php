<?php

/*$un="rvce.assignment@gmail.com";
$pwd="rvceassignment";
*/

if(isset($_POST['submit']))
{
	$un="";
	$pwd="";

	$un=$_POST['un'];
	$pwd=$_POST['pwd'];

	if($un=='rvce.assignment@gmail.com' && $pwd=='rvceassignment')
	{
		header('Location:login_admin.php');

	}
	else
	{
		echo '<script>alert("You are not authorized to acces it...")</script>';

	}

}

?>


<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
		body{background:url(5.jpg);}
		.{
			margin: 0;
			padding: 0;
		}
		.text{
			width: 25%;
			overflow: hidden;
			font-size: 20px;
			padding: 8px 10px;
			margin: 8px 0;
			border-bottom: 2px solid #03a9f4;
		}
		.text input{
			border: none;
			outline: none;
			background: none;
			font-size: 22px;

		}
		.btn{

			width: 13%;
			font-size: 22px;
			background-color: #03a9f4;
			color: white;
			padding: 10px;
			border: 5px;
			border-radius: 0px 10px;
		}
		.btn:hover{background-color: teal;}
		h1{
			color: #03a9f4;
			text-shadow: 1px 1px white;
			font-size: 80px;
			border-bottom: 5px solid #03a9f4;
			width: 200px;
		}
		.box{
			position: relative;
			top: 70px;
			left: 480px;
		}
		

	</style>
</head>
<body>
	<form method="post" action="#">
		<div class="box">
			<h1>Login</h1>
			<div class="text">
				<input type="email" name="un" placeholder="Username" required="">
			</div>
			<div class="text">
				<input type="password" name="pwd" placeholder="Password" required="">
			</div><br>
			<input type="submit" name="submit" class="btn" value="Log in">
		</div>
	</form>
</body>
</html>