<?php
require_once("dbfunc.php");
class Cidade extends Dbh{

    public function getAllCidades(){

        $sql = "SELECT * FROM Cidade";
        $stmt = $this->connect()->query($sql);

        while($row = $stmt->fetch()){

            echo $row['Nome'];
            echo "<br>";
        }
    }

    public function comboBoxCidades(){

        $sql = "SELECT * FROM Cidade";
        $stmt = $this->connect()->query($sql);
        echo "<label>Cidade : </label>";
        echo "<select name=IdCidade>";

        while($row = $stmt->fetch()){

            echo "<option value=" .$row['Id'] . ">" . $row['Nome'] . "</option>";
        }

        echo "</select>";

    }


    public function insereCidade($nome){

    $sql = "Insert into Cidade (Nome) values (?)";

    $stmt = $this->connect()->prepare($sql);

    $stmt->execute([$nome]);


    }


}




?>