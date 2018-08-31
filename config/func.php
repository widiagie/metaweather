<?php 
function test($x,$exit=0)
{
	echo $res = "<pre>";
	if(is_array($x) || is_object($x)){
		echo print_r($x);
	}else{
		echo var_dump($x);
	}
	echo "</pre><hr />";
	if($exit==1){ die(); }
}

function getcurl($geturl)
{
	$ch= curl_init();
	// set url
	curl_setopt($ch, CURLOPT_URL, $geturl);
	//return the transfer as a string
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	// $output contains the output string
	$output = curl_exec($ch); 
	// close curl resource to free up system resources
	curl_close($ch);   
	$curlname =  json_decode($output,true);
	return $curlname;
}

function getContent($geturl)
{
  $request = file_get_contents($geturl); //example ID
  $jsonPHP  =  json_decode($request, True); 
  return $jsonPHP;
}

function RandomString()
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randstring = '';
    for ($i = 0; $i < 8; $i++) {
        $randstring = $characters[rand(0, strlen($characters))];
    }
    return $randstring;
}

function check_url($url) {

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HEADER, 1);
    curl_setopt($ch , CURLOPT_RETURNTRANSFER, 1);
    $data = curl_exec($ch);
    $headers = curl_getinfo($ch);
    curl_close($ch);

    return $headers['http_code'];
}

function print_number_count($number) {
    $units = array( '', 'K', 'M', 'B');
    $power = $number > 0 ? floor(log($number, 1000)) : 0;
    if($power > 0)
        return @number_format($number / pow(1000, $power), 2, ',', ' ').' '.$units[$power];
    else
        return @number_format($number / pow(1000, $power), 0, '', '');
}

function thousandsCurrencyFormat($num) {
  $x = round($num);
  $x_number_format = number_format($x);
  $x_array = explode(',', $x_number_format);
  $x_parts = array('K', 'M', 'B', 'T');
  $x_count_parts = count($x_array) - 1;
  $x_display = $x;
  $x_display = $x_array[0] . ((int) $x_array[1][0] !== 0 ? ',' . $x_array[1][0] : '');
  $x_display .= $x_parts[$x_count_parts - 1];
  return $x_display;
}