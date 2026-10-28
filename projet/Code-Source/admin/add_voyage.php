<?php
include('database.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $lieu_depart = $_POST['lieu_depart'];
    $destination = $_POST['destination'];
    $date = $_POST['date'];
    $heure_depart = $_POST['heure_depart'];
    $duree = $_POST['duree'];
    $siege_disp = $_POST['siege_disp'];
    $prix = $_POST['prix'];
if($lieu_depart != $destination){
    $query = $conn->prepare("INSERT INTO voyage (lieu_depart, destination, date, heure_depart, duree, siege_disp, prix) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $query->bindParam(1, $lieu_depart);
    $query->bindParam(2, $destination);
    $query->bindParam(3, $date);
    $query->bindParam(4, $heure_depart);
    $query->bindParam(5, $duree);
    $query->bindParam(6, $siege_disp);
    $query->bindParam(7, $prix);

    if ($query->execute()) {
        header('Location: admin_voyage.php');
        exit();
    } else {
        echo "Erreur lors de l'ajout du voyage.";
    }
}
}
?>
