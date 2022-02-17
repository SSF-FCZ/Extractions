<?php
set_time_limit(0);
ini_set('memory_limit', '-1');
// //Call the autoload
// require 'vendor/autoload.php';
// //Load phpspreadsheet class using namespaces
// use PhpOffice\PhpSpreadsheet\Spreadsheet;
// //call iofactory instead of xlsx writer
// use PhpOffice\PhpSpreadsheet\IOFactory;
// use PhpOffice\PhpSpreadsheet\Style\Alignment;
// use PhpOffice\PhpSpreadsheet\Style\Fill;

// //load the template
// //load from xlsx template
// $reader = IOFactory::createReader('Xlsx');
// $spreadsheet = $reader->load("template_epreuve.xlsx");
// //add the content
// //data from database
// $u_servername = "172.20.1.54";
// $u_username = "MTSI-DEV";
// $u_password = "Mts!_Dev123";
// $u_dbname = "gu001";
// $conn = mysqli_connect($u_servername, $u_username, $u_password, $u_dbname);
// if (mysqli_connect_errno()) {
//     die("Echec de la connexion : " . mysqli_connect_error());
// }

// $data = mysqli_query($conn, "SELECT DISTINCT an.code AS code_annee,
// an.designation AS designation_annee,
// etab.code AS code_etablissement,
// etab.abreviation,
// frm.code AS code_formation,
// frm.designation AS designation_formation,
// pro.code AS code_promotion,
// pro.designation AS designation_promotion,
// pro.ordre,
// sem.code AS code_semestre,
// sem.designation AS designation_semestre,
// mdl.code AS code_module,
// mdl.designation AS designation_module,
// ele.code AS code_element,
// ele.designation AS designation_element,
// ele.coefficient,
// ele.coefficient_epreuve,
// ep.code AS code_epreuve,
// ep.nature,
// ep.desig_statut,
// np.code AS code_nature_epreuve,
// np.designation AS designation_nature_epreuve,
// ins.anonymat,
// ins.anonymatrat,
// ins.code AS code_inscription,
// ins.code_admission,
// ins.code_preinscription,
// ins.nom,
// ins.prenom,
// gn.note,
// ins.code_statut
// FROM ex_gnotes gn
// INNER JOIN ac_epreuve ep ON ep.code = gn.code_epreuve
// INNER JOIN pr_nature_epreuve np ON np.code = ep.code_nature_epreuve
// INNER JOIN t_inscription ins ON ins.code = gn.code_inscription
// INNER JOIN ac_annee an ON an.code = ins.code_annee
// INNER JOIN ac_etablissement etab ON etab.code = an.code_etablissement 
// INNER JOIN ac_formation frm ON frm.code = an.code_formation
// INNER JOIN ac_promotion pro ON pro.code = ins.code_promotion
// INNER JOIN ac_module mdl ON mdl.code = ep.code_module
// INNER JOIN ac_element ele ON ele.code = ep.code_element
// LEFT JOIN ac_semestre sem ON sem.code = mdl.code_semestre 
// WHERE  an.designation='2021/2022' AND frm.designation NOT LIKE 'RESIDANAT%' AND ins.code_statut NOT LIKE 'ST00023' AND frm.code = (SELECT COALESCE( CASE WHEN etab.code = 'ETA00000025' THEN NULL ELSE frm.code END, CASE WHEN frm.code IN ('FOR00000046', 'FOR00000063', 'FOR00000846') THEN frm.code ELSE 'not' END ))
//     ");
// //loop the data
// $contentStartRow = 2;
// $currentContentRow = 2;
// while ($item = mysqli_fetch_array($data)) {
//     //insert a row after current row (before current row + 1)
//     // $spreadsheet->getActiveSheet()->insertNewRowBefore($currentContentRow + 1, 1);

//     //fill the cell with data
//     $spreadsheet->getActiveSheet()
//         ->setCellValue('A' . $currentContentRow, $item['code_annee'])
//         ->setCellValue('B' . $currentContentRow, $item['designation_annee'])
//         ->setCellValue('C' . $currentContentRow, $item['code_etablissement'])
//         ->setCellValue('D' . $currentContentRow, $item['abreviation'])
//         ->setCellValue('E' . $currentContentRow, $item['code_formation'])
//         ->setCellValue('F' . $currentContentRow, $item['designation_formation'])
//         ->setCellValue('G' . $currentContentRow, $item['code_promotion'])
//         ->setCellValue('H' . $currentContentRow, $item['designation_promotion'])
//         ->setCellValue('I' . $currentContentRow, $item['ordre'])
//         ->setCellValue('J' . $currentContentRow, $item['code_semestre'])
//         ->setCellValue('K' . $currentContentRow, $item['designation_semestre'])
//         ->setCellValue('L' . $currentContentRow, $item['code_module'])
//         ->setCellValue('M' . $currentContentRow, $item['designation_module'])
//         ->setCellValue('N' . $currentContentRow, $item['code_element'])
//         ->setCellValue('O' . $currentContentRow, $item['designation_element'])
//         ->setCellValue('P' . $currentContentRow, $item['coefficient'])
//         ->setCellValue('Q' . $currentContentRow, $item['coefficient_epreuve'])
//         ->setCellValue('R' . $currentContentRow, $item['code_epreuve'])
//         ->setCellValue('S' . $currentContentRow, $item['nature'])
//         ->setCellValue('T' . $currentContentRow, $item['desig_statut'])
//         ->setCellValue('U' . $currentContentRow, $item['code_nature_epreuve'])
//         ->setCellValue('V' . $currentContentRow, $item['designation_nature_epreuve'])
//         ->setCellValue('W' . $currentContentRow, $item['anonymat'])
//         ->setCellValue('X' . $currentContentRow, $item['anonymatrat'])
//         ->setCellValue('Y' . $currentContentRow, $item['code_inscription'])
//         ->setCellValue('Z' . $currentContentRow, $item['code_admission'])
//         ->setCellValue('AA' . $currentContentRow, $item['code_preinscription'])
//         ->setCellValue('AB' . $currentContentRow, $item['nom'])
//         ->setCellValue('AC' . $currentContentRow, $item['prenom'])
//         ->setCellValue('AD' . $currentContentRow, $item['note'])
//         ->setCellValue('AE' . $currentContentRow, $item['code_statut']);

