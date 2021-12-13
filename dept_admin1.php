<?php

include 'config.php';

session_start();

$sno=0;
$departmentid="";
$departmentname="";
$departmenthead="";
$edit_state=false;

if(isset($_POST['save']))
{
	$departmentid=$_POST['departmentid'];
	$departmentname=$_POST['departmentname'];
	$departmenthead=$_POST['departmenthead'];

	$query="insert into department (departmentid,departmentname,departmenthead) values ('$departmentid','$departmentname','$departmenthead')";
	mysqli_query($conn,$query);
	$_SESSION['msg']="Records inserted successfully";
	header('Location:dept_admin.php');
}

if(isset($_POST['update']))
{


	$departmentid=mysqli_real_escape_string($conn,$_POST['departmentid']);
	$departmentname=mysqli_real_escape_string($conn,$_POST['departmentname']);
	$departmenthead=mysqli_real_escape_string($conn,$_POST['departmenthead']);
	$sno=mysqli_real_escape_string($conn,$_POST['sno']);
	$query="UPDATE department SET  departmenthead='{$departmenthead}', departmentname='{$departmentname}' where sno='{$sno}'";

	if(mysqli_query($conn,$query))
			
	$_SESSION['msg']="Records updated successfully";
	header('Location:dept_admin.php');
}

if(isset($_GET['delete']))
{
	$sno=$_GET['delete'];
	mysqli_query($conn,"delete from department where sno=$sno");
	$_SESSION['msg']="Records deleted successfully";
	header('Location:dept_admin.php');
}

$results=mysqli_query($conn,"select * from department");

?>