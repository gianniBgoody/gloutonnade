// Récupération des infos nécessaires pour la fenêtre modale de suppression d'un jeu
// soit son nom et son id.

let btnsDel = document.querySelectorAll('.boutonModal');

for (const btnDel of btnsDel) {
    btnDel.addEventListener('click', (e) => {
        let elementId, target;
        if(e.target.classList.contains("btn")){
            elementId = e.target.value;
            target =e.target.getAttribute('data-bs-target');
        } else if(e.target.classList.contains("spanDelete")) {
            elementId = e.target.getAttribute("value");
            target =e.target.getAttribute('data-bs-target');
        } else {
            elementId = e.target.parentNode.value;
            target =e.target.parentNode.getAttribute('data-bs-target');
        }
        
        // let gameName = e.target.previousElementSibling.innerHTML;

        // let span = document.querySelector("#gameName");
        // span.innerHTML = gameName;
        
        // console.log (e.target.parentNode.getAttribute('data-bs-target'));

        let link ="";

        switch(target){
            case '#deleteCategorie':
                link = document.querySelector("#boutonSupprimerCategorie");
                link.href = "adminDeleteCat/" + elementId;
                break;

            case '#deleteSouscat':
                link = document.querySelector("#boutonSupprimerSousCat");
                link.href = "adminDeleteSouscat/" + elementId;
                break;
                
            case '#deleteTag':
                link = document.querySelector("#boutonSupprimerTag");
                link.href = "adminDeleteTag/" + elementId;
                break;

            case '#deleteMessageAll':
                link = document.querySelector("#boutonSupprimerMessageAll");
                link.href = "adminDeleteMessage/" + elementId;
                break;
                
            case '#deleteMessageVisiteur':
                link = document.querySelector("#boutonSupprimerMessageVisiteur");
                link.href = "adminDeleteMessage/" + elementId;
                break;

            case '#deleteMessageMembre':
                link = document.querySelector("#boutonSupprimerMessageMembre");
                link.href = "adminDeleteMessage/" + elementId;
                break;
                
            case '#supprimeCommentaire':
                link = document.querySelector("#boutonSupprimeCommentaire");
                link.href = "/commentaireRecetteDelete/" + elementId;
                break;

        }
    })
}