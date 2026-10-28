<?php
 require('util.php');
 init_php_session();

 if(!isset($_SESSION['id_admin'])) {
    echo "<script>window.open('Se_connecter_admin.php', '_top');</script>";
     exit;
 }
include('database.php');
$date = date('Y-m-d');
if (isset($_POST['date'])) {
    $date = $_POST['date'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Gestion des Voyages</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+1+Code:wght@100..700&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

    <style>
           body {
               font-family: Arial, sans-serif;
               background-color: #f5f5f5;
               margin: 0;
               padding: 0;
           }
           .container {
               width: 80%;
               margin: auto;
               overflow: hidden;
           }
           .main-content {
               padding: 20px;
               background: #fff;
               margin-top: 20px;
               border-radius: 5px;
               box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
           }
           .cards {
               display: flex;
               flex-wrap: wrap;
               gap: 20px;
               justify-content: space-around;
           }
           .card {
               background: #fff;
               border-radius: 5px;
               box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
               transition: transform 0.2s, box-shadow 0.2s;
               width: 300px;
               padding: 15px;
               margin: 20px;
               display: flex;
               flex-direction: column;
               justify-content: space-between;
           }
           .card:hover {
               transform: translateY(-10px);
               box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
           }
           .card .card-header {
               font-size: 1.2em;
               margin-bottom: 10px;
           }
           .card .card-body {
               flex-grow: 1;
               margin-bottom: 10px;
           }
           .card .buttons {
               display: flex;
               justify-content: space-between;
           }
           .button {
               background: #dd0005;
               color: #fff;
               padding: 10px 20px;
               text-align: center;
               border-radius: 5px;
               transition: background 0.3s ease;
               text-decoration: none;
           }
           .buttonadd {
               background: #52b788;
               color: #fff;
               padding: 10px 20px;
               text-align: center;
               border-radius: 5px;
               transition: background 0.3s ease;
               text-decoration: none;
               cursor: pointer;
           }
           .button:hover {
               background: #dd0005;
           }
           .add-button {
               display: block;
               margin: 20px 0;
               text-align: right;
           }
           .pagination {
               margin: 20px 0;
               text-align: center;
           }
           .pagination a {
               color: black;
               float: left;
               padding: 8px 16px;
               text-decoration: none;
               transition: background-color .3s;
           }
           .pagination a.active {
               background-color: #52b788;
               color: white;
               border-radius: 5px;
           }
           .pagination a:hover:not(.active) {
               background-color: #ddd;
               border-radius: 5px;
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
               background-color: rgba(0, 0, 0, 0.5);
           }
           .modal-content {
               background-color: #fefefe;
               margin: 15% auto;
               padding: 20px;
               border: 1px solid #888;
               width: 80%;
               max-width: 600px;
               border-radius: 5px;
           }
           .close {
               color: #aaa;
               float: right;
               font-size: 28px;
               font-weight: bold;
               cursor: pointer;
           }
           .close:hover,
           .close:focus {
               color: black;
               text-decoration: none;
               cursor: pointer;
           }
           .form-group {
               margin-bottom: 15px;
           }
           .form-group label {
               display: block;
               margin-bottom: 5px;
           }
           .form-group input {
               width: 100%;
               padding: 8px;
               box-sizing: border-box;
           }
           .form-group select {
               width: 100%;
               padding: 8px;
               box-sizing: border-box;
           }
           .form-group button {
               background: #52b788;
               color: #fff;
               padding: 10px 20px;
               border: none;
               border-radius: 5px;
               cursor: pointer;
           }
           #dateForm {
               background: #fff;
               padding: 25px 35px;
               border-radius: 15px;
               box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
               max-width: 450px;
               width: 100%;
               transition: transform 0.3s ease;
           }

           #dateForm:hover {
               transform: translateY(-5px);
           }

           #dateForm label {
               display: block;
               margin-bottom: 15px;
               font-size: 1.2em;
               color: #444;
               font-weight: 600;
           }

           #dateForm input[type="date"] {
               width: 100%;
               padding: 12px;
               margin-bottom: 25px;
               border: 1px solid #ccc;
               border-radius: 8px;
               font-size: 1em;
               box-sizing: border-box;
               transition: border-color 0.3s ease, box-shadow 0.3s ease;
           }

           #dateForm input[type="date"]:focus {
               border-color: #dd0005;
               box-shadow: 0 0 5px rgba(255, 99, 71, 0.5);
               outline: none;
           }

           #dateForm input[type="submit"] {
               width: 100%;
               padding: 12px;
               border: none;
               border-radius: 8px;
               background-color: #e1261d;
               color: #fff;
               font-size: 1.1em;
               font-weight: bold;
               cursor: pointer;
               transition: background-color 0.3s ease, transform 0.3s ease;
           }

           #dateForm input[type="submit"]:hover {
               background-color: #c2132b;

           }
           .buttons button {
       padding: 10px 20px;
       margin: 5px;
       border: none;
       border-radius: 5px;
       cursor: pointer;
       transition: background-color 0.3s ease, transform 0.3s ease;
   }
   .buttons button:first-child {
       background-color: #52b788;
       color: white;
   }

   .buttons button:first-child:hover {
       background-color: #52b788;
       transform: scale(1.05);
   }
   .buttons button:last-child {
       background-color: #dd0005;
       color: white;
   }

   .buttons button:last-child:hover {
       background-color: #dd0005;
       transform: scale(1.05);
   }




   .modalle {
       display: none;
       position: fixed;
       z-index: 1;
       left: 0;
       top: 0;
       width: 100%;
       height: 100%;
       overflow: auto;
       background-color: rgb(0,0,0);
       background-color: rgba(0,0,0,0.4);
   }


   .modalle-content {
       background-color: #fefefe;
       margin: 15% auto;
       padding: 20px;
       border: 1px solid #888;
       width: 80%;
   }


   .close,.closee {
       color: #aaa;
       float: right;
       font-size: 28px;
       font-weight: bold;
   }

   .close:hover,.closee:hover,
   .close:focus,.closee:focus {
       color: black;
       text-decoration: none;
       cursor: pointer;
   }


   .modalle button {
       margin: 10px;
       padding: 10px 20px;
       border: none;
       cursor: pointer;
       font-size: 16px;
       background-color: #dd0005;
        color:#ffffff;
   }

   .modalle button:first-child {
       background-color: black;
       color:#f44336;
   }

   .modalle button:last-child {
       color: black;
       background-color: #f5f5f5;
   }

   .enregistre {
       background-color: #52b788;
       border: none;
       color: white;
       padding: 15px 30px;
       text-align: center;
       text-decoration: none;
       display: inline-block;
       font-size: 16px;
       margin: 10px 2px;
       cursor: pointer;
       border-radius: 5px;
       transition: background-color 0.3s ease, transform 0.2s ease;
   }

   .enregistre:hover {
       background-color: #52b788;
       transform: scale(1.05);
   }

   .enregistre:active {
       background-color: #52b788;
       transform: scale(0.98);
   }


       </style>
