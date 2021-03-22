<?php
	require('db_connectivity.php');
  if(isset($_GET['id']))
  {
   $id=$_GET['id'];
   $sql="delete from exam_notifications where exam_id=$id";
   if(mysqli_query($mysql,$sql))
   {
	   header("Location:view_exam_notification_byFac.php");
   }
   else
   {
	   echo "Error$sql".mysqli_error($mysql);
   }
  }
?>