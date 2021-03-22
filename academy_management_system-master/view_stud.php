<?php
	require('db_connectivity.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Orisys Academy Management System</title>
		<link rel="stylesheet" href="css/view_table.css">
	</head>
	<body class="table">
	 <div>
	 <h1>Students Details</h1>
	 <a class="add_new" href="admin_home.php">Back</a>
	    
		<table>
			<thead>
				<tr>
					<th>Enrollment ID</th>
					<th>Name of the student</th>
					<th>Batch</th>
					<th>Course</th>
					<th>Start Date</th>
					<th>End Date</th>
					<th>Email</th>
					<th>Highest Qualification</th>
					<th>Address</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$sql="select * from student_details inner join login_page on 
					      login_page.login_id = student_details.login_id";
					if(mysqli_query($mysql,$sql))
					{
						$result=mysqli_query($mysql,$sql);
						if(mysqli_num_rows($result)>0)
						{
							while($row=mysqli_fetch_assoc($result))
							{
								echo "<tr>
									<td>".$row['enrollment_id']."</td>
									<td>".$row['stud_fname']." ".$row['stud_mname']." ".$row['stud_lname']."</td>
									<td>".$row['batch']."</td>
									<td>".$row['course']."</td>
									<td>".$row['startTime']."</td>
									<td>".$row['endTime']."</td>
									<td>".$row['email']."</td>";
									
								if($row['pg']==" ")
								{
									echo "<td>".$row['ug']."</td>";
								}
								else
								{
									echo "<td>".$row['pg']."</td>";
								}
								echo "<td>".$row['address']."</td>	
							    
								 <td><a href=delete_stud.php?id=".$row['login_id'].">Delete</a></td></tr>";
								
							}
						}
					}
				?>
				
			</tbody>
		</table>
	  </div>
	</body>
</html>