</head>
<body>
    <div class="container">
        <div class="main-content">
            <div class="add-button">
                <span class="buttonadd" id="openModalBtn">Ajouter Voyage</span>
            </div>
            <h2>Voyages disponibles le <?php echo date('d/m/Y', strtotime($date)); ?></h2>
            <form id="dateForm" method="POST">
                <label for="date">Sélectionner une date :</label>
                <input type="date" id="date" name="date" value="<?php echo $date; ?>">
                <input type="submit" value="Afficher">
            </form>
            <div class="cards" id="voyages-container">
               
            </div>
            <div class="pagination" id="pagination">
                
            </div>
        </div>
    </div>
<!-- Modal pour modifier un voyage -->
<div id="editVoyageModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <form id="editVoyageForm" action="edit_voyage.php" method="POST">
            <input type="hidden" id="edit-id" name="id_voyage">
            <div class="form-group">
                <label for="edit-lieu_depart">Lieu de départ:</label>
                <select id="edit-lieu_depart"   name="lieu_depart"  required>
        <option value="Casablanca">	Casablanca</option>
        <option value="Rabat">Rabat</option>
        <option value="Fès">Fès</option>
        <option value="Marrakech">Marrakech</option>
        <option value="Agadir"> Agadir</option>
        <option value="Tanger"> Tanger</option>
        <option value="Meknès"> 	Meknès</option>
        <option value="Oujda">	Oujda </option>
        <option value="Kenitra "> Kenitra</option>
        <option value="Tétouan"> Tétouan</option>
        <option value="Safi"> Safi</option>
        <option value="Mohammedia"> Mohammedia</option>
        <option value="khouribga"> khouribga</option>
        <option value="Beni Mellal"> 	Beni Mellal</option>
        <option value="El Jadida">El Jadida </option>
        <option value="Taza"> Taza</option>
        <option value="Nador"> Nador</option>
        <option value="Settat">Settat </option>
        <option value="khemisset">	khemisset </option>
        <option value="Larache"> Larache</option>
        <option value="Berkane">Berkane </option>
        <option value="Essaouira"> Essaouira</option>
        <option value="Laayoune"> Laayoune</option>



    </select>
            </div>
            <div class="form-group">
                <label for="edit-destination">Destination:</label>
                <select id="edit-destination"   name="destination"  required>
        <option value="Casablanca">	Casablanca</option>
        <option value="Rabat">Rabat</option>
        <option value="Fès">Fès</option>
        <option value="Marrakech">Marrakech</option>
        <option value="Agadir"> Agadir</option>
        <option value="Tanger"> Tanger</option>
        <option value="Meknès"> 	Meknès</option>
        <option value="Oujda">	Oujda </option>
        <option value="Kenitra "> Kenitra</option>
        <option value="Tétouan"> Tétouan</option>
        <option value="Safi"> Safi</option>
        <option value="Mohammedia"> Mohammedia</option>
        <option value="khouribga"> khouribga</option>
        <option value="Beni Mellal"> 	Beni Mellal</option>
        <option value="El Jadida">El Jadida </option>
        <option value="Taza"> Taza</option>
        <option value="Nador"> Nador</option>
        <option value="Settat">Settat </option>
        <option value="khemisset">	khemisset </option>
        <option value="Larache"> Larache</option>
        <option value="Berkane">Berkane </option>
        <option value="Essaouira"> Essaouira</option>
        <option value="Laayoune"> Laayoune</option>



    </select>
                
            </div>
            <div class="form-group">
                <label for="edit-date">date:</label>
                <input type="date" id="edit-date" name="date" required>
            </div>
            <div class="form-group">
                <label for="edit-heure_depart">Heure de départ:</label>
                <input type="time" id="edit-heure_depart" name="depart" required>
            </div>
            <div class="form-group">
                <label for="edit-duree">Durée:</label>
                <input type="text" id="edit-duree" name="duree" required>
            </div>
            <div class="form-group">
                <label for="edit-siege_disp">Sièges disponibles:</label>
                <input type="number" id="edit-siege_disp" name="siege_disp" required>
            </div>
            <div class="form-group">
                <label for="edit-prix">Prix:</label>
                <input type="number" id="edit-prix" name="prix" required>
            </div>
            <button type="submit" class="enregistre">Enregistrer les modifications</button>
        </form>
    </div>
