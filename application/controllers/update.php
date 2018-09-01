<?php   
	$sql02 = "SELECT woeid FROM locations WHERE woeid=".$woeid.""; 
	$result02 = $mysqli->query($sql02); 
	if ($result02->num_rows > 0) {
	// output data of each row
	while($row02 = $result02->fetch_assoc()) { 
		$woeid02 = $row02["woeid"]; 
		print $woeid02;

		if(empty($woeid02)){ 
			echo "disini aja";
		}


	}
}
?>