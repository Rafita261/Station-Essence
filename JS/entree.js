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

// Nouveau entrée en stock
function new_entree(products) {
    element = document.getElementById('new_entree');
    div = document.getElementById('new_prod');
    if (div) {
        element.removeChild(div);
        s = ''
        for (elem in products) {
            s += `<option value='${elem}'>${products[elem]}</option>`
        }
        element.innerHTML += `<form action="/Station-Essence/Controllers/Entree/create_entree.php" id='new_e_form'>
    <select name="product" id="">
        ${s}
    </select>
    <input type="number" name="stock" id="stock_entree" placeholder="Entrée en stock (en litre)" required="true">
    <input type="submit" value="Ajouter">
    <button onclick='window.location="/Station-Essence/?page=entree"' class='annuler'>Annuler</button>
    </form>`
    }
    
}
function close_new_entree() {
    element = document.getElementById('new_entree');
    div = document.getElementById('new_e_form');
    element.removeChild(div);
    element.innerHTML += `
    <div id="new_prod"><svg id='plus' xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus" fill="white" stroke="white"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg> Insérer un nouveau entrée en stock</div>
    `
}

// Suppression d'une entrée
function delete_entree(num_entree) {
    showConfirmationPrompt(`Voulez-vous supprimer l' entrée en stock n° ${num_entree} ?`, (del) => {
        if (del) {
        window.location = `/Station-Essence/Controllers/Entree/delete_entree.php?num_entree=${num_entree}`;
    }
    })
}

// Mise à jour d'une entrée
function update_entree(num_entree) {
    let Stock_entree = document.getElementById(`stock_entree${num_entree}`);
    let Date_entree = document.getElementById(`date_entree${num_entree}`);
    let Update = document.getElementById(`update${num_entree}`);
    let Del = document.getElementById(`delete${num_entree}`);
    let Container = document.getElementById(`entree${num_entree}`);
    let Design = document.getElementById(`design${num_entree}`);
    Container.style.margin = '0px';
    let date = Date_entree.innerText.split('/').reverse()
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
    Stock_entree.innerHTML = `<input type="text" id="new_Stock_entree" Value='${Stock_entree.innerText}' style='width:70%;'>`
    Date_entree.innerHTML = `<input type="date" id="new_Date_entree" Value='${date}' style='width:70%;'>`
    Update.innerHTML = `<button onclick='update("${num_entree}")' style="background-color:#f2df10;color:#28a745; border-radius:0px;">Modifier</button>`
    Del.innerHTML = `<button onclick='window.location="/Station-Essence/?page=entree"' >Annuler</button>`

    a = parseInt(Container.classList[0].split('').reverse().join(''));
    if (a) color = "rgb(179, 205, 226)"
    else color = "rgb(247, 249, 250)"

    Update.onmouseover = () => Update.style.backgroundColor = color;
    Del.onmouseover = () => Del.style.backgroundColor = color;
    Update.onclick = () => { }
    Del.onclick = () => { }

    btns = document.querySelectorAll('.edit')
    
    for (elem of btns) {
        console.log(elem);
        
        elem.onclick = () => { };
    } 
    btns = document.querySelectorAll('.delete')
    
    for (elem of btns) {
        console.log(elem);
        
        elem.onclick = () => { };
    } 

}

function update(num_entree) {
    let Stock_entree = document.getElementById(`new_Stock_entree`).value;
    let Date_entree = document.getElementById(`new_Date_entree`).value;
    let num_prod = document.getElementById(`list_prod`).value;
    Date_entree = Date_entree.replace(/\-/g, '/')
    window.location = `/Station-Essence/Controllers/Entree/update_entree.php?num_entree=${num_entree}&stock_entree=${Stock_entree}&date_entree=${Date_entree}&num_prod=${num_prod}`;
}