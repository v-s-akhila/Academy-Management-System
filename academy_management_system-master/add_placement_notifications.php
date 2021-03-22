
<?php 
session_start();

?>
<!DOCTYPE html>
<html>
	<head>	
    <title>Orisys Academy project</title>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/add_placement.css">
    <link rel="icon" type="image/png" href="img/icons/favicon.ico"/>
  <style>
  	
  </style>
</head>
<?php

	$cmperr=$posterr=$qualerr= $experr=$dateerr=$lastdateerr="";
	$company=$post=$experience=$date=$lastdate="";
	if(isset($_POST['insert']))
	{
		$company=$_POST['company'];
		$post=$_POST['post'];
		$experience=$_POST['experience'];
		$qualification=$_POST['qualification'];
		$date=$_POST['date'];
		$lastdate=$_POST['lastdate'];
		
		if(empty($company))
			$cmperr="Employee ID is required";
		if(empty($post))
			$posterr="Post is requi  red";
		if(empty($experience))
		{
			$experr="Experience is required";
		}
		
		if(!isset($qualification))
			$qualerr="select atleat one";
		else
			$quali=implode(',',$qualification);

		if(empty($experience))
			$experr="Experience is required";
		
		if(empty($date))
			$dateerr="Date is required";
		if(empty($lastdate))
			$lastdateerr="Last Date is required";
	
	require('db_connectivity.php');
	
	if(empty($cmperr)&&empty($posterr)&&empty($qualerr)&&empty($experr)&&
		empty($dateerr)&&empty($lastdateerr));
		{
			$id=$_SESSION['id'];

			 $sql2="insert into plcementnotificatiob_tb(company_name,company_post,qualifications,expeirience,plcement_date,
					last_date_to_apply,	add_date,login_id) values('$company','$post','$quali','$experience','$date','$lastdate',curdate(),$id)";
			if(mysqli_query($mysql,$sql2))
					header("Location:admin_view_notification.php");
			else
					echo "Error $sql2".mysqli_error($mysql); 

		}
	}
?>
<body class="bi">
			<h1>Add Placement Notifications</h1>
		<a href="admin_home.php" class="add_new">Back To Home</a>

    <div class="row">
	<form  class="reg" method="post" action="">
		<div class="bg">
		
		<table>
			<tr>
				<th>Company:</th>
				<td><input type="text" name="company" placeholder="company" 
				    value="<?php echo $company; ?>">
				<span class="err"><?php echo "*".$cmperr; ?></span></td>
			</tr>
			<tr>
				<th>post:</th>
				<td><input  type="text" name="post" placeholder="post" value="<?php echo $post; ?>">
					<span class="err"><?php echo "*".$posterr;?></span></td>
				</tr>	
			<tr>
				<th >Qualification:</th>
				<td><input type="checkbox" id="btech" name="qualification[]" value="BTech">
					<label for="btech">Btech</label>
					<input type="checkbox" id="mca" name="qualification[]" value="MCA">
					<label for="mca">MCA</label>
					<input type="checkbox" id="bsc" name="qualification[]" value="BSc">
					<label for="bsc">BSc</label>
					
				</select><span class="err"><?php echo "*".$qualerr; ?></span></td>
			</tr>
			
			<tr>
				<th>Experience:</th>
				<td><input  type="text" name="experience" placeholder="Experience" value="<?php echo $experience; ?>">
					<span class="err"><?php echo "*".$experr; ?></span></td>
			</tr>
			<tr>
				<th >Placement date:</th>
				<td><input type="date" name="date" placeholder="Placement Date">
				    <span class="err"><?php echo "*".$dateerr; ?></span></td>
			</tr>
			<tr>
				<th >Last date:</th>
				<td><input type="date" name="lastdate" placeholder="Last Date">
				    <span class="err"><?php echo "*".$lastdateerr; ?></span></td>
			</tr>
			<tr>
				<td colspan="2"><input class= "btn_reg" type="submit" name="insert" value="Insert"></td>
			</tr>
		</table>
		</div>
	</form>		
	</div>
</body>
</html>
