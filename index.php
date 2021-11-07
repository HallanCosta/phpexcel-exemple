<?php 
echo "<pre>";
    require_once('PHPExcel/Classes/PHPExcel.php');

    $objReader = PHPExcel_IOFactory::createReader('Excel2007');
    $objReader->setReadDataOnly(true);
    $objPHPExcel = $objReader->load("computadores.xlsx");

    // Pegar o total de colunas
    $planilhas = $objPHPExcel->getSheetNames();
    var_export($planilhas, false);
    $rowIterator = $objPHPExcel->getActiveSheet()->getRowIterator();

    foreach ($rowIterator as $i => $row) {
        $cellIterator = $row->getCellIterator();
        $cellIterator->setIterateOnlyExistingCells(false);
        $row = [];
        foreach ($cellIterator as $cell) {
            $row[] = $cell->getValue();
        }
        
        print_r($row);
    }   

    echo "</pre>";
?>