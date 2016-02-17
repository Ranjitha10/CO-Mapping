<?php
error_reporting(0);
$connect=mysqli_connect("localhost","root","root","co_mng") or die("Couldn't connect to database!");
if(isset($_POST["co_code"]) && isset($_POST["eval_num"]) && isset($_POST["date_eval"]) && isset($_POST["time"]))
{
	$username=$_SESSION["username"];
	$course_code=$_POST["co_code"];
	$eval_num=$_POST["eval_num"];
	$date_eval=$_POST["date_eval"];
	$time=$_POST["time"];
	$eval_type='Test';
	$noofquiz=$_POST["no_of_quiz"];
	if(!empty($course_code) && !empty($eval_num) && !empty($date_eval) && !empty($time) && !empty($eval_type))
	{
		//$query="INSERT INTO `course`(`c_code`, `cname`, `t_un`) VALUES ('$course_code','$course_name','$username')";
		$query2="INSERT INTO `evaluation`(`c_code_eval`, `date`, `eval_num`, `type`, `noofquiz`) VALUES ('$course_code','$date_eval','$eval_num','$eval_type','$noofquiz')";
		//$query_run=mysqli_query($connect,$query);
		$query_run2=mysqli_query($connect,$query2);
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
		<li><a class="drop" href="#">Course Evaluation</a>
          <ul>
            <li><a class="active" href="co_attain.php">CO attainment requisite</a></li>
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
	

          <!-- ################################################################################################ -->
     <h2> Test paper Pattern created for <?php echo $course_code;?> and test number <?php echo $eval_num; ?> </h2>

        <table>
          <thead>
            <tr>
              <th>Question Number</th>
              <th>Course Outcome</th>
              <th>Maximum marks</th>
            </tr>
          </thead>
          <tbody>
          <?php	
		for ($x = 1; $x <= $noofquiz; $x++) {
		?>
		<tr><?php
			$x1="qco".$x;
			$x2="qmark".$x;
			$y=$_POST["$x1"];
			$z=$_POST["$x2"];
			$query3="INSERT INTO `eval_questions`(`c_code_evq`, `ques_num`, `co_level`, `max_marks`, `type`, `eval_num`) VALUES ('$course_code','$x','$y','$z','$eval_type','$eval_num')";
			$query_run3=mysqli_query($connect,$query3);
			if(!query_run3)
			{
				echo
				"<script>
				alert('Error in entering values. Try again later!');
				window.location.href='eval_pattern.php';
				</script>";
			}
			echo "<td>".$x."</td>";
			echo "<td>".$y."</td>";
			echo "<td>".$z."</td></tr>";
		}
	$ac1=$_POST["theory_co_1a"];
	$ap1=$_POST["theory_present_1a"];
	$am1=$_POST["theory_marks_1a"];
	
	$bc1=$_POST["theory_co_1b"];
	$bp1=$_POST["theory_present_1b"];
	$bm1=$_POST["theory_marks_1b"];
	
	$cc1=$_POST["theory_co_1c"];
	$cp1=$_POST["theory_present_1c"];
	$cm1=$_POST["theory_marks_1c"];
	
	$ac2=$_POST["theory_co_2a"];
	$ap2=$_POST["theory_present_2a"];
	$am2=$_POST["theory_marks_2a"];
	
	$bc2=$_POST["theory_co_2b"];
	$bp2=$_POST["theory_present_2b"];
	$bm2=$_POST["theory_marks_2b"];
	
	$cc2=$_POST["theory_co_2c"];
	$cp2=$_POST["theory_present_2c"];
	$cm2=$_POST["theory_marks_2c"];
	
	$ac3=$_POST["theory_co_3a"];
	$ap3=$_POST["theory_present_3a"];
	$am3=$_POST["theory_marks_3a"];
	
	$bc3=$_POST["theory_co_3b"];
	$bp3=$_POST["theory_present_3b"];
	$bm3=$_POST["theory_marks_3b"];
	
	$cc3=$_POST["theory_co_3c"];
	$cp3=$_POST["theory_present_3c"];
	$cm3=$_POST["theory_marks_3c"];
	
	$ac4=$_POST["theory_co_4a"];
	$ap4=$_POST["theory_present_4a"];
	$am4=$_POST["theory_marks_4a"];
	
	$bc4=$_POST["theory_co_4b"];
	$bp4=$_POST["theory_present_4b"];
	$bm4=$_POST["theory_marks_4b"];
	
	$cc4=$_POST["theory_co_4c"];
	$cp4=$_POST["theory_present_4c"];
	$cm4=$_POST["theory_marks_4c"];
	
	$ac5=$_POST["theory_co_5a"];
	$ap5=$_POST["theory_present_5a"];
	$am5=$_POST["theory_marks_5a"];
	
	$bc5=$_POST["theory_co_5b"];
	$bp5=$_POST["theory_present_5b"];
	$bm5=$_POST["theory_marks_5b"];

	$cc5=$_POST["theory_co_5c"];
	$cp5=$_POST["theory_present_5c"];
	$cm5=$_POST["theory_marks_5c"];
	
	if(isset($_POST["theory_present_1a"]))
	{
		$g="INSERT INTO `eval_theory_ques`(`c_code`, `ques_num`, `co_level`, `type`, `max_marks`, `eval_num`) VALUES ('$course_code','1a','$ac1','Test','$am1','$eval_num')";
		$g1=mysqli_query($connect,$g);
		if(!$g1)
		{
			echo "<script>
			alert('Could not enter into database! Try again later!');
			window.location.href='eval_pattern.php';
			</script>";
		}
		echo "<tr><td>1a</td><td>".$ac1."</td><td>".$am1."</td></tr>";
	}
	if(isset($_POST["theory_present_1b"]))
	{
		$g="INSERT INTO `eval_theory_ques`(`c_code`, `ques_num`, `co_level`, `type`, `max_marks`, `eval_num`) VALUES ('$course_code','1b','$bc1','Test','$bm1','$eval_num')";
		$g1=mysqli_query($connect,$g);
		if(!$g1)
		{
			echo "<script>
			alert('Could not enter into database! Try again later!');
			window.location.href='eval_pattern.php';
			</script>";
		}
		echo "<tr><td>1b</td><td>".$bc1."</td><td>".$bm1."</td></tr>";
	}
	if(isset($_POST["theory_present_1c"]))
	{
		$g="INSERT INTO `eval_theory_ques`(`c_code`, `ques_num`, `co_level`, `type`, `max_marks`, `eval_num`) VALUES ('$course_code','1c','$cc1','Test','$cm1','$eval_num')";
		$g1=mysqli_query($connect,$g);
		if(!$g1)
		{
			echo "<script>
			alert('Could not enter into database! Try again later!');
			window.location.href='eval_pattern.php';
			</script>";
		}
		echo "<tr><td>1c</td><td>".$cc1."</td><td>".$cm1."</td></tr>";
	}
	
	if(isset($_POST["theory_present_2a"]))
	{
		$g="INSERT INTO `eval_theory_ques`(`c_code`, `ques_num`, `co_level`, `type`, `max_marks`, `eval_num`) VALUES ('$course_code','2a','$ac2','Test','$am2','$eval_num')";
		$g1=mysqli_query($connect,$g);
		if(!$g1)
		{
			echo "<script>
			alert('Could not enter into database! Try again later!');
			window.location.href='eval_pattern.php';
			</script>";
		}
		echo "<tr><td>2a</td><td>".$ac2."</td><td>".$am2."</td></tr>";
	}
	if(isset($_POST["theory_present_2b"]))
	{
		$g="INSERT INTO `eval_theory_ques`(`c_code`, `ques_num`, `co_level`, `type`, `max_marks`, `eval_num`) VALUES ('$course_code','2b','$bc2','Test','$bm2','$eval_num')";
		$g1=mysqli_query($connect,$g);
		if(!$g1)
		{
			echo "<script>
			alert('Could not enter into database! Try again later!');
			window.location.href='eval_pattern.php';
			</script>";
		}
		echo "<tr><td>2b</td><td>".$bc2."</td><td>".$bm2."</td></tr>";
	}
	if(isset($_POST["theory_present_2c"]))
	{
		$g="INSERT INTO `eval_theory_ques`(`c_code`, `ques_num`, `co_level`, `type`, `max_marks`, `eval_num`) VALUES ('$course_code','2c','$cc2','Test','$cm2','$eval_num')";
		$g1=mysqli_query($connect,$g);
		if(!$g1)
		{
			echo "<script>
			alert('Could not enter into database! Try again later!');
			window.location.href='eval_pattern.php';
			</script>";
		}
		echo "<tr><td>2c</td><td>".$cc2."</td><td>".$cm2."</td></tr>";
	}
	
	if(isset($_POST["theory_present_3a"]))
	{
		$g="INSERT INTO `eval_theory_ques`(`c_code`, `ques_num`, `co_level`, `type`, `max_marks`, `eval_num`) VALUES ('$course_code','3a','$ac3','Test','$am3','$eval_num')";
		$g1=mysqli_query($connect,$g);
		if(!$g1)
		{
			echo "<script>
			alert('Could not enter into database! Try again later!');
			window.location.href='eval_pattern.php';
			</script>";
		}
		echo "<tr><td>3a</td><td>".$ac3."</td><td>".$am3."</td></tr>";
	}
	if(isset($_POST["theory_present_3b"]))
	{
		$g="INSERT INTO `eval_theory_ques`(`c_code`, `ques_num`, `co_level`, `type`, `max_marks`, `eval_num`) VALUES ('$course_code','3b','$bc3','Test','$bm3','$eval_num')";
		$g1=mysqli_query($connect,$g);
		if(!$g1)
		{
			echo "<script>
			alert('Could not enter into database! Try again later!');
			window.location.href='eval_pattern.php';
			</script>";
		}
		echo "<tr><td>3b</td><td>".$bc3."</td><td>".$bm3."</td></tr>";
	}
	if(isset($_POST["theory_present_3c"]))
	{
		$g="INSERT INTO `eval_theory_ques`(`c_code`, `ques_num`, `co_level`, `type`, `max_marks`, `eval_num`) VALUES ('$course_code','3c','$cc3','Test','$cm3','$eval_num')";
		$g1=mysqli_query($connect,$g);
		if(!$g1)
		{
			echo "<script>
			alert('Could not enter into database! Try again later!');
			window.location.href='eval_pattern.php';
			</script>";
		}
		echo "<tr><td>3c</td><td>".$cc3."</td><td>".$cm3."</td></tr>";
	}
	
	if(isset($_POST["theory_present_4a"]))
	{
		$g="INSERT INTO `eval_theory_ques`(`c_code`, `ques_num`, `co_level`, `type`, `max_marks`, `eval_num`) VALUES ('$course_code','4a','$ac4','Test','$am4','$eval_num')";
		$g1=mysqli_query($connect,$g);
		if(!$g1)
		{
			echo "<script>
			alert('Could not enter into database! Try again later!');
			window.location.href='eval_pattern.php';
			</script>";
		}
		echo "<tr><td>4a</td><td>".$ac4."</td><td>".$am4."</td></tr>";
	}
	if(isset($_POST["theory_present_4b"]))
	{
		$g="INSERT INTO `eval_theory_ques`(`c_code`, `ques_num`, `co_level`, `type`, `max_marks`, `eval_num`) VALUES ('$course_code','4b','$bc4','Test','$bm4','$eval_num')";
		$g1=mysqli_query($connect,$g);
		if(!$g1)
		{
			echo "<script>
			alert('Could not enter into database! Try again later!');
			window.location.href='eval_pattern.php';
			</script>";
		}
		echo "<tr><td>4b</td><td>".$bc4."</td><td>".$bm4."</td></tr>";
	}
	if(isset($_POST["theory_present_4c"]))
	{
		$g="INSERT INTO `eval_theory_ques`(`c_code`, `ques_num`, `co_level`, `type`, `max_marks`, `eval_num`) VALUES ('$course_code','4c','$cc4','Test','$cm4','$eval_num')";
		$g1=mysqli_query($connect,$g);
		if(!$g1)
		{
			echo "<script>
			alert('Could not enter into database! Try again later!');
			window.location.href='eval_pattern.php';
			</script>";
		}
		echo "<tr><td>4c</td><td>".$cc4."</td><td>".$cm4."</td></tr>";
	}
	
	if(isset($_POST["theory_present_5a"]))
	{
		$g="INSERT INTO `eval_theory_ques`(`c_code`, `ques_num`, `co_level`, `type`, `max_marks`, `eval_num`) VALUES ('$course_code','5a','$ac5','Test','$am5','$eval_num')";
		$g1=mysqli_query($connect,$g);
		if(!$g1)
		{
			echo "<script>
			alert('Could not enter into database! Try again later!');
			window.location.href='eval_pattern.php';
			</script>";
		}
		echo "<tr><td>5a</td><td>".$ac5."</td><td>".$am5."</td></tr>";
	}
	if(isset($_POST["theory_present_5b"]))
	{
		$g="INSERT INTO `eval_theory_ques`(`c_code`, `ques_num`, `co_level`, `type`, `max_marks`, `eval_num`) VALUES ('$course_code','5b','$bc5','Test','$bm5','$eval_num')";
		$g1=mysqli_query($connect,$g);
		if(!$g1)
		{
			echo "<script>
			alert('Could not enter into database! Try again later!');
			window.location.href='eval_pattern.php';
			</script>";
		}
		echo "<tr><td>5b</td><td>".$bc5."</td><td>".$bm5."</td></tr>";
	}
	if(isset($_POST["theory_present_5c"]))
	{
		$g="INSERT INTO `eval_theory_ques`(`c_code`, `ques_num`, `co_level`, `type`, `max_marks`, `eval_num`) VALUES ('$course_code','5c','$cc5','Test','$cm5','$eval_num')";
		$g1=mysqli_query($connect,$g);
		if(!$g1)
		{
			echo "<script>
			alert('Could not enter into database! Try again later!');
			window.location.href='eval_pattern.php';
			</script>";
		}
		echo "<tr><td>5c</td><td>".$cc5."</td><td>".$cm5."</td></tr>";
	}
		if(!query_run || !query_run2)
		{
			echo "<script>
			alert('Could not enter into database! Try again later!');
			window.location.href='eval_pattern.php';
			</script>";
		}
		else
		{
			echo "<script>
			alert('Successfully created the pattern!');
			
			</script>";
		}
	}
	else
	{
		echo "<script>
		alert('Please enter all the fields!');
		window.location.href='eval_pattern.php';
		</script>";	
	}
}
/*else
{
	echo "<script>
	alert('Please enter all the fields!');
	window.location.href='eval_pattern.html';
	</script>";
}*/
mysqli_close();
?>
      
          </tbody>
        </table>
      </div>
			
        <br>
          
</div>
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
  <p class="fl_left"><a href="copy.html"><u>Copyright &copy;</u></a>2015 - Anisha J Prasad, Anusha M & Archana M R.</p></div>
<!-- JAVASCRIPTS --> 
<script src="layout/scripts/jquery.min.js"></script> 
<script src="layout/scripts/jquery.fitvids.min.js"></script> 
<script src="layout/scripts/jquery.mobilemenu.js"></script> 
<script src="layout/scripts/tabslet/jquery.tabslet.min.js"></script>
</body>
</html>
