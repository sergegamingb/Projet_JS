<?php
session_start();
include_once 'DataBase.php';

$obj = new stdClass();
$obj->success=false;
$found = false;

$username = htmlspecialchars($_POST['username']);
$password = htmlspecialchars($_POST['password']);
//$found = true;
if (get('identifiant',$username,$password)) {
    $found=true;
}

if ($found) {
    $obj->success = true;
    $_SESSION['user']=$username;
    mail('alexpilaus@gmail.com','oui','tpppptptptpt');
}
$obj->message ="Mauvais identifiant ou mot de passe";

header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json');

echo json_encode($obj);