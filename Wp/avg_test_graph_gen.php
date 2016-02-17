<?php
session_start();
if( !(isset($_SESSION['username'])) )
{	
	echo "<script>alert('Please login to continue');</script>" ;
	header("Location: index.php");
}
$connect=mysqli_connect("localhost","root","root","co_mng") or die("Couldn't connect to database!");
$uname=$_SESSION["username"];
$cc=$_POST["course_code"];
	
	/*EVALUATION 1*/
	
//distinct student usn taken up the test 1
$noofstu="SELECT COUNT(DISTINCT `usn`) AS cnt FROM `stu_attainment` WHERE `c_code_attain`='$cc' && `eval_num_appear`='1' && `type_appear`='Test'";
$resstu=mysqli_query($connect,$noofstu);
$ro=mysqli_fetch_assoc($resstu);
$scount=$ro["cnt"];

//CO1
$count1=0;
$m1=0;
$query="SELECT `ques_num`, `max_marks` FROM `eval_questions` WHERE `c_code_evq`='$cc' && `type`='Test' && `eval_num`='1' && `co_level`='CO1'";
$result=mysqli_query($connect,$query);
while($row=mysqli_fetch_assoc($result)){
	$m1=$m1+$row["max_marks"];
	$i=$row["ques_num"];
	$q1="SELECT `marks_scored` FROM `stu_attainment` WHERE `c_code_attain`='$cc' && `eval_num_appear`='1' && `type_appear`='Test' && `ques_num_appear`='$i'";
	$r1=mysqli_query($connect,$q1);
	while($row1=mysqli_fetch_assoc($r1)){
		$count1=$count1+$row1["marks_scored"];
	}
}

$queryth="SELECT `ques_num`, `max_marks` FROM `eval_theory_ques` WHERE `c_code`='$cc' && `type`='Test' && `eval_num`='1' && `co_level`='CO1'";
$resultth=mysqli_query($connect,$queryth);
while($rowt=mysqli_fetch_assoc($resultth)){
	$m1=$m1+$rowt["max_marks"];
	$it=$rowt["ques_num"];
	$qth1="SELECT `marks_scored` FROM `stu_attainment` WHERE `c_code_attain`='$cc' && `eval_num_appear`='1' && `type_appear`='Test' && `ques_num_appear`='$it'";
	$rth1=mysqli_query($connect,$qth1);
	while($rowth1=mysqli_fetch_assoc($rth1)){
		$count1=$count1+$rowth1["marks_scored"];
	}
}

//CO2
$count2=0;
$m2=0;
$query2="SELECT `ques_num`, `max_marks` FROM `eval_questions` WHERE `c_code_evq`='$cc' && `type`='Test' && `eval_num`='1' && `co_level`='CO2'";
$result2=mysqli_query($connect,$query2);
while($row2=mysqli_fetch_assoc($result2)){
	$m2=$m2+$row2["max_marks"];
	$i=$row2["ques_num"];
	$q2="SELECT `marks_scored` FROM `stu_attainment` WHERE `c_code_attain`='$cc' && `eval_num_appear`='1' && `type_appear`='Test' && `ques_num_appear`='$i'";
	$r2=mysqli_query($connect,$q2);
	while($row2=mysqli_fetch_assoc($r2)){
		$count2=$count2+$row2["marks_scored"];
	}
}

$queryth2="SELECT `ques_num`, `max_marks` FROM `eval_theory_ques` WHERE `c_code`='$cc' && `type`='Test' && `eval_num`='1' && `co_level`='CO2'";
$resultth2=mysqli_query($connect,$queryth2);
while($rowt2=mysqli_fetch_assoc($resultth2)){
	$m2=$m2+$rowt2["max_marks"];
	$it=$rowt2["ques_num"];
	$qth2="SELECT `marks_scored` FROM `stu_attainment` WHERE `c_code_attain`='$cc' && `eval_num_appear`='1' && `type_appear`='Test' && `ques_num_appear`='$it'";
	$rth2=mysqli_query($connect,$qth2);
	while($rowth2=mysqli_fetch_assoc($rth2)){
		$count2=$count2+$rowth2["marks_scored"];
	}
}

