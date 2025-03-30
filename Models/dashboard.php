<?php
include('/opt/lampp/htdocs/Station-Essence/Models/db.php');

function get_best_client(){
    global $pdo;
    $query = $pdo->query("SELECT nom_client, COUNT(*) as participation_count 
                          FROM (
                              SELECT E.nom_client FROM ENTRETIEN E 
                              UNION ALL 
                              SELECT A.nom_client FROM ACHAT A
                          ) as clients
                          GROUP BY nom_client
                          ORDER BY participation_count DESC
                          LIMIT 5");
    return $query ;
}

function get_recette(){
    global $pdo;
    $query = $pdo->query("SELECT MONTH(E.date_entretien),SUM(S.prix) FROM ENTRETIEN E JOIN SERVICE S ON S.num_serv = E.num_serv GROUP BY MONTH(E.date_entretien) ;");
    return $query;
}

function getChartData() {
    global $pdo;
    $query = $pdo->query("SELECT COUNT(DISTINCT date_achat) FROM ACHAT");
    $n = $query->fetch()[0]-5 ;
    if($n <0) $n=0;
    $query = $pdo->query("SELECT date_achat, SUM(CASE WHEN num_prod = 'P001' THEN nbr_litre ELSE 0 END) AS essence,
                                 SUM(CASE WHEN num_prod = 'P002' THEN nbr_litre ELSE 0 END) AS gasoil,
                                 SUM(CASE WHEN num_prod = 'P003' THEN nbr_litre ELSE 0 END) AS petrole
                          FROM ACHAT
                          GROUP BY date_achat
                          ORDER BY date_achat ASC
                          LIMIT 5 OFFSET $n ");
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

$data_chart = getChartData();
?>