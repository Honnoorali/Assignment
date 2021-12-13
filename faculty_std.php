<?php include 'faculty_std1.php'; 

	if(isset($_GET['edit']))
	{
		$sno=$_GET['edit'];
		$edit_state=true;
		$rec=mysqli_query($conn,"select * from faculty where sno='".$sno."'");
		$record=mysqli_fetch_array($rec);
		$fid=$record['fid'];
		$fname=$record['fname'];
		$email=$record['email'];
		$desg=$record['desg'];
		$did=$record['did'];
		$sno=$record['sno'];

	}


 ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="faculty_std.css">
</head>
<body background="5.jpg">
	<h1>LIST OF FACULTY</h1>
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
				<th>FACULTY ID</th>
				<th>FACULTY name</th>
				<th>EMAIL</th>
				<th>DESIGNATION</th>
				<th>DEPARTMENT ID</th>
				<!-- <th colspan="2">Action</th> -->
			</tr>
		</thead>
		<tbody>
			<?php while ($row=mysqli_fetch_array($results)){ ?>
				<tr>
					<td><?php echo $row['fid']; ?></td>
					<td><?php echo $row['fname']; ?></td>
					<td><?php echo $row['email']; ?></td>
					<td><?php echo $row['desg']; ?></td>
					<td><?php echo $row['did']; ?></td>
					<!-- <td>
						<a class="editbtn" href="faculty_admin.php?edit=<?php echo $row['sno']; ?>">Edit</a>
					</td>
					<td>
						<a class="delbtn" href="faculty_admin1.php?delete=<?php echo $row['sno']; ?>">Delete</a>
					</td> -->
				</tr>
			<?php } ?>
		</tbody>
	</table>
	<form method="post" action="faculty_admin1.php">
	<input type="hidden" name="sno" value="<?php echo $sno; ?>">
		<div class="input">
			<label>Faculty ID</label>
			<input type="text" name="fid" value="<?php echo $fid; ?>" required>
		</div>
		<div class="input">
			<label>Faculty name</label>
			<input type="text" name="fname" value="<?php echo $fname; ?>" required>
		</div>
		<div class="input">
			<label>Designation</label>
			<input type="text" name="desg" value="<?php echo $desg; ?>" required>
		</div>
		<div class="input">
			<label>Department ID</label>
			<input type="text" name="did" value="<?php echo $did; ?>" required>
		</div>
		<!-- <div class="input">
			<?php if($edit_state==false): ?>
				<button type="submit" name="save" class="btn">Save</button>
			<?php else: ?>
				<button type="submit" name="update" class="btn">Update</button>
			<?php endif ?>
		</div> -->
	</form>
</body>
</html>