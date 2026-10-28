<?php 
require('util.php');
init_php_session();
$msg="";
$error__message="";
if(!is_logged()) {
    echo "<script>window.open('Se_connecter.php', '_top');</script>";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['motac']) && isset($_POST['motn']) && isset($_POST['motcon'])) {
        $motac = $_POST['motac'];
        $motn = $_POST['motn'];
        $motcon = $_POST['motcon'];
        if ($motn === $motcon) {
            require('database.php');
            $sqlpwd = "SELECT mot_de_passe FROM client WHERE id_client=:id_client";
            $stmtpwd = $conn->prepare($sqlpwd);
            $stmtpwd->bindParam(':id_client', $_SESSION['id']);
            $stmtpwd->execute();
            $row = $stmtpwd->fetch(PDO::FETCH_ASSOC);
            $mot_de_passe_bd = $row['mot_de_passe'];
            if ($motac === $mot_de_passe_bd) {
                $sql_update_password = "UPDATE client SET mot_de_passe=:nouveau_mot_de_passe WHERE id_client=:id_client";
                $stmt_update_password = $conn->prepare($sql_update_password);
                $stmt_update_password->bindParam(':nouveau_mot_de_passe', $motn);
                $stmt_update_password->bindParam(':id_client', $_SESSION['id']);
                $resultat_update = $stmt_update_password->execute();

                if ($resultat_update) {
                   $msg="mot de passe est bien changee";
                   $_SESSION['mot_de_passe'] = $motn;
                    
                } else {
                    $error__message="Erreur lors de la mise à jour du mot de passe";
                }
            } else {
                $error__message="Le mot de passe actuel est incorrect";
            }
        } else {
            $error__message="Le nouveau mot de passe et la confirmation ne correspondent pas";
        }
    } else {
        $error__message="Veuillez remplir tous les champs du formulaire";
    }
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>change password</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+1+Code:wght@100..700&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="change_password.css" />

</head>
<style>

    *{margin:0px;}




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
        margin-top: 10px;
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
    p{
        font-size: 15px;
        display: inline-block;
        font-family: "Poppins",sans-serif;
        color: #ffffff;
    }

    i{
    color: red;
    text-align: center;
    margin: auto;
    width: 100%;
    display: block;
}
b{
    color: green;
    text-align: center;
    margin: auto;
    width: 100%;
    display: block;
}

</style>

<body>
<div class="content">
    <form id="pass" method="post">

        <label >
            <span>Mot de passe acctuel </span>
            <div class="passwd-wrap">
                <input  type="password" name="motac"  id="password" required />

                <button type="button" id="show-passwd">
                    <img src="./eye_open.svg" /> </button>
            </div>
        </label>


        <label >
            <span>Neveau mot de passe </span>
            <div class="passwd-wrap">
                <input  type="password" name="motn"  id="password1"  required/>

                <button type="button" id="show-passwd1">
                    <img class="img1" src="./eye_open.svg" /> </button>
            </div>
        </label>

        <label >
            <span>Confirmer le mot de passe </span>
            <div class="passwd-wrap">
                <input  type="password" name="motcon"  id="password2"  required/>

                <button type="button" id="show-passwd2">
                    <img class="img2" src="./eye_open.svg" /> </button>
            </div>
        </label>
        <p id="message"></p>
        <button class="conf" type="submit"  >CONFIRMER</button>
        <?php
    if($error__message){
        echo"<i><strong>$error__message</strong></i>";
    }
else{
        echo"<b><em>$msg</em></b>";
}
    ?>

    </form>
</div>

<script src="change_password.js"></script>
<script src="check_password.js"></script>
</body>
</html>