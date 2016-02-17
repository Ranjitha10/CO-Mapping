<?php
session_start();
if( !(isset($_SESSION['username'])) )
{	echo "<script>alert('Please login to continue');</script>" ;
	header("Location: index.php");
}
error_reporting(0);
$connect=mysqli_connect("localhost","root","root","co_mng") or die("Couldn't connect to database!");
$username=$_SESSION["username"];
?>
<!DOCTYPE html>
<html>
<head>
<title>RVCE CO Mapping</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
<link rel="icon" href="images/demo/favicon.ico" type="image/x-icon">
</head>
<body id="top">
<!--<div class="wrapper row0">-->
  <div id="topbar" class="clear"> 
  <nav>
      <ul>
		<li><a href="about.php">About</a></li>
        <li><a href="index.php">Home</a></li>
	  <li><a href="#" class="drop">
	  <?php
			$query="SELECT `fname` FROM `faculty` WHERE `username`='$username'";
			$result=mysqli_query($connect,$query);
			$row=mysqli_fetch_assoc($result);
			echo  $row["fname"] ;
			?>
	  </a>
	  </li>
	  <li><a href="settings.php">Settings</a></li>
	  <li><a href="logout.php">Logout</a></li>
      </ul>
    </nav>
    
  </div>
<!--</div>-->
<br>
<div class="wrapper row1">
  <header id="header" class="clear"> 
  <div id="logo" class="fl_left">
      <h1><a href="index.php">RVCE Course Outcome Mapping</a></h1>
      <p></p>
    </div>
    <!--<div class="fl_right">
      <form class="clear" method="post" action="#">
        <fieldset>
          <legend>Search:</legend>
          <input type="text" value="" placeholder="Search Here">
          <button class="fa fa-search" type="submit" title="Search"><em>Search</em></button>
        </fieldset>
      </form>
    </div>-->
    </header>
</div>
<div class="wrapper row2">
  <div class="rounded">
    <nav id="mainav" class="clear"> 
<ul class="clear">
        <li><a href="index.php">Home</a></li>
		<li><a href="view_courses.html">View Courses</a></li>
		<li class="active"><a class="drop" href="#">Course Evaluation</a>
          <ul>
            <li><a href="co_attain.php">CO attainment requisite</a></li>
            <li><a href="eval_pattern.php">Create evaluation pattern</a></li>
      		<li><a class="drop" href="#">Add student marks</a>
              <ul>
                <li><a href="manual_entry.php">Manual entry</a></li>
                <li><a href="upload_marks.php">Upload Excel sheet</a></li>
              </ul>
            </li>
          </ul>
        </li>
        <li><a class="drop" href="#">CO Attainment</a>
		<ul>
                <li><a href="test_graph.php">Test wise</a></li>
                <li><a href="avg_test_graph.php">Average of tests</a></li>
              </ul>
		</li>
		 
		 <!--<li><a href="#">View Courses</a></li>-->
		 <li><a href="report.php">Report Generation</a></li>
		 
        
      </ul>
      <!-- ################################################################################################ --> 
    </nav>
  </div>
</div>
<!-- ################################################################################################ --> 
<!-- ################################################################################################ --> 
<!-- ################################################################################################ -->


