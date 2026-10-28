<?php
require('util.php');
init_php_session();

if(isset($_GET['action']) && !empty($_GET['action']) && $_GET['action']=="logout") {
    // Appel de la fonction pour supprimer les variables de la session (voir la définition de la fonction dans le fichier util.php)
    clean_php_session(); 
    echo "<script> window.location='index.php';</script>";
    exit; 
}
if(!is_logged()) {
    header('location:Se_connecter.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="shortcut icon" type="x-icon" href="icon.png">
  <title>TIGRE BUS</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=M+PLUS+1+Code:wght@100..700&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
</head>

<style>
*{
margin:0px;
}
header{
  height:18%;
  position:fixed;
  width:100%;
  z-index:1000000;
  background: #ffffff;
}



.li1 {
    list-style:none;
    display:inline-block;
    font-weight:500;
    font-size:16px;
    padding-left:7%;
    font-family: "Roboto", sans-serif;
    }

 .li2 {
    list-style:none;
    display:inline-block;
    font-weight:500;
    font-size:16px;
    font-family: "Montserrat";
    padding:2% 3%;
    margin-left:23%;
    border-radius:21px;
    background:#e1261d;
    border-color:#e1261d;
    box-shadow: 0px 10px 20px rgba(71,14,14,.15);
 }

.li2:hover {
  background-color: #c2132b;
}

img{
width:220px;
    height:90px;
}

table{
width:94%;
box-shadow: 0px 10px 20px rgba(71,14,14,.15);
border-radius:0px 0px 20px 20px;
margin-left:3%;
background: #ffffff;
}

.a1{
text-decoration:none;
color: #1f1f1f;
}
.a2{
text-decoration:none;
color:#FFFFFF;
}

.dec2{
width:75%;
}

iframe.central{position:absolute;
  left:0%;
  top:18%;
  width:100%;
  height:187%;
  overflow:scroll;
}

iframe.footer{
  position:absolute;
  left:0%;
  top:205%;
  width:100%;
  height:56%;
  overflow:scroll;
}

</style>


<body>

<header>
<div class="backg">
<table>
  <tr>
    <td><a href="reservation.php"  target="centre" > <img src="logo.png" /> </a> </td>
    <td class="dec2">
      <ul>
        <li class="li1"> <a href="reservation.php"  target="centre" class="a1">Accueil</a></li>
        <li class="li1"> <a href="historique.php"  target="centre" class="a1">Mes voyages</a></li>
        <li class="li1"> <a href="account.php" target="centre" class="a1">Mon compte</a></li>
        <li class="li2"><a href="users.php?action=logout" target="_parent" class="a2">Se déconnecter </a></li>


      </ul>
    </td>
  </tr>
</table>
</div>
</header>

<iframe src="reservation.php" class="central"  scrolling="auto" frameborder="0" name="centre"> </iframe>

<iframe src="footer.html" class="footer"  scrolling="auto" frameborder="0" name="centr"> </iframe>


</body>
</html>