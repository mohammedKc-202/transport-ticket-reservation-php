<?php
require('database.php');
if(isset($_GET['id_voyage']) && isset($_GET['passagers'])) {
    $idVoyage = mysqli_real_escape_string($dbconn, $_GET['id_voyage']);
    $passagers = mysqli_real_escape_string($dbconn, $_GET['passagers']);
    $passagers = (int)$passagers;
    $sql = "UPDATE voyage SET siege_disp = siege_disp - $passagers WHERE id_voyage = '$idVoyage'";
    if ($dbconn->query($sql) === TRUE) {
        echo "Nombre de sièges disponibles mis à jour.";
    } else {
        echo "Erreur : " . $sql . "<br>" . $dbconn->error;
    }

    $dbconn->close();
} else {
    echo "Paramètres manquants.";
}
?>
