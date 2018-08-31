<?php
	session_start(); 

	date_default_timezone_set('Asia/Jakarta');

	require_once "config/func.php";
 	
 	$dataAPI = getContent("https://www.metaweather.com/api/location/search/?query=jakarta"); 
 	test($dataAPI);
  
 	$arrAPI = "";
 	$i=0;
	if ( count($arrAPI) > 0 ){
		foreach ( $dataAPI as $data_API ) {
			$title_wheather = $data_API["title"];
			print $title_wheather."<br>";
		}
	}