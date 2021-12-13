<?php

include 'config.php';

session_start();

$sno=0;
$sid="";
$c1="";
$c2="";
$c3="";
$c4="";
$edit_state=false;


if(isset($_POST['save']))
{
	$sid=$_POST['sid'];
	$sname=$_POST['c1'];
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
	$c1=mysqli_real_escape_string($conn,$_POST['c1']);
	$c2=mysqli_real_escape_string($conn,$_POST['c2']);
	$c3=mysqli_real_escape_string($conn,$_POST['c3']);
	$c4=mysqli_real_escape_string($conn,$_POST['c4']);
	$sno=mysqli_real_escape_string($conn,$_POST['sno']);

	$ttl=$c1+$c2+$c3+$c4;

	$query="UPDATE marks SET  c1='$c1',c2='$c2',c3='$c3',c4='$c4', ttl='$ttl' where sno='$sno'";

	if(mysqli_query($conn,$query))
			
	$_SESSION['msg']="Records updated successfully";
	header('Location:marks_ad.php');
}

if(isset($_GET['delete']))
{
	$sno=$_GET['delete'];
	mysqli_query($conn,"delete from student where sno=$sno");
	$_SESSION['msg']="Records deleted successfully";
	header('Location:std_std.php');
}

$results=mysqli_query($conn,"select * from marks ");

?>