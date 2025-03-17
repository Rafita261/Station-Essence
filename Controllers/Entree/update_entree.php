<?php
session_start();
include('/opt/lampp/htdocs/Station-Essence/Models/Entree/update_entree.php');

$num_entree = htmlspecialchars($_GET['num_entree']);
$new_date_entree = htmlspecialchars($_GET['date_entree']);
$new_stock_entree = htmlspecialchars($_GET['stock_entree']);
$new_product_entree = htmlspecialchars($_GET['num_prod']);

try {
    update_entree($num_entree, $new_date_entree, $new_stock_entree, $new_product_entree);
    $_SESSION['success_message'] = "Entrée mise à jour avec succès";
} catch (LogicException $e) {
    $_SESSION['error_message'] = $e->getMessage();
} catch (Exception $e) {
    $_SESSION['error_message'] = "Une erreur s'est produite lors de la mise à jour de l'entrée";
} finally {
    header('Location: /Station-Essence/?page=entree');
}
