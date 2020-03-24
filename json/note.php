<?php
session_start();
include_once 'DataBase.php';

$obj=new stdClass();
$obj->success=false;
date_default_timezone_set('Europe/Paris');
$date = htmlspecialchars($_POST['dates']);
$note = htmlspecialchars($_POST['mNote']);
$hour = htmlspecialchars($_POST['hour']);
$pseudo=$_SESSION['user'];
$mail = getMail('email',$pseudo);



if($note != null && $date != null) {
    InsertNote($note,$date,$hour);
    $obj->success = true;
    $obj->message="Note ajouté avec succés";
    if($date == date("Y-m-d" ) && $hour == date('H:i')){
        sendMail($mail,$note);
    }

}
else if ($note == null) {
    $obj->message="Veuillez saisir une note puis réesayer";
}
else if ($date == null) {
    $obj->message ="Date manquante ou indisponible veuillez réesayer";
}



header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json');

echo json_encode($obj);
