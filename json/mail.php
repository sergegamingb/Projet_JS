<?php

require_once "DataBase.php";
date_default_timezone_set('Europe/Paris');
$user = getOne('identifiant','User');

foreach ($user as $row ) {

    $user=$row['identifiant'];
    $id = getElement('Id',$user,'identifiant','User');

    foreach ($id as $value) {

        $id = $value['Id'];
        $note= getData('dateEnvoi,heureEnvoi,Content,emailNote',$id);

         foreach ($note as $item ) {

             $date = $item['dateEnvoi'];
             $hour = $item['heureEnvoi'];
             $content = $item['Content'];
             $mail = $item['emailNote'];

             if ($date == date("Y-m-d") && $hour < date("H:i")) {
                     mail($mail,'Note', $content);
                     deleteNote();
             }
         }
    }
}







