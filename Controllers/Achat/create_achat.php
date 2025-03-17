<?php
session_start();
include("/opt/lampp/htdocs/Station-Essence/Models/Achat/create_achat.php");

//Fonction qui génère le nouveau numéro de l'achat
function generate_num()
{
    $n = new_num() . '';
    $l = strlen($n);
    $code = 'A';
    while ($l < 4) {
        $code .= '0';
        $l++;
    }
    $l = strlen($n);
    for ($i = 0; $i < $l; $i++) {
        $code .= $n[$i];
    }
    return $code;
}
$num_achat = generate_num();
$num_prod = htmlspecialchars($_POST['product']);
$nom_client = htmlspecialchars($_POST['nom_client']);
$nbr_litre = htmlspecialchars($_POST['nbr_litre']);


if (is_suffisant($num_prod, $nbr_litre)) {
    try {
        create_achat($num_achat, $num_prod, $nom_client, $nbr_litre);
        $_SESSION['success_message'] = 'Achat effectué avec succès';
    } catch (Exception $e) {
        die($e->getMessage());
        $_SESSION['error_message'] = 'Ajout échoué';
    } finally {
        header("Location: /Station-Essence/?page=achat");
    }
} else {
    $_SESSION['error_message'] = 'Stock insuffisant';
    header("Location: /Station-Essence/?page=achat");
}
