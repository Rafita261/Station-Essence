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

const new_entretien = (services) => {
    let s = '';
    for (let service in services) {
        s += `
        <div class="service-option" style="display:flex;justify-content:space-between">
            <input type="checkbox" id="service_${service}" value="${service}" name='services[]'>
            <label for="service_${service}" style="color:#000">${services[service]}</label>
        </div>`;
    }

    document.getElementById('new_entretien_form').innerHTML = `
    <form class="new_entretien_form" method='post' action="/Station-Essence/Controllers/Entretien/create_entretien.php">
    <div class="space"><span>Effectuer un nouvel entretien</span><svg class='new_fermer_icon' onmouseover='animation_1()' onmouseleave='animation_2()' onclick="fermer()" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="red" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2">
        <line class='l1' x1="5" y1="5" x2="19" y2="19"></line>
        <line class='l2' x1="5" y1="19" x2="19" y2="5"></line>    
    </svg>
    </div>
    <input id="new_nom" type="text" name="nom_client" placeholder="Nom du client" required="true"><br/>
    <input id="new_immat" type="text" name='immatriculation' placeholder='Immatriculation' required="true">
    <div class="services-container">${s}</div>
    <input type="submit" >
</form>
    `;
    document.getElementById('new_entretien_btn').style.backgroundColor = '#f4f4f4';
    document.getElementById('new_entretien_btn').onclick = '';
    document.getElementById('new_entretien_btn').style.height = "fit-content";
    document.getElementById('table_entretien').hidden = true 
}
function fermer() {
    window.location = '/Station-Essence/?page=entretien';
}

function animation_1() {
    document.querySelector('.new_fermer_icon').innerHTML=`<line class="l1" x1="5" y1="9" x2="19" y2="19"></line><line class='l2' x1="5" y1="19" x2="19" y2="5"></line>` ;
}
function animation_2() {
    document.querySelector('.new_fermer_icon').innerHTML = `<line class="l1" x1="5" y1="5" x2="19" y2="19"></line><line class='l2' x1="5" y1="19" x2="19" y2="5"></line>`;
}

function delete_entretien(num_entr) {
    showConfirmationPrompt(`Voulez-vous supprimer l'entretien numéro ${num_entr}?`, (del) => {
        if (del) {
            window.location = "/Station-Essence/Controllers/Entretien/delete_entretien.php?num_entr="+num_entr ;
        }
    })
}

function update_entretien(num_entr) {
    nom = document.getElementById(`nom_client${num_entr}`).innerText;
    immat = document.getElementById(`immatriculation${num_entr}`).innerText;
    Date_entr = document.getElementById(`date_entretien${num_entr}`);
    serv = document.getElementById(`service${num_entr}`).innerText;
    num_serv = Object.keys(get_services())[Object.values(get_services()).indexOf(serv)]
    let Update = document.getElementById(`update${num_entr}`);
    let Del = document.getElementById(`delete${num_entr}`);
    let Container = document.getElementById(`entretien${num_entr}`);
    Container.style.margin = '0px';
    date = Date_entr.innerText.split('/').reverse()
    date = date.join('/');

    document.getElementById(`nom_client${num_entr}`).innerHTML = `<input type="text" id="nom" value="${nom}">`;
    document.getElementById(`immatriculation${num_entr}`).innerHTML = `<input type="text" id="immat" value="${immat}">`;
    Date_entr.innerHTML = `<input type="date" id="new_Date_entr" Value='${date}' style='width:70%;'>`
    Update.innerHTML = `<button onclick='update("${num_entr}")' style="background-color:#f2df10;color:#28a745; border-radius:0px;">Modifier</button>`
    Del.innerHTML = `<button onclick='window.location="/Station-Essence/?page=entretien"' >Annuler</button>`
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

function update(num_entr) {
    immat = document.getElementById("immat").value;
    nom = document.getElementById("nom").value;
    date_entr = document.getElementById("new_Date_entr").value;
    date_entr = date_entr.replace(/\-/g, '/');
    window.location = `/Station-Essence/Controllers/Entretien/update_entretien.php?num_entr=${num_entr}&immat=${immat}&nom_client=${nom}&date_entr=${date_entr}`;
}