<?php
     $today = date("Y-m-d");
     
     $dataAPI = getContent("https://www.metaweather.com/api/location/search/?query=jakarta"); 
     #test($dataAPI);
  
     $arrAPI = "";
     $arrAPIdetail = "";
     $i=0;
     if ( count($arrAPI) > 0 ){
          foreach ( $dataAPI as $data_API ) {
               $title                        = $data_API["title"];
               $location_type                = $data_API["location_type"];
               $woeid                        = $data_API["woeid"];
               $latt_long                    = $data_API["latt_long"];

               $dataDetail = getContent("https://www.metaweather.com/api/location/".$woeid."/"); 
               #test($dataDetail);

               if (count($dataDetail["consolidated_weather"]) > 0 ){
                     
                    foreach ($dataDetail["consolidated_weather"] as $data_API_detail ) {
                         
                         $id                           = $data_API_detail["id"];
                         $weather_state_name           = $data_API_detail["weather_state_name"];
                         $weather_state_abbr           = $data_API_detail["weather_state_abbr"];
                         $wind_direction_compass       = $data_API_detail["wind_direction_compass"];
                         $created                      = $data_API_detail["created"];
                         $applicable_date              = $data_API_detail["applicable_date"];
                         $min_temp                     = $data_API_detail["min_temp"];
                         $max_temp                     = $data_API_detail["max_temp"];
                         $the_temp                     = $data_API_detail["the_temp"];
                         $wind_speed                   = $data_API_detail["wind_speed"];
                         $wind_direction               = $data_API_detail["wind_direction"];
                         $air_pressure                 = $data_API_detail["air_pressure"];
                         $humidity                     = $data_API_detail["humidity"];
                         $visibility                   = $data_API_detail["visibility"];
                         $predictability               = $data_API_detail["predictability"];
                         $svgimg                       = "<img src=\"https://www.metaweather.com/static/img/weather/".$weather_state_abbr.".svg\" width=48>";
  
                         
                         include('application/views/home.php');

                    }
               }

          }
     }

?>