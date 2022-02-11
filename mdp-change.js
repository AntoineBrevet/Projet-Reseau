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
        $("#contrainte1img").attr('src','assets/ico/sue-check-green.svg')
    }
    else {
        $("#contrainte1").css("color", "grey");
        $("#contrainte1img").attr('src','assets/ico/sue-check-grey.svg')
    }
});

//Vérif minuscule

$(document).on('input', '#mdp1', function () {
    if (hasLowerCase($("#mdp1").val())) {
        $("#contrainte2").css("color", "green");
        $("#contrainte2img").attr('src','assets/ico/sue-check-green.svg')
    }
    else {
        $("#contrainte2").css("color", "grey");
        $("#contrainte2img").attr('src','assets/ico/sue-check-grey.svg')
    }
});

//Vérif nombre

$(document).on('input', '#mdp1', function () {
    if (hasNumber($("#mdp1").val())) {
        $("#contrainte3").css("color", "green");
        $("#contrainte3img").attr('src','assets/ico/sue-check-green.svg')
    }
    else {
        $("#contrainte3").css("color", "grey");
        $("#contrainte3img").attr('src','assets/ico/sue-check-grey.svg')
    }
});

//Vérif caracyères spéciaux

$(document).on('input', '#mdp1', function () {
    if ((hasCS1($("#mdp1").val())) || (hasCS2($("#mdp1").val())) || (hasCS3($("#mdp1").val())) || (hasCS4($("#mdp1").val()))) {
        $("#contrainte4").css("color", "green");
        $("#contrainte4img").attr('src','assets/ico/sue-check-green.svg')
    }
    else {
        $("#contrainte4").css("color", "grey");
        $("#contrainte4img").attr('src','assets/ico/sue-check-grey.svg')
    }
});

//Vérif minimum 8 caractères

$(document).on('input', '#mdp1', function () {
    if ($("#mdp1").val().length >= 8) {
        $("#contrainte5").css("color", "green");
        $("#contrainte5img").attr('src','assets/ico/sue-check-green.svg')
    }
    else {
        $("#contrainte5").css("color", "grey");
        $("#contrainte5img").attr('src','assets/ico/sue-check-grey.svg')
    }
});

//Vérif si les MDP sont identiques

$(document).on('input', '#mdp1,#mdp2', function () {
    if (($("#mdp1").val() == $("#mdp2").val()) && $("#mdp2").val().length >= 1) {
        $("#contrainte6").css("color", "green");
        $("#contrainte6img").attr('src','assets/ico/sue-check-green.svg')
    }
    else {
        $("#contrainte6").css("color", "grey");
        $("#contrainte6img").attr('src','assets/ico/sue-check-grey.svg')
    }
});

$(document).on('click', '#change', function (event) {
    if ($("#mdp1").val() && $("#mdp2").val()) {
        console.log("oui");
    }
    else {
        alert("Des champs ne sont pas remplis! (connexion)");
        event.preventDefault();
    }
});