<?php

require_once("classes/pessoa.php");
require_once("classes/cidade.php");
require_once("classes/documento.php");

?>


<form  method="post">
Nome: <input type="text" name="Nome"><br>
Data Nasc.:<input type = "date" name = "DataInicial" required> Até 
<input type = "date" name = "DataFinal" required><br>
Cidade : <input type = "text" name = "NomeDaCidade"><br>
<br>
<br>
<input type="submit" name = "submitTxt" value = "Gerar TXT">
<input type="submit" name = "submitExcel" value = "Gerar EXCEL">
<input type="submit" name = "submitPdf" value = "Gerar PDF">
<br>
</form>

<?php
if(isset($_POST["submitTxt"]))
{


    $nome = $_POST['Nome'];
    $dataInicial = $_POST['DataInicial'];
    $dataFinal = $_POST['DataFinal'];
    $nomeCidade = $_POST['NomeDaCidade'];
    $func = new Documento();
    $func->gerarTxt($nome,$dataInicial,$dataFinal,$nomeCidade);


}

if(isset($_POST["submitExcel"]))
{


    $nome = $_POST['Nome'];
    $dataInicial = $_POST['DataInicial'];
    $dataFinal = $_POST['DataFinal'];
    $nomeCidade = $_POST['NomeDaCidade'];
    $func = new Documento();
    $func->gerarExcel($nome,$dataInicial,$dataFinal,$nomeCidade);


}

if(isset($_POST["submitPdf"]))
{


    $nome = $_POST['Nome'];
    $dataInicial = $_POST['DataInicial'];
    $dataFinal = $_POST['DataFinal'];
    $nomeCidade = $_POST['NomeDaCidade'];
    $func = new Documento();
    $func->gerarPdf($nome,$dataInicial,$dataFinal,$nomeCidade);


}
?>