<div class="wrapper row3">
  <div class="rounded">
    <main class="container clear"> 
      <!-- main body --> 
      <!-- ################################################################################################ -->
      <div class="group btmspace-30"> 
        <!-- Left Column -->
        <div class="one_half first"> 
	
  <form action="manual_entry2.php" method="post">
          <!-- ################################################################################################ -->
          <h2>Enter student details for test evaluation</h2>
		<label>Quiz Paper Format:</label>
                              <table class="table table-hover" id="quiz_questions">
                                <thead>
                                  <tr>
                                    <th>Question Number</th>
                                    <th>Maximum Marks</th>
                                    <th>Marks obtained</th>
                                  </tr>
                                </thead>
								<?php
								$co=$_POST["course_code"];
								$quizc=$_POST["eval_num"];
								$usn=$_POST["student_usn"];
								$q="SELECT `date` FROM `evaluation` WHERE `c_code_eval`='$co' && `eval_num`='$quizc' && `type`='Test'";
								$qh=mysqli_query($connect,$q);
								$qhg=mysqli_fetch_assoc($qh);
								if(!$qhg)
								{
									echo "<script>
									alert('Evaluation pattern does not exist. Create one!');
									window.location.href='eval_pattern.php';
									</script>";
								}
								session_start();
								$_SESSION["qc"]=$quizc;
								$_SESSION["cc"]=$co;
								$_SESSION["uc"]=$usn;
								$query2="INSERT INTO `student`(`usn`, `c_code_stu`) VALUES ('$usn','$co')";
								$query="SELECT `noofquiz` FROM `evaluation` WHERE `eval_num`='$quizc' && `type`='Test' && `c_code_eval`='$co'";
								$result=mysqli_query($connect,$query);
								$row=mysqli_fetch_assoc($result);
								$res=mysqli_query($connect,$query2);
								/*if(!$row || !$res)
								{
									echo "<script>
									alert('Could not enter into database pah! Try again later!');
									window.location.href='test-details.php';
									</script>";
								}*/
								$val=$row["noofquiz"];
								?>
                                <tbody>
								<?php
								for ($x = 1; $x <= ($val); $x++) {
								?>
								<tr>
								<td><?php 
								echo $x;
								?></td>
	<?php
	$q="SELECT `max_marks` FROM `eval_questions` WHERE `c_code_evq`='$co' && `ques_num`='$x' && `type`='Test' && `eval_num`='$quizc'";
	$row2=mysqli_query($connect,$q);
	$r=mysqli_fetch_assoc($row2);
	?>
								<td><?php echo $r['max_marks']; ?></td>
								<td><input type='number' name='qmark[<?php echo $x;?>]' max="<?php echo $r['max_marks'];?>" id='qmark[<?php echo $x;?>]' class="form-control" required/></td>
	<?php	
	$q1="INSERT INTO `stu_attainment`(`c_code_attain`, `usn`, `eval_num_appear`, `type_appear`, `ques_num_appear`) VALUES ('$co','$usn','$quizc','Test','$x')";
	$r1=mysqli_query($connect,$q1);
	if(!$r1 )
	{
		echo "<script>
			alert('Could not enter into database! Try again later!');
			window.location.href='manual_entry.php';
			</script>";
	}
	?>
								</tr>
								<?php
								}
								?>
                                </tbody>
                              </table>
			<label>Theory Paper Format:</label>
                              <table class="table table-hover" id="theory_questions">
                                <thead>
                                  <tr>
                                    <th>Question Number</th>
                                    <th>Total Marks</th>
                                    <th>Marks obtained</th>
                                  </tr>
                                </thead>
                                <tbody>
								<?php
								$f="SELECT `ques_num`, `max_marks` FROM `eval_theory_ques` WHERE `c_code`='$co' && `type`='Test' && `eval_num`='$quizc'";
								$ff=mysqli_query($connect,$f);
                                while($re=mysqli_fetch_assoc($ff))
                               	{
								?>
                                  <tr>
								  <td>
								  <?php
								  echo $re["ques_num"];
								  ?>
								  </td>
								  <td>
								  <?php
								  echo $re["max_marks"];
								  ?>
								  </td>
								  <td><input type='number' name='qmark[<?php echo $re['ques_num'];?>]'  max="<?php echo $re['max_marks'];?>" id='qmark[<?php echo $re['ques_num'];?>]' class="form-control" required/></td>
							    <?php	
	                            $q1="INSERT INTO `stu_attainment`(`c_code_attain`, `usn`, `eval_num_appear`, `type_appear`, `ques_num_appear`) VALUES ('$co','$usn','$quizc','Test','{$re["ques_num"]}')";
	                            $r1=mysqli_query($connect,$q1);
	                            if(!$r1 )
	                            {
		                            echo "<script>
			                        alert('Could not enter into database! Try again later!');
			                        window.location.href='manual_entry.php';
			                        </script>";
	                                }
	                            ?>
								 </tr>
								<?php
								}
								?>
								   </tbody>
                              </table> 
	  <button type="submit" id="submit" href="manual_entry2.php">Enter details</button> 
	  </form>
    </div>
  </div>
  </main>
</div>
</div>
<!-- ################################################################################################ --> 
<!-- ################################################################################################ --> 
<!-- ################################################################################################ -->
<!-- ################################################################################################ --> 
<!-- ################################################################################################ --> 
<!-- ################################################################################################ -->
<div class="wrapper row4">
  <!--<div class="rounded">-->
  <p class="fl_left"><a href="copy.html"><u>Copyright &copy;</u></a> 2015 - Anisha J Prasad, Anusha M & Archana M R.</p></div>
<!-- JAVASCRIPTS --> 
<script src="layout/scripts/jquery.min.js"></script> 
<script src="layout/scripts/jquery.fitvids.min.js"></script> 
<script src="layout/scripts/jquery.mobilemenu.js"></script> 
<script src="layout/scripts/tabslet/jquery.tabslet.min.js"></script>

</body>
</html>
