<?php

session_start();

//require_once('auth.php');
//error_reporting(E_ALL); ini_set('display_errors', 'On'); 
ob_start();
//Include database connection details
require_once('dbconnection.php');

$fields = array();
$params = array();

if (isset($_SESSION['SESS_USER_NAME']) && !empty($_SESSION['SESS_USER_NAME'])) {
    array_push($fields, "userName");
    array_push($params, $_SESSION['SESS_USER_NAME']);
}

if (isset($_GET["location"]) && !empty($_GET["location"])) {
    array_push($fields, "location");
    array_push($params, $_GET["location"]);
}

if (isset($_GET["pageName"]) && !empty($_GET["pageName"])) {
    array_push($fields, "pageName");
    array_push($params, $_GET["pageName"]);
}

if (isset($_GET["linkName"]) && !empty($_GET["linkName"])) {
    array_push($fields, "linkName");
    array_push($params, $_GET["linkName"]);
}

$query = "INSERT INTO log (" . implode(",", $fields) . ") "
        . "VALUES ('" . implode("','", $params) . "')";

mysql_query($query);

?>
