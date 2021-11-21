/**************
*	On ajoute un évènement "lorsque l'arborescence DOM est chargée". 
*   Ainsi, nous sommes certains de manipuler des élements 
*	chargés et existants dans notre DOM.
**************/
window.addEventListener("DOMContentLoaded", function () {
    // appel des elements HTML avec leur ID
    var connexion_identifiant = document.getElementById("connexion-identifiant");
    var connexion_password = document.getElementById("connexion-password");
    var btn_connexion_annuler = document.getElementById("connexion-annuler");

    // mise en place de EventListener
    btn_connexion_annuler.addEventListener("click", funBtnConnexionAnnuler)


    // fonction de du bouton annuler dans le form de connexion
    function funBtnConnexionAnnuler() {
        connexion_identifiant.value = "";
        connexion_password.value = "";
    }

});