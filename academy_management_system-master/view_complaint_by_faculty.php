<?php
	require('db_connectivity.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Orisys Academy Management System</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="css/view_complaint_by_fac.css">
	</head>
	<body class="table">
	 <div>
	    <h1>COMPLAINT DETAILS</h1>
		<table>
			<thead>
				<tr>
					<th>Student ID</th>
					<th>Complaint</th>
					<th>Complaint Date</th>
					<th>Status</th>
					
				</tr>
			</thead>
			<tbody>
				<?php
					$sql="select * from complaint_tb inner join student_details on 
					      complaint_tb.login_id = student_details.login_id";
					if(mysqli_query($mysql,$sql))
					{
						$result=mysqli_query($mysql,$sql);
						if(mysqli_num_rows($result)>0)
						{
							while($row=mysqli_fetch_assoc($result))
							{
								echo "<tr>
									<td>".$row['enrollment_id']."</td>
									<td>".$row['complaint']."</td>
									<td>".$row['complaint_date']."</td>";
								if($row['complaint_status']=='0')
									echo"<td style='color:red'>Not Viewed</td>";
								else if($row['complaint_status']=='1')
									echo"<td style='color:blue'>Viewed</td>";
								else if($row['complaint_status']=='2')
									echo"<td style='color:yellow'>Processing </td>";
								if($row['complaint_status']=='3')
										echo"<td style='color:green'>Completed</td>
									</tr>";
								
							}
						}
					}
				?>
				
			</tbody>
			
		</table>
		<div class="back">
			<a href="faculty_home.php" style="text-decoration:none">Back to Home</a>
		</div>
	</div>
	</body>
</html>