<?php
include 'database.php';

$sql = "SELECT * FROM client";
$stmt = $conn->prepare($sql);
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin User Management</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
</head>
 <style>
#prevBtn{
   background-color:#f5f5f5;
   border-color: black;
   padding: 10px 20px;
   color:black;
}
#nextBtn{
   background-color:#f5f5f5;
   border-color: black;
   padding: 10px 20px;
   color:black;
}
    </style>
<body>

<div class="container mt-5">
    <h2 class="mb-4"></h2>
    <div class="card">
        <div class="card-header">
            <h3>utilisateurs enregistree</h3>
        </div>
        <div class="card-body">
            <table id="userTable" class="display">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nom</th>
                        <th>Email</th>
                        <th>Téléphone</th>
                        <th>Date de Naissance</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (count($results) > 0) {
                        $i = 1;
                        foreach ($results as $row) {
                            echo "<tr>";
                            echo "<td>" . $i++ . "</td>";
                            echo "<td>" . htmlspecialchars($row['nom']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['telephone']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['date_naissance']) . "</td>";
                            echo "<td><button class='btn btn-danger' data-toggle='modal' data-target='#confirmModal' data-id='" . $row['id_client'] . "'>supprime compte</button></td>";
                            echo "</tr>";
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="d-flex justify-content-between mt-3">
        <button id="prevBtn" class="btn btn-primary">Précédent</button>
        <button id="nextBtn" class="btn btn-primary">Suivant</button>
    </div>
</div>

<div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Confirmer la suppression</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            Êtes-vous sûr de vouloir supprimer ce compte ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">annuler</button>
                <button type="button" class="btn btn-danger" id="confirmDisable">supprimer</button>
            </div>
        </div>
    </div>
</div>

<!-- Success Modal -->
<div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="successModalLabel">Succes</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            Le compte a été bien supprimee avec succès.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    var table = $('#userTable').DataTable({
        "pagingType": "simple",
        "language": {
            "paginate": {
                "previous": "Précédent",
                "next": "Suivant"
            }
        }
    });

    $('#prevBtn').on('click', function() {
        table.page('previous').draw('page');
    });

    $('#nextBtn').on('click', function() {
        table.page('next').draw('page');
    });

    var userId;
    $('#confirmModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        userId = button.data('id');
    });

    $('#confirmDisable').on('click', function() {
        $.post('disable_user.php', { id: userId }, function(response) {
            if (response.trim() === 'success') {
                $('#confirmModal').modal('hide');
                $('#successModal').modal('show');
                $('#successModal').on('hidden.bs.modal', function () {
                    location.reload();
                });
            } else {
                alert('Failed to delete account');
            }
        }).fail(function() {
            alert('Failed to delete account');
        });
    });
});
</script>

</body>
</html>

<?php
$conn = null;
?>
