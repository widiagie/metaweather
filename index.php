<?php
	session_start(); 

	date_default_timezone_set('Asia/Jakarta');

	require_once "config/func.php";
 
	include('header.php');

	$today = date("Y-m-d"); 
 ?>
 	<body>
		
		<div class="site-content">  
			<div class="hero" data-bg-image="images/banner.png">
				<div class="container">
					<form action="#" class="find-location">
						<input type="text" placeholder="Find your location...">
						<input type="submit" value="Find">
					</form>

				</div>
			</div>
			<div class="forecast-table">
				<div class="container">
					<div class="forecast-container">
						
						 
					

<?php
 	$dataAPI = getContent("https://www.metaweather.com/api/location/search/?query=jakarta"); 
 	#test($dataAPI);
  
 	$arrAPI = "";
 	$arrAPIdetail = "";
 	$i=0;
	if ( count($arrAPI) > 0 ){
		foreach ( $dataAPI as $data_API ) {
			$title					= $data_API["title"];
			$location_type 			= $data_API["location_type"];
			$woeid 					= $data_API["woeid"];
			$latt_long 				= $data_API["latt_long"];

			$dataDetail = getContent("https://www.metaweather.com/api/location/".$woeid."/"); 
 			#test($dataDetail);

 			if ( count($dataDetail["consolidated_weather"]) > 1 ){
 				 
 				foreach ( $dataDetail["consolidated_weather"] as $data_API_detail ) {
 					$id 						= $data_API_detail["id"];
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
                    $humidity					= $data_API_detail["humidity"];
                    $visibility					= $data_API_detail["visibility"];
                    $predictability 			= $data_API_detail["predictability"];
                    $svgimg						= "<img src=\"https://www.metaweather.com/static/img/weather/".$weather_state_abbr.".svg\" width=48>"

                    /*
                    print $id."<br>";
                    print $weather_state_name."<br>";
                    print "<img src=\"https://www.metaweather.com/static/img/weather/ico/".$weather_state_abbr.".ico\">".$weather_state_abbr."<br>";
                    print $wind_direction_compass."<br>";
                    print $created."<br>";
                    print $applicable_date."<br>";
                    print $min_temp."<br>";
                    print $max_temp."<br>";
                    print $the_temp."<br>";
                    print $wind_speed."<br>";
                    print $air_pressure."<br>";
                    print $humidity."<br>";
                    print $visibility."<br>";
                    print $predictability."<hr>";
					*/
?>

					<?php if($applicable_date == $today) { ?>

						<div class="today forecast">
							<div class="forecast-header">
								<div class="day"><?php echo date('l', strtotime($dataDetail["consolidated_weather"][0]["applicable_date"])); ?></div>
								<div class="date"><?php echo date('d F Y', strtotime($dataDetail["consolidated_weather"][0]["applicable_date"])); ?></div>
							</div> <!-- .forecast-header -->
							<div class="forecast-content">
								<div class="location"><?php echo $title; ?></div>
								<div class="degree">
									<div class="num"><?php echo ceil($dataDetail["consolidated_weather"][0]["the_temp"]); ?><sup>o</sup>C</div>
									<div class="forecast-icon">
										<?php echo "<img src=\"https://www.metaweather.com/static/img/weather/".$dataDetail["consolidated_weather"][0]["weather_state_abbr"].".svg\" width=90>"; ?>
									</div>	
								</div>
								<span> <?php echo ceil($dataDetail["consolidated_weather"][0]["max_temp"]); ?><sup>o</sup>C / <?php echo ceil($dataDetail["consolidated_weather"][0]["min_temp"]); ?> <sup>o</sup>C <H2><?php echo $dataDetail["consolidated_weather"][0]["weather_state_name"]; ?></H2> </span>
								<span><img src="images/icon-umberella.png" alt=""><?php echo ceil($dataDetail["consolidated_weather"][0]["predictability"]); ?>%</span>
								<span><img src="images/icon-wind.png" alt=""><?php echo ceil($dataDetail["consolidated_weather"][0]["wind_speed"]); ?>km/h - <?php  echo $dataDetail["consolidated_weather"][0]["wind_direction_compass"]; ?></span>
								<span><img src="images/icon-compass.png" alt=""><?php echo ceil($dataDetail["consolidated_weather"][0]["visibility"]); ?>mph</span>
							</div>
						</div>

						<?php }else{ ?> 

						<div class="forecast">
							<div class="forecast-header">
								<div class="day"><?php echo date('l', strtotime($applicable_date)); ?></div>
							</div> <!-- .forecast-header -->
							<div class="forecast-content">
								<div class="forecast-icon">
									<?php echo $svgimg; ?>
								</div>
								<div class="degree"><?php echo ceil($the_temp);?><sup>o</sup>C</div>
								<div class="day"><small><?php echo $weather_state_name; ?></small></div><br>
								<div class="day"> <?php echo ceil($max_temp);?><sup>o</sup>C  /  <?php echo ceil($min_temp);?><sup>o</sup>C</div>
							</div>
						</div>

					<?php } ?>

<?php
 				}
 			}

		}
	}

?>

					</div>
				</div>
			</div>
 	
<?php include('footer.php'); ?>