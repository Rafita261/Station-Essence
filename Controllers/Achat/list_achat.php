<?php
include("/opt/lampp/htdocs/Station-Essence/Models/Achat/list_achat.php");
$reponse = get_achat();
$achats = [];
while ($data = $reponse->fetch()) {
    $achats[] = $data;
}
