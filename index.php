<?php
// Le controleur vérifie si l'état de la session
//error_reporting(E_ALL);
//ini_set("display_errors",1);


session_start();


include("Controleur/controleur.php");

// On dirige l'utilisateur vers la page de login 
//    1 - L'utilisateur n'est pas authentifié et
//    2 - Si la page demandée est login, ou rien
if(!isset($_SESSION["pseudo"]) ) 
{
    if(isset($_GET["page"]) && $_GET["page"]=="form_login") 
    {
        form_login();
        //echo "Formulaire login";
    }
    else 
    {
        // echo "Page login";
        page_login();
    }
}
// Si la session existe et que la page d'accueil soit demandé -> deconnexion
else if(!isset($_GET["page"]) || ($_GET["page"]=="") ) 
{
    deconnexion();
    //echo "Formulaire login";
}

else if($_GET["page"]=="blog") 
{
    page_blog();
    //echo "Formulaire login";
}

else if($_GET["page"]=="mvc") 
{
    page_mvc();
    //echo "Formulaire login";
}

else if($_GET["page"]=="logout") 
{
    deconnexion();
    //echo "Formulaire login";
}

else if($_GET["page"]=="form_blog") 
{
    form_blog();
    //echo "Formulaire login";
}


//print_r($_GET);
