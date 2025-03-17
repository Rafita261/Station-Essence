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


function new_service() {
    element = document.getElementById('new_service');
    div = document.getElementById('new_serv');
    if (div) {
        element.removeChild(div);
        element.innerHTML += `
    <form action="/Station-Essence/Controllers/Service/nouveau_service.php" id='new_s_form' method="post">
        <input type="text" placeholder="Nom du service" name='service' required='true'>
        <input type="number" placeholder="Prix du service" name='prix' required='true'>
        <input type="submit" value="Ajouter">
    </form>
    `
    }
}
function close_new_service(){
    element = document.getElementById('new_service');
    div = document.getElementById('new_s_form');
    element.removeChild(div);
    element.innerHTML += `
    <div id="new_serv"><svg id='plus' xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus" fill="white" stroke="white"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg> Insérer un nouveau service</div>`
}

function delete_service(num_serv) {
    showConfirmationPrompt(`Voulez-vous supprimer le sevice n° ${num_serv} ?`, (del) => {
        if (del) {
            window.location = `/Station-Essence/Controllers/Service/delete_service.php?num_serv=${num_serv}`;
        }
    })
}



function update_service(num_serv) {
    let Service = document.getElementById(`Service${num_serv}`);
    let Prix = document.getElementById(`prix${num_serv}`);
    let Update = document.getElementById(`update${num_serv}`);
    let Del = document.getElementById(`delete${num_serv}`);
    let Container = document.getElementById(`service${num_serv}`);

    let b = Prix.innerText.substring(2, Prix.innerText.length);

    Service.innerHTML = `
        <input type="text" value='${Service.innerText}' id='New_service' style='width: fit-content;'>
    `;
    Prix.innerHTML = `
        <input type="number" value='${parseInt(b)}' id='new_prix' style='width: fit-content;'>
    `;
    Update.innerHTML = `
        <button onclick='update("${num_serv}")' style="background-color:#f2df10;color:#28a745; border-radius:0px;">Modifier</button>
    `;
    Del.innerHTML = `
        <button onclick='window.location="/Station-Essence/?page=achat"' >Annuler</button>
    `;
    Container.style.margin = '0px';
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

function update(num_serv) {
    New_service = document.getElementById('New_service').value;
    New_prix = document.getElementById('new_prix').value;
    window.location = `/Station-Essence/Controllers/Service/update_service.php?num_serv=${num_serv}&service=${New_service}&prix=${New_prix}`;
}