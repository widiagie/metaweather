<?php

$result = $DB->getAll("select woeid,title,location_type,latt_long,update_date from locations order by title asc");
	$i=0;
	if($result){
		foreach($result as $fields){
			$list[$i++]=array(	
				'woeid'=>$fields['woeid'],
				'title'=>$fields['title'],
				'latt_long'=>$fields['latt_long'],
				'location_type'=>$fields['location_type']									
			);
		}
	}

include('application/views/list.php');

?>