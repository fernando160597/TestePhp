<?php

class Dbh
{

    protected function connect()
    {
        $dbh = new PDO('mysql:host=localhost;dbname=Tito', "root", "");
        return $dbh;
    }
}
