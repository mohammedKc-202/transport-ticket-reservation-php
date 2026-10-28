<?php
$SERV_NAME = "localhost";
$DB_NAME = "Database";
$DB_DSN="mysql:host=localhost;dbname=Database";
$DB_USER="root";
$DB_PASS="";

try
{
    $conn=new PDO($DB_DSN,$DB_USER,$DB_PASS);
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}
catch ( PDOException $e)
{
    echo 'ERREUR: '.$e->getMessage();
    exit();
}




try {
    // Création de l'objet PDO pour la connexion à la base de données
    $PDO = new PDO($DB_DSN, $DB_USER, $DB_PASS);
    

    // Configuration des options PDO si nécessaire
    $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $PDO->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    // En cas d'erreur de connexion, affichage du message d'erreur
    echo 'Erreur de connexion : ' . $e->getMessage();
    // Vous pouvez également rediriger vers une page d'erreur ou effectuer une autre action
}


$dbconn = new mysqli($SERV_NAME, $DB_USER, $DB_PASS,$DB_NAME);

if ($dbconn->connect_error) {
    die("La connexion a échoué : " . $dbconn->connect_error);
}
?>
