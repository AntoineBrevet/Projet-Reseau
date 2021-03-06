<?php
session_start();
include('inc/pdo.php');
include('fonctions.php');
$title = 'Récuperation du mot de passe';
include('inscription-connexion.php');


include('inc/header.php');
include('testphpMailer.php');

error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', 1);

?>



<div class="bodu">
    <div id="page-mdp-reset">
        <div id="img-mdp-reset">
            <img src="assets/img/forgot_password.svg" id="img-mdp-reset-container">
        </div>
        <div id="txt-mdp-reset">
            <h2 id="txt-titre-reset">Mot de passe oublié</h2>
            <p id="txt-para-reset">Vous allez recevoir un e-mail pour rénitialiser votre mot de passe.</p>
            <form action="#" method="post" class="form-reset">
                <div class="form-floating mb-3 input-mdp-reset">

                    <input type="email" name="email" id="email" placeholder="Email" class="form-control input-reset">

                    <label for="email" id="email-label">Veuillez entrer votre adresse e-mail</label>

                </div>

                <input class="btn btn-primary btn-lg btn-reset" type="submit" value="Envoyer mail">
            </form>

        </div>
    </div>

</div>
<!-- </main> -->

<?php
include('inc/footer.php');
?>

<?php


if (empty($_POST["email"])) {
    // echo ("Tous les champs ne sont pas remplis!");
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
    if (!empty($emailcheck)) {
        $datenow = date("Y-m-d H:i:s");
        $date = date('Y-m-d H:i:s', strtotime('+5 minutes', strtotime($datenow)));

        //Insert le token et la date limite du token dans la BDD
        $req = $pdo->prepare("UPDATE `res_users` SET `token` = '$token', `token_at` = '$date' WHERE email='$email'");
        $req->execute();

        $link = "Vous avez 5 minutes pour changer votre mot de passe. Veuillez cliquer sur le lien suivant : \r\n  http://localhost/Projet-Reseau/mdp-change.php?token=" . $token;

        $result = smtpmailer($email, 'Support FrameIP', 'FrameIP Assistance', 'Changement de mot de passe', $link);
        if (true !== $result) {
            // erreur -- traiter l'erreur
            echo $result;
        }
    } else {
        echo ("Email non existant");
    }
}

?>