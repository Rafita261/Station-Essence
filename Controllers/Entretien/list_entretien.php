<?php
include("/opt/lampp/htdocs/Station-Essence/Models/Entretien/list_entretien.php");
if(isset($_POST['model_nom'])){
    $a = $_POST['model_nom'];
    $reponse = entretiens($_POST['model_nom']) ;
}
else{
    if (isset($_GET['model_nom'])) {
        $reponse = entretiens($_GET['model_nom']);
    }
    else
        $reponse = get_entretien();
}
$recette = recette()->fetch()[0];
$entretiens = [];
while ($data = $reponse->fetch()) {
    $entretiens[] = $data;
}
if (isset($_POST['model_nom'])) {
    header("Location: /Station-Essence/?page=entretien&model_nom=$a");
}
?>