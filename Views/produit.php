<?php session_start();
include('/opt/lampp/htdocs/Station-Essence/Controllers/Produit/list_produit.php'); ?>
<h1 style='text-align:center;'>Liste des produits de la Station-Essence</h1>
<table>
    <tr>
        <th>Numéro de produit</th>
        <th>Désignation</th>
        <th>Stock restant (en litre)</th>
        <th>Modifier</th>
        <th>Supprimer</th>
    </tr>
    <?php if (count($produits) == 0) { ?>
        <tr>
            <td colspan="5" style="text-align:center;font-size:30px;">Aucun produit disponible</td>
        </tr>
        <?php } else {
        $i = 1;
        foreach ($produits as $produit) { ?>
            <tr class='<?php echo "ligne" . $i % 2; ?><?php if(($produit[1]=="Pétrole" || $produit[1]=="Essence" || $produit[1]=="Gasoil")&& $produit[2]<10) echo " alert" ?>' id='<?php echo "produit" . $produit[0]; ?>'>
                <td id='<?php echo "num" . $produit[0]; ?>'><?php echo $produit[0]; ?></td>
                <td id='<?php echo "design" . $produit[0]; ?>'><?php echo $produit[1]; ?></td>
                <td id='<?php echo "stock" . $produit[0]; ?>'><?php echo $produit[2]; ?></td>
                <td id='<?php echo "update" . $produit[0]; ?>' class='edit' onclick='update_product("<?php echo $produit[0]; ?>")'><svg class='edit-icon' xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2">
                        <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                    </svg></td>
                <td id='<?php echo "delete" . $produit[0]; ?>' class='delete' onclick='delete_product("<?php echo $produit[0]; ?>")'><svg class="delete-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2">
                        <polyline points="3 6 5 6 21 6"></polyline>
                        <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                        <line x1="10" y1="11" x2="10" y2="17"></line>
                        <line x1="14" y1="11" x2="14" y2="17"></line>
                    </svg></td>
            </tr>
    <?php
            $i++;
        }
    }
    ?>
    <tr>
        <th id="new_product" onmouseover='new_product()' onmouseleave='close_new_product()' colspan='5'>
            <div id="new_prod"><svg id='plus' xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus" fill="white" stroke="white">
                    <line x1="12" y1="5" x2="12" y2="19" />
                    <line x1="5" y1="12" x2="19" y2="12" />
                </svg> Insérer un nouveau produit</div>
        </th>
    </tr>
</table>
<script async defer src="/Station-Essence/JS/product.js"></script>