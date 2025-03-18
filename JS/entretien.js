const new_entretien = () => {
     s = ''
    for (elem in products) {
        s += `<option value='${elem}'>${products[elem]}</option>`
    }

    document.getElementById('new_achat_btn').innerHTML = `
    <form class="new_achat_form" method='post' action="/Station-Essence/Controllers/Achat/create_achat.php">
    <div class="space"><span>Effectuer un nouveau achat</span><svg class='new_fermer_icon' onmouseover='animation_1()' onmouseleave='animation_2()' onclick="fermer()" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="red" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2">
        <line class='l1' x1="5" y1="5" x2="19" y2="19"></line>
        <line class='l2' x1="5" y1="19" x2="19" y2="5"></line>    
    </svg>
    </div>
    <input type="text" name="nom_client" placeholder="Nom du client" required="true"><br/>
    <input type="number" name='nbr_litre' placeholder='Nombre de litre commandé' required="true">
    <select name="product">${s}</select>
    <input type="submit" >
</form>
    `;
    document.getElementById('new_achat_btn').style.backgroundColor = '#f4f4f4';
    document.getElementById('new_achat_btn').onclick = '';
    document.getElementById('list_achat').hidden = true;
    document.getElementById('new_achat_btn').style.height = "fit-content"
    document.getElementById('titre').innerText = 'Enregistrer un achat';

}