<?php
include('inc/headerModal.php');
?>
<!-- <body> -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
        Inscription/connexion
    </button> -->

<!-- The Modal -->
<div class="modal" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <div id="onglet-css">
                    <h4 class="modal-title" id="btnins">Inscription</h4>
                    <h4 class="modal-title" id="btnco">Connexion</h4>
                </div>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body" id="inscription-body">
                <form action="inscription.php" method="post">

                    <div class="sexe">
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
                        </div>
                    </div>

                    <div class="form-floating mb-3 form-group">
                        <!-- <div class="row">
                                <div class="col"> -->
                        <input type="text" name="nom" id="nom" placeholder="Nom" class="form-control">
                        <label for="nom">Nom</label>
                    </div>
                    <!-- </div> -->
                    <!-- <div class="col"> -->
                    <div class="form-floating mb-3">
                        <input type="text" name="prenom" id="prenom" placeholder="Prénom" class="form-control">
                        <label for="prenom">Prénom</label>
                        <!-- </div> -->
                        <!-- </div> -->
                    </div>


                    <div class="form-floating mb-3">
                        <input type="date" name="date" id="date" class="form-control">
                        <label for="date">Date de naissance</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" name="email" id="email" placeholder="Email" class="form-control">
                        <label for="email">Email</label>
                    </div>
                    <div class="form-floating mb-3">
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
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" name="mdp2" id="mdp2" placeholder="Confirmer mot de passe" class="form-control">
                        <label for="mdp">Confirmer le mot de passe</label>
                    </div>
                    <div>
                        <span id="contrainte6">
                            <i id="contrainte6img" class="fas fa-check"></i>
                            <!-- <img src="assets/ico/sue-check-grey.svg" id="contrainte6img"> -->
                            Mot de passe identique
                        </span>
                    </div>
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
                        <input type="password" name="mdp3" id="mdp3" placeholder="Mot de passe" class="form-control">
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


<?php

include('inc/footer-modal.php');
