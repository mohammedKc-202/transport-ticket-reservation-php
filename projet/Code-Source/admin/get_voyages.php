<?php
include('database.php');

$limit = 6; // Nombre de voyages par page
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$start = ($page - 1) * $limit;

$date = date('Y-m-d');
if (isset($_GET['date'])) {
    $date = $_GET['date'];
}

$query = $conn->prepare("SELECT * FROM voyage WHERE date = ? LIMIT ?, ?");
$query->bindParam(1, $date);
$query->bindParam(2, $start, PDO::PARAM_INT);
$query->bindParam(3, $limit, PDO::PARAM_INT);
$query->execute();
$voyages = $query->fetchAll(PDO::FETCH_ASSOC);

$count_query = $conn->prepare("SELECT COUNT(*) AS count FROM voyage WHERE date = ?");
$count_query->bindParam(1, $date);
$count_query->execute();
$count_result = $count_query->fetch(PDO::FETCH_ASSOC);

$response = [
    'voyages' => $voyages,
    'count' => $count_result['count']
];

echo json_encode($response);
?>
