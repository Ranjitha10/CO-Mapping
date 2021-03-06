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
            <li><a href="test1.php">View test pattern</a></li>
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

<form action="test.php" method="post">
<div class="wrapper row3">
  <div class="rounded">
    <main class="container clear"> 
      <!-- main body --> 
      <!-- ################################################################################################ -->
      <div class="group btmspace-30"> 
        <!-- Left Column -->
        <div class="one_half first"> 

          <!-- ################################################################################################ -->
     
		 <h2>New Evaluation Paper</h2>
                       <label>Course code:</label>
                      <select name="co_code" id="co_code">
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
		<label>Evaluation Number:</label>
                      <select class="form-control" name="eval_num" id="eval_num">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                      </select>
		<label>Date of evaluation:</label>
		<input type="text" id="date_eval" name="date_eval" placeholder="yyyy/mm/dd" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask/>
		<label>Time of evaluation:</label>
		 <input type="text" id="time" name="time" placeholder="hh:mm xm" class="form-control timepicker"/>
		 
		 <div id="quiz_head">
		 <label>Number of quiz questions:</label> 
                                  <select class="form-control" name="no_of_quiz" id="no_of_quiz">
								  <option value="" selected="selected"> </option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                    <option value="13">13</option>
                                    <option value="14">14</option>
                                    <option value="15">15</option>
                                  </select>
		 </div>
		 <div id="quiz_paper_heading">
		 <h2>Quiz Paper Format:</h2>
                              <table id="quiz_questions">
                                <thead>
                                  <tr>
                                    <th>Question Number</th>
                                    <th>Maximum Marks</th>
                                    <th>Course Outcome</th>
                                  </tr>
                                </thead>
                                <tbody id="quiz_table_body">
                                </tbody>
                              </table>
		 </div>
		 <div id="theory_heading">
		 <h2>Theory Paper Format:</h2>
                              <table id="theory_questions">
                                <thead>
                                  <tr>
                                    <th>Question Number</th>
                                    <th>Is Question Present</th>
                                    <th>Maximum Marks</th>
                                    <th>Course Outcome</th>
                                  </tr>
                                </thead>
				<tbody id="theory_table_body">
                                  <tr>
                                    <td>1a</td>
                                    <td>
                                      <div class="col-sm-1 text-center">
                                          <div class="form-group">
											<label>
                                               <input type="checkbox" name="theory_present_1a" value="1" checked="true" >
											   </label>
											   </div>
                                          </div>
                                    </td>
                                    <td><input type="number" min="0" max="10" name="theory_marks_1a" class="form-control" required></td>
                                    <td>
                                      <select class="form-control" name="theory_co_1a" id="theory_co_1a">
                                        <option value="CO1">CO-1</option>
                                        <option value="CO2">CO-2</option>
                                        <option value="CO3">CO-3</option>
                                        <option value="CO4">CO-4</option>
                                      </select>
                                    </td>
                                  </tr>
                                  
                                  <tr>
                                    <td>1b</td>
                                    <td>
                                      <div class="col-sm-1 text-center">
                                          <div class="switch switch-square"
                                               data-on-label="<i class=' fa fa-check'></i>"
                                               data-off-label="<i class='fa fa-times'></i>">
                                              <input type="checkbox" name="theory_present_1b" value="1" />
                                          </div>
                                      </div>
                                    </td>
                                    <td><input type="number" min="0" max="10" name="theory_marks_1b" class="form-control"></td>
                                    <td>
                                      <select class="form-control" name="theory_co_1b" id="theory_co_1b">
                                        <option value="CO1">CO-1</option>
                                        <option value="CO2">CO-2</option>
                                        <option value="CO3">CO-3</option>
                                        <option value="CO4">CO-4</option>
                                      </select>
                                    </td>
                                  </tr>
                                  
                                  <tr>
                                    <td>1c</td>
                                    <td>
                                      <div class="col-sm-1 text-center">
                                          <div class="switch switch-square"
                                               data-on-label="<i class=' fa fa-check'></i>"
                                               data-off-label="<i class='fa fa-times'></i>">
                                              <input type="checkbox" name="theory_present_1c" value="1" />
                                          </div>
                                      </div>
                                    </td>
                                    <td><input type="number" min="0" max="10" name="theory_marks_1c" class="form-control"></td>
                                    <td>
                                      <select class="form-control" name="theory_co_1c" id="theory_co_1c">
                                        <option value="CO1">CO-1</option>
                                        <option value="CO2">CO-2</option>
                                        <option value="CO3">CO-3</option>
                                        <option value="CO4">CO-4</option>
                                      </select>
                                    </td>
                                  </tr>

                                  <tr><td colspan="4"></td></tr>

                                  <tr>
                                    <td>2a</td>
                                    <td>
                                      <div class="col-sm-1 text-center">
                                          <div class="switch switch-square"
                                               data-on-label="<i class=' fa fa-check'></i>"
                                               data-off-label="<i class='fa fa-times'></i>">
                                              <input type="checkbox" name="theory_present_2a" value="1" checked="true" >
                                          </div>
                                      </div>
                                    </td>
                                    <td><input type="number" min="0" max="10" name="theory_marks_2a" class="form-control" required></td>
                                    <td>
                                      <select class="form-control" name="theory_co_2a" id="theory_co_2a">
                                        <option value="CO1">CO-1</option>
                                        <option value="CO2">CO-2</option>
                                        <option value="CO3">CO-3</option>
                                        <option value="CO4">CO-4</option>
                                      </select>
                                    </td>
                                  </tr>
                                  
                                  <tr>
                                    <td>2b</td>
                                    <td>
                                      <div class="col-sm-1 text-center">
                                          <div class="switch switch-square"
                                               data-on-label="<i class=' fa fa-check'></i>"
                                               data-off-label="<i class='fa fa-times'></i>">
                                              <input type="checkbox" name="theory_present_2b" value="1" />
                                          </div>
                                      </div>
                                    </td>
                                    <td><input type="number" min="0" max="10" name="theory_marks_2b" class="form-control"></td>
                                    <td>
                                      <select class="form-control" name="theory_co_2b" id="theory_co_2b">
                                        <option value="CO1">CO-1</option>
                                        <option value="CO2">CO-2</option>
                                        <option value="CO3">CO-3</option>
                                        <option value="CO4">CO-4</option>
                                      </select>
                                    </td>
                                  </tr>
                                  
                                  <tr>
                                    <td>2c</td>
                                    <td>
                                      <div class="col-sm-1 text-center">
                                          <div class="switch switch-square"
                                               data-on-label="<i class=' fa fa-check'></i>"
                                               data-off-label="<i class='fa fa-times'></i>">
                                              <input type="checkbox" name="theory_present_2c" value="1" />
                                          </div>
                                      </div>
                                    </td>
                                    <td><input type="number" min="0" max="10" name="theory_marks_2c" class="form-control"></td>
                                    <td>
                                      <select class="form-control" name="theory_co_2c" id="theory_co_2c">
                                        <option value="CO1">CO-1</option>
                                        <option value="CO2">CO-2</option>
                                        <option value="CO3">CO-3</option>
                                        <option value="CO4">CO-4</option>
                                      </select>
                                    </td>
                                  </tr>

                                  <tr><td colspan="4"></td></tr>

                                  <tr>
                                    <td>3a</td>
                                    <td>
                                      <div class="col-sm-1 text-center">
                                          <div class="switch switch-square"
                                               data-on-label="<i class=' fa fa-check'></i>"
                                               data-off-label="<i class='fa fa-times'></i>">
                                              <input type="checkbox" name="theory_present_3a" value="1" checked="true" >
                                          </div>
                                      </div>
                                    </td>
                                    <td><input type="number" min="0" max="10" name="theory_marks_3a" class="form-control" required></td>
                                    <td>
                                      <select class="form-control" name="theory_co_3a" id="theory_co_3a">
                                        <option value="CO1">CO-1</option>
                                        <option value="CO2">CO-2</option>
                                        <option value="CO3">CO-3</option>
                                        <option value="CO4">CO-4</option>
                                      </select>
                                    </td>
                                  </tr>
                                  
                                  <tr>
                                    <td>3b</td>
                                    <td>
                                      <div class="col-sm-1 text-center">
                                          <div class="switch switch-square"
                                               data-on-label="<i class=' fa fa-check'></i>"
                                               data-off-label="<i class='fa fa-times'></i>">
                                              <input type="checkbox" name="theory_present_3b" value="1" />
                                          </div>
                                      </div>
                                    </td>
                                    <td><input type="number" min="0" max="10" name="theory_marks_3b" class="form-control"></td>
                                    <td>
                                      <select class="form-control" name="theory_co_3b" id="theory_co_3b">
                                        <option value="CO1">CO-1</option>
                                        <option value="CO2">CO-2</option>
                                        <option value="CO3">CO-3</option>
                                        <option value="CO4">CO-4</option>
                                      </select>
                                    </td>
                                  </tr>
                                  
                                  <tr>
                                    <td>3c</td>
                                    <td>
                                      <div class="col-sm-1 text-center">
                                          <div class="switch switch-square"
                                               data-on-label="<i class=' fa fa-check'></i>"
                                               data-off-label="<i class='fa fa-times'></i>">
                                              <input type="checkbox" name="theory_present_3c" value="1" />
                                          </div>
                                      </div>
                                    </td>
                                    <td><input type="number" min="0" max="10" name="theory_marks_3c" class="form-control"></td>
                                    <td>
                                      <select class="form-control" name="theory_co_3c" id="theory_co_3c">
                                        <option value="CO1">CO-1</option>
                                        <option value="CO2">CO-2</option>
                                        <option value="CO3">CO-3</option>
                                        <option value="CO4">CO-4</option>
                                      </select>
                                    </td>
                                  </tr>

                                  <tr><td colspan="4"></td></tr>

                                  <tr>
                                    <td>4a</td>
                                    <td>
                                      <div class="col-sm-1 text-center">
                                          <div class="switch switch-square"
                                               data-on-label="<i class=' fa fa-check'></i>"
                                               data-off-label="<i class='fa fa-times'></i>">
                                              <input type="checkbox" name="theory_present_4a" value="1" checked="true" >
                                          </div>
                                      </div>
                                    </td>
                                    <td><input type="number" min="0" max="10" name="theory_marks_4a" class="form-control" required></td>
                                    <td>
                                      <select class="form-control" name="theory_co_4a" id="theory_co_4a">
                                        <option value="CO1">CO-1</option>
                                        <option value="CO2">CO-2</option>
                                        <option value="CO3">CO-3</option>
                                        <option value="CO4">CO-4</option>
                                      </select>
                                    </td>
                                  </tr>
                                  
                                  <tr>
                                    <td>4b</td>
                                    <td>
                                      <div class="col-sm-1 text-center">
                                          <div class="switch switch-square"
                                               data-on-label="<i class=' fa fa-check'></i>"
                                               data-off-label="<i class='fa fa-times'></i>">
                                              <input type="checkbox" name="theory_present_4b" value="1" />
                                          </div>
                                      </div>
                                    </td>
                                    <td><input type="number" min="0" max="10" name="theory_marks_4b" class="form-control"></td>
                                    <td>
                                      <select class="form-control" name="theory_co_4b" id="theory_co_4b">
                                        <option value="CO1">CO-1</option>
                                        <option value="CO2">CO-2</option>
                                        <option value="CO3">CO-3</option>
                                        <option value="CO4">CO-4</option>
                                      </select>
                                    </td>
                                  </tr>
                                  
                                  <tr>
                                    <td>4c</td>
                                    <td>
                                      <div class="col-sm-1 text-center">
                                          <div class="switch switch-square"
                                               data-on-label="<i class=' fa fa-check'></i>"
                                               data-off-label="<i class='fa fa-times'></i>">
                                              <input type="checkbox" name="theory_present_4c" value="1" />
                                          </div>
                                      </div>
                                    </td>
                                    <td><input type="number" min="0" max="10" name="theory_marks_4c" class="form-control"></td>
                                    <td>
                                      <select class="form-control" name="theory_co_4c" id="theory_co_4c">
                                        <option value="CO1">CO-1</option>
                                        <option value="CO2">CO-2</option>
                                        <option value="CO3">CO-3</option>
                                        <option value="CO4">CO-4</option>
                                      </select>
                                    </td>
                                  </tr>

                                  <tr><td colspan="4"></td></tr>

                                  <tr>
                                    <td>5a</td>
                                    <td>
                                      <div class="col-sm-1 text-center">
                                          <div class="switch switch-square"
                                               data-on-label="<i class=' fa fa-check'></i>"
                                               data-off-label="<i class='fa fa-times'></i>">
                                              <input type="checkbox" name="theory_present_5a" value="1" checked="true" >
                                          </div>
                                      </div>
                                    </td>
                                    <td><input type="number" min="0" max="10" name="theory_marks_5a" class="form-control" required></td>
                                    <td>
                                      <select class="form-control" name="theory_co_5a" id="theory_co_5a">
                                        <option value="CO1">CO-1</option>
                                        <option value="CO2">CO-2</option>
                                        <option value="CO3">CO-3</option>
                                        <option value="CO4">CO-4</option>
                                      </select>
                                    </td>
                                  </tr>
                                  
                                  <tr>
                                    <td>5b</td>
                                    <td>
                                      <div class="col-sm-1 text-center">
                                          <div class="switch switch-square"
                                               data-on-label="<i class=' fa fa-check'></i>"
                                               data-off-label="<i class='fa fa-times'></i>">
                                              <input type="checkbox" name="theory_present_5b" value="1" />
                                          </div>
                                      </div>
                                    </td>
                                    <td><input type="number" min="0" max="10" name="theory_marks_5b" class="form-control"></td>
                                    <td>
                                      <select class="form-control" name="theory_co_5b" id="theory_co_5b">
                                        <option value="CO1">CO-1</option>
                                        <option value="CO2">CO-2</option>
                                        <option value="CO3">CO-3</option>
                                        <option value="CO4">CO-4</option>
                                      </select>
                                    </td>
                                  </tr>
                                  
                                  <tr>
                                    <td>5c</td>
                                    <td>
                                      <div class="col-sm-1 text-center">
                                          <div class="switch switch-square"
                                               data-on-label="<i class=' fa fa-check'></i>"
                                               data-off-label="<i class='fa fa-times'></i>">
                                              <input type="checkbox" name="theory_present_5c" value="1" />
                                          </div>
                                      </div>
                                    </td>
                                    <td><input type="number" min="0" max="10" name="theory_marks_5c" class="form-control"></td>
                                    <td>
                                      <select class="form-control" name="theory_co_5c" id="theory_co_5c">
                                        <option value="CO1">CO-1</option>
                                        <option value="CO2">CO-2</option>
                                        <option value="CO3">CO-3</option>
                                        <option value="CO4">CO-4</option>
                                      </select>
                                    </td>
                                  </tr>
                                  
                                </tbody>
                              </table> 
		</div>
		<button type="submit" id="submit" href="eval_pattern.php">Create paper</button>
		 </div>				
          

    </div>
  </div>
  </main>
