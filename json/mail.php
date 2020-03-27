<?php

require_once "DataBase.php";




$pseudo=$_SESSION['user'];
$mail = getMail('email',$pseudo);
date_default_timezone_set('Europe/Paris');
$date = htmlspecialchars($_POST['dates']);
$note = htmlspecialchars($_POST['mNote']);
$hour = htmlspecialchars($_POST['hour']);
if($date == date("Y-m-d" ) && $hour == date('H:i')){
    sendMail($mail,$note);
}

else if($date <= date("Y-m-d" ) && $hour < date('H:i')){
    deleteNote();
}
