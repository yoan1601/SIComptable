window.onload = listenINC();
window.onload = listenDebCredEntries();
window.onchange = listenDebCredEntries();
window.onchange = listenMontant();
window.onchange = listenQte();
window.onchange = listenEquilibreDebCred();
window.onchange = listenNumero();
// voir si c6 form INC coché on non
window.onchange = listenINC();

const valider = document.getElementById("valider");
valider.disabled = true;

/////////////////////////// HARENA MAJ 08/05/2023 /////////////////////////////

const addLigne = document.getElementById("ajoutLigne");

//verifier compte 6 avant ajout ligne
function verifCompte() {
  var numComptes = document.getElementsByName("numCompte[]");
  //console.log(numComptes[numComptes.length - 1].value);
  const numCompteDerniereLigne = numComptes.item(numComptes.length - 1).value;
  //console.log(numCompteDerniereLigne[0]);
  const prefixe = numCompteDerniereLigne[0];

  if (prefixe == '6') {

    const formulaire = document.getElementById("c6form");
    //recuperation dans base la description du c6
    var xhrGetC6Info = newXhr();
    xhrGetC6Info.addEventListener("load", function (event) {
      var resultats = JSON.parse(xhrGetC6Info.responseText);
      //console.log(resultats);

      if (resultats.length == 0) {
        alert("le compte " + numCompteDerniereLigne + " n'existe pas");
      }
      else if (resultats.length > 0) {
        var result = resultats[0];
        var numTitreC6 = document.getElementById('titreC6');
        numTitreC6.innerText = result.numero + ' - ' + result.description;
        //input type hidden asina anle numero
        const numero_input = document.getElementById('numeroC6');
        numero_input.value = result.numero;

        //si non incorporable -> grisé daholo ny ambiny

        //voir si c6 est present dans chargeProduit
        var xhrGetC6ChargeProduit = newXhr();
        xhrGetC6ChargeProduit.addEventListener("load", function (event) {

          console.log(xhrGetC6ChargeProduit.responseText);
          var resultats_charge_produit = JSON.parse(xhrGetC6ChargeProduit.responseText);

          if (resultats_charge_produit == null) {
            //champ vide
            console.log("le compte " + numCompteDerniereLigne + " n'existe pas encore dans charge produit");
          }
          else if (resultats_charge_produit.length > 0) {
            resultats_charge_produit.forEach(resultat_charge_produit => {
              //console.log('resultat_charge_produit.id '+ resultat_charge_produit.id);

              //remplissage champ
              //console.log(resultat_charge_produit.idproduit);
              var all_pourcentDiv = document.getElementById('production_allPourcent' + resultat_charge_produit.idproduit);
              //console.log(all_pourcentDiv);

              //produit
              let inputProduit = all_pourcentDiv.querySelector("input[name='produit" + resultat_charge_produit.idproduit + "']");
              inputProduit.value = resultat_charge_produit.pourcentage;

              //nature
              var variable_input = all_pourcentDiv.querySelector("input[name='variable" + resultat_charge_produit.idproduit + "']");
              variable_input.value = resultat_charge_produit.pourc_var;
              var fixe_input = all_pourcentDiv.querySelector("input[name='fixe" + resultat_charge_produit.idproduit + "']");
              fixe_input.value = resultat_charge_produit.pourc_fix;

              //centres
              //AJAX recuperation charges produits centres
              //console.log(resultat_charge_produit);
              var xhrGetC6ChargeProduitCentre = newXhr();
              xhrGetC6ChargeProduitCentre.addEventListener("load", function (event) {

                var resultats_charge_produit_centres = JSON.parse(xhrGetC6ChargeProduitCentre.responseText);
                console.log(resultats_charge_produit_centres);
                if (resultats_charge_produit_centres.length > 0) {
                  resultats_charge_produit_centres.forEach(rcpc => {
                    var centre_input = all_pourcentDiv.querySelector("input[name='C" + resultat_charge_produit.idproduit + rcpc.estvariable + rcpc.idcentre + "']");
                    centre_input.value = rcpc.pourc_centre;
                  });
                }

              });

              //envoie du formulaire fictif
              const formHTML = document.createElement("form");
              const input = document.createElement("input");
              input.setAttribute('type', 'hidden');
              input.setAttribute('name', 'idChargeProduit');
              input.value = resultat_charge_produit.id;
              formHTML.appendChild(input);
              const formJSON = new FormData(formHTML);
              xhrGetC6ChargeProduitCentre.open("POST", "/application/views/ajax/chargeProduitCentre.php");
              xhrGetC6ChargeProduitCentre.send(formJSON);
            });
          }

        });

        //envoie du formulaire fictif
        const formHTML = document.createElement("form");
        var input = document.createElement("input");
        input.setAttribute('type', 'hidden');
        input.setAttribute('name', 'numero');
        input.value = numCompteDerniereLigne;
        //console.log('numCompteDerniereLigne '+numCompteDerniereLigne);
        formHTML.appendChild(input);

        // input = document.createElement("input");
        // input.setAttribute('type', 'hidden');
        // input.setAttribute('name', 'idproduit');
        // input.value = result.numero;
        // formHTML.appendChild(input);

        const formJSON = new FormData(formHTML);
        xhrGetC6ChargeProduit.open("POST", "/application/views/ajax/chargeProduit.php");
        xhrGetC6ChargeProduit.send(formJSON);

        formulaire.style.display = "block";
        //formulaire.style.backdropFilter = "blur(5px)";
      }
    });

    const formHTML = document.createElement("form");
    const input = document.createElement("input");
    input.setAttribute('type', 'hidden');
    input.setAttribute('name', 'numero');
    input.value = numCompteDerniereLigne;
    //console.log('numCompteDerniereLigne '+numCompteDerniereLigne);
    formHTML.appendChild(input);
    const formJSON = new FormData(formHTML);
    xhrGetC6Info.open("POST", "/application/views/ajax/comptes.php");
    xhrGetC6Info.send(formJSON);

    ///////////////////////////////////////////////////////
  }
  //si tsy compte 6
  else {
    //console.log("tsy c6");
  }

  ajoutLigne();
}

