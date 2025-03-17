<?php
include("/opt/lampp/htdocs/Station-Essence/Models/Entretien/list_entretien.php");
$reponse = get_entretien();
$entretiens = [];
while ($data = $reponse->fetch()) {
    $entretiens[] = $data;
}
?>