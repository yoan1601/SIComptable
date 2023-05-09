window.onload = show_hide();

function show_hide() {
    //console.log("ok show hide")
    const bouton = document.getElementById("show-form");
    const formulaire = document.getElementById("c6form");

    bouton.addEventListener("click", () => {
        //console.log("ok show hide 2")
        //formulaire.classList.add("formulaire-actif");
        formulaire.style.display = "block";
        formulaire.style.backdropFilter = "blur(5px)";
    });
}
