<?php
session_start();
include('inc/pdo.php');
include('inscription-connexion.php');
include('fonctions.php');

$title = 'Changer de mot de passe';

include('inc/header.php');
?>



<main>
    <div id="page-mdp-change">
        <div id="img-mdp-change">
            <img src="assets/img/undraw_my_password.svg" id="img-mdp-change-container">
        </div>
        <h2 id="txt-titre-change">Veuillez entrer votre nouveau mot de passe</h2>
        <div id="txt-mdp-change">
            <form action="" method="post" class="form-change">
                <div class="form-floating mb-3 input-mdp-change" class="input-mdp-change">
                    <input type="password" name="mdp1change" id="mdp1change" placeholder="Mot de passe" class="form-control input-reset">
                    <label for="mdp">Mot de passe</label>
                </div>
                <div id="contraintechange">
                    <span id="contrainte1change">
                        <!-- <img src="assets/ico/sue-check-grey.svg" id="contrainte1img"> -->
                        <i id="contrainte1changeimg" class="fas fa-check"></i>
                        1 majuscule
                    </span>
                    <span id="contrainte2change">
                        <!-- <img src="assets/ico/sue-check-grey.svg" id="contrainte2img"> -->
                        <i id="contrainte2changeimg" class="fas fa-check"></i>
                        1 minuscule
                    </span>
                    <span id="contrainte3change">
                        <!-- <img src="assets/ico/sue-check-grey.svg" id="contrainte3img"> -->
                        <i id="contrainte3changeimg" class="fas fa-check"></i>
                        1 chiffre
                    </span>
                    <span id="contrainte4change">
                        <!-- <img src="assets/ico/sue-check-grey.svg" id="contrainte4img"> -->
                        <i id="contrainte4changeimg" class="fas fa-check"></i>
                        1 caractère spécial
                    </span>
                    <span id="contrainte5change">
                        <!-- <img src="assets/ico/sue-check-grey.svg" id="contrainte5img"> -->
                        <i id="contrainte5changeimg" class="fas fa-check"></i>
                        8 caractères minimum
                    </span>
                </div>
                <div class="form-floating mb-3 input-mdp-change">
                    <input type="password" name="mdp2change" id="mdp2change" placeholder="Confirmer mot de passe" class="form-control input-reset">
                    <label for="mdp">Confirmer le mot de passe</label>
                </div>
                <div>
                    <span id="contrainte6change">
                        <i id="contrainte6changeimg" class="fas fa-check"></i>
                        <p class="test">Mot de passe identique</p>
                    </span>
                </div>
                <div id="btn-change">
                    <input type="submit" value="Changer de mot de passe" id="change" class="btn btn-primary btn-lg btn-block">
                </div>
            </form>
        </div>
    </div>


</main>

<?php
include('inc/footer.php');
?>

<?php

//Check si le formulaire n'est pas vide
if (!empty($_POST)) {

    //Check si tous les champs sont remplis ou non ou les conditions sont remplis ou non
    if (strlen($_POST["mdp1"]) < 8 || (preg_match('/[a-z]/', $_POST["mdp1"]) == 0) || (preg_match('/[A-Z]/', $_POST["mdp1"]) == 0) || (preg_match('/[0-9]/', $_POST["mdp1"]) == 0) || ((preg_match('/[!-.]/', $_POST["mdp1"]) == 0) && (preg_match('/[:-@]/', $_POST["mdp1"]) == 0) && (preg_match('/[[-`]/', $_POST["mdp1"]) == 0) && (preg_match('/[{-~]/', $_POST["mdp1"]) == 0)) || $_POST["mdp2"] !== $_POST["mdp1"]) {
        echo ("Tous les champs ne sont pas remplis ou respectés!!!");
    } else {
        echo ("Tous les champs sont bien remplis!!!");

        $mdp = $_POST['mdp1'];

        $token = $_GET['token'];

        $ver = $pdo->prepare("SELECT token_at FROM res_users WHERE token='$token'");
        $ver->execute();
        $datecheck = $ver->fetch();

        if (date("Y-m-d H:i:s") < $datecheck['token_at']) {
            //Crypte le MDP
            $hashed_mdp = password_hash($mdp, PASSWORD_DEFAULT);

            //Insert dans la BDD les infos de l'utilisateur
            $req = $pdo->prepare("UPDATE `res_users` SET `password` = '$hashed_mdp' WHERE token='$token'");
            $req->execute();
        } else {
            echo ("Temps limite dépassé");
        }
    }
}

?>