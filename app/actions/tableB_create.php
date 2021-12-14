<?php
include '../../connection.php';

header('Content-Type: application/json; charset=utf-8');


$sql = "INSERT INTO hmztsc.`b` (`phone`) VALUES ('$phone')";
if($query = $cxl->query($sql)){
   $result['status'] = "success";
} else {
   $result['status'] = "error";
   $result['message'] = $cxl->error;
}

echo json_encode($result);