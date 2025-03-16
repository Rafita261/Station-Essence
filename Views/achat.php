<?php include('/opt/lampp/htdocs/Station/Controllers/Achat/list_achat.php');?>
<?php include('/opt/lampp/htdocs/Station/Controllers/Produit/list_produit.php');?>

<!-- Listage des produits dans la liste déroulante -->
<script>
    function get_products(){
        num_prods = [];
        designs = [];
        <?php foreach($produits as $produit){
    ?> num_prods.push('<?php print_r($produit[0]);?>');
    <?php
        } ?>
        <?php foreach($produits as $produit){
    ?> designs.push('<?php print_r($produit[1]);?>');
    <?php
        } ?>
    products = {};
    for(i in num_prods){
        products[num_prods[i]] = designs[i];
    }
    return products;
}
</script>


<h1 id='titre' style='text-align:center;'>Liste des achats de la station</h1>
<div id="new_achat_btn" class='new_achat_btn' onclick='create_new_achat_form(get_products())'>
    <svg class='new_icon' xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2">
        <line class='l1' x1="12" y1="5" x2="12" y2="19"></line>
        <line class='l2' x1="5" y1="12" x2="19" y2="12"></line>    
    </svg>
    <span>Effectuer un nouveau achat</span>
</div>

<table id='list_achat'>
    <tr class='tete'>
        <th>Numéro de l'achat</th>
        <th>Numéro du produit</th>
        <th>Nom du client</th>
        <th>Désignation du produit</th>
        <th>Quantité acheté(Litre)</th>
        <th>Date de l'achat</th>
        <th>Modifier</th>
        <th>Supprimer</th>
    </tr>
    <?php if (count($achats) == 0) { ?>
        <tr>
            <td colspan="8" style="text-align:center;font-size:30px;">Aucun achat enregistré</td>
        </tr>
    <?php } else { ?>
        <?php $i=1; foreach($achats as $achat){ ?>
        <tr class='<?php echo "ligne".$i%2;?>' id='<?php echo "achat".$achat[0];?>' >

            <td id='<?php echo "num_achat".$achat[0];?>'><?php echo $achat['num_achat'];?></td>
            <td id='<?php echo "num_prod".$achat[0];?>'><?php echo $achat['num_prod'];?></td>
            <td id='<?php echo "nom_client".$achat[0];?>'><?php echo $achat['nom_client'];?></td>
            <td id='<?php echo "design".$achat[0];?>'><?php echo $achat['design'];?></td>
            <td id='<?php echo "nbr_litre".$achat[0];?>'><?php echo $achat['nbr_litre'];?></td>
            <td id='<?php echo "date_achat".$achat[0];?>'><?php echo $achat['date_achat'];?></td>

            <td id='<?php echo "update".$achat[0];?>' class='edit' onclick='update_achat("<?php echo $achat[0];?>")'><svg class='edit-icon' xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></td>
            <td id='<?php echo "delete".$achat[0];?>' class='delete' onclick='delete_achat("<?php echo $achat[0];?>")'><svg class="delete-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></td>
        </tr>
        <?php
        $i++;
        } ?>
    <?php } ?>
</table>
<script async defer src="/Station/JS/achat.js"></script>