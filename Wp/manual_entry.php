<?php
session_start();
if( !(isset($_SESSION['username'])) )
{	
echo "<script>alert('Please login to continue');</script>" ;
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
	

          <!-- ################################################################################################ -->
          <h2>Enter student details for test evaluation</h2>
<form action="manual_entry1.php" method="post">
	 <label>Student USN:</label>
                      <input type="text" class="form-control" name="student_usn" id="student_usn" placeholder="Enter student usn" required/>
                    <script>
					var co_code = new LiveValidation("student_usn");
                    co_code.add( Validate.Format, { pattern: /1RV\d\dIS[A-Z0-9]{3}$/i } );
					</script><br>
	<label>Course code:</label>
                      <select class="form-control" name="course_code" id="course_code">
					  <?php
					  $connect=mysqli_connect("localhost","root","root","co_mng") or die("Couldn't connect to database!");
						$username=$_SESSION["username"];
					  $q="SELECT `c_code` FROM `course` WHERE `t_un`='$username'";
					  $rr=mysqli_query($connect,$q);
					  while($rowres=mysqli_fetch_assoc($rr))
					  {
					  ?>
					  <option value="<?php echo $rowres["c_code"];?>" ><?php echo $rowres["c_code"];?></option>
                      
					<?php
					}
					?>
                      </select>
                    <script>
					var co_code = new LiveValidation('course_code');
                    co_code.add( Validate.Format, { pattern: /\d\dIS[A-Z0-9]{2,3}$/i } );
					</script><br>
	<label>Evaluation Number:</label>
                      <select class="form-control" name="eval_num" id="eval_num" required/>
					   <option value="" selected="selected"> </option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                      </select><br>
	<button type="submit" id="submit" href="te.php" class="button btn btn-success btn-large">Enter details</button>
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
<script src="js/livevalidation_standalone.js" type="text/javascript"></script>
<script src="layout/scripts/jquery.min.js"></script> 
<script src="layout/scripts/jquery.fitvids.min.js"></script> 
<script src="layout/scripts/jquery.mobilemenu.js"></script> 
<script src="layout/scripts/tabslet/jquery.tabslet.min.js"></script>
<script type="text/javascript">
function usnval() {
				var value = document.getElementById("student_usn").value;
				var reg =new RegExp("^[1][R][V][0-9][0-9][A-Z][A-Z][0-9][0-9][0-9]");
				if (!reg.test(value)) {
					alert("Value must be in format 1RVNNAANNN!Caps only!");
					return false;
				}
				}
				function validate() {
				var value = document.getElementById("course_code").value;
				var reg =new RegExp("^[0-9][0-9][A-Z][A-Z][A-Z0-9]{2,3}");
				if (!reg.test(value)) {
					alert("Value must be in format NNAANNN!");
					return false;
				}
				}
</script>
</body>
</html>
