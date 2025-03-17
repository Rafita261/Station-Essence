<?php
session_start() ;
include("/opt/lampp/htdocs/Station-Essence/Models/Service/update_service.php");

try{
    $num_serv = htmlspecialchars($_GET['num_serv']) ;
    $service = htmlspecialchars($_GET['service']) ;
    $prix = htmlspecialchars($_GET['prix']) ;
} 
catch(Exception $e){
    $_SESSION['error_message'] = "Erreur : des données sont nécessaires pour la modification" ;
    header("Location: /Station-Essence/?page=service");
}
try{
    update_service($num_serv, $service, $prix);
    $_SESSION['success_message'] = "Service mis à jour avec succèss!" ;
}
catch(Exception $e){
    $_SESSION['error_message'] = "Erreur durant la mise à jour du service" ;
}
finally{
    header("Location: /Station-Essence/?page=service") ;
}
?>