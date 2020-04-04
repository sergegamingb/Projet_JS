<?php
session_start();
require_once  'DataBase.php';

$obj=new stdClass();
$obj->success=false;
date_default_timezone_set('Europe/Paris');
$date = htmlspecialchars($_POST['dates']);
$note = htmlspecialchars($_POST['mNote']);
$hour = htmlspecialchars($_POST['hour']);
$object = htmlspecialchars($_POST['object']);
$pseudo=$_SESSION['user'];
$info = getElement('Id,email',$pseudo,'identifiant','User');
foreach ($info as $row) {

    $id = $row['Id'];
    $mail = $row['email'];
    if($note != null && $date != null && $hour != null && $object != null ) {
        InsertNote($note,$date,$hour,$id,$mail,$object);
        $obj->success = true;
        $obj->message="Note ajouté avec succés";
    }
    else if ($object == null) {
        $obj->message="Veullez saisir un objet puis réesayer";
    }
    else if ($note == null) {
        $obj->message="Veuillez saisir une note puis réesayer";
    }
    else if ($date == null || $hour == null ) {
        $obj->message ="Date manquante ou indisponible veuillez réesayer";
    }

}



header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json');

echo json_encode($obj);
