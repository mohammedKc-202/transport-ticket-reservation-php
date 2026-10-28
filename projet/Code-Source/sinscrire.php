<?php
include('database.php');
require('util.php');
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST['username']) || empty($_POST['email']) || empty($_POST['password'])) {
        $error = "Veuillez remplir tous les champs.";
    } else {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Vérifier si l'email est déjà utilisé
        $cheks = $conn->prepare("SELECT * FROM client WHERE email=?");
        $cheks->execute([$email]); 
        $email_exist = $cheks->rowCount();

        if ($email_exist > 0) {
            $error = "Cet email est déjà utilisé. Veuillez choisir un autre email.";
        } else {

            $inserer_user = $conn->prepare("INSERT INTO client (nom, email, mot_de_passe) VALUES (?, ?, ?)");
            $inserer_user->execute([$username, $email, $password]);

            if ($inserer_user->rowCount() > 0) {
            $sql = "SELECT * FROM client WHERE email = :email";
    $stmt = $PDO->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $row = $stmt->fetch();
    init_php_session();
    $_SESSION['id'] = $row['id_client'];
    $_SESSION['nom'] = $row['nom'];
    $_SESSION['email'] = $row['email'];
    $_SESSION['telephone'] = $row['telephone'];
    $_SESSION['date_naissance'] = $row['date_naissance'];
    $_SESSION['mot_de_passe'] = $row['mot_de_passe'];

                header("Location: commit.php");
                exit;
            } else {
                $error = "Une erreur s'est produite lors de l'inscription. Veuillez réessayer.";
            }
        }
    }
}


        $cheks=null;
        $inserer_user=null;
    

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>S'INSCRIRE</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+1+Code:wght@100..700&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="show_password.css" />
    <style>
        * {margin: 0;}


        h1 {
            text-align: center;
            margin-bottom: 16px;
            font-family: montserrat;
            font-weight: 400;
            letter-spacing: -.02em;
        }

        .dev1 {
            background-color: #FFFFFF;
            border: 1px solid gray;
            border-radius: 20px;
            width: 46%;
            padding: 1% 2%;
            margin-left: 25%;
            margin-top: 1%;
            box-shadow: 0px 10px 20px rgba(71, 14, 14, .15);
        }

        label,span {
            display: block;
            margin-bottom: 8px;
            color: #1e1e1e;
            font-family: montserrat;
            font-weight: 500;
            font-size: 16px;
        }

        input {
            display: block;
            margin-bottom: 12px;
            background: #f5f5f5;
            padding: 1% 3%;
            width: 94%;
            border: none;
            border-radius: 10px;
            font-family: "Roboto", sans-serif;
            font-size: 16px;
            font-weight: 400;
            color: #1e1e1e;
            line-height: 32px;
        }

        .register {
            margin-top: 24px;
            width: 100%;
            background-color: #e1261d;
            color: #ffffff;
            border: 1px solid #e1261d;
            box-shadow: 0 10px 20px rgba(71, 14, 14, .15);
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 12px;
            margin-bottom: 4%;
            font-family: montserrat;
            font-weight: 400;
            font-size: 12px;
            line-height: 24px;
            letter-spacing: -.02em;
        }
        p{

            font-family: "Roboto", sans-serif;
            font-size: 14px;
            line-height: 22px;
            font-weight: 400;
        }
        .a2{
            text-decoration:none;
            color:#e1261d;
            font-family: "Roboto", sans-serif;
            font-size: 14px;
            line-height: 22px;
            font-weight: 400;
        }
        .register:hover {
            background-color: #c2132b;
        }
        i{
    color: red;
    text-align: center;
    margin: auto;
    width: 100%;
    display: block;
}




    </style>

</head>
<body>

<header class="dev1">
    <h1>S'inscrire</h1>
    <form name="Myform" method="POST" >
        <label for="username">Nom d'utilisateur</label>
        <input type="text" placeholder="" autocomplete="off" name="username" required>

        <label for="email">Email</label>
        <input type="email" placeholder="" autocomplete="off" name="email" required>

        <label for="password">
            <span>Mot de passe </span>
            <div class="passwd-wrap">
                <input  type="password"  id="password" name="password" required/>

                <button type="button" id="show-passwd">
                    <img src="./eye_open.svg" /> </button>
            </div>
        </label>




        <button class="register">S'INSCRIRE</button>

        <?php  echo"<i><b>$error</b></i>"; ?>

    </form>
</header>
<br><br>
<div>

    <center><p> Avez-vous déjà un compte? <a class="a2" href="Se_connecter.php" target="centre"> Se connecter </a>  </p> </center>
</div>

<script src="show_password.js"></script>
</body>
</html>