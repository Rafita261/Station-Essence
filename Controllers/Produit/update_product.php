<?php
session_start();
include("/opt/lampp/htdocs/Station-Essence/Models/Produit/update_product.php");
try {
    $num_prod = $_GET['num_prod'];
    $design = $_GET['design'];
    update_prod($num_prod, $design);
    $_SESSION['success_message'] = "Produit mis à jour avec succès";
} catch (Exception $e) {
    $_SESSION['error_message'] = "Erreur lors de la mise à jour du produit";
} finally {
    header("Location: /Station-Essence/?page=produit");
    exit();
}
?>