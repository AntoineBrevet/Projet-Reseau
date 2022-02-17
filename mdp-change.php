<?php
include('inc/pdo.php');
include('fonctions.php');

$title = 'Changer de mot de passe';

include('inc/header.php');
?>



<main>
    <div id="page-mdp-change">
        <div id="img-mdp-change">
            <img src="assets/img/undraw_my_password.svg" id="img-mdp-change-container">
        </div>
        <div id="txt-mdp-change">
            <h2 id="txt-titre-change">Veuillez entrer votre nouveau mot de passe</h2>
            <!-- <p id="txt-para-change">Veuillez entrer votre nouveau mot de passe.</p> -->
            <form action="" method="post" style="margin-top: 50px;">
                <div class="form-floating mb-3 input-mdp-change" class="input-mdp-change">
                    <input type="password" name="mdp1" id="mdp1" placeholder="Mot de passe" class="form-control">
                    <label for="mdp">Mot de passe</label>
                </div>
                <div id="contrainte">
                    <span id="contrainte1">
                        <!-- <img src="assets/ico/sue-check-grey.svg" id="contrainte1img"> -->
                        <i id="contrainte1img" class="fas fa-check"></i>
                        1 majuscule
                    </span>
                    <span id="contrainte2">
                        <!-- <img src="assets/ico/sue-check-grey.svg" id="contrainte2img"> -->
                        <i id="contrainte2img" class="fas fa-check"></i>
                        1 minuscule
                    </span>
                    <span id="contrainte3">
                        <!-- <img src="assets/ico/sue-check-grey.svg" id="contrainte3img"> -->
                        <i id="contrainte3img" class="fas fa-check"></i>
                        1 chiffre
                    </span>
                    <span id="contrainte4">
                        <!-- <img src="assets/ico/sue-check-grey.svg" id="contrainte4img"> -->
                        <i id="contrainte4img" class="fas fa-check"></i>
                        1 caractère spécial
                    </span>
                    <span id="contrainte5">
                        <!-- <img src="assets/ico/sue-check-grey.svg" id="contrainte5img"> -->
                        <i id="contrainte5img" class="fas fa-check"></i>
                        8 caractères minimum
                    </span>
                </div><br>
                <div class="form-floating mb-3 input-mdp-change">
                    <input type="password" name="mdp2" id="mdp2" placeholder="Confirmer mot de passe" class="form-control">
                    <label for="mdp">Confirmer le mot de passe</label>
                </div>
                <div>
                    <span id="contrainte6">
                        <i id="contrainte6img" class="fas fa-check"></i>
                        Mot de passe identique
                    </span>
                </div><br>
                <div id="btn-change">
                    <input type="submit" value="Changer de mot de passe" id="change" class="btn btn-primary btn-lg btn-block">
                </div>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="mdp-change.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
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
        debug($datecheck);
        if (date("Y-m-d H:i:s") < $datecheck['token_at']) {
            //Crypte le MDP
            $hashed_mdp = password_hash($mdp, PASSWORD_DEFAULT);


            //Insert dans la BDD les infos de l'utilisateur
            $req = $pdo->prepare("UPDATE `res_users` SET `password` = '$hashed_mdp' WHERE token='$token'");
            $req->execute();
            debug($req);
        } else {
            echo ("Temps limite dépassé");
        }
    }
}

?>