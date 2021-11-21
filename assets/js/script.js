/**************
*	On ajoute un évènement "lorsque l'arborescence DOM est chargée". 
*   Ainsi, nous sommes certains de manipuler des élements 
*	chargés et existants dans notre DOM.
**************/
window.addEventListener("DOMContentLoaded", function () {
    // appel des elements HTML avec leur ID
    var connection_identifiant = document.getElementById("connection-identifiant");
    var connection_password = document.getElementById("connection-password");
    var btn_connection_annuler = document.getElementById("connection-annuler");

    // mise en place de EventListener
    btn_connection_annuler.addEventListener("click", funBtnConnectionAnnuler)


    // fonction de du bouton annuler dans le form de connection
    function funBtnConnectionAnnuler() {
        connection_identifiant.value = "";
        connection_password.value = "";
    }

});