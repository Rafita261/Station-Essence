<?php require("/opt/lampp/htdocs/Station-Essence/Controllers/Entretien/list_entretien.php"); ?>
<h1>Liste des entretiens</h1>
<table>
    <thead>
        <tr>
            <th>Numéro de entretien</th>
            <th>Numéro service</th>
            <th>Immatriculation</th>
            <th>Modifier</th>
            <th>Supprimer</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if (count($entretiens) == 0) {
            echo "<tr><td colspan='5' style='text-align:center;font-size:30px;'>Aucun entretien disponible</td></tr>";
        } else {
            $i = 1;
            foreach ($entretiens as $entretien) {
                echo "<tr class='ligne" . $i % 2 . "' id='entretien" . htmlspecialchars($entretien[0]) . "'>";
                echo "<td id='num" . htmlspecialchars($entretien[0]) . "' style='width:25%; height: 30px;'>" . htmlspecialchars($entretien[0]) . "</td>";
                echo "<td id='entretien" . htmlspecialchars($entretien[0]) . "' style='width:26%; height: 30px;'>" . htmlspecialchars($entretien[1]) . "</td>";
                echo "<td id='prix" . htmlspecialchars($entretien[0]) . "' style='width:25%; height: 30px;'>" . htmlspecialchars($entretien[2]) . "</td>";
                echo "<td id='update" . htmlspecialchars($entretien[0]) . "' class='edit' style='width:12%; height: 30px;' onclick='update_entretien(\"" . htmlspecialchars($entretien[0]) . "\")'><svg class='edit-icon' xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\" class=\"feather feather-edit-2\"><path d=\"M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z\"></path></svg></td>";
                echo "<td id='delete" . htmlspecialchars($entretien[0]) . "' class='delete' style='width:12%; height: 30px;' onclick='delete_entretien(\"" . htmlspecialchars($entretien[0]) . "\")'><svg class=\"delete-icon\" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\" class=\"feather feather-trash-2\"><polyline points=\"3 6 5 6 21 6\"></polyline><path d=\"M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2\"></path><line x1=\"10\" y1=\"11\" x2=\"10\" y2=\"17\"></line><line x1=\"14\" y1=\"11\" x2=\"14\" y2=\"17\"></line></svg></td>";
                echo "</tr>";
                $i++;
            }
        }
        ?>
        <tr>
            <th id="new_entretien" onmouseover='new_entretien()' onmouseleave='close_new_entretien()' colspan='5' style='border-radius:0px 0px 16px 16px'>
                <div id="new_serv"><svg id='plus' xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus" fill="white" stroke="white">
                        <line x1="12" y1="5" x2="12" y2="19" />
                        <line x1="5" y1="12" x2="19" y2="12" />
                    </svg> Insérer un nouveau entretien</div>
            </th>
        </tr>
    </tbody>
</table>
<script async defer src="/Station-Essence/JS/entretien.js"></script>