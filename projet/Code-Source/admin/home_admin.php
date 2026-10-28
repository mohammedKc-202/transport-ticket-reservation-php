<?php
 require('util.php');
 init_php_session();

 if(!isset($_SESSION['id_admin'])) {
    echo "<script>window.open('Se_connecter_admin.php', '_top');</script>";
     exit;
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reservation bus</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+1+Code:wght@100..700&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap"
          rel="stylesheet" />

    <link rel="stylesheet" href="../reservation.css" />

</head>

<style>

    *{margin:0px;}


    .background::before{
        content:'';
        background-image:url(../background.jpg);
        background-size:cover;
        background-repeat:no-repeat;
        background-position:center;
        position:absolute;
        top:0;
        left:0;
        right:0;
        bottom:0%;
    }

    div {
        display: flex;
        align-items: center;
        justify-content: center;
        margin-top:16%;
        font-family: montserrat;
        font-weight: 900;
        font-size: 20px;
        line-height: 24px;
        letter-spacing: -.02em;
        position:relative;
        color: #1e1e1e;
    }


</style>
<body class="background">
<div>

    <h1>Bienvenue, Administrateur</h1>
</div>
</body>


</html>