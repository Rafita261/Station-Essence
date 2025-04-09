<?php
require("/opt/lampp/htdocs/Station-Essence/Models/db.php") ;

function update_entretien($num_entr, $immat, $nom_client, $date_entr){
    global $pdo;
    $query = $pdo->prepare("UPDATE ENTRETIEN SET immatriculation_voiture = ?, nom_client = ?, date_entretien = ? WHERE num_entr = ?;");
    $query->execute([$immat, $nom_client, $date_entr, $num_entr]);
}
?>