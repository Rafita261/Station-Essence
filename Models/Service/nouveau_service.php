<?php
include('/opt/lampp/htdocs/Station-Essence/Models/db.php');

function nouveau_service($num_serv, $service, $prix)
{
    global $pdo;
    $sql = "INSERT INTO SERVICE(num_serv, service, prix) VALUES(?,?,?);";
    if ($prix <= 0){
        throw new LogicException("Erreur : Le prix d'un service ne peut être négatif ou nul.");
    }
    try{
        $query = $pdo->prepare($sql);
        $query->execute([$num_serv, $service, $prix]);
    }
    catch(Exception $e){
        throw new PDOException("Erreur lors de l'ajout au base des données, veuillez contacter l'administrateur de la page") ;
    }
}

function new_num(){
    global $pdo;
    $reponse = $pdo->query("SELECT num_serv FROM SERVICE ORDER BY num_serv DESC LIMIT 1;");
    if ($num = $reponse->fetch()[0]) {
        $num = $num[1] . $num[2] . $num[3];
        return $num + 1;
    }
    return 1;
}

?>