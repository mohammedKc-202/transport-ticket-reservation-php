<?php
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['id'])) {
        $id_voyage = $_GET['id'];
        include 'database.php';
        $stmt = $dbconn->prepare("DELETE FROM voyage WHERE id_voyage = ?");
        $stmt->bind_param("i", $id_voyage);
        if ($stmt->execute()) {
            echo json_encode(['success' => true, 'message' => 'Voyage supprimé avec succès.']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Erreur lors de la suppression du voyage.']);
        }
        $stmt->close();
        $dbconn->close();
    } else {
        echo json_encode(['success' => false, 'message' => 'ID de voyage manquant.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Méthode de requête non valide.']);
}
?>
