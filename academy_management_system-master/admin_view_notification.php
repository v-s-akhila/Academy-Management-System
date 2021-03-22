<?php
	require('db_connectivity.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Orisys Academy Management System</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="css/view_table.css">
		<link rel="icon" type="image/png" href="img/icons/favicon.ico"/>
		<style>
			
	
		</style>
	</head>
	<body class="table">
	 <div>
	    <h1>View Placement Notifications</h1>
			  	<a class="add_new" href='admin_home.php'>Back to Admin Home Page</a>

		<table>
			<thead>
				<tr>
					<th>Company Name</th>
					<th>Post To Apply</th>
					<th>Qualification Required</th>
					<th>Experience</th>
					<th>Placement Date</th>
					<th>Last Date to Apply</th>
					<th>Current Date</th>
					<th>Action</th>
					<th>Applied</th>
					
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
									<td>".$row['qualifications']." </td>
									<td>".$row['expeirience']."</td>
									<td>".$row['plcement_date']."</td>
									<td>".$row['last_date_to_apply']."</td>
									<td>".$row['add_date']."</td>
									<td><a href=delete_noti.php?id=".$row['noti_id'].">Delete</a></td>
									<td><a href=applied_students.php?id=".$row['noti_id'].">Applied</a></td>
									
									</tr>";	
							}
						}
					}
				?>
				
			</tbody>
		</table>
	  </div>
	  </br>

	</body>
</html>