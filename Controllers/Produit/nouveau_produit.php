<?php
    session_start();
    include_once('/opt/lampp/htdocs/Station/Models/Produit/nouveau_produit.php');
    include_once("/opt/lampp/htdocs/Station/Models/db.php");

    //Génération du nouveau num_prod à partir du dernier numprod
    function generate_num(){
        $n = new_num_prod().'';
        $l = strlen($n);
        $code = 'P';

        while($l < 3){
            $code.='0';
            $l++;
        }
        $l = strlen($n);
        for($i=0;$i < $l; $i++){
            $code.=$n[$i];
        }
        return $code;
    }
    try {
        $design = htmlspecialchars($_POST['designation']);
        new_product($pdo, $design, generate_num());
        $_SESSION['success_message'] = "Produit ajouté avec succès.";
        header("Location: /Station/?page=produit");
    } catch (Exception $e) {
        $_SESSION['error_message'] = "Erreur lors de l'ajout du produit: " . $e->getMessage();
        header("Location: /Station/?page=nouveau_produit");
    } finally {
        exit();
    }
?>
?>