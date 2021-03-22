<?php
    session_start();
?>
<!DOCTYPE html>
<html>
	<head>	
    <title>Orisys Academy project</title>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/add_exam_noti.css">
    <link rel="icon" type="image/png" href="img/icons/favicon.ico"/>
  <style></style>
</head>
<?php
	$courseErr=$batchErr=$exam_nameErr=$exam_typeErr=$exam_dateErr=$durationErr=$subjectErr=$markErr="";
	$course=$batch=$exam_name=$exam_type=$exam_date_time=$subjects=$mark="";
	if(isset($_POST['add']))
	{
		
		$course=$_POST['course'];
		$batch=$_POST['batch'];
		$exam_name=$_POST['exam_name'];
		$exam_type=$_POST['exam_type'];
		$exam_date_time=$_POST['exam_date'];
		$subjects=$_POST['sub1'];
		$mark=$_POST['mark'];
		
		if(empty($course))
			$courseErr="Course name is required";
		if(isset($batch))
		{
		if($batch=="--select--")
			$batchErr="Select atleast one";
		}
	    if(empty($exam_name))
			$exam_nameErr="Exam name is required";
		if(empty($exam_type))
			$exam_typeErr="Exam type is required";
		if(empty($exam_date_time))
			$exam_dateErr="Enter the exam date";
		if(empty($duration))
			$durationErr="Enter the duration for exam";
        if(!isset($subjects))
			$subjectErr="Select the subjects for exam";
		else{
			$subject=implode(',',$subjects);
		}
        if(empty($mark))
			$markErr="Enter the total mark for exam";
			
    	require('db_connectivity.php');
	    if(empty($courseErr)&&empty($batchErr)&&empty($exam_nameErr)&&empty($exam_typeErr)&&
		empty($exam_dateErr)&&empty($subjectErr)&&empty($markErr))
		{
            $id=$_SESSION['id'];
		$sql="insert into exam_notifications(course,batch,exam_name,exam_type,exam_date_time,subjects,total_mark,login_id)
		    values('$course','$batch','$exam_name','$exam_type','$exam_date_time','$subject',$mark,$id)";
			if(mysqli_query($mysql,$sql))
					header('location:view_exam_notification_byFac.php');
			else
					echo "Error $sql".mysqli_error($mysql); 
        }
	}
    ?>
<body class="bi">
    <div class="row bg">
	<form  class="reg" method="post" action="">
                <h1>ADD EXAM NOTIFICATIONS</h1>
		<table>
			<tr>
				<th>Course:</th>
				<td><select name="course">
					<option>JSD</option>
					<option>UI</option>
                    <option>Electrician</option>
					</select>
				<span class="err"><?php echo "*".$courseErr; ?></span></td>
			</tr>
			<tr>
				<th>Batch:</th>
				<td><select  name="batch">
					<option>DDUGKY</option>
					<option>YUVAKERALA</option>
				</select><span class="err"><?php echo "*".$batchErr; ?></span></td>
            <tr>
				<th>Exam name:</th>
				<td><select  name="exam_name">
					<option>Assesment1</option>
					<option>Assesment2</option>
                    <option>Assesment3</option>
					<option>Assesment4</option>
					<option>Assesment5</option>
				</select><span class="err"><?php echo "*".$exam_nameErr; ?></span></td>
			</tr>
			<tr>
				<th>Exam type:</th>
				<td><select  name="exam_type">
					<option>Written</option>
					<option>Practical</option>
				</select><span class="err"><?php echo "*".$exam_typeErr; ?></span></td>
			</tr>
			<tr>
				<th>Exam Date:</th>
				<td><input type="date" name="exam_date" value="<?php echo $exam_date_time; ?>">
				    <span class="err"><?php echo "*".$exam_dateErr; ?></span></td>
			</tr>
           
			 <tr>
				<th>Subjects:</th>
				<td><input type="checkbox" id="sub1" name="sub1[]" value="PHP" class="check">
				<label for="sub1">PHP</label>
				<input type="checkbox" id="sub2" name="sub1[]" value="Python" class="check">
				<label for="sub2">Python</label>
				<input type="checkbox" id="sub3" name="sub1[]" value="Laravel" class="check">
				<label for="sub1">Laravel</label>
				<input type="checkbox" id="sub4" name="sub1[]" value="CI" class="check">
				<label for="sub4">CI</label>
				<input type="checkbox" id="sub5" name="sub1[]" value="Bootstrap" class="check">
				<label for="sub1">Bootstrap</label></td>
			</tr>
			<tr>
				<th>Total mark:</th>
				<td><input type="text" name="mark" value="<?php echo $mark; ?>">
				    <span class="err"><?php echo "*".$markErr; ?></span></td>
			</tr>
			<tr>
				<td colspan="2"><input class= "btn_reg" type="submit" name="add" value="ADD"></td>
			</tr>
		</table>
	</form>		
	</div>
	<a href="faculty_home.php">Back</a>
</body>
</html>
