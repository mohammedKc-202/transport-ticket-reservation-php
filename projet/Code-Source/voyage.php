<!DOCTYPE html>
<html>
<head>
    <title>Voyages Disponibles</title>
   <style>
           body {
               font-family: 'Arial', sans-serif;
               background-color: #f4f4f4;
               color: #333;
               line-height: 1.6;
           }

           .voyages-disponibles {
               margin-top: 20px;
               padding: 20px;
               background-color: #fff;
               box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
               border-radius: 8px;
           }

           .table-voyages {
               width: 100%;
               border-collapse: separate;
               border-spacing: 0px 0px;
    margin-bottom: 30px;

           }

           .table-voyages th, .table-voyages td {
               padding: 12px 15px;
               text-align: left;
               background-color: #f5f5f5;
           }

           .table-voyages th {
               background-color: #e1261d;
               color: #fff;
               font-weight: bold;
           }

           .table-voyages tr:hover {
               background-color: #ffcccc;
           }

           .aucun-resultat {
               margin-top: 20px;
               padding: 60px;
               background-color: #f5f5f5;
               border: none;
               color: black;
               text-align: center;
               border-radius: 8px;
           }

           .btn-reserver {
               background-color: #e1261d;
               color: #fff;
               border: none;
               padding: 8px 12px;
               border-radius: 5px;
               cursor: pointer;
           }

           .modal {
               display: none;
               position: fixed;
               z-index: 1;
               left: 0;
               top: 0;
               width: 100%;
               height: 100%;
               overflow: auto;
               background-color: rgba(0,0,0,0.4);
               padding-top: 60px;
           }
           .modal-content {
               background-color: #ffffff;
               margin: 5% auto;
               padding: 20px;
               border: 1px solid #888;
               border-radius: 10px;
               width: 40%;
               text-align: center;
           }
           .close {
               color: #aaa;
               float: right;
               font-size: 28px;
               font-weight: bold;
           }
           .close:hover,
           .close:focus {
               color: black;
               text-decoration: none;
               cursor: pointer;
           }
           .btn-confirm {
               background-color: #e1261d;
               color: #fff;
               border: none;
               padding: 10px 20px;
               border-radius: 5px;
               cursor: pointer;
               font-size: 16px;
               margin-right: 10px;
           }
           .btn-cancel {
               background-color: #dddddd;
               color: #fff;
               border: none;
               padding: 10px 20px;
               border-radius: 5px;
               cursor: pointer;
               font-size: 16px;
           }
           .modal-message {
               margin-bottom: 20px;
           }
       </style>
</head>
<body>

<div id="myModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <p class="modal-message">Êtes-vous sûr de vouloir réserver ce voyage ?</p>
        <button id="confirmBtn" class="btn-confirm">Je confirme</button>
        <button id="cancelBtn" class="btn-cancel">Annuler</button>
    </div>
</div>

<div class="voyages-disponibles">

        <?php
        require('database.php');
        if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['dep']) && isset($_GET['des']) && isset($_GET['currentDate']) && $_GET['passagers'] > 0) {
            $dep = mysqli_real_escape_string($dbconn, $_GET['dep']);
            $des = mysqli_real_escape_string($dbconn, $_GET['des']);
            $date = mysqli_real_escape_string($dbconn, $_GET['currentDate']);
            $passager = (int)mysqli_real_escape_string($dbconn, $_GET['passagers']);
            $sql = "SELECT id_voyage, lieu_depart, destination, duree, siege_disp, prix, heure_depart FROM voyage WHERE lieu_depart = '$dep' AND destination = '$des' AND date = '$date' AND siege_disp >= '$passager'";
            $result = $dbconn->query($sql);

            if ($result->num_rows > 0) {
                ?>

<h2>Voyages disponibles :</h2>
    <table class="table-voyages">
        <tr>
            <th>Heure de départ</th>
            <th>Lieu de départ</th>
            <th>Destination</th>
            <th>Durée</th>
            <th>Sièges disponibles</th>
            <th>Prix</th>
            <th>Action</th>
        </tr>
        <?php
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["heure_depart"] . "</td>";
                    echo "<td>" . $row["lieu_depart"] . "</td>";
                    echo "<td>" . $row["destination"] . "</td>";
                    echo "<td>" . $row["duree"] . "</td>";
                    echo "<td>" . $row["siege_disp"] . "</td>";
                    echo "<td>" . $row["prix"] . "</td>";
                    echo "<td><button id='reserver_" . $row["id_voyage"] . "' class='btn-reserver'>Réserver</button></td>";
                    echo "</tr>";
                }
            } else {
                echo "<div class='aucun-resultat'>Aucun voyage disponible pour cette recherche.</div>";
            }
            $dbconn->close();
        }
        ?>
    </table>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const buttons = document.querySelectorAll('.btn-reserver');
    const modal = document.getElementById("myModal");
    const span = document.getElementsByClassName("close")[0];
    const cancelBtn = document.getElementById("cancelBtn");
    const confirmBtn = document.getElementById("confirmBtn");
    let selectedVoyageId;
    let nombrePassagers = <?php echo isset($_GET['passagers']) ? $_GET['passagers'] : '0'; ?>;

    buttons.forEach(button => {
        button.addEventListener('click', function() {
            selectedVoyageId = this.id.split('_')[1];
            if (nombrePassagers > 0) {
                modal.style.display = "block";
            } else {
                alert('Nombre de passagers invalide.');
            }
        });
    });

    span.onclick = function() {
        modal.style.display = "none";
    }

    cancelBtn.onclick = function() {
        modal.style.display = "none";
    }

    confirmBtn.onclick = function() {
        modal.style.display = "none";
        
        // Effectuer les traitements nécessaires
        const xhrHistorique = new XMLHttpRequest();
        xhrHistorique.onreadystatechange = function() {
            if (this.readyState === 4 && this.status === 200) {
                alert('Voyage réservé avec succès !');
            }
        };
        xhrHistorique.open('GET', 'inserthisto.php?id_voyage=' + selectedVoyageId + '&passagers=' + nombrePassagers, true);
        xhrHistorique.send();
        
        const xhrUpdateSiege = new XMLHttpRequest();
        xhrUpdateSiege.onreadystatechange = function() {
            if (this.readyState === 4 && this.status === 200) {
                console.log('Sièges mis à jour.');
            }
        };
        xhrUpdateSiege.open('GET', 'siege.php?id_voyage=' + selectedVoyageId + '&passagers=' + nombrePassagers, true);
        xhrUpdateSiege.send();
        window.open('lepdf.php?id_voyage=' + selectedVoyageId + '&passagers=' + nombrePassagers);
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