//     //inrement the current row number
//     $currentContentRow++;
// }


// //set the header first, so the result will be treated as an xlsx file
// header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

// //make it an attachement so we can define filname
// header('Content-Disposition: attachement;filename="MTSI_UIASS_Extraction_NOTE_EPREUVE SI_21-22_20220203.xlsx"');

// //create IOFactory object
// $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');

// //save into php output
// $writer->save('php://output');



$db_record = 'MTSI_UIASS_Extraction_NOTE_EPREUVE SI_21-22';
// Nom du fichier CSV à exporter
$csv_filename = $db_record . '_' . date('Ymd') . '.csv';



// Connexion à la base
$u_servername = "172.20.1.54";
$u_username = "MTSI-DEV";
$u_password = "Mts!_Dev123";
$u_dbname = "gu001";
$conn = mysqli_connect($u_servername, $u_username, $u_password, $u_dbname);
if (mysqli_connect_errno()) {
    die("Echec de la connexion : " . mysqli_connect_error());
}
/* si vous avez des erreurs d'accents dans les données extraites, selon l'encodage de la base :
    // latin1 > UTF8
    mysqli_set_charset($conn, "utf8");
    // ou UTF8 > ISO-8859-1
    mysqli_set_charset($conn, "latin1"); */
mysqli_set_charset($conn, "latin1");
// Création d'un fichier CSV vide
$csv_export = '';

// Extraction des données de la table
$query = mysqli_query($conn, "SELECT DISTINCT an.code AS code_annee,
an.designation AS designation_annee,
etab.code AS code_etablissement,
etab.abreviation,
frm.code AS code_formation,
frm.designation AS designation_formation,
pro.code AS code_promotion,
pro.designation AS designation_promotion,
pro.ordre,
sem.code AS code_semestre,
sem.designation AS designation_semestre,
mdl.code AS code_module,
mdl.designation AS designation_module,
ele.code AS code_element,
ele.designation AS designation_element,
ele.coefficient,
ele.coefficient_epreuve,
ep.code AS code_epreuve,
ep.nature,
ep.desig_statut,
np.code AS code_nature_epreuve,
np.designation AS designation_nature_epreuve,
ins.anonymat,
ins.anonymatrat,
ins.code AS code_inscription,
ins.code_admission,
ins.code_preinscription,
ins.nom,
ins.prenom,
gn.note,
ins.code_statut
FROM ex_gnotes gn
INNER JOIN ac_epreuve ep ON ep.code = gn.code_epreuve
INNER JOIN pr_nature_epreuve np ON np.code = ep.code_nature_epreuve
INNER JOIN t_inscription ins ON ins.code = gn.code_inscription
INNER JOIN ac_annee an ON an.code = ins.code_annee
INNER JOIN ac_etablissement etab ON etab.code = an.code_etablissement 
INNER JOIN ac_formation frm ON frm.code = an.code_formation
INNER JOIN ac_promotion pro ON pro.code = ins.code_promotion
INNER JOIN ac_module mdl ON mdl.code = ep.code_module
INNER JOIN ac_element ele ON ele.code = ep.code_element
LEFT JOIN ac_semestre sem ON sem.code = mdl.code_semestre 
WHERE an.designation='2021/2022' AND frm.designation NOT LIKE 'RESIDANAT%' AND ep.desig_statut = 'Valider' AND ins.code_statut NOT LIKE 'ST00023' AND frm.code = (SELECT COALESCE( CASE WHEN etab.code = 'ETA00000025' THEN NULL ELSE frm.code END, CASE WHEN frm.code IN ('FOR00000046', 'FOR00000063', 'FOR00000846') THEN frm.code ELSE 'not' END ))
         ");

$field = mysqli_field_count($conn);

// Création de la ligne des titres (noms des champs)
for ($i = 0; $i < $field; $i++) {
    $csv_export .= mysqli_fetch_field_direct($query, $i)->name . ';';
}

// Nouvelle ligne (semble fonctionner avec Linux & Windows servers)
$csv_export .= '
';

// Boucle des tuples pour remplir le fichier
while ($row = mysqli_fetch_array($query)) {
    for ($i = 0; $i < $field; $i++) {
        $value = $row[mysqli_fetch_field_direct($query, $i)->name];
        if (mysqli_fetch_field_direct($query, $i)->name == 'note') $value = formatter($value);

        $csv_export .= '"' . $value . '";';
    }
    $csv_export .= '
';
}
function formatter($v)
{
    return str_replace('.', ',', $v);;
}
// Export des données au format CSV et appel du fichier créé pour téléchargement
header("Content-type: text/x-csv");
header("Content-Disposition: attachment; filename=" . $csv_filename . "");
echo ($csv_export);
