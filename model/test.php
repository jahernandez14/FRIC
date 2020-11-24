<?php
require '../../vendor/autoload.php';
require_once('findingDatabase.php');
require_once('systemDatabase.php');

use PhpOffice\PhpPresentation\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;

function testReport($findings){
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();
    $db = new SystemDatabase();

    $systemIDList = $db->getAllSystems();
    $findingsDetailedList = array();
    $systemDetailedList = array();

    foreach($findings as $a){
        array_push($findingsDetailedList, readFinding($a));
    }

    foreach($systemIDList as $a){
        array_push($systemDetailedList, readSystem($a[0]));
    }

    $spreadsheet->getDefaultStyle()
        ->getFont()
        ->setName('Arial')
        ->setSize(10);
    
    $spreadsheet->getActiveSheet()
        ->setCellValue('C3', $systemDetailedList[0][1]);
    $spreadsheet->getActiveSheet()->mergeCells("C3:AD3");
    $spreadsheet->getActiveSheet()->getStyle('C3')->getFont()->setSize(30);
    $spreadsheet->getActiveSheet()->getStyle('C3')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

    $spreadsheet->getActiveSheet()
        ->setCellValue('F4','System Categorization')
        ->setCellValue('F6','Confidentiality')
        ->setCellValue('G6','Integrity')
        ->setCellValue('H6','Availability')
        ->setCellValue('F7', $systemDetailedList[0][8])
        ->setCellValue('G7', $systemDetailedList[0][9])
        ->setCellValue('H7', $systemDetailedList[0][10]);

    $spreadsheet->getActiveSheet()->getStyle('F4')->getFont()->setSize(25);
    $spreadsheet->getActiveSheet()->mergeCells("F4:H4");
    $spreadsheet->getActiveSheet()->getStyle('F4')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
    $spreadsheet->getActiveSheet()->getStyle('F6')->getFont()->setSize(20);
    $spreadsheet->getActiveSheet()->getStyle('G6')->getFont()->setSize(20);
    $spreadsheet->getActiveSheet()->getStyle('H6')->getFont()->setSize(20);
    $spreadsheet->getActiveSheet()->getStyle('F7')->getFont()->setSize(15);
    $spreadsheet->getActiveSheet()->getStyle('G7')->getFont()->setSize(15);
    $spreadsheet->getActiveSheet()->getStyle('H7')->getFont()->setSize(15);

    $spreadsheet->getActiveSheet()->getColumnDimension('F')->setWidth(24);
    $spreadsheet->getActiveSheet()->getColumnDimension('G')->setWidth(24);
    $spreadsheet->getActiveSheet()->getColumnDimension('H')->setWidth(24);
    $spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(26);

    //Findings Table
    $spreadsheet->getActiveSheet()
    ->setCellValue('C9','ID')
    ->setCellValue('D9','Host Name')
    ->setCellValue('E9','IP:Port')
    ->setCellValue('F9','Finding Type')
    ->setCellValue('G9','Description')
    ->setCellValue('H9','Long Description')
    ->setCellValue('I9','Status')
    ->setCellValue('J9','Posture')
    ->setCellValue('K9','C')
    ->setCellValue('L9','I')
    ->setCellValue('M9','A')
    ->setCellValue('N9','C')
    ->setCellValue('O9','I')
    ->setCellValue('P9','A')
    ->setCellValue('Q9','Impact SCore')
    ->setCellValue('R9','CAT')
    ->setCellValue('S9','CAT Score')
    ->setCellValue('T9','CM')
    ->setCellValue('U9','Vs (n)')
    ->setCellValue('V9','Vs (q)')
    ->setCellValue('W9','Relevance of Threat')
    ->setCellValue('X9','Likelihood')
    ->setCellValue('Y9','Impact')
    ->setCellValue('Z9','Impact Rationale')
    ->setCellValue('AA9','Risk')
    ->setCellValue('AB9','Mitigation 1-Liner')
    ->setCellValue('AC9','Mitigation (Hide)')
    ->setCellValue('AD9','Analyst');

    //$cellList = array('C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','AA','AB','AC','AD');
    
    $i=10;
    foreach($findingsDetailedList as $a){
        $spreadsheet->getActiveSheet()
            ->setCellValue('C'.$i,$a[0])
            ->setCellValue('D'.$i,$a[2])
            ->setCellValue('E'.$i,$a[3])
            ->setCellValue('F'.$i,$a[7])
            ->setCellValue('G'.$i,$a[4])
            ->setCellValue('H'.$i,$a[5])
            ->setCellValue('I'.$i,$a[9])
            ->setCellValue('J'.$i,$a[20])
            ->setCellValue('K'.$i,$a[16])
            ->setCellValue('L'.$i,$a[17])
            ->setCellValue('M'.$i,$a[18])
            ->setCellValue('N'.$i,$a[33])
            ->setCellValue('O'.$i,$a[34])
            ->setCellValue('P'.$i,$a[35])
            ->setCellValue('Q'.$i,'Impact SCore')
            ->setCellValue('R'.$i,'CAT')
            ->setCellValue('S'.$i,'CAT Score')
            ->setCellValue('T'.$i,'CM')
            ->setCellValue('U'.$i,'Vs (n)')
            ->setCellValue('V'.$i,'Vs (q)')
            ->setCellValue('W'.$i,'Relevance of Threat')
            ->setCellValue('X'.$i,'Likelihood')
            ->setCellValue('Y'.$i,'Impact')
            ->setCellValue('Z'.$i,'Impact Rationale')
            ->setCellValue('AA'.$i,'Risk')
            ->setCellValue('AB'.$i,$a[21])
            ->setCellValue('AC'.$i,$a[35])
            ->setCellValue('AD'.$i,$a[19][0]);
        $i++;

    }

    $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
    $writer->save("../../model/riskMatrixReport/test.xlsx");
    echo "<meta http-equiv='refresh' content='0;url=../../model/riskMatrixReport/test.xlsx'/>";
}
?>