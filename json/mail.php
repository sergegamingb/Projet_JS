<?php

require_once "DataBase.php";

$user = getOne('identifiant','User');
$id = getElement('Id',$user,'identifiant','User');
$dateEnvoi = getData('dateEnvoi',$id);
$heureEnvoi = getData('heureEnvoi',$id);
$content = getData('Content',$id);

var_dump($content);
$mail = getMail('email',$id);


date_default_timezone_set('Europe/Paris');
if ($dateEnvoi == date("Y-m-d") && $heureEnvoi < date("H:i")) {
    mail($mail,'Note', (string)$content);
    var_dump($content);
    deleteNote();

}




