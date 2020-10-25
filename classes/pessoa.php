<?php
require_once('dbh.php');
require_once('cidade.php');

class Pessoa extends Dbh {

    public function getUsers(){

        $sql = "SELECT*FROM Pessoa";
        $stmt= $this->connect()->query($sql);
       

echo '<select name="hey">'; // Open your drop down box

// Loop through the query results, outputing the options one by one
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
   echo '<option value='.'">'.$row['Nome'].'</option>';
}

echo '</select>';// Close your drop down box


    }

    public function insertUser ($nome,$idade,$data,$cidade){

            $sql = "INSERT INTO Pessoa(Nome,Idade,DataNascimento,Id_cidade) VALUES (?,?,?,?)";
            $stmt= $this->connect()->prepare($sql);
            $stmt->execute([$nome,$idade,$data,$cidade]);


    }
}