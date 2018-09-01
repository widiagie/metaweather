<?php 
/* Database Configuration */
define('DB_TYPE','mysql');
define('DB_HOST','localhost'); 
define('DB_USER','root');
define('DB_PASS',''); 
define('DB_DEFAULT','metaweather');

$DSN =  DB_TYPE."://".DB_USER.":".DB_PASS."@".DB_HOST."/".DB_DEFAULT; 
  
require "application/vendor/adodb5/adodb.inc.php"; 
require "application/vendor/libraries/library.php";

$DB =& ADONewConnection($DSN);