function saveC6Analytique() {
    // Accédez à l'élément form …
    var form = document.getElementById("c6form");
    //console.log('INCORPORABLE');
    // … et prenez en charge l'événement submit.
    //form.addEventListener("submit", function (event) {
    //event.preventDefault(); // évite de faire le submit par défaut
    var incorporable = document.getElementById('INC');
    //alert('OKOK');
    if (incorporable.checked) {
        //console.log('INCORPORABLE');
        const numero = document.getElementById('numeroC6');
        //alert(numero.value);

        // all productions
        var xhr = newXhr();
        xhr.addEventListener("load", function () {
            var all_productions = JSON.parse(xhr.responseText);
            console.log(all_productions);
            //CENTRES
            var xhr2 = newXhr();
            xhr2.addEventListener("load", function () {

                var all_centres = JSON.parse(xhr2.responseText);
                console.log(all_centres);

                //console.log(productions);
                //alert(all_centres);
                all_productions.forEach(production => {
                    var production_allPourcent = document.getElementById('production_allPourcent' + production.id);
                    let production_input = production_allPourcent.querySelector("input[name='produit" + production.id + "']").value;
                    let variable_input = production_allPourcent.querySelector("input[name='variable" + production.id + "']").value;
                    let fixe_input = production_allPourcent.querySelector("input[name='fixe" + production.id + "']").value;

                    //charge produit
                    var xhr3 = newXhr();
                    xhr3.addEventListener("load", async function () {

                        var chargeProduit = JSON.parse(xhr3.responseText);
                        console.log(chargeProduit);
                        //si existe -> update
                        maj = {
                            'pourcentage': production_input,
                            'pourc_var': variable_input,
                            'pourc_fix': fixe_input
                        };
                        if (chargeProduit != null) {
                            chargeProduit = chargeProduit[0];

                            console.log(maj);
                            await updateChargeProduit(chargeProduit.id, maj);

                            //charge produit centre
                            all_centres.forEach(centre => {
                                var pourc_centre_variable = production_allPourcent.querySelector("input[name='C" + production.id + "1" + centre.id + "']").value;
                                var pourc_centre_fixe = production_allPourcent.querySelector("input[name='C" + production.id + "0" + centre.id + "']").value;
                                var chargeProduitCentre = await getChargeProduitCentre(chargeProduit.id, centre.id);
                                if (chargeProduitCentre != null) {
                                    chargeProduitCentre = chargeProduitCentre[0];
                                    //variable
                                    if (chargeProduitCentre.estvariable == 1) {
                                        await updateChargeProduitCentre(chargeProduitCentre.id, pourc_centre_variable);
                                    }
                                    //fixe
                                    else {
                                        await updateChargeProduitCentre(chargeProduitCentre.id, pourc_centre_fixe);
                                    }
                                }
                            });
                        }

                        //si existe pas -> insert
                        else {
                            await insertChargeProduit(numero.value, production.id, maj);
                        }

                        //fermer le formulaires
                        const formulaire = document.getElementById("c6form");
                        formulaire.style.display = "none";

                    });

                    //envoie du formulaire fictif
                    const formHTML = document.createElement("form");
                    //numero
                    var input = document.createElement("input");
                    input.setAttribute('type', 'hidden');
                    input.setAttribute('name', 'numero');
                    // input.value = numero;
                    input.setAttribute('value', numero.value);
                    formHTML.appendChild(input);
                    //idproduit
                    var input2 = document.createElement("input");
                    input2.setAttribute('type', 'hidden');
                    input2.setAttribute('name', 'idproduit');
                    // input2.value = production.id;
                    input2.setAttribute('value', production.id);
                    formHTML.appendChild(input2);

                    const formJSON = new FormData(formHTML);

                    //alert(production.id);
                    console.log(formJSON);

                    //envoie du formulaire fictif
                    xhr3.open("POST", "/application/views/ajax/chargeProduit.php");
                    xhr3.send(formJSON);
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

async function updateChargeProduitCentre(idChargeProduitCentre, pourc_centre) {
    var xhr = newXhr();
    xhr.addEventListener("load", function () {

        // var chargeProduit = JSON.parse(xhr.responseText);
        // console.log(chargeProduit);
        return 1;

    });

    //envoie du formulaire fictif
    xhr.open("POST", "/application/views/ajax/updateChargeProduitCentre.php");
    //envoie du formulaire fictif
    const formHTML = document.createElement("form");
    //numero
    var input = document.createElement("input");

    input.setAttribute('type', 'hidden');
    input.setAttribute('name', 'idChargeProduitCentre');
    input.value = idChargeProduitCentre;
    formHTML.appendChild(input);
    // console.log('maj '+maj);pourcentage

    input = document.createElement("input");

    input.setAttribute('type', 'hidden');
    input.setAttribute('name', 'pourc_centre');
    input.value = pourc_centre;
    formHTML.appendChild(input);

    const formJSON = new FormData(formHTML);
    xhr.send(formJSON);
}

async function getChargeProduitCentre(idChargeProduitCentre, idCentre) {

    var xhr = newXhr();
    xhr.addEventListener("load", function () {

        var chargeProduitCentre = JSON.parse(xhr.responseText);
        console.log(chargeProduitCentre);
        return chargeProduitCentre;

    });

    //envoie du formulaire fictif
    xhr.open("POST", "/application/views/ajax/chargeProduitCentre.php");
    //envoie du formulaire fictif
    const formHTML = document.createElement("form");
    //idChargeProduitCentre
    var input = document.createElement("input");
    input.setAttribute('type', 'hidden');
    input.setAttribute('name', 'idChargeProduitCentre');
    input.value = idChargeProduitCentre;
    formHTML.appendChild(input);
    //idCentre
    input = document.createElement("input");
    input.setAttribute('type', 'hidden');
    input.setAttribute('name', 'idCentre');
    input.value = idCentre;
    formHTML.appendChild(input);
    const formJSON = new FormData(formHTML);
    xhr.send(formJSON);
}

async function insertChargeProduit(numero, idproduit, maj) {
    var xhr = newXhr();
    xhr.addEventListener("load", function () {

        console.log(xhr.responseText);
        // var sql = JSON.parse(xhr.responseText);
        // console.log(sql);
        return 1;

    });

    //envoie du formulaire fictif
    const formHTML = document.createElement("form");
    //numero
    var input = document.createElement("input");

    input.setAttribute('type', 'hidden');
    input.setAttribute('name', 'idproduit');
    input.value = idproduit;
    formHTML.appendChild(input);

    input = document.createElement("input");

    input.setAttribute('type', 'hidden');
    input.setAttribute('name', 'numero');
    input.value = numero;
    formHTML.appendChild(input);
    // console.log('maj '+maj);pourcentage

    //preparation des colonnes a mettre a jour
    for (const colonne in maj) {
        // console.log('colonne '+colonne);
        input = document.createElement("input");
        if (Object.hasOwnProperty.call(maj, colonne)) {
            const valeur = maj[colonne];
            console.log('valeur ' + valeur);
            input.setAttribute('type', 'hidden');
            input.setAttribute('name', colonne);
            input.value = valeur;
            formHTML.appendChild(input);
        }
    }

    //envoie du formulaire fictif
    xhr.open("POST", "/application/views/ajax/insertChargeProduit.php");
    const formJSON = new FormData(formHTML);
    console.log(formJSON);
    xhr.send(formJSON);
}

async function updateChargeProduit(idChargeProduit, maj) {
    var xhr = newXhr();
    xhr.addEventListener("load", function () {

        // var chargeProduit = JSON.parse(xhr.responseText);
        // console.log(chargeProduit);
        return 1;

    });

    //envoie du formulaire fictif
    xhr.open("POST", "/application/views/ajax/updateChargeProduit.php");
    //envoie du formulaire fictif
    const formHTML = document.createElement("form");
    //numero
    var input = document.createElement("input");

    input.setAttribute('type', 'hidden');
    input.setAttribute('name', 'idChargeProduit');
    input.value = idChargeProduit;
    formHTML.appendChild(input);
    // console.log('maj '+maj);pourcentage

    //preparation des colonnes a mettre a jour
    for (const colonne in maj) {
        // console.log('colonne '+colonne);
        input = document.createElement("input");
        if (Object.hasOwnProperty.call(maj, colonne)) {
            const valeur = maj[colonne];
            console.log('valeur ' + valeur);
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
    xhr.addEventListener("load", function () {

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
    xhr.addEventListener("load", function () {

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
    xhr.addEventListener("load", function () {

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
