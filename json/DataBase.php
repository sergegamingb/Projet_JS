<?php

function loadDb() {
    return $db = new PDO('mysql:host=mysql-alexsalles.alwaysdata.net;dbname=alexsalles_bd_js', '174410', 'Alex.Salles13');
}

function execRequete($query) {
    return $this->loadDb()->query($query);
}
function getMail ($attr,$pseudo) {
    $query =loadDb()->prepare('SELECT ' . $attr . ' FROM User WHERE identifiant= :username');
    $query->bindValue(':username', $pseudo, PDO::PARAM_STR);
    $query->execute();
    foreach ($query as $row) {
        $result = $row[$attr];
    }
    return $result;
}


function get($attribut, $pseudo, $pass)
{
    $query =loadDb()->prepare('SELECT ' . $attribut . ' FROM User WHERE identifiant= :username AND password= :password');
    $query->bindValue(':username', $pseudo, PDO::PARAM_STR);
    $query->bindValue(':password', $pass, PDO::PARAM_STR);
    $query->execute();
    foreach ($query as $row) {
        $result = $row[$attribut];
    }

    return isset($result);
}

function InsertNote($content,$dateEnvoi,$heureEnvoi) {
    $query=loadDb()->prepare('INSERT INTO alexsalles_bd_js.note (Content, dateEnvoi, heureEnvoi) 
    VALUES (
    \'' .$content .'\',
    \'' .$dateEnvoi .'\',
    \'' .$heureEnvoi .'\'
    )');
    $query->execute();
}

function sendMail($mail,$content) {
    mail($mail,'Note',$content);
}