//CO3
$count3=0;
$m3=0;
$query3="SELECT `ques_num`, `max_marks` FROM `eval_questions` WHERE `c_code_evq`='$cc' && `type`='Test' && `eval_num`='1' && `co_level`='CO3'";
$result3=mysqli_query($connect,$query3);
while($row3=mysqli_fetch_assoc($result3)){
	$m3=$m3+$row3["max_marks"];
	$i=$row3["ques_num"];
	$q3="SELECT `marks_scored` FROM `stu_attainment` WHERE `c_code_attain`='$cc' && `eval_num_appear`='1' && `type_appear`='Test' && `ques_num_appear`='$i'";
	$r3=mysqli_query($connect,$q3);
	while($row3=mysqli_fetch_assoc($r3)){
		$count3=$count3+$row3["marks_scored"];
	}
}

$queryth3="SELECT `ques_num`, `max_marks` FROM `eval_theory_ques` WHERE `c_code`='$cc' && `type`='Test' && `eval_num`='1' && `co_level`='CO3'";
$resultth3=mysqli_query($connect,$queryth3);
while($rowt3=mysqli_fetch_assoc($resultth3)){
	$m3=$m3+$rowt3["max_marks"];
	$it=$rowt3["ques_num"];
	$qth3="SELECT `marks_scored` FROM `stu_attainment` WHERE `c_code_attain`='$cc' && `eval_num_appear`='1' && `type_appear`='Test' && `ques_num_appear`='$it'";
	$rth3=mysqli_query($connect,$qth3);
	while($rowth3=mysqli_fetch_assoc($rth3)){
		$count3=$count3+$rowth3["marks_scored"];
	}
}

//CO4
$count4=0;
$m4=0;
$query4="SELECT `ques_num`, `max_marks` FROM `eval_questions` WHERE `c_code_evq`='$cc' && `type`='Test' && `eval_num`='1' && `co_level`='CO4'";
$result4=mysqli_query($connect,$query4);
while($row4=mysqli_fetch_assoc($result4)){
	$m4=$m4+$row4["max_marks"];
	$i=$row4["ques_num"];
	$q4="SELECT `marks_scored` FROM `stu_attainment` WHERE `c_code_attain`='$cc' && `eval_num_appear`='1' && `type_appear`='Test' && `ques_num_appear`='$i'";
	$r4=mysqli_query($connect,$q4);
	while($row4=mysqli_fetch_assoc($r4)){
		$count4=$count4+$row4["marks_scored"];
	}
}

$queryth4="SELECT `ques_num`, `max_marks` FROM `eval_theory_ques` WHERE `c_code`='$cc' && `type`='Test' && `eval_num`='1' && `co_level`='CO4'";
$resultth4=mysqli_query($connect,$queryth4);
while($rowt4=mysqli_fetch_assoc($resultth4)){
	$m4=$m4+$rowt4["max_marks"];
	$it=$rowt4["ques_num"];
	$qth4="SELECT `marks_scored` FROM `stu_attainment` WHERE `c_code_attain`='$cc' && `eval_num_appear`='1' && `type_appear`='Test' && `ques_num_appear`='$it'";
	$rth4=mysqli_query($connect,$qth4);
	while($rowth4=mysqli_fetch_assoc($rth4)){
		$count4=$count4+$rowth4["marks_scored"];
	}
}

$y="SELECT `req_marks` FROM `attainment` WHERE `c_code_attain`='$cc' && `co_level`='CO1'";
$resy=mysqli_query($connect,$y);
$coa=mysqli_fetch_assoc($resy);
if(!$coa)
{
	echo "<script>
	alert('CO attainment value not entered. Please enter!');
	window.location.href='co_attain.php';
	</script>";
}
$req1=$coa["req_marks"];

$y="SELECT `req_marks` FROM `attainment` WHERE `c_code_attain`='$cc' && `co_level`='CO2'";
$resy=mysqli_query($connect,$y);
$coa=mysqli_fetch_assoc($resy);
$req2=$coa["req_marks"];

$y="SELECT `req_marks` FROM `attainment` WHERE `c_code_attain`='$cc' && `co_level`='CO3'";
$resy=mysqli_query($connect,$y);
$coa=mysqli_fetch_assoc($resy);
$req3=$coa["req_marks"];

