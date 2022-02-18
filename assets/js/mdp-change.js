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

$(document).on('input', '#mdp1change', function () {
    if (hasUpperCase($("#mdp1change").val())) {
        $("#contrainte1change").css("color", "green");
        $("#contrainte1changeimg").css("color", "green")
    }
    else {
        $("#contrainte1change").css("color", "#fff");
        $("#contrainte1changeimg").css("color", "#fff")
    }
});

//Vérif minuscule

$(document).on('input', '#mdp1change', function () {
    if (hasLowerCase($("#mdp1change").val())) {
        $("#contrainte2change").css("color", "green");
        $("#contrainte2changeimg").css("color", "green")
    } else {
        $("#contrainte2change").css("color", "#fff");
        $("#contrainte2changeimg").css("color", "#fff")
    }
});

//Vérif nombre

$(document).on('input', '#mdp1change', function () {
    if (hasNumber($("#mdp1change").val())) {
        $("#contrainte3change").css("color", "green");
        $("#contrainte3changeimg").css("color", "green")
    } else {
        $("#contrainte3change").css("color", "#fff");
        $("#contrainte3changeimg").css("color", "#fff")
    }
});

//Vérif caracyères spéciaux

$(document).on('input', '#mdp1change', function () {
    if ((hasCS1($("#mdp1change").val())) || (hasCS2($("#mdp1change").val())) || (hasCS3($("#mdp1change").val())) || (hasCS4($("#mdp1change").val()))) {
        $("#contrainte4change").css("color", "green");
        $("#contrainte4changeimg").css("color", "green")
    }
    else {
        $("#contrainte4change").css("color", "#fff");
        $("#contrainte4changeimg").css("color", "#fff")
    }
});

//Vérif minimum 8 caractères

$(document).on('input', '#mdp1change', function () {
    if ($("#mdp1change").val().length >= 8) {
        $("#contrainte5change").css("color", "green");
        $("#contrainte5changeimg").css("color", "green")
    }
    else {
        $("#contrainte5change").css("color", "#fff");
        $("#contrainte5changeimg").css("color", "#fff")
    }
});

//Vérif si les MDP sont identiques

$(document).on('input', '#mdp1change,#mdp2change', function () {
    if (($("#mdp1change").val() == $("#mdp2change").val()) && $("#mdp2change").val().length >= 1) {
        $("#contrainte6change").css("color", "green");
        $("#contrainte6changeimg").attr("color", "green")
    }
    else {
        $("#contrainte6change").css("color", "#fff");
        $("#contrainte6changeimg").css("color", "#fff")
    }
});

$(document).on('click', '#change', function (event) {
    if ($("#mdp1change").val() && $("#mdp2change").val()) {
        console.log("oui");
    }
    else {
        alert("Des champs ne sont pas remplis! (connexion)");
        event.preventDefault();
    }
});