<?php
    session_start();
    include('/opt/lampp/htdocs/Station/Models/Produit/delete_product.php');
    $num_prod = $_GET['num_prod'];
    try{
        delete_product($num_prod);
        $_SESSION['success_message'] = 'Suppression effectuée avec succès';
    }catch(Exception $e){
        $_SESSION['error_message'] = 'Suppression échouée, le produit a été utilisé dans une entrée ou un achat';
        header("Location: /Station/?page=produit");
    }
    finally{
        header("Location: /Station/?page=produit");
    }
?>