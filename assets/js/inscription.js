//Fonction de verif minuscule

function hasLowerCase(str) {
    return (/[a-z]/.test(str));
}

//Fonction de verif majuscule

function hasUpperCase(str) {
    return (/[A-Z]/.test(str));
}

//Fonction de verif nombre

function hasNumber(str) {
    return (/[0-9]/.test(str));
}

//Fonctions de verif caractères spéciaux

function hasCS1(str) {
    return (/[!-/]/.test(str));
}
function hasCS2(str) {
    return (/[:-@]/.test(str));
}
function hasCS3(str) {
    return (/[[-`]/.test(str));
}
function hasCS4(str) {
    return (/[{-~]/.test(str));
}

//Vérif majuscule

$(document).on('input', '#mdp1', function () {
    if (hasUpperCase($("#mdp1").val())) {
        $("#contrainte1").css("color", "green");
        $("#contrainte1img").css("color", "green")
    }
    else {
        $("#contrainte1").css("color", "grey");
        $("#contrainte1img").css("color", "grey")
    }
});

//Vérif minuscule

$(document).on('input', '#mdp1', function () {
    if (hasLowerCase($("#mdp1").val())) {
        $("#contrainte2").css("color", "green");
        $("#contrainte2img").css("color", "green")
    }
    else {
        $("#contrainte2").css("color", "grey");
        $("#contrainte2img").css("color", "grey")
    }
});

//Vérif nombre

$(document).on('input', '#mdp1', function () {
    if (hasNumber($("#mdp1").val())) {
        $("#contrainte3").css("color", "green");
        $("#contrainte3img").css("color", "green")
    }
    else {
        $("#contrainte3").css("color", "grey");
        $("#contrainte3img").css("color", "grey")
    }
});

//Vérif caracyères spéciaux

$(document).on('input', '#mdp1', function () {
    if ((hasCS1($("#mdp1").val())) || (hasCS2($("#mdp1").val())) || (hasCS3($("#mdp1").val())) || (hasCS4($("#mdp1").val()))) {
        $("#contrainte4").css("color", "green");
        $("#contrainte4img").css("color", "green")
    }
    else {
        $("#contrainte4").css("color", "grey");
        $("#contrainte4img").css("color", "grey")
    }
});

//Vérif minimum 8 caractères

$(document).on('input', '#mdp1', function () {
    if ($("#mdp1").val().length >= 8) {
        $("#contrainte5").css("color", "green");
        $("#contrainte5img").css("color", "green")
    }
    else {
        $("#contrainte5").css("color", "grey");
        $("#contrainte5img").css("color", "grey")
    }
});

//Vérif si les MDP sont identiques

$(document).on('input', '#mdp1,#mdp2', function () {
    if (($("#mdp1").val() == $("#mdp2").val()) && $("#mdp2").val().length >= 1) {
        $("#contrainte6").css("color", "green");
        $("#contrainte6img").css("color", "green")
    }
    else {
        $("#contrainte6").css("color", "grey");
        $("#contrainte6img").css("color", "grey")
    }
});

//Check si les input d'inscription sont remplis et si non, empêche le refresh de la page

$(document).on('click', '#inscription', function (event) {
    if ($("#nom").val() && $("#prenom").val() && ($("#homme").is(':checked') || $("#femme").is(':checked')) && $("#date").val() && $("#email").val() && hasUpperCase($("#mdp1").val()) && hasLowerCase($("#mdp1").val()) && hasNumber($("#mdp1").val()) && (hasCS1($("#mdp1").val()) || hasCS2($("#mdp1").val()) || hasCS3($("#mdp1").val()) || hasCS4($("#mdp1").val())) && ($("#mdp1").val().length >= 8) && ($("#mdp1").val() == $("#mdp2").val())) {
        alert("yoohoo")
    }
    else {
        alert("Des champs ne sont pas remplis! (inscription)")
        event.preventDefault();
    }
});

//Check si les input de connexion sont remplis et si non, empêche le refresh de la page

$(document).on('click', '#connexion', function (event) {
    if ($("#mdp3").val() && $("#email2").val()) {
        console.log("oui");
    }
    else {
        alert("Des champs ne sont pas remplis! (connexion)");
        event.preventDefault();
    }
});

$("#connexion-body").hide();

//Affiche l'inscription et fait disparaitre la connexion

$(document).on('click', '#bouttoninscritpion', function () {
    $("#connexion-body").hide();
    $("#inscription-body").show();
});

//Affiche la connexion et fait disparaitre l'inscription

$(document).on('click', '#bouttonconnexion', function () {
    $("#inscription-body").hide();
    $("#connexion-body").show();
});