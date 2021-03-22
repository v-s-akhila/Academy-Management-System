<?php
	session_start();
	require('db_connectivity.php');
	$id=$_SESSION['id'];
	$sql="select * from faculty_details f inner join login_page l on l.login_id=f.login_id where f.login_id=$id";
	$result=mysqli_query($mysql,$sql);
	$row=mysqli_fetch_assoc($result);
	$empidErr=$fnameErr=$mnameErr= $lnameErr=$genderErr=$desigErr=$subjectErr=$emailErr=$passwordErr="";
	$emp_id=$fname=$mname=$lname=$gender=$desig=$subject=$email=$password="";
	$addressErr=$districtErr=$qualificationErr= $ageErr="";
			$address=$district=$qualification= $age="";
	if(isset($_POST['register']))
		{
			$emp_id=$_POST['empid'];
			$fname=$_POST['first_name'];
			$mname=$_POST['middle_name'];
			$lname=$_POST['last_name'];
			$gender=$_POST['gender'];
			$subject=$_POST['sub'];
			$email=$_POST['email'];
			$address=$_POST['address'];
			$district=$_POST['district'];
			$qualification=$_POST['qualification'];
			$age=$_POST['age'];
			if(!empty($address))
				{
					if(!preg_match("/^[a-zA-z]*$/",$address))
						$adressErr="only alphabets and whitespacess are allowed";
				}
			if(!isset($district))
					$districtErr="choose your district";
			if(empty($qualification))	
					$qualificationErr="Add your Qualification";
			if(empty($age))
					$ageErr="Add your Age";
				
		
			require('db_connectivity.php');
				if(empty($addressErr)&&empty($districtErr)&&empty($qualificationErr)&&empty($ageErr))
					{
						$sql1="update faculty_details set fac_fname='$fname',fac_mname='$mname',fac_lname='$lname',
						address='$address',subject='$subject',gender='$gender',district='$district',
						qualification='$qualification',age=$age where login_id=$id";
						if(mysqli_query($mysql,$sql1))
							header("Location:faculty_home.php");
						else
							echo "Error $sql".mysqli_error($mysql); 

					}
		}
		
?>
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

	<body class="bi">
		<div class="row">
			<form  class="reg" method="post" action="">
				<h1>Faculty Profile</h1>
			<table>
				<tr>
					<th>Employee ID:</th>
						<td>
							<input type="text" name="empid" placeholder="Employee ID" value="<?php echo $row['emp_id']; ?>" readonly>
						</td>
				</tr>
				<tr>
					<th>Name:</th>
						<td>
							<input  type="text" name="first_name" placeholder="First Name" value="<?php echo $row['fac_fname']; ?> ">
							<span class="err">
								<?php echo "*"; ?>
							</span>
							<input type="text" name="middle_name" placeholder="Middle Name" value="<?php echo $row['fac_mname']; ?> ">
							<input  type="text" name="last_name" placeholder="Last Name" value="<?php echo $row['fac_lname']; ?> ">
							<span class="err">
							 <?php echo "*"; ?>
							</span>
							<span class="err">
							 <?php echo $fnameErr; ?></span>
							<span class="err">
								<?php echo $lnameErr; ?>
							</span>
						</td>
				</tr>
				<tr>
					<th >Gender:</th>
					<td>
						<input type="radio" name="gender" id="M" value="Male" class="gender"><label for="M" >Male</label>
						<input type="radio" name="gender" id="F" value="Female" class="gender"><label for="F" >Female</label>
						<input type="radio" name="gender" id="T" value="Others" class="gender"><label for="T" >Others</label>
						
						<span class="err">
							<?php echo "*".$desigErr; ?>
						</span>
					</td>
				</tr>
				<tr>
					<td>Age:</td>
					<td>
						<input type="text" name="age" placeholder="Age">
					</td>
				</tr>
				<tr>
					<th>Designation:</th>
					
					<td>
						<input type="text"  name="designation" value="<?php echo $row['designation']; ?>" readonly>
						<!---<select  name="desig">
							<option>--SELECT--</option>
							<option>Trainer</option>
							<option>Developer</option>
						</select>--->
						<span class="err">
							<?php echo "*".$desigErr; ?>
						</span>
					</td>
				</tr>
								
				<tr>
					<th>Subject:</th>
						<td>
							<select  name="sub"  >
								<option><?php echo $row['subject']; ?></option>
								<option>IT Skills</option>
								<option>Python</option>
								<option>Core PHP</option>
								<option>Laravel</option>
								<option>Codeigniter</option>
								<option>English</option>
								<option>UI</option>
							</select>
							<span class="err">
								<?php echo "*".$subjectErr; ?>
							</span>
						</td>					
				</tr>
				<tr>
					<th>Address:</th>
						<td>
							<textarea name="address"><?php echo $row['address']; ?></textarea>
						</td>
				</tr>
				<tr>
					<th>District</th>
					<td>
						<select name="district" >
							<option><?php echo $row['district']; ?></option>
							<option>Trivandrum</option>
							<option>Kollam</option>
							<option>Pathanamthitta</option>
							<option>Kottayam</option>
							<option>Alappuzha</option>
							<option>Idukki</option>
							<option>Ernakulam</option>
							<option>Thrissur</option>
							<option>Palakkad</option>
							<option>Kozhikod</option>
							<option>Malappuram</option>
							<option>Wayanad</option>
							<option>Kannur</option>
							<option>Kasargod</option>
						</select>
						<span class="err">
							<?php echo "*".$districtErr;?>
						</span>
					</td>
				</tr>
				
				<tr>
					<th>Qualification</th>
						<td>
				<select name="qualification">
								<option><?php echo $row['qualification']; ?></option>
								<option value="MCA">MCA</option>
								<option value="MBA">MBA</option>
								<optgroup label="M_tech">
											<option>M_tech C.S</option>
											<option>M_tech mech</option>
											<option>M_tech EEE</option>
											<option>M_tech civil</option>
											<option>M_tech Electronics</option>
								</optgroup>
								<optgroup label="MSC">
											<option>MSc C.S</option>
											<option>MSc Physics</option>
											<option>MSc Chemistry</option>
											<option>MSc Computer</option>
											<option>MSc Electronics</option>
											<option>MSc   Maths</option>
								</optgroup>
								<optgroup label="B_tech">
											<option>B_tech C.S</option>
											<option>B_tech mech</option>
											<option>B_tech EEE</option>
											<option>B_tech civil</option>
											<option>B_tech Electronics</option>
								</optgroup>
					</select>
							<span class="err">
								<?php echo "*".$qualificationErr;?>
							</span>
						</td>
				</tr>
				<tr>
					<th>Email:</th>
						<td>
							<input  type="text" name="email" placeholder="Enter Email" value="<?php echo $row['email']; ?>">
							<span class="err">
								<?php echo "*".$emailErr; ?>
							</span>
						</td>
				</tr>				
				<tr>
					<td colspan="2">
						<input class= "btn_reg" type="submit" name="register" value="Add">
					</td>
				</tr>
			</table>
			</form>
			<div class="back">
				<a href="faculty_home.php" style="text-decoration:none">Back to Home</a>
			</div>
			
		</div>
	</body>
</html>