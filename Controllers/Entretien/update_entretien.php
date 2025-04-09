<?php
session_start();
require("/opt/lampp/htdocs/Station-Essence/Models/Entretien/update_entretien.php");

try{
    $num_entr = $_GET['num_entr'];
    $immat = $_GET['immat'];
    $nom_client = $_GET['nom_client'];
    $date_entr = $_GET['date_entr'];
    update_entretien($num_entr, $immat, $nom_client, $date_entr) ;
    $_SESSION['success_message'] = "Entretien mis à jour avec succèss!" ;
}catch(Exception $e){
    $_SESSION['error_message'] = "Erreur lors de la mise à jour de l'entretien";
}
finally{
    header("Location: /Station-Essence/?page=entretien") ;
}

?>