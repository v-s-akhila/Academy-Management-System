<?php
	require('db_connectivity.php');
	$id=$_GET['id'];
	$sql="delete from faculty_details where login_id=$id";
	
	if(mysqli_query($mysql,$sql))
	{
		$sql1="delete from login_page where login_id=$id";
		if(mysqli_query($mysql,$sql1))
		{
			header("Location:view_faculty.php");
		}
		else
			echo "Error $sql1".mysqli_error($mysql);
	}
		
	else
		echo "Error $sql".mysqli_error($mysql); 

?>