<?php
require_once('dbh.php');

class Documento extends Dbh
{

    public function gerarTxt($nome, $dataInicial, $dataFinal, $cidadeId)
    {


        $sql = "select p.Nome as NomePessoa, c.Nome as NomeCidade, p.DataNascimento as Data from Pessoa p inner join Cidade
         c on p.Id_cidade = c.Id and DataNascimento  between '1980-10-14' AND '2020-05-20' AND p.Nome LIKE 'Fer%'";
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
