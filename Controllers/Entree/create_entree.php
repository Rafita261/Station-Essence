<?php
session_start();
include("/opt/lampp/htdocs/Station/Models/Entree/create_entree.php");

try {
    // Génération du nouveau num_entree à partir du dernier num_entree
    function generate_num() {
        $n = new_num_entree() . '';
        $l = strlen($n);
        $code = 'S';
        while ($l < 4) {
            $code .= '0';
            $l++;
        }
        $l = strlen($n);
        for ($i = 0; $i < $l; $i++) {
            $code .= $n[$i];
        }
        return $code;
    }

    $num_prod = htmlspecialchars($_GET['product']);
    $stock_entree = htmlspecialchars($_GET['stock']);
    create_entree(generate_num(), $stock_entree, $num_prod);
    $_SESSION['success_message'] = 'Entrée créée avec succès';
    header('Location: /Station/?page=entree');
} catch (Exception $e) {
    $_SESSION['error_message'] = 'Erreur lors de la création de l\'entrée: ';
    header('Location: /Station/?page=entree');
}
?>