</div>
<script src="layout/scripts/jquery.min.js"></script> 
<script src="layout/scripts/jquery.fitvids.min.js"></script> 
<script src="layout/scripts/jquery.mobilemenu.js"></script> 
<script src="layout/scripts/tabslet/jquery.tabslet.min.js"></script>
		<script src="http://code.jquery.com/ui/1.11.2/jquery-ui.min.js" type="text/javascript"></script>
		<script type="text/javascript">
      $(document).ready(function() {
        $("#co_code").prop("selectedIndex", -1);
        $("#eval_num").prop("selectedIndex", -1);
		$("#date_eval").prop("selectedIndex", -1);
		$("#time").prop("selectedIndex", -1);
        console.log("set default dropdown value to -1");
        $("#quiz_questions").hide();
		$("#quiz_head").hide();
		$("#no_of_quiz").hide();
        $("#quiz_paper_heading").hide();
        $("#submit").hide();
        $("#theory_questions").hide();
        $("#theory_heading").hide();

          $("#time").change(function() {
          $("#quiz_head").show();
          $("#no_of_quiz").show();
		  
		  
		  $("#no_of_quiz").change(function() {
		  $("#quiz_questions").show();
          $("#quiz_paper_heading").show();
		  
		  
          $("#quiz_table_body").html("");
          var row = "<tr><td>"; "</td><td></td><td></td>";
          var questions = parseInt($($($(this))).val());
		  //var r = '<form method="post" action="eval-pattern2.php">';
          for (var i = 1; i <= questions; i++) {
            var r1 = "<tr><td>" + i.toString() + "</td>";
            var r2 = '<td><input type="number" min="1" max="2" name="qmark'+ i.toString() + '" class="form-control" required></td>';
            var r3 = '<td><select name="qco'+ i.toString() + '" class="form-control" required>';
            var r4 = '<option value="CO1">CO-1</option>';
            var r5 = '<option value="CO2">CO-2</option>';
            var r6 = '<option value="CO3">CO-3</option>';
            var r7 = '<option value="CO4">CO-4</option>';
            var r8 = '</select></td></tr>';
            $($($("#quiz_table_body"))).append(r1+r2+r3+r4+r5+r6+r7+r8);
          };
		  //var rr='</form>';
          console.log(questions);

          $("#theory_questions").show();
          $("#theory_heading").show();
          $("#submit").show();
        });
      });
	  });
    </script>
		</form>
<!-- ################################################################################################ --> 
<!-- ################################################################################################ --> 
<!-- ################################################################################################ -->
<!-- ################################################################################################ --> 
<!-- ################################################################################################ --> 
<!-- ################################################################################################ -->
<div class="wrapper row4">
  <!--<div class="rounded">-->
  <p class="fl_left"><a href="copy.html"><u>Copyright &copy;</u></a>2015 - Anisha J Prasad, Anusha M & Archana M R.</p></div>

<?php
error_reporting(0);
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
		
		for ($x = 1; $x <= $noofquiz; $x++) {
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

</body>
</html>
