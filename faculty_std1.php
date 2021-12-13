<?php

include 'config.php';

session_start();

$sno=0;
$fid="";
$fname="";
$desg="";
$did="";
$edit_state=false;

if(isset($_POST['save']))
{
	$fid=$_POST['fid'];
	$fname=$_POST['fname'];
	$desg=$_POST['desg'];
	$did=$_POST['did'];

	$query="insert into faculty (fid,fname,desg,did) values ('$fid','$fname','$desg','$did')";
	mysqli_query($conn,$query);
	$_SESSION['msg']="Records inserted successfully";
	header('Location:faculty_admin.php');
}

if(isset($_POST['update']))
{


	$did=mysqli_real_escape_string($conn,$_POST['did']);
	$fname=mysqli_real_escape_string($conn,$_POST['fname']);
	$desg=mysqli_real_escape_string($conn,$_POST['desg']);
	$did=mysqli_real_escape_string($conn,$_POST['did']);
	$sno=mysqli_real_escape_string($conn,$_POST['sno']);
	$query="UPDATE faculty SET  fname='{$fname}', desg='{$desg}', did='{$did}' where sno='{$sno}'";

	if(mysqli_query($conn,$query))
			
	$_SESSION['msg']="Records updated successfully";
	header('Location:faculty_admin.php');
}

if(isset($_GET['delete']))
{
	$sno=$_GET['delete'];
	mysqli_query($conn,"delete from faculty where sno=$sno");
	$_SESSION['msg']="Records deleted successfully";
	header('Location:faculty_admin.php');
}

$results=mysqli_query($conn,"select * from faculty");

?>