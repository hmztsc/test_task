<?php
include '../../connection.php';
header('Content-Type: application/json; charset=utf-8');

function getRows($sql){
   global $cxl;
   $query = $cxl->query($sql);
   $array = $query->fetch_all(MYSQLI_ASSOC);
   return $array;
}

if($btn == "btn1"){
   $rows1 = getRows("SELECT * FROM hmztsc.a");
   $rows[] = $rows1;

}
if($btn == "btn2"){
   $rows1 = getRows("SELECT * FROM hmztsc.a");
   $rows2 = getRows("SELECT * FROM hmztsc.b");
   $rows3 = getRows("SELECT * FROM hmztsc.c");

   $rows[] = $rows1;
   $rows[] = $rows2;
   $rows[] = $rows3;
}
if($btn == "btn3"){
   $rows1 = getRows("SELECT * FROM hmztsc.c");
   $rows2 =  getRows("SELECT * FROM hmztsc.b");

   $rows[] = $rows1;
   $rows[] = $rows2;
}
if($btn == "btn4"){
   $rows1 = getRows("SELECT * FROM hmztsc.b ORDER BY `id` ASC");
   $rows[] = $rows1;
}
if($btn == "btn5"){
   $rows1 = getRows("SELECT * FROM hmztsc.b ORDER BY `id` DESC");
   $rows[] = $rows1;
}
echo json_encode($rows);