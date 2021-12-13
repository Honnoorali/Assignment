<?php include 'dept_admin1.php'; 

	if(isset($_GET['edit']))
	{
		$sno=$_GET['edit'];
		$edit_state=true;
		$rec=mysqli_query($conn,"select * from department where sno='".$sno."'");
		$record=mysqli_fetch_array($rec);
		$departmentname=$record['departmentname'];
		$departmenthead=$record['departmenthead'];
		$departmentid=$record['departmentid'];
		$sno=$record['sno'];

	}


 ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="dept_admin.css">
</head>
<body background="5.jpg">
	<h1>LIST OF DEPARTMENTS</h1>
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
				<th>Department ID</th>
				<th>Department name</th>
				<th>Department head</th>
				<th colspan="2">Action</th>
			</tr>
		</thead>
		<tbody>
			<?php while ($row=mysqli_fetch_array($results)){ ?>
				<tr>
					<td><?php echo $row['departmentid']; ?></td>
					<td><?php echo $row['departmentname']; ?></td>
					<td><?php echo $row['departmenthead']; ?></td>
					<td>
						<a class="editbtn" href="dept_admin.php?edit=<?php echo $row['sno']; ?>">Edit</a>
					</td>
					<td>
						<a class="delbtn" href="dept_admin1.php?delete=<?php echo $row['sno']; ?>">Delete</a>
					</td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
	<form method="post" action="dept_admin1.php">
	<input type="hidden" name="sno" value="<?php echo $sno; ?>">
		<div class="input">
			<label>Department ID</label>
			<input type="text" name="departmentid" value="<?php echo $departmentid; ?>" required>
		</div>
		<div class="input">
			<label>Department name</label>
			<input type="text" name="departmentname" value="<?php echo $departmentname; ?>" required>
		</div>
		<div class="input">
			<label>Department head</label>
			<input type="text" name="departmenthead" value="<?php echo $departmenthead; ?>" required>
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