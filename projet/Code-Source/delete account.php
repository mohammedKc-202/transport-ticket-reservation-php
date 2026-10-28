<?php 
require('util.php');
init_php_session();

if(!is_logged()) {
    echo "<script>window.open('Se_connecter.php', '_top');</script>";
    exit; 
}
require('database.php');
/*header("Cache-Control: no-cache, must-revalidate");
header("Pragma: no-cache");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");*/

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['password'])) {
    $password = $_POST['password'];   
    $mot_de_passe_bd = $_SESSION['mot_de_passe'];
    if ($password === $mot_de_passe_bd) {
    $statement = $conn->prepare("DELETE FROM reservation WHERE id_client = :id_client");
    $stmt = $conn->prepare("DELETE FROM client WHERE id_client = :id_client");
    $statement->bindParam(':id_client', $_SESSION['id']);
    $stmt->bindParam(':id_client', $_SESSION['id']);
    $statement->execute();
    $stmt->execute();
    /* $_SESSION = array();
   if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }*/
    clean_php_session();
    echo "<script>window.open('index.php', '_top');</script>";
    exit;
}
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>delete account</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+1+Code:wght@100..700&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="show_password.css" />

</head>
    <style>

        *{margin:0px;}

        h1{

        margin-bottom: 16px;
        font-family: montserrat;
        font-weight:400;
        letter-spacing: -.02em;
        color:#dd0005;
        }

        p{
            color: #1e1e1e;
            font-weight: 400;
            font-size: 18px;
            margin-bottom: 40px;
        }

        .content {

        width:94%;
        padding:1% 2%;

        margin-top:2%;

        }


        label,span{
        display: block;
        margin-bottom: 8px;
        color: #1e1e1e;
        font-family: montserrat;
        font-weight: 400;
        font-size: 16px;
        }


        input{
        display: block;
        margin-bottom: 20px;
        background: #f5f5f5;
        padding: 1% 3%;
        width: 94%;
        border:none;
        border-radius: 10px;
        font-family: "Roboto", sans-serif;
        font-size: 16px;
        font-weight: 400;
        color: #1e1e1e;
        line-height: 32px;
        }


        .conf {
        margin-top: 20px;
        width: 100%;
        background-color: #e1261d;
        color: #ffffff;
        border: 1px solid #e1261d;
        box-shadow: 0 10px 20px rgba(71,14,14,.15);
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 12px;
        margin-bottom:4%;
        font-family: montserrat;
        font-weight: 400;
        font-size: 12px;
        line-height: 24px;
        letter-spacing: -.02em;
            padding: 2% 0%;
        }
        .conf:hover {
            background-color: #c2132b;
        }

        #show-passwd {
            position: absolute;
            top: 50%;
            left:95%;
            right: 1rem;
            transform: translateY(-50%);
            cursor: pointer;
            width: 1.5rem;
            display: flex;
            align-items: center;
        }

    </style>

<body>


<div class="content">
    <h1>Supprimer mon compte</h1>

    <p>Votre compte ainsi que toutes vos informations seront supprimés définitivement.<br> Merci de saisir votre mot de passe pour confirmer.

    </p>
    <form method="POST">
        <label for="password">
            <span>Confirmer le mot de passe </span>
            <div class="passwd-wrap">
                <input  type="password"  id="password" name="password" required/>

                <button type="button" id="show-passwd">
                    <img src="./eye_open.svg" /> </button>
            </div>
        </label>

        <button type="submit" class="conf">CONFIRMER</button>

    </form>
</div>
<script src="show_password.js"></script>
</body>
</html>