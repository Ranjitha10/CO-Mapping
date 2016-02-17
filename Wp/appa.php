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
        
        
        <h2> Evaluation pattern </h2>
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
error_reporting(0);
$connect=mysqli_connect("localhost","root","root","co_mng") or die("Couldn't connect to database!");
$course_code=$_POST["co_code"];
$eval_num=$_POST["eval_num"];
$query="SELECT `ques_num`, `co_level`, `max_marks` FROM `eval_questions` WHERE `c_code_evq`='$course_code' && `eval_num`='$eval_num'";
			$result=mysqli_query($connect,$query);
			$row=mysqli_fetch_assoc($result);
			echo  "<tr><td>".$row["ques_num"]."</td><td>".$row["co_level"]."</td><td>".$row["max_marks]."</td></tr>" ;
$query="SELECT `ques_num`, `co_level`,`max_marks` FROM `eval_theory_ques` WHERE `c_code`='$course_code' && `eval_num`='$eval_num'";
			$result=mysqli_query($connect,$query);
			$row=mysqli_fetch_assoc($result);
			echo  "<tr><td>".$row["ques_num"]."</td><td>".$row["co_level"]."</td><td>".$row["max_marks]."</td></tr>" ;
?>
        </tbody>
        </table>
        
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