function listenINC() {
  console.log('listenINC');
  var incorporable = document.getElementById('INC');
  var n_incorporable = document.getElementById('NINC');
  var pourcent_champ = document.getElementById('pourcent_champs');
  incorporable.addEventListener("change", function () {
    if (incorporable.checked) {
      console.log("Le champ incorporable est sélectionné.");
      desactiverChamps(pourcent_champ, false);
    } else if (n_incorporable.checked) {
      console.log("Le champ incorporable est désélectionné.");
      desactiverChamps(pourcent_champ, true);
    }
  });
  n_incorporable.addEventListener("change", function () {
    if (incorporable.checked) {
      console.log("Le champ incorporable est sélectionné.");
      desactiverChamps(pourcent_champ, false);
    } else if (n_incorporable.checked) {
      console.log("Le champ incorporable est désélectionné.");
      desactiverChamps(pourcent_champ, true);
    }
  });
}

function desactiverChamps(div, bool) {
  let elements = div.getElementsByTagName('*');
  for (let i = 0; i < elements.length; i++) {
    let element = elements[i];
    if (element.tagName == 'INPUT' || element.tagName == 'SELECT' || element.tagName == 'TEXTAREA') {
      element.disabled = bool;
    }
    if (element.hasChildNodes()) {
      desactiverChamps(element);
    }
  }
}


/////////////////////////// FIN MAJ 08/05/2023 /////////////////////////////

function listenNumero() {
  var numComptes = document.getElementsByName("numCompte[]");
  numComptes.forEach(numInput => {
    numInput.onchange = function () {
      const num = numInput.value;
      const valider = document.getElementById("valider");

      if (num.length > 5) {
        numInput.style.color = 'red';
        valider.disabled = true;
      }

      var xhrGetNum = newXhr();
      xhrGetNum.addEventListener("load", function (event) {
        var nbLigne = JSON.parse(xhrGetNum.responseText);
        if (nbLigne == null) {
          numInput.style.color = 'red';
          addLigne.disabled = true;
          valider.disabled = true;
        }
        else if (nbLigne.length > 0) {
          numInput.style.color = 'green';
          addLigne.disabled = false;
          valider.disabled = false;
        }
      });

      const formHTML = document.createElement("form");
      const input = document.createElement("input");
      input.setAttribute('type', 'hidden');
      input.setAttribute('name', 'numero');
      input.value = num;
      formHTML.appendChild(input);
      const formJSON = new FormData(formHTML);
      xhrGetNum.open("POST", "/application/views/ajax/comptes.php");
      xhrGetNum.send(formJSON);

    };
  });
}

