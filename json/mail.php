<?php

require_once "DataBase.php";

$user = getOne('identifiant','User');
$id = getElement('Id',$user,'identifiant','User');
$dateEnvoi = getMail('dateEnvoi',$id);
$heureEnvoi = getMail('dateEnvoi',$id);
$content = getMail('Content',$id);


$mail = getMail('email',$id);
date_default_timezone_set('Europe/Paris');
if ($heureEnvoi == date("Y-m-d") && $heureEnvoi == date('H:i'))
    sendMail($mail,$content);

deleteNote();