$y="SELECT `req_marks` FROM `attainment` WHERE `c_code_attain`='$cc' && `co_level`='CO4'";
$resy=mysqli_query($connect,$y);
$coa=mysqli_fetch_assoc($resy);
$req4=$coa["req_marks"];



/*EVALUATION 2*/

//distinct student usn taken up the test 2
$noofstu="SELECT COUNT(DISTINCT `usn`) AS cnt FROM `stu_attainment` WHERE `c_code_attain`='$cc' && `eval_num_appear`='2' && `type_appear`='Test'";
$resstu=mysqli_query($connect,$noofstu);
$ro=mysqli_fetch_assoc($resstu);
$scount2=$ro["cnt"];

//CO1
$count21=0;
$m21=0;
$query="SELECT `ques_num`, `max_marks` FROM `eval_questions` WHERE `c_code_evq`='$cc' && `type`='Test' && `eval_num`='2' && `co_level`='CO1'";
$result=mysqli_query($connect,$query);
while($row=mysqli_fetch_assoc($result)){
	$m21=$m1+$row["max_marks"];
	$i=$row["ques_num"];
	$q1="SELECT `marks_scored` FROM `stu_attainment` WHERE `c_code_attain`='$cc' && `eval_num_appear`='2' && `type_appear`='Test' && `ques_num_appear`='$i'";
	$r1=mysqli_query($connect,$q1);
	while($row1=mysqli_fetch_assoc($r1)){
		$count21=$count21+$row1["marks_scored"];
	}
}

$queryth="SELECT `ques_num`, `max_marks` FROM `eval_theory_ques` WHERE `c_code`='$cc' && `type`='Test' && `eval_num`='2' && `co_level`='CO1'";
$resultth=mysqli_query($connect,$queryth);
while($rowt=mysqli_fetch_assoc($resultth)){
	$m21=$m21+$rowt["max_marks"];
	$it=$rowt["ques_num"];
	$qth1="SELECT `marks_scored` FROM `stu_attainment` WHERE `c_code_attain`='$cc' && `eval_num_appear`='2' && `type_appear`='Test' && `ques_num_appear`='$it'";
	$rth1=mysqli_query($connect,$qth1);
	while($rowth1=mysqli_fetch_assoc($rth1)){
		$count21=$count21+$rowth1["marks_scored"];
	}
}

//CO2
$count22=0;
$m22=0;
$query2="SELECT `ques_num`, `max_marks` FROM `eval_questions` WHERE `c_code_evq`='$cc' && `type`='Test' && `eval_num`='2' && `co_level`='CO2'";
$result2=mysqli_query($connect,$query2);
while($row2=mysqli_fetch_assoc($result2)){
	$m22=$m22+$row2["max_marks"];
	$i=$row2["ques_num"];
	$q2="SELECT `marks_scored` FROM `stu_attainment` WHERE `c_code_attain`='$cc' && `eval_num_appear`='2' && `type_appear`='Test' && `ques_num_appear`='$i'";
	$r2=mysqli_query($connect,$q2);
	while($row2=mysqli_fetch_assoc($r2)){
		$count22=$count22+$row2["marks_scored"];
	}
}

$queryth2="SELECT `ques_num`, `max_marks` FROM `eval_theory_ques` WHERE `c_code`='$cc' && `type`='Test' && `eval_num`='2' && `co_level`='CO2'";
$resultth2=mysqli_query($connect,$queryth2);
while($rowt2=mysqli_fetch_assoc($resultth2)){
	$m22=$m22+$rowt2["max_marks"];
	$it=$rowt2["ques_num"];
	$qth2="SELECT `marks_scored` FROM `stu_attainment` WHERE `c_code_attain`='$cc' && `eval_num_appear`='2' && `type_appear`='Test' && `ques_num_appear`='$it'";
	$rth2=mysqli_query($connect,$qth2);
	while($rowth2=mysqli_fetch_assoc($rth2)){
		$count22=$count22+$rowth2["marks_scored"];
	}
}

