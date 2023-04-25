
if(flashdata){
    const btnRecette = document.querySelector('#recette-tab');
    const divRecette = document.querySelector('#recette-tab-pane');
    const btnCommentaire = document.querySelector('#commentaire-tab');
    const formCommentaire = document.querySelector('#commentaire-tab-pane');
    btnRecette.classList.remove("active");
    divRecette.classList.remove("active", "show");
    btnCommentaire.classList.add("active");
    formCommentaire.classList.add("active", "show");
  }