<!DOCTYPE html>
<html>
	<head>	
    <title>Orisys Academy project</title>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/add_new_stud.css">
    <link rel="icon" type="image/png" href="img/icons/favicon.ico"/>
  <style>

  </style>
</head>
<?php
   $enroll_idErr=$nameErr=$batchErr=$courseErr=$TimeErr=$emailErr=$passwordErr="";
   $enroll_id=$fname=$mname=$lname=$batch=$course=$startTime=$endTime=$email=$password="";
   if(isset($_POST['register']))
   {
	 $enroll_id=$_POST['enrolid'];
	 $fname=$_POST['first_name'];
	 $mname=$_POST['middle_name'];
	 $lname=$_POST['last_name'];
	 $batch=$_POST['batch'];
	 $course=$_POST['course'];
	 $startTime=$_POST['start_time'];
	 $endTime=$_POST['end_time'];
	 $email=$_POST['email'];
	 $password=$_POST['password'];
	if(empty($enroll_id))
	  $enroll_idErr="id is required";
	if(empty($fname))
			$nameErr="first name and last name required";
	else
	 {
		if(!preg_match("/^[a-zA-z]*$/",$fname))
			$nameErr="only alphabets and whitespacess are required";
	 }
	if(!empty($mname))
	 {
		if(!preg_match("/^[a-zA-z]*$/",$mname))
			$nameErr="only alphabets and whitespacess are required";
	 }
	if(empty($lname))
		$nameErr="first name and last name is required";
	else
	 {
		if(!preg_match("/^[a-zA-z]*$/",$lname))
			$nameErr="only alphabets and whitespacess are required";
	 }
	if(!isset($batch))
			$batchErr="select atleat one";
	if(!isset($course))
			$courseErr="select atleat one"; 
    if(!isset($startTime)&&!isset($endTime))
		$TimeErr="please specify valid month and date";
	if(empty($email))
		$emailErr="email is required";
	else
	{
		if(!filter_var($email,FILTER_VALIDATE_EMAIL))
			$emailErr="invalid email";
	}
	if(empty($password))
			$passwordErr="password is required";
	/*else
	{
		if (strlen($password) <= 8) 
			$passwordErr="Your Password Must Contain At Least 8 Characters!";
		
		elseif(!preg_match("#[0-9]+#",$password)) 
			 $passwordErr="Your Password Must Contain At Least 1 Number!";
    
		elseif(!preg_match("#[A-Z]+#",$password)) 
			$passwordErr="Your Password Must Contain At Least 1 Capital Letter!";
    
		elseif(!preg_match("#[a-z]+#",$password)) 
			$passwordErr="Your Password Must Contain At Least 1 Lowercase Letter!";
	}*/
	require('db_connectivity.php');
	if(empty($enroll_idErr)&&empty($nameErr)&&empty($batchErr)&&empty($courseErr)&&empty($TimeErr)
	   &&empty($emailErr)&&empty($passwordErr))
	{
	$sql="insert into login_page(email,password,user_type) values('$email','$password','2')";
	 if(mysqli_query($mysql,$sql))
		$login_id = mysqli_insert_id($mysql);
	  else
		echo "Error $sql".mysqli_error($mysql);
	 
	 $sql2="insert into student_details(enrollment_id,stud_fname,stud_mname,stud_lname,login_id,
			batch,course,startTime,endTime)values('$enroll_id','$fname','$mname','$lname',
			'$login_id','$batch','$course','$startTime','$endTime')";
	 if(mysqli_query($mysql,$sql2))
	     header("Location:view_stud.php");
	 else
		 echo "Error $sql2".mysqli_error($mysql); 
	} 
	
    
   }
	
?>
<body class="bi">
		<h1>Student Registration</h1>

	<a class="add_new" href="admin_home.php">Back</a>

    <div class="row">
	<form  class="reg" method="post" action="">
		<table>
		<tr>
		<th>Enrolment ID:</th>
        <td><input type="text" name="enrolid" placeholder="Enrolment ID" value="<?php echo $enroll_id; ?>">
		<span class="err"><?php echo "*".$enroll_idErr; ?></span></td>
		</tr>
		<tr>
	    <th>Name:</th>
        <td><input type="text" name="first_name" placeholder="First Name" value="<?php echo $fname; ?>">
		<span class="err"><?php echo "*"; ?></span>
        <input  type="text" name="middle_name" placeholder="Middle Name" value="<?php echo $mname; ?>">
        <input type="text" name="last_name" placeholder="Last Name" value="<?php echo $lname; ?>">
		<span class="err"><?php echo "*".$nameErr; ?></span></td>
		</tr>
		<tr>
		<th>Batch:</th>
		<td><select name="batch">
			<option>DDUGKY</option>
			<option>YUVAKERALA</option>
		</select>
		<span class="err"><?php echo "*".$batchErr; ?></span></td>
		</tr>
		<tr>
		<th>Course:</th>
		<td><select name="course">
			<option>JSD</option>
			<option>UI-developer</option>
		</select><span class="err"><?php echo "*".$courseErr; ?></span>
		</td>
		</tr>
		</tr>
		<th>Duration:</th>
		<td><input type="date" name="start_time" placeholder="start_time" value="<?php echo $startTime; ?>">To
		<input type="date" name="end_time" placeholder="end_time" value="<?php echo $endTime; ?>">
		<span class="err"><?php echo "*".$TimeErr; ?></span></td>
		</tr>
		<tr>
		<th>Email:</th>
	    <td><input type="email" name="email" placeholder="Enter Mail" value="<?php echo $email; ?>">
		<span class="err"><?php echo "*".$emailErr; ?></span></td>
		</tr>
		<tr>
		<th>Password:</th>
		<td><input type="password" name="password" placeholder="Enter Password">
		<span class="err"><?php echo "*".$passwordErr; ?></span></td>
		</tr>
		<tr>
		<td colspan="2"><input class="btn_reg" type="submit"  name="register" value="Register"></td>
		</tr>
	</table>
	</form>		
	</div>
</body>
</html>