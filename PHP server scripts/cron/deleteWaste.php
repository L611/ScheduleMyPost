<?php

date_default_timezone_set('Asia/Calcutta');

$connection =  mysqli_connect("localhost","user","","test");
$result = mysqli_query($connection,"SELECT * from samplescheduled_tasks;");
while($row=mysqli_fetch_assoc($result)) {

	if(strtotime($row['year']."-".$row['month']."-".$row['date']." ".$row['hours'].":".$row['minutes'].":00") + 120 < time())  {

		$query = "DELETE from samplescheduled_tasks WHERE sno=".$row['sno'].";";
		$resultt =mysqli_query($connection,$query);
		

	}
}

mysqli_close($connection);
?>
