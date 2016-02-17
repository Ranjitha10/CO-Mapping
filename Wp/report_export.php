<div align="center">
<p><b>DEPARTMENT OF INFORMATION SCIENCE & ENGINEERING</b></p>
<p><b> R.V.COLLEGE OF ENGINEERING, BANGALORE - 560059</b></p>
<pre><b>Course Code- 12IS64                      Course Name - Database Management Systems </b></pre> 
<table border="0.7" width="1000">
    <tr><br><br><th></th>
    	<th>Student USN</th>
		<th>CO1</th>
		<th>CO2</th>
		<th>CO3</th>
		<th>CO4</th>
	</tr>
	<?php
	//connection to mysql
$con=mysqli_connect("localhost","root","root","co_mng") or die("Couldn't connect to database!");
	
	//query get data
	$sql = mysqli_query($con,"SELECT * FROM `excel`");
	$no = 1;
	while($data = mysqli_fetch_assoc($sql)){
		echo '<tr>
			<td></td>
			<td>'.$data['usn'].'</td>
			<td>'.$data['co1'].'</td>
			<td>'.$data['co2'].'</td>
			<td>'.$data['co3'].'</td>
			<td>'.$data['co4'].'</td>
		</tr>';
		$no++;
	}
	$sql = mysqli_query($con,"SELECT `req_marks` FROM `attainment` WHERE `co_level`='CO1' AND `c_code_attain`='12IS64'");
	$data4= mysqli_fetch_assoc($sql);
	$sql = mysqli_query($con,"SELECT `req_marks` FROM `attainment` WHERE `co_level`='CO2' AND `c_code_attain`='12IS64'");
	$data1 = mysqli_fetch_assoc($sql);
	$sql = mysqli_query($con,"SELECT `req_marks` FROM `attainment` WHERE `co_level`='CO3' AND `c_code_attain`='12IS64'");
	$data2 = mysqli_fetch_assoc($sql);
	$sql = mysqli_query($con,"SELECT `req_marks` FROM `attainment` WHERE `co_level`='CO4' AND `c_code_attain`='12IS64'");
	$data3 = mysqli_fetch_assoc($sql);
		echo '<br><tr>
			<td></td>
			<td>Goal</td>
			<td>'.$data4['req_marks'].'</td>
			<td>'.$data1['req_marks'].'</td>
			<td>'.$data2['req_marks'].'</td>
			<td>'.$data3['req_marks'].'</td>
		</tr>';
	$sql = mysqli_query($con,"SELECT * FROM `total`");
	$data = mysqli_fetch_assoc($sql);
	echo '<tr>
	<td></td>
			<td>Attainment %age</td>
			<td>'.$data['co1'].'</td>
			<td>'.$data['co2'].'</td>
			<td>'.$data['co3'].'</td>
			<td>'.$data['co4'].'</td>
		</tr>';
		echo '<tr><td></td><td>CO Result</td><td>';
		if($data['co1'] > $data4['req_marks']) {
			echo 'Y</td><td>';
		} else { echo 'N</td><td>'; }
		if($data['co2'] > $data1['req_marks']) {
			echo 'Y</td><td>';
		} else { echo 'N</td><td>'; }
		if($data['co3'] > $data2['req_marks']) {
			echo 'Y</td><td>';
		} else { echo 'N</td><td>'; }
		if($data['co4'] > $data3['req_marks']) {
			echo 'Y</td><td>';
		} else { echo 'N</td></tr>'; }
	?>
</table>
</div>