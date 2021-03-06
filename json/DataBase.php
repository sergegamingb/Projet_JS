<?php

date_default_timezone_set('Europe/Paris');

function loadDb() {
    return $db = new PDO('mysql:host=mysql-alexsalles.alwaysdata.net;dbname=alexsalles_bd_js', '174410', 'Alex.Salles13');
}


function getElement ($attr,$attr2,$attr3,$table) {
    $query =loadDb()->prepare('SELECT ' . $attr . ' FROM '.$table.' WHERE '.$attr3.'= :attribut');
    $query->bindValue(':attribut', $attr2, PDO::PARAM_STR);
    $query->execute();
    return $result = $query->fetchAll(PDO::FETCH_ASSOC);
}


function getUser($attr, $attr1, $attr2,$table)
{
    $query =loadDb()->prepare('SELECT ' . $attr . ' FROM '.$table.' WHERE identifiant= :username AND password= :password');
    $query->bindValue(':username', $attr1, PDO::PARAM_STR);
    $query->bindValue(':password', $attr2, PDO::PARAM_STR);
    $query->execute();
    foreach ($query as $row) {
        $result = $row[$attr];
    }
    return isset($result);
}

function get($attr,$table,$attr1) {
    $query =loadDb()->prepare('SELECT ' . $attr . ' FROM '.$table.' WHERE '.$attr.'= :username');
    $query->bindValue(':username', $attr1,PDO::PARAM_STR);
    $query->execute();
    foreach ($query as $row) {
        $result = $row[$attr];
    }
    return isset($result);
}

function getMail($attr,$id) {
    $query=loadDb()->prepare('SELECT '.$attr.' from User where Id in(SELECT UserId from note where UserId ='.$id.' )');
    $query->execute();
    return $result = $query->fetchAll(PDO::FETCH_ASSOC);
}
function InsertNote($content,$dateEnvoi,$heureEnvoi, $id,$mail,$objet) {
    $query=loadDb()->prepare('INSERT INTO alexsalles_bd_js.note (Content, dateEnvoi, heureEnvoi, UserId, emailNote,Objet) 
    VALUES (
    \'' .$content .'\',
    \'' .$dateEnvoi .'\',
    \'' .$heureEnvoi .'\',
    \'' .$id .'\',
    \'' .$mail .'\',
    \'' .$objet .'\'
    )');
    $query->execute();
}

function InsertUser($user,$email,$password) {
    $query=loadDb()->prepare('INSERT INTO alexsalles_bd_js.User (identifiant, email, password) 
    VALUES (
    \'' .$user .'\',
    \'' .$email .'\',
    \'' .$password .'\'
    )');
    $query->execute();
}

function deleteNote() {
    $date =  date("Y-m-d" );
    $heure = date('H:i');

    $query =loadDb()->prepare('DELETE FROM note WHERE dateEnvoi < :date  OR dateEnvoi =:date AND heureEnvoi < :heure');
    $query->bindValue(':date',$date,PDO::PARAM_STR);
    $query->bindValue(':heure',$heure,PDO::PARAM_STR);
    $query->execute();
}
function delete($id) {
    $query = loadDb()->prepare('DELETE FROM note WHERE Id =:id');
    $query->bindValue(':id',$id,PDO::PARAM_INT);
    $query->execute();
}
function update($id,$attr, $value) {
    $query = loadDb()->prepare('UPDATE note SET  '.$attr.'=\''.$value.'\'  WHERE Id= '.$id.' ');
    $query->execute();
}

function getOne($attr,$table) {
    $query=loadDb()->prepare('SELECT '.$attr.' FROM '.$table.'');
    $query->execute();
    return $result = $query->fetchAll(PDO::FETCH_ASSOC);
}

function getData($attr,$id) {
    $query=loadDb()->prepare('SELECT '.$attr.' FROM note where UserId in (select Id from User where UserId='.$id.')');
    $query->execute();
    return $result = $query->fetchAll(PDO::FETCH_ASSOC);
}
function getNote($attr,$id) {
    $query=loadDb()->prepare('SELECT '.$attr.' FROM note where UserId in (select Id from User where UserId='.$id.') order by dateEnvoi, heureEnvoi asc');
    $query->execute();
    return $result = $query->fetchAll(PDO::FETCH_ASSOC);
}