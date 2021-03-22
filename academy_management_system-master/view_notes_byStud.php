<?php
	require('db_connectivity.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Orisys Academy Management System</title>
		<link rel="stylesheet" href="css/view_notes.css">
	</head>
	<body class="table">
	<a href="stud_home.php">Back</a>
	 <div>
	 <h1>Notes For Download</h1>
		<table>
			<thead>
				<tr>
					<th>Faculty Name</th>
					<th>Subject</th>
					<th>Notes</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$sql="select * from notes_tb";
					if(mysqli_query($mysql,$sql))
					{
						$result=mysqli_query($mysql,$sql);
						if(mysqli_num_rows($result)>0)
						{
							while($row=mysqli_fetch_assoc($result))
							{
								echo "<tr>
									<td>".$row['name']."</td>
									<td>".$row['subject']."</td>
									<td><a href='download_notes.php?id=".$row['notes_id']."'>Download</a></td>
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