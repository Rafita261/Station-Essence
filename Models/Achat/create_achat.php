<?php
    include("/opt/lampp/htdocs/Station/Models/db.php");
    
    function is_suffisant($num_prod,$nbr_litre){
        global $pdo;
        $query = $pdo->query("SELECT stock FROM PRODUIT WHERE num_prod='$num_prod';");
        $stock = $query->fetch();
        if($stock){
            return $stock[0] >= $nbr_litre;
        }
        else{
            return 0;
        }
    }

    function create_achat($num_achat,$num_prod,$nom_client,$nbr_litre){
        global $pdo;

        // Ajout dans la table ACHAT
        $sql = "INSERT INTO ACHAT(num_achat,num_prod,nom_client,nbr_litre,date_achat) VALUES(?,?,?,?,CURDATE())";
        $query = $pdo->prepare($sql);
        $query->execute([$num_achat,$num_prod,$nom_client,$nbr_litre]);
        
        // Modification dans la table PRODUIT
        $sql = "UPDATE PRODUIT SET stock = stock-? WHERE num_prod=?;";
        $query = $pdo->prepare($sql) ;
        $query->execute([$nbr_litre,$num_prod]);
    }

    function new_num(){
        global $pdo;
        $query = $pdo->query("SELECT num_achat FROM ACHAT ORDER BY num_achat DESC LIMIT 1;");
        if($num = $query->fetch()){
            $num = $num[0];
            $n = $num[1].$num[2].$num[3].$num[4];
            return $n+1;
        }
        else{
            return 1;
        }
    }
?>