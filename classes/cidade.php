<?php
require_once('dbh.php');

class Cidade extends Dbh {

    public function getCidades(){

        $sql = "SELECT*FROM Cidade";
        $stmt= $this->connect()->query($sql);
       

echo '<select name="hey">'; // Open your drop down box

// Loop through the query results, outputing the options one by one
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
   echo '<option value="'.$row['Id'].'">'.$row['Nome'].'</option>';
}

echo '</select>';// Close your drop down box


    }

    public function insertUser($nome,$idade,$data){
            $sql = "INSERT INTO Pessoa(Nome,Idade,DataNascimento) VALUES (?,?,?)";
            $stmt= $this->connect()->prepare($sql);
            $stmt->execute([$nome,$idade,$data]);


    }
}