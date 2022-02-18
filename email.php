<?php
include('inc/pdo.php');
include('fonctions.php');

$title = 'Email incorrect';

include('inc/header.php');
?>

<main>
    <h1>
        L'email est déjà utilisé!
    </h1>
    <p>Cliquez ici pour réessayer</p>
    <a href="index.php">Retour à l'accueil</a>
</main>

<?php
include('inc/footer.php');
?>