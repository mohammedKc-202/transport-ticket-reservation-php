<?php
include('database.php');

if (isset($_GET['id'])) {
    try {
        $id = $_GET['id'];
        $stmt = $PDO->prepare('SELECT id_voyage, lieu_depart, destination, date, heure_depart, duree, siege_disp, prix FROM voyage WHERE id_voyage = :id');
        $stmt->execute(['id' => $id]);
        $response = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($response) {
            echo json_encode($response);
        } else {
            echo json_encode(['error' => 'Voyage non trouvé']);
        }
    } catch (PDOException $e) {
        echo json_encode(['error' => $e->getMessage()]);
    }
} else {
    echo json_encode(['error' => 'ID non spécifié']);
}
?>
