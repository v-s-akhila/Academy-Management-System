<?php
	session_start();
	require('db_connectivity.php');
?>
<!DOCTYPE html>
<html>
	<head>	
    <title>Orisys Academy project</title>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/png" href="img/icons/favicon.ico"/>
		<style>
		</style>
	</head>
	<?php
	$compErr="";
	$complaint="";
	if(isset($_POST['add']))
	{
		$complaint=$_POST['complaint'];
		if(empty($complaint))
			$compErr="required";
	
	if(empty($compErr))
	{
		$id=$_SESSION['id'];
		$sql="insert into complaint_tb(complaint,complaint_date,login_id)values('$complaint',curdate(),$id)";
		if(mysqli_query($mysql,$sql))
			header("Location:view_complaint_stud.php");
		else
			echo "Error $sql".mysqli_error($mysql); 

	}
	
	     
	}
	?>
	<body class="admin">
	<a href="stud_home.php">Back</a>
	   <form class="complaint" action="" method="post">
			<h2>Complaint Form</h2>
			<label>Add Complaint:</label></br>
			<textarea name="complaint" placeholder="Complaint's here"></textarea>
			<span class="err"><?php echo "*".$compErr; ?></span>
			<input class="btn_complaint" type="submit" name="add" value="Submit Complaint">
	   </form>
	</body>
</html>