<?php
require_once("dbfunc.php");
class Pessoa extends Dbh{
    
    public function getAllPessoas(){
        
        $sql = "SELECT * FROM Pessoa";
        $stmt = $this->connect()->query($sql);
        
        while($row = $stmt->fetch()){
            
            echo $row['Nome'];
            echo "<br>";
        }
    }
    
    public function inserePessoa($nome,$idade,$data,$IdCidade){
        
        
        $sql = "Insert into Pessoa (Nome,Idade,DataNascimento,Id_cidade) values (?,?,?,?)";
        
        $stmt = $this->connect()->prepare($sql);
        
        $stmt->execute([$nome,$idade,$data,$IdCidade]);


        
    }

    
    
}




?>