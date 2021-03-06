<?php
include('inc/pdo.php');
include('fonctions.php');



//Check si le formulaire n'est pas vide
if (!empty($_POST)) {

    //Check si tous les champs sont remplis ou non ou les conditions sont remplis ou non
    if (empty($_POST["nom"]) || empty($_POST["prenom"]) || empty($_POST["sexe"]) || empty($_POST["date"]) || empty($_POST["email"]) || strlen($_POST["mdp1"]) < 8 || (preg_match('/[a-z]/', $_POST["mdp1"]) == 0) || (preg_match('/[A-Z]/', $_POST["mdp1"]) == 0) || (preg_match('/[0-9]/', $_POST["mdp1"]) == 0) || ((preg_match('/[!-.]/', $_POST["mdp1"]) == 0) && (preg_match('/[:-@]/', $_POST["mdp1"]) == 0) && (preg_match('/[[-`]/', $_POST["mdp1"]) == 0) && (preg_match('/[{-~]/', $_POST["mdp1"]) == 0)) || $_POST["mdp2"] !== $_POST["mdp1"]) {
        echo ("Tous les champs ne sont pas remplis ou respectés!!!");
    } else {
        echo ("Tous les champs sont bien remplis!!!");
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $sexe = $_POST['sexe'];
        $date = $_POST['date'];
        $email = $_POST['email'];
        $mdp = $_POST['mdp1'];

        //Crypte le MDP
        $hashed_mdp = password_hash($mdp, PASSWORD_DEFAULT);

        //Check si l'email est déjà présent dans la BDD
        $ver = $pdo->prepare("SELECT * FROM res_users WHERE email='$email'");
        $ver->execute();
        $users = $ver->fetch();
        if ($users) {
            header('location: email.php');
        } else {
            //Insert dans la BDD les infos de l'utilisateur
            $req = $pdo->prepare("INSERT INTO res_users (surname, name, sexe, date_naissance, email,password,created_at) VALUES ('$nom', '$prenom', '$sexe', '$date', '$email', '$hashed_mdp',NOW())");
            $req->execute();
            header('Location: index.php');
        }
    }
}
