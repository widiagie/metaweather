
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

				