<?php

require_once('classes/documento.php');
require_once('classes/cidade.php');
ob_start();
?>

<form method="post">
    Nome : <input type="text" name="Nome"></br></br>
    Data de Nascimento : <input type="date" name="DataInicial" required > Até <input type="date" name="DataFinal" required ></br></br>
    <label> Cidade :
        <?php $result = new Cidade();
        $result->comboBoxCidades(); ?>
        </br></br>
        <input type="submit" name="gerarTexto" value="GERAR TXT">
        <input type="submit" name="gerarExcel" value="GERAR EXCEL">
        <input type="submit" name="gerarPdf" value="GERAR PDF">
        <?php
        if (isset($_POST['gerarTexto'])) {
            ob_get_clean(); // limpa os dados anteriores
            $nome = $_POST['Nome'];
            $dataInicial = $_POST['DataInicial'];
            $dataFinal = $_POST['DataFinal'];
            $cidadeId = $_POST['IdCidade'];
            $func = new Documento();
            $func->gerarTxt($nome,$dataInicial,$dataFinal,$cidadeId);
        }
        if (isset($_POST['gerarExcel'])) {
            ob_get_clean(); // limpa os dados anteriores
            $nome = $_POST['Nome'];
            $dataInicial = $_POST['DataInicial'];
            $dataFinal = $_POST['DataFinal'];
            $cidadeId = $_POST['IdCidade'];
            $func = new Documento();
            $func->gerarExcel($nome, $dataInicial, $dataFinal, $cidadeId);
        }
        if (isset($_POST['gerarPdf'])) {
            ob_get_clean(); // limpa os dados anteriores
            $nome = $_POST['Nome'];
            $dataInicial = $_POST['DataInicial'];
            $dataFinal = $_POST['DataFinal'];
            $cidadeId = $_POST['IdCidade'];
            $func = new Documento();
            $func->gerarPdf($nome,$dataInicial,$dataFinal,$cidadeId);
        }
        ?>