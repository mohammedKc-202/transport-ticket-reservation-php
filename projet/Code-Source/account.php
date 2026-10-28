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
    <title> account </title>
</head>
<style>




    iframe.gauche{position:absolute;
        width:30%;
        left:0%;
        top:0%;
        height:90%;
    }
    iframe.central{position:absolute;
        left:32%;
        top:0%;
        width:66%;
        height:90%;
        overflow:scroll;
    }


</style>

<body>

<iframe src="My_account.php"    class="gauche"     scrolling="no"   frameborder="0"> </iframe>

<iframe src="info.php" class="central"  scrolling="auto" frameborder="0" name="centre1"> </iframe>



</body>
</html>