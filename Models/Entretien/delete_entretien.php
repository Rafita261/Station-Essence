<?php
require("/opt/lampp/htdocs/Station-Essence/Models/db.php");

function delete_entretien($num_entr)
{
    global $pdo;
    $pdo->query("DELETE FROM ENTRETIEN WHERE num_entr = '$num_entr'");
}
