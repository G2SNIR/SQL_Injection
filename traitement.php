<?php

include_once("comment.php");

//echo "Traitement du formulaire";
//print_r($_POST);

if(isset($_POST["inputtextpseudo"], $_POST["inputpasswordmdp"]))
{
    echo "Le formulaire a bien été reçu";
    $pseudo = $_POST["inputtextpseudo"];
    $mdp = $_POST["inputpasswordmdp"];
    ajouter_commentaire($pseudo, $commentaire);
    // On ajoute dans le fichier json
}

header("Location: index.php");

?>