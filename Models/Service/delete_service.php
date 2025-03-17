<?php
include('/opt/lampp/htdocs/Station-Essence/Models/db.php');

function delete_service($num_serv)
{
    global $pdo;
    $query = $pdo->prepare("DELETE FROM SERVICE WHERE num_serv = ?") ;
    $query->execute([$num_serv]);
}
?>