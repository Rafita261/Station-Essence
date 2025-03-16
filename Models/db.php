<?php
    $host = '0.0.0.0';
    $db_name = 'station';
    $username = 'chris';
    $password = 'Chriskely@123';
    try{
        $pdo = new PDO("mysql:host=$host;dbname=$db_name;charset=utf8", $username, $password) ;
    }catch(PDOException $e){
        die("Erreur lors de la connexion au serveur de la base des données : " . $e->getMessage()) ;
    }
?>