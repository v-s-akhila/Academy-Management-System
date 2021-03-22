<?php
	session_start();
	require('db_connectivity.php');  
	$id=$_SESSION['id'];
	$sql="select * from student_details s inner join login_page l on 
					      l.login_id = s.login_id where s.login_id=$id";
	$result=mysqli_query($mysql,$sql);
	$row=mysqli_fetch_assoc($result);					
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Orisys Academy Management System</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="css/add_stud_det.css">
	</head>
<?php
	$nameErr=$emailErr=$addressErr=$districtErr=$pgErr=$cgpa_per_pgErr=$uni_insti_pgErr=$ugErr=$cgpa_per_ugErr=
	$uni_insti_ugErr=$plustwoErr=$cgpa_per_plusErr=$brd_or_schl_plusErr=$sslcErr=$cgpa_per_sslcErr=
	$brd_schl_sslcErr=$yop_pgErr=$yop_ugErr=$yop_plusErr=$yop_sslcErr="";
    $fname=$mname=$lname=$email=$address=$district=$pg=$cgpa_per_pg=$uni_insti_pg=$ug=$cgpa_per_ug=$uni_insti_ug=
	$plustwo=$cgpa_per_plus=$brd_or_schl_plus=$sslc=$cgpa_per_sslc=$brd_schl_sslc=$yop_pg=$yop_ug=$yop_plus=
	$yop_sslc="";
   if(isset($_POST['update']))
   {
	 
	 $fname=$_POST['fname'];
	 $mname=$_POST['mname'];
	 $lname=$_POST['lname'];
	 $email=$_POST['email'];
	 $address=$_POST['address'];
	 $district=$_POST['dist'];
	 $pg=$_POST['pg'];
	 $cgpa_per_pg=$_POST['per_pg'];
	 $uni_insti_pg=$_POST['uni_or_insti_pg'];
	 $yop_pg=$_POST['yop_pg'];
	 $ug=$_POST['ug'];
	 $cgpa_per_ug=$_POST['per_ug'];
	 $uni_insti_ug=$_POST['uni_or_insti_ug'];
	 $yop_ug=$_POST['yop_ug'];
	 $plustwo=$_POST['plustwo'];
	 $cgpa_per_plus=$_POST['per_plustwo'];
	 $brd_or_schl_plus=$_POST['brd_or_schl_plus'];
	 $yop_plus=$_POST['yop_plus'];
	 $sslc=$_POST['sslc'];
	 $cgpa_per_sslc=$_POST['per_sslc'];
	 $brd_schl_sslc=$_POST['brd_or_schl_plus'];
	 $yop_sslc=$_POST['yop_sslc'];
	 
	
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
	
	if(empty($email))
		$emailErr="email is required";
	else
	{
		if(!filter_var($email,FILTER_VALIDATE_EMAIL))
			$emailErr="invalid email";
	}
	if(empty($address))
		$addressErr="address is required";
	if(isset($district))
	{
		if($district == "--select--")
				$districtErr="select one";
	}
	if(isset($ug))
	{
		if($ug=="--select--")
			$ugErr="select one";
	}
	if(empty($cgpa_per_ug))
			$cgpa_per_ugErr="Required cgpa or percentage";
	if(empty($uni_insti_ug))
			$uni_insti_ugErr="Specify college or university";
	if(empty($plustwo))
		$plustwoErr="Required";
	if(empty($cgpa_per_plus))
			$cgpa_per_plusErr="Required";
	if(empty($brd_or_schl_plus))
			$brd_or_schl_plusErr="specify school or board";
	if(empty($sslc))
		$sslcErr="Required";
	if(empty($cgpa_per_sslc))
			$cgpa_per_sslcErr="Required";
	if(empty($brd_schl_sslc))
			$brd_schl_sslcErr="specify school or board";
	require('db_connectivity.php');
	if(empty($nameErr)&&empty($emailErr)&&empty($addressErr)&&empty($districtErr)&&empty($pgErr)&&empty($cgpa_per_pgErr)&&
	  empty($uni_insti_pgErr)&&empty($ugErr)&&empty($cgpa_per_ugErr)&&empty($uni_insti_ugErr)&&empty($plustwoErr)&&
	  empty($cgpa_per_plusErr)&&empty($brd_or_schl_plusErr)&&empty($sslcErr)&&empty($cgpa_per_sslcErr)&&empty($brd_schl_sslcErr))
	{
	$sql1="update login_page set email='$email' where login_id=$id";
	if(mysqli_query($mysql,$sql1))
	     echo "</br>";
	else
		 echo "Error $sql1".mysqli_error($mysql); 
	if(mysqli_query($mysql,$sql))
		echo "</br>";
	 $sql2="update student_details set stud_fname='$fname',stud_mname='$mname',stud_lname='$lname',address='$address',
			district='$district',pg='$pg',cgpa_PG='$cgpa_per_pg',uni_insti_pg='$uni_insti_pg',yop_pg='$yop_pg',ug='$ug',
			cgpa_UG='$cgpa_per_ug',uni_insti_ug='$uni_insti_ug',yop_ug='$yop_ug',plustwo='$plustwo',cgpa_plustwo='$cgpa_per_plus',
			brd_school_plus='$brd_or_schl_plus',yop_plus='$yop_plus',sslc='$sslc',cgpa_sslc='$cgpa_per_sslc',
			brd_schl_sslc='$brd_schl_sslc',yop_sslc='$yop_sslc' where login_id=$id";
	 if(mysqli_query($mysql,$sql2))
	     header("Location:stud_home.php");
	 else
		 echo "Error $sql2".mysqli_error($mysql); 
		 
     
	} 
	
    
	
	

  }
	
