<?php

include("Modele/comment.php");

// Demande de la page login
function page_login()
{
    // Préparation de variables à passer à index.php
    $section_principale = "login.php";
    include("Vue/index.php");
}


function page_blog() {
    $section_principale = "blog_node.php";
    // Les données du blog disponibles dans le Modele
    $lescommentaires = lire_les_commentaires();
    include("Vue/index.php");
}



// traitement du formulaire login
function form_login() {
    // On demande à l'API REST si le formulaire est correct
    // Initialize a cURL session
    $ch = curl_init();
    // Set the URL for the cURL request
    $url = "http://localhost/SQL_Injection/Modele/rest.php?connexion";
    //$url = "/APIREST/rest.php?connexion";
    curl_setopt($ch, CURLOPT_URL, $url);
    // Set the option to return the response as a string
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    // Le formulaire reçu en POST est transmis en json
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($_POST));
    // Execute the cURL request and store the response
    $reponse_text = curl_exec($ch);
    //echo $reponse_text;
    // S'il y a une erreur dans la communication avec l'API REST
    if (curl_errno($ch)) {
        //echo 'cURL Error: ' . curl_error($ch);
        $reponse = array("status" => "error", "description" => "Impossible de joindre l'API REST.");
    }
    else {
        // Si la reponse du serveur est vide
        if(empty($reponse_text)) {
            $reponse = array("status" => "error", "description" => "Impossible de joindre l'API REST.");
        }
        else {  // On décode la réponse qui est au format json 
            //echo "Réponse non vide";
            $reponse = json_decode($reponse_text, true);  // true : renvoie un tableau associatif
            //print_r($reponse);
        }
    }
    curl_close($ch);
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
        $section_principale = "login.php";
        $message_erreur = "Login ou mot de passe incorrect.";
        // Une variable pour un message d'erreur d'authentification ?
        include("Vue/index.php");
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