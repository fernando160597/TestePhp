<?php

class Dbh {

    public function connect(){

    $pdo = new PDO("mysql:host=localhost;dbname=Tito","root","");

    return $pdo;

    }

}




?>