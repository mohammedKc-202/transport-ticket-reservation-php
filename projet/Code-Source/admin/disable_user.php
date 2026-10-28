<?php
include 'database.php';

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    $statement = $conn->prepare("DELETE FROM reservation WHERE id_client = :id");
    $statement->bindParam(':id', $id, PDO::PARAM_STR);
    if ($statement->execute()) {

    $sql = "DELETE FROM client WHERE id_client = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_STR);

    if ($stmt->execute()) {
        echo 'success';
    } else {
        echo 'error';
    }
} else {
    echo 'error';
}
}else{
    echo 'error';
}

$conn = null;
?>
