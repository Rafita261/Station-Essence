<?php
include("/opt/lampp/htdocs/Station-Essence/Models/Entree/list_entree.php");
$reponse = get_entree();
$entrees = [];
while ($data = $reponse->fetch()) {
    $entrees[] = $data;
}
?>