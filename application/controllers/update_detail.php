<?php     
	$now = date("Y-m-d H:i:s"); 
	$exist_id = $DB->getRow("SELECT id FROM weather WHERE id=".$id."");  

	if(empty(@$exist_id['id'])){
		$created_at = date('Y-m-d H:i:s', strtotime($created));
		$query_addtxt = "insert into weather (id,woeid,weather_state_name,weather_state_abbr,wind_direction_compass,created,applicable_date,min_temp,max_temp,the_temp,wind_speed,wind_direction,air_pressure,humidity,visibility,predictability,submit_date) value ('".$id."','".$woeid."','".$weather_state_name."','".$weather_state_abbr."','".$wind_direction_compass."','".$created_at."','".$applicable_date."','".$min_temp."','".$max_temp."','".$the_temp."','".$wind_speed."','".$wind_direction."','".$air_pressure."','".$humidity."','".$visibility."','".$predictability."','".$now."')"; 
		$DB->execute($query_addtxt);
	} 
?>