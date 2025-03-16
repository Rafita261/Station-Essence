<?php
    include('/opt/lampp/htdocs/Station/Models/db.php');
    function delete_product($num_prod){
        global $pdo;
        $reponse = $pdo->prepare( "DELETE FROM PRODUIT WHERE num_prod = ?;");
        $reponse->execute([$num_prod]);
    }
?>