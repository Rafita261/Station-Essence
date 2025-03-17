<?php
include('/opt/lampp/htdocs/Station-Essence/Models/db.php');
function update_achat($num_achat, $new_date_achat, $new_nbr_litre, $new_num_prod, $new_nom_client)
{
    global $pdo;
    $query = $pdo->prepare("SELECT A.num_prod, A.nbr_litre, P.stock FROM ACHAT A JOIN PRODUIT P ON A.num_prod = P.num_prod WHERE A.num_achat = ? ");
    $query->execute([$num_achat]);
    $reponse = $query->fetch();
    $num_prod = $reponse[0];
    $nbr_litre = $reponse[1];
    $stock = $reponse[2];

    // Vérifier qu'aucun stock ne soit pas négatif après la modification
    if ($num_prod == $new_num_prod) {
        if ($stock + $nbr_litre - $new_nbr_litre > 0) {
            $query = $pdo->prepare("UPDATE ACHAT SET date_achat = ?, nbr_litre = ?, nom_client = ? WHERE num_achat = ?");
            $query->execute([$new_date_achat, $new_nbr_litre, $new_nom_client, $num_achat]);
            $query = $pdo->prepare("UPDATE PRODUIT SET stock = stock + ? - ? WHERE num_prod = ?");
            $query->execute([$nbr_litre, $new_nbr_litre, $num_prod]);
        } else {
            throw new LogicException("Erreur : le stock est inssuffisant pour le nouveau quatité demandé.");
        }
    } else {
        $query = $pdo->prepare("SELECT stock FROM PRODUIT WHERE num_prod = ?");
        $query->execute([$new_num_prod]);
        $new_product_stock = $query->fetch()[0];

        if ($new_product_stock > $new_nbr_litre) {
            $query = $pdo->prepare("UPDATE ACHAT SET num_prod = ?, date_achat = ?, nbr_litre = ?, nom_client = ? WHERE num_achat = ?");
            $query->execute([$new_num_prod, $new_date_achat, $new_nbr_litre, $new_nom_client, $num_achat]);
            $query = $pdo->prepare("UPDATE PRODUIT SET stock = stock + ? WHERE num_prod = ?");
            $query->execute([$nbr_litre, $num_prod]);
            $query->execute([-$new_nbr_litre, $new_num_prod]);
        } else {
            throw new LogicException("Erreur : le stock du nouveau produit est inssuffisant pour le nouveau quatité demandé.");
        }
    }
}
