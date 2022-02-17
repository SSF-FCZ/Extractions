<?php
//Call the autoload
require 'vendor/autoload.php';
//Load phpspreadsheet class using namespaces
use PhpOffice\PhpSpreadsheet\Spreadsheet;
//call iofactory instead of xlsx writer
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Fill;

//load the template
//load from xlsx template
$reader = IOFactory::createReader('Xlsx');
$spreadsheet = $reader->load("template_programmation.xlsx");
//add the content
//data from database
$u_servername = "172.20.1.54";
$u_username = "MTSI-DEV";
$u_password = "Mts!_Dev123";
$u_dbname = "gu001";
$conn = mysqli_connect($u_servername, $u_username, $u_password, $u_dbname);
if (mysqli_connect_errno()) {
    die("Echec de la connexion : " . mysqli_connect_error());
}
$IB = "frm.designation NOT LIKE 'RESIDANAT%' AND frm.code = (SELECT COALESCE( CASE WHEN etab.code = 'ETA00000025' THEN NULL ELSE frm.code END, CASE WHEN frm.code IN ('FOR00000046', 'FOR00000063', 'FOR00000846') THEN frm.code ELSE 'not' END ))";
$cfc = "etab.code = 'ETA00000025'";
$residanat = "frm.designation LIKE 'RESIDANAT%'";

$data = mysqli_query($conn, "SELECT DISTINCT pr.id,
pr.code,
pr.id_annee,
ann.designation 'Annee',
pr.id_etablissement,
etab.designation 'Etablissement',
pr.id_formation,
frm.designation 'Formation',
pr.id_promotion, 
prm.designation 'Promotion', 
pr.id_semestre, 
sem.designation 'Semestre',
pr.id_module, 
mdl.designation 'Module',
mdl.active,
pr.id_element,
ele.designation 'Element',
ele.coefficient 'coefficient',
ele.coefficient_epreuve 'coefficient_epreuve',
ele.active,
pr.id_nature_epreuve, 
ne.designation 'Nature_epreuve',
ele.nature 'Id_Type',
te.designation 'Type',
pr.volume
FROM pr_programmation pr
INNER JOIN ac_annee ann ON ann.code = pr.id_annee
INNER JOIN ac_etablissement etab ON etab.code = pr.id_etablissement
INNER JOIN ac_formation frm ON frm.code = pr.id_formation
INNER JOIN ac_promotion prm ON prm.code =  pr.id_promotion
INNER JOIN ac_semestre sem ON sem.code = pr.id_semestre
INNER JOIN ac_module mdl ON mdl.code = pr.id_module
INNER JOIN ac_element ele ON ele.code = pr.id_element
INNER JOIN p_typeelement te ON te.code = ele.nature
INNER JOIN pr_nature_epreuve ne ON ne.code = pr.id_nature_epreuve
    WHERE ann.designation = '2021/2022' AND 
    ");

//loop the data
$contentStartRow = 2;
$currentContentRow = 2;
while ($item = mysqli_fetch_array($data)) {
    //insert a row after current row (before current row + 1)
    // $spreadsheet->getActiveSheet()->insertNewRowBefore($currentContentRow + 1, 1);

    //fill the cell with data
    $spreadsheet->getActiveSheet()
        ->setCellValue('A' . $currentContentRow, $item['id'])
        ->setCellValue('B' . $currentContentRow, $item['code'])
        ->setCellValue('C' . $currentContentRow, $item['id_annee'])
        ->setCellValue('D' . $currentContentRow, $item['Annee'])
        ->setCellValue('E' . $currentContentRow, $item['id_etablissement'])
        ->setCellValue('F' . $currentContentRow, $item['Etablissement'])
        ->setCellValue('G' . $currentContentRow, $item['id_formation'])
        ->setCellValue('H' . $currentContentRow, $item['Formation'])
        ->setCellValue('I' . $currentContentRow, $item['id_promotion'])
        ->setCellValue('J' . $currentContentRow, $item['Promotion'])
        ->setCellValue('K' . $currentContentRow, $item['id_semestre'])
        ->setCellValue('L' . $currentContentRow, $item['Semestre'])
        ->setCellValue('M' . $currentContentRow, $item['id_module'])
        ->setCellValue('N' . $currentContentRow, $item['Module'])
        ->setCellValue('O' . $currentContentRow, $item['active'])
        ->setCellValue('P' . $currentContentRow, $item['id_element'])
        ->setCellValue('Q' . $currentContentRow, $item['Element'])
        ->setCellValue('R' . $currentContentRow, $item['coefficient'])
        ->setCellValue('S' . $currentContentRow, $item['coefficient_epreuve'])
        ->setCellValue('T' . $currentContentRow, $item['active'])
        ->setCellValue('U' . $currentContentRow, $item['id_nature_epreuve'])
        ->setCellValue('V' . $currentContentRow, $item['Nature_epreuve'])
        ->setCellValue('W' . $currentContentRow, $item['Id_Type'])
        ->setCellValue('X' . $currentContentRow, $item['Type'])
        ->setCellValue('Y' . $currentContentRow, $item['volume']);

    //inrement the current row number
    $currentContentRow++;
}

//set the header first, so the result will be treated as an xlsx file
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

//make it an attachement so we can define filname
header('Content-Disposition: attachement;filename="MTSI_UIASS_Extraction_PROGRAMMATION SI_21-22_' . date('Ymd') . '.xlsx"');

//create IOFactory object
$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');

//save into php output
$writer->save('php://output');
