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
	    <h1>View Notifications</h1>
		<a href='admin_home.php'>Back to Admin Home Page</a>
		<table>
			<thead>
				<tr>
					<th>Student Name</th>
					<th>Email</th>
					<th>Resume</th>
					
					
				</tr>
			</thead>
			<tbody>
				<?php
					$id=$_GET['id'];
					$sql="select * from applied_students where noti_id=$id"; 
					if(mysqli_query($mysql,$sql))
					{
						$result=mysqli_query($mysql,$sql);
						if(mysqli_num_rows($result)>0)
						{
							while($row=mysqli_fetch_assoc($result))
							{
								echo "<tr>
									<td>".$row['stud_name']."</td>
									<td>".$row['email']."</td>
									<td><a href='download_resume.php?id=".$row['applied_id']."'>Download</a></td>
									</tr>";	
							}
						}
					}
				?>
				
			</tbody>
		</table>
		
	  </div>
	</body>
</html>