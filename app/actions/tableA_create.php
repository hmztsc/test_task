<?php
include '../../connection.php';

header('Content-Type: application/json; charset=utf-8');

$birthdate = date("Y-m-d", strtotime($birthdate));

$sql = "INSERT INTO hmztsc.`a` (`name`,`phone`,`birthdate`,`create_at`,`status`) VALUES ('$name','$phone','$birthdate', NOW(), '$status')";
if($query = $cxl->query($sql)){
   $result['status'] = "success";
} else {
   $result['status'] = "error";
   $result['message'] = $cxl->error;
}

echo json_encode($result);