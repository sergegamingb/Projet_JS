<?php
 session_start();

 include_once 'DataBase.php';

$obj = new stdClass();
$user = $_SESSION['user'];

$id = getElement('Id',$user,'identifiant','User');


foreach ($id as $value) {
    $id = $value['Id'];
    $note= getNote('Content,Id,Objet,dateEnvoi,heureEnvoi,emailNote',$id);
    $obj->note = $note;
    if ($note == null)
    {
        $obj->success = false;
        $obj->message="Ajoutez une note pour pouvoir les supprimer ou les modifier";
    }
}

header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json');
echo json_encode($obj);

