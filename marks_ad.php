<?php include 'marks_ad1.php'; 

	if(isset($_GET['edit']))
	{
		$sno=$_GET['edit'];
		$edit_state=true;
		$rec=mysqli_query($conn,"select * from marks where sno='".$sno."'");
		$record=mysqli_fetch_array($rec);
		$sid=$record['sid'];
		$c1=$record['c1'];
		$c2=$record['c2'];
		$c3=$record['c3'];
		$c4=$record['c4'];
	}


 ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="marks_ad.css">
	<style type="text/css">
	</style>
</head>
<body background="5.jpg">
	<h1>ASSIGNMENTS MARKS LIST</h1>
	<?php if(isset($_SESSION['msg'])):?>
		<div class="msg">
			<?php
				echo $_SESSION['msg'];
				unset($_SESSION['msg']);
			?>
		</div>
	<?php endif ?>



	<table class="content-table">
		<thead>
			<tr>
				<th>STUDENT ID</th>
				<th>UNDERSTANDING</th>
				<th>IMPLEMENTATION</th>
				<th>ANALYSIS</th>
				<th>REPORT</th>
				<th>TOTAL</th>
				<th colspan="2">ACTION</th>
			</tr>
		</thead>
		<tbody>
			<?php while ($row=mysqli_fetch_array($results)){ ?>
				<tr>
					<td><?php echo $row['sid']; ?></td>
					<td><?php echo $row['c1']; ?></td>
					<td><?php echo $row['c2']; ?></td>
					<td><?php echo $row['c3']; ?></td>
					<td><?php echo $row['c4']; ?></td>
					<td><?php echo $row['ttl']; ?></td>
					<td>
						<a class="editbtn" href="marks_ad.php?edit=<?php echo $row['sno']; ?>" >Edit</a>
					</td>
					<!-- <td>
						<a class="delbtn" href="std_std1.php?delete=<?php echo $row['sno']; ?>">Delete</a>
					</td> -->
				</tr>
			<?php } ?>
		</tbody>
	</table>
	<form method="post" action="marks_ad1.php">
	<input type="hidden" name="sno" value="<?php echo $sno; ?>">
	<div class="input">
			<label>Student ID</label>
			<input type="text" name="sid" value="<?php echo $sid; ?>" required>
		</div>
		<div class="input">
			<label>Understanding</label>
			<input type="text" name="c1" value="<?php echo $c1; ?>" required>
		</div>
		<div class="input">
			<label>Implementation</label>
			<input type="text" name="c2" value="<?php echo $c2; ?>" required>
		</div>
		<div class="input">
			<label>Analysis</label>
			<input type="text" name="c3" value="<?php echo $c3; ?>" required>
		</div>
		<div class="input">
			<label>Report</label>
			<input type="text" name="c4" value="<?php echo $c4; ?>" required>
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