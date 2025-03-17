<?php
include('/opt/lampp/htdocs/Station-Essence/Models/db.php');
function get_achat()
{
    global $pdo;
    $sql = "SELECT A.num_achat,A.num_prod,A.nom_client,P.design,A.nbr_litre,A.date_achat FROM ACHAT A JOIN PRODUIT P ON A.num_prod = P.num_prod ORDER BY num_achat DESC;";
    $reponse = $pdo->query($sql);
    return $reponse;
}
