<?php

require_once "DataBase.php";

$user = getOne('identifiant','User');
$id = getElement('Id',$user,'identifiant','User');
$dateEnvoi = getData('dateEnvoi',$id);
$heureEnvoi = getData('heureEnvoi',$id);
$content = getData('Content',$id);


$mail = getMail('email',$id);

//var_dump($mail,$content,$heureEnvoi,$content,$id);
date_default_timezone_set('Europe/Paris');
if ($heureEnvoi == date("Y-m-d") && $heureEnvoi == date('H:i'))
    sendMail($mail,$content);
deleteNote();


