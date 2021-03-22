<?php
	require('db_connectivity.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Orisys Academy Management System</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="css/view_table1.css">
	</head>
	<body class="table">
	 <div>
	    <h1>Faculty Details</h1>
		<a class="add_new" href="admin_home.php">Back</a>
		<table>
			<thead>
				<tr>
					<th>Employee ID</th>
					<th>Name of the faculty</th>
					<th>Designation</th>
					<th>Subject</th>
					<th>Email</th>
					<th>Action</th>
					
				</tr>
			</thead>
			<tbody>
				<?php
					$sql="select * from faculty_details inner join login_page on 
					      login_page.login_id = faculty_details.login_id";
					if(mysqli_query($mysql,$sql))
					{
						$result=mysqli_query($mysql,$sql);
						if(mysqli_num_rows($result)>0)
						{
							while($row=mysqli_fetch_assoc($result))
							{
								echo "<tr>
									<td>".$row['emp_id']."</td>
									<td>".$row['fac_fname']." ".$row['fac_mname']." ".$row['fac_lname']."</td>
									<td>".$row['designation']."</td>
									<td>".$row['subject']."</td>
									<td>".$row['email']."</td>
									<td><a href=delete_fac.php?id=".$row['login_id'].">Delete</a></td>
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