?>	
	<body class="bi">
	<h1>Add Student Details</h1>
	<a href="stud_home.php">Back</a>
		<form class="reg row" action="" method="post">
		<table>
			<tr>
			<th>Enrollment Id:</th>
			<td><input type="text" name="name" value="<?php  echo $row['enrollment_id']; ?>" readonly></td>
			</tr>
			<tr>
			<th>Name:</th>
			<td colspan="3"><input type="text" name="fname" value="<?php  echo $row['stud_fname'];?>">
			<input type="text" name="mname" value="<?php echo $row['stud_mname'];?>"> 
			<input type="text" name="lname" value="<?php echo $row['stud_lname'];?>">
			<span class="err"><?php echo "*".$nameErr; ?></span></td>
			</tr>
			<tr>
			<th>Batch</th>
			<td><input type="text" name="batch" value="<?php echo $row['batch']; ?>" readonly></td>
			</tr>
			<tr>
			<th>Course</th>
			<td><input type="text" name="course" value="<?php echo $row['course']; ?>" readonly></td>
			</tr>
			<tr>
			<th>Duration</th>
			<td><input type="text" name="duration" value="<?php echo $row['startTime']." To ".$row['endTime'];?>" readonly></td>
			</tr>
			<tr>
			<th>Email</th>
			<td><input type="email" name="email" value="<?php echo $row['email']; ?>">
			<span class="err"><?php echo "*".$emailErr; ?></span></td>
			</tr>
			<tr>
			<th>Address</th>
			<td><textarea name="address"><?php echo $row['address']; ?></textarea>
			<span class="err"><?php echo "*".$addressErr; ?></span></td>
			</tr>
			<tr>
			<th>District</th>
			<td><select name="dist">
				<option><?php echo $row['district']; ?></option>
				<option>Kottayam</option>
				<option>Alappuzha</option>
				<option>Trivandrum</option>
				<option>Kollam</option>
				<option>Pathanamthitta</option>
			</tr>
			<tr>
			<th colspan="2">Qualification Details</th>
			</tr>
			<tr>
			<th>Post Graduation(optional)</th>
			<td><select name="pg">
				<option><?php echo $row['pg']; ?></option>
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
			</select><span class="err"><?php echo "*".$pgErr; ?></span>
			</td>
			</tr>
			<tr>
			<th>CGPA/Percentage:</th>
			<td><input type="text" name="per_pg" placeholder="percentage(/100%) or cgpa(/10)" value="<?php echo $row['cgpa_PG']; ?>">
			<span class="err"><?php echo "*".$cgpa_per_pgErr; ?></span></td>
			</tr>
			<tr>
			<th>University/Institute</th>
			<td><input type="text" name="uni_or_insti_pg" placeholder="Institute/University" value="<?php echo $row['uni_insti_pg']; ?>">
			<span class="err"><?php echo "*".$uni_insti_pgErr; ?></span></td>
			</tr>
			<tr>
			<th>YOP</th>
			<td><input type="date" name="yop_pg" placeholder="Year of Pass" value="<?php echo $row['yop_pg']; ?>">
			<span class="err"><?php echo "*".$yop_pgErr; ?></span></td>
			</tr>
			<tr>
			<th>Under Graduation(UG)</th>
			<td><select name="ug">
				<option><?php echo $row['ug']; ?></option>
				<option value="BCA">BCA</option>
				<option value="BBA">BBA</option>
				<optgroup label="B_tech">
							<option>B_tech C.S</option>
							<option>B_tech mech</option>
							<option>B_tech EEE</option>
							<option>B_tech civil</option>
							<option>B_tech Electronics</option>
				</optgroup>
				<optgroup label="BSc">
							<option>BSc C.S</option>
							<option>BSc Physics</option>
							<option>BSc Chemistry</option>
							<option>BSc Computer</option>
							<option>BSc Electronics</option>
							<option>BSc Maths</option>
				</optgroup>	
			</select>
			<span class="err"><?php echo "*".$ugErr;?></span></td>
			</tr>
			<tr>
			<th>CGPA/Percentage:</th>
			<td><input type="text" name="per_ug" placeholder="percentage(/100%) or cgpa(/10)" value="<?php echo $row['cgpa_UG']; ?>">
			<span class="err"><?php echo "*".$cgpa_per_ugErr; ?></span></td>
			</tr>
			<tr>
			<th>University/Institute</th>
			<td><input type="text" name="uni_or_insti_ug" placeholder="Institute/University" value="<?php echo $row['uni_insti_ug']; ?>">
			<span class="err"><?php echo "*".$uni_insti_ugErr; ?></span></td>
			</tr>
			<th>YOP</th>
			<td><input type="date" name="yop_ug" placeholder="Year of Pass" value="<?php echo $row['yop_pg']; ?>">
			<span class="err"><?php echo "*".$yop_ugErr; ?></span></td>
			</tr>
			<tr>
			<th>Plus Two/CBSE</th>
			<td><input type="text" name="plustwo" placeholder="Plus Two" value="Plus Two" readonly>
			</tr>
			<tr>
			<th>CGPA/Percentage:</th>
			<td><input type="text" name="per_plustwo" placeholder="percentage(/100%) or cgpa(/10)" value="<?php echo $row['cgpa_plustwo']; ?>">
			<span class="err"><?php echo "*".$cgpa_per_plusErr; ?></span></td>
			</tr>
			<tr>
			<th>Board/School</th>
			<td><input type="text" name="brd_or_schl_plus" placeholder="Institute/University" value="<?php echo $row['brd_school_plus']; ?>">
			<span class="err"><?php echo "*".$brd_or_schl_plusErr; ?></span></td>
			</tr>
			<th>YOP</th>
			<td><input type="date" name="yop_plus" placeholder="Year of Pass" value="<?php echo $row['yop_plus']; ?>">
			<span class="err"><?php echo "*".$yop_plusErr; ?></span></td>
			</tr>
			<tr>
			<th>SSLC/CBSE</th>
			<td><input type="text" name="sslc" placeholder="SSLC" value="SSLC" readonly>
			</tr>
			<tr>
			<th>CGPA/Percentage:</th>
			<td><input type="text" name="per_sslc" placeholder="percentage(/100%) or cgpa(/10)" value="<?php echo $row['cgpa_sslc']; ?>">
			<span class="err"><?php echo "*".$cgpa_per_sslcErr; ?></span></td>
			</tr>
			<tr>
			<th>Board/School</th>
			<td><input type="text" name="brd_or_schl_sslc" placeholder="Institute/University" value="<?php echo $row['brd_schl_sslc']; ?>">
			<span class="err"><?php echo "*".$brd_schl_sslcErr; ?></span></td>
			</tr>
			<tr>
			<th>YOP</th>
			<td><input type="date" name="yop_sslc" placeholder="Year of Pass" value="<?php echo $row['yop_sslc']; ?>">
			<span class="err"><?php echo "*".$yop_sslcErr; ?></span></td>
			</tr>
			<tr>
			<th colspan="3"><input type="submit" name="update" value="update"></th>
			</tr>
			
		</table>
		</form>
	</body>
</html>