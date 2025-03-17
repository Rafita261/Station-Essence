<?php
include('/opt/lampp/htdocs/Station-Essence/Models/db.php');

function get_service()
{
    global $pdo;
    $sql = "SELECT * FROM SERVICE;";
    $reponse = $pdo->query($sql);
    return $reponse;
}
?>