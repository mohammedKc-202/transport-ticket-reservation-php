<?php

require('database.php');
require('util.php');


if(isset($_GET['id_voyage']) && isset($_GET['passagers'])) {
    $idVoyage = mysqli_real_escape_string($dbconn, $_GET['id_voyage']);
    $passagers = mysqli_real_escape_string($dbconn, $_GET['passagers']);
    $passagers = (int)$passagers;

    
    $select = "SELECT lieu_depart ,date , destination FROM voyage WHERE id_voyage = '$idVoyage'";
    $result = $dbconn->query($select);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $lieuDepart = $row['lieu_depart'];
        $destination = $row['destination'];
        $date = $row['date'];

        // Récupérer l'ID client à partir de la session
        init_php_session();
        $idClient = $_SESSION['id'];

        // Insérer les données dans la table historique
        $insert = "INSERT INTO reservation (id_voyage, id_client, lieu_depart, destination, passagers, date) VALUES ('$idVoyage', '$idClient', '$lieuDepart', '$destination', '$passagers', '$date')";
        if ($dbconn->query($insert) === TRUE) {
            echo "Enregistrement ajouté avec succès dans l'historique.";
        } else {
            echo "Erreur : " . $insert . "<br>" . $dbconn->error;
        }
    } else {
        echo "Aucun voyage trouvé avec cet identifiant.";
    }

    $dbconn->close();
} else {
    echo "Paramètres manquants.";
}

?>
