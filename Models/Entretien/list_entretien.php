<?php
require("/opt/lampp/htdocs/Station-Essence/Models/db.php") ;

function get_entretien(){
    global $pdo;

    $reponse = $pdo->query("SELECT E.num_entr, S.service, E.immatriculation_voiture,E.nom_client ,E.date_entretien, S.prix  FROM ENTRETIEN E JOIN SERVICE S ON S.num_serv = E.num_serv;") ;
    return $reponse ;
}

?>