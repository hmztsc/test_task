<?php
$query = $cxl->query("show create table hmztsc.b");

$sql = "CREATE DATABASE `hmztsc` /*!40100 DEFAULT CHARACTER SET utf8 */ /*!80016 DEFAULT ENCRYPTION='N' */";
$sql2 = "CREATE TABLE `hmztsc`.`a` ( `id` int NOT NULL AUTO_INCREMENT, `name` varchar(25) NOT NULL, `phone` varchar(15) NOT NULL, `birthdate` date NOT NULL, `create_at` datetime NOT NULL, `status` tinyint(1) NOT NULL, PRIMARY KEY (`id`) ) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci";
$sql3 = "CREATE TABLE `hmztsc`.`b` ( `id` int NOT NULL AUTO_INCREMENT, `phone` varchar(15) NOT NULL, PRIMARY KEY (`id`) ) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci";

$sql4 = "CREATE TABLE `hmztsc`.`c` ( `id` int NOT NULL AUTO_INCREMENT, `name` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL, `phone` varchar(15) NOT NULL, `birthdate` date NOT NULL, `create_at` datetime NOT NULL, `status` tinyint(1) NOT NULL, PRIMARY KEY (`id`) ) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci";
$cxl->query($sql);
$cxl->query($sql2);
$cxl->query($sql3);
$cxl->query($sql4);

if(!$cxl->query($sql) && !$cxl->query($sql2) && !$cxl->query($sql3) && !$cxl->query($sql4)){
   echo "Database installation was successfull. Redirecting index.html in 5 seconds";
   Header("Refresh:5 app/index.html");
}
