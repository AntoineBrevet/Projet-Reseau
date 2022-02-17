<?php
session_start();
include('inc/pdo.php');
include('fonctions.php');

//Check si le formulaire n'est pas vide
if (!empty($_POST)) {

    //Check si tous les champs sont remplis ou non
    if (empty($_POST["email2"]) || empty($_POST["mdp3"])) {
        echo ("Tous les champs ne sont pas remplis!");
    } else {
        $email = $_POST['email2'];
        $mdp = $_POST['mdp3'];

        //Selectionne le MDP correspondant à l'email dans la BDD
        $requestUtilisateur = $pdo->prepare("SELECT * FROM res_users WHERE email = '$email'");
        $requestUtilisateur->execute();
        $users = $requestUtilisateur->fetch();

        // $requestprenom = $pdo->prepare(
        //     "SELECT `name` FROM res_users WHERE email='$username'"
        // );
        // $requestprenom->execute();
        // $prenom_user = $requestprenom->fetchAll();

        //Décrypte le MDP récupéré
        if (password_verify($mdp, $users['password'])) {
            $_SESSION['connected'] = true;
            $_SESSION['name'] = $users['name'];
            // echo ("Le MDP est bon!");
            header('Location: chart.php');
        } else {
            echo ("Le MDP n'est pas le bon!");
        }
    }
}
