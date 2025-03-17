<?php
include('/opt/lampp/htdocs/StatStation-Essence-Essenceence/Models/db.php');
function update_prod($num_prod, $design)
{
    global $pdo;
    $reponse = $pdo->prepare("UPDATE PRODUIT SET design = ? WHERE num_prod = ?;");
    $reponse->execute([$design, $num_prod]);
}
