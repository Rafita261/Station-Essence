<?php
    session_start();
    include("/opt/lampp/htdocs/Station-Essence/Models/Service/nouveau_service.php");

    function generate_num(){
        $n = new_num().'';
        $l = strlen($n);
        $code = 'S';

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

    $service = htmlspecialchars($_POST['service']);
    $prix = htmlspecialchars($_POST['prix']);
    $num_serv = generate_num();

    try{
        nouveau_service($num_serv,$service,$prix);
        $_SESSION['success_message'] = "Service ajouté avec succèss" ;
    }
    catch(LogicException $e){
        $_SESSION['error_message'] = $e->getMessage();
    }
    catch(PDOException $e){
        $_SESSION['error_message'] = $e->getMessage();
    }
    catch(Exception $e){
        $_SESSION['error_message'] = "Erreur survenue lors de l'ajout" ;
    }
    finally{
        header("Location: /Station-Essence/?page=service");
    }

?>