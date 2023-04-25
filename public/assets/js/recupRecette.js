// console.log(JSON.parse(recette.ingredient))

const ingredients = JSON.parse(recette.ingredient);
const etapes = JSON.parse(recette.etape);

let listeEtape = document.getElementById('etapeListe');
let listeIngredient = document.getElementById('ingrListe');


afficherIngredients(ingredients);
afficherEtapes(etapes);


function afficherIngredients(tabIngredients){
    
    listeIngredient.innerHTML = "";

    for(ingredientElt of tabIngredients ){
        listeIngredient.innerHTML += `<li class="list-group-item liste-ingredient fs-6">${ingredientElt}</li>`;
        }
}


function afficherEtapes(tabEtapes){
    
    listeEtape.innerHTML = "";
    let indice = 1;
    for(etapeElt of tabEtapes ){
        
        listeEtape.innerHTML += `<div class="row ms-2 mb-3">
         <div class="col-md-1 puceListeEtape ">${indice++}</div>
         <div class="col-md-11">${etapeElt}</div>
           </div>`;
        }
}



