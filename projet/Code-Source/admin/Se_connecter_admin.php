<?php
require('database.php');
require('util.php');
init_php_session();
if(isset($_SESSION['id_admin'])) {
    echo "<script>window.open('admin.php', '_top');</script>";
    exit; 
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email']) && isset($_POST['password'])) {
    $email = htmlspecialchars($_POST['email']);
    $mot_de_passe = htmlspecialchars($_POST['password']);
    $sql = "SELECT * FROM admin WHERE email = :email";
    $stmt = $PDO->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    if ($stmt->rowCount() == 1) {
        $row = $stmt->fetch();
        if ($mot_de_passe === $row['mot_de_passe']) {
            init_php_session();
            $_SESSION['id_admin'] = $row['id_admin'];
            $_SESSION['emaill'] = $row['email'];

            ?>
            <script>
            
            window.open('admin.php', '_top');
            </script>
            <?php
            exit();
        } else {
            $error_message = "Veuillez réessayer.";
        }
    } else {
        $error_message = "Email non trouvé. Veuillez vérifier vos informations de connexion.";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Se_connecter</title>
  <link rel="shortcut icon" type="x-icon" href="../icon.png">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=M+PLUS+1+Code:wght@100..700&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../show_password.css" />


</head>
<style>
  *{margin:0px;}

  body{
    background-color:#f5f5f5;}


  h1{
    text-align: center;
    margin-bottom: 16px;
    font-family: montserrat;
    font-weight:400;
    letter-spacing: -.02em;
  }

  .dev1 {
    background-color:#FFFFFF;
    border:1px solid gray;
    border-radius: 20px;
    width:46%;
    padding:1% 2%;
    margin-left:25%;
    margin-top:5%;
    box-shadow: 0px 10px 20px rgba(71,14,14,.15);
  }

  label,span{
    display: block;
    margin-bottom: 8px;
    color: #1e1e1e;
    font-family: montserrat;
    font-weight: 500;
    font-size: 16px;
  }


  input{
    display: block;
    margin-bottom: 12px;
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


  .login {
    margin-top: 24px;
    width: 100%;
    background-color: #e1261d;
    border: 1px solid #e1261d;
    box-shadow: 0 10px 20px rgba(71,14,14,.15);
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 12px;
    margin-bottom:4%;
    line-height: 24px;
    letter-spacing: -.02em;
  }
  .login:hover {
    background-color: #c2132b;
  }
  a{
    text-decoration:none;
    color: #ffffff;
    font-weight:400;
    font-size:12px;
    font-family: montserrat;
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
  i{
    color: red;
    text-align: center;
    margin: auto;
    width: 100%;
    display: block;
}
h4{
    color: #f5f5f5;
}

</style>


<body>
<div class="dev1">
  <h1>Se connecter Admin</h1>
  <form name="Myform" method="POST" >
    <label for="email">Email</label>
    <input type="email"  placeholder="" autocomplete="off" name="email" required>


    <label for="password">
      <span>Mot de passe </span>
      <div class="passwd-wrap">
        <input  type="password"  id="password" name="password" required/>

        <button type="button" id="show-passwd">
          <img src="./eye_open.svg" /> </button>
      </div>
    </label>



    <button rol="submit" class="login" > <h4> CONFIRMER </h4> </a> </button>

  </form>
  <?php
  if(isset($error_message)){
      echo"<i><b>$error_message</b></i>";
    }
    ?>

</div>



<script src="../show_password.js"></script>
</body>
</html>