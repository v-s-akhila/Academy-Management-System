<?php
  require('db_connectivity.php');
  if(isset($_GET['id']))
  {
	  $id=$_GET['id'];
	  $sql="select * from applied_students where applied_id=$id";
	  if(mysqli_query($mysql,$sql))
	  {
		  $result=mysqli_query($mysql,$sql);
		  $row=mysqli_fetch_assoc($result);
		  $resume='upload/'.$row['resume_file'];
	  }
	  if(file_exists($resume))
	  {
		 header('Content-type: application/pdf');
		 header('Content-Disposition: inline; filename="' . $resume . '"');
		 header('Content-Transfer-Encoding: binary');
		 header('Accept-Ranges: bytes');
		 ob_clean();
		 ob_flush ();
		 @readfile($resume);
	  }
  }
?>