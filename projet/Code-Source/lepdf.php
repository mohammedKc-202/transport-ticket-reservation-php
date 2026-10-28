<?php
require('fpdf186/fpdf.php');
require('database.php');
$pdf = new FPDF();
$pdf->AddPage();

$pdf->SetFont('Arial','B',16);
$pdf->Cell(0,10,'Details du Voyage',0,1,'C');
if(isset($_GET['id_voyage']) && isset($_GET['passagers'])) {
    $idVoyage = $_GET['id_voyage'];
    $passagers = $_GET['passagers'];

    $select = "SELECT lieu_depart ,date , destination FROM voyage WHERE id_voyage = '$idVoyage'";
    $result = $dbconn->query($select);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $lieuDepart = $row['lieu_depart'];
        $destination = $row['destination'];
        $date = $row['date'];
    $pdf->SetFont('Arial','',12);
    $pdf->Cell(0,10,'ID Voyage: '.$idVoyage,0,1);
    $pdf->Cell(0,10,'Lieu de depart: '.$lieuDepart,0,1);
    $pdf->Cell(0,10,'Destination: '.$destination,0,1);
    $pdf->Cell(0,10,'Nombre de passagers: '.$passagers,0,1);
    $pdf->Cell(0,10,'la date: '.$date,0,1);
} else {
    $pdf->Cell(0,10,'Paramètres manquants pour générer le PDF.',0,1);
}
$pdf->Output('I'); // Pour télécharger le PDF, utilisez 'D'. Pour l'afficher dans le navigateur, utilisez 'I'.
}
?>
