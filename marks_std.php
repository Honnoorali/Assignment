<?php 

	include 'marks_ad1.php'; 

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
				</tr>
			<?php } ?>
		</tbody>
	</table>
	
</body>
</html>