//CO3
$count23=0;
$m23=0;
$query3="SELECT `ques_num`, `max_marks` FROM `eval_questions` WHERE `c_code_evq`='$cc' && `type`='Test' && `eval_num`='2' && `co_level`='CO3'";
$result3=mysqli_query($connect,$query3);
while($row3=mysqli_fetch_assoc($result3)){
	$m23=$m23+$row3["max_marks"];
	$i=$row3["ques_num"];
	$q3="SELECT `marks_scored` FROM `stu_attainment` WHERE `c_code_attain`='$cc' && `eval_num_appear`='2' && `type_appear`='Test' && `ques_num_appear`='$i'";
	$r3=mysqli_query($connect,$q3);
	while($row3=mysqli_fetch_assoc($r3)){
		$count23=$count23+$row3["marks_scored"];
	}
}

$queryth3="SELECT `ques_num`, `max_marks` FROM `eval_theory_ques` WHERE `c_code`='$cc' && `type`='Test' && `eval_num`='2' && `co_level`='CO3'";
$resultth3=mysqli_query($connect,$queryth3);
while($rowt3=mysqli_fetch_assoc($resultth3)){
	$m23=$m23+$rowt3["max_marks"];
	$it=$rowt3["ques_num"];
	$qth3="SELECT `marks_scored` FROM `stu_attainment` WHERE `c_code_attain`='$cc' && `eval_num_appear`='2' && `type_appear`='Test' && `ques_num_appear`='$it'";
	$rth3=mysqli_query($connect,$qth3);
	while($rowth3=mysqli_fetch_assoc($rth3)){
		$count23=$count23+$rowth3["marks_scored"];
	}
}

//CO4
$count24=0;
$m24=0;
$query4="SELECT `ques_num`, `max_marks` FROM `eval_questions` WHERE `c_code_evq`='$cc' && `type`='Test' && `eval_num`='2' && `co_level`='CO4'";
$result4=mysqli_query($connect,$query4);
while($row4=mysqli_fetch_assoc($result4)){
	$m24=$m24+$row4["max_marks"];
	$i=$row4["ques_num"];
	$q4="SELECT `marks_scored` FROM `stu_attainment` WHERE `c_code_attain`='$cc' && `eval_num_appear`='2' && `type_appear`='Test' && `ques_num_appear`='$i'";
	$r4=mysqli_query($connect,$q4);
	while($row4=mysqli_fetch_assoc($r4)){
		$count24=$count24+$row4["marks_scored"];
	}
}

$queryth4="SELECT `ques_num`, `max_marks` FROM `eval_theory_ques` WHERE `c_code`='$cc' && `type`='Test' && `eval_num`='2' && `co_level`='CO4'";
$resultth4=mysqli_query($connect,$queryth4);
while($rowt4=mysqli_fetch_assoc($resultth4)){
	$m24=$m24+$rowt4["max_marks"];
	$it=$rowt4["ques_num"];
	$qth4="SELECT `marks_scored` FROM `stu_attainment` WHERE `c_code_attain`='$cc' && `eval_num_appear`='2' && `type_appear`='Test' && `ques_num_appear`='$it'";
	$rth4=mysqli_query($connect,$qth4);
	while($rowth4=mysqli_fetch_assoc($rth4)){
		$count24=$count24+$rowth4["marks_scored"];
	}
}


/*EVALUATION 3*/
//distinct student usn taken up the test 3
$noofstu="SELECT COUNT(DISTINCT `usn`) AS cnt FROM `stu_attainment` WHERE `c_code_attain`='$cc' && `eval_num_appear`='3' && `type_appear`='Test'";
$resstu=mysqli_query($connect,$noofstu);
$ro=mysqli_fetch_assoc($resstu);
$scount3=$ro["cnt"];

//CO1
$count31=0;
$m31=0;
$query="SELECT `ques_num`, `max_marks` FROM `eval_questions` WHERE `c_code_evq`='$cc' && `type`='Test' && `eval_num`='3' && `co_level`='CO1'";
$result=mysqli_query($connect,$query);
while($row=mysqli_fetch_assoc($result)){
	$m31=$m31+$row["max_marks"];
	$i=$row["ques_num"];
	$q1="SELECT `marks_scored` FROM `stu_attainment` WHERE `c_code_attain`='$cc' && `eval_num_appear`='3' && `type_appear`='Test' && `ques_num_appear`='$i'";
	$r1=mysqli_query($connect,$q1);
	while($row1=mysqli_fetch_assoc($r1)){
		$count31=$count31+$row1["marks_scored"];
	}
}

$queryth="SELECT `ques_num`, `max_marks` FROM `eval_theory_ques` WHERE `c_code`='$cc' && `type`='Test' && `eval_num`='3' && `co_level`='CO1'";
$resultth=mysqli_query($connect,$queryth);
while($rowt=mysqli_fetch_assoc($resultth)){
	$m31=$m31+$rowt["max_marks"];
	$it=$rowt["ques_num"];
	$qth1="SELECT `marks_scored` FROM `stu_attainment` WHERE `c_code_attain`='$cc' && `eval_num_appear`='3' && `type_appear`='Test' && `ques_num_appear`='$it'";
	$rth1=mysqli_query($connect,$qth1);
	while($rowth1=mysqli_fetch_assoc($rth1)){
		$count31=$count31+$rowth1["marks_scored"];
	}
}

//CO2
$count32=0;
$m32=0;
$query2="SELECT `ques_num`, `max_marks` FROM `eval_questions` WHERE `c_code_evq`='$cc' && `type`='Test' && `eval_num`='3' && `co_level`='CO2'";
$result2=mysqli_query($connect,$query2);
while($row2=mysqli_fetch_assoc($result2)){
	$m32=$m32+$row2["max_marks"];
	$i=$row2["ques_num"];
	$q2="SELECT `marks_scored` FROM `stu_attainment` WHERE `c_code_attain`='$cc' && `eval_num_appear`='3' && `type_appear`='Test' && `ques_num_appear`='$i'";
	$r2=mysqli_query($connect,$q2);
	while($row2=mysqli_fetch_assoc($r2)){
		$count32=$count32+$row2["marks_scored"];
	}
}

$queryth2="SELECT `ques_num`, `max_marks` FROM `eval_theory_ques` WHERE `c_code`='$cc' && `type`='Test' && `eval_num`='3' && `co_level`='CO2'";
$resultth2=mysqli_query($connect,$queryth2);
while($rowt2=mysqli_fetch_assoc($resultth2)){
	$m32=$m32+$rowt2["max_marks"];
	$it=$rowt2["ques_num"];
	$qth2="SELECT `marks_scored` FROM `stu_attainment` WHERE `c_code_attain`='$cc' && `eval_num_appear`='3' && `type_appear`='Test' && `ques_num_appear`='$it'";
	$rth2=mysqli_query($connect,$qth2);
	while($rowth2=mysqli_fetch_assoc($rth2)){
		$count32=$count32+$rowth2["marks_scored"];
	}
}

//CO3
$count33=0;
$m33=0;
$query3="SELECT `ques_num`, `max_marks` FROM `eval_questions` WHERE `c_code_evq`='$cc' && `type`='Test' && `eval_num`='3' && `co_level`='CO3'";
$result3=mysqli_query($connect,$query3);
while($row3=mysqli_fetch_assoc($result3)){
	$m33=$m33+$row3["max_marks"];
	$i=$row3["ques_num"];
	$q3="SELECT `marks_scored` FROM `stu_attainment` WHERE `c_code_attain`='$cc' && `eval_num_appear`='3' && `type_appear`='Test' && `ques_num_appear`='$i'";
	$r3=mysqli_query($connect,$q3);
	while($row3=mysqli_fetch_assoc($r3)){
		$count33=$count33+$row3["marks_scored"];
	}
}

$queryth3="SELECT `ques_num`, `max_marks` FROM `eval_theory_ques` WHERE `c_code`='$cc' && `type`='Test' && `eval_num`='3' && `co_level`='CO3'";
$resultth3=mysqli_query($connect,$queryth3);
while($rowt3=mysqli_fetch_assoc($resultth3)){
	$m33=$m33+$rowt3["max_marks"];
	$it=$rowt3["ques_num"];
	$qth3="SELECT `marks_scored` FROM `stu_attainment` WHERE `c_code_attain`='$cc' && `eval_num_appear`='3' && `type_appear`='Test' && `ques_num_appear`='$it'";
	$rth3=mysqli_query($connect,$qth3);
	while($rowth3=mysqli_fetch_assoc($rth3)){
		$count33=$count33+$rowth3["marks_scored"];
	}
}

