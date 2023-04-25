// Partie pour UPLOAD de l'image

let doc = document.querySelector("#image");
let mini = document.querySelector("#insert_image");

doc.addEventListener("change", ()=>{
    mini.innerHTML = "";
    let data = new FileReader();
    data.onload = readerEvt =>{
        console.log(data);
        let image = document.createElement("img");
        console.log(readerEvt.target);
        image.classList = "h-100";
        image.src = readerEvt.target.result;
        console.log("onload",image.src);
        mini.appendChild(image);   
    }
    data.readAsDataURL(doc.files[0]);
    console.log("loaded",image.src);
})



// Partie pour les INGREDIENTS et les ETAPES

//Ajouter un ingredient
const ingredients = [];
const etapes = [];
let compteurIngr = 20;
let compteurEtape = 15;

let listIngr = document.getElementById('ulIngr');
let listEtape = document.getElementById('ulEtape');
let spanComptIngr = document.getElementById('compteurIngr');
let spanComptEtape = document.getElementById('compteurEtape');
let erreurIngr = document.getElementById('erreurIngr');
let erreurEtape = document.getElementById('erreurEtape');


//ajouter un élément
function nouvelIngr(){
    let ingr = document.querySelector('#ingredient').value.toLowerCase();
    console.log(ingr)
    if(compteurIngr > 0 ) {
        if(ingr.length >= 3) {
            //tester si ingr est rempli
            // if(ingr.length >= 3){
            ingredients.push(ingr);
            // }
            document.querySelector('#ingredient').value = "";
            afficherIngredients(ingredients);
            compteurIngr--;
            spanComptIngr.innerHTML = compteurIngr + " ajout restant";
            erreurIngr.innerHTML = ""
        } else {
            erreurIngr.innerHTML = "3 caractères minimum";
        }
    } else {
        erreurIngr.innerHTML = "Plus d'ajout possible";
    }
}

function nouvelEtape(){
    let etap = document.querySelector('#etapeRecette').value;
    if(compteurEtape > 0) {
        if(etap.length >= 3){
            etapes.push(etap);
            document.querySelector('#etapeRecette').value = "";
            afficherEtape(etapes);
            compteurEtape--;
            spanComptEtape.innerHTML = compteurEtape + " ajout restant";
        }else{
            erreurEtape.innerHTML = "3 caractères minimum";
        }
    
    }else{
        erreurEtape.innerHTML = "Plus d'ajout possible";
    }
}

//Afficher les listes
function afficherEtape(tabEtapes){
    
    listEtape.innerHTML = "";

    for(etapeElt of tabEtapes ){
        listEtape.innerHTML += `<li class="list-group-item">${etapeElt}<button onclick="supprimerEtape('${etapeElt}')"type="button" class="btn btn-close btn-sm ms-5 closeFormRecette" aria-label="Close"></button></li>`;
        }
}


function afficherIngredients(tabIngredients){
    
    listIngr.innerHTML = "";

    for(ingredientElt of tabIngredients ){
        listIngr.innerHTML += `<li class="list-group-item">${ingredientElt}<button onclick="supprimerIngredient('${ingredientElt}')"type="button" class="btn btn-close btn-sm ms-5 closeFormRecette" aria-label="Close"></button></li>`;
        }
}

//Supprimer une etape ou un ingredient

function supprimerEtape(eltASup){ 
    
   for (let index = 0; index < etapes.length; index++) {
       if(etapes[index] == eltASup){  
        eltSupprime = etapes.splice(index, 1);
       break;
       }
    }
    erreurEtape.innerHTML = ""
    compteurEtape++
    spanComptEtape.innerHTML = compteurEtape + " ajout restant"
    afficherEtape(etapes);
}


function supprimerIngredient(eltASup){ 

    for (let index = 0; index < ingredients.length; index++) {
        if(ingredients[index] == eltASup){
        eltSupprime = ingredients.splice(index, 1);
        break;
        }
     }
     erreurIngr.innerHTML = ""
     compteurIngr++
     spanComptIngr.innerHTML = compteurIngr + " ajout restant"
     afficherIngredients(ingredients);
 }
 

 //Preparer le formulaire avant son envoi

 function enregistrer(){
    //transformer les tableaux ingredients et étapes en chaînes de caractères (JSON.stringify)
    const ingredientsData = JSON.stringify(ingredients);
    const etapesData = JSON.stringify(etapes);
    
    //Récupérer les 2 input cachés (querySelector)

    const ingrInput = document.querySelector("#ingrId");
    const etapeInput = document.querySelector("#etapeId");

    ingrInput.value = ingredientsData;
    etapeInput.value = etapesData;
}



// fonction pour la selection des catégories et sous catégories

function selectSousCat(e){
   let selects = document.querySelector("#sousCatList");
   
    const triSousCat = sousCat.filter(elt => elt.categorie_id == e.value);

    let html = "<option>Choisir une sous catégorie</option>";
    
    for (const elt of triSousCat){
        // const option = document.createElement("option");
        // option.value = elt.id;
        // option.text = elt.nom_souscat;
        // selects.add(option, null);
        html += `<option value=${elt.id}>${elt.nom_souscat}</option>`;
    }
    selects.innerHTML = html;

}






