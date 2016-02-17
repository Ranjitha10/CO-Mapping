<?php
session_start();
if( !(isset($_SESSION['username'])) )
{	echo "<script>alert('Please login to continue');</script>" ;
	header("Location: index.php");
}
$connect=mysqli_connect("localhost","root","root","co_mng") or die("Couldn't connect to database!");
$cc=$_POST["course_code"];
$en=$_POST["eval_num"];
$uname=$_SESSION["username"];
$h="SELECT `c_code_eval`,`eval_num` FROM `evaluation` WHERE `c_code_eval`='$cc' && `eval_num`='$en'";
$hr=mysqli_query($connect,$h);
$l=mysqli_fetch_assoc($hr);
if(!$l)
{
			echo "<script>
			alert('Evaluation pattern does not exist. Please enter!');
			window.location.href='eval_pattern.php';
			</script>";
}
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
			$query="SELECT `fname` FROM `faculty` WHERE `username`='$uname'";
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
		 <li><a class="active" href="report.php">Report Generation</a></li>
		 
        
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
     
		 <h2>Report for <?php $q="SELECT `cname` FROM `course` WHERE `c_code`='$cc' && `t_un`='$uname'";
                             $result=mysqli_query($connect,$q);
                             $row=mysqli_fetch_assoc($result);
							 echo $row["cname"];?> 
			- Evaluation no. <?php echo $en;?></h2>
                       
		    <p>Faculty Incharge - <?php 
			$query="SELECT `fname`, `lname` FROM `faculty` WHERE `username`='$uname'";
			$result=mysqli_query($connect,$query);
			$row=mysqli_fetch_assoc($result);
			echo  $row["fname"] . " " . $row["lname"];
			?>
			</p>
						
						<div class="box">
            <div class="box-body">
			    <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Student USN</th>
                        <th>CO1</th>
						<th>CO2</th>
						<th>CO3</th>
						<th>CO4</th>
						
                      </tr>
                    </thead>
                    <tbody>
			<!--see line 14 for usn and line 40 for co1, line 68 for co2, line 96 for co3, line 124 for co4-->
			<?php
			//SELECT `c_code_attain`, `co_level`, `req_marks`, `coobj` FROM `attainment` WHERE 1
			
			$qu="SELECT DISTINCT `usn` FROM `stu_attainment` WHERE `c_code_attain`='$cc' && `eval_num_appear`='$en'";
            $res=mysqli_query($connect,$qu);
