<?php
include("/opt/lampp/htdocs/Station-Essence/Models/Service/list_service.php");
$reponse = get_service();
$services = [];
while ($data = $reponse->fetch()) {
    $services[] = $data;
}
?>