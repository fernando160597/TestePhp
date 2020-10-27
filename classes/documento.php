<?php
require_once('dbh.php');

class Documento extends Dbh
{

    public function gerarTxt($nome, $dataInicial, $dataFinal, $cidadeId)
    {

        $sql = "select p.Nome as NomePessoa, c.Nome as NomeCidade, p.DataNascimento as Data from Pessoa p 
        inner join Cidade c on p.Id_cidade = c.Id 
        WHERE DataNascimento between '$dataInicial' AND '$dataFinal' 
        AND p.Id_cidade = (case when $cidadeId = 0 then c.Id else $cidadeId end)
         AND p.Nome LIKE '$nome%'";

        $stmt = $this->connect()->query($sql);

        header("Content-Type: text/plain");
        header('Content-Disposition: attachement; filename="relatorio.txt"');

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

            $data = $row['Data'];

            $date = new DateTime($data);

            echo $row['NomePessoa'] . " ; " . $date->format('d-m-Y') . " ; " . $row['NomeCidade'] . "\n";
        }
    }

    public function gerarExcel($nome, $dataInicial, $dataFinal, $cidadeId)
    {
        require_once('./PHPExcel/Classes/PHPExcel.php');

        $sql = "select p.Nome as NomePessoa, c.Nome as NomeCidade, p.DataNascimento as Data from Pessoa p 
        inner join Cidade c on p.Id_cidade = c.Id 
        WHERE DataNascimento between '$dataInicial' AND '$dataFinal' 
        AND p.Id_cidade = (case when $cidadeId = 0 then c.Id else $cidadeId end)
         AND p.Nome LIKE '$nome%'";

        $stmt = $this->connect()->query($sql);

        $objPHPExcel = new PHPExcel(); //Define tamanho das colunas
        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(30);
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(30);

        $objPHPExcel->setActiveSheetIndex(0) //Define Nome das colunas
            ->setCellValue('A1', 'Nome')
            ->setCellValue('B1', 'Data de Nascimento')
            ->setCellValue('C1', 'Cidade');

        $rowCount = 2;
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

            //Gerar o excel com a busca do sql

            $data = $row['Data'];

            $date = new DateTime($data);

            $objPHPExcel->getActiveSheet()->setCellValue('A' . $rowCount, $row['NomePessoa']);
            $objPHPExcel->getActiveSheet()->setCellValue('B' . $rowCount, $date->format('d-m-Y'));
            $objPHPExcel->getActiveSheet()->setCellValue('C' . $rowCount, $row['NomeCidade']);
            $objPHPExcel->getActiveSheet()->setTitle('Relatorio');
            $rowCount++;
        }
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="relatorio.xlsx"');
        header('Cache-Control: max-age=0');

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save('php://output');
    }



    public function gerarPdf($nome, $dataInicial, $dataFinal, $cidadeId){

        include('vendor/autoload.php');

        $sql = "select p.Nome as NomePessoa, c.Nome as NomeCidade, p.DataNascimento as Data from Pessoa p 
        inner join Cidade c on p.Id_cidade = c.Id 
        WHERE DataNascimento between '$dataInicial' AND '$dataFinal' 
        AND p.Id_cidade = (case when $cidadeId = 0 then c.Id else $cidadeId end)
         AND p.Nome LIKE '$nome%'";

        $stmt = $this->connect()->query($sql);

        $mpdf = new \Mpdf\Mpdf();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

            $data = $row['Data'];

            $date = new DateTime($data);
            
            $mpdf->WriteHTML($row['NomePessoa'] . " ; " . $date->format('d-m-Y') . " ; " . $row['NomeCidade'] . "\n");
        }
        $mpdf->Output();
    }
}
