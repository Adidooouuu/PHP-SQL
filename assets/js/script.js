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
    var les_equipes = document.getElementsByClassName("equipe");
    var btn_plus_equipe = document.getElementById("bouton-plus-equipe");

    // mise en place de EventListener
    btn_connexion_annuler.addEventListener("click", funBtnConnexionAnnuler);
    btn_plus_equipe.addEventListener("click", funBtnPlusEquipe);


    // fonctions
    // fonction de du bouton annuler dans le form de connexion
    function funBtnConnexionAnnuler() {
        connexion_identifiant.value = "";
        connexion_password.value = "";
    }


    // ce block de code permet de gérer d'affichage des équipe de la page index.php avec le bouton "Voir plus"
    // a est une varible de test comme i
    var a = 3
    // la boucle suivante est exécutée 3 fois. Elle permet d'afficher 3 équipes
    for (let i = 0; i < a; i++) {
        // defini le display en block pour l'element i du tableau les_equipes
        les_equipes[i].style.display = "block";
    }
    // fonction du clic sur le bouton btn_plus_equipe
    function funBtnPlusEquipe() {
        // test si a est inferieur à la taille du tableau les_equipes
        if (a < les_equipes.length) {
            a += 3;
        }
        // boucle d'affchage des block équipe 3 par 3
        for (let i = 0; i < a && i < les_equipes.length; i++) {
            les_equipes[i].style.display = "block";
        }
    }


});