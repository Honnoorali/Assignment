<?php

include 'config.php';

session_start();

$sno=0;
$aid="";
$aname="";
$suid="";
$suname="";
$sid="";
$fid="";
$edit_state=false;


if(isset($_POST['save']))
{
	$aid=$_POST['aid'];
	$aname=$_POST['aname'];
	$suid=$_POST['suid'];
	$suname=$_POST['suname'];
	$sid=$_POST['sid'];
	$fid=$_POST['fid'];
	
	$query="select * from assignments";
	$r=mysqli_query($conn,$query);
	if($r->num_rows>0)
	{
		while($row=mysqli_fetch_assoc($r))
		{
			if($aid==$row['aid'] || $aname==$row['aname'])
			{
				$_SESSION['msg']="Assignment ID or TOPIC allready taken";
				header('Location:asg_admin.php');
				die();
			}
		}
	}

	$query="INSERT INTO assignments (aid,aname,suid,suname,sid,fid) VALUES ('$aid','$aname','$suid','$suname','$sid','$fid')";
	mysqli_query($conn,$query);
	$_SESSION['msg']="Records inserted successfully";
	header('Location:asg_admin.php');
}


if(isset($_POST['update']))
{


	$aid=mysqli_real_escape_string($conn,$_POST['aid']);
	$aname=mysqli_real_escape_string($conn,$_POST['aname']);
	$suid=mysqli_real_escape_string($conn,$_POST['suid']);
	$suname=mysqli_real_escape_string($conn,$_POST['suname']);
	$sid=mysqli_real_escape_string($conn,$_POST['sid']);
	$fid=mysqli_real_escape_string($conn,$_POST['fid']);
	$sno=mysqli_real_escape_string($conn,$_POST['sno']);
	$query="update assignments set aid='$aid', aname='$aname', suid='$suid', suname='$suname', sid='$sid', fid='$fid' where sno='$sno'";

	if(mysqli_query($conn,$query))
			
	$_SESSION['msg']="Records updated successfully";
	header('Location:asg_admin.php');
}

if(isset($_GET['delete']))
{
	$sno=$_GET['delete'];
	mysqli_query($conn,"delete from assignments where sno=$sno");
	$_SESSION['msg']="Records deleted successfully";
	header('Location:asg_admin.php');
}

$results=mysqli_query($conn,"select * from assignments");

?>