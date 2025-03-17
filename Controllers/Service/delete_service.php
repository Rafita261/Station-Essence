<?php
    session_start();
    include("/opt/lampp/htdocs/Station-Essence/Models/Service/delete_service.php");

    if(!isset($_GET['num_serv'])){
        $_SESSION['error_message'] = 'Erreur : Service non défini !';
        header("Location: /Station-Essence/?page=service");
    }
    $num_serv = htmlspecialchars($_GET['num_serv']);

    try{
        delete_service($num_serv) ;
        $_SESSION['success_message'] = 'Service supprimé avec succèss !' ;
    }
    catch(Exception $e){
        $_SESSION['error_message'] = 'Erreur lors de la suppression du service' ;
    }
    finally{
        header("Location: /Station-Essence/?page=service");
    }
?>