<?php
session_start();

$obj=new stdClass();
$obj->success=false;
if(isset($_SESSION['user'])){
    $obj->user = $_SESSION['user'];
    $obj->success=true;
}

header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json');

echo json_encode($obj);