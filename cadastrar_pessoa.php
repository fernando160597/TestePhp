<?php
require_once('classes/pessoa.php');
require_once('classes/cidade.php')
?>

<form method="post">
    Nome : <input type="text" name="Nome" required></br></br>
    Idade : <input type="number" name="Idade" required></br></br>
    Data de Nascimento : <input type="date" name="Data" required></br></br>
    <label> Cidade :
        <?php $result = new Cidade();
        $result->comboBoxCidades(); ?>
        <input type="submit" name="submit" value="Cadastrar" required></br>
        <?php
        if (isset($_POST['submit'])) {
            $teste = new Pessoa();
            $nome = $_POST['Nome'];
            $idade = $_POST['Idade'];
            $data = $_POST['Data'];
            $idCidade = $_POST['IdCidade'];
            $teste->inserePessoa($nome, $idade, $data, $idCidade);
        } ?>

</form>