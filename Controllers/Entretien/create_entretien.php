<?php
    session_start();
    require("/opt/lampp/htdocs/Station-Essence/Models/Entretien/create_entretien.php");
    function generate_num(){
        $n = last_num() . '' ;
        $l = strlen($n);
        $code = 'EN';
        while ($l < 3) {
            $code .= '0';
            $l++;
        }
        $l = strlen($n);
        for ($i = 0; $i < $l; $i++) {
            $code .= $n[$i];
        }
        return $code;
    }
    $services = $_POST['services'];
    $nom_client = htmlspecialchars($_POST["nom_client"]) ;
    $immatriculation = htmlspecialchars($_POST["immatriculation"]) ;
    foreach($services as $num_serv){
        echo $num_serv;
        $num_entretien = generate_num();
        create_entretien($num_entretien, $nom_client,$immatriculation, $num_serv);
    }
    $_SESSION['success_message'] = 'Entretien ajouté avec succèss' ;
    
    header("Location: /Station-Essence/?page=entretien") ;
?>