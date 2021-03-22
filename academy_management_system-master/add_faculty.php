<!DOCTYPE html>
<html>
	<head>	
    <title>Orisys Academy project</title>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/png" href="img/icons/favicon.ico"/>
  <style>

  </style>
</head>
<?php
	$empidErr=$fnameErr=$mnameErr= $lnameErr=$desigErr=$subjectErr=$emailErr=$passwordErr="";
	$emp_id=$fname=$mname=$lname=$desig=$subject=$email=$password="";
	if(isset($_POST['register']))
	{
		$emp_id=$_POST['empid'];
		$fname=$_POST['first_name'];
		$mname=$_POST['middle_name'];
		$lname=$_POST['last_name'];
		$desig=$_POST['desig'];
		$subject=$_POST['sub'];
		$email=$_POST['email'];
		$password=$_POST['password'];
		if(empty($emp_id))
			$empidErr="Employee ID is required";
		if(empty($fname))
			$fnameErr="first name and";
		else
		{
			if(!preg_match("/^[a-zA-z]*$/",$fname))
				$fnameErr="only alphabets and whitespacess are required";
		}
		if(!empty($mname))
		{
			if(!preg_match("/^[a-zA-z]*$/",$mname))
				$fnameErr="only alphabets and whitespacess are required";
		}
		if(empty($lname))
			$lnameErr="last name is required";
		else
		{
			if(!preg_match("/^[a-zA-z]*$/",$lname))
				$lnameErr="only alphabets and whitespacess are required";
		}
		if(!isset($desig))
			$desigErr="select atleat one";
		if(empty($email))
			$emailErr="email is required";
		else
		{
			if(!filter_var($email,FILTER_VALIDATE_EMAIL))
				$emailErr="invalid email";
		}
		if(empty($password))
			$passwordErr="password is required";
	/*	else
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
	if(empty($empidErr)&&empty($fnameErr)&&empty($mnameErr)&&empty($lnameErr)&&
		empty($desigErr)&&empty($emailErr)&&empty($passwordErr))
		{
			$sql="insert into login_page(email,password,user_type) values('$email','$password','1')";
			if(mysqli_query($mysql,$sql))
				$login_id = mysqli_insert_id($mysql);
			else
				echo "Error $sql".mysqli_error($mysql);
			 $sql2="insert into faculty_details(emp_id,fac_fname,fac_mname,fac_lname,login_id,
					designation,subject)values('$emp_id','$fname','$mname','$lname',
					'$login_id','$desig','$subject')";
			if(mysqli_query($mysql,$sql2))
					header("Location:view_faculty.php");
			else
					echo "Error $sql2".mysqli_error($mysql); 

		}
	}
?>
<body class="bi">
		<h1>Faculty Registration</h1>
	<a class="add_new" href="admin_home.php">Back</a>

    <div class="row">
	<form  class="reg" method="post" action="">

		<table>
			<tr>
				<th>Employee ID:</th>
				<td><input type="text" name="empid" placeholder="Employee ID" 
				    value="<?php echo $emp_id; ?>">
				<span class="err"><?php echo "*".$empidErr; ?></span></td>
			</tr>
			<tr>
				<th>Name:</th>
				<td><input  type="text" name="first_name" placeholder="First Name" value="<?php echo $fname; ?>">
					<span class="err"><?php echo "*"; ?></span>
				<input type="text" name="middle_name" placeholder="Middle Name" value="<?php echo $mname; ?>">
				<input  type="text" name="last_name" placeholder="Last Name" value="<?php echo $lname; ?>">
				<span class="err"><?php echo "*"; ?></span><span class="err"><?php echo $fnameErr; ?></span>
				<span class="err"><?php echo $lnameErr; ?></span>
				
				
				</td>	
			<tr>
				<th >Designation:</th>
				<td><select  name="desig">
					<option>Trainer</option>
					<option>Developer</option>
				</select><span class="err"><?php echo "*".$desigErr; ?></span></td>
			</tr>
			<tr>
				<th>Subject:</th>
				<td><select  name="sub">
					<option>IT Skills</option>
					<option>Python</option>
					<option>Core PHP</option>
					<option>Laravel</option>
					<option>Codeigniter</option>
					<option>English</option>
					<option>UI</option>	
			</tr>
			<tr>
				
			<tr>
				<th>Email:</th>
				<td><input  type="email" name="email" placeholder="Enter Mail" value="<?php echo $email; ?>">
					<span class="err"><?php echo "*".$emailErr; ?></span></td>
			</tr>
			<tr>
				<th >Password:</th>
				<td><input type="password" name="password" placeholder="Enter Password">
				    <span class="err"><?php echo "*".$passwordErr; ?></span></td>
			</tr>
			<tr>
				<td colspan="2"><input class= "btn_reg" type="submit" name="register" value="Register"></td>
			</tr>
			
		</table>
	</form>	
	
	</div>
</body>
</html>