function listenEquilibreDebCred() {
  const valider = document.getElementById("valider");
  const totalDeb = document.getElementsByName("total_debit")[0].value;
  const totalCred = document.getElementsByName("total_credit")[0].value;

  if (totalDeb != totalCred) {
    valider.disabled = true;
    console.log("tsy mitovy");
  }

  else {
    valider.disabled = false;
    console.log("mitovy");
    //valider.style.backgroundColor = 'lightgreen';
  }
}

function listenQte() {
  var qtes = document.getElementsByName("quantite[]");

  qtes.forEach((q, index) => {
    q.onchange = function () {
      //console.log(index);
      var m = document.getElementsByName("montant[]")[index];
      writeDebCred(m, index);
      displayDebCred();
    };
  });
}

function listenMontant() {
  var montants = document.getElementsByName("montant[]");

  montants.forEach((m, index) => {
    m.onchange = function () {
      console.log(index);
      writeDebCred(m, index);
      displayDebCred();
    };
  });
}

function writeDebCred(montant, indice) {
  var debit = document.getElementsByName("debit[]")[indice];
  var credit = document.getElementsByName("credit[]")[indice];
  var quantite = document.getElementsByName("quantite[]")[indice];
  var taux = document.getElementsByName("taux[]")[indice];

  if (montant.value == '') montant.value = 0;
  if (quantite.value == '') quantite.value = 1;
  if (taux.value == '') taux.value = 1;

  const valeur = montant.value * taux.value * quantite.value;
  debit.value = valeur;
  credit.value = valeur;
}

const selectElement = document.getElementById("devise").children[0];

selectElement.addEventListener("change", (event) => {
  const selectedOption = event.target.options[event.target.selectedIndex];
  console.log(selectedOption.value);
  console.log(selectedOption.text);

  var xhrGetDevEq = newXhr();
  xhrGetDevEq.addEventListener("load", function (event) {
    var deviseEq = JSON.parse(xhrGetDevEq.responseText);
    var taux = document.getElementsByName("taux[]");
    for (var i = 0; i < taux.length; i++) {

      taux[i].value = deviseEq.taux;

    }
  });

  const formHTML = document.createElement("form");
  const input = document.createElement("input");
  input.setAttribute('type', 'hidden');
  input.setAttribute('name', 'idDevise');
  input.value = selectedOption.value;
  formHTML.appendChild(input);
  const formJSON = new FormData(formHTML);
  xhrGetDevEq.open("POST", "/application/views/ajax/devEq.php");
  xhrGetDevEq.send(formJSON);

});


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

function listenDebCredEntries() {
  var debits = document.getElementsByName("debit[]");
  var credits = document.getElementsByName("credit[]");

  debits.forEach(d => {
    d.onchange = function () {
      displayDebCred();
    };
  });

  credits.forEach(c => {
    c.onchange = function () {
      displayDebCred();
    };
  });
}

function displayDebCred() {
  var debits = document.getElementsByName("debit[]");
  var credits = document.getElementsByName("credit[]");
  var totalDebit = 0;
  var totalCredit = 0;

  for (var i = 0; i < debits.length; i++) {
    if (debits[i].value == '') {
      debits[i].value = 0;
    }
    totalDebit += parseFloat(debits[i].value);
  }

  for (var i = 0; i < credits.length; i++) {
    if (credits[i].value == '') {
      credits[i].value = 0;
    }
    totalCredit += parseFloat(credits[i].value);
  }

  document.getElementsByName("total_debit")[0].value = totalDebit.toFixed(2);
  document.getElementsByName("total_credit")[0].value = totalCredit.toFixed(2);

  listenEquilibreDebCred();
  listenNumero();
}

function ajoutLigne() {
  const corpsTable = document.getElementById("corpsTable");
  const tr = document.createElement('tr');

  buildTdIntr(tr);
  corpsTable.appendChild(tr);
  listenMontant();
  listenDebCredEntries();
  listenMontant();
  listenQte();
  listenEquilibreDebCred();
  listenNumero();

}

