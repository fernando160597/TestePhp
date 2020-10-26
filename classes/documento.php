<?php
require_once('dbh.php');

class Documento extends Dbh{

public function gerarTxt(){


    $sql = "SELECT*FROM Pessoa";
    $stmt = $this->connect()->query($sql);

    header("Content-Type: text/plain");
    header('Content-Disposition: attachement; filename="jinujawad.pdf"');

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

        echo $row['Nome']. ";".$row['DataNascimento']."\n";
    }


}

}


?>