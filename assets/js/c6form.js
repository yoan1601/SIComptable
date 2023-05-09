window.addEventListener("load", saveC6Analytique());

console.log('saveC6Analytique');

/*function saveC6Analytique() {
    // Accédez à l'élément form …
    var form = document.getElementById("c6form");
    //console.log('INCORPORABLE');
    // … et prenez en charge l'événement submit.
    //form.addEventListener("submit", function (event) {
        //event.preventDefault(); // évite de faire le submit par défaut

        var incorporable = document.getElementById('INC');
        if (incorporable.checked) {
            //console.log('INCORPORABLE');
            const numero = form.getElementsByTagName('numeroC6');
            var productions = await getAllProductions();
            var centres = getAllCentres();

            console.log(productions);

            productions.forEach(production => {
                const production_input = form.getElementsByTagName('produit').value;
                const variable_input = form.getElementsByTagName('variable').value;
                const fixe_input = form.getElementsByTagName('fixe').value;

                chargeProduit = getChargeProduit(numero, production.id);
                //si existe -> update
                if (count(chargeProduit) > 0) {
                    chargeProduit = chargeProduit[0];
                    maj = {
                        'pourcentage' : production_input,
                        'pourc_var' : variable_input,
                        'pourc_fix' : fixe_input
                    };
                    console.log(chargeProduit);
                    updateChargeProduit(chargeProduit.id, maj);
                }
                //si existe pas -> insert
                else {

                }

                const formulaire = document.getElementById("c6form");
                formulaire.style.display = "none";
            });
        }
    //});
}*/

function saveC6Analytique() {
    // Accédez à l'élément form …
    var form = document.getElementById("c6form");
    //console.log('INCORPORABLE');
    // … et prenez en charge l'événement submit.
    //form.addEventListener("submit", function (event) {
    //event.preventDefault(); // évite de faire le submit par défaut

    var incorporable = document.getElementById('INC');
    if (incorporable.checked) {
        //console.log('INCORPORABLE');
        const numero = form.getElementsByTagName('numeroC6');

        // all productions
        var xhr = newXhr();
        xhr.addEventListener("load", function (event) {

            var all_productions = JSON.parse(xhr.responseText);
            //console.log(all_productions);


            //CENTRES
            var xhr2 = newXhr();
            xhr2.addEventListener("load", function (event) {

                var all_centres = JSON.parse(xhr2.responseText);
                console.log(all_centres);

                //console.log(productions);

                all_productions.forEach(production => {
                    var production_allPourcent = document.getElementById('production_allPourcent'+production.id);
                    const production_input = production_allPourcent.getElementsByTagName('produit').value;
                    const variable_input = production_allPourcent.getElementsByTagName('variable').value;
                    const fixe_input = production_allPourcent.getElementsByTagName('fixe').value;

                    // chargeProduit = getChargeProduit(numero, production.id);
                    // //si existe -> update
                    // if (count(chargeProduit) > 0) {
                    //     chargeProduit = chargeProduit[0];
                    //     maj = {
                    //         'pourcentage': production_input,
                    //         'pourc_var': variable_input,
                    //         'pourc_fix': fixe_input
                    //     };
                    //     console.log(chargeProduit);
                    //     updateChargeProduit(chargeProduit.id, maj);
                    // }
                    // //si existe pas -> insert
                    // else {

                    // }

                    const formulaire = document.getElementById("c6form");
                    formulaire.style.display = "none";
                });

            });

            //envoie du formulaire fictif
            xhr2.open("POST", "/application/views/ajax/centre.php");
            xhr2.send(null);

        });

        //envoie du formulaire fictif
        xhr.open("POST", "/application/views/ajax/production.php");
        xhr.send(null);
    }
    //});
}

function updateChargeProduit(idChargeProduit, maj) {
    var xhr = newXhr();
    xhr.addEventListener("load", function (event) {

        // var chargeProduit = JSON.parse(xhr.responseText);
        // console.log(chargeProduit);
        return 1;

    });

    //envoie du formulaire fictif
    xhr.open("POST", "/application/views/ajax/updateChargeProduit.php");
    //envoie du formulaire fictif
    const formHTML = document.createElement("form");
    //numero
    const input = document.createElement("input");

    input.setAttribute('type', 'hidden');
    input.setAttribute('name', 'idChargeProduit');
    input.value = idChargeProduit;

    //preparation des colonnes a mettre a jour
    for (const colonne in maj) {
        input = document.createElement("input");
        if (Object.hasOwnProperty.call(maj, colonne)) {
            const valeur = maj[colonne];
            input.setAttribute('type', 'hidden');
            input.setAttribute('name', colonne);
            input.value = valeur;
            formHTML.appendChild(input);
        }
    }

    const formJSON = new FormData(formHTML);
    xhr.send(formJSON);
}

function getChargeProduit(numero, idproduit) {

    var xhr = newXhr();
    xhr.addEventListener("load", function (event) {

        var chargeProduit = JSON.parse(xhr.responseText);
        console.log(chargeProduit);
        return chargeProduit;

    });

    //envoie du formulaire fictif
    xhr.open("POST", "/application/views/ajax/chargeProduit.php");
    //envoie du formulaire fictif
    const formHTML = document.createElement("form");
    //numero
    var input = document.createElement("input");
    input.setAttribute('type', 'hidden');
    input.setAttribute('name', 'numero');
    input.value = numero;
    formHTML.appendChild(input);
    //idproduit
    input = document.createElement("input");
    input.setAttribute('type', 'hidden');
    input.setAttribute('name', 'idproduit');
    input.value = idproduit;
    formHTML.appendChild(input);
    const formJSON = new FormData(formHTML);
    xhr.send(formJSON);
}

function getAllCentres() {
    var xhr = newXhr();
    xhr.addEventListener("load", function (event) {

        var all_centres = JSON.parse(xhr.responseText);
        console.log(all_centres);
        return all_centres;

    });

    //envoie du formulaire fictif
    xhr.open("POST", "/application/views/ajax/centre.php");
    xhr.send(null);
}

async function getAllProductions() {
    var xhr = newXhr();
    xhr.addEventListener("load", function (event) {

        var all_productions = JSON.parse(xhr.responseText);
        console.log(all_productions);
        return all_productions;

    });

    //envoie du formulaire fictif
    xhr.open("POST", "/application/views/ajax/production.php");
    xhr.send(null);
}

function newXhr() {
    var xhr;
    try {
        xhr = new ActiveXObject('Msxml2.XMLHTTP');
    } catch (e) {
        try {
            xhr = new ActiveXObject('Microsoft.XMLHTTP');
        } catch (e2) {
            try {
                xhr = new XMLHttpRequest();
            } catch (e3) {
                xhr = false;
            }
        }
    }

    return xhr;
}