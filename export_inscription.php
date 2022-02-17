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
$spreadsheet = $reader->load("template_inscription.xlsx");
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

$data = mysqli_query($conn, "SELECT DISTINCT preins.code_etudiant,
    ins.id_inscription,
    ins.code,
    ins.code_admission,
    ins.code_preinscription,
    ins.nom,
    ins.prenom,
    preins.moyenne_bac,
    preins.cin,
    preins.cne,
    preins.tel1,
    preins.tel2,
    preins.tel3,
    preins.mail1,
    preins.mail2,
    nd.designation,
    etab.code AS code_etab,
    etab.abreviation,
    frm.code AS code_frm,
    frm.designation AS designation_frm,
    pro.ordre,
    pro.code AS code_pro,
    pro.designation AS designation_pro,
    an.code AS code_an,
    an.designation AS designation_an,
    s.code AS code_s,
    s.designation AS designation_s,
    grp.niv_1,
    grp.niv_2,
    grp.niv_3
    FROM t_inscription ins
    INNER JOIN t_preinscription preins ON preins.code = ins.code_preinscription
    INNER JOIN ac_annee an ON an.code = ins.code_annee
    INNER JOIN ac_etablissement etab ON etab.code = an.code_etablissement 
    INNER JOIN ac_formation frm ON frm.code = an.code_formation
    INNER JOIN ac_promotion pro ON pro.code = ins.code_promotion
    INNER JOIN p_statut s ON s.code = ins.code_statut
    LEFT JOIN  nature_demande nd ON nd.code = preins.id_nature_demande
    LEFT JOIN  t_grpins grp ON grp.code_inscription = ins.code
    WHERE an.designation = '2021/2022' AND frm.designation NOT LIKE 'RESIDANAT%' AND s.code NOT LIKE 'ST00023' AND frm.code = (SELECT COALESCE( CASE WHEN etab.code = 'ETA00000025' THEN NULL ELSE frm.code END, CASE WHEN frm.code IN ('FOR00000046', 'FOR00000063', 'FOR00000846') THEN frm.code ELSE 'not' END ))
    ");

//loop the data
$contentStartRow = 2;
$currentContentRow = 2;
while ($item = mysqli_fetch_array($data)) {
    //insert a row after current row (before current row + 1)
    // $spreadsheet->getActiveSheet()->insertNewRowBefore($currentContentRow + 1, 1);

    //fill the cell with data
    $spreadsheet->getActiveSheet()
        ->setCellValue('A' . $currentContentRow, $item['code_etudiant'])
        ->setCellValue('B' . $currentContentRow, $item['id_inscription'])
        ->setCellValue('C' . $currentContentRow, $item['code'])
        ->setCellValue('D' . $currentContentRow, $item['code_admission'])
        ->setCellValue('E' . $currentContentRow, $item['code_preinscription'])
        ->setCellValue('F' . $currentContentRow, $item['nom'])
        ->setCellValue('G' . $currentContentRow, $item['prenom'])
        ->setCellValue('H' . $currentContentRow, $item['moyenne_bac'])
        ->setCellValue('I' . $currentContentRow, $item['cin'])
        ->setCellValue('J' . $currentContentRow, $item['cne'])
        ->setCellValue('K' . $currentContentRow, $item['tel1'])
        ->setCellValue('L' . $currentContentRow, $item['tel2'])
        ->setCellValue('M' . $currentContentRow, $item['tel3'])
        ->setCellValue('N' . $currentContentRow, $item['mail1'])
        ->setCellValue('O' . $currentContentRow, $item['mail2'])
        ->setCellValue('P' . $currentContentRow, $item['designation'])
        ->setCellValue('Q' . $currentContentRow, $item['code_etab'])
        ->setCellValue('R' . $currentContentRow, $item['abreviation'])
        ->setCellValue('S' . $currentContentRow, $item['code_frm'])
        ->setCellValue('T' . $currentContentRow, $item['designation_frm'])
        ->setCellValue('U' . $currentContentRow, $item['ordre'])
        ->setCellValue('V' . $currentContentRow, $item['code_pro'])
        ->setCellValue('W' . $currentContentRow, $item['designation_pro'])
        ->setCellValue('X' . $currentContentRow, $item['code_an'])
        ->setCellValue('Y' . $currentContentRow, $item['designation_an'])
        ->setCellValue('Z' . $currentContentRow, $item['code_s'])
        ->setCellValue('AA' . $currentContentRow, $item['designation_s'])
        ->setCellValue('AB' . $currentContentRow, $item['niv_1'])
        ->setCellValue('AC' . $currentContentRow, $item['niv_2'])
        ->setCellValue('AD' . $currentContentRow, $item['niv_3']);

    //inrement the current row number
    $currentContentRow++;
}

//set the header first, so the result will be treated as an xlsx file
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

//make it an attachement so we can define filname
header('Content-Disposition: attachement;filename="MTSI_UIASS_Extraction_INSCRIPTION SI_21-22_' . date('Ymd') . '.xlsx"');

//create IOFactory object
$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');

//save into php output
$writer->save('php://output');
