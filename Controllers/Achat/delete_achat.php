<?php
    session_start();
    include("/opt/lampp/htdocs/Station/Models/Achat/delete_achat.php");
    $num_achat = htmlspecialchars($_GET["num_achat"]);
    try{
        delete_achat($num_achat) ;
        $_SESSION['success_message'] = "Achat supprimé avec succèss";
        header("Location: /Station?page=achat");
        exit();
    }catch(Exception $e){
        $_SESSION['error_message'] = "Erreur lors de la suppression de cet achat";
        header("Location: /Station?page=achat");
        exit();
    }
?>