<?php
require("/opt/lampp/htdocs/Station-Essence/Models/db.php") ;

function get_entretien(){
    global $pdo;

    $reponse = $pdo->query("SELECT * FROM ENTRETIEN;") ;
    return $reponse ;
}

?>