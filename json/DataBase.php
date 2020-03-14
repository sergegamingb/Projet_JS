<?php

class db {
    public function loaddb() {
        return $db = new PDO('mysql:host=mysql-alexsalles.alwaysdata.net;dbname=alexsalles_bd_js', '174410','Alex.Salles13');
    }
    public function login()
    {
        $username = htmlspecialchars($_POST['username']);
        $password = htmlspecialchars($_POST['password']);
        $query = $this->loaddb()->prepare("SELECT * FROM User WHERE Identifiant = :username AND password = :password");
        $query->bindValue(':username', $username, PDO::PARAM_STR);
        $query->bindValue(':password', $password, PDO::PARAM_STR);
        $query->execute();

        if ($query->rowCount() == 0) {
            return false;
        } else {
            return true;
        }
    }


}