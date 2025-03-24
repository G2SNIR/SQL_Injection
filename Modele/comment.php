<?php

function lire_les_commentaires() {

    $json_comments = file_get_contents("Modele/commentaires.json");
    $comments = json_decode($json_comments, true);
    return $comments;
    //print_r($comments);
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

// function afficher_les_commentaires() {
//     $html_code = "";
//     $lescommentaires = lire_les_commentaires();
//     //print_r($lescommentaires);
//     //echo count($lescommentaires["commentaire"]);
//     foreach($lescommentaires["commentaire"] as $uncommentaire)
//     {
//         $html_code .= "<p>Le ". $uncommentaire["date"] . ", <b>" . $uncommentaire["pseudo"] . "</b> a écrit : </p>";
//         $html_code .= "<p class=\"commentaire\">" . $uncommentaire["commentaire"] . "</p><p></p>";

//     }
//     return $html_code;
// }

?>