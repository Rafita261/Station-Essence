<?php
session_start();
include("/opt/lampp/htdocs/Station-Essence/Models/Entretien/delete_entretien.php");
$num_entr = htmlspecialchars($_GET['num_entr']) ;
try{
    delete_entretien($num_entr) ;
    $_SESSION['success_message'] = "Entretien supprimé avec succèss";
}catch(Exception $e){
    echo $e;
    $_SESSION['error_message'] = "Erreur lors de la suppression" ;
}finally{
    header("Location: /Station-Essence/?page=entretien") ;
}