while($ro=mysqli_fetch_assoc($res))
{
$u=$ro["usn"];
$val=0;
$maxval=0;
//echo $u;
$w="INSERT INTO `excel`(`usn`, `co1`, `co2`, `co3`, `co4`) VALUES ('$u','0','0','0','0')";
$row=mysqli_query($connect,$w);
//select question numbers which has CO1
$q="SELECT `ques_num`,`max_marks` FROM `eval_questions` WHERE `co_level`='CO1' && `c_code_evq`='$cc' && `eval_num`='$en'";
$q2="SELECT `ques_num`,`max_marks` FROM `eval_theory_ques` WHERE `co_level`='CO1' && `c_code`='$cc' && `eval_num`='$en'";
$result=mysqli_query($connect,$q);
$result2=mysqli_query($connect,$q2);
while($row=mysqli_fetch_assoc($result))
{
	$maxval=$maxval+$row["max_marks"];
$qn=$row["ques_num"];
$q2="SELECT `marks_scored` FROM `stu_attainment` WHERE `c_code_attain`='$cc' && `eval_num_appear`='$en' && `ques_num_appear`='$qn' && `usn`='$u'";
$rr=mysqli_query($connect,$q2);
$rowres=mysqli_fetch_assoc($rr);
$val=$val+$rowres["marks_scored"];
}
while($row=mysqli_fetch_assoc($result2))
{
	$maxval=$maxval+$row["max_marks"];
	$qn=$row["ques_num"];
$q2="SELECT `marks_scored` FROM `stu_attainment` WHERE `c_code_attain`='$cc' && `eval_num_appear`='$en' && `ques_num_appear`='$qn' && `usn`='$u'";
$rr=mysqli_query($connect,$q2);
$rowres=mysqli_fetch_assoc($rr);
$val=$val+$rowres["marks_scored"];
}
$perco1=$val*100/$maxval;
$percoo1=round($perco1,2);
$w="UPDATE `excel` SET `co1`='$percoo1' WHERE `usn`='$u'";
$row=mysqli_query($connect,$w);
//echo $perco1;

$val2=0;
$maxval2=0;
//select question numbers which has CO2
$q="SELECT `ques_num`,`max_marks` FROM `eval_questions` WHERE `co_level`='CO2' && `c_code_evq`='$cc' && `eval_num`='$en'";
$q2="SELECT `ques_num`,`max_marks` FROM `eval_theory_ques` WHERE `co_level`='CO2' && `c_code`='$cc' && `eval_num`='$en'";
$result=mysqli_query($connect,$q);
$result2=mysqli_query($connect,$q2);
while($row=mysqli_fetch_assoc($result))
{
	$maxval2=$maxval2+$row["max_marks"];
$qn=$row["ques_num"];
$q2="SELECT `marks_scored` FROM `stu_attainment` WHERE `c_code_attain`='$cc' && `eval_num_appear`='$en' && `ques_num_appear`='$qn' && `usn`='$u'";
$rr=mysqli_query($connect,$q2);
$rowres=mysqli_fetch_assoc($rr);
$val2=$val2+$rowres["marks_scored"];
}
while($row=mysqli_fetch_assoc($result2))
{
	$maxval2=$maxval2+$row["max_marks"];
	$qn=$row["ques_num"];
$q2="SELECT `marks_scored` FROM `stu_attainment` WHERE `c_code_attain`='$cc' && `eval_num_appear`='$en' && `ques_num_appear`='$qn' && `usn`='$u'";
$rr=mysqli_query($connect,$q2);
$rowres=mysqli_fetch_assoc($rr);
$val2=$val2+$rowres["marks_scored"];
}
$perco2=$val2*100/$maxval2;
$percoo2=round($perco2,2);
//echo $perco2;
$w="UPDATE `excel` SET `co2`='$percoo2' WHERE `usn`='$u'";
$row=mysqli_query($connect,$w);

$val3=0;
$maxval3=0;
//select question numbers which has CO3
$q="SELECT `ques_num`,`max_marks` FROM `eval_questions` WHERE `co_level`='CO3' && `c_code_evq`='$cc' && `eval_num`='$en'";
$q2="SELECT `ques_num`,`max_marks` FROM `eval_theory_ques` WHERE `co_level`='CO3' && `c_code`='$cc' && `eval_num`='$en'";
$result=mysqli_query($connect,$q);
$result2=mysqli_query($connect,$q2);
while($row=mysqli_fetch_assoc($result))
{
	$maxval3=$maxval3+$row["max_marks"];
$qn=$row["ques_num"];
$q2="SELECT `marks_scored` FROM `stu_attainment` WHERE `c_code_attain`='$cc' && `eval_num_appear`='$en' && `ques_num_appear`='$qn' && `usn`='$u'";
$rr=mysqli_query($connect,$q2);
$rowres=mysqli_fetch_assoc($rr);
$val3=$val3+$rowres["marks_scored"];
}
while($row=mysqli_fetch_assoc($result2))
{
	$maxval3=$maxval3+$row["max_marks"];
	$qn=$row["ques_num"];
$q2="SELECT `marks_scored` FROM `stu_attainment` WHERE `c_code_attain`='$cc' && `eval_num_appear`='$en' && `ques_num_appear`='$qn' && `usn`='$u'";
$rr=mysqli_query($connect,$q2);
$rowres=mysqli_fetch_assoc($rr);
$val3=$val3+$rowres["marks_scored"];
}
$perco3=$val3*100/$maxval3;
$percoo3=round($perco3,2);
//echo $perco3;
$w="UPDATE `excel` SET `co3`='$percoo3' WHERE `usn`='$u'";
$row=mysqli_query($connect,$w);

$val4=0;
$maxval4=0;
//select question numbers which has CO4
$q="SELECT `ques_num`,`max_marks` FROM `eval_questions` WHERE `co_level`='CO4' && `c_code_evq`='$cc' && `eval_num`='$en'";
$q2="SELECT `ques_num`,`max_marks` FROM `eval_theory_ques` WHERE `co_level`='CO4' && `c_code`='$cc' && `eval_num`='$en'";
$result=mysqli_query($connect,$q);
$result2=mysqli_query($connect,$q2);
while($row=mysqli_fetch_assoc($result))
{
	$maxval4=$maxval4+$row["max_marks"];
$qn=$row["ques_num"];
$q2="SELECT `marks_scored` FROM `stu_attainment` WHERE `c_code_attain`='$cc' && `eval_num_appear`='$en' && `ques_num_appear`='$qn' && `usn`='$u'";
$rr=mysqli_query($connect,$q2);
$rowres=mysqli_fetch_assoc($rr);
$val4=$val4+$rowres["marks_scored"];
}
while($row=mysqli_fetch_assoc($result2))
{
	$maxval4=$maxval4+$row["max_marks"];
	$qn=$row["ques_num"];
$q2="SELECT `marks_scored` FROM `stu_attainment` WHERE `c_code_attain`='$cc' && `eval_num_appear`='$en' && `ques_num_appear`='$qn' && `usn`='$u'";
$rr=mysqli_query($connect,$q2);
$rowres=mysqli_fetch_assoc($rr);
$val4=$val4+$rowres["marks_scored"];
}
$perco4=$val4*100/$maxval4;
$percoo4=round($perco4,2);
$w="UPDATE `excel` SET `co4`='$percoo4' WHERE `usn`='$u'";
$row=mysqli_query($connect,$w);
//echo $perco4;

 echo "<tr>
                    <td>".$u."</td>
					<td>".$percoo1."%"."</td>
					<td>".$percoo2."%"."</td>
					<td>".$percoo3."%"."</td>
					<td>".$percoo4."%"."</td></tr>";


}

