<?php
include('/opt/lampp/htdocs/Station-Essence/Models/db.php');
function new_num_prod()
{
    global $pdo;
    $reponse = $pdo->query("SELECT num_prod FROM PRODUIT ORDER BY num_prod DESC LIMIT 1;");
    if ($num = $reponse->fetch()[0]) {
        $num = $num[1] . $num[2] . $num[3];
        return $num + 1;
    }
    return 1;
}
function new_product($pdo, $design, $num_prod)
{
    $query = $pdo->prepare("INSERT INTO PRODUIT(num_prod,design,stock) VALUES(?,?,0)");
    $query->execute([$num_prod, $design]);
}
