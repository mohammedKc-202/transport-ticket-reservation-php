<?php
require('util.php');
init_php_session();
if(!is_logged()) {
    header('location:Se_connecter.php');
    exit;
}
require('database.php');
$nombre = "SELECT COUNT(*)  FROM reservation WHERE id_client = ?";
$statement = $PDO->prepare($nombre);
$statement->execute([$_SESSION['id']]);
$i = $statement->fetchColumn();


$query = "SELECT  date, destination, lieu_depart, passagers FROM reservation WHERE id_client = ? ORDER BY id_res DESC";
$stmt = $PDO->prepare($query);
$stmt->execute([$_SESSION['id']]);
$reservations = $stmt->fetchAll(PDO::FETCH_ASSOC);
$PDO=NULL;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mes Réservations</title>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&family=Pacifico&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Roboto', sans-serif;
      margin: 0;
      padding: 0;
      background:  #ffffff;
      color: #333;
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .container {
      max-width: 1000px;
      width: 90%;
      margin: 40px auto;
      padding: 20px;
      background-color: #fff;
      border-radius: 12px;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    }

    h1 {
      font-size: 36px;
      font-family: "Montserrat";
      color: #e53935;
      text-align: center;
      margin-bottom: 30px;
    }

    .card {
      background: #f5f5f5;
      border-radius: 8px;
      padding: 20px;
      margin-bottom: 20px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s ease;
    }

    .card:hover {
      transform: translateY(-5px);
    }

    .card h2 {
      margin-top: 0;
      font-size: 24px;
      color: #e53935;
    }

    .card p {
      margin: 10px 0;
      color: #555;
    }

    .card span {
      font-weight: bold;
      color: #333;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Mes Voyages</h1>
    <?php foreach($reservations as $reservation): ?>
      <div class="card">
        <h2>Voyage #<?php echo $i; ?></h2>
        <p><span>Date:</span> <?php echo $reservation['date']; ?></p>
        <p><span>Destination:</span> <?php echo $reservation['destination']; ?></p>
        <p><span>Lieu de départ:</span> <?php echo $reservation['lieu_depart']; ?></p>
        <p><span>Passagers:</span> <?php echo $reservation['passagers']; ?></p>
      </div>
    <?php $i--; endforeach; ?>
  </div>
</body>
</html>
