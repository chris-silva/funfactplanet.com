<?php // login.php
session_start();
/*
$db_hostname = 'localhost';
$db_database = 'csil216_funfacts';
$db_username = 'csil216_chrisS30';
$db_password = '<*770uip^tv';
*/


define("DB_NAME", 'funfacts');
define("DB_USER", 'root');
define("DB_PASSWORD", '');
define("DB_HOST", 'localhost');

/*
//published website

define("DB_NAME", 'csil216_funfacts');
define("DB_USER", 'csil216_chrisS30');
define("DB_PASSWORD", '<*770uip^tv');
define("DB_HOST", 'localhost');
*/

//$db_server = mysqli_connect($db_hostname, $db_username, $db_password);
//$link = mysqli_connect("localhost", "root", "", "funfacts");
//$link = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);

$link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

/*
if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}
*/
	//if (!$db_server) die("Unable to connect to MySQL: " . mysql_error());
	

	//mysqli_select_db(/*$db_database*/ $link, "funfacts") or die("Unable to select database: " . mysql_error());
mysqli_select_db($link, DB_NAME ) or die("Unable to select database: " . mysql_error());
	
//session_start();


?>