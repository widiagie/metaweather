<?php     
	$now = date("Y-m-d H:i:s"); 
	$exist_file = $DB->getRow("SELECT woeid FROM locations WHERE woeid=".$woeid."");  

	if(empty(@$exist_file['woeid'])){
		if(isset($woeid)){
			$query_addtxt = "insert into locations (woeid,title,location_type,latt_long,update_date) value ('".$woeid."','".$title."','".$location_type."','".$latt_long."','".$now."')";
			$DB->execute($query_addtxt);
		}
	}else{
		if(isset($woeid)){
			$query_updatetxt = "update locations set latt_long='".$latt_long."', update_date='".$now."'  where woeid='".$woeid."' "; 
			$DB->execute($query_updatetxt);
		}
	} 
?>