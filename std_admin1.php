
<?php

include 'config.php';

session_start();

$sno=0;
$sid="";
$sname="";
$email="";
$pwd="";
$dob="";
$addr="";
$did="";
$edit_state=false;


if(isset($_POST['save']))
{

	$sid=$_POST['sid'];
	$sname=$_POST['sname'];
	$email=$_POST['email'];
	$pwd=$_POST['pwd'];
	$dob=$_POST['dob'];
	$addr=$_POST['addr'];
	$did=$_POST['did'];
	$query="SELECT * FROM `student`";
	$r= mysqli_query($conn,$query);
	if($r->num_rows>0)
	{
		while($row=mysqli_fetch_assoc($r))
		{
			if( $row['sid']===	$sid || $row['email']===$email )
			{
				$_SESSION['msg']="User already Exsists.";
				header('Location:std_admin.php');
				die();

			}
		}
	}
	unset($r);
	$query="INSERT INTO student (sid,sname,email,pwd,dob,addr,did) VALUES ('$sid', '$sname', '$email', '$pwd', '$dob', '$addr', '$did')";
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
				  "<h3>Password:  ".$pwd."</h3>";

		if( send_mail($to,$subject,$msg))
		{
			$message.="Email sent to ".$to."<br>
					Student registered successfully";
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
	header('Location:std_admin.php');
}


if(isset($_POST['update']))
{


	$sid=mysqli_real_escape_string($conn,$_POST['sid']);
	$sname=mysqli_real_escape_string($conn,$_POST['sname']);
	$email=mysqli_real_escape_string($conn,$_POST['email']);
	$pwd=mysqli_real_escape_string($conn,$_POST['pwd']);
	$dob=mysqli_real_escape_string($conn,$_POST['dob']);
	$addr=mysqli_real_escape_string($conn,$_POST['addr']);
	$did=mysqli_real_escape_string($conn,$_POST['did']);
	$sno=mysqli_real_escape_string($conn,$_POST['sno']);
	$query="UPDATE student SET  sname='$sname', pwd='$pwd', dob='$dob', addr='$addr', did='$did' where sno='$sno'";

	if(mysqli_query($conn,$query))
			
	$_SESSION['msg']="Records updated successfully";
	header('Location:std_admin.php');
}

if(isset($_GET['delete']))
{
	$sno=$_GET['delete'];
	mysqli_query($conn,"delete from student where sno=$sno");
	$_SESSION['msg']="Records deleted successfully";
	header('Location:std_admin.php');
}

$results=mysqli_query($conn,"select * from student");

?>