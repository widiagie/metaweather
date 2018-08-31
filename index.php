<?php
	session_start(); 

	date_default_timezone_set('Asia/Jakarta');

	require_once "config/func.php";
 	
 	$dataAPI = getContent("https://www.metaweather.com/api/location/search/?query=jakarta"); 
 	//test($dataAPI);
  
 	$arrAPI = "";
 	$arrAPIdetail = "";
 	$i=0;
	if ( count($arrAPI) > 0 ){
		foreach ( $dataAPI as $data_API ) {
			$title_city_wheather = $data_API["title"];
			$id_city_wheather = $data_API["woeid"];

			$dataDetail = getContent("https://www.metaweather.com/api/location/".$id_city_wheather."/"); 
 			test($dataDetail);

 			if ( count($arrAPIdetail) > 0 ){
 				foreach ( $dataDetail as $data_API_detail ) {
 					$id =  $data_API_detail ["id"];
                    $weather_state_name 		= $data_API_detail["weather_state_name"];
                    $weather_state_abbr 		= $data_API_detail["weather_state_abbr"];
                    $wind_direction_compass  	= $data_API_detail["wind_direction_compass"];
                    $created  					= $data_API_detail["created"];
                    $applicable_date 			= $data_API_detail["applicable_date"];
                    $min_temp					= $data_API_detail["min_temp"];
                    $max_temp  					= $data_API_detail["max_temp"];
                    $the_temp					= $data_API_detail["the_temp"];
                    $wind_speed  				= $data_API_detail["wind_speed"];
                    $wind_direction 			= $data_API_detail["wind_direction"];
                    $air_pressure				= $data_API_detail["air_pressure"];
                    $humidity					= $data_API_detail["air_pressure"];
                    $visibility					= $data_API_detail["visibility"];
                    $predictability 			= $data_API_detail["predictability"];
 				}
 			}

		}
	}


	//