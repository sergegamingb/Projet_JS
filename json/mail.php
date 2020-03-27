<?php

require_once "DataBase.php";

$id = getElement('Id',$pseudo,'identifiant','User');
$dateEnvoi = getMail('dateEnvoi',$id);
$heureEnvoi = getMail('dateEnvoi',$id);
$content = getMail('Content',$id);


$pseudo=$_SESSION['user'];
$mail = getMail('email',$id);
date_default_timezone_set('Europe/Paris');
if ($heureEnvoi == date("Y-m-d") && $heureEnvoi == date('H:i'))
    sendMail($mail,$content);
deleteNote();

