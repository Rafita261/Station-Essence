<?php
    include("/opt/lampp/htdocs/Station/Models/Achat/list_achat.php");
    $reponse = get_achat();
    $achats = [];
    while($data = $reponse->fetch()){
        $achats[]=$data;
    }
?>