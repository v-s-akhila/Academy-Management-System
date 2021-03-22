<!DOCTYPE html>
<html>
	<head>
	<title>Orisys Academy project</title>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="css/stud_home.css">
<link rel="icon" type="image/png" href="img/icons/favicon.ico"/>
	<style>
	</style>
	</head>
	<body class="admin bi">
	
	<div class="row">
	<h1>Student Home Page</h1>
	<div class="col menubar">
	<ul>
		<li><a href="add_student_other_det.php">Add More Details</a></li>
		<li><a href="#">View Notifications</a>
			<div class="sublink submenu">
			   <ul>
				<li><a href="view_exam_notification.php">Exam</a></li>
				<li><a href="view_placement_notification.php">Placement</a></li>
			  </ul>
			</div>
		</li>
		<li><a href="view_notes_byStud.php">Notes</a></li>
		<li><a href="result_view_byStud.php">Result</a></li>
		<li><a href="#">Complaint</a>
			<div class="sublink submenu">
			   <ul>
				<li><a href="add_complaint.php">Add New</a></li>
				<li><a href="view_complaint_stud.php">View</a></li>
			  </ul>
			</div>
		</li>
	  <li><a href="login_page.php">Logout</a></li>
	</ul>
	</div>
	</div>
	</body>
</html>