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
if (isset($_GET['date1']) && isset($_GET['date2'])) {
    $nbr_clients = nbr_client($_GET['date1'], $_GET['date2']);
} else {
    $nbr_clients = nbr_client(date('Y-m-d'), date('Y-m-d'));
}
?>