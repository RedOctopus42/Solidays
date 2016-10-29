<?php
set_time_limit(0); // make the script run for an infinite amount of time
ini_set('default_socket_timeout', 300);
session_start();
ini_set('display_errors', 0);

/*-------- Database (MySQL) --------*/	

define("HOST"     ,	'cl2-sql2'); //database Host
define("DATABASE" ,	'p757_10'); //database name
define("USERNAME" ,	'p757_10'  ); //database name
define("PASSWORD" ,	'sms_coca'); //database 
mysql_connect (HOST, USERNAME, PASSWORD)or die("Could not connect: ".mysql_error());
mysql_select_db(DATABASE) or die(mysql_error());
mysql_query("SET NAMES 'utf8'");

?>