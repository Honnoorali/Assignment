<?php include 'asg_admin1.php'; 

	if(isset($_GET['edit']))
	{
		$sno=$_GET['edit'];
		$edit_state=true;
		$rec=mysqli_query($conn,"select * from assignments where sno='".$sno."'");
		$record=mysqli_fetch_array($rec);
		$aid=$record['aid'];
		$aname=$record['aname'];
		$suid=$record['suid'];
		$suname=$record['suname'];
		$sid=$record['sid'];
		$fid=$record['fid'];
		$sno=$record['sno'];
	}


 ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="asg_admin.css">
</head>
<body background="5.jpg">
	<h1>LIST OF ASSIGNMENTS</h1>
	<?php if(isset($_SESSION['msg'])):?>
		<div class="msg">
			<?php
				echo $_SESSION['msg'];
				unset($_SESSION['msg']);
			?>
		</div>
	<?php endif ?>



	<table>
		<thead>
			<tr>
				<th>ASSIGNMENT ID</th>
				<th>ASSIGNMENT NAME</th>
				<th>COURSE CODE</th>
				<th>COURSE</th>
				<th>STUDENT ID</th>
				<th>FACULTY ID</th>
				<th colspan="2">Action</th>
			</tr>
		</thead>
		<tbody>
			<?php while ($row=mysqli_fetch_array($results)){ ?>
				<tr>
					<td><?php echo $row['aid']; ?></td>
					<td><?php echo $row['aname']; ?></td>
					<td><?php echo $row['suid']; ?></td>
					<td><?php echo $row['suname']; ?></td>
					<td><?php echo $row['sid']; ?></td>
					<td><?php echo $row['fid']; ?></td>
					<td>
						<a class="editbtn" href="asg_admin.php?edit=<?php echo $row['sno']; ?>">Edit</a>
					</td>
					<td>
						<a class="delbtn" href="asg_admin1.php?delete=<?php echo $row['sno']; ?>">Delete</a>
					</td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
	<form method="post" action="asg_admin1.php">
	<input type="hidden" name="sno" value="<?php echo $sno; ?>">
		<div class="input">
			<b><label>Assignment ID</label>
			<input type="text" name="aid" value="<?php echo $aid; ?>" required>
		</div>
		<div class="input">
			<label>Assignment name</label>
			<input type="text" name="aname" value="<?php echo $aname; ?>" required>
		</div>
		<div class="input">
			<label>Course Code</label>
			<input type="text" name="suid" value="<?php echo $suid; ?>" required>
		</div>
		<div class="input">
			<label>Course</label>
			<input type="text" name="suname" value="<?php echo $suname; ?>" required>
		</div>
		<div class="input">
			<label>Student ID</label>
			<input type="text" name="sid" value="<?php echo $sid; ?>" required>
		</div>
		<div class="input">
			<label>Faculty ID</label></b>
			<input type="text" name="fid" value="<?php echo $fid; ?>" required>
		</div>
		<div class="input">
			<?php if($edit_state==false): ?>
				<button type="submit" name="save" class="btn">Save</button>
			<?php else: ?>
				<button type="submit" name="update" class="btn">Update</button>
			<?php endif ?>
		</div>
	</form>
</body>
</html>