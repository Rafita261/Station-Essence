<?php
session_start();
include('/opt/lampp/htdocs/Station/Controllers/Entree/list_entree.php'); ?>
<?php include('/opt/lampp/htdocs/Station/Controllers/Produit/list_produit.php'); ?>
<h1 style='text-align:center;'>Liste des entrées en stock dans la station</h1>
<!-- Listage des produits dans la liste déroulante -->
<script>
    function get_products() {
        num_prods = [];
        designs = [];
        <?php foreach ($produits as $produit) {
        ?> num_prods.push('<?php print_r($produit[0]); ?>');
        <?php
        } ?>
        <?php foreach ($produits as $produit) {
        ?> designs.push('<?php print_r($produit[1]); ?>');
        <?php
        } ?>
        products = {};
        for (i in num_prods) {
            products[num_prods[i]] = designs[i];
        }
        return products;
    }
</script>

<table>
    <tr>
        <th>Numéro de l'entrée</th>
        <th>Numéro du produit</th>
        <th>Désignation de produit</th>
        <th>Stock entrée (en litre)</th>
        <th>Date de l'entrée de stock</th>
        <th>Modifier</th>
        <th>Supprimer</th>
    </tr>
    <?php if (count($entrees) == 0) { ?>
        <tr>
            <td colspan="7" style="text-align:center;font-size:30px;">Aucune entrée en stock</td>
        </tr>
        <?php } else {
        $i = 1;
        foreach ($entrees as $entree) { ?>
            <tr class='<?php echo "ligne" . ($i) % 2; ?>' id='<?php echo "entree" . $entree[0]; ?>'>
                <td id='<?php echo "num_entree" . $entree[0]; ?>'><?php echo $entree['num_entree']; ?></td>
                <td id='<?php echo "num_prod" . $entree[0]; ?>'><?php echo $entree['num_prod']; ?></td>
                <td id='<?php echo "design" . $entree[0]; ?>'><?php echo $entree['design']; ?></td>
                <td id='<?php echo "stock_entree" . $entree[0]; ?>'><?php echo $entree['stock_entree']; ?></td>
                <td id='<?php echo "date_entree" . $entree[0]; ?>'><?php echo $entree['date_entree']; ?></td>
                <td id='<?php echo "update" . $entree[0]; ?>' class='edit' onclick='update_entree("<?php echo $entree["num_entree"]; ?>")'><svg class='edit-icon' xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2">
                        <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                    </svg></td>
                <td id='<?php echo "delete" . $entree[0]; ?>' class='delete' onclick='delete_entree("<?php echo $entree["num_entree"]; ?>")'><svg class="delete-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2">
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
        <th id="new_entree" onclick='new_entree(get_products())' onload='close_new_entree()' colspan='7'>
            <div id="new_prod"><svg id='plus' xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus" fill="white" stroke="white">
                    <line x1="12" y1="5" x2="12" y2="19" />
                    <line x1="5" y1="12" x2="19" y2="12" />
                </svg> Insérer une nouvelle entrée en stock</div>
        </th>
    </tr>
</table>
<script async defer src="/Station/JS/entree.js"></script>
