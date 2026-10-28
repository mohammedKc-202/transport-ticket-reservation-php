<?php
include('database.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" ) {
    $id = $_POST['id_voyage'];
    $lieuDepart = $_POST['lieu_depart'];
    $destination = $_POST['destination'];
    $date = $_POST['date'];
    $heureDepart = $_POST['depart'];
    $duree = $_POST['duree'];
    $prix = $_POST['prix'];
    $siegeDisp = $_POST['siege_disp'];

    $query = $conn->prepare("UPDATE voyage SET lieu_depart = ?, destination = ?, date = ?, heure_depart = ?, duree = ?, prix = ?, siege_disp = ? WHERE id_voyage = ?");
    $query->bindParam(1, $lieuDepart);
    $query->bindParam(2, $destination);
    $query->bindParam(3, $date);
    $query->bindParam(4, $heureDepart);
    $query->bindParam(5, $duree);
    $query->bindParam(6, $prix);
    $query->bindParam(7, $siegeDisp);
    $query->bindParam(8, $id);
    $query->execute();

    header("Location: admin_voyage.php");
    exit();
} else {
    // Redirection si la page est accédée directement sans données de modification
    header("Location: acceuil_admin.php");
    exit();
}
?>
