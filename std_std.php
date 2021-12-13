<?php include 'std_std1.php'; 

	if(isset($_GET['edit']))
	{
		$sno=$_GET['edit'];
		$edit_state=true;
		$rec=mysqli_query($conn,"select * from student where sno='".$sno."'");
		$record=mysqli_fetch_array($rec);
		$sid=$record['sid'];
		$sname=$record['sname'];
		$email=$record['email'];
		$pwd=$record['pwd'];
		$dob=$record['dob'];
		$addr=$record['addr'];
		$did=$record['did'];
		$sno=$record['sno'];
	}


 ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="std_admin.css">
	<style type="text/css">
		.hidetext{-webkit-text-security:disc;}
	</style>
</head>
<body background="5.jpg">
	<h1>LIST OF STUDENTS</h1>
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
				<th>STUDENT ID</th>
				<th>NAME</th>
				<th>EMAIL</th>
				<th>PASSWORD</th>
				<th>DOB</th>
				<th>ADDRESS</th>
				<th>Department ID</th>
				<th colspan="2">Action</th>
			</tr>
		</thead>
		<tbody>
			<?php while ($row=mysqli_fetch_array($results)){ ?>
				<tr>
					<td><?php echo $row['sid']; ?></td>
					<td><?php echo $row['sname']; ?></td>
					<td><?php echo $row['email']; ?></td>
					<td class="hidetext"><?php echo $row['pwd']; ?></td>
					<td><?php echo $row['dob']; ?></td>
					<td><?php echo $row['addr']; ?></td>
					<td><?php echo $row['did']; ?></td>
					<td>
						<a class="editbtn" href="std_std.php?edit=<?php echo $row['sno']; ?>" >Edit</a>
					</td>
					<!-- <td>
						<a class="delbtn" href="std_std1.php?delete=<?php echo $row['sno']; ?>">Delete</a>
					</td> -->
				</tr>
			<?php } ?>
		</tbody>
	</table>
	<form method="post" action="std_std1.php">
	<input type="hidden" name="sno" value="<?php echo $sno; ?>">
		<div class="input">
			<label>Student ID</label>
			<input type="text" name="sid" value="<?php echo $sid; ?>" required>
		</div>
		<div class="input">
			<label>Student name</label>
			<input type="text" name="sname" value="<?php echo $sname; ?>" required>
		</div>
		<div class="input">
			<label>Password</label>
			<input type="password" name="pwd" value="<?php echo $pwd; ?>" required>
		</div>
		<div class="input">
			<label>Date of birth</label>
			<input type="text" name="dob" value="<?php echo $dob; ?>" required>
		</div>
		<div class="input">
			<label>Address</label>
			<input type="text" name="addr" value="<?php echo $addr; ?>" required>
		</div>
		<div class="input">
			<label>Department ID</label>
			<input type="text" name="did" value="<?php echo $did; ?>" required>
		</div>
		<div class="input">
			<?php if($edit_state==false): ?>
				<!-- <button type="submit" name="save" class="btn">Save</button> -->
			<?php else: ?>
				<button type="submit" name="update" class="btn">Update</button>
			<?php endif ?>
		</div>
	</form>
</body>
</html>