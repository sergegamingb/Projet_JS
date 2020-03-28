<?php

require_once "DataBase.php";

$user = getOne('identifiant','User');
$id = getElement('Id',$user,'identifiant','User');
$dateEnvoi = getData('dateEnvoi',$id);
$heureEnvoi = getData('heureEnvoi',$id);
$content = getData('Content',$id);

var_dump($dateEnvoi);
$mail = getMail('email',$id);


date_default_timezone_set('Europe/Paris');
if ($dateEnvoi == date("Y-m-d")) {
    mail($mail,'Note',$content);
    var_dump($content);
    deleteNote();

}




