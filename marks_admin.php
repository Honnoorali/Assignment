<?php

include "config.php";



$sid=$_GET['usn'];
/*echo $sid;*/

?>

<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
		body{
			background:url(5.jpg);
			margin: 0;
			padding: 0;
			font-family: sans-serif;
		}
		.box{
			width:210px;
			height: 200px;
			background:url(5.jpg);
			position: absolute;
			top: 10%;
			left: 50%;
			padding:120px;
			box-shadow: 0 0 20px rgba(0,0,0,2.95);
			text-align: center;

		}
		.box input[type="number"]{
			border: 0;
			background:none;
			display: block;
			margin:20px auto;
			text-align: center;
			border:2px solid teal;
			padding: 20px 10px;
			width: 200px;
			outline: none;
			color: white;
			border-radius: 24px;
			transition: 0.25s;
			position: relative;top: -100px;
		}
		.box input[type="number"]:focus{
			width: 300px;
			color: white;
			background:transparent;
		}
		.box input[type="submit"]{
			border: none;
			outline: none;
			background:none;
			border: 3px solid white;
			font-size: 2em;
			border-radius: 28px;
			width: 190px;
			color: teal;
			position: relative;top: -90px;

		}
		.box input[type="submit"]:hover{
			width: 300px;
			background:teal;
			color: white;
		}
		h1{
			color: teal;
			font-family: sans-serif;
			position: relative;top: 30px;left: 30px;
			font-size: 2em;

		}
		p{
			color: white;
			font-size: 2em;
			position: relative;top: 150px;left: 50px;
		}
		.p1{
			color:white;
			position: relative;top:80px;left: 270px;
			font-size: 2em; 
		}
		.p2{
			color: white;
			font-size: 0.8em;
			position: absolute;top: 70px;left: 450px;
		}
	</style>
</head>
<body>
<form action="marks_admin1.php" method="post">
	<h1> ASSIGNMENT EVALUATION FORM</h1>
	<p>STUDENT ID :</p><div class="p1"><?php echo $sid ?></div>
	<p class="p2">(Out of 10, divided into 4)</p>

	<div class="box">
		<input type="hidden" name="xyz" value="<?php echo $sid; ?>">
		<input type="number" placeholder="UNDERSTANDING" name="c1"  required="">
		<input type="number" placeholder="IMPLEMENTATION" name="c2" required="">
		<input type="number" placeholder="ANALYSIS" name="c3" required="">
		<input type="number" placeholder="REPORT" name="c4" required="">
		<!-- <input type="number" name="ttl">   -->
		<input type="submit" name="submit">
	</div>
</form>
</body>
</html>