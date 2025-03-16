<?php
    include('/opt/lampp/htdocs/Station/Models/db.php');
    function update_entree($num_entree,$new_date_entree,$new_stock_entree,$new_product_entree){
        try{
            global $pdo;
            $reponse = $pdo->prepare("SELECT num_prod, stock_entree FROM ENTREE WHERE num_entree=?;");
            $reponse->execute([$num_entree]);
            $donnees = $reponse->fetch();
            $num_prod=$donnees[0];
            $stock_entree=$donnees[1];
            $new_stock_entree++;
            $new_stock_entree--;

            //Vérifier si le stock de l'ancien produit sera toujours positif après la modification
            if($new_stock_entree<0){
                throw new LogicException("Erreur : Le stock ne peut pas être négatif après la modification.");
            }
            if($new_product_entree==$num_prod){
                $reponse = $pdo->prepare("SELECT SUM(nbr_litre) FROM ACHAT WHERE num_prod=?");
                $reponse->execute([$num_prod]);
                $sum_nbr_litre_achat = $reponse->fetch()[0];

                if ($new_stock_entree - $sum_nbr_litre_achat < 0) {
                    throw new LogicException("Erreur : Le stock ne peut pas être négatif après la modification.");
                }
            }
            else{
                $reponse = $pdo->prepare("SELECT stock FROM PRODUIT WHERE num_prod = ?");
                $reponse->execute([$num_prod]);
                $last_stock = $reponse->fetch()[0];

                if ($last_stock - $stock_entree < 0) {
                    throw new LogicException("Erreur : Le stock ne peut pas être négatif après la modification.");
                }
            }
            
            $reponse = $pdo->prepare("UPDATE ENTREE SET stock_entree=:stock_entree, date_entree=:date_entree, num_prod=:num_prod WHERE num_entree=:num_entree;");
            $reponse->execute([
                'stock_entree' => $new_stock_entree,
                'date_entree' => $new_date_entree,
                'num_prod' => $new_product_entree,
                'num_entree' => $num_entree
            ]);

            // Update the stock of the old product
            $reponse = $pdo->prepare("UPDATE PRODUIT SET stock=stock-? WHERE num_prod=?;");
            $reponse->execute([$stock_entree, $num_prod]);

            // Update the stock of the new product
            $reponse = $pdo->prepare("UPDATE PRODUIT SET stock=stock+? WHERE num_prod=?;");
            $reponse->execute([$new_stock_entree, $new_product_entree]);
        }catch(Exception $e){
            throw $e;
        }
    }
?>
