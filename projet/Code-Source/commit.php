<?php

$delai = 2;


$urlRedirection = 'users.php';


$messageConfirmation = 'Votre avez bien inscrit avec succes . Vous serez redirigé dans votre compte dans quelques secondes...';


echo '<div style="text-align:center; margin-top:50px;">';
echo '<p>' . $messageConfirmation . '</p>';
echo '<p>Redirection dans ' . $delai . ' secondes...</p>';
echo '</div>';
?>

<script>

setTimeout(function() {

    window.open('<?php echo $urlRedirection; ?>', '_top');

}, <?php echo $delai * 1000; ?>); // Convertir le délai en millisecondes
</script>
