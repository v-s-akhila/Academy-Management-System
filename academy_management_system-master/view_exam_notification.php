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
		<link rel="stylesheet" href="css/view_exam_noti.css">
	</head>
	<body class="table">
	 <div>
	    <h1>EXAM NOTIFICATIONS</h1>
		<div class="back">
			<a href="stud_home.php" style="text-decoration:none">Back to Home</a>
		</div>
		<table>
		 
			<thead>
				<tr>
					<th>Exam Name</th>
					<th>Type of Exam</th>
					<th>Exam Date</th>
					<th>Subject</th>
					<th>Out Of</th>
					
				</tr>
			</thead>
			<tbody>
				<?php
				    $id=$_SESSION['id'];
				    $query="select * from student_details where login_id=$id";
					if(mysqli_query($mysql,$query))
					{
						$res=mysqli_query($mysql,$query);
						$ro=mysqli_fetch_assoc($res);
					}
					$course=$ro['course'];
					$batch=$ro['batch'];
					$sql="select * from exam_notifications where course='$course' and batch='$batch'";
					if(mysqli_query($mysql,$sql))
					{
						$result=mysqli_query($mysql,$sql);
						if(mysqli_num_rows($result)>0)
						{
							while($row=mysqli_fetch_assoc($result))
							{
								echo "<tr>
									<td>".$row['exam_name']."</td>
									<td>".$row['exam_type']."</td>
									<td>".$row['exam_date_time']."</td>
								    <td>".$row['subjects']."</td>
									 <td>".$row['total_mark']."</td>
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