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
        <link rel="stylesheet" href="css/view_table.css">
        <style>
           select{
			   padding:5px;
			   margin:10px;
		   }			   
    
        </style>
    </head>
	
    <body class="table">
	<a href="stud_home.php">Back</a>
	<?php
	  $id=$_SESSION['id'];
	  $qry="select batch from student_details where login_id=$id";
	  $result1=mysqli_query($mysql,$qry);
	  $ro=mysqli_fetch_assoc($result1);
	  $batch=$ro['batch'];
	  
	
	?>
<form action="" method="post">
	   Select Assessment:
	   <select name="exam_name">
	       <option>--select--</option>
		   <?php
		     $qry="select exam_name from exam_notifications";
			 $rslt=mysqli_query($mysql,$qry);
			 if($rslt)
			 {
				 while($ro=mysqli_fetch_assoc($rslt))
				 {
					echo "<option value=".$ro['exam_name']." >".$ro['exam_name']."</option>";
				 }
			 }
		   ?>
	   </select></br>
	   Select Date:
	   <select name="exam_date">
	       <option>--select--</option>
		   <?php
		     $qry="select exam_date_time from exam_notifications";
			 $rslt=mysqli_query($mysql,$qry);
			 if($rslt)
			 {
				 while($ro=mysqli_fetch_assoc($rslt))
				 {
					echo "<option value=".$ro['exam_date_time']." >".$ro['exam_date_time']."</option>";
				 }
			 }
		   ?>
	   </select></br>
	   Select Exam Type:
	   <select name="exam_type">
	       <option>--select--</option>
		   <option>Written</option>
		   <option>Practical</option>
	   </select></br>
	   Select Course:
	   <select name="course">
	       <option>--select--</option>
		   <option>JSD</option>
		   <option>UI</option>
	   </select></br>
	   <input type="submit" name="search" value="Search">
	</form>
	<?php
		if(isset($_POST['search']))
		{
			$exam=$_POST['exam_name'];
			$exam_date=$_POST['exam_date'];
			$exam_type=$_POST['exam_type'];
			$course=$_POST['course'];
		$sql="select * from result_tb join student_details on result_tb.enroll_id=student_details.enrollment_id
		where exam_name='$exam' and exam_type='$exam_type' and exam_date>='$exam_date'and batch='$batch' and student_details.course='$course'";
	   $result=mysqli_query($mysql,$sql);
	   $row=mysqli_fetch_assoc($result);
		
	?>
	 <h1>Result</h1>
        <table>
        <tr>
		<input type="hidden" name="enroll_id" value="<?php echo $row['enroll_id'];?>" readonly>
        <th>Name:</th>
        <td><input type="text" name="name" placeholder="name" value="<?php echo $row['stud_name']; ?>" readonly>
        </td>
        </tr>
		<tr>
        <th>Exam Name:</th>
        <td><input type="text" name="examname" placeholder="examname" value="<?php echo $row['exam_name']; ?>" readonly>
       </td>
        </tr>
        <tr>
        <th>ExamType:</th>
        <td><input type="text" name="examtype" placeholder="examtype" value="<?php echo $row['exam_type']; ?>" readonly>
       </td>
        </tr>
        <tr>
        <th>Subjects:</th>
        <td><input  type="text" name="subject" placeholder="subject" value="<?php echo $row['subjects']; ?>" readonly>
        </td>
        </tr>
        <tr>
        <th>Examdate:</th>
        <td><input type="text" name="examdate" placeholder="examdate" value="<?php echo $row['exam_date']; ?>" reaonly>
        
        </tr>
        <tr>
        <th>Mark Obtained</th>
        <td><input type="text" name="markobtained" placeholder="markobtained"  value=<?php echo $row['obtained_mark']; ?> readonly>
        </td>
        </tr>
        <tr>
        <th> Total Mark</th>
        <td><input type="text" name="totalmark" placeholder="totalmark" value="<?php echo $row['tot_mark']; ?>" readonly>
        </td>
        </tr>
        <tr> 
        <td><td><a href="stud_home.php">Back To Home</a></td></td>
    </table>
	<?php
		}
	?>
	</body>
	</html>