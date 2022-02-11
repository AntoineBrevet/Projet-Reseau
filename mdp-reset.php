<?php
include('inc/pdo.php');
include('fonctions.php');
include('inc/header.php');
?>



<main>
    <div id="page-mdp-reset">
        <div id="img-mdp-reset">
            <img src="assets/img/forgot_password.svg" id="img-mdp-reset-container">
        </div>
        <div id="txt-mdp-reset">
            <h2>Mot de passe oublié</h2>
            <p>Vous allez recevoir un e-mail pour rénitialiser votre mot de passe.</p>
            <form action="#" method="post">
                <div class="form-floating mb-3">
                    <input type="email" name="email" id="email" placeholder="Email" class="form-control">
                    <label for="email" id="email-label">Veuillez entrer votre adresse e-mail</label>
                </div>
                <button class="btn btn-primary btn-lg btn-block">
                    Envoyer mail
                </button>
            </form>

        </div>
    </div>

</main>

<?php
include('inc/footer.php');
?>

<?php

if (empty($_POST["email"])) {
    echo ("Tous les champs ne sont pas remplis!");
} else {
    $email = $_POST['email'];

    //Génère une chaine de caractères aléatoirement
    $token = openssl_random_pseudo_bytes(5);

    //Convertit la chaine en hexa
    $token = bin2hex($token);

    //Convertit les miniscules en majuscules
    $token = strtoupper($token);

    //Check si l'email est déjà présent dans la BDD
    $ver = $pdo->prepare("SELECT * FROM res_users WHERE email='$email'");
    $ver->execute();
    $emailcheck = $ver->fetchAll();

    if ($emailcheck){
        $datenow = date("Y-m-d H:i:s");
        $date = date('Y-m-d H:i:s',strtotime('+5 minutes',strtotime($datenow)));

        //Insert le token et la date limite du token dans la BDD
        $req = $pdo->prepare("UPDATE `res_users` SET `token` = '$token', `token_at` = '$date' WHERE email='$email'");
        $req->execute();
        header('location: index.php');
    }
    else{
        echo("Email non existant");
    }   
}

?>