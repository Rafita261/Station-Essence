<?php
include('/opt/lampp/htdocs/Station-Essence/Models/db.php');

function update_service($num_serv, $service, $prix)
{
    global $pdo;
    $sql = "UPDATE SERVICE SET service = ?, prix = ? WHERE num_serv = ?;";
    $query = $pdo->prepare($sql);
    $query->execute([$service, $prix, $num_serv]) ;
}
?>