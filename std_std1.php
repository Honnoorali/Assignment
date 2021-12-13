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
	$pwd=$_POST['pwd'];
	$dob=$_POST['dob'];
	$addr=$_POST['addr'];
	$did=$_POST['did'];
	$pwd=$_POST['pwd'];

	/*$query="insert into student (sid,sname,dob,addr,did) values ('$sid','$sname','$dob',$addr','$did')";*/
	$query="INSERT INTO student (sid,sname,pwd,dob,addr,did,pwd) VALUES ('$sid', '$sname', '$pwd', '$dob', '$addr', '$did','$pwd')";
	mysqli_query($conn,$query);
	$_SESSION['msg']="Records inserted successfully";
	header('Location:login_std.php');
}


if(isset($_POST['update']))
{


	$sid=mysqli_real_escape_string($conn,$_POST['sid']);
	$sname=mysqli_real_escape_string($conn,$_POST['sname']);
	$pwd=mysqli_real_escape_string($conn,$_POST['pwd']);
	$dob=mysqli_real_escape_string($conn,$_POST['dob']);
	$addr=mysqli_real_escape_string($conn,$_POST['addr']);
	$did=mysqli_real_escape_string($conn,$_POST['did']);
	$sno=mysqli_real_escape_string($conn,$_POST['sno']);
	$query="UPDATE student SET  sname='$sname', pwd='$pwd', dob='$dob', addr='$addr', did='$did' where sno='$sno'";

	if(mysqli_query($conn,$query))
			
	$_SESSION['msg']="Records updated successfully";
	header('Location:std_std.php');
}

if(isset($_GET['delete']))
{
	$sno=$_GET['delete'];
	mysqli_query($conn,"delete from student where sno=$sno");
	$_SESSION['msg']="Records deleted successfully";
	header('Location:std_std.php');
}

$results=mysqli_query($conn,"select * from student ");

?>