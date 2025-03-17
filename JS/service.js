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