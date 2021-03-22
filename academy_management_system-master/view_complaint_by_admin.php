<?php
	require('db_connectivity.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Orisys Academy Management System</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="css/complaint_by_admin.css">
	</head>
	<body class="table">
	
	 <div>
	    <h1>COMPLAINT DETAILS</h1>
							<a class="add_new" href="admin_home.php" style="text-decoration:none">Back to Home</a>

		<table>
			<thead>
				<tr>
					<th>Student ID</th>
					<th>Complaint</th>
					<th>Complaint Date</th>
					<th colspan="3" style="text-align:center">Action</th>
					
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
								if($row['complaint_status']=='1')
								{ 
								  echo "<td>Viewed Case</td>
									   <td><a href='complaint_process.php?id=".$row['complaint_id']."'>Process</a></td>";
								}
								 else if($row['complaint_status']=='2')
								 {
									 echo "<td>Processing</td>
											<td><a href='complaint_completed.php?id=".$row['complaint_id']."'>Solve</a></td>";

								 }
								  else if($row['complaint_status']=='3')
									{ 
									  echo "<td>Complaint is Solved</td>";
									}
								 
								else
								{
								 echo 	"<td><a href='complaint_view.php?id=".$row['complaint_id']."'>View</a></td>
									</tr>";
								}
							}
						}
					}
				?>
				
			</tbody>
			
		</table>
		<div class="back">
		</div></br>

	</div>
	</body>
</html>