</div>

<div id="deleteModal" class="modalle">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <p>Êtes-vous sûr de vouloir supprimer ce voyage ?</p>
        <button id="confirmDeleteButton">Oui, supprimer</button>
        <button onclick="closeModal()">Annuler</button>
    </div>
</div>



    <!-- Modal d'ajout-->
    <div id="voyageModal" class="modal">
        <div class="modal-content">
            <span class="closee">&times;</span>
            <h2>Ajouter un nouveau voyage</h2>
            <form action="add_voyage.php" method="POST">
                <div class="form-group">
                    <label for="lieu_depart">Lieu de départ:</label>
                    <select id="lieu_depart"   name="lieu_depart"  required>
        <option value="Casablanca">	Casablanca</option>
        <option value="Rabat">Rabat</option>
        <option value="Fès">Fès</option>
        <option value="Marrakech">Marrakech</option>
        <option value="Agadir"> Agadir</option>
        <option value="Tanger"> Tanger</option>
        <option value="Meknès"> 	Meknès</option>
        <option value="Oujda">	Oujda </option>
        <option value="Kenitra "> Kenitra</option>
        <option value="Tétouan"> Tétouan</option>
        <option value="Safi"> Safi</option>
        <option value="Mohammedia"> Mohammedia</option>
        <option value="khouribga"> khouribga</option>
        <option value="Beni Mellal"> 	Beni Mellal</option>
        <option value="El Jadida">El Jadida </option>
        <option value="Taza"> Taza</option>
        <option value="Nador"> Nador</option>
        <option value="Settat">Settat </option>
        <option value="khemisset">	khemisset </option>
        <option value="Larache"> Larache</option>
        <option value="Berkane">Berkane </option>
        <option value="Essaouira"> Essaouira</option>
        <option value="Laayoune"> Laayoune</option>



    </select>
                </div>
                <div class="form-group">
                    <label for="destination">Destination:</label>
                    <select id="destination"   name="destination"  required>
        <option value="Casablanca">	Casablanca</option>
        <option value="Rabat">Rabat</option>
        <option value="Fès">Fès</option>
        <option value="Marrakech">Marrakech</option>
        <option value="Agadir"> Agadir</option>
        <option value="Tanger"> Tanger</option>
        <option value="Meknès"> 	Meknès</option>
        <option value="Oujda">	Oujda </option>
        <option value="Kenitra "> Kenitra</option>
        <option value="Tétouan"> Tétouan</option>
        <option value="Safi"> Safi</option>
        <option value="Mohammedia"> Mohammedia</option>
        <option value="khouribga"> khouribga</option>
        <option value="Beni Mellal"> 	Beni Mellal</option>
        <option value="El Jadida">El Jadida </option>
        <option value="Taza"> Taza</option>
        <option value="Nador"> Nador</option>
        <option value="Settat">Settat </option>
        <option value="khemisset">	khemisset </option>
        <option value="Larache"> Larache</option>
        <option value="Berkane">Berkane </option>
        <option value="Essaouira"> Essaouira</option>
        <option value="Laayoune"> Laayoune</option>



    </select>
                </div>
                <div class="form-group">
                    <label for="date">date:</label>
                    <input type="date" id="date" name="date" required>
                </div>
                <div class="form-group">
                    <label for="heure_depart">Heure de départ:</label>
                    <input type="time" id="heure_depart" name="heure_depart" required>
                </div>
                <div class="form-group">
                    <label for="duree">Durée:</label>
                    <input type="text" id="duree" name="duree" required>
                </div>
                <div class="form-group">
                    <label for="prix">Prix:</label>
                    <input type="number" id="prix" name="prix" required>
                </div>
                <div class="form-group">
                    <label for="siege_disp">Sièges disponibles:</label>
                    <input type="number" id="siege_disp" name="siege_disp" required>
                </div>
                <div class="form-group">
                    <button type="submit">Ajouter</button>
                </div>
            </form>
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        let page = 1;
        let date = document.getElementById('date').value;

        function loadVoyages() {
            fetch(`get_voyages.php?page=${page}&date=${date}`)
                .then(response => response.json())
                .then(data => {
                    const voyagesContainer = document.getElementById('voyages-container');
                    voyagesContainer.innerHTML = '';
                    data.voyages.forEach(voyage => {
                        voyagesContainer.innerHTML += `
                            <div class="card">
                                <div class="card-header">
                                    Voyage à ${voyage.destination}
                                </div>
                                <div class="card-body">
                                    <p><strong>Départ:</strong> ${voyage.lieu_depart}</p>
                                    <p><strong>Heure de départ:</strong> ${voyage.heure_depart}</p>
                                    <p><strong>Durée:</strong> ${voyage.duree}</p>
                                    <p><strong>Prix:</strong> ${voyage.prix} MAD</p>
                                    <p><strong>Sièges disponibles:</strong> ${voyage.siege_disp}</p>
                                </div>
                                <div class="buttons">
                                    <button onclick="showEditForm(${voyage.id_voyage})">Modifier</button>
                                    <button onclick="confirmDelete(${voyage.id_voyage})">Supprimer</button>
                                </div>
                            </div>
                        `;
                    });
                });

            updatePagination();
        }

        function updatePagination() {
            fetch(`get_voyages.php?count=1&date=${date}`)
                .then(response => response.json())
                .then(data => {
                    const total = data.count;
                    const pages = Math.ceil(total / 6);
                    const pagination = document.getElementById('pagination');
                    pagination.innerHTML = '';

                    if (page > 1) {
                        pagination.innerHTML += `<a href="#" class="prev">Précédent</a>`;
                    }

                    for (let i = 1; i <= pages; i++) {
                        pagination.innerHTML += `<a href="#" class="${i === page ? 'active' : ''}">${i}</a>`;
                    }

                    if (page < pages) {
                        pagination.innerHTML += `<a href="#" class="next">Suivant</a>`;
                    }
                });
        }

        document.getElementById('pagination').addEventListener('click', function(event) {
            if (event.target.tagName === 'A') {
                event.preventDefault();
                const clickedPage = event.target.textContent;
                if (clickedPage === 'Précédent') {
                    page--;
                } else if (clickedPage === 'Suivant') {
                    page++;
                } else {
                    page = parseInt(clickedPage);
                }
                loadVoyages();
            }
        });

        document.getElementById('dateForm').addEventListener('submit', function(event) {
            event.preventDefault();
            date = document.getElementById('date').value;
            loadVoyages();
        });

        function setupModal() {
    var modal = document.getElementById("voyageModal");
    var btn = document.getElementById("openModalBtn");
    var span = document.getElementsByClassName("closee")[0];
    btn.onclick = function() {
        modal.style.display = "block";
    }
    span.onclick = function() {
        modal.style.display = "none";
    }
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
}
setupModal();

        loadVoyages();
    });

    function showEditForm(id) {
    fetch(`get_voyageid.php?id=${id}`)
        .then(response => response.json())
        .then(data => {
            document.getElementById('edit-id').value = data.id_voyage;
            document.getElementById('edit-lieu_depart').value = data.lieu_depart;
            document.getElementById('edit-destination').value = data.destination;
            document.getElementById('edit-date').value = data.date;
            document.getElementById('edit-heure_depart').value = data.heure_depart;
            document.getElementById('edit-duree').value = data.duree;
            document.getElementById('edit-siege_disp').value = data.siege_disp;
            document.getElementById('edit-prix').value = data.prix;

            document.getElementById('editVoyageModal').style.display = 'block';
        })
        .catch(error => {
            console.error('Erreur lors de la récupération des détails du voyage:', error);
        });


        document.querySelector('.close').onclick = function() {
    document.getElementById('editVoyageModal').style.display = 'none';
};

 window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = 'none';
        }
    }
}

function closeModal() {
    document.getElementById('deleteModal').style.display = 'none';
}

function confirmDelete(id) {
    const modal = document.getElementById('deleteModal');
    const confirmButton = document.getElementById('confirmDeleteButton');

    confirmButton.onclick = function() {
        deleteVoyage(id);
    };

    modal.style.display = 'block';
}

function deleteVoyage(id) {
    fetch(`delete_voyage.php?id=${id}`, { method: 'GET' })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                location.reload();
            } else {
                alert('Erreur lors de la suppression du voyage.');
            }
        })
        .catch(error => {
            console.error('Erreur lors de la suppression du voyage:', error);
        })
        .finally(() => {
            closeModal();
        });
}

window.onclick = function(event) {
    const modal = document.getElementById('deleteModal');
    if (event.target == modal) {
        modal.style.display = 'none';
    }
}

   
</script>

    
</body>
</html>
