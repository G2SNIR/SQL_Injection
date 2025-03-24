<?php
/********************************************************************************
 *              Récupération des données de sessions                *
 *******************************************************************/
session_start();

/********************************************************************************
 *                              DATABASE CONNECTION                             *
 * Création d'une instance de la classe PDO nommée $pdo pour se connecter à la  * 
 * base de données. Si la connexion échoue, le script renvoie le message JSON   *
 * suivant :                                                                    *
 *  {                                                                           *
 *      "status": "error"                                                       *
 *      "description" : "Database is not available."                            *
 *  }                                                                           *
 *******************************************************************************/ 
$db="sql_injection";
$dbhost="localhost";
$dbport=3306;
$dbuser="hacker_sql_injection";
$dbpasswd="hacker";

try {
    $pdo = new PDO('mysql:host='.$dbhost.';port='.$dbport.';dbname='.$db.'', $dbuser, $dbpasswd);
} catch (PDOException $e) {
    $reponse = array("status" => "error", "description" => "Database is not available.");
    die();
}

$pdo->exec("SET CHARACTER SET utf8");


/********************************************************************************
 *               Extraction des données JSON
 * Les données JSON fournies dans le corps du message sont lues
 * puis décodées et stockées dans un tableau nommé $data
 ****************************************************************/  
$json = file_get_contents('php://input');
$data = [];  // Le tableau data est vide s'il n'y a pas de données
if($json != false)
    $data = json_decode($json, true);


/********************************************************************************
 *                     CONNECTION FORM
 * URL : POST http://IP.ADD.RE.SS/MON_SITE/APIREST/rest.php?connexion
 * Le formulaire de connexion est passé dans le corps de la requête
 * au format JSON sur le modèle suivant :
 *  {                                                                           *
 *      "pseudo": "jean"                                                        *
 *      "mdp" : "jean1"                                                         *
 *  }                                                                           *
 * Dans le cas d'une connexion réussie, la réponse est la suivante :            *
 *  {                                                                           *
 *      "status": "ok"                                                          *
 *      "description" : "Login accepted."                                       *
 *      "pseudo" : "le pseudo saisi"                                            *
 *  }                                                                           *
 * Sinon, la réponse est la suivante :                                          *
 *  {                                                                           *
 *      "status": "error"                                                       *
 *      "description" : "Login rejected."                                       *
 *  }                                                                           *
 *******************************************************************************/
if(     $_SERVER["REQUEST_METHOD"] == "POST"    && 
        isset($_GET["connexion"])               &&
        isset($data["input_text_pseudo"])                  &&
        isset($data["input_password_mdp"]) )
{
    $reponse = array("status" => "error", "description" => "Login rejected.");
    $sql_request = "SELECT id_utilisateur FROM utilisateur WHERE pseudo=? AND mdp=?";
    $prepared_request = $pdo->prepare($sql_request);
    $prepared_request->bindParam(1, $data["input_text_pseudo"]);
    $prepared_request->bindParam(2, $data["input_password_mdp"]);
    $prepared_request->execute();
    $result = $prepared_request->fetchAll(PDO::FETCH_ASSOC);
    //print_r($result);
    if(count($result) == 1) {
        $reponse = array("status" => "ok", "description" => "Login accepted.", "pseudo" => $data["input_text_pseudo"]);
        $_SESSION["pseudo"] = $data["input_text_pseudo"];
    }
    echo json_encode($reponse);
}

else if(isset($_GET["deconnexion"]))
{
    $reponse = array("status" => "ok", "description" => "You are disconnected.");
    session_destroy();
    echo json_encode($reponse);
}


//header("Location: index.php");

?>