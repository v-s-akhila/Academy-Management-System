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
		$sql="select * from exam_notifications join student_details on exam_notifications.batch=student_details.batch
		where exam_name='$exam' and exam_type='$exam_type' and exam_date_time>='$exam_date'and exam_notifications.batch='DDUGKY' and exam_notifications.course='$course'";
		
	   $result=mysqli_query($mysql,$sql);
		
	?>
     <div>
        <h1>ADD MARK</h1>
        
        <table>
            <thead>
                <tr>
                    <th>Student name</th>
                    <th>Batch</th>
                    <th>Course</th>
                    <th>Subjects</th>
                    <th>Action</th>
                    
                    
                </tr>
            </thead>
            <tbody>
                <?php
				     
                   
                        if(mysqli_num_rows($result)>0)
                        {
                            while($row1=mysqli_fetch_assoc($result))
                            {
                                echo "<tr>
                                    <td>".$row1['stud_fname']." ".$row1['stud_mname']." ".$row1['stud_lname']."</td>
                                    <td>".$row1['batch']."</td>
                                    <td>".$row1['course']." </td>
									<td>".$row1['subjects']."</td>
									<td><a href='add_mark_byFac.php?id=".$row1['exam_id']."&sid=".$row1['enrollment_id']."'>Mark Obtained</a></td>";
                                   echo "</tr>"; 
									
                            }
                        }
					}
                ?>
                
            </tbody>
        </table>
        
      </div>
	  <a href="faculty_home.php">Back</a>
    </body>
</html>