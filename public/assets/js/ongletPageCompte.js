// Il faut que les variables qui sont dans le paramètre de la condition soient déclarées dans le fichier php. juste avant le lien vers ce fichier js


// condition pour rester sur l'onglet si il y a une chaine de caractère dans le message de validation alors on enlève la classe active  dans l'onglet accueil et on le met dans l'onglet avatar. Idem avec show et active de la div correspondante

if(erreurAvatar.length > 1){
    const btnAccueil = document.querySelector('#accueil-tab');
    const divAccueil = document.querySelector('#accueil-tab-pane');
    const btnAvatar = document.querySelector('#avatar-tab');
    const formAvatar = document.querySelector('#avatar-tab-pane');
    btnAccueil.classList.remove("active");
    divAccueil.classList.remove("active", "show");
    btnAvatar.classList.add("active");
    formAvatar.classList.add("active", "show");
}

// condition pour rester sur l'onglet si il y a une chaine de caractère dans le message de validation alors on enlève la classe active  dans l'onglet accueil et on le met dans l'onglet contact. Idem avec show et active de la div correspondante. 
// Ici il faut vérifier les 2 messages de validation

if(erreurContenu.length > 1 || erreurObjet.length > 1 ){
    const btnAccueil = document.querySelector('#accueil-tab');
    const divAccueil = document.querySelector('#accueil-tab-pane');
    const btnContact = document.querySelector('#contact-tab');
    const formContact = document.querySelector('#contact-tab-pane');
    btnAccueil.classList.remove("active");
    divAccueil.classList.remove("active", "show");
    btnContact.classList.add("active");
    formContact.classList.add("active", "show");

  }