function getLastElement(element){
  var elements = document.getElementsByName(element);
  var lastElement = elements[elements.length-1];
  return lastElement;
}

function buildTdIntr(tr) {

  var xhrGetAllPointages = newXhr();

  let td = document.createElement('td');
  let input = document.createElement('input');
  input.setAttribute('type', 'date');
  input.setAttribute('name', 'date[]');
  input.setAttribute('value', getLastElement("date[]").value);
  td.appendChild(input);
  tr.appendChild(td);

  xhrGetAllPointages.addEventListener("load", function (event) {

    var AllPointages = JSON.parse(xhrGetAllPointages.responseText);

    td = document.createElement('td');
    let select = document.createElement('select');
    select.setAttribute('name', 'pointage[]');
    let option = document.createElement('option');
    AllPointages.forEach(p => {
      option = document.createElement('option');
      option.setAttribute('value', p.id);
      option.textContent = p.reference;
      select.appendChild(option);
    });
    td.appendChild(select);
    //tr.appendChild(td);
    var indice = 1;
    tr.insertBefore(td, tr.children[indice]);
    //console.log("tr appended");
  });

  xhrGetAllPointages.open("POST", "/application/views/ajax/pointages.php");
  xhrGetAllPointages.send(null);

  td = document.createElement('td');
  input = document.createElement('input');
  input.setAttribute('type', 'text');
  input.setAttribute('name', 'refPiece[]');
  input.setAttribute('value', getLastElement("refPiece[]").value);
  td.appendChild(input);
  tr.appendChild(td);

  td = document.createElement('td');
  input = document.createElement('input');
  input.setAttribute('type', 'file');
  input.setAttribute('name', 'scan[]');
  td.appendChild(input);
  tr.appendChild(td);

  td = document.createElement('td');
  input = document.createElement('input');
  input.setAttribute('type', 'text');
  input.setAttribute('name', 'numCompte[]');
  td.appendChild(input);
  tr.appendChild(td);

  td = document.createElement('td');
  input = document.createElement('input');
  input.setAttribute('type', 'text');
  input.setAttribute('name', 'libelle[]');
  td.appendChild(input);
  tr.appendChild(td);

  td = document.createElement('td');
  input = document.createElement('input');
  input.setAttribute('type', 'number');
  input.setAttribute('name', 'montant[]');
  input.setAttribute('min', '0');
  input.setAttribute('step', '0.01');
  td.appendChild(input);
  tr.appendChild(td);

  td = document.createElement('td');
  input = document.createElement('input');
  input.setAttribute('type', 'text');
  input.setAttribute('name', 'taux[]');
  input.setAttribute('value', '1');
  td.appendChild(input);
  tr.appendChild(td);

  td = document.createElement('td');
  input = document.createElement('input');
  input.setAttribute('type', 'number');
  input.setAttribute('name', 'quantite[]');
  input.setAttribute('value', '1');
  input.setAttribute('min', '0');
  input.setAttribute('step', '0.1');
  td.appendChild(input);
  tr.appendChild(td);

  debit = '';
  credit = '';
  var totalDebit = document.getElementsByName("total_debit")[0];
  var totalCredit = document.getElementsByName("total_credit")[0];
  if(getLastElement('debit[]').value != getLastElement('credit[]') && totalDebit.value != totalCredit.value){
    debit = getLastElement('credit[]');
    credit = getLastElement('debit[]');
  }
  else if(getLastElement('debit[]').value != getLastElement('credit[]') && totalDebit.value == totalCredit.value){
    debit = '';
    credit = '';
  }

  td = document.createElement('td');
  input = document.createElement('input');
  input.setAttribute('type', 'number');
  input.setAttribute('name', 'debit[]');
  input.setAttribute('min', '0');
  input.setAttribute('step', '0.01');
  input.setAttribute('value', debit.value);
  td.appendChild(input);
  tr.appendChild(td);
  input.onchange = function () {
    displayDebCred();
  };

  td = document.createElement('td');
  input = document.createElement('input');
  input.setAttribute('type', 'number');
  input.setAttribute('name', 'credit[]');
  input.setAttribute('min', '0');
  input.setAttribute('step', '0.01');
  input.setAttribute('value', credit.value);
  td.appendChild(input);
  tr.appendChild(td);
  input.onchange = function () {
    displayDebCred();
  };


}
