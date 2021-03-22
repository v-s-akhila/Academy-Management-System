<?php
	session_start();
	require('db_connectivity.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Orisys Academy Management System</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="css/view_complaint.css">
	</head>
	<body class="table">
	 <div>
	    <h1>My Complaints</h1>
		<a class="add_new" href="stud_home.php">Back</a>
		<table>
			<thead>
				<tr>
					<th>Complaint ID</th>
					<th>Complaint</th>
					<th>complaint Date</th>
					<th>Status</th>
					<th>Action</th>
					
				</tr>
			</thead>
			<tbody>
				<?php
				     $id=$_SESSION['id'];
					$sql="select * from complaint_tb where login_id=$id";
					if(mysqli_query($mysql,$sql))
					{
						$result=mysqli_query($mysql,$sql);
						if(mysqli_num_rows($result)>0)
						{
							while($row=mysqli_fetch_assoc($result))
							{
								echo "<tr>
									<td>".$row['complaint_id']."</td>
									<td>".$row['complaint']."</td>
									<td>".$row['complaint_date']."</td>";
							if($row['complaint_status']=='0')
							     echo "<td style='color:red'>Not Viewed</td>";
							else if($row['complaint_status']=='1')
								 echo "<td style='color:blue'>Viewed</td>";
							else if($row['complaint_status']=='2')
								 echo "<td style='color:yellow'>Proceesing</td>";
							else if($row['complaint_status']=='3')
								 echo "<td style='color:green'>Completed</td>";
								echo "
									<td><a href='delete_complaint.php?id=".$row['complaint_id']."'>Delete</td>
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