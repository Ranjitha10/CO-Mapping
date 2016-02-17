<!DOCTYPE html>
<html>
<head>
<title>RVCE CO Mapping</title>
<meta charset="utf-8">
<meta name="view port" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link rel="icon" href="images/demo/favicon.ico" type="image/x-icon">
<style>
slider-container {width: 94%; margin: 0 auto; padding 0 2%; }
#image-slider {width: 100%; overflow: hidden; }
figure {margin: 0; }
.slider {position: relative; width: 400%; font-size: 0; margin: 0; padding: 0; -webkit-animation: 25s slidy ease-in-out infinite;@-moz-animation: 25s slidy infinite; @-o-animation: 25s slidy infinite; animation: 25s slidy infinite; } 
.slider figure {width: 25%; display: inline-block; position: inherit; float: left; }
.slider img {width: 100%; float: left;}
.slider figure figcaption {position: absolute; bottom: 0; background-color:#ffbf00; color: #5E2D79; width:20% font-size: 1.2rem; padding: .6rem; }
<!--@import url(http://fonts.googleapis.com/css?family=Istok+Web);-->
@keyframes slidy {
0% { left: 0%; }
20% { left: 0%; }
25% { left: -100%; }
45% { left: -100%; }
50% { left: -200%; }
70% { left: -200%; }
75% { left: -300%; }
95% { left: -300%; }
100% { left: -400%; }
}
body, figure { 
  margin: 0; background: #FFFFFF;
  font-family: Indie Flower, sans-serif;
  font-weight: 100;
}
div#captioned-gallery { 
  width: 100%; overflow: hidden; 
}
figure.slider { 
  position: relative; width: 500%;
  font-size: 0; animation: 20s slidy infinite; 
}
figure.slider figure { 
  width: 20%; height: auto;
  display: inline-block;  position: inherit; 
}
figure.slider img { width: 100%; height: auto; }
figure.slider figure figcaption { 
  position: absolute; bottom: 0;
  background: #ffcc33;
  color: #5E2D79; width: 50px; height: 20px;
  font-size: 1.4rem; padding: .6rem; 
}


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

.btn-sign a { color:#FFF; text-shadow:0 1px 2px #161616; }

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
	  <li><a href="#login-box" class="login-window">
	  Faculty login</a>
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
        <li class="active"><a href="index.php">Home</a></li>
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
		 <li><a href="report.php">Report Generation</a></li>
		 
		 </ul>
      <!-- ################################################################################################ --> 
    </nav>
  </div>
</div>
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
    <div id="slide-wrapper" class="rounded clear"> 
      <!-- ################################################################################################ -->
	  <div id="captioned-gallery">
	<figure class="slider">
		<figure>
			<img src="images/demo/rvce1.jpg" alt>
			<figcaption style="font-family: Comic Sans MS; line-height: 28px;">ONLINE PORTAL FOR RVCE!</figcaption>
		</figure>
		<figure>
			<img src="images/demo/rep.jpg" alt>
			<figcaption style="font-family: Comic Sans MS; line-height: 28px;">Automated Report Generation!</figcaption>
		</figure>
		<figure>
			<img src="images/demo/mark.jpg" alt>
			<figcaption style="font-family: Comic Sans MS; line-height: 28px;">Simplified Entry and Calculation of Marks!</figcaption>
		</figure>
		<figure>
			<img src="images/demo/coo.png" alt>
		</figure>
		<figure>
			<img src="images/demo/bt4.jpg" alt>
		</figure>
		
</figure>
		
</div>
</div>
  </div>
</div>
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

<?php
	$connect=mysqli_connect("localhost","root","root","co_mng") or die("Couldn't connect to database!");
	if(isset($_POST["username"]) && isset($_POST["password"]))
	{
		$username=$_POST["username"];
		$password=$_POST["password"];
		if(!empty($username)&&!empty($password))
		{
			session_start();
			$_SESSION["username"]=$username;
			$_SESSION["password"]=$password;
			$password= md5($password);
			$query="SELECT username,password FROM log_in WHERE username='$username' AND password='$password'";
		if($query_run=mysqli_query($connect,$query))
		{
			$query_data=mysqli_fetch_assoc($query_run);
			if($query_data["username"]==$username && $query_data["password"]==$password)
			{
				$welcome='index.php';
				header('Location: '.$welcome);
			}
			else
			{
				echo "<script>
				alert('Invalid username or password!');
				window.location.href='index.php';
				</script>";
			}
		}
		else
		{
			;
		}
		}
		else
		{
			echo "<script>
			alert('Please enter a username and password!');
			window.location.href='index.php';
			</script>";
		}
	}
?>
