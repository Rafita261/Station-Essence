// Altenative de confirm() de JS
function showConfirmationPrompt(message, callback) {
        Swal.fire({
            title: 'Êtes-vous sûr?',
            text: message,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Oui',
            cancelButtonText: 'Non'
        }).then((result) => {
            if (result.isConfirmed) {
                callback(true);
            } else {
                callback(false);
            }
        });
    }

// Mise à jour d'un achat
function update_achat(num_achat) {
    let Nom_client = document.getElementById(`nom_client${num_achat}`);
    let Nbr_litre = document.getElementById(`nbr_litre${num_achat}`);
    let Design = document.getElementById(`design${num_achat}`);
    let Date_achat = document.getElementById(`date_achat${num_achat}`);
    let Update = document.getElementById(`update${num_achat}`);
    let Del = document.getElementById(`delete${num_achat}`);
    let Container = document.getElementById(`achat${num_achat}`);
    Container.style.margin = '0px';
    let date = Date_achat.innerText.split('/').reverse()
    date = date.join('/');

    products = get_products();
    val = Design.innerText;
    s = ''
    for (elem in products) {
        s += `<option value='${elem}'>${products[elem]}</option>
        `
    }

    Design.innerHTML = `
    <select name="product" id="list_prod">
        ${s}
    </select>`
    
    document.getElementById("list_prod").selectedIndex = Object.values(products).indexOf(val);
    Nom_client.innerHTML = `<input type="text" id="new_nom_client" Value='${Nom_client.innerText}' style='width:70%;'>`
    Nbr_litre.innerHTML = `<input type="number" id="new_nbr_litre" Value='${Nbr_litre.innerText}' style='width:70%;'>`
    Date_achat.innerHTML = `<input type="date" id="new_Date_achat" Value='${date}' style='width:70%;'>`
    Update.innerHTML = `<button onclick='update("${num_achat}")' style="background-color:#f2df10;color:#28a745; border-radius:0px;">Modifier</button>`
    Del.innerHTML = `<button onclick='window.location="/Station-Essence/?page=achat"' >Annuler</button>`
    Update.style.borderRadius = '8px';

    a = parseInt(Container.classList[0].split('').reverse().join(''));
    if (a) color = "rgb(179, 205, 226)"
    else color = "rgb(247, 249, 250)"

    Update.onmouseover = () => Update.style.backgroundColor = color;
    Del.onmouseover = () => Del.style.backgroundColor = color;
    Update.onclick = () => { }
    Del.onclick = () => { }

    btns = document.querySelectorAll('.edit')
    
    for (elem of btns) {
        elem.onclick = () => { };
    } 
    btns = document.querySelectorAll('.delete')
    
    for (elem of btns) {
        elem.onclick = () => { };
    } 
}

function update(num_achat) {
    num_prod = document.getElementById('list_prod').value;
    nom_client = document.getElementById('new_nom_client').value;
    date_achat = document.getElementById("new_Date_achat").value;
    nbr_litre = document.getElementById('new_nbr_litre').value;
    date_achat = date_achat.replace(/\-/g, '/');
    window.location = `/Station-Essence/Controllers/Achat/update_achat.php?num_achat=${num_achat}&num_prod=${num_prod}&nom_client=${nom_client}&date_achat=${date_achat}&nbr_litre=${nbr_litre}`;
}

function delete_achat(num_achat) {
    showConfirmationPrompt(`Voulez-vous supprimer l' achat n° ${num_achat} ?`, (del) => {
        if (del) {
            window.location = `/Station-Essence/Controllers/Achat/delete_achat.php?num_achat=${num_achat}`;
        }
    })
}

function create_new_achat_form(products) {
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

function fermer() {
    window.location = '/Station-Essence/?page=achat';
}

function animation_1() {
    document.querySelector('.new_fermer_icon').innerHTML=`<line class="l1" x1="5" y1="9" x2="19" y2="19"></line><line class='l2' x1="5" y1="19" x2="19" y2="5"></line>` ;
}
function animation_2() {
    document.querySelector('.new_fermer_icon').innerHTML = `<line class="l1" x1="5" y1="5" x2="19" y2="19"></line><line class='l2' x1="5" y1="19" x2="19" y2="5"></line>`;
}