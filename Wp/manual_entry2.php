<?php
//error_reporting(0);
//if ($_POST) var_dump($_POST);
session_start();
	//print_r($_SESSION);
	$q=NULL;
	$c=NULL;
	$u=NULL;
	$q=$_SESSION["qc"];
	$c=$_SESSION["cc"];
	$u=$_SESSION["uc"];
	$connect=mysqli_connect("localhost","root","root","co_mng") or die("Couldn't connect to database!");
	$qm=$_POST["qmark"];
	foreach ($qm as $key=>$i){
			//$que="INSERT INTO `stu_attainment`(`marks_scored`) VALUES ('$i') WHERE `c_code_attain`='$c' && `usn`='$u' && `eval_num_appear`='$q' && `type_appear`='Test' && `ques_num_appear`='$key'";
			$que="UPDATE `stu_attainment` SET `marks_scored`='$i' WHERE `c_code_attain`='$c' && `usn`='$u' && `eval_num_appear`='$q' && `type_appear`='Test' && `ques_num_appear`='$key'";
			$r1=mysqli_query($connect,$que);
			if(!$r1)
			{
		    echo "<script>
			alert('huh! Try again later!');
			window.location.href='manual_entry.php';
			</script>";
			}
	}
	echo "<script>
			alert('Successfully entered!');
			window.location.href='manual_entry.php';
			</script>";
?>