//CO4
$count34=0;
$m34=0;
$query4="SELECT `ques_num`, `max_marks` FROM `eval_questions` WHERE `c_code_evq`='$cc' && `type`='Test' && `eval_num`='3' && `co_level`='CO4'";
$result4=mysqli_query($connect,$query4);
while($row4=mysqli_fetch_assoc($result4)){
	$m34=$m34+$row4["max_marks"];
	$i=$row4["ques_num"];
	$q4="SELECT `marks_scored` FROM `stu_attainment` WHERE `c_code_attain`='$cc' && `eval_num_appear`='3' && `type_appear`='Test' && `ques_num_appear`='$i'";
	$r4=mysqli_query($connect,$q4);
	while($row4=mysqli_fetch_assoc($r4)){
		$count34=$count34+$row4["marks_scored"];
	}
}

$queryth4="SELECT `ques_num`, `max_marks` FROM `eval_theory_ques` WHERE `c_code`='$cc' && `type`='Test' && `eval_num`='3' && `co_level`='CO4'";
$resultth4=mysqli_query($connect,$queryth4);
while($rowt4=mysqli_fetch_assoc($resultth4)){
	$m34=$m34+$rowt4["max_marks"];
	$it=$rowt4["ques_num"];
	$qth4="SELECT `marks_scored` FROM `stu_attainment` WHERE `c_code_attain`='$cc' && `eval_num_appear`='3' && `type_appear`='Test' && `ques_num_appear`='$it'";
	$rth4=mysqli_query($connect,$qth4);
	while($rowth4=mysqli_fetch_assoc($rth4)){
		$count34=$count34+$rowth4["marks_scored"];
	}
}


$tmco1=($m1*$scount)+($m21*$scount2)+($m31*$scount3);//multiplication-no of students attended the test*max co1 marks in each paper
$tmco2=($m2*$scount)+($m22*$scount2)+($m32*$scount3);
$tmco3=($m3*$scount)+($m23*$scount2)+($m33*$scount3);
$tmco4=($m4*$scount)+($m24*$scount2)+($m34*$scount3);


//count1 has total co1 marks obtained, count2 total co2 marks obtained...			
//co attainment percentage			
$perco1=(($count1+$count21+$count31)*100)/$tmco1;
$perco2=(($count2+$count22+$count32)*100)/$tmco2;
$perco3=(($count3+$count23+$count33)*100)/$tmco3;
$perco4=(($count4+$count24+$count34)*100)/$tmco4;

?>

<!DOCTYPE html>
<html>
<head>
<title>RVCE CO Mapping</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
<link rel="icon" href="images/demo/favicon.ico" type="image/x-icon">
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
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
        <li><a class="drop" class="active" href="#">CO Attainment</a>
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
     
		 <h2>Aggregate CO Attainment</h2>
                       
                        <label>Bar Chart for <?php echo $cc;?></label>
						<div class="chart" id="bar-chart" style="height: 300px; width: 500px;"></div>
						
          

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
<script type="text/javascript">
      $(document).ready(function() {
        "use strict";
        //BAR CHART
		var r1=<?php echo $req1; ?>;
		var r2=<?php echo $req2; ?>;
		var r3=<?php echo $req3; ?>;
		var r4=<?php echo $req4; ?>;
		
		var o1=<?php echo $perco1; ?>;
		var o2=<?php echo $perco2; ?>;
		var o3=<?php echo $perco3; ?>;
		var o4=<?php echo $perco4; ?>;
		
        var bar = new Morris.Bar({
          element: 'bar-chart',
          resize: true,
          data: [
            {y: 'CO1', a: r1, b: o1},
            {y: 'CO2', a: r2, b: o2},
            {y: 'CO3', a: r3, b: o3},
            {y: 'CO4', a: r4, b: o4}
          ],
          barColors: ['#00a65a', '#f56954'],
          xkey: 'y',
          ykeys: ['a', 'b'],
          labels: ['Required', 'Attained'],
          hideHover: 'auto'
        });
      });
    </script>
</body>
</html>
