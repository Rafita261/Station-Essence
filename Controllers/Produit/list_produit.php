<?php
    include("/opt/lampp/htdocs/Station/Models/Produit/list_produit.php");
    $produits = [];
    while($data = $reponse->fetch()){
        $produits[]=$data;
    }
?>