<?php
require("/opt/lampp/htdocs/Station-Essence/Models/db.php");
function list_produit($pdo)
{
    try {
        $reponse = $pdo->query("SELECT * FROM PRODUIT");
        return $reponse;
    } catch (PDOException $E) {
        echo ($E);
    }
}
$reponse = list_produit($pdo);
