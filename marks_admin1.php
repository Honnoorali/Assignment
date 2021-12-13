<?php

	include "config.php";


	if(isset($_POST['submit']))
	{
	$sid=$_POST['xyz'];
	$c1=$_POST['c1'];
	$c2=$_POST['c2'];
	$c3=$_POST['c3'];
	$c4=$_POST['c4'];

	$ttl=$c1+$c2+$c3+$c4;

	$query="INSERT INTO marks (sid, c1, c2, c3, c4, ttl) VALUES ('$sid', '$c1', '$c2', '$c3', '$c4', '$ttl')";
	if(mysqli_query($conn,$query))
	{
	?>
		<script>
			alert("Marks updated successfully...!")
			window.location.href="uploads_view.php";
		</script>
	<?php
	}
	else
	{
	?>
		<script>
			alert("Something went wrong...!")
			window.location.href="uploads_view.php";
		</script>
	<?php
	}

	}

?>