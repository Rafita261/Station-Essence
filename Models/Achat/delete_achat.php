<?php
include("/opt/lampp/htdocs/Station-Essence/Models/db.php");

function update_produit($num_achat)
{
    global $pdo;

    // Stock de produit en cours += Nbr_litre acheté 
    $query = $pdo->prepare("UPDATE PRODUIT SET stock = stock + (SELECT nbr_litre FROM ACHAT WHERE num_achat = ?) WHERE num_prod = (SELECT num_prod FROM ACHAT WHERE num_achat = ?)");
    $query->execute([$num_achat, $num_achat]);
}

function delete_achat($num_achat)
{
    global $pdo;

    // Mise à jour de stock avant la suppression de l'achat

    update_produit($num_achat);

    $query = $pdo->prepare("DELETE FROM ACHAT WHERE num_achat = ?");
    $query->execute([$num_achat]);
}
