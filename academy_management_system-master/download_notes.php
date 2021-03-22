<?php
  require('db_connectivity.php');
  if(isset($_GET['id']))
  {
	  $id=$_GET['id'];
	  $sql="select * from notes_tb where notes_id=$id";
	  if(mysqli_query($mysql,$sql))
	  {
		  $result=mysqli_query($mysql,$sql);
		  $row=mysqli_fetch_assoc($result);
		  $note='upload/'.$row['notes'];
	  }
	  if(file_exists($note))
	  {
		 header('Content-type: application/pdf');
		 header('Content-Disposition: inline; filename="' . $note . '"');
		 header('Content-Transfer-Encoding: binary');
		 header('Accept-Ranges: bytes');
		 ob_clean();
		 ob_flush ();
		 @readfile($note);
	  }
  }
?>