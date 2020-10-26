<?php
require_once('dbh.php');
require_once('cidade.php');

class Pessoa extends Dbh
{

    public function inserePessoa($nome, $idade, $data, $cidade)
    {

        $sql = "INSERT INTO Pessoa(Nome,Idade,DataNascimento,Id_cidade) VALUES (?,?,?,?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$nome, $idade, $data, $cidade]);
    }
}
