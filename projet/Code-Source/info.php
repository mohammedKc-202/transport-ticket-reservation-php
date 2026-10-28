<?php
 require('util.php');
 init_php_session();

 if(!is_logged()) {
    echo "<script>window.open('Se_connecter.php', '_top');</script>";
     exit;
 }

 $msg = "";
 $error_message = "";

 require('database.php');

 if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
     if (isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['Nom']) && !empty($_POST['Nom'])) {
         $nom = $_POST['Nom'];
         $email = $_POST['email'];
         $telephone = empty($_POST['telephone']) ? null : $_POST['telephone'];
         $date_naissance = empty($_POST['date_naissance']) ? null : $_POST['date_naissance'];
         $stmt = $conn->prepare("UPDATE client SET nom = :nom, email = :email, telephone = :telephone, date_naissance = :date_naissance WHERE id_client = :id_client");
         $stmt->bindParam(':nom', $nom);
         $stmt->bindParam(':email', $email);
         $stmt->bindParam(':telephone', $telephone);
         $stmt->bindValue(':date_naissance', $date_naissance, $date_naissance === null ? PDO::PARAM_NULL : PDO::PARAM_STR);
         $stmt->bindParam(':id_client', $_SESSION['id']);
         $stmt->execute();
         if ($stmt) {
             $msg = "les infos sont bien changées";
             $_SESSION['nom'] = $nom;
             $_SESSION['email'] = $email;
             $_SESSION['telephone'] = $telephone;
             $_SESSION['date_naissance'] = $date_naissance;
         } else {
             $error_message = "Erreur lors de la mise à jour des infos";
         }
     }
 }
 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Information personnelles</title>
     <style>
         *{margin:0px;}
         .content {
             width:94%;
             padding:1% 2%;
             margin-top:2%;
         }
         label{
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
         .save {
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
             font-size: 13.5px;
             line-height: 24px;
             letter-spacing: -.02em;
             padding: 2% 0%;
         }
         .save:hover {
             background-color: #c2132b;
         }

         .modal {
    display: none;
    position: fixed;
    z-index: 1;
    padding-top: 100px;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0,0,0,0.4);
}

.modal-content {
    background-color: #2ecc71;
    margin: auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
    position: relative;
    animation: animatetop 0.4s;
}

@keyframes animatetop {
    from {top: -300px; opacity: 0}
    to {top: 0; opacity: 1}
}

.close {
    color: #ffffff;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}

#modal-message {
    font-family: "Montserrat", sans-serif;
    font-size: 16px;
    color: #ffffff;
    text-align: center;
}

     </style>
 </head>
 <body>
     <div class="content">
         <form method="POST">
             <label for="Nom"> Nom </label>
             <input type="text" name="Nom" value="<?php echo $_SESSION['nom']; ?>" required>
             <label for="date">Date de naissance</label>
             <input type="date" name="date_naissance" value="<?php echo $_SESSION['date_naissance']; ?>">
             <label for="email">Email</label>
             <input type="email" class="email" name="email" value="<?php echo $_SESSION['email']; ?>" required>
             <label for="telephone">Telephone</label>
             <input type="Tel" class="telephone" name="telephone" value="<?php echo $_SESSION['telephone']; ?>">
             <button type="submit" name="submit" class="save">sauvegarder</button>
         </form>
     </div>

     <div id="myModal" class="modal">
         <div class="modal-content">
             <span class="close">&times;</span>
             <p id="modal-message"></p>
         </div>
     </div>

     <script>
         document.addEventListener('DOMContentLoaded', (event) => {                   
             var modal = document.getElementById("myModal");
             var span = document.getElementsByClassName("close")[0];
             var modalMessage = document.getElementById("modal-message");
             <?php if($msg): ?>
                 modalMessage.innerHTML = "<?php echo $msg; ?>";
                 modal.style.display = "block";
             <?php endif; ?>

             <?php if($error_message): ?>
                 modalMessage.innerHTML = "<?php echo $error_message; ?>";
                 modal.style.display = "block";
             <?php endif; ?>
             span.onclick = function() {
                 modal.style.display = "none";
             }
             window.onclick = function(event) {
                 if (event.target == modal) {
                     modal.style.display = "none";
                 }
             }
         });
     </script>
 </body>
 </html>
