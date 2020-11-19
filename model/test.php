<?php
require '../../vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

function testReport($findings){
    //make a new spreadsheet object
    $spreadsheet = new Spreadsheet();
    //get current active sheet (first sheet)
    $sheet = $spreadsheet->getActiveSheet();
    //set the value of cell a1 to "Hello World!"
    $sheet->setCellValue('A1', 'Hello World !');

    //make an xlsx writer object using above spreadsheet
    $writer = new Xlsx($spreadsheet);
    //write the file in current directory
    $writer->save("../../model/finalReport/hello world.xlsx");
    //redirect to the file
    echo "<meta http-equiv='refresh' content='0;url=../../model/finalReport/hello world.xlsx'/>";
}
?>