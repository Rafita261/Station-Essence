<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    session_start();
    require("/opt/lampp/htdocs/Station-Essence/vendor/autoload.php");
    use Dompdf\Dompdf;
    use Dompdf\Options;
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
        $num_entretien = generate_num();
        echo $num_serv;
        create_entretien($num_entretien, $nom_client,$immatriculation, $num_serv);
    }
    $_SESSION['success_message'] = 'Entretien ajouté avec succèss' ;
    
    // Génération de pdf
    $options = new Options();
    $options->set('defaultFont','Arial');
    $dompdf = new Dompdf($options);
    $html = '';
    $html .= '<h1>Reçu de l\'Entretien</h1>';
    $html .= '<p>Date de l\'entretien: ' . date('d/m/Y') . '</p>';
    $html .= '<p>Nom du client: ' . $nom_client . '</p>';
    $html .= '<p>Voiture : ' . $immatriculation . '</p>';
    $html .= '<table border="1" cellspacing="0" cellpadding="5" style="width: 100%; border-collapse: collapse;">';
    $html .= '<thead>';
    $html .= '<tr>';
    $html .= '<th style="width: 60px; text-align: left;">Service</th>';
    $html .= '<th style="width: 60px; text-align: right;">Montant</th>';
    $html .= '</tr>';
    $html .= '</thead>';
    $html .= '<tbody>';
    foreach ($services as $num_serv) {
        $montant = get_prix($num_serv);
        $html .= '<tr>';
        $html .= '<td style="width: 60px; text-align: left;">' . htmlspecialchars(get_service_name($num_serv)) . '</td>';
        $html .= '<td style="width: 60px; text-align: right;">' . htmlspecialchars($montant) . ' Ar</td>';
        $html .= '</tr>';
    }
    $html .= '</tbody>';
    $html .= '<tfoot>';
    $html .= '<tr>';
    $html .= '<td style="width: 60px; text-align: left; font-weight: bold;">Total</td>';
    $total = 0;
    foreach ($services as $num_serv) {
        $total += get_prix($num_serv);
    }
    $html .= '<td style="width: 60px; text-align: right; font-weight: bold;">' . htmlspecialchars($total) . ' Ar</td>';
    $html .= '</tr>';
    $html .= '</tfoot>';
    $html .= '</table>';
    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4','portrait');
    $dompdf->render();
    $output = $dompdf->output();
    $dompdf->stream($num_entretien . ".pdf", ['Attachment' => true]);
    header("Location: /Station-Essence/?page=entretien") ;
?>