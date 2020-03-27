<?php

require_once "DataBase.php";
session_start();

$id = getElement('Id',$pseudo,'identifiant','User');
$dateEnvoi = getMail('dateEnvoi',$id);
$heureEnvoi = getMail('dateEnvoi',$id);
$content = getMail('Content',$id);


$pseudo=$_SESSION['user'];
$mail = getMail('email',$id);
var_dump($mail,$id,$content);
date_default_timezone_set('Europe/Paris');

if ($heureEnvoi == date("Y-m-d") && $heureEnvoi == date('H:i'))
    sendMail($mail,$content);

deleteNote();

