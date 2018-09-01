<?php

function getName($table, $item_id, $field_id='ID', $field_name='name') {
    global $DB;
    $qtxt="SELECT $field_name FROM $table WHERE $field_id='$item_id'";
    //print $qtxt."<hr>";
    $result=$DB->execute($qtxt);
    $return=$result->fields[0];
    return $return;
}

function checkFile($filetype,$allowed) {
    $jpg = array ("image/pjpeg", "image/jpg", "image/jpeg");
    $png = array ("image/png");
    $gif = array ("image/gif");
    $txt = array ("text/plain");
    $pdf = array ("application/pdf","application/x-download");
    $csv = array ("application/vnd.ms-excel","application/octet-stream");
    $doc = array ("application/msword");
    $zip = array ("application/x-zip-compressed");
    $mp3 = array ("audio/mpeg");

    if ($allowed == 'all') $allowed = "jpg,png,gif,txt,csv,zip,pdf,doc,docx";
    if ($allowed == 'image') $allowed = "jpg,png";
    if ($allowed == 'imageplus') $allowed = "jpg,png,gif";
    if ($allowed == 'doc') $allowed = "pdf,txt,csv,doc";
    if ($allowed == 'audio') $allowed = "mp3";
    $types = split(',',$allowed);
    #print $filetype."<br>";
    #print_r($types);
    $i = 0;
    foreach($types as $type) {
       //print $filetype.'<br>';
       //print_r($$type);
       if(in_array($filetype,$$type)) $i++;
    }
    if ($i > 0) { return true; } else {
        return $return['error'] = "Filetype $filetype are not allowed, sorry!";
    }
}


function uploadFile($file,$Dir,$rename_style = '', $prefix = '') {

    list($width,  $height) = getimagesize($file['tmp_name']);
    if($width > '750') {
	$newwidth = '750'; 
        $newheight = ($newwidth/$width)*$height;
    }else{
        if($height > '550') {
	    $newheight = '550';
            $newwidth = ($newheight/$height)*$width;
	}else{
	    $newwidth = $width;
            $newheight = $height;
	}
    }

    $thumb = imagecreatetruecolor($newwidth,$newheight);
    $source = imagecreatefromjpeg($file['tmp_name']);
    imagecopyresized($thumb,  $source,  0,  0,  0,  0, $newwidth, $newheight,  $width,  $height);  

    if (isset($rename_style)) {
        $x=0;
        do { 
            $new_filename = renameFile($file['name'], $rename_style,$prefix);
            $x++;
            if ($x == 10) { $return['error'] = "Error file renaming"; return $return; }
        }while ( file_exists("$Dir/$new_filename") );
    }
    else {
        $new_filename = $file['name'];
    }
    
    imagejpeg($thumb, "$Dir/$new_filename",  85);
    $return['filename'] = $new_filename;
    return $return;
}

function uploadFile2($file,$Dir,$rename_style = '', $prefix = '') {
	 global $DIR_Temp;

    //checking directory permissions
    //if ( !is_writable ($DIR_Temp) ) { $return['error'] = "Can't write to temporary directory <b>$DIR_temp</b>"; return $return; }
    if ( !is_writable ($Dir) ) { $return['error'] = "Can't write to directory <b> $Dir</b>"; return $return; }
    //move_uploaded_file ($file['tmp_name'],"$DIR_Temp/".$file['name']);
    if (isset($rename_style)) {
        $x=0;
        do {
            $new_filename = renameFile($file['name'], $rename_style,$prefix);
            $x++;
            if ($x == 10) { $return['error'] = "Error file renaming"; return $return; }
        }while ( file_exists("$Dir/$new_filename") );
    }
    else {
        $new_filename = $file['name'];
    }
    //copy ("$DIR_Temp/".$file['name'],"$Dir/$new_filename");
    copy ($file['tmp_name'],"$Dir/$new_filename");
    //unlink ("$DIR_Temp/".$file['name']);
    $return['filename'] = $new_filename;
    return $return;
}

function renameFile ($filename, $style, $prefix = '') {
    if ($style = 'rnd') $token = uniqid(rand());
    elseif ($style = 'md5') {
       $token = md5( uniqid( rand( ) ) );
    }
    elseif ($style = 'timestamp') {
       $now = getdate();
       foreach ($now as $key=>$value){
           if(strlen($value) == 1) $now[$key] = "0".$value;
       }
       $token = $now['year'].$now['mon'].$now['mday'].$now['hours'].$now['minutes'].$now['seconds'];
    }
    else {
       return $filename;
    }
    $elements = explode('.', $filename);
    $max = count($elements) -1;
    $ext = $elements[$max];
    if ( $prefix != '') {
       $return = $prefix."-".$token.".".$ext;
    }
    else {
       $return = $token.".".$ext;
    }
    return $return;
}
 
function CutCharacter($content,$CharLength){
   $char_ok = array (' ','.',',');
   if(strlen($content)>$CharLength){
	  while (!in_array(substr($content,$CharLength,1),$char_ok)) {
	     $CharLength--;
	  }
	}
	$Content = substr($content,0,$CharLength);
	return $Content;
}
 

function make_bitly_url($url,$login,$appkey,$format = 'xml',$version = '2.0.1')
{
        //create the URL
        $bitly = 'http://api.bit.ly/shorten?version='.$version.'&amp;longUrl='.urlencode($url).'&amp;login='.$login.'&amp;apiKey='.$appkey.'&amp;format='.$format;
        
        //get the url
        //could also use cURL here
        $response = file_get_contents($bitly);
       //print $response;
        
        //parse depending on desired format
        if(strtolower($format) == 'json')
        {
                $json = @json_decode($response,true);
                return $json['results'][$url]['shortUrl'];
        }
        else //xml
        {
                $xml = simplexml_load_string($response);
                return 'http://bit.ly/'.$xml.'-&gt;results-&gt;nodeKeyVal-&gt;hash';
        }
}

?>
