<?php
include("/opt/lampp/htdocs/Station-Essence/Models/Produit/list_produit.php");
$produits = [];
while ($data = $reponse->fetch()) {
    $produits[] = $data;
}
?>