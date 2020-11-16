<?php

require_once("classes/pessoa.php");
require_once("classes/cidade.php");

?>


<form  method="post">
Nome: <input type="text" name="Nome"><br>
Idade: <input type="number" name="Idade"><br>
Data Nasc.:<input type = "date" name = "Data"><br>
<?php 
$func = new Cidade();
$func->comboBoxCidades();
?>
<br>
<input type="submit" name = "submit" value = "Cadastrar"><br>
</form>

<?php
if(isset($_POST["submit"]))
{

    $nome = $_POST['Nome'];
    $idade = $_POST['Idade'];
    $data = $_POST['Data'];
    $idCidade = $_POST['IdCidade'];
    $func = new Pessoa();
    $func->inserePessoa($nome,$idade,$data,$idCidade);


}
?>


