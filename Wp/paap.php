<?php
error_reporting(0);
$connect=mysqli_connect("localhost","root","root","co_mng") or die("Couldn't connect to database!");
session_start();
if( !(isset($_SESSION['username'])) )
{	
	echo "<script>alert('Please login to continue');</script>" ;
	header("Location: index.php");
}
error_reporting(0);
$connect=mysqli_connect("localhost","root","root","co_mng") or die("Couldn't connect to database!");
$username=$_SESSION["username"];

$course_code=$_POST["co_code"];
$eval_num=$_POST["eval_num"];
?>

<!DOCTYPE html>
<html>
<head>
<title>RVCE CO Mapping</title>
<meta charset="utf-8">
<meta name="view port" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<style>
.container {width: 960px; margin: 0 auto; overflow: hidden;}

#content {	float: left; width: 100%;}

.post { margin: 0 auto; padding-bottom: 50px; float: left; width: 960px; }

.btn-sign {
	width:460px;
	margin-bottom:20px;
	margin:0 auto;
	padding:20px;
	border-radius:5px;
	background: -moz-linear-gradient(center top, #00c6ff, #018eb6);
    background: -webkit-gradient(linear, left top, left bottom, from(#00c6ff), to(#018eb6));
	background:  -o-linear-gradient(top, #00c6ff, #018eb6);
    filter: progid:DXImageTransform.Microsoft.gradient(startColorStr='#00c6ff', EndColorStr='#018eb6');
	text-align:center;
	font-size:36px;
	color:#fff;
	text-transform:uppercase;
}

.btn-sign a { color:#fff; text-shadow:0 1px 2px #161616; }

#mask {
	display: none;
	background: #000; 
	position: fixed; left: 0; top: 0; 
	z-index: 10;
	width: 100%; height: 100%;
	opacity: 0.8;
	z-index: 999;
}

.login-popup{
	width:220px;
	height:180px;
	display:none;
	background: #FFFFFF;
	padding: 10px; 	
	border: 2px solid #ddd;
	float: left;
	font-size: 1.4em;
	position: fixed;
	top: 50%; left: 50%;
	z-index: 99999;
	box-shadow: 0px 0px 20px #999;
	-moz-box-shadow: 0px 0px 20px #999; /* Firefox */
    -webkit-box-shadow: 0px 0px 20px #999; /* Safari, Chrome */
	border-radius:3px 3px 3px 3px;
    -moz-border-radius: 3px; /* Firefox */
    -webkit-border-radius: 3px; /* Safari, Chrome */
}

img.btn_close {
	width: 50px;
	height: 27px;
	float: right; 
	margin: -28px -28px 4p 0;
}

fieldset { 
	border:none; 
}

form.signin .textbox label { 
	display:block; 
	padding-bottom:7px; 
}

form.signin .textbox span { 
	display:block;
}

form.signin p, form.signin span { 
	color:#999; 
	font-size:11px; 
	line-height:18px;
} 

form.signin .textbox input { 
	background:#FFFFFF; 
	border-bottom:1px solid #333;
	border-left:1px solid #000;
	border-right:1px solid #333;
	border-top:1px solid #000;
	color:#003366; 
	border-radius: 3px 3px 3px 3px;
	-moz-border-radius: 3px;
    -webkit-border-radius: 3px;
	font:13px Arial, Helvetica, sans-serif;
	padding:6px 6px 4px;
	width:200px;
	
}

form.signin input:-moz-placeholder { color:#F0F8FF; <!--text-shadow:0 0 2px #000;--> }
form.signin input::-webkit-input-placeholder { color:#808080; <!--text-shadow:0 0 2px #000;--> }

.button { 
	background: -moz-linear-gradient(center top, #f3f3f3, #dddddd);
	background: -webkit-gradient(linear, left top, left bottom, from(#f3f3f3), to(#dddddd));
	background:  -o-linear-gradient(top, #f3f3f3, #dddddd);
    filter: progid:DXImageTransform.Microsoft.gradient(startColorStr='#f3f3f3', EndColorStr='#dddddd');
	border-color:#000; 
	border-width:1px;
	border-radius:4px 4px 4px 4px;
	-moz-border-radius: 4px;
    -webkit-border-radius: 4px;
	color:#333;
	cursor:pointer;
	display:inline-block;
	padding:6px 6px 4px;
	margin-top:10px;
	font:12px; 
	width:100px;
	margin-left: auto;
    margin-right: auto;
}

.button:hover { background:#ddd; }

</style>
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
<link rel="icon" href="images/demo/favicon.ico" type="image/x-icon">
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('a.login-window').click(function() {
		
		// Getting the variable's value from a link 
		var loginBox = $(this).attr('href');

		//Fade in the Popup and add close button
		$(loginBox).fadeIn(300);
		
		//Set the center alignment padding + border
		var popMargTop = ($(loginBox).height() + 24) / 2; 
		var popMargLeft = ($(loginBox).width() + 24) / 2; 
		
		$(loginBox).css({ 
			'margin-top' : -popMargTop,
			'margin-left' : -popMargLeft
		});
		
		// Add the mask to body
		$('body').append('<div id="mask"></div>');
		$('#mask').fadeIn(300);
		
		return false;
	});
	
	// When clicking on the button close or the mask layer the popup closed
	$('a.close, #mask').click( function() { 
	  $('#mask , .login-popup').fadeOut(300 , function() {
		$('#mask').remove();  
	}); 
	return false;
	});
});
</script>
</head>
<body id="top">
<!--<div class="wrapper row0">-->
  <div id="topbar" class="clear">
  <nav>
        <ul>
		<li><a href="about.php">About</a></li>
        <li><a href="index.php">Home</a></li>
	  <li>
	  <a href='#login-box' class='login-window'>Faculty login</a>
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
      <h1><a href="index.html">RVCE Course Outcome Mapping</a></h1>
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
		<li><a class="active" href="view_courses.html">View Courses</a></li>
		<li><a class="drop" href="#">Course Evaluation</a>
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
<div id="login-box" class="login-popup">
        <a href="index.html" class="close"><img src="" class="btn_close" title="Close Window" alt="Close" /></a>
          <form method="post" class="signin" action="index.php">
                <fieldset class="textbox">
            	<label class>
                <span></span>
                <input id="username" name="username" value="" type="text" autocomplete="on" placeholder="Username">
                </label>
                
                <label class>
                <span></span>
                <input id="password" name="password" value="" type="password" placeholder="Password">
                </label>
                
                <button class="submit button" type="submit">Sign in</button>

                </fieldset>
          </form>
		</div>
<div class="wrapper">
  <div id="slider">
    <div id="slide-wrapper" class="rounded clear" style= "height: 480px;"> 
	<!--<br><br><br>
     <center><button type="button" onclick="loadDoc()">View Courses!</button><center>
	 <br><br>
<table id="demo"></table>-->
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
$query="SELECT `ques_num`, `co_level`, `max_marks` FROM `eval_questions` WHERE `c_code_evq`='$course_code' && `eval_num`='$eval_num'";
			$result=mysqli_query($connect,$query);
			while($row=mysqli_fetch_assoc($result)) {
			echo  "<tr><td>".$row["ques_num"]."</td><td>".$row["co_level"]."</td><td>".$row["max_marks"]."</td></tr>" ;
$query="SELECT `ques_num`, `co_level`,`max_marks` FROM `eval_theory_ques` WHERE `c_code`='$course_code' && `eval_num`='$eval_num'";
			}
			$result=mysqli_query($connect,$query);
			while($row=mysqli_fetch_assoc($result)) {
			echo  "<tr><td>".$row["ques_num"]."</td><td>".$row["co_level"]."</td><td>".$row["max_marks"]."</td></tr>" ;
			}
?>
        </tbody>
        </table>
</div>
  </div>
</div>
<!-- ################################################################################################ --> 
<!-- ################################################################################################ --> 
<!-- ################################################################################################ -->
<!--<div class="wrapper row3">
	//  connect=mysqli_connect("localhost","root","","co_mng") or die("Couldn't connect to database!");
//$uname=$_SESSION["username"];
//if($uname){
			//$query="SELECT `fname` FROM `faculty` WHERE `username`='$uname'";
			//$result=mysqli_query($connect,$query);
			//$row=mysqli_fetch_assoc($result);
			//echo  $row["fname"] ;
			//} else {
			//echo "<a href='#login-box' class='login-window'>Faculty login</a>";
			//}
			//?>
  <div class="rounded">
    <main class="container clear"> 
      <!-- main body 
      <p>ndaofanknvdaknvdaknva</p>
	  <p>ndaofanknvdaknvdaknva</p>
	  <p>ndaofanknvdaknvdaknva</p>
	  <p>ndaofanknvdaknvdaknva</p>
	  <p>ndaofanknvdaknvdaknva</p>
	  <p>ndaofanknvdaknvdaknva</p>
      <div class="clear"></div>
    </main>
  </div>
</div>-->
<!-- ################################################################################################ --> 
<!-- ################################################################################################ --> 
<!-- ################################################################################################ -->
<div class="wrapper row4">
  <!--<div class="rounded">-->
  <p class="fl_left"><a href="copy.html"><u>Copyright &copy;</u></a> 2015 - Anisha J Prasad, Anusha M & Archana M R.</p></div>

<script src="layout/scripts/jquery.min.js"></script> 
<script src="layout/scripts/jquery.fitvids.min.js"></script> 
<script src="layout/scripts/jquery.mobilemenu.js"></script> 
<script src="layout/scripts/tabslet/jquery.tabslet.min.js"></script>
</body>
</html>
