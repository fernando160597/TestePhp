<?php
require_once('dbh.php');

class Cidade extends Dbh
{

    public function comboBoxCidades()
    {

        $sql = "SELECT*FROM Cidade";
        $stmt = $this->connect()->query($sql);


        echo '<select name="IdCidade">'; 
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo '<option value="' . $row['Id'] . '">' . $row['Nome'] . '</option>';
        }

        echo '</select>'; 


    }

    public function insereCidade($cidade)
    {
        $sql = "INSERT INTO Cidade(Nome) VALUES (?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$cidade]);
    }

    public function getCidades(){

        $sql = "SELECT * FROM Cidade";
        $stmt = $this->connect()->query($sql);

        echo "<h2>CIDADES</h2>";
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo $row["Nome"]."</br>";
        }


    }
}
