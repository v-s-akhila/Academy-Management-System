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
		<style>
			
	
		</style>
	</head>
	<body class="table">
	 <div>
	    <h1>ADD DETAILS</h1>
		
		<table>
			<thead>
				<tr>
					<th>Student name</th>
					<th>Batch</th>
					<th>Course</th>
                    <th>Action</th>
					
					
				</tr>
			</thead>
			<tbody>
				<?php
					$sql="select * from student_details"; 
					if(mysqli_query($mysql,$sql))
					{
						$result=mysqli_query($mysql,$sql);
						if(mysqli_num_rows($result)>0)
						{
							while($row=mysqli_fetch_assoc($result))
							{
								echo "<tr>
									<td>".$row['stud_fname']."</td>
									<td>".$row['batch']."</td>
									<td>".$row['course']." </td>
                                    <td><a href=add_mark.php?=".$row[''].">Add Mark</a></td>
									
									
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