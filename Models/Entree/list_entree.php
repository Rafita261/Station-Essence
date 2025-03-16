<?php
    include('/opt/lampp/htdocs/Station/Models/db.php');
    function get_entree(){
        global $pdo;
        $sql = "SELECT * FROM ENTREE E JOIN PRODUIT P ON E.num_prod = P.num_prod ORDER BY E.num_entree DESC;";
        $reponse = $pdo->query($sql);
        return $reponse;
    }
?>