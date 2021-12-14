<?php

$hostname = "localhost";
$username = "root";
$password = "1234";

// Create connection
$cxl = new mysqli($hostname, $username, $password);
// Check connection
if ($cxl->connect_error) {
   die("Connection failed: " . $cxl->connect_error);
}
$cxl->set_charset("UTF8");

array_walk_recursive($_POST, function (&$value) {
   global $cxl;
   $value = $cxl->real_escape_string($value);
   $value = htmlentities($value);
   if(gettype($value) == "string")
   $value = trim($value);
});
extract($_POST);

array_walk_recursive($_GET, function (&$value) {
   global $cxl;
   $value = $cxl->real_escape_string($value);
   $value = htmlentities($value);
   if(gettype($value) == "string")
   $value = trim($value);
});
extract($_GET);