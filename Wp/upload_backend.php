<?php
var_dump($_FILES);

	$con=mysqli_connect("localhost","root","root","co_mng") or die("Couldn't connect to database!");
	$fname=$_FILES['file']['name'];
	if(!isset($fname))
	{
		echo "File not able to upload!Please try again!";
	}
	else if ($_FILES["file"]["error"] > 0) {
		echo "Error: " . $_FILES["file"]["error"] . "<br>";
	} 
	else 
	{
	include 'classes/PHPExcel/IOFactory.php';
	$inputFileType='Excel2007';//always it doesn't support newer versions and newer versions are compatible with 2007, so 
	$objReader=PHPExcel_IOFactory::createReader($inputFileType);
	$objPHPExcel=$objReader->load($_FILES['file']['tmp_name']);
	$sheet1=$objPHPExcel->setActiveSheetIndex(0);
	$lastRow=$sheet1->getHighestRow();
	for($i=2;$i<=$lastRow;$i++)
	{
	$valA=$sheet1->getcell("A".$i)->getvalue();
	$valB=$sheet1->getcell("B".$i)->getvalue();
	$valC=$sheet1->getcell("C".$i)->getvalue();
	$valD=$sheet1->getcell("D".$i)->getvalue();
	$valE=$sheet1->getcell("E".$i)->getvalue();
	$valF=$sheet1->getcell("F".$i)->getvalue();
	$sql1="INSERT INTO `stu_attainment`(`c_code_attain`, `usn`, `eval_num_appear`, `type_appear`, `ques_num_appear`, `marks_scored`) 
			VALUES ('$valA','$valB','$valC','$valD','$valE','$valF')";		
	$sql2="INSERT INTO `student`(`usn`, `c_code_stu`) VALUES ('$valB','$valA')";
	
	
	$res1=mysqli_query($con,$sql1);
	$res2=mysqli_query($con,$sql2);	
		if((!$res1) || (!$res2))
		{
			echo "<script>
			alert('Could not import file! Try again later!');
			window.location.href='upload_marks.php';
			</script>";
		}
		else
		{
			echo "<script>
			alert('Successfully entered!');
			window.location.href='upload_marks.php';
			</script>";
		}
	
	}
	}
		
	
?>