<?php
session_start();
include_once 'DataBase.php';

$obj = new stdClass();
$obj->success=false;
$found = false;

$username = htmlspecialchars($_POST['username']);
$password = htmlspecialchars($_POST['password']);
$id = getElement('Id',$username,'identifiant','User');
//$found = true;
if (getUser('identifiant',$username,$password,'User')) {
    $found=true;
}

if ($found) {
    $obj->success = true;
    $_SESSION['user']=$username;
}
$obj->message ="Mauvais identifiant ou mot de passe";

header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json');

echo json_encode($obj);