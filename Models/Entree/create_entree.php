<?php
    include('/opt/lampp/htdocs/Station/Models/db.php');
    function new_num_entree(){
        global $pdo;
        $reponse = $pdo->query( "SELECT num_entree FROM ENTREE ORDER BY num_entree DESC LIMIT 1;");
        if($num=$reponse->fetch()){
            $num=$num[0];
        }else{
            $num='S0000';
        }
        $num = $num[1].$num[2].$num[3].$num[4];
        return $num+1;
    }
    function create_entree($num_entree,$stock_entree,$num_prod){
        global $pdo;
        $sql = "INSERT INTO ENTREE(num_entree,stock_entree,date_entree,num_prod) VALUES(?,?,CURDATE(),?);";
        $query = $pdo->prepare($sql);
        $query->execute([$num_entree,$stock_entree,$num_prod]);
        $sql="UPDATE PRODUIT SET stock=stock+? WHERE num_prod=?;";
        $query = $pdo->prepare($sql);
        $query->execute([$stock_entree,$num_prod]);
    }
?>