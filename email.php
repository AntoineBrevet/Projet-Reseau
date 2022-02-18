<?php
include('inc/pdo.php');
include('fonctions.php');

$title = 'Email incorrect';

include('inc/header.php');
?>

<main>
    <div class="erreur">
        <h1 class="title-erreur">
            L'email est déjà utilisé!
        </h1>
        
        <a class="link-erreur" href="index.php"><p>Cliquez ici pour réessayer</p></a>
    </div>
</main>

<?php
include('inc/footer.php');
?>