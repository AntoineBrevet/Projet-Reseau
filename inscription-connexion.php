<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
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
                    <div id="onglet-css">
                        <h4 class="modal-title" style="cursor: pointer" id="bouttoninscritpion">Inscription</h4>
                        <h4 class="modal-title" style="cursor: pointer" id="bouttonconnexion">Connexion</h4>
                    </div>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body" id="inscription-body">
                    <form action="inscription.php" method="post">
                        <div class="form-floating mb-3">
                            <input type="text" name="nom" id="nom" placeholder="Nom" class="form-control">
                            <label for="nom">Nom</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" name="prenom" id="prenom" placeholder="Prénom" class="form-control">
                            <label for="prenom">Prénom</label>
                        </div>
                        <span id="sexe">
                            Sexe
                        </span>
                        <div class="form-check form-check-inline">
                            <input type="radio" name="sexe" value="homme" id="homme" class="form-check-input">
                            <label for="homme" class="form-check-label">Homme</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" name="sexe" value="femme" id="femme" class="form-check-input">
                            <label for="femme" class="form-check-label">Femme</label>
                        </div><br><br>
                        <div class="form-floating mb-3">
                            <input type="date" name="date" id="date" class="form-control">
                            <label for="date">Date de naissance</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" name="email" id="email" placeholder="Email" class="form-control">
                            <label for="email">Email</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" name="mdp1" id="mdp1" placeholder="Mot de passe" class="form-control">
                            <label for="mdp">Mot de passe</label>
                        </div>
                        <div id="contrainte">
                            <span id="contrainte1"><img src="assets/ico/sue-check-grey.svg" id="contrainte1img"> 1 majuscule</span>
                            <span id="contrainte2"><img src="assets/ico/sue-check-grey.svg" id="contrainte2img"> 1 minuscule</span>
                            <span id="contrainte3"><img src="assets/ico/sue-check-grey.svg" id="contrainte3img"> 1 chiffre</span>
                            <span id="contrainte4"><img src="assets/ico/sue-check-grey.svg" id="contrainte4img"> 1 caractère spécial</span>
                            <span id="contrainte5"><img src="assets/ico/sue-check-grey.svg" id="contrainte5img"> 8 caractères minimum</span>
                        </div><br>
                        <div class="form-floating mb-3">
                            <input type="text" name="mdp2" id="mdp2" placeholder="Confirmer mot de passe" class="form-control">
                            <label for="mdp">Confirmer le mot de passe</label>
                        </div>
                        <div>
                            <span id="contrainte6"><img src="assets/ico/sue-check-grey.svg" id="contrainte6img"> Mot de passe identique</span>
                        </div><br>
                        <div class="modal-footer">
                            <input type="submit" value="S'inscrire" id="inscription" class="btn btn-primary btn-lg btn-block">
                        </div>
                    </form>
                </div>
                <div class="modal-body" id="connexion-body">
                    <form action="connexion.php" method="post">
                        <div class="form-floating mb-3">
                            <input type="email" name="email2" id="email2" placeholder="Email" class="form-control">
                            <label for="email2">Email</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" name="mdp3" id="mdp3" placeholder="Mot de passe" class="form-control">
                            <label for="mdp3">Mot de passe</label>
                        </div>
                        <div class="modal-footer">
                            <input type="submit" value="Se connecter" id="connexion" class="btn btn-primary btn-lg btn-block">
                        </div>
                    </form>
                    <div id="mdp-reset-css">
                        <a href="mdp-reset.php" id="mdp-reset">Mot de passe oublié ?</a>
                    </div>
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