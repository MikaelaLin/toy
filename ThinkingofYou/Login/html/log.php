<?php

session_start();

echo "howdeh11\n";
//require_once('auth.php');
//error_reporting(E_ALL); ini_set('display_errors', 'On'); 
ob_start();
//Include database connection details
require_once('dbconnection.php');

echo "wubwubwub\n";

$query = "INSERT INTO log (userName,location, pageName, linkName)
VALUES ('" . $_SESSION['SESS_USER_NAME'] . "', '" . $_GET["location"] . "', '" . $_GET["pageName"] . "', '" . $_GET["linkName"] . "')";

mysql_query($query);

echo $query;

?>
