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

// Nouveau produit
function new_product() {
    element = document.getElementById('new_product');
    div = document.getElementById('new_prod');
    if (div) {
        element.removeChild(div);
        element.innerHTML += `
        <form method='post' action="/Station/Controllers/Produit/nouveau_produit.php" id='new_p_form'>
        <input type="text" placeholder="Désignation" name="designation" required="true">
        <input type="submit" value="Ajouter">
    </form>
        `
    }
}
function close_new_product() {
    element = document.getElementById('new_product');
    div = document.getElementById('new_p_form');
    element.removeChild(div);
    element.innerHTML += `
    <div id="new_prod"><svg id='plus' xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus" fill="white" stroke="white"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg> Insérer un nouveau produit</div>
    `
}

// Suppression d'un produit
function delete_product(num_prod) {
    showConfirmationPrompt(`Voulez-vous supprimer le produit ${num_prod} ?`, (del) => {
        if (del) {
            window.location = `/Station/Controllers/Produit/delete_product.php?num_prod=${num_prod}`;
        }
    })
}

// Mise à jour d'un produit
function update_product(num_prod) {
    let Design = document.getElementById(`design${num_prod}`);
    let Modify = document.getElementById(`update${num_prod}`);
    let Del = document.getElementById(`delete${num_prod}`);
    let Container = document.getElementById(`produit${num_prod}`);

    Design.innerHTML = `<input type="text" id="new_design" Value='${Design.innerText}' style='width:70%;'>`
    Modify.innerHTML = `<button onclick='update("${num_prod}")' style="background-color:#f2df10;color:#28a745; border-radius:0px;">Modifier</button>`
    Del.innerHTML = `<button onclick='window.location="/Station/?page=produit"' >Annuler</button>`
    Container.style.margin = '0px';

    a = parseInt(Container.classList[0].split('').reverse().join(''));
    
    if (a) color = "rgb(179, 205, 226)"
    else color = "rgb(247, 249, 250)"

    Modify.onmouseover = () => Modify.style.backgroundColor = color;
    Del.onmouseover = () => Del.style.backgroundColor = color;
    Modify.onclick = () => { }
    Del.onclick = () => { }

}

function update(num_prod) {
    design = document.getElementById(`new_design`).value;
    window.location = `/Station/Controllers/Produit/update_product.php?num_prod=${num_prod}&design=${design}`;
}