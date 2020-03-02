<?php
session_start();

$obj = new stdClass();
$obj->success=false;
$obj->message ="Mauvais identifiant ou mot de passe";
$found=false;
//$found = true;
if ($_POST['username'] =='oui')
  $found = true;
if($found) {
    $obj->success = true;
    $_SESSION['user']=1;
}
header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json');

echo json_encode($obj);