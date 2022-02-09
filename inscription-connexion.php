<?php
$domain = "D}";
if (preg_match('/[!-/]/', $domain) == 1){
    echo("bonjour");
}
echo(preg_match('/[!-]/', $domain));
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="inscription.css">
</head>

<body>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
        Inscription/connexion
    </button>

    <!-- The Modal -->
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title" style="cursor: pointer" id="bouttoninscritpion">Inscription</h4>
                    <h4 class="modal-title" style="cursor: pointer" id="bouttonconnexion">Connexion</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body" id="inscription-body">
                    <form action="inscription.php" method="post">
                        <div>
                            <label for="nom">Nom</label><br>
                            <input type="text" name="nom" id="nom"><br>
                        </div>
                        <div>
                            <label for="prenom">Prenom</label><br>
                            <input type="text" name="prenom" id="prenom"><br><br>
                        </div>
                        <div>
                            <label for="sexe">Sexe</label><br>
                            <input type="radio" name="sexe" value="homme" id="homme">
                            <label for="homme">Homme</label>
                            <input type="radio" name="sexe" value="femme" id="femme">
                            <label for="femme">Femme</label><br><br>
                        </div>
                        <div>
                            <label for="date">Date de naissance</label><br>
                            <input type="date" name="date" id="date"><br><br>
                        </div>
                        <div>
                            <label for="email">Email</label><br>
                            <input type="email" name="email" id="email"><br><br>
                        </div>
                        <div>
                            <label for="mdp">Mot de passe</label><br>
                            <input type="text" name="mdp1" id="mdp1"><br><br>
                        </div>
                        <div>
                            <label for="mdp">Confirmer le mot de passe</label><br>
                            <input type="text" name="mdp2" id="mdp2"><br><br>
                        </div>
                        <div class="modal-footer">
                            <input type="submit" value="S'inscrire" id="inscription" class="btn btn-danger">
                        </div>
                        <p id="contrainte1">1 majuscule</p>
                        <p id="contrainte2">1 minuscule</p>
                        <p id="contrainte3">1 chiffre</p>
                        <p id="contrainte4">1 caractère spécial</p>
                        <p id="contrainte5">8 caractères minimum</p>
                        <p id="contrainte6">Mot de passe identique</p>
                    </form>
                </div>
                <div class="modal-body" id="connexion-body">
                    <form action="connexion.php" method="post">
                        <div>
                            <label for="email2">Email</label><br>
                            <input type="text" name="email2" id="email2"><br>
                        </div>
                        <div>
                            <label for="mdp3">Mot de passe</label><br>
                            <input type="text" name="mdp3" id="mdp3"><br><br>
                        </div>
                        <div class="modal-footer">
                            <input type="submit" value="Se connecter" id="connexion" class="btn btn-danger">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="inscription.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>