<?php
include('inc/pdo.php');
include('fonctions.php');

$title = 'Mot de passe incorrect';

include('inc/header.php');
?>

<main>
    <div class="alert alert-danger" role="alert">
        <h1>
            Mot de passe ou adresse email incorrect
        </h1>
        <p>Cliquez ici pour réessayer</p>
        <a href="index.php">Retour à l'accueil</a>
    </div>

</main>

<?php
include('inc/footer.php');
?>