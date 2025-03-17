<?php require("/opt/lampp/htdocs/Station-Essence/Controllers/Service/list_service.php"); ?>
<h1>Liste des Services</h1>
<table>
    <thead>
        <tr>
            <th>Numéro de Service</th>
            <th>Service</th>
            <th>Prix</th>
            <th>Modifier</th>
            <th>Supprimer</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if (count($services) == 0) {
            echo "<tr><td colspan='5' style='text-align:center;font-size:30px;'>Aucun service disponible</td></tr>";
        } else {
            $i = 1;
            foreach ($services as $service) {
                echo "<tr class='ligne" . $i % 2 . "' id='service" . htmlspecialchars($service['num_serv']) . "'>";
                echo "<td id='num" . htmlspecialchars($service['num_serv']) . "' style='width:25%; height: 30px;'>" . htmlspecialchars($service['num_serv']) . "</td>";
                echo "<td id='service" . htmlspecialchars($service['num_serv']) . "' style='width:26%; height: 30px;'>" . htmlspecialchars($service['service']) . "</td>";
                echo "<td id='prix" . htmlspecialchars($service['num_serv']) . "' style='width:25%; height: 30px;'>Ar\t" . htmlspecialchars($service['prix']) . "</td>";
                echo "<td id='update" . htmlspecialchars($service['num_serv']) . "' class='edit' style='width:12%; height: 30px;' onclick='update_service(\"" . htmlspecialchars($service['num_serv']) . "\")'><svg class='edit-icon' xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\" class=\"feather feather-edit-2\"><path d=\"M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z\"></path></svg></td>";
                echo "<td id='delete" . htmlspecialchars($service['num_serv']) . "' class='delete' style='width:12%; height: 30px;' onclick='delete_service(\"" . htmlspecialchars($service['num_serv']) . "\")'><svg class=\"delete-icon\" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\" class=\"feather feather-trash-2\"><polyline points=\"3 6 5 6 21 6\"></polyline><path d=\"M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2\"></path><line x1=\"10\" y1=\"11\" x2=\"10\" y2=\"17\"></line><line x1=\"14\" y1=\"11\" x2=\"14\" y2=\"17\"></line></svg></td>";
                echo "</tr>";
                $i++;
            }
        }
        ?>
        <tr>
            <th id="new_service" onmouseover='new_service()' onmouseleave='close_new_service()' colspan='5' style='border-radius:0px 0px 16px 16px'>
                <div id="new_serv"><svg id='plus' xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus" fill="white" stroke="white">
                        <line x1="12" y1="5" x2="12" y2="19" />
                        <line x1="5" y1="12" x2="19" y2="12" />
                    </svg> Insérer un nouveau service</div>
            </th>
        </tr>
    </tbody>
</table>
<script async defer src="/Station-Essence/JS/service.js"></script>