<?php
    include("/opt/lampp/htdocs/Station-Essence/Models/db.php");
function create_entretien($num_entretien, $nom_client, $immatriculation, $num_serv){
        global $pdo ;
        $query = $pdo->prepare("INSERT INTO ENTRETIEN(num_entr,num_serv,immatriculation_voiture,nom_client,date_entretien) VALUES(?,?,?,?,CURDATE());") ;
        $query->execute([$num_entretien, $num_serv, $immatriculation, $nom_client]) ;
    }
function last_num(){
    global $pdo;
    $query = $pdo->query("SELECT num_entr FROM ENTRETIEN ORDER BY num_entr DESC LIMIT 1;");
    if ($num = $query->fetch()) {
        $num = $num[0];
        $n = $num[2] . $num[3] . $num[4];
        return $n + 1;
    } else {
        return 1;
    }
}
?>