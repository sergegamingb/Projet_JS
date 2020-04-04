<?php

session_start();
require_once 'DataBase.php';

$obj = new stdClass();
$obj->success = false;

$username = htmlspecialchars($_POST['user']);
$email = htmlspecialchars($_POST['email']);
$pass = htmlspecialchars($_POST['pass']);
$pass2 = htmlspecialchars($_POST['pass2']);

if ($username == null) {
    $obj->message='Mettez un pseudo';
}

else if (get('identifiant','User', $username))
{
    $obj->message='Pseudo déjà existant';
}

else if ($email == null) {
    $obj->message='Mettez une adresse email';
}
else if (!filter_var($email,FILTER_VALIDATE_EMAIL)){
    $obj->message='Adresse email invalide';
}
else if (get('email','User',$email)) {
    $obj->message='Adresse email déjà utilisé';
}

else if ($pass == null) {
    $obj->message='Mettez un mot de passe';
}

else if ($pass2 == null || $pass != $pass2) {
    $obj->message='Les mots de passe ne correspondent pas';
}

else {
    $obj->success = true;
    InsertUser($username,$email,$pass);
    $_SESSION['user']=$username;
}
header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json');

echo json_encode($obj);