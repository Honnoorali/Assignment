<?php include 'login_admin1.php'; 

	if(isset($_GET['edit']))
	{
		$sno=$_GET['edit'];
		$edit_state=true;
		$rec=mysqli_query($conn,"select * from Login where sno='".$sno."'");
		$record=mysqli_fetch_array($rec);
		$id=$record['id'];
		$username=$record['username'];
		$email=$record['email'];
		$password=$record['password'];
		$sno=$record['sno'];

	}


 ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="login_admin.css">
	<style type="text/css">
		.hidetext{-webkit-text-security:disc;}
	</style>
</head>
<body background="5.jpg">
	<h1>LIST OF ADMINS</h1>
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
				<th>ADMIN ID</th>
				<th>USERNAME</th>
				<th>EMAIL</th>
				<th>PASSWORD</th>
				<th colspan="2">Action</th>
			</tr>
		</thead>
		<tbody>
			<?php while ($row=mysqli_fetch_array($results)){ ?>
				<tr>
					<td><?php echo $row['id']; ?></td>
					<td><?php echo $row['username']; ?></td>
					<td><?php echo $row['email']; ?></td>
					<td class="hidetext"><?php echo $row['password']; ?></td>
					<td>
						<a class="editbtn" href="login_admin.php?edit=<?php echo $row['sno']; ?>">Edit</a>
					</td>
					<td>
						<a class="delbtn" href="login_admin1.php?delete=<?php echo $row['sno']; ?>">Delete</a>
					</td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
	<form method="post" action="login_admin1.php">
	<input type="hidden" name="sno" value="<?php echo $sno; ?>">
		<div class="input">
			<label>Admin ID</label>
			<input type="text" name="id" value="<?php echo $id; ?>" required>
		</div>
		<div class="input">
			<label>Username</label>
			<input type="text" name="username" value="<?php echo $username; ?>" required>
		</div>
		<div class="input">
			<label>Email</label>
			<input type="email" name="email" value="<?php echo $email; ?>" required>
		</div>
		<div class="input">
			<label>Password</label>
			<input type="password" name="password" value="<?php echo $password; ?>" required>
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