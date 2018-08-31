<?php 
date_default_timezone_set('Asia/Jakarta');   
 
//print $_SERVER['DOCUMENT_ROOT']." - ".PATH_LIBS;
/* ========== ROUTES =========== */
define('PATH_WEB'   , $_SERVER['DOCUMENT_ROOT']."/1000/dashboard");  
define('PATH_LIBS'  , $_SERVER['DOCUMENT_ROOT'].'/1000/system/helpers'); 
define('PATH_ADODB' , PATH_LIBS."/adodb5"); 
define('PATH_SMARTY', PATH_LIBS."/smarty3"); 
define('PATH_LIBRA', PATH_LIBS."/inc"); 

$UPLOAD_PATH             = PATH_WEB."/pageimages";
$DIR_pages               = $UPLOAD_PATH."/pages";  

$Paging = array('Minimum'=>1,'Maximum'=>120,'Default'=>120); 

require PATH_ADODB."/adodb.inc.php"; 
require PATH_SMARTY."/libs/Smarty.class.php";
require PATH_LIBRA."/library.php";

#require_once '../system/helpers/facebook/fbv.5/autoload.php'; 
#require_once '../system/helpers/HTMLPurifier/HTMLPurifier.auto.php'; 
require_once('../system/helpers/twitteroauth/twitteroauth.php');
 
$DB =& ADONewConnection($DSN);

//print $_GET['show'];
// Smarty Template Initialization
$tpl = new Smarty; 
if($_GET['show']){
	//$tpl->template_dir = 'views/'.$_GET['show']; 
	$tpl->template_dir = 'views/'; 
}else{
	$tpl->template_dir = 'views/'; 
}
$tpl->compile_dir  = 'newcompile/'; 

$tpl->assign('vendor_url','http://'.$_SERVER['SERVER_NAME'].'/1000');  
$tpl->assign('base_url','http://'.$_SERVER['SERVER_NAME'].'/1000/dashboard');
$tpl->assign('asset_url','http://'.$_SERVER['SERVER_NAME'].'/1000/system');