$cc1=0;
$cc2=0;
$cc3=0;
$cc4=0;
$n=0;
$query="SELECT `co1`, `co2`, `co3`, `co4` FROM `excel`";
      $result=mysqli_query($connect,$query);
      while($row=mysqli_fetch_assoc($result)) {
       $cc1= $cc1 + $row["co1"];
       $cc2= $cc2 + $row["co2"];
       $cc3= $cc3 + $row["co3"];
       $cc4= $cc4 + $row["co4"];
     $n++;
      }
$cc1= $cc1/$n;
$cc2= $cc2/$n;
$cc3= $cc3/$n;
$cc4= $cc4/$n;

$q="INSERT INTO `total`(`co_code`, `co1`, `co2`, `co3`, `co4`) VALUES ('$cc','$cc1','$cc2','$cc3','$cc4')";
$row=mysqli_query($connect,$q);
if(!($q)) {
  echo "failed!";
}

?>
				

                    </tbody>
                   
                  </table>
				  </div><!-- /.box-body -->
              </div><!-- /.box -->
          <div class="box">
            <div class="box-body">
			    <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>CO Level</th>
                        <th>Outcome</th>
                      </tr>
                    </thead>
                    <tbody>
<?php
$t1="SELECT `co_level`,`coobj` FROM `attainment` WHERE `c_code_attain`='$cc'";
$t=mysqli_query($connect,$t1);
while($coo=mysqli_fetch_assoc($t))
{
echo "<tr>
                    <td>".$coo['co_level']."</td>
					<td>".$coo['coobj']."</td>
					</tr>";
					}

?>	
</tbody>	
</table>			

            </div><!-- /.col (RIGHT) -->
          </div><!-- /.row -->
<form action="export.php" method="post">         
<button type="submit" style="width:120px" class="btn btn-round btn-success" id="submit">Download report</button>
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
