<?php
	require('db_connectivity.php');

$id=$_GET['id'];
$sql="update complaint_tb set complaint_status='3' where complaint_id=$id";
if(mysqli_query($mysql,$sql))
{
	header('location:view_complaint_by_admin.php');
}

?>