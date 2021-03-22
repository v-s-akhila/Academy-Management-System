<!DOCTYPE html>
<html>
	<head>
	<title>Orisys Academy project</title>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="css/admin_style.css">
<link rel="icon" type="image/png" href="img/icons/favicon.ico"/>

	<style>
	</style>
	</head>
	<body class="admin">
	<h1>Admin Home Page</h1>
	<div class="row">
	<div class="col menubar">
	<ul>
		<li><a href="view_stud.php">View Student Details</a></li>
		<li><a href="view_faculty.php">View Faculty Details</a></li>
		<li><a href="#">Add New</a>
			<div class="sublink submenu">
			   <ul>
				<li><a href="add_faculty.php">Faculty</a></li>
				<li><a href="add_new_stud_form.php">Student</a></li>
			  </ul>
			</div>
		</li>
	  <li><a href="add_placement_notifications.php">Add Placement Notifications</a></li>
	  <li><a href="#">View Notification</a>
			<div class="sublink submenu">
			   <ul>
				<li><a href="admin_view_exam_notification.php">By Faculty</a></li>
				<li><a href="admin_view_notification.php">By admin</a></li>
			  </ul>
			</div>
		</li>
		<li><a href="view_complaint_by_admin.php">View Complaints</a></li>
		<li><a href="login_page.php">Logout</a></li>
	</ul>
	</div>
	</div>
	</body>
</html>