<?php

include("Modele/comment.php");  // Contient des fonctions permettant d'acccéder ax données contenues dans le fichier commentaires.json
include("Modele/bdd.php");      // Contient des fonctions permettant d'accéder aux données de la base de données par le moyen de l'API REST

// Demande de la page login
function page_login()
{
    // Préparation de variables à passer à index.php
    $section_principale = "page_login.php";
    include("Vue/ossature.php");
}


function page_blog() {
    $section_principale = "page_blog_node.php";
    // Les données du blog disponibles dans le Modele
    $lescommentaires = lire_les_commentaires();
    include("Vue/ossature.php");
}

function page_mvc() {
    $section_principale = "page_mvc.php";
    include("Vue/ossature.php");
}



// traitement du formulaire login
function form_login() {
    $reponse = bdd_verifier_login();
    //print_r($reponse);
    if(isset($reponse["status"]) && $reponse["status"] == "ok") {
        //echo "Login correct ! ";
        // Création de la variable de session "pseudo"
        $_SESSION["pseudo"] = $reponse["pseudo"];
        header("Location: index.php?page=blog");
    }
    else {
        // On renvoie la page de login
        // Préparation de variables à passer à index.php
        $section_principale = "page_login.php";
        $message_erreur = "Login ou mot de passe incorrect.";
        // Une variable pour un message d'erreur d'authentification ?
        include("Vue/ossature.php");
    }
}


// traitement de la déconnexion
function deconnexion() {
    session_destroy();
    // Retour à la page d'accueil
    header("Location: index.php");
}

function form_blog() {
    //print_r($_POST);
    ajouter_commentaire($_POST["input_text_pseudo"], $_POST["input_text_commentaire"]);
    header("Location: index.php?page=blog#h2_form");
}

?>