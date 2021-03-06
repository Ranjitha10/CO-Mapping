<?php
session_start();
if( !(isset($_SESSION['username'])) )
{	
	echo "<script>alert('Please login to continue');</script>" ;
	//header("Location: index.php");
}
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
     <h2> CO Attainment requirements </h2>
<form action="co_attain.php" method="post">

                      <label>Course code</label>
					   <select class="form-control" name="co_code" id="co_code">
					<?php
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
					  <br>
					  <div class="scrollable">
        <table>
          <thead>
            <tr>
              <th>CO number</th>
              <th>Course Outcome</th>
              <th>Minimum %</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td><input type="text" class="form-control" id="co_obj1" name="co_obj1" placeholder="" required/></td>
              <td><input type="number" min="1" max="100" class="form-control" id="co1%" name="co1%" placeholder=".co-%" required/></td>
            </tr>
            <tr>
              <td>2</td>
              <td><input type="text" class="form-control" id="co_obj2" name="co_obj2" placeholder="" required/></td>
              <td><input type="number" min="1" max="100" class="form-control" id="co2%" name="co2%" placeholder=".co-%" required/></td>
            </tr>
            <tr>
              <td>3</td>
              <td><input type="text" class="form-control" id="co_obj3" name="co_obj3" placeholder="" required/></td>
              <td><input type="number" min="1" max="100" class="form-control" id="co3%" name="co3%" placeholder=".co-%" required/></td>
            </tr>
            <tr>
              <td>4</td>
              <td><input type="text" class="form-control" id="co_obj4" name="co_obj4" placeholder="" required/></td>
              <td><input type="number" min="1" max="100" class="form-control" id="co4%" name="co4%" placeholder=".co-%" required/></td>
            </tr>
          </tbody>
        </table>
      </div>
			
					<button type="submit" class="button btn btn-success btn-large">Submit</button>
					</form><br>
          
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

<?php
error_reporting(0);
$connect=mysqli_connect("localhost","root","root","co_mng") or die("Couldn't connect to database!");
if(isset($_POST["co_code"]) && isset($_POST["co_obj1"]) && isset($_POST["co_obj2"]) && isset($_POST["co_obj3"])  && isset($_POST["co_obj4"]))
{
	$uname=$_SESSION["username"];
	$cocode=$_POST["co_code"];
	$cj1=$_POST["co_obj1"];
	$cj2=$_POST["co_obj2"];
	$cj3=$_POST["co_obj3"];
	$cj4=$_POST["co_obj4"];
	$co_1=$_POST["co1%"];
	$co_2=$_POST["co2%"];
	$co_3=$_POST["co3%"];
	$co_4=$_POST["co4%"];
	$x="CO1";
	$y="CO2";
	$z="CO3";
	$w="CO4";
	
	if(isset($_POST["co_code"]) && isset($_POST["co_obj1"]) && isset($_POST["co_obj2"]) && isset($_POST["co_obj3"]) && isset($_POST["co_obj4"]))
	{
	$y="UPDATE `attainment` SET `coobj`='$cj1' WHERE `co_level`='CO1' && `c_code_attain`='$cocode'";
	$r=mysqli_query($connect,$y);
	$y="UPDATE `attainment` SET `coobj`='$cj2' WHERE `co_level`='CO2' && `c_code_attain`='$cocode'";
	$r=mysqli_query($connect,$y);
	$y="UPDATE `attainment` SET `coobj`='$cj3' WHERE `co_level`='CO3' && `c_code_attain`='$cocode'";
	$r=mysqli_query($connect,$y);
	$y="UPDATE `attainment` SET `coobj`='$cj4' WHERE `co_level`='CO4' && `c_code_attain`='$cocode'";
	$r=mysqli_query($connect,$y);
	$q="SELECT `c_code_attain` FROM `attainment` WHERE `c_code_attain`='$cocode'";
	$r=mysqli_query($connect,$q);
	$rowres=mysqli_fetch_assoc($r);
	if($rowres)
	{
	echo "<script>
			alert('Attainment details already entered!');
			window.location.href='co_attain.php';
			</script>";
	}
	else
	{
	$t="SELECT `cname` FROM `course` WHERE `t_un`='$uname' && `c_code`='$cocode'";
	$res=mysqli_query($connect,$t);
	$rowres=mysqli_fetch_assoc($res);
	if(!$rowres)
	{
			echo "<script>
			alert('You do not handle the course.Cannot enter attainment details!');
			window.location.href='co_attain.php';
			</script>";
	}
	else
	{
		$q="INSERT INTO `course`(`c_code`, `cname`, `t_un`) VALUES ('$cocode','$coname','$uname')";
		$query="INSERT INTO `attainment`(`c_code_attain`, `co_level`, `req_marks`) VALUES ('$cocode','$x','$co_1')";
		$query1="INSERT INTO `attainment`(`c_code_attain`, `co_level`, `req_marks`) VALUES ('$cocode','$y','$co_2')";
		$query2="INSERT INTO `attainment`(`c_code_attain`, `co_level`, `req_marks`) VALUES ('$cocode','$z','$co_3')";
		$query3="INSERT INTO `attainment`(`c_code_attain`, `co_level`, `req_marks`) VALUES ('$cocode','$w','$co_4')";
		$query_run=mysqli_query($connect,$q);
		$query_run1=mysqli_query($connect,$query);
		$query_run2=mysqli_query($connect,$query1);
		$query_run3=mysqli_query($connect,$query2);
		$query_run4=mysqli_query($connect,$query3);
		if((!query_run1) || (!query_run2) || (!query_run3) || (!query_run4) || (!query_run))
		{
			echo "<script>
			alert('Could not enter into database! Try again later!');
			window.location.href='co_attain.php';
			</script>";
		}
		else
		{
			echo "<script>
			alert('Successfully entered!');
			window.location.href='co_attain.php';
			</script>";
		}
	}
	}
}}

?>


</body>
</html>
