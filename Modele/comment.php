<?php

function lire_les_commentaires() {
    // Lecture des commentaires stockés au format json dans le fichier commentaires.json
    $json_comments = file_get_contents("Modele/commentaires.json");
    // Le json est converti en un tableau associatif nommé $comments
    $comments = json_decode($json_comments, true);
    return $comments;
}

function ajouter_commentaire($pseudo, $commentaire) {

    $lecommentaire["pseudo"] = $pseudo;
    $lecommentaire["commentaire"] = $commentaire;
    $lecommentaire["date"] = date("Y-m-d H:i:s");
    
    $commentaires = lire_les_commentaires();

    $commentaires["commentaire"][] = $lecommentaire;
    
    $json_commentaires = json_encode($commentaires);
    file_put_contents("Modele/commentaires.json", $json_commentaires);
}


?>