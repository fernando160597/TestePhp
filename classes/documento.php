<?php
require_once('dbh.php');

class Documento extends Dbh
{

    public function gerarTxt($nome, $dataInicial, $dataFinal, $cidadeId)
    {


        $sql = "select p.Nome as NomePessoa, c.Nome as NomeCidade, p.DataNascimento as Data from Pessoa p 
        inner join Cidade c on p.Id_cidade = c.Id 
        WHERE DataNascimento between '$dataInicial' AND '$dataFinal' AND c.Id = $cidadeId AND p.Nome LIKE '$nome%'";

        $stmt = $this->connect()->query($sql);

        header("Content-Type: text/plain");
        header('Content-Disposition: attachement; filename="jinujawad.txt"');

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

            $data = $row['Data'];

            $date = new DateTime($data);

            echo $row['NomePessoa'] . " ; " . $date->format('d-m-Y') . " ; " . $row['NomeCidade'] . "\n";
        }
    }
}
