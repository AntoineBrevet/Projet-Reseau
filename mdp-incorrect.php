<?php
include('inc/pdo.php');
include('fonctions.php');

$title = 'Mot de passe incorrect';

include('inc/header.php');
?>

<main>
    <div class="erreur" role="alert">
        <h1 class="title-erreur">
            Mot de passe ou adresse email incorrect
        </h1>

        <a class="link-erreur" href="index.php">
            <p>Cliquez ici pour réessayer</p>
        </a>
    </div>

</main>

<?php
include('inc/footer.php');
?>