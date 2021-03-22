<?php
	require('db_connectivity.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Orisys Academy Management System</title>
		<link rel="stylesheet" href="css/view_placement_noti.css">
		<link rel="icon" type="image/png" href="img/icons/favicon.icon">
	</head>
	<body class="table">
	 <div>
	 <h1>Placement Details</h1>
		<table>
			<thead>
				<tr>
					<th>Company Name</th>
					<th>Name of the Post</th>
					<th>Exprience</th>
					<th>Qualification</th>
					<th>Last Date To Apply</th>
					<th>Placement Date</th>
					<th>Apply</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$sql="select * from plcementnotificatiob_tb";
					if(mysqli_query($mysql,$sql))
					{
						$result=mysqli_query($mysql,$sql);
						if(mysqli_num_rows($result)>0)
						{
							while($row=mysqli_fetch_assoc($result))
							{
								echo "<tr>
									<td>".$row['company_name']."</td>
									<td>".$row['company_post']."</td>
									<td>".$row['expeirience']."</td>
									<td>".$row['qualifications']."</td>
									<td>".$row['last_date_to_apply']."</td>
									<td>".$row['plcement_date']."</td>
									<td><a href=apply_for_job.php?id=".$row['noti_id'].">Apply Here</a></td>
									</tr>";
								
							}
						}
					}
				?>
				
			</tbody>
		</table>
	  </div>
	  <a href="stud_home.php">Back</a>
	</body>
</html>