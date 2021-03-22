<?php
	require('db_connectivity.php');
	$id=$_GET['id'];
	$sql="delete from plcementnotificatiob_tb where noti_id=$id";
	if(mysqli_query($mysql,$sql))
		header("Location:view_complaint_stud.php");
	else
		echo "Error $sql".mysqli_error($mysql); 

?>