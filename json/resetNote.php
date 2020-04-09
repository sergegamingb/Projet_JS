<?php

session_start();

include_once 'DataBase.php';

$obj = new stdClass();
$id =$_GET['id'];

delete($id);
$obj->success = true;

header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json');
echo json_encode($obj);