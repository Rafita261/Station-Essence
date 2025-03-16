<?php
    session_start();
    include('/opt/lampp/htdocs/Station/Models/Entree/delete_entree.php');

    $num_entree = htmlspecialchars($_GET['num_entree']);

    try {
        delete_entree($num_entree);
        $_SESSION['success_message'] = "Entrée supprimée avec succès";
        header("Location: /Station/?page=entree");
        exit();
    } catch (LogicException $e) {
        $_SESSION['error_message'] = $e->getMessage();
        header("Location: /Station/?page=entree");
        exit();
    } catch (Exception $e) {
        $_SESSION['error_message'] = 'Erreur lors de la suppression';
        header("Location: /Station/?page=entree");
        exit();
    }
?>