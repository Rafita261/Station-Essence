<?php
        // Activer l'affichage des erreurs pour le débogage
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
require("/opt/lampp/htdocs/Station-Essence/Controllers/Entretien/list_entretien.php"); ?>
<?php require("/opt/lampp/htdocs/Station-Essence/Controllers/Service/list_service.php"); ?>
<div style="display: flex;flex-direction:row;">
    <h1 style="margin-left: 30%">Liste des entretiens</h1>
    <form method="post" action="/Station-Essence/Controllers/Entretien/list_entretien.php" style="margin-top:20px;margin-right:5px;display:flex;flex-direction:row;background-color:#f4f4f4;"><input type="search" placeholder="Rechercher un client" name="model_nom"><input type="submit" value="Rechercher"></form>
</div>
<h2>
    Récette total accumulé par la station : <?php echo $recette ; ?> Ar
</h2>
<script>
    function get_services() {
        num_serv = [];
        services = [];
        <?php foreach ($services as $service) {
        ?> num_serv.push('<?php print_r($service[0]); ?>');
        <?php
        } ?>
        <?php foreach ($services as $service) {
        ?> services.push('<?php print_r($service[1]); ?>');
        <?php
        } ?>
        products = {};
        for (i in num_serv) {
            products[num_serv[i]] = services[i];
        }
        return products;
    }
</script>
<div id="new_entretien_form"></div>
<table id="table_entretien">
    <thead>
        <tr>
            <th>Numéro de entretien</th>
            <th>Service</th>
            <th>Immatriculation</th>
            <th>Nom du client</th>
            <th>Date de l'entretien</th>
            <th>Prix</th>
            <th>Modifier</th>
            <th>Supprimer</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if (count($entretiens) == 0) {
            echo "<tr><td colspan='8' style='text-align:center;font-size:30px;'>Aucun entretien disponible</td></tr>";
        } else {
            $i = 1;
            foreach ($entretiens as $entretien) {
                echo "<tr class='ligne" . $i % 2 . "' id='entretien" . htmlspecialchars($entretien[0]) . "'>";
                echo "<td id='num" . htmlspecialchars($entretien[0]) . "' style='width:14%; height: 30px;'>" . htmlspecialchars($entretien[0]) . "</td>";
                echo "<td id='service" . htmlspecialchars($entretien[0]) . "' style='width:14%; height: 30px;'>" . htmlspecialchars($entretien[1]) . "</td>";
                echo "<td id='immatriculation" . htmlspecialchars($entretien[0]) . "' style='width:14%; height: 30px;'>" . htmlspecialchars($entretien[2]) . "</td>";
                echo "<td id='nom_client" . htmlspecialchars($entretien[0]) . "' style='width:14%; height: 30px;'>" . htmlspecialchars($entretien[3]) . "</td>";
                echo "<td id='date_entretien" . htmlspecialchars($entretien[0]) . "' style='width:14%; height: 30px;'>" . htmlspecialchars($entretien[4]) . "</td>";
                echo "<td id='prix" . htmlspecialchars($entretien[0]) . "' style='width:14%; height: 30px;'>Ar " . htmlspecialchars($entretien[5]) . "</td>";
                echo "<td id='update" . htmlspecialchars($entretien[0]) . "' class='edit' style='width:8%; height: 30px;' onclick='update_entretien(\"" . htmlspecialchars($entretien[0]) . "\")'><svg class='edit-icon' xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\" class=\"feather feather-edit-2\"><path d=\"M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z\"></path></svg></td>";
                echo "<td id='delete" . htmlspecialchars($entretien[0]) . "' class='delete' style='width:8%; height: 30px;' onclick='delete_entretien(\"" . htmlspecialchars($entretien[0]) . "\")'><svg class=\"delete-icon\" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\" class=\"feather feather-trash-2\"><polyline points=\"3 6 5 6 21 6\"></polyline><path d=\"M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2\"></path><line x1=\"10\" y1=\"11\" x2=\"10\" y2=\"17\"></line><line x1=\"14\" y1=\"11\" x2=\"14\" y2=\"17\"></line></svg></td>";
                echo "</tr>";
                $i++;
            }
        }
        ?>
        <tr>
            <th id="new_entretien_btn" onclick='new_entretien(get_services())' colspan='8' style='border-radius:0px 0px 16px 16px;cursor:pointer;'>
                <div id="new_serv"><svg id='plus' xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus" fill="white" stroke="white">
                        <line x1="12" y1="5" x2="12" y2="19" />
                        <line x1="5" y1="12" x2="19" y2="12" />
                    </svg> Insérer un nouveau entretien</div>
            </th>
        </tr>
    </tbody>
</table>
<script async defer src="/Station-Essence/JS/entretien.js"></script>