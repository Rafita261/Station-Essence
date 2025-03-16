<?php
session_start();
include('/opt/lampp/htdocs/Station/Models/Achat/update_achat.php');

$num_achat = htmlspecialchars($_GET['num_achat']);
$new_date_achat = htmlspecialchars($_GET['date_achat']);
$new_nbr_litre = htmlspecialchars($_GET['nbr_litre']);
$new_num_prod = htmlspecialchars($_GET['num_prod']);
$new_nom_client = htmlspecialchars($_GET['nom_client']);

try {
    update_achat($num_achat, $new_date_achat, $new_nbr_litre, $new_num_prod, $new_nom_client);
    $_SESSION['success_message'] = "Achat mis à jour avec succès";
} catch (LogicException $e) {
    $_SESSION['error_message'] = $e->getMessage();
} catch (Exception $e) {
    $_SESSION['error_message'] = "Une erreur s'est produite lors de la mise à jour de l'achat";
} finally {
    header('Location: /Station/?page=achat');
}
?>