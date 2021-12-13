<?

include "config.php";



$newdate = date("d/m/yy");

echo $newdate;

$query = "insert into date (date) values ('$newdate')";
	$res=mysqli_query($conn,$query);




?>