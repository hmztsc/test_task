<?php 
include("connection.php");

$query = $cxl->query("show databases;");
while($tempArray = $query->fetch_assoc()){
   $databases[$tempArray['Database']] = "";
}

if(array_key_exists('hmztsc', $databases)){

   // echo "Database is exist";
   
   $query = $cxl->query("show tables from hmztsc;");
   while($tempArray = $query->fetch_assoc()){
      $tables[$tempArray['Tables_in_hmztsc']] = "";
   }

   if(array_key_exists('a', $tables) && array_key_exists('b', $tables) && array_key_exists('c', $tables)){
      // echo "a b c tables exist";
      Header("Location: app/index.html");
      exit;
   } else {
      echo "Database installation was not successfull. Please drop the database and try again.";
   }

} else {
   include("db/create.php");
}