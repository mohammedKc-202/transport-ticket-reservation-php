<?php 
require('util.php');
init_php_session();
if(!is_logged()) {
    header('location:Se_connecter.php');
    exit; 
}?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My account</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+1+Code:wght@100..700&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

</head>
 <style>


     a{
         text-decoration:none;
         font-weight:bold;
         color: #1e1e1e;
         font-weight:500;
         font-size:16px;
         font-family: "Roboto", sans-serif;
     }

td {
padding:12px 6px;
}
  header {
         padding:1% 3%;
         margin-top:0%;
         width:100%;

     }
     div{
         padding:1% 6%;
         margin-top:0%;
         width:70%;
     }
  div:hover{

   border:1px solid #dd0005;
       border-radius:16px;

   }



 </style>


<body>




<header>
    <div>
<table>
    <td>
            <img src="./info.png"  width="25px" >
    </td>
    <td>

            <a  href="info.php" target="centre1">Information personnelles</a>
    </td>
</table>
</div>

<div>
    <table>
        <td>
            <img src="./password.png"  width="25px" >
        </td>
        <td>

            <a  href="change_password.php" target="centre1">Modifier le mot de passe</a>
        </td>
    </table>
</div>

<div>
    <table>
        <td>

            <img src="./delete.png"  width="25px" >
        </td>
        <td>
            <a  href="delete account.php" target="centre1"> Supprimer mon compte</a>
        </td>
    </table>
    </div>
</header>

</body>
</html>