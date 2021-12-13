<?php

include 'config.php';

session_start();

$sno=0;
$id="";
$username="";
$password="";
$email="";
$edit_state=false;

if(isset($_POST['save']))
{
	$id=$_POST['id'];
	$username=$_POST['username'];
	$email=$_POST['email'];
	$password=$_POST['password'];

	$query="select * from Login";
	$r=mysqli_query($conn,$query);
	if($r->num_rows>0)
	{
		while($row=mysqli_fetch_assoc($r))
		{
			if($id==$row['id'] || $email==$row['email'])
			{
				$_SESSION['msg']="User allready exsists";
				header('Location:login_admin.php');
				die();
			}
		}
	}

	$query="insert into Login (id,username,email,password) values ('$id','$username', '$email', '$password')";
	if(mysqli_query($conn,$query))
	{
		$message="";
		//$message."Records inserted successfully<br>";
		require 'Mailer/mail.php';
		$to=$email;
		$subject="Access credentials for Assignment Evaluation Portal.";
		$msg="<h1>Welcome to Assignment Evaluation Portal</h1><br>".
				  "<h2>Your access credentials are:</h2><br> ".
				  "<h3>Username:  ".$to."</h3>".
				  "<h3> Password: ".$password."</h2>";

		if( send_mail($to,$subject,$msg))
		{
			$message.="Email sent to ".$to."<br>
					User registered successfully";
		}
		else
		{
			$message.="Cannot send email.<br>";
		}
		
		$_SESSION['msg']=$message;
	}
	else
	{
		$_SESSION['msg']="Something went wrong.";
	}
	/*header('Location:std_admin.php');
	$_SESSION['msg']="Records inserted successfully";*/
	header('Location:login_admin.php');
}

if(isset($_POST['update']))
{


	$id=mysqli_real_escape_string($conn,$_POST['id']);
	$username=mysqli_real_escape_string($conn,$_POST['username']);
	$email=mysqli_real_escape_string($conn,$_POST['email']);
	$password=mysqli_real_escape_string($conn,$_POST['password']);
	$sno=mysqli_real_escape_string($conn,$_POST['sno']);
	$query="UPDATE Login SET  username='$username', email='$email', password='$password' where sno='$sno'";

	if(mysqli_query($conn,$query))
			
	$_SESSION['msg']="Records updated successfully";
	header('Location:login_admin.php');
}

if(isset($_GET['delete']))
{
	$sno=$_GET['delete'];
	mysqli_query($conn,"delete from Login where sno=$sno");
	$_SESSION['msg']="Records deleted successfully";
	header('Location:login_admin.php');
}

$results=mysqli_query($conn,"select * from Login");

?>