<?php
session_start();
include('/opt/lampp/htdocs/Station-Essence/Models/db.php');

function delete_entree($num_entree)
{
    try {
        global $pdo;
        $reponse = $pdo->prepare("SELECT stock_entree, num_prod FROM ENTREE WHERE num_entree=?;");
        $reponse->execute([$num_entree]);
        $donnees = $reponse->fetch();
        $num_prod = $donnees['num_prod'];
        $stock_entree = $donnees['stock_entree'];

        // Check if the stock after deletion would be negative
        $reponse = $pdo->prepare("SELECT stock FROM PRODUIT WHERE num_prod=?;");
        $reponse->execute([$num_prod]);
        $produit = $reponse->fetch();
        $current_stock = $produit['stock'];

        if ($current_stock - $stock_entree < 0) {
            throw new LogicException("Le stock ne peut pas être négatif après la suppression.");
        }

        $reponse = $pdo->prepare("DELETE FROM ENTREE WHERE num_entree = ?;");
        $reponse->execute([$num_entree]);

        $reponse = $pdo->prepare("UPDATE PRODUIT SET stock=stock-? WHERE num_prod=?;");
        $reponse->execute([$stock_entree, $num_prod]);
    } catch (Exception $e) {
        throw $e;
    }
}
