<?php
include("/opt/lampp/htdocs/Station-Essence/Models/dashboard.php");
$reponse = get_best_client();
$best_clients = [];
while ($data = $reponse->fetch()) {
    $best_clients[] = $data;
}
$reponse = get_recette();
$recettes = [];
while ($data = $reponse->fetch()) {
    $recettes[] = $data;
}

?>