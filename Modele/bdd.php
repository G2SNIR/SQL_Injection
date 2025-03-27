<?php

function bdd_verifier_login()
{
    // On demande à l'API REST si le formulaire est correct
    // Initialize a cURL session
    $ch = curl_init();
    // Set the URL for the cURL request
    $url = "http://localhost/SQL_Injection/APIREST/rest.php?connexion";
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
    return $reponse;
}

?>