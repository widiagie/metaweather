<?php 
/* Database Configuration */
define('DB_TYPE','mysql');
define('DB_HOST','internal-db.s85409.gridserver.com'); 
define('DB_USER','db85409_ibuibu');
define('DB_PASS','POlkj098!@#'); 
define('DB_DEFAULT','db85409_1000_influencers');

$DSN =  DB_TYPE."://".DB_USER.":".DB_PASS."@".DB_HOST."/".DB_DEFAULT; 

define('CONSUMER_KEY', '9LCKrEnwPkzYqiWuGEC0UnlqQ');
define('CONSUMER_SECRET', 'U96svNeKxHQlvUJQeO1YSRXgmiEvEhbst2rio035ZQVvk5g6wz');
define('OAUTH_CALLBACK', 'http://rnd.camp-apps.com/1000/dashboard/callback.php');
define('ACCESS_TOKEN', '183114555-peVnILHPUIrgyAMx6t4QugcdF0xqw33ko4p0fr9Q');
define('ACCESS_TOKEN_SECRET', 'yjX0r2TjKCnq5wQAKrUHMqmR40ChESas5OOLspPUCrn63');

/* Google App Client Id */
define('CLIENT_ID', '219462732799-e9h2i48atj9m1r1siqgjoepvf77m6pcg.apps.googleusercontent.com'); 
/* Google App Client Secret */
define('CLIENT_SECRET', 'Un7mbqBUMUdw1O8LQOc0vipv'); 
/* Google App Redirect Url */
define('CLIENT_REDIRECT_URL', 'http://rnd.camp-apps.com/1000/dashboard/googleredirect.php');