<?php

session_start();

include_once 'DataBase.php';

$obj = new stdClass();
$id =$_GET['id'];
$object = htmlspecialchars($_POST['object']);
$email = htmlspecialchars($_POST['mail']);
$content = htmlspecialchars($_POST['mNote']);
$date = htmlspecialchars($_POST['dates']);
$hour = htmlspecialchars($_POST['hour']);
if($content != null && $date != null && $hour != null && $object != null ) {
    update($id,'Objet',$object);
    update($id,'emailNote',$email);
    update($id,'Content',$content);
    update($id,'dateEnvoi',$date);
    update($id,'heureEnvoi',$hour);

    $obj->success = true;
    $obj->message ="Note modifiée avec succés";
}
else if ($object == null) {
    $obj->success = false;
    $obj->message="Veullez saisir un objet puis réesayer";
}
else if ($mail == null) {
    $obj->success = false;
    $obj->message ="Mail vide veuillez le remplir et réessayer";
}
else if ($note == null) {
    $obj->success = false;
    $obj->message="Veuillez saisir une note puis réesayer";
}
else if ($date == null || $hour == null ) {
    $obj->success = false;
    $obj->message ="Date vide ou indisponible veuillez réesayer";
}



header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json');
echo json_encode($obj);
