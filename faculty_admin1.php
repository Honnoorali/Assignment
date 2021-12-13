<?php

include 'config.php';

session_start();

$sno=0;
$fid="";
$fname="";
$email="";
$desg="";
$did="";
$edit_state=false;

if(isset($_POST['save']))
{
	$fid=$_POST['fid'];
	$fname=$_POST['fname'];
	$email=$_POST['email'];
	$desg=$_POST['desg'];
	$did=$_POST['did'];

	$query="select * from faculty";
	$r=mysqli_query($conn,$query);
	if($r->num_rows>0)
	{
		while($row=mysqli_fetch_assoc($r))
		{
			if($fid==$row['fid'])
			{
				$_SESSION['msg']="user ID allready exsists";
				header('Location:faculty_admin.php');
				die();
			}
		}
	}

	$query="insert into faculty (fid,fname,email,desg,did) values ('$fid','$fname','$email','$desg','$did')";
	mysqli_query($conn,$query);
	$_SESSION['msg']="Records inserted successfully";
	header('Location:faculty_admin.php');
}

if(isset($_POST['update']))
{


	$did=mysqli_real_escape_string($conn,$_POST['did']);
	$fname=mysqli_real_escape_string($conn,$_POST['fname']);
	$email=mysqli_real_escape_string($conn,$_POST['email']);
	$desg=mysqli_real_escape_string($conn,$_POST['desg']);
	$did=mysqli_real_escape_string($conn,$_POST['did']);
	$sno=mysqli_real_escape_string($conn,$_POST['sno']);
	$query="UPDATE faculty SET  fname='{$fname}', email='$email', desg='{$desg}', did='{$did}' where sno='{$sno}'";

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