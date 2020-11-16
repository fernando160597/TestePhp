<?php
require_once("dbfunc.php");
class Documento extends Dbh{
    
    
    public function gerarTxt($nome,$dataInicial,$dataFinal,$nomeCidade){
        
        
        $sql = "
        SELECT p.Nome as NomePessoa,p.DataNascimento as DataNasc,c.Nome as NomeCidade
        FROM Pessoa p 
        INNER JOIN Cidade c
        WHERE p.Id_cidade = c.Id
        AND p.DataNascimento BETWEEN '$dataInicial' AND '$dataFinal'
        AND p.Nome LIKE '$nome%'
        AND c.Nome LIKE '$nomeCidade%'";
        
        $stmt = $this->connect()->query($sql);
        
        ob_clean();
        
        while($row = $stmt->fetch()){
            
            $data = $row['DataNasc'];
            $date = new DateTime($data);
            $result = $date->format('d/m/Y');
            
            
            
            echo  $row['NomePessoa']." ; ".$result. " ; ".$row['NomeCidade']."\n";
        }
        
        header("Content-Type: text/plain");
        header('Content-Disposition: attachement; filename="relatorio.txt"');
        
        
        
    }
    
    public function gerarExcel($nome,$dataInicial,$dataFinal,$nomeCidade){
        
        $sql = "
        SELECT p.Nome as NomePessoa,p.DataNascimento as DataNasc,c.Nome as NomeCidade
        FROM Pessoa p 
        INNER JOIN Cidade c
        WHERE p.Id_cidade = c.Id
        AND p.DataNascimento BETWEEN '$dataInicial' AND '$dataFinal'
        AND p.Nome LIKE '$nome%'
        AND c.Nome LIKE '$nomeCidade%'";
        
        $stmt = $this->connect()->query($sql);
        
        ob_clean();
        
        require_once './PHPExcel\PHPExcel-1.8\Classes\PHPExcel.php';
        
        $objPHPExcel = new PHPExcel();
        
        // Add some data
        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(25);
        
        
        $objPHPExcel->setActiveSheetIndex(0)
        ->setCellValue('A1', 'NOME')
        ->setCellValue('B1', 'DATA NASC')
        ->setCellValue('C1', 'CIDADE');
        $rowCount = 2;
        while($row = $stmt->fetch()){
            $data = $row['DataNasc'];
            $date = new DateTime($data);
            $result = $date->format('d/m/Y');
            $objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, $row['NomePessoa']);
            $objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $result);
            $objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, $row['NomeCidade']);
            $rowCount++;
        }
        
        // Nomeia a planilha
        $objPHPExcel->getActiveSheet()->setTitle('Relatorio');
        // Define a planilha
        $objPHPExcel->setActiveSheetIndex(0);
        
        
        header('Content-Type: application/vnd.ms-excel; charset=UTF-8');
        header('Content-Disposition: attachment;filename="relatorio.xls"');
        header('Cache-Control: max-age=0');
        header('Cache-Control: max-age=1');
        
        
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output');
        
        
    }
    
    public function gerarPdf($nome,$dataInicial,$dataFinal,$nomeCidade){
        
        
        $sql = "
        SELECT p.Nome as NomePessoa,p.DataNascimento as DataNasc,c.Nome as NomeCidade
        FROM Pessoa p 
        INNER JOIN Cidade c
        WHERE p.Id_cidade = c.Id
        AND p.DataNascimento BETWEEN '$dataInicial' AND '$dataFinal'
        AND p.Nome LIKE '$nome%'
        AND c.Nome LIKE '$nomeCidade%'";
        
        $stmt = $this->connect()->query($sql);
        
        ob_clean();
        
        require_once('./vendor/autoload.php');
        
        $mpdf = new \Mpdf\Mpdf();
        
        while($row = $stmt->fetch()){
            
            $data = $row['DataNasc'];
            $date = new DateTime($data);
            $result = $date->format('d/m/Y');
            $mpdf->WriteHTML( $row['NomePessoa']." ; ".$result. " ; ".$row['NomeCidade']."\n");
                
                ;}
                $mpdf->Output();
                
                
            }
            
            
